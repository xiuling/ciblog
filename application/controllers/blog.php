<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		//$this->output->enable_profiler(TRUE);
	}

	public function index(){
		$query = "SELECT cid,title,contents.created,modified,`text`,name,username FROM contents,metas,users WHERE contents.type=metas.mid AND contents.authorId=users.uid AND contents.type!=0 ORDER BY cid DESC";
		$data['blog'] = $this->db->query($query);

		$this->db->where('type', 'category');
		$data['category'] = $this->db->get('metas');

		$this->db->where('type', 'label');
		$data['label'] = $this->db->get('metas');
		
		$data['title'] = '所有博客';

		$this->load->view('blog/header', $data);
		$this->load->view('blog/index', $data);
		$this->load->view('blog/sidebar');
		$this->load->view('blog/footer');
	}
	public function admin(){
		$query = "SELECT cid,title,contents.created,modified,`text`,name,username FROM contents,metas,users WHERE contents.type=metas.mid AND contents.authorId=users.uid AND contents.type!=0 ORDER BY cid DESC";
		$data['blog'] = $this->db->query($query);

		$this->db->where('type', 'category');
		$data['category'] = $this->db->get('metas');

		$this->db->where('type', 'label');
		$data['label'] = $this->db->get('metas');

		$data['title'] = '所有博客';

		$this->load->view('blog/header', $data);
		$this->load->view('blog/admin', $data);
		$this->load->view('blog/sidebar');
		$this->load->view('blog/footer');
	}

	public function view($cid){
		$query = "SELECT cid,title,contents.created,modified,`text`,name,username FROM contents,metas,users WHERE contents.type=metas.mid AND contents.authorId=users.uid AND contents.type!=0 AND cid=".$cid;
		$data['blog'] = $this->db->query($query);
		//$query = $this->db->get_where('contents', array('cid' => $cid));;
		$data['blog_item'] = $data['blog']->row_array();

		$this->db->where('cid', $cid);
		$data['comments'] = $this->db->get('comments');

		$this->db->where('type', 'category');
		$data['category'] = $this->db->get('metas');

		$this->db->where('type', 'label');
		$data['label'] = $this->db->get('metas');

		if (empty($data['blog_item'])){
			show_404();
		}

		$data['title'] = $data['blog_item']['title'];

		$this->load->view('blog/header', $data);
		$this->load->view('blog/view', $data);
		$this->load->view('blog/sidebar');
		$this->load->view('blog/footer');
	}

	public function about(){
		$query = 'SELECT cid,`text`,contents.created,contents.modified,commentsNum FROM contents WHERE type=0';
		$data['about'] = $this->db->query($query);

		$query2 = 'SELECT coid, created, author, mail, `text` FROM comments WHERE type="about"';
		$data['comments'] = $this->db->query($query2);

		$this->db->where('type', 'category');
		$data['category'] = $this->db->get('metas');

		$this->db->where('type', 'label');
		$data['label'] = $this->db->get('metas');

		$data['title'] = 'About';

		$this->load->view('blog/about', $data);
		$this->load->view('blog/sidebar');
		$this->load->view('blog/footer');
	}

	public function create(){
		$data['title'] = '添加新博客';

		$this->db->where('type', 'category');
		$data['category'] = $this->db->get('metas');

		$this->db->where('type', 'label');
		$data['label'] = $this->db->get('metas');
		
		$this->load->view('blog/header', $data);
		$this->load->view('blog/create_view', $data);
		$this->load->view('blog/footer');

	}
	public function insert(){
		$this->load->library('form_validation');		

		$this->form_validation->set_rules('title','标题','trim|required');
		$this->form_validation->set_rules('type','分类','required');
		$this->form_validation->set_rules('text','内容','required');
		$this->form_validation->set_rules('label','标签','required');

		if($this->form_validation->run() === FALSE){
			$data['title'] = '添加新博客';

			$this->db->where('type', 'category');
			$data['category'] = $this->db->get('metas');

			$this->db->where('type', 'label');
			$data['label'] = $this->db->get('metas');

			$this->load->view('blog/header', $data);
			$this->load->view('blog/create_view', $data);
			$this->load->view('blog/footer');
		}else{
			$slug = url_title($this->input->post('title'), 'dash', TRUE);
			$created = date("Y-m-d H-i-s",time());
			$array = $this->input->post('label');
			$label =implode(',',$array);  

			$data = array(  
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'type' => $this->input->post('type'),
				'label' => $label,
				'text' => $this->input->post('text'),
				'created' => $created,
				'authorId' => $this->session->userdata('uid') 
			);

			$this->db->insert('contents', $data);

			redirect('admin');
		}
	}

	public function edit(){
		$data['title'] = '编辑';

		$this->db->where('cid', $this->uri->segment(2));
		$data['blog'] = $this->db->get('contents');


		$this->db->where('type', 'category');
		$data['category'] = $this->db->get('metas');

		$this->db->where('type', 'label');
		$data['label'] = $this->db->get('metas');

		$this->load->view('blog/header', $data);
		$this->load->view('blog/edit_view', $data);
		$this->load->view('blog/footer');
		
	}

	public function update(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title','标题','trim|required');
		$this->form_validation->set_rules('type','分类','required');
		$this->form_validation->set_rules('text','内容','required');
		$this->form_validation->set_rules('label','标签','required');

		if($this->form_validation->run() === FALSE){
			$data['title'] = '编辑';

			$this->db->where('cid', $this->input->post('cid'));
			$data['blog'] = $this->db->get('contents');

			$this->db->where('type', 'category');
			$data['category'] = $this->db->get('metas');

			$this->db->where('type', 'label');
			$data['label'] = $this->db->get('metas');

			$this->load->view('blog/header', $data);
			$this->load->view('blog/edit_view', $data);
			$this->load->view('blog/footer');
		}else{
			$slug = url_title($this->input->post('title'), 'dash', TRUE);
			$modified = date("Y-m-d H-i-s",time()); 
			$array = $this->input->post('label');
			$label =implode(',',$array);

			$data = array(  
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'type' => $this->input->post('type'),
				'label' => $label,
				'text' => $this->input->post('text'),
				'modified' => $modified
			);

			$this->db->where('cid', $_POST['cid']);
			$this->db->update('contents', $data);

			redirect('view/'.$_POST['cid']);
		}

	}

	public function delete(){
		$this->db->where('cid', $this->uri->segment(2));

		$this->db->delete('contents');
		redirect('admin');
	}

	public function comments_insert(){
		$created = date("Y-m-d H-i-s",time());

		if($_POST['type'] === 'about'){
			$data = array( 
				'cid' =>  $this->input->post('cid'),
				'text' => $this->input->post('text'),
				'author' => $this->input->post('author'),
				'type' => 'about',
				'created' => $created
			);

			$this->db->insert('comments', $data);
			redirect('about/');
		}else{
			$data = array( 
				'cid' =>  $this->input->post('cid'),
				'text' => $this->input->post('text'),
				'author' => $this->input->post('author'),
				'created' => $created
			);

			$this->db->insert('comments', $data);
			redirect('view/'.$_POST['cid']);
		}
	}

	public function login(){
		$data['title'] = 'LogIn';

		$this->load->view('blog/header', $data);
		$this->load->view('blog/login_view', $data);
		$this->load->view('blog/footer');
	}

	public function check_login(){
		$data['title'] = 'LogIn';

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','用户名','trim|required');
		$this->form_validation->set_rules('password','密码','trim|required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('blog/header', $data);
			$this->load->view('blog/login_view', $data);
			$this->load->view('blog/footer');
		}else{
			$this->db->where('username', $this->input->post('username'));
			$this->db->where('password', $this->input->post('password'));
			$query = $this->db->get('users');

			if($query->num_rows() > 0){
				$result = $query->row();
				$this->session->set_userdata('name',$this->input->post('name'));
				$this->session->set_userdata('uid',$result->uid);
				redirect('admin');
			}else{
				$this->load->view('blog/login_view', $data);
			}
		}
	}

	public function logout(){
		/*$this->session->unset_userdata('name');
		$this->session->unset_userdata('uid');*/
		$this->session->sess_destroy();

		redirect('index');
	}

	public function category(){
		$data['title'] = '添加新分类';

		$this->db->where('type', 'category');
		$data['category'] = $this->db->get('metas');

		$this->load->view('blog/header', $data);
		$this->load->view('blog/category', $data);
		$this->load->view('blog/footer');
	}

	public function category_insert(){
		$this->load->library('form_validation');		

		$this->form_validation->set_rules('name','分类','trim|required');

		if($this->form_validation->run() === FALSE){
			$data['title'] = '添加分类';

			$this->db->where('type', 'category');
			$data['category'] = $this->db->get('metas');

			$this->load->view('blog/header', $data);
			$this->load->view('blog/category', $data);
			$this->load->view('blog/footer');
		}else{
			$data = array(  
				'name' => $this->input->post('name'),
				'type' => 'category'
			);

			$this->db->insert('metas', $data);

			redirect('category');
		}
	}

	public function label(){
		$data['title'] = '添加新标签';

		$this->db->where('type', 'label');
		$data['label'] = $this->db->get('metas');

		$this->load->view('blog/header', $data);
		$this->load->view('blog/label', $data);
		$this->load->view('blog/footer');
	}

	public function label_insert(){
		$this->load->library('form_validation');		

		$this->form_validation->set_rules('name','标签','trim|required');

		if($this->form_validation->run() === FALSE){
			$data['title'] = '添加新标签';

			$this->db->where('type', 'label');
			$data['label'] = $this->db->get('metas');

			$this->load->view('blog/label', $data);
		}else{
			$data = array(  
				'name' => $this->input->post('name'),
				'type' => 'label'
			);

			$this->db->insert('metas', $data);

			redirect('label');
		}
	}

	

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
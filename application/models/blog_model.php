<?php
class Blog_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function get_blog($slug = FALSE){
		if($slug === FALSE){
			$query = $this->db->get('contents');
			
			//$query = $this->db->query('SELECT cid,title,slug,name,`text`,created,commentsNum FROM contents,metas WHERE  contents.type=metas.mid and contents.type!=0 AND status=0 ORDER BY created DESC');
			return $query->result_array();
		}

		$query = $this->db->get_where('contents', array('slug' => $slug));
		return $query->row_array();
	}

	public function set_blog(){
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(  
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text') 
		);

		return $this->db->insert('contents', $data);
	}

	public function update_blog(){
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(  
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text') 
		);

		$this->db->where('cid', $this->input->post('cid'));
		return $this->db->update('contents', $data);
	}
}
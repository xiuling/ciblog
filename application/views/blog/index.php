
<h1><?php //echo $this->session->userdata('uid');?></h1>
<div class="main">
	<?php foreach ($blog->result_array() as $blog_item): ?>

		<?php if($blog_item['title'] !== NULL): ?>

			<div class="contents">
			<h2><?php echo anchor('view/'.$blog_item['cid'], $blog_item['title']); ?></h2>
			<p class="small">作者：<?php echo $blog_item['username'] ;?> 分类：<?php echo $blog_item['name'] ;?> 创建时间：<?php echo $blog_item['created'] ;?></p>
			<div id="main">
				<?php echo $blog_item['text'] ?>
			</div>

			</div>
		<?php endif ?>

	<?php endforeach ?>
</div>




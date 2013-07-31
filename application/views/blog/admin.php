<div class="main">
	<div class="contents">
<?php if ($this->session->userdata('uid')): ?>


	<h1> <?php // echo $this->session->userdata('uid'); ?></h1>
	<h3><a href="create">添加新博客</a></h3>
	<table class="mytable">
		<tr>
			<th>标题</th>
			<th>分类</th>
			<th>操作</th>
			<th>创建时间</th>
		</tr>
	<?php foreach ($blog->result_array() as $blog_item): ?>

		<?php if($blog_item['title'] !== NULL): ?>
			
			<tr>
				<td><?php echo $blog_item['title']; ?></td>
				<td><?php echo $blog_item['name']; ?></td>
				<td><?php echo anchor('edit/'.$blog_item['cid'], '编辑'); ?>&nbsp;&nbsp;<?php echo anchor('delete/'.$blog_item['cid'], '删除'); ?></td>
				<td><?php echo $blog_item['created']; ?></td>
			</tr>
		<?php endif; ?>

	<?php endforeach; ?>
	</table>


<?php else: ?>
<p>未登录,<?php echo anchor('login', '请点击登录'); ?></p>
<?php endif; ?>
</div>

</div>
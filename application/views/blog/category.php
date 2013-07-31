<div class="main">
	<h3> 分类</h3>
	<?php foreach ($category->result_array() as $category_item): ?>

		<?php if($category_item['name'] !== NULL): ?>
			<?php echo $category_item['name']; ?>
		<?php endif; ?>

	<?php endforeach; ?>

	<h4><?php echo $title; ?></h4>
	<?php echo form_open('blog/category_insert'); ?>

		<p><input type="text" name="name" /></p>
		<p><input type="submit" value="添加" /></p>
	</form>
</div>


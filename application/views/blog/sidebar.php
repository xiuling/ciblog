<div id="sidebar">
	<div class="category side">
		<h4>Category</h4>
		<?php foreach ($category->result_array() as $category_item): ?>

		<?php if($category_item['name'] !== NULL): ?>
			<p><?php echo $category_item['name']; ?></p>
		<?php endif; ?>

	<?php endforeach; ?>
	</div>
	<div class="label side">
		<h4>Label</h4>
		<?php foreach ($label->result_array() as $label_item): ?>

			<?php if($label_item['name'] !== NULL): ?>
				<p><?php echo $label_item['name']; ?></p>
			<?php endif; ?>

		<?php endforeach; ?>
	</div>
	<div class="function side">
		<h4>Function</h4>
		<p><?php echo anchor('login', '登录'); ?></p>
		<p><?php echo anchor('logout', '登出'); ?></p>
	</div>
</div>

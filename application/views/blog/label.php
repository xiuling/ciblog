<div class="main">
	<h3>标签</h3>
	<?php foreach ($label->result_array() as $label_item): ?>

		<?php if($label_item['name'] !== NULL): ?>
			<?php echo $label_item['name']; ?>
		<?php endif; ?>

	<?php endforeach; ?>

	<h4><?php echo $title; ?></h4>
	<?php echo form_open('blog/label_insert'); ?>

		<p><input type="text" name="name" /></p>
		<p><input type="submit" value="添加" /></p>
	</form>
</div>

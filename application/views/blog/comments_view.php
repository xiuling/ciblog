
	<?php if ($comments->num_rows() > 0): ?>
	<h1>所有评论</h1>
		<?php foreach ($comments->result_array() as $comments_item): ?>

			<p><?php echo $comments_item['text']; ?></p>
			<p><?php echo $comments_item['author']; ?></p>
			<hr />

		<?php endforeach; ?>
	<?php else: ?>
		<p>暂时没有评论！</p>
	<?php endif; ?>
<h2><?php echo $title; ?></h2>
<?php echo form_open('comments_insert'); ?>

	<?php echo form_hidden('cid', $this->uri->segment(3)); ?>
<table>
	<tr>
	 	<td>内容</td>
	 	<td><textarea name="text" rows="10" cols="40"></textarea></td>
	</tr>
	<tr>
	 	<td>名字</td>
	 	<td><input type="text" name="author" size="30" /></td>
	</tr>
	<tr>
	 	<td cols="2"><input type="submit" value="Submit Comment" /></td>
	</tr>
</table>

</form>



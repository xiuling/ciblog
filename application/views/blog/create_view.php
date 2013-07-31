<div class="main">
<h2><?php echo $title; ?></h2>
<?php echo anchor('category', '添加分类'); ?>&nbsp;&nbsp;<?php echo anchor('label', '添加标签'); ?>

<?php echo validation_errors(); ?>

<?php echo form_open('insert') ?>
<table>
	<tr>
	 	<td>标题</td> 
	    <td><input type="input" name="title" value="<?php echo set_value('title'); ?>" size="60" /></td>
    </tr>
    <tr>
    	<td>分类</td>
    	<td><select name="type">
			<?php foreach ($category->result_array() as $category_item): ?>
			<option value="<?php echo $category_item['mid']; ?>" ><?php echo $category_item['name'] ?> 
			<?php endforeach;?>
		</select></td>
	</tr>
	<tr>
	    <td>内容</td>
	    <td><textarea name="text" rows="10" cols="50"><?php echo set_value('text'); ?></textarea></td>
  	</tr>
  	<tr>
	 	<td>标签</td> 
	    <td>
	    	<?php foreach ($label->result_array() as $label_item): ?>
	    	<input type="checkbox" name="label[]" value="<?php echo $label_item['mid']; ?>" /><?php echo $label_item['name']; ?>
	    	 <?php endforeach; ?>
	    </td>
    </tr>
  	<tr>
		<td colspan="2"><input type="submit" name="submit" value="提交" /></td>
	</tr> 
</table>

</form>
</div>



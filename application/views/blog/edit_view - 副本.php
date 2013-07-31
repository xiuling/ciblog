
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('blog/update') ?>
	<?php echo form_hidden('cid', $this->uri->segment(3)) ?>
	<?php $row = $blog->row_array(); ?>
	<?php $labels = explode(',',$row['label']);  print_r($labels); ?>
	<table>
	<tr>
	 	<td>标题</td> 
	    <td><input type="input" name="title" value="<?php echo $row['title']; ?>" size="60" /></td>
    </tr>
    <tr>
    	<td>分类</td>
    	<td><select name="type">
			<?php foreach ($category->result_array() as $category_item): ?>
			<?php if ($category_item['mid'] == $row['type']): ?>
				<option value="<?php echo $category_item['mid']; ?>" selected="selected"><?php echo $category_item['name'] ?> 
			<?php else: ?>
			<option value="<?php echo $category_item['mid']; ?>" ><?php echo $category_item['name'] ?> 
			<?php endif; ?>
			<?php endforeach;?>
		</select></td>
	</tr>
  	<tr>
	    <td>内容</td>
	    <td><div id="epiceditor" name="text"><?php echo $row['text']; ?></div></td>
  	</tr>
  	<tr>
  		<td>预览</td>
  		<td><div id="epiceditor-preview" ></div></td>
  	</tr>
  	<tr>
	 	<td>标签</td> 
	    <td>
	    	<?php foreach ($label->result_array() as $label_item): ?>
		    	<?php foreach ($labels as $key => $value): ?>
			    	<?php if ($label_item['mid'] == $value): ?>
			    		<input type="checkbox" name="label[]" value="<?php echo $label_item['mid']; ?>" checked="checked" /><?php echo $label_item['name']; ?>
			    	<?php else: ?>
			    	<input type="checkbox" name="label[]" value="<?php echo $label_item['mid']; ?>"  /><?php echo $label_item['name']; ?>
			    	<?php endif; ?>
		    	<?php endforeach; ?>
	    	<?php endforeach; ?>
	    </td>
    </tr>
  	<tr>
		<td colspan="2"><input type="submit" name="submit" value="更新" /></td>
	</tr> 
	</table>

</form>

	<script type="text/javascript" src="<?php echo base_url();?>js/epiceditor.min.js"></script>
	<script type="text/javascript">
		 var editor = new EpicEditor({
			buttons: false,
			}).load();
			 
			editor.on('update', function () {
			document.querySelector('#epiceditor-preview').innerHTML = this.exportFile(null, 'html');
			}).emit('update');
	</script>
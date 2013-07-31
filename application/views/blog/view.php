<div class="main">	
	<div class="contents">
		<h2><?php echo $blog_item['title']; ?></h2>
		<p class="small">作者：<?php echo $blog_item['username'] ;?> 分类：<?php echo $blog_item['name'] ;?> 创建时间：<?php echo $blog_item['created'] ;?></p>
		<?php echo $blog_item['text']; ?>
	</div>
	
	<div class="comments">
		<?php if ($comments->num_rows() > 0): ?>
		<h3>所有评论</h3>
			<?php foreach ($comments->result_array() as $comments_item): ?>
				<div class="eachComment">
				<p><?php echo $comments_item['text']; ?></p>
				<p class="small">Author:<?php echo $comments_item['author']; ?> Created: <?php  echo $comments_item['created']; ?></p>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<p>暂时没有评论！</p>
		<?php endif; ?>
	</div>
	<div class="addComments">
			<?php echo form_open('comments_insert'); ?>

				<?php echo form_hidden('cid', $this->uri->segment(2)); ?>
			<table>
				<tr>
				 	<td>内容</td>
				 	<td><textarea name="text" rows="20" cols="50"></textarea></td>
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
	</div>
</div>




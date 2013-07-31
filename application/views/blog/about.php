<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Blog - <?php echo $title; ?></title>
	<base href=""/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/page.css">
<!--	<link rel="stylesheet" type="text/css" href="<?php //echo base_url();?>css/themes/preview/bartik.css"> -->
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
	<style type="text/css">
		body#intro #about a{ color: #333; padding-bottom: 5px; border-color: #727377; background: #DDD;}
	</style>
</head>
<body id="intro">
<div id="wrap">
	<div id="head">
		<h1 id="banner"><?php echo anchor('index/', 'Blog'); ?></h1>
		<form id="search">
			<input type="text" name="search" class="search"/><input type="submit" value="Search" />
		</form>
		<div class="clear"></div>
	</div>
	<div id="nav">
		<ul>
			<li id="home"><?php echo anchor('index/', 'Home'); ?></li>
			<li id="about"><?php echo anchor('about/', 'About'); ?></li>
		</ul>
	</div>
	<h1></h1>
<div class="main">
	<?php $row = $about->row_array() ?>

		<div class="contents">
			<h2><?php echo anchor('about/', 'About'); ?></h2>
			<p></p>
		<!--	<p class="small">作者：<?php //echo $about_item['username'] ;?> 分类：<?php //echo $about_item['name'] ;?> 创建时间：<?php //echo $about_item['created'] ;?></p> -->
	
				<?php echo $row['text'] ?><?php $cid = $row['cid']; ?>

		</div>
		<div class="comments">
		<?php if ($comments->num_rows() > 0): ?>
		<h3>所有评论</h3>
			<?php foreach ($comments->result_array() as $comments_item): ?>
				<div class="eachComment">
				<p><?php echo $comments_item['text']; ?></p>
				<p class="small">Author:<?php echo $comments_item['author'];?>Created:<?php echo $comments_item['created'];?></p>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<p>暂时没有评论！</p>
		<?php endif; ?>
	</div>
	<div class="addComments">
			<?php echo form_open('comments_insert'); ?>

				<?php echo form_hidden('cid', $cid); ?>
				<?php echo form_hidden('type', 'about'); ?>
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
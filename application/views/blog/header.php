<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Blog - <?php echo $title; ?></title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/page.css">
	<!--<link rel="stylesheet" type="text/css" href="<?php //echo base_url();?>css/themes/preview/bartik.css"> -->
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
	<style type="text/css">

		body#intro #home a{ color: #333; padding-bottom: 5px; border-color: #727377; background: #DDD;}
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
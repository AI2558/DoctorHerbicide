<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<title>หมอยาวัชพืช</title>

		<!-- Bootstrap core CSS -->
		<?= css_asset('lavish-bootstrap.css'); ?>
		<!-- Custom styles for this template -->
		<?= css_asset("navbar-fixed-top.css"); ?>
		<!-- Image Picker -->
		<?= css_asset("image-picker.css"); ?>
		<!-- My style -->
		<?= css_asset("style.css"); ?>

		<!-- JQuery -->
		<?= js_asset("bower_components/jquery/dist/jquery.js"); ?>
		<!-- Image Picker -->
		<?= js_asset("image-picker.js"); ?>
		<!-- js_bootstrap-->
		<?= js_asset("bootstrap.js"); ?>
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.css"/>
 	
 		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script>
			$(function() {
				$("#datepicker").datepicker();
			});
		</script>
	</head>

	<body>
		<!-- Fixed navbar -->
		<?php $page = $this -> session -> userdata('page'); ?>
		<?php $name_session = $this -> session -> userdata('name_session'); ?>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">หมอยาวัชพืช</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
				
					<ul class="nav navbar-nav">
						<li class="<?= (($page == 'home') ? 'active' : 'last'); ?>">
							<a href="<?= base_url('home') ?>">วัชพืช</a>
						</li>
						<li class="<?= (($page == 'medicine') ? 'active' : 'last'); ?>">
							<a href="<?= base_url('medicine') ?>">ยาฆ่าวัชพืช</a>
						</li>
						<li class="<?= (($page == 'store') ? 'active' : 'last'); ?>">
							<a href="<?= base_url('store') ?>">ตัวแทนจำหน่าย</a>
						</li>
						<?php if($name_session != null) { ?>
						<li class="<?= (($page == 'report') ? 'active' : 'last'); ?>">
							<a href="<?= base_url('report') ?>">รายงานวัชพืช</a>
						</li>
						<?php } ?>
						<li class="<?= (($page == 'about') ? 'active' : 'last'); ?>">
							<a href="<?= base_url('about') ?>">เกี่ยวกับ</a>
						</li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
					<?php if($name_session == null) { ?>
						<li class="<?= (($page == 'login') ? 'active' : 'last'); ?>">
							<a href="<?= base_url('login') ?>">เข้าสู่ระบบ</a>
						</li>
					<?php } else { ?>
						<li>
							<p class="navbar-text">คุณ<?= $name_session ?></p>
						</li>
						<li class="<?= (($page == 'logout') ? 'active' : 'last'); ?>">
							<a href="<?= base_url('login/logout') ?>">ออกจากระบบ</a>
						</li>
					<?php } ?>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>


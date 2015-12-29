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
		<?= js_asset("prettify.js"); ?>
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.css"/>

		<!-- don't forget to change key -->
 		<script src="http://api.longdo.com/map/?key=612b42f7cde55f7577cf077d729321b8"></script>

		<script type="text/javascript" src="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script>
			$(function() {
				$("#datepicker").datepicker();
			});
		</script>
	</head>

	<body>


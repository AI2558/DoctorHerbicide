<style type="text/css">
	.thumbnails li img {
		width: 225px;
		height: 225px;
	}

	.thumbnails {
		color: black;
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$('[data-toggle="tooltip"]').tooltip();
		$("select").imagepicker({
			show_label : true
		});

		$('#example').DataTable({
			"ordering" : false,
			"info" : false,
			"bFilter" : false,
			"bLengthChange" : false
		});

		$('.img-zoom').hover(function() {
			$(this).addClass('transition');

		}, function() {
			$(this).removeClass('transition');
		});
	});

	$(function() {
		$("#weed_select").change(function() {
			var studentNmae = $('option:selected', this).attr('weed_name');
			$('#name').val(studentNmae);
		});
	});
</script>

<div class="container">
	<div class="jumbotron text-center">
		<form id="weed_form" name="weed_form" action="<?= base_url('home/weed') ?>" method="post" role="form">
			<select id="weed_select" name="weed_select" class="image-picker show-html show-label">
				<option value=""></option>
				<?php 
				$i=1;
				foreach ($weed_name as $r) { 
				?>
				<option data-img-src="<?= base_url('assets') . '/' . $r['path_image'] ?>" weed_name="<?= $r['CommonName'] ?>" value="<?= $i ?>" ><?= $r['CommonName'] ?></option>
				<?php
				$i++;
				}
				?>
			</select>
			<input type='hidden' id="name" name="name" value=""/>
			<button class=" btn btn-primary btn-lg" type="submit" id="weed_submit" name="weed_submit">ยืนยัน</button>
		</form>
	</div>
</div>
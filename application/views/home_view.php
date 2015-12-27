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
	<!-- Main component for a primary marketing message or call to action -->
	<?php if($information != null || $anti!= null) { ?>
	<div class="jumbotron">
		<div class=" text-center">
			<h2 class="well"><?= $information[0]['CommonName']; ?></h2>
			<img class="img-thumbnail" src="<?= base_url('assets') . '/' . $information[0]['path_image'] ?>" width='300' height='300' />
		</div>
		<br />		
		<br />
		<div class="about col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h1>วิธีป้องกัน</h1>
      <?php $x = explode(".", $information[0]['Prevention']); ?>
      <?php for($i=1; $i<sizeof($x); $i++)  { ?>
      <p><?= $i ?>. <?= $x[$i] ?></p>
      <?php } ?>	</div>
		<div class="contact col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h1>ระบบนิเวศ</h1>
			<?php $x = explode("-", $information[0]['Ecology']); ?>
			<?php for($i=1; $i<sizeof($x); $i++)  { ?>
			<p>- <?= $x[$i] ?></p>
			<?php } ?>
		</div>
		
		<br />		
		<br />
		<table id="example" class="display text-center table table-hover" cellspacing="0" border="1" width="100%" style="background-color: #333222">
        <thead>
            <tr>
                <th class="text-center">รูปภาพ</th>
                <th class="text-center">ชื่อการค้า</th>
                <th class="text-center">ชื่อสามัญ</th>
            </tr>
        </thead>
        <tbody>
        	<?php if($anti != null ) { foreach ($anti as $r) { ?>
            <tr>
            	<!-- <td><?= $r['group'] ?></td> -->
            	<td><img onerror="this.src='http://10.2.23.154/weed/assets/images/pill/no_image.png'" class="img-responsive img-rounded center-block img-zoom" src='<?= base_url("assets/images/pill/" . $r["trade_name"]) . ".png" ?>' /></td>
            	<td style="vertical-align:middle"><?= $r['trade_name'] ?></td>
            	<td style="vertical-align:middle"><?= $r['common_name'] ?></td>
            </tr>
            <?php }} ?>
       </tbody>
       </table>
	</div>
	<?php } ?>
	<div class="jumbotron text-center">
		<form id="weed_form" name="weed_form" action="<?= base_url('home/weed') ?>" method="post" role="form">
			<!-- <a href="#" onclick="document.location=this.id+'.html';return false;"><img data-img-src="<?= base_url('assets/images/หญ้าดอกขาว.png') ?>" alt="bottle" class="thumbnails" /></a> -->
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
			<button class="btn btn-primary btn-lg" type="submit" id="weed_submit" name="weed_submit">ยืนยัน</button>
		</form>
	</div>
</div>


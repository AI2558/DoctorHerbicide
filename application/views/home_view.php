<style type="text/css">
	.thumbnails li img {
		width: 225px;
		height: 225px;
	}

	.thumbnails {
		color: black;
	}
</style>
<script>
	$(document).ready(function() {
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
</script>

<div class="container">
	<!-- Main component for a primary marketing message or call to action -->
	<?php if($anti != null) { ?>
	<div class="jumbotron text-center">
		<h2 class="well"><?= $anti[0]['weed_name']; ?></h2>
		<img class="img-thumbnail" src="<?= base_url('assets/images/' . $anti[0]['weed_name'] . '.png') ?>" width='300' height='300' />
		<br />		
		<br />
		<table id="example" class="display text-center table table-hover" cellspacing="0" border="1" width="100%" style="background-color: #333222">
        <thead>
            <tr>
                <th class="text-center">รูปภาพ</th>
                <th class="text-center">ชื่อการค้า</th>
                <th class="text-center">ชื่อสามัญ</th>
                <th class="text-center">กลไกการเข้าทำลายพืช</th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach ($anti as $r) { ?>
            <tr>
            	<!-- <td><?= $r['group'] ?></td> -->
            	<td><img onerror="this.src='http://localhost/weed/assets/images/pill/no_image.png'" class="img-responsive img-rounded center-block img-zoom" src='<?= base_url("assets/images/pill/" . $r["trade_name"]) . ".png" ?>' /></td>
            	<td style="vertical-align:middle"><?= $r['trade_name'] ?></td>
            	<td style="vertical-align:middle"><?= $r['common_name'] ?></td>
                <td style="vertical-align:middle"><?= $r['trick'] ?></td>
            </tr>
            <?php } ?>
       </tbody>
       </table>
	</div>
	<?php } ?>
	<div class="jumbotron text-center">
		<form id="weed_form" name="weed_form" action="<?= base_url('home/weed') ?>" method="post" role="form">
			<!-- <a href="#" onclick="document.location=this.id+'.html';return false;"><img data-img-src="<?= base_url('assets/images/หญ้าดอกขาว.png') ?>" alt="bottle" class="thumbnails" /></a> -->
			<select id="weed_select" name="weed_select" class="image-picker show-html show-label">
				<option value=""></option>
				<option data-img-src="<?= base_url('assets/images/หญ้าดอกขาว.png') ?>" value="1" >หญ้าดอกขาว</option>
				<option data-img-src="<?= base_url('assets/images/หญ้าข้าวนก.png') ?>" value="2" >หญ้าข้าวนก</option>
				<option data-img-src="<?= base_url('assets/images/หญ้าแดง.png') ?>" value="3" >หญ้าแดง</option>
				<option data-img-src="<?= base_url('assets/images/ข้าววัชพืช.png') ?>" value="4" >ข้าววัชพืช</option>
				<option data-img-src="<?= base_url('assets/images/เทียนนา.png') ?>" value="5" >เทียนนา</option>
				<option data-img-src="<?= base_url('assets/images/ผักปอดนา.png') ?>" value="6" >ผักปอดนา</option>
				<option data-img-src="<?= base_url('assets/images/ขาเขียด.png') ?>" value="7" >ขาเขียด</option>
				<option data-img-src="<?= base_url('assets/images/ตาลปัตรฤาษี.png') ?>" value="8" >ตาลปัตรฤาษี</option>
				<option data-img-src="<?= base_url('assets/images/หนวดปลาดุก.png') ?>" value="9" >หนวดปลาดุก</option>
				<option data-img-src="<?= base_url('assets/images/กกขนาก.png') ?>" value="10" >กกขนาก</option>
				<option data-img-src="<?= base_url('assets/images/กกทราย.png') ?>" value="11" >กกทราย</option>
			</select>
			<button class="btn btn-primary btn-lg" type="submit" id="weed_submit" name="weed_submit">ยืนยัน</button>
		</form>
	</div>

</div>


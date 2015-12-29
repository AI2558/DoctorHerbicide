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


	<?php //if($information != null || $anti!= null) { ?>
	<div class="jumbotron">
		<div class="text-center">
			<h2 class="well"><?= $information[0]['CommonName']; ?></h2>
			<img class="img-thumbnail" src="<?= base_url('assets') . '/' . $information[0]['path_image'] ?>" width='300' height='300' />
		</div>
		<br />		
		<br />
		<div class="about col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="panel panel-info" style="margin: 10px">
        <div class="panel-heading">
          <h3 class="panel-title">วิธีป้องกัน</h3>
        </div>
        <div class="panel-body">
          <?php $x = explode('.', $information[0]['Prevention']); ?>
          <?php for($i=1; $i<sizeof($x); $i++)  { ?>
          <?= $i ?>. <?= $x[$i] ?>
          <br /><br />
          <?php } ?>	
        </div>
      </div>
    </div>
		<div class="contact col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="panel panel-info" style="margin: 10px">
        <div class="panel-heading">
          <h3 class="panel-title">ระบบนิเวศ</h3>
        </div>
        <div class="panel-body">
			   <?php $x = explode("-", $information[0]['Ecology']); ?>
			   <?php for($i=1; $i<sizeof($x); $i++)  { ?>
			     - <?= $x[$i] ?>
           <br /><br />
			   <?php } ?>
        </div>
      </div>
		</div>
		
		<br />		
		<br />
		<table id="example" class="display text-center table table-hover" cellspacing="0" border="1" width="100%" style="background-color: #333222">
      <thead>
        <tr>
          <th class="text-center">รูปภาพ</th>
          <th class="text-center">ชื่อการค้า</th>
          <th class="text-center">ชื่อสามัญ</th>
          <th class="text-center">ข้อมูล</th>
        </tr>
      </thead>
      <tbody>
        <?php if($anti != null ) { foreach ($anti as $r) { ?>
          <tr>
          	<td><img onerror="this.src='<?= base_url("assets/images/pill/no_image").".png" ?>';" class="img-responsive img-rounded center-block img-zoom" src='<?= base_url("assets/images/pill/" . $r["trade_name"]) . ".png" ?>' /></td>		
          	<td style="vertical-align:middle"><?= $r['trade_name'] ?></td>
          	<td style="vertical-align:middle"><?= $r['common_name'] ?></td>
          	<td style="vertical-align:middle">
          		<form id="med_form" name="med_form" action="<?= base_url('medicine/show') ?>" method="post" role="form">
          			<input type='hidden' id="name" name="name" value="<?= $r['trade_name'] ?>"/>
					<button class="btn btn-primary btn-lg" type="submit" id="weed_submit" name="weed_submit">ดูรายละเอียด</button>
          		</form>
          	</td> 
          </tr>
        <?php }} ?>
      </tbody>
    </table>
	</div>
	<?php //} ?>
					
	</div>
</div>
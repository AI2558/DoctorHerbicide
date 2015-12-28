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

  $(function() {
    $("#med_select").change(function() {
      var studentNmae = $('option:selected', this).attr('med_name');
      $('#name').val(studentNmae);
    });
  });
</script>

<div class="container">
	<?php if($information != null) { ?>
	<div class="jumbotron">
    <div class="text-center">
		  <h2 class="well"><?= $information[0]['name']; ?></h2>
		  <img class="img-thumbnail" src="<?= base_url('assets/images/pill/' . $information[0]['name'] . '.png') ?>" width='300' height='300' />
		</div>
    <br />		
		<br />
    <div class="row">
  		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="panel panel-info" style="margin: 10px">
          <div class="panel-heading">
            <h3 class="panel-title">ประโยชน์</h3>
          </div>
          <div class="panel-body">
            <?= $information[0]['benefit'] ?>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="panel panel-info" style="margin: 10px">
          <div class="panel-heading">
            <h3 class="panel-title">วิธีใช้</h3>
          </div>
          <div class="panel-body">
            <?= $information[0]['manual'] ?>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="panel panel-info" style="margin: 10px">
          <div class="panel-heading">
            <h3 class="panel-title">วิธีเก็บรักษา</h3>
          </div>
          <div class="panel-body">
             <?php if($information[0]['keep'] != null) { ?>
              <?= $information[0]['keep'] ?>
            <?php } else { ?>
              <p class="text-center">-</p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
	</div>
	<?php } ?>
	<div class="jumbotron text-center">
		<form id="med_form" name="med_form" action="<?= base_url('medicine/show') ?>" method="post" role="form">
			<select id="med_select" name="med_select" class="image-picker show-html show-label">
				<option value=""></option>
        <?php 
        $i=1;
        foreach ($trade_name as $r) { 
        ?>
				<option data-img-src="<?= base_url('assets') . '/' . $r['image'] ?>" med_name="<?= $r['name'] ?>" value="<?= $i ?>" ><?= $r['name'] ?></option>
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


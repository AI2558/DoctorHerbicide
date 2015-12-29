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
			
			<?php
			foreach ($weed as $name){
			?>
			<div style="border-radius: 25px; border: 2px solid #3333CC;">
			<div class="row" >
			<?php
				$i=0;
				foreach ($weed_name as $r) {
			?>
				<?php
					if ($i==3) break;
					else if( strcmp($name['CommonName'],$r['CommonName']) == 0){
						$i++;
				?>
					<div class="col-xs-6 col-md-4">
					<img src="<?= base_url('assets') . '/' . $r['path_image'] ?>" style="width: 80%; height: 200px; margin-left: auto;margin-right: auto" class="img-responsive" alt="Responsive image">
					</div>
			<?php
					}
				}

				if($i != 3){
					do{
			?>
						<div class="col-xs-6 col-md-4"></div>
			<?php
					$i++;
					}while($i<3);
				}
			?>
			<br>
			</div>
			<div class="container">
				<form id="weed_form" name="weed_form" action="<?= base_url('home2/weed') ?>" method="post" role="form">
						
						<input type='hidden' id="name" name="name" value="<?= $name['CommonName']  ?>"/>
					<button class=" btn btn-primary btn-lg" type="submit" id="weed_submit" name="weed_submit"><?= $name['CommonName']  ?></button>
				</form>
			</div>
			</div>
			<br>
			<?php
			}
			?>
			
		
	</div>
</div>
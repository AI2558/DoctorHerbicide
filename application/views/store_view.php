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
		$('#example').DataTable({
			"ordering" : false,
			"info" : false,
			"bLengthChange" : false,
      "pageLength": 16
		});

		$('.img-zoom').hover(function() {
			$(this).addClass('transition');

		}, function() {
			$(this).removeClass('transition');
		});
	});
</script>
<table id="example" class="display text-center table table-hover" cellspacing="0" border="1" width="100%" style="background-color: #333222">
  <thead>
    <tr>
      <th class="text-center">ชื่อร้านค้า</th>
      <th class="text-center">ภาค</th>
      <th class="text-center">จังหวัด</th>
    </tr>
  </thead>
  <tbody>
    <?php if($store != null ) { foreach ($store as $r) { ?>
      <tr>
      	<td style="vertical-align:middle"><?= $r['store_name'] ?></td>
      	<td style="vertical-align:middle"><?= $r['area'] ?></td>
      	<td style="vertical-align:middle"><?= $r['province'] ?></td>
      </tr>
    <?php }} ?>
  </tbody>
</table>

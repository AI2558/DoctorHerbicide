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
    $('#map_show').hide()
		$('#example').DataTable({
			"ordering" : false,
			"info" : false,
			"bLengthChange" : false,
      "pageLength": 10
		});

    $('#example2').DataTable({
      "ordering" : false,
      "info" : false,
      "bLengthChange" : false,
      "pageLength": 5
    });

		$('.img-zoom').hover(function() {
			$(this).addClass('transition');

		}, function() {
			$(this).removeClass('transition');
		});

    // กำหนดขนาดแผนที่
    resize()
    window.addEventListener('resize', resize)
  
    map = new longdo.Map({ 
      placeholder: document.getElementById('map') 
    });
    var longitude = "<?= $store[0]['longitude'] ?>"
    var latitude = "<?= $store[0]['latitude'] ?>"
    var store_name = "<?= $store[0]['store_name'] ?>"
    var province = "<?= $store[0]['area'] ?>"
    map.Route.add(new longdo.Marker(
      { lon: longitude, lat: latitude },
      { title: store_name, detail: "จังหวัด " + province }
    ));
    map.location({ lon:longitude, lat:latitude }, true)
	});

  function resize() {
    var style = document.getElementById('map').style
    style.height = (window.innerHeight - 400) + 'px'
  }

  $(function() {
    $('.show_map_btn').on('click', function () {  
      resize()
      window.addEventListener('resize', resize)

      map = new longdo.Map({ 
        placeholder: document.getElementById('map') 
      });
      var longitude = $(this).parent().parent().children().eq(5).html()
      var latitude = $(this).parent().parent().children().eq(4).html()
      var store_name = $(this).parent().parent().children().eq(0).html()
      var province = $(this).parent().parent().children().eq(2).html()
      map.Route.add(new longdo.Marker(
        { lon: longitude, lat: latitude },
        { title: store_name, detail: "จังหวัด " + province }
      ));
      map.location({ lon:longitude, lat:latitude }, true)
      $('#map_show').show()
    })  
  })
</script>
<div id="map_show">
  <div id="map"></div>
</div>
<table id="example" class="display text-center table table-hover" cellspacing="0" border="1" width="100%">
  <thead>
    <tr>
      <th class="text-center">ชื่อร้านค้า</th>
      <th class="text-center">ภาค</th>
      <th class="text-center">จังหวัด</th>
      <th class="text-center">ดูแผนที่</th>
      <th hidden>latitude</th>
      <th hidden>longitude</th>
      <th class="text-center">ยาที่จำหน่าย</th>
      <th hidden>id</th>
    </tr>
  </thead>
  <tbody>
    <?php if($store != null ) { foreach ($store as $r) { ?>
      <tr>
      	<td style="vertical-align:middle" id="store_name" name="store_name"><?= $r['store_name'] ?></td>
      	<td style="vertical-align:middle"><?= $r['area'] ?></td>
      	<td style="vertical-align:middle"><?= $r['province'] ?></td>
        <td align='center'><button class='btn btn-primary show_map_btn'>รายละเอียด</button></td>
        <td align='center' style='max-width:300px; width: 30px' hidden><?= $r['latitude'] ?></td>
        <td align='center' style='max-width:300px; width: 30px' hidden><?= $r['longitude'] ?></td>
        <td align='center' style='max-width:300px; width: 30px' hidden><?= $r['id'] ?></td>
        <td align='center'><button class='btn btn-primary' data-toggle='modal' data-target='#myModal2'>รายละเอียด</button></td>
      </tr>
    <?php }} ?>
  </tbody>
</table>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ยาที่จำหน่าย</h4>
      </div>
      <div class="modal-body">
      <div id="show_tableplease"></div>
              <table id="example2" class="display text-center table table-hover" cellspacing="0" border="1" width="100%">
          <thead>
            <tr>
              <th class="text-center">ชื่อยา</th>
              <th class="text-center">ชื่อสามัญ</th>
              <th class="text-center">ราคา</th>
            </tr>
          </thead>
          <tbody>
          <?php if($store_medicine != null) { ?>
            <?php foreach ($store_medicine as $r) { ?>
              <tr>
                <td style="vertical-align:middle"><?= $r['name'] ?></td>
                <td style="vertical-align:middle"><?= $r['common_name'] ?></td>
                <td style="vertical-align:middle"><?= $r['price'] ?></td>
              </tr>
          <?php }} ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>
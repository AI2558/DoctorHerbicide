<style type="text/css">
#map { float: right; }
#result { margin: 4px; width: 262px; float: left; overflow-y: auto; }

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
			"info" : false,
			"bFilter" : false,
			"bLengthChange" : false
		});

		$('.img-zoom').hover(function() {
			$(this).addClass('transition');

		}, function() {
			$(this).removeClass('transition');
		});
	
    resize()
    window.addEventListener('resize', resize)
    
    map = new longdo.Map({
      zoom: 14,
      placeholder: document.getElementById('map'),
    });

    map.Route.placeholder(document.getElementById('result'));

    var longitude = "<?= $pick_store[0]['longitude'] ?>"
    var latitude = "<?= $pick_store[0]['latitude'] ?>"
    var store_name = "<?= $pick_store[0]['store_name'] ?>"
    var province = "<?= $pick_store[0]['area'] ?>"
    
    var user_longitude = "<?= $user_longitude ?>"
    var user_latitude =  "<?= $user_latitude ?>"
    var user_title = "คุณอยู๋ที่นี่"

    map.Route.add(new longdo.Marker(
      { lon: user_longitude, lat: user_latitude },
      { title: "พิกัด", detail: user_title}
    ));
    map.location({ lon:user_longitude, lat:user_latitude }, true)    
    map.Route.add(
      { lon: longitude, lat: latitude },
      { title: store_name, detail: "จังหวัด " + province }
    );
    map.Route.search();
  });

  function resize() {
    var style = document.getElementById('map').style;
        style.height = (window.innerHeight - 68) + 'px';
        style.width = (window.innerWidth - 270) + 'px';
        
        var style = document.getElementById('result').style;
        style.height = (window.innerHeight - 68) + 'px';
  }

  $(function() {
    $("#med_select").change(function() {
      var studentNmae = $('option:selected', this).attr('med_name');
      $('#name').val(studentNmae);
    });
  });
</script>

<div class="container">
	<?php //if($information != null) { ?>
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
	<?php //} ?>
	<div class="jumbotron">
    <div class="text-center">
      <h2 class="well">ร้านค้าที่ใกล้ที่สุด (<strong><?= $pick_store[0]['store_name'] ?></strong>-<?= $pick_store[0]['province'] ?>)</h2>
    </div>
    <table id="example" class="table table-striped table-bordered table-hover" border="0" cellspacing="0" width="100%">
      <thead>
          <tr>
            <th>ลำดับ</th>
            <th>ชื่อสามัญ</th>
            <th>ชื่อการค้า</th>
            <th>ราคา</th>
          </tr>
      </thead>
      <tbody>
      <?php
        if ($medicine > 0 && isset($medicine[0]['common_name'])) {
          $i=1;
          foreach ($medicine as $r) {
            echo "<tr id='" . $r['id'] . "' >";
            echo "<td align='center' style='max-width:300px; width: 30px'>{$i}</td>";
            echo "<td >{$r['name']}</td>";
            if($r['common_name'] == null) {
              echo "<td>-</td>";
            } else {
              echo "<td>{$r['common_name']}</td>";
            } 
            echo "<td>{$r['price']}</td>";
            echo "</tr>";
            $i++;
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<div id="result"></div>
<div id="map"></div>      

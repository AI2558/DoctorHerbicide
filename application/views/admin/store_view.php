<style>
  .box9 {
    padding: 10px;
    position: relative;
    border: 1px solid rgba(0,0,0,0.1);
    border-radius: 20px;
    background: white;
    -webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
  }

  .box9 img {
    width: 100%;
    margin-top: 15px;
  }
</style>
<div class="container">
  <div class="jumbotron">
    <h1>ชื่อสหกร<small>อะไรดีน้า</small></h1>
  </div>
    <div class="row">
      <div class="col-sm-4 box9">
        <div id="map"></div>
      </div>
      <div class="col-sm-push-1 col-sm-7">
      <form class="" id="table_form"  action="" role="form" method="post">
        <table id="example" class="table table-striped table-bordered table-hover" border="0" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อสามัญ</th>
                  <th>ชื่อการค้า</th>
                  <th>ราคา</th>
                  <th>แก้ไข</th>
                  <th>ลบ</th>
                  <th hidden>store_med</th>
                  <th hidden>med</th>
              </tr>
          </thead>
          <tbody>
          <?php
            if ($medicine > 0) {
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
                echo "<td align='center'>" . "<a class='mouse_hover edit'><img src=" . base_url('assets/images/icon/setting.png') . " data-toggle='modal' data-target='#myModal'></td>";
                echo "<td align='center'>" . "<a href='" . base_url('admin/store/remove') . '/' . $r['id'] . "' class='mouse_hover remove'><img src=" . base_url('assets/images/icon/remove.png') . "></td>";
                echo "<td align='center' style='max-width:300px; width: 30px' hidden>{$r['id']}</td>"; 
                echo "<td align='center' style='max-width:300px; width: 30px' hidden>{$r['med_id']}</td>";   
                echo "</tr>";
                $i++;
              }
            }
            ?>
          </tbody>
        </table>
      </form>
      <a class='mouse_hover add'><img src=<?= base_url('assets/images/icon/add_icon.png')?> data-toggle='modal' data-target='#myModal2' />
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">แก้ไข</h4>
      </div>
      <form class="form-horizontal" id='edit_form' name="edit_form" action="<?= base_url('admin/store/edit') ?>" role='form' method='post'>
        <div class="modal-body">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">ชื่อสามัญ</label>
            <div class="col-sm-4">
              <select class="form-control" id="select_name" name="select_name">
                <?php foreach ($medicine_name as $r) { ?>
                <option value="<?= $r['name'] ?>"><?= $r['name'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">ชื่อการค้า</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="market_name" name="market_name" placeholder="ชื่อการค้า" readonly="" />
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label">ราคา</label>
            <div class="col-sm-4">
              <div class="input-group">
                <input type="text" class="form-control" id="price" name="price" placeholder="ราคา">
                <div class="input-group-addon">บาท</div>
              </div>
            </div>
          </div>
          <input type="text" id="id_edit" name="id_edit" hidden>
          <input type="text" id="med_id_edit" name="med_id_edit" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
          <button type="submit" class="btn btn-primary">ยืนยัน</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูล</h4>
      </div>
      <form class="form-horizontal" id='add_form' name="add_form" action="<?= base_url('admin/store/add') ?>" role='form' method='post'>
        <div class="modal-body">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">ชื่อสามัญ</label>
            <div class="col-sm-4">
              <select class="form-control" id="add_select_name" name="add_select_name">
                <?php foreach ($medicine_name as $r) { ?>
                <option value="<?= $r['name'] ?>"><?= $r['name'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">ราคา</label>
            <div class="col-sm-4">
              <div class="input-group">
                <input type="text" class="form-control" id="add_price" name="add_price" placeholder="ราคา">
                <div class="input-group-addon">บาท</div>
              </div>
            </div>
          </div>
          <input type="text" id="store_id" name="store_id" value="<?= $medicine[0]['store_id'] ?>" hidden>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
          <button type="submit" class="btn btn-primary">ยืนยัน</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  var map;
  var point;

  $( document ).ready(function() {
    // กำหนดขนาดแผนที่
    resize();
    window.addEventListener('resize', resize);
  
    map = new longdo.Map({ 
      placeholder: document.getElementById('map') 
    });

    map.location({ lon:100.0104824, lat:14.40488213 }, true);
    map.Route.add(new longdo.Marker(
      { lon: 100.0104824, lat: 14.40488213 },
      { title: 'สหกรA', detail: 'detail' },
      { zoom: '15'}
    ));

    $('#example').DataTable({
      "info" : false,
      "bFilter" : false,
      "bLengthChange" : false,
      "pageLength": 5
    });
  })
  
  function resize() {
    var style = document.getElementById('map').style
    style.height = (window.innerHeight - 400) + 'px';

  }

  $(function () {   
    $('.edit').on('click', function () {  
      var value = $(this).parent().parent().children().eq(1).html()
      $('#select_name').val(value)

      value = $(this).parent().parent().children().eq(2).html()
      $('#market_name').val(value)

      value = $(this).parent().parent().children().eq(3).html()
      $('#price').val(value)

      value = $(this).parent().parent().children().eq(6).html()
      $('#id_edit').val(value)

      value = $(this).parent().parent().children().eq(7).html()
      $('#med_id_edit').val(value)
    });

    $('.remove').on('click', function () {  
      var value = $(this).parent().parent().children().eq(1).html()
      $('#select_name').val(value)

      value = $(this).parent().parent().children().eq(2).html()
      $('#market_name').val(value)

      value = $(this).parent().parent().children().eq(3).html()
      $('#price').val(value)

      value = $(this).parent().parent().children().eq(6).html()
      $('#id_edit').val(value)

      value = $(this).parent().parent().children().eq(7).html()
      $('#med_id_edit').val(value)
    });
  });
</script>


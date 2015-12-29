<div class = "container">
  <div class="wrapper">
    <form role="form" class="form-signin form-horizontal" id="submit_url" name="submit_url" action="<?= base_url('admin/store/check_added') ?>" method="post">
      <h3 class="form-signin-heading">เพิ่มร้านค้า</h3>
      <hr class="colorgraph"><br>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">ชื่อสหกรณ์</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="store_name" name="store_name" placeholder="ชื่อสหกรณ์" required="" autofocus="" />
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">จังหวัด</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="province" name="province" placeholder="จังหวัด" required="" autofocus="" />
        </div>
      </div>
        <div class="form-group">
        <div class="col-sm-6">
          <input type="text" class="form-control" id="latitude" name="latitude" placeholder="latitude" required="" autofocus="" />
        </div>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="longitude" name="longitude" placeholder="longitude" required="" autofocus="" />
        </div>
        </div>
      <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">ยืนยัน</button>        
    </form>     
  </div>
</div>
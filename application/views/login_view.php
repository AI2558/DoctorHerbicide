<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-info" style="margin: 10px">
        <div class="panel-heading">
          <h3 class="panel-title">เข้าสู่ระบบ</h3>
        </div>
        <div class="panel-body">
         <form role="form" class="form-inline" id="submit_url" name="submit_url" action="<?= base_url('login/check') ?>" method="post">
            <?php if($url_api_value != null)  { ?>
            <div class="form-group">
              <input type="text" class="form-control" id="url_api" name="url_api" placeholder="รหัสบัตรประชาชน" value=<?= $url_api_value ?> />
            </div>
            <?php } else { ?>
            <div class="form-group">
              <input type="text" class="form-control" id="url_api" name="url_api" placeholder="รหัสบัตรประชาชน" />
            </div>
            <?php } ?>  
            <button type="submit" class="btn btn-primary">ยืนยัน</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


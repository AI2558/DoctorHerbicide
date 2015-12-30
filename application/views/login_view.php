
<div class="container">
  
 <form role="form" class="form-signin" id="submit_url" name="submit_url" action="<?= base_url('login/check') ?>" method="post">
    <?php if($url_api_value != null)  { ?>
    <div class="form-group">
      <input type="text" class="form-control" id="url_api" name="url_api" placeholder="รหัสบัตรประชาชน" value=<?= $url_api_value ?> />
    </div>
    <?php } else { ?>
    <div class="form-group">
      <input type="text" class="form-control" id="url_api" name="url_api" placeholder="รหัสบัตรประชาชน" />
    </div>
    <?php } ?>  
    <button type="submit" class="btn btn-lg btn-primary btn-block">เข้าสู่ระบบ</button>
    <br />
    <div class="text-center">
      หรือ<a href="<?= base_url('home') ?>">บุคลคนทั่วไป</a>
    </div>
  </form>
  
</div>
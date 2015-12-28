<<<<<<< HEAD
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
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>หมอยาวัชพืช</title>
>>>>>>> ee834b987b942b3a757f863e9c138662826c0667

    <!-- Bootstrap core CSS -->
    <?= css_asset('lavish-bootstrap.css'); ?>
    <!-- Custom styles for this template -->
    <?= css_asset("signin.css"); ?>

    <!-- JQuery -->
    <?= js_asset("bower_components/jquery/dist/jquery.js"); ?>

    <!-- js_bootstrap-->
    <?= js_asset("bootstrap.js"); ?>
  </head>

  <body>

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
        </form>
      </div>

  </body>
</html>
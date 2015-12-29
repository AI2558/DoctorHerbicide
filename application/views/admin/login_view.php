<div class = "container">
  <div class="wrapper">
    <form role="form" class="form-signin" id="submit_url" name="submit_url" action="<?= base_url('admin/login/authorize') ?>" method="post">
      <h3 class="form-signin-heading">ยินดีต้อนรับ! เข้าสู่ระบบ</h3>
      <hr class="colorgraph"><br>
      <?php if($err != null) { ?>
        <div class="alert alert-danger">
          <strong>เกิดข้อผิดพลาด!</strong> <?= $err; ?>
        </div>
      <?php } ?>
      <input type="text" class="form-control" id="username" name="username" placeholder="ชื่อผู้ใช้" required="" autofocus="" />
      <input type="password" class="form-control" name="password" name="password" placeholder="รหัสผ่าน" required=""/>          
      <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">เข้าสู่ระแบบ</button>        
    </form>     
  </div>
</div>
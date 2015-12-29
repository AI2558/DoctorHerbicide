<style type="text/css">
.fixedbutton {
  position: fixed;
  top: 0px;
  right: 0px; 
}
</style>

<div class="container" style="padding-bottom: 50px">
  <div class="row">
    <?php foreach ($store as $r) { ?>
    <div class="col-sm-4" style="padding-top: 10px">
      <div class="text-center" style="background-color: white; border-radius: 5%; padding-top: 10px; padding-bottom: 10px;">
      <form id="store_form" name="store_form" action="<?= base_url('admin/store/r') . '/' . $r['id'] ?>" method="get" role"form">
        <img src="<?= base_url('assets/images/icon/shop.png') ?>" width="256" />
        <label><h3><?= $r['store_name'] ?><small>(<?= $r['province'] ?>)</small></h3></label><br />
        <button type="submit" class="btn btn-primary">แก้ไข</button>
      </form>
      <form id="store_form" name="store_form" action="<?= base_url('admin/store/r') . '/' . $r['id'] ?>" method="get" role"form">
        <!-- <button type="submit" class="btn btn-danger">ลบ</button> -->
       </form>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<form id="store_form" name="store_form" action="<?= base_url('admin/store/add_store') ?>" method="post" role"form">
  <button type="submit" class="form-control btn btn-warning fixedbutton">เพิ่มร้านค้า</button>
</form>
<div class="container">
  <div class="row">
    <?php foreach ($store as $r) { ?>
    <div class="col-sm-4" >
      <div class="text-center" style="background-color: white; border-radius: 5%; padding-top: 10px; padding-bottom: 10px;">
      <form id="store_form" name="store_form" action="<?= base_url('admin/store/r') . '/' . $r['id'] ?>" method="get" role"form">
        <img src="<?= base_url('assets/images/icon/shop.png') ?>" width="256" />
        <label><h3><?= $r['store_name'] ?><small>(<?= $r['province'] ?>)</small></h3></label><br />
        <button type="submit" class="btn btn-primary">แก้ไข</button>
      </form>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
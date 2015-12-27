<style type="text/css">
  .jumbotron {
    color: black;
  }
</style>
<script type="text/javascript">
  var counter = 1;
  var limit = 25;
  var i=2;
  function addInput(divName){
       if (counter == limit)  {
            alert("You have reached the limit of adding " + counter + " inputs");
       }
       else {
            var newdiv = document.createElement('div');
            newdiv.innerHTML = "<br /><select name='select" + i + "' class='form-control'><?php foreach ($weed as $r) { ?><option value='<?= $count ?>'><?= $r['CommonName'] ?></option><?php } ?></select>";
            document.getElementById(divName).appendChild(newdiv);
            counter++;
            i++;
       }
  }
</script>
<div class="container">
	<div class="jumbotron">
    <form class="form-horizontal" id="weed_form" name="weed_form" action="<?= base_url('report/save') ?>" method="post" role="form">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">จังหวัด</label>
        <div class="col-sm-10">
          <label class="control-label"><?= $id[0]["province"] ?></label> 
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">วัชพืชที่พบ</label>
        <div class="col-sm-3" id="dynamicInput">
          <select name="select1" class="form-control">
          <?php 
          $i=1;
          foreach ($weed as $r) { ?>
            <option value="<?= $i ?>"><?= $r['CommonName'] ?></option>
          <?php 
          $i++;
          } 
          ?>
          </select>
        </div>
        <div class="col-sm-2">
          <input class="form-control" type="button" value="เพิ่มวัชพืช" onClick="addInput('dynamicInput');">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">ยืนยัน</button>
        </div>
      </div>
    </form>
	</div>
</div>


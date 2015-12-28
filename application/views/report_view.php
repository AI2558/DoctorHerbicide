<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({
      "ordering" : false,
      "info" : false,
      "bFilter" : false,
      "bLengthChange" : false
    });
  });

  var counter = 1;
  var limit = 25;
  var i=2;
  function addInput(divName){
       if (counter == limit)  {
            alert("You have reached the limit of adding " + counter + " inputs");
       }
       else {
            var newdiv = document.createElement('div');
            newdiv.innerHTML = "<br /><select name='select" + i + "' class='form-control'><?php foreach ($weed as $r) { ?><option value=<?= $r['CommonName'] ?>><?= $r['CommonName'] ?></option><?php } ?></select>";
            document.getElementById(divName).appendChild(newdiv);
            counter++;
            i++;
       }
  }
</script>
<div class="container">
	<div class="jumbotron">
  <h1 class="text-center">วัชพืชที่พบ<small>ในแต่ละจังหวัด</small></h1><br />
    <table id="example" class="display text-center table table-hover" cellspacing="0" border="1" width="100%" style="background-color: #AAAAAA">
      <thead>
        <tr>
            <th class="text-center">จังหวัด</th>
            <th class="text-center">วัชพืชที่พบ</th>
            <th class="text-center">จำนวน(คน)</th>
        </tr>
      </thead>
      <tbody>
        <?php if($show_table != null ) { foreach ($show_table as $r) { ?>
          <tr>
            <td style="vertical-align:middle"><?= $r['province'] ?></td>
            <td style="vertical-align:middle"><?= $r['weed_name'] ?></td>
            <td style="vertical-align:middle"><?= $r['count'] ?></td>
          </tr>
        <?php }} ?>
      </tbody>
    </table>
  </div>
  <div class="jumbotron">
    <h1 class="text-center">เพิ่มข้อมูล</h1><br />
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
          foreach ($weed as $r) { ?>
            <option value=<?= $r['CommonName'] ?>><?= $r['CommonName'] ?></option>
          <?php 
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


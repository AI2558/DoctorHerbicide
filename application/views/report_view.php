<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({
      "ordering" : false,
      "info" : false,
      "bFilter" : false,
      "bLengthChange" : false
    });

    $('#example2').DataTable({
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
<script type="text/javascript"
  src="https://www.google.com/jsapi?autoload={
    'modules':[{
      'name':'visualization',
      'version':'1',
      'packages':['corechart']
    }]
  }">
</script>

<script type="text/javascript">
  google.setOnLoadCallback(drawChart);

  function drawChart() {
    var graph_show = <?php echo json_encode($chart, JSON_PRETTY_PRINT) ?>;
    //alert(graph_show['0']['count'])
    // alert("<?= $chart[0]['count'] ?>")
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'วัชพืช');
    data.addColumn('number', 'จำนวนทั้งหมดที่พบ');
    // data.addColumn('number', graph_show[2]['province']);
    // data.addColumn('number', graph_show[3]['province']);
    // data.addColumn('number', graph_show[4]['province']);
    for(i=0; i<graph_show.length; i++) {
      data.addRows([[graph_show[i]['weed_name'], parseInt(graph_show[i]['count'])]]);
    }

    var options = {
      title: 'วัชพืชที่พบมากที่สุด',
      //curveType: 'function',
      width: 1000,
      height: 500,
      bar: {groupWidth: "95%"},
      legend: { position: 'none' }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_values'));

    chart.draw(data, options);

    
  }
</script>

<div class="container">
  <center><div id="columnchart_values" style="width: 1000px; height: 500px"></div></center>
	<div class="jumbotron">
  <h1 class="text-center">วัชพืชที่พบ<small>ในแต่ละจังหวัด</small></h1><br />
    <table id="example" class="display text-center table table-hover" cellspacing="0" border="1" width="100%" style="background-color: #ABCDEF">
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
    <h1 class="text-center">รายชื่อชาวนา<small>ที่รายงานวัชพืช</small></h1><br />
    <table id="example2" class="display text-center table table-hover" cellspacing="0" border="1" width="100%" style="background-color: #ABCDEF">
      <thead>
        <tr>
            <th class="text-center">ชื่อ - นามสกุล</th>
            <th class="text-center">จังหวัด</th>
            <th class="text-center">วัชพืช</th>
            <th class="text-center">จำนวน(ครั้ง)</th>
        </tr>
      </thead>
      <tbody>
        <?php if($show_people_table != null ) { foreach ($show_people_table as $r) { ?>
          <tr>
            <td style="vertical-align:middle"><?= $r['first_name'] . " " , $r['last_name'] ?></td>
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
          <input class="btn btn-info" type="button" value="เพิ่มวัชพืช" onClick="addInput('dynamicInput');">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">ยืนยัน</button>
        </div>
      </div>
    </form>
	</div>
</div>


<?php
  include('../includes/database_connection.php');
  include('../includes/session.php');
  include('../includes/header.php');
  require ('../../vendor/phpqrcode-based64/phpqrcode.php');


  if(isset($_POST['search'])){

    $_SESSION['Ofactory']=$_POST['factory'];
    $_SESSION['OstartDate']=$_POST['startDate'];
    $_SESSION['OendDate']=$_POST['endDate'];
  }
  if(!isset($_POST['search'])){
    $_SESSION['Ofactory']=NULL;
    $_SESSION['OstartDate']=NULL;
    $_SESSION['OendDate']=NULL;
  }

  $sql = "SELECT * FROM DimPlant WITH (NOLOCK);";
  $stmt = $connect->prepare($sql);
  $stmt->execute();
  $Dimplant = $stmt->fetchAll();

?>

  <body>
    <div id="wrapper">
      <?php include('../navbar/navbar.php');?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">FG 概括 SO 数字二维码生成器</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="panel panel-primary" >
          <div class="panel-heading">
          二维码表格
          </div>
          <!-- /.panel-heading -->

          <div class="panel-body">

            <form method="POST">

              <?php

              $previousSO = null;
              if(isset($_POST['SONumber'])){
                $previousSO = $_POST['SONumber'];
              } ?>

              <div class="col-md-2">
                <div class="form-group">
                  <label>Factory</label>
                  <select class="form-control fstdropdown-select" id="PlantKey" name="PlantKey" required></td>
                  <option class="form-control" name="PlantKey" value=""> 工厂</option>
                  <?php foreach ($Dimplant as $row) { ?>
                  <option name="PlantKey" value="<?php echo $row['PlantName'];?>"><?php echo $row['PlantName']; }?></option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col-md-2 -->
              <div class="col-md-2">
                <div class="form-group">
                  <label>SO 数字</label>
                  <input class="form-control" type="number" name="SONumber" id="SONumber" value="
                  <?php echo $previousSO ?>" required>
                  <div id="checkkSO"></div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col-md-2 -->


              <button class="btn btn-success" name="generate" style="margin-top:25px;">
                <i class="fa fa-qrcode"></i>
                生成二维码
              </button>

            </form>
            <br>

            <div class="col-md-12">

              <!-- /.QR Code -->
              <?php   if(isset($_POST['generate'])){
                $url = "http://172.16.10.61:8011/";
                $url .= "pages/QRCode/table-FG-QrCode.php?SONumber=";
                $url .= $_POST['SONumber'];
                $url .= "&Factory=";
                $url .= $_POST['PlantKey'];

                // echo $url;

                ob_start();
                 $returnData = QRcode::pngString($url);
                 $imageString = base64_encode(ob_get_contents());
               ob_end_clean();
                 $str = "data:image/png;base64," . $imageString;
                ?>

              生成的二维码：工厂 <?php echo $_POST['PlantKey']; ?>, SO 编号 <?php echo $_POST['SONumber']; ?>
              <br />
              <img src="<?php echo $str; ?>" height="300px">


            <?php

              } ?>
            </div>
            <!-- /.col-md-12 -->

          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

      </div>
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

  <?php   include('../FG/script.php'); ?>
  <script>

  $("#SONumber").keyup(function(){

    var SONumber = $(this).val().trim();
    if(SONumber != ''){

      $("#checkkSO").show();



          if(SONumber.match(/\d/g).length === 10){
            $("#checkkSO").html("<span style='color:green;'>Good</span>");
            //$("#BatchNumber").val("");
          }else{
            $("#checkkSO").html("<span style='color:red;'>Must be 10 digit</span>");
          }

    }else{
      $("#checkkSO").hide();
    }
  });

  </script>

    <script>
      $(document).ready(function(){

        $('#tableID').dataTable({
          "autoWidth": false,
          columnDefs: [
            { width: 2000, targets: 6 }
        ],
          pageLength: 10,
          "dom": 'Bfrtip',
          buttons: [
            {extend :'excel',
            text:'Export to Excel',
            footer: true,
            exportOptions: {
              columns: [ 1, 2, 3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51 ],
              format : {
                header : function (mDataProp, columnIdx) {
                  var htmlText = '<span>' + mDataProp + '</span>';
                  var jHtmlObject = jQuery(htmlText);
                  jHtmlObject.find('div').remove();
                  var newHtml = jHtmlObject.text();
                  console.log('My header > ' + newHtml);
                  return newHtml;
                }
              }
            }
          }
          ]
        }).yadcf([
          {column_number: 1, filter_default_label: "Select"},
          {column_number: 2, filter_default_label: "Select"},
          {column_number: 3, filter_default_label: "Select"},
          {column_number: 4, filter_default_label: "Select"},
          {column_number: 5, filter_default_label: "Select"},
          {column_number: 6, filter_default_label: "Select"},
          {column_number: 7, filter_default_label: "Select"},
          {column_number: 8, filter_default_label: "Select"},
          {column_number: 9, filter_default_label: "Select"},
          {column_number: 10, filter_default_label: "Select"},
          {column_number: 12, filter_default_label: "Select"},
          {column_number: 13, filter_default_label: "Select"},
          {column_number: 14, filter_default_label: "Select"},
          {column_number: 15, filter_default_label: "Select"},
          {column_number: 16, filter_default_label: "Select"},
          {column_number: 17, filter_default_label: "Select"},
          {column_number: 18, filter_default_label: "Select"},
          {column_number: 18, filter_default_label: "Select"},
          {column_number: 19, filter_default_label: "Select"},
          {column_number: 20, filter_default_label: "Select"},
          {column_number: 21, filter_default_label: "Select"},
          {column_number: 22, filter_default_label: "Select"},
          {column_number: 23, filter_default_label: "Select"},
          {column_number: 24, filter_default_label: "Select"},
          {column_number: 25, filter_default_label: "Select"},
          {column_number: 26, filter_default_label: "Select"},
          {column_number: 27, filter_default_label: "Select"},
          {column_number: 28, filter_default_label: "Select"},
          {column_number: 29, filter_default_label: "Select"},
          {column_number: 30, filter_default_label: "Select"},
          {column_number: 31, filter_type: "range_date",  date_format : "dd/mm/yyyy"},
          {column_number: 32, filter_type: "range_date",  date_format : "dd/mm/yyyy"},
          {column_number: 33, filter_default_label: "Select"},
          {column_number: 34, filter_default_label: "Select"},
          {column_number: 35, filter_type: "range_date",  date_format : "dd/mm/yyyy"},
          {column_number: 36, filter_default_label: "Select"},
          {column_number: 37, filter_default_label: "Select"},
          {column_number: 38, filter_default_label: "Select"},
          {column_number: 39, filter_default_label: "Select"},
          {column_number: 40, filter_default_label: "Select"},
          {column_number: 41, filter_default_label: "Select"},
          {column_number: 42, filter_default_label: "Select"},
          {column_number: 43, filter_default_label: "Select"},
          {column_number: 44, filter_default_label: "Select"},
          {column_number: 45, filter_default_label: "Select"},
          {column_number: 46, filter_default_label: "Select"},
          {column_number: 47, filter_default_label: "Select"},
          {column_number: 48, filter_default_label: "Select"},
          {column_number: 49, filter_default_label: "Select"},
          {column_number: 50, filter_default_label: "Select"},
          {column_number: 51, filter_default_label: "Select"},
        ]);

      });
    </script>
    <style>

      table.dataTable thead th.brandHead{
        padding: 3px 70px 3px 10px;
      }

    </style>
  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  </body>
</html>

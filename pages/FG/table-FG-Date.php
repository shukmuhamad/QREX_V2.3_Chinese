<?php
  include('../includes/database_connection.php');
  include('../includes/session.php');
  include('../includes/header.php');


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
?>

  <body>
    <div id="wrapper">
      <?php include('../navbar/navbar.php');?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">FG 按日期汇总</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="panel panel-primary" >
          <div class="panel-heading">
            FG 按日期汇总
          </div>
          <!-- /.panel-heading -->

          <div class="panel-body">

            <form method="POST">

              <div class="col-md-2">
                <div class="form-group">
                  <?php
                    $smt = $connect->prepare('SELECT PlantName From DimPlant');
                    $smt->execute();
                    $data = $smt->fetchAll();
                  ?>

                  <label>工厂</label>
                  <select class="form-control" name="factory" required>
                    <?php if($_SESSION['Ofactory'] != ''){
                      ?>
                      <option value="<?php echo $_SESSION['Ofactory'];?>"><?php echo $_SESSION['Ofactory'];?></option>
                      <?php
                    }else{
                      ?>
                      <option value="">选择工厂</option>
                      <?php
                    } ?>
                    <?php
                      foreach ($data as $row){
                    ?>
                    <option value="<?php echo $row['PlantName'];?>"><?php echo $row['PlantName'];}?></option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col-md-2 -->

              <div class="col-md-2">
                <div class="form-group">
                  <label>开始日期</label>
                  <input class="form-control" type="date" name="startDate" onkeydown="return false"
                  value="<?php
                  if($_SESSION['OstartDate'] != ''){
                    echo date('Y-m-d', strtotime($_SESSION['OstartDate']));
                  }else{}
                    ?>" required>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col-md-2 -->

              <div class="col-md-2">
                <div class="form-group">
                  <label>结束日期</label>
                  <input class="form-control" type="date" name="endDate" onkeydown="return false"
                  value="<?php
                  if($_SESSION['OendDate'] != ''){
                    echo date('Y-m-d', strtotime($_SESSION['OendDate']));
                  }else{}
                    ?>" required>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col-md-2 -->

              <button class="btn btn-success" name="search" style="margin-top:25px;">
                <i class="fa fa-search"></i>
                搜索
              </button>

            </form>
            <br>

            <div class="col-md-12">

              <div class="table-responsive">

                <table class="table table-bordered" id="tableID" width="30%" cellspacing="0">
                  <thead>


                    <tr class="info">
                      <th rowspan="2">行动</th>
                      <th rowspan="2">顾客</th>
                      <th rowspan="2">SO 数字</th>
                      <th rowspan="2">项目编号</th>
                      <th rowspan="2" class="brandHead">品牌</th>
                      <th rowspan="2">产品</th>
                      <th rowspan="2">产品代码</th>
                      <th rowspan="2">手套尺寸</th>
                      <th rowspan="2">Lot 数数</th>
                      <th rowspan="2">Pallet No</th>
                      <th rowspan="2">纸箱数量</th>
                      <th rowspan="2">检验计数</th>
                      <th rowspan="2">样本量 VT (Visual Test)</th>
                      <th rowspan="2">样本量 APT/WTT level 1</th>
                      <th rowspan="2">样本量 APT/WTT level 2</th>
                      <th colspan="6">验收</th>
                      <th rowspan="2">处置</th>
                      <th colspan="7">缺陷</th>
                      <th rowspan="2">工厂</th>
                      <th rowspan="2">颜色</th>
                      <th rowspan="2">检验日期</th>
                      <th rowspan="2">生产日期</th>
                      <th rowspan="2">生产线</th>
                      <th rowspan="2">转移</th>
                      <th rowspan="2">包装日期</th>
                      <th rowspan="2">类别</th>
                      <th rowspan="2">批号</th>
                      <th rowspan="2">纸箱号</th>
                      <th rowspan="2">手套重量</th>
                      <th rowspan="2">总体 AQL</th>
                      <th rowspan="2">UD 结果代码</th>
                      <th rowspan="2">数数</th>
                      <th rowspan="2">包装缺陷</th>
                      <th rowspan="2">整体内部物理测试</th>
                      <th rowspan="2">Donning and Tearing</th>
                      <th rowspan="2">整体物理尺寸测试</th>
                      <th rowspan="2">Lot ID</th>
                      <th rowspan="2">查看 By(Badge ID)</th>
                      <th rowspan="2">查看 By(姓名)</th>
                      <th rowspan="2">核实 By(Badge ID)</th>
                      <th rowspan="2">核实 By(姓名)</th>
                    </tr>

                    <tr class="info">
                      <th>验收孔 1</th>
                      <th>验收孔 2</th>
                      <th>Acc 危急 NFG</th>
                      <th>Acc 危急 NAG</th>
                      <th>Acc Major</th>
                      <th>Acc Minor</th>
                      <th>总屏障</th>
                      <th>总孔数 1</th>
                      <th>总孔数 2</th>
                      <th>关键缺陷总数 NFG</th>
                      <th>关键缺陷总数 NAG</th>
                      <th>总缺陷数 Major</th>
                      <th>总缺陷数 Minor</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                    if(isset($_POST['search'])){

                      $factory=$_POST['factory'];
                      $_SESSION['Ofactory']=$_POST['factory'];

                      $startDate=date('Y-m-d', strtotime($_POST['startDate']));
                      $_SESSION['OstartDate']=$_POST['startDate'];

                      $endDate=date('Y-m-d', strtotime($_POST['endDate'].'+ 1day'));
                      $_SESSION['OendDate']=$_POST['endDate'];


                      $null = NULL;


                      $query="{CALL SP_View_All_FG(?, ?, ?)}";

                      $stmt=$connect->prepare($query);
                      $stmt->bindParam(1, $factory);
                      $stmt->bindParam(2, $startDate);
                      $stmt->bindParam(3, $endDate);
                      $stmt->execute();

                      while ($row=$stmt->fetch()){
                  ?>

                    <tr class="text-center">
                      <td>
                        <a class="btn btn-success" href="viewPage-FG.php?LotIDKey=<?php echo $row['LotIDKey'];?>&RecordID=<?php echo $row['RecordID'];?>" target="_blank">
                          VIEW
                        </a>
                      </td>
                      <td><?php echo $row['CustomerName'];?></td>
                      <td><?php echo $row['SONumber'];?></td>
                      <td><?php echo $row['SOItemNumber'];?></td>
                      <td><?php echo $row['BrandName'];?></td>
                      <td><?php echo $row['GloveProductTypeName'];?></td>
                      <td><?php echo $row['GloveCodeLong'];?></td>
                      <td><?php echo $row['GloveSizeCodeLong'];?></td>
                      <td><?php echo $row['LotCount'];?></td>
                      <td><?php echo $row['PalletNumber'];?></td>
                      <td><?php echo $row['CartonQuantity'];?></td>
                      <td><?php echo $row['InspectionCount'];?></td>
                      <td><?php echo $row['SampleSizeVisual'];?></td>
                      <td><?php echo $row['SampleSizeAPT/WTTLevel1'];?></td>
                      <td><?php echo $row['SampleSizeAPT/WTTLevel2'];?></td>
                      <td><?php echo $row['AcceptanceHoles1'];?></td>
                      <td><?php echo $row['AcceptanceHoles2'];?></td>
                      <td><?php echo $row['AcceptanceNonFunctionalCritical'];?></td>
                      <td><?php echo $row['AcceptanceNonAcceptableCritical'];?></td>
                      <td><?php echo $row['AcceptableMajorVisual'];?></td>
                      <td><?php echo $row['AcceptableMinorVisual'];?></td>
                      <td><?php echo $row['FinalDisposition'];?></td>
                      <!-- total holes is total barrier = total holes 1 + total holes 2 + total NFG-->
                      <td><?php echo $row['TotalHoles'];?></td>
                      <?php if($row['TotalHoles1'] <= $row['AcceptanceHoles1']){ ?>
                      <td bgcolor="#7cff76">
                      <?php }else{ ?>
                      <td bgcolor="#ff6767"> <?php } ?>
                      <?php echo $row['TotalHoles1'];?></td>

                      <?php if($row['TotalHoles2'] <= $row['AcceptanceHoles2']){ ?>
                      <td bgcolor="#7cff76">
                      <?php }else{ ?>
                      <td bgcolor="#ff6767"> <?php } ?>
                      <?php echo $row['TotalHoles2'];?></td>


                      <?php if($row['TotalNonFunctionalCritical'] <= $row['AcceptanceNonFunctionalCritical']){ ?>
                      <td bgcolor="#7cff76">
                      <?php }else{ ?>
                      <td bgcolor="#ff6767"> <?php } ?>
                      <?php echo $row['TotalNonFunctionalCritical'];?></td>


                      <?php if($row['TotalNAG_CP'] <= $row['AcceptanceNonAcceptableCritical']){ ?>
                      <td bgcolor="#7cff76">
                      <?php }else{ ?>
                      <td bgcolor="#ff6767"> <?php } ?>
                      <?php echo $row['TotalNAG_CP'];?></td>


                      <?php if($row['TotalDefectMajorVisual'] <= $row['AcceptableMajorVisual']){ ?>
                      <td bgcolor="#7cff76">
                      <?php }else{ ?>
                      <td bgcolor="#ff6767"> <?php } ?>
                      <?php echo $row['TotalDefectMajorVisual'];?></td>


                      <?php if($row['TotalDefectMinorVisual'] <= $row['AcceptableMinorVisual']){ ?>
                      <td bgcolor="#7cff76">
                      <?php }else{ ?>
                      <td bgcolor="#ff6767"> <?php } ?>
                      <?php echo $row['TotalDefectMinorVisual'];?></td>


                      <td><?php echo $row['Factory'];?></td>
                      <td><?php echo $row['GloveColourName'];?></td>
                      <td><?php echo date('d/m/Y',strtotime($row['RecordCreatedDateTime']));?></td>
                      <td><?php
                      $prodDate = (explode(",",$row['ProductionDate']));
                      //echo $row['ProductionDate']."<br /><br />";
                      for($i = 0; $i < count($prodDate); $i++){
                        echo date('d/m/Y',strtotime($prodDate[$i])).",<br />";
                      }

                      ?></td>
                      <td><?php echo $row['ProductionLine'];?></td>
                      <td><?php echo $row['Shift'];?></td>
                      <td><?php echo date('d/m/Y',strtotime($row['PackingDate']));?></td>
                      <td><?php echo $row['InspectionPlanName'];?></td>
                      <td><?php echo $row['BatchNumber'];?></td>
                      <td><?php echo $row['CartonNumber'];?></td>
                      <td><?php echo $row['GloveWeightAverage'];?></td>
                      <td><?php echo $row['OverallAQL'];?></td>
                      <td><?php echo $row['UDResultCode'];?></td>
                      <td><?php echo $row['CountingTest'];?></td>
                      <td><?php echo $row['PackagingDefectTestValue'];?></td>
                      <td><?php echo $row['OverallIPTVALUE'];?></td>
                      <td><?php echo $row['DonningTearingTest'];?></td>
                      <td><?php echo $row['OverallPDTVALUE'];?></td>
                      <td><?php echo $row['LotIDKey'];?></td>
                      <td><?php echo $row['InspectionUserID'];?></td>
                      <td><?php echo $row['InspectorName'];?></td>
                      <td><?php echo $row['VerifierID'];?></td>
                      <td><?php echo $row['VerifierName'];?></td>
                    </tr>

                  <?php }} ?>
                  </tbody>
                </table>

              </div>
              <!-- /.table-responsive -->

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

  <?php   include('script.php'); ?>

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
          {column_number: 37, filter_type: "text"},
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

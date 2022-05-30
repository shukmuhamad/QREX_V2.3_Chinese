<?php
  include('../includes/database_connection.php');
  include('../includes/session.php');
  include('../includes/header.php');


  if(isset($_POST['search'])){

    $_SESSION['Ofactory']=$_POST['factory'];
    $_SESSION['OsoNumber']=$_POST['soNumber'];
    $_SESSION['OitemNumber']=$_POST['itemNumber'];
  }
  if(!isset($_POST['search'])){
    $_SESSION['Ofactory']=NULL;
    $_SESSION['OsoNumber']=NULL;
    $_SESSION['OitemNumber']=NULL;
  }
?>

  <body>
    <div id="wrapper">
      <?php include('../navbar/navbar.php');?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">FG Lot 概括 by SO 编号和项目编号</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="panel panel-primary" >
          <div class="panel-heading">
            FG Lot 概括 by SO 编号和项目编号
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
                  <label>SO 编号</label>
                  <input class="form-control" type="number" name="soNumber"
                  value="<?php
                  if($_SESSION['OsoNumber'] != ''){
                    echo $_SESSION['OsoNumber'];
                  }else{}
                    ?>" required>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col-md-2 -->

              <div class="col-md-2">
                <div class="form-group">
                  <label>项目编号</label>
                  <input class="form-control" type="number" name="itemNumber"
                  value="<?php
                  if($_SESSION['OitemNumber'] != ''){
                    echo $_SESSION['OitemNumber'];
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
                      <th rowspan="2">SO 编号</th>
                      <th rowspan="2">顾客</th>
                      <th rowspan="2">项目编号</th>
                      <th rowspan="2">Lot 数字</th>
                      <th rowspan="2">产品</th>
                      <th rowspan="2">产品代码</th>
                      <th rowspan="2">手套尺寸</th>
                      <th rowspan="2">生产日期</th>
                      <th rowspan="2">Lot 数数</th>
                      <th rowspan="2">总托盘</th>
                      <th rowspan="2">纸箱数量</th>
                      <th rowspan="2">检验计数</th>
                      <th rowspan="2">样本量 VT (Visual Test)</th>
                      <th rowspan="2">样本量 APT/WTT level 1</th>
                      <th rowspan="2">样本量 APT/WTT level 2</th>
                      <th colspan="6">验收</th>
                      <th rowspan="2">处置</th>
                      <th colspan="7">缺陷</th>
                      <th rowspan="2">工厂</th>
                      <th rowspan="2" class="brandHead">品牌</th>
                      <th rowspan="2">颜色</th>
                      <th rowspan="2">类别</th>
                      <th rowspan="2">手套重量</th>
                      <th rowspan="2">总体 AQL</th>
                      <th rowspan="2">UD 结果代码</th>
                      <th rowspan="2">数数</th>
                      <th rowspan="2">包装缺陷</th>
                      <th rowspan="2">整体内部物理测试</th>
                      <th rowspan="2">Donning and Tearing</th>
                      <th rowspan="2">整体物理尺寸测试</th>
                      <th rowspan="2">纸箱号</th>
                    </tr>

                    <tr class="info">
                      <th>验收孔 1</th>
                      <th>验收孔 2</th>
                      <th>Acc 危急 NFG</th>
                      <th>Acc 危急 NAG</th>
                      <th>Acc 主修</th>
                      <th>Acc 次要的</th>
                      <th>总屏障</th>
                      <th>总洞 1</th>
                      <th>总洞 2</th>
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

                      $soNumber=$_POST['soNumber'];
                      $_SESSION['OsoNumber']=$_POST['soNumber'];

                      $itemNumber=$_POST['itemNumber'];
                      $_SESSION['OitemNumber']=$_POST['itemNumber'];


                      $null = NULL;


                      // $query="
                      // SELECT top(200) [RecordID]
                      // ,[FGCondition]
                      // ,[LotIDKey]
                      // ,[PalletID]
                      // ,[SONumber]
                      // ,[SOItemNumber]
                      // ,[LotCount]
                      // ,[Factory]
                      // ,[CustomerName]
                      // ,[BrandName]
                      // ,[GloveProductTypeName]
                      // ,[GloveCodeLong]
                      // ,[GloveColourName]
                      // ,[GloveColourCode]
                      // ,[GloveSizeCodeLong]
                      // ,[GloveSurfaceCode]
                      // ,[ProductionDate]
                      // ,[ProductionLine]
                      // ,[Shift]
                      // ,[PackingDate]
                      // ,[InspectionPlanName]
                      // ,[BatchNumber]
                      // ,[CartonQuantity]
                      // ,[PalletNumber]
                      // ,[CartonNumber]
                      // ,[InspectionCount]
                      // ,[RecordCreatedDateTime]
                      // ,[InspectionUserID]
                      // ,[InspectorName]
                      // ,[VerifierID]
                      // ,[VerifierName]
                      // ,[SampleSizeVisual]
                      // ,[SampleSizeAPT/WTTLevel1]
                      // ,[SampleSizeAPT/WTTLevel2]
                      // ,[TotalHoles]
                      // ,[TotalHoles1]
                      // ,[TotalHoles2]
                      // ,[TotalNonFunctionalCritical]
                      // ,[TotalNAG_CP]
                      // ,[TotalDefectMajorVisual]
                      // ,[TotalDefectMinorVisual]
                      // ,[AcceptanceHoles1]
                      // ,[AcceptanceHoles2]
                      // ,[AcceptanceNonFunctionalCritical]
                      // ,[AcceptanceNonAcceptableCritical]
                      // ,[AcceptableMajorVisual]
                      // ,[AcceptableMinorVisual]
                      // ,[OverallAQL]
                      // ,[FinalDisposition]
                      // ,[UDResultCode]
                      // ,[LayeringTest]
                      // ,[DonningTearingTest]
                      // ,[CountingTest]
                      // ,[GloveWeightAverage]
                      // ,[PackagingDefectTestValue]
                      // ,[OverallIPTVALUE]
                      // ,[OverallPDTVALUE]
                      // FROM [dbo].[View_all_FG_Lot_Record]
                      // WHERE Factory = ? and SONumber = ? and SOItemNumber = ?";
                      $query = "{CALL SP_View_All_FG_Alt(?,?,?)}";

                      $stmt=$connect->prepare($query);
                      $stmt->bindParam(1, $factory);
                      $stmt->bindParam(2, $soNumber);
                      $stmt->bindParam(3, $itemNumber);
                      $stmt->execute();
                      $tablebyPallet = $stmt->fetchAll();
                      $stmt-> closeCursor();

                      // print_r($tablebyPallet);

                      $query="
                      SELECT a.RecordID
                    	  ,b.LotIDKey
                    	  ,a.DefectCode
                    	  ,a.DefectTypeName
                        ,a.DefectValue
                      FROM [QAPQC02].[dbo].[View_DefectNamebyRecordID] a Inner join T_Record_Master b
                      on a.RecordID = b.RecordID
                      where a.RecordID IN (SELECT RecordID FROM View_all_FG_Lot_Record
                      WHERE Factory = ? and SONumber = ? and SOItemNumber = ?)
                      AND DefectValue > 0";

                      $stmt=$connect->prepare($query);
                      $stmt->bindParam(1, $factory);
                      $stmt->bindParam(2, $soNumber);
                      $stmt->bindParam(3, $itemNumber);
                      $stmt->execute();
                      $tableDefect = $stmt->fetchAll();
                      $stmt-> closeCursor();

                      // print_r($tableDefect);


                      // GET DISTINCT for SIZE
                      $distinct_size = array();
                      $loopcount = 0;
                      $key = 0;
                      foreach ($tablebyPallet as $column) {
                        // code...
                        foreach ($distinct_size as $row) {
                          // code...
                          if($row == $column['GloveSizeCodeLong']){
                            $key ++;
                          }
                        }
                        if($key == 0){
                          $distinct_size[$loopcount] = $column['GloveSizeCodeLong'];
                          $loopcount ++;
                        }
                        $key = 0;
                      }


                      // GET DISTINCT for LotCount
                      $distinct_lotCount = array();
                      $loopcount = 0;
                      $key = 0;
                      foreach ($tablebyPallet as $column) {
                        // code...
                        foreach ($distinct_lotCount as $row) {
                          // code...
                          if($row == $column['LotCount']){
                            $key ++;
                          }
                        }
                        if($key == 0){
                          $distinct_lotCount[$loopcount] = $column['LotCount'];
                          $loopcount ++;
                        }
                        $key = 0;
                      }

                      // GET DISTINCT for FGcondition
                      $distinct_condition = array();
                      $loopcount = 0;
                      $key = 0;
                      foreach ($tablebyPallet as $column) {
                        // code...
                        foreach ($distinct_condition as $row) {
                          // code...
                          if($row == $column['FGCondition']){
                            $key ++;
                          }
                        }
                        if($key == 0){
                          $distinct_condition[$loopcount] = $column['FGCondition'];
                          $loopcount ++;
                        }
                        $key = 0;
                      }

                      // GET DISTINCT for Inspection Count
                      $distinct_Insp = array();
                      $loopcount = 0;
                      $key = 0;
                      foreach ($tablebyPallet as $column) {
                        // code...
                        foreach ($distinct_Insp as $row) {
                          // code...
                          if($row == $column['InspectionCount']){
                            $key ++;
                          }
                        }
                        if($key == 0){
                          $distinct_Insp[$loopcount] = $column['InspectionCount'];
                          $loopcount ++;
                        }
                        $key = 0;
                      }

                      $tablebyLot = array();
                      $tableDefectGroup = array();

                      /// GROUPING by LOT
                      foreach ($tablebyPallet as $row) {
                        // code...
                        $tablebyLot[$row['GloveSizeCodeLong']][$row['LotCount']][$row['FGCondition']][$row['InspectionCount']][] = $row;
                      }

                      /// GROUPING defect by lotID
                      foreach ($tableDefect as $defectrow) {
                        // code...
                        $tableDefectGroup[$defectrow['LotIDKey']][] = $defectrow;
                      }

                      // echo "<br />";
                      // print_r($tablebyLot);
                      // echo "<br />";
                      // echo "<br />";
                      // print_r($distinct_size);
                      // echo "<br />";
                      // echo "<br />";
                      // print_r($distinct_lotCount);
                      // echo "<br />";
                      // echo "<br />";
                      // print_r($distinct_condition);
                      // echo "<br />";
                      // echo "<br />";
                      // print_r($distinct_Insp);
                      // echo "<br />";
                      // echo "<br />";

                      $summary_Table_byLot = array();
                      $temp_arr = array();
                      $Lot_array = array();
                      $arr_i = 0;
                      $tab_i = 0;
                      $CartonQuantity = 0;
                      $cartonNumber_temp = '';
                      $samplesizeVisual = 0;
                      $samplesizeAPT1 = 0;
                      $samplesizeAPT2 = 0;
                      $totalHoles = 0;
                      $totalHoles1 = 0;
                      $totalHoles2 = 0;
                      $totalNFG = 0;
                      $totalNAG = 0;
                      $totalMajor = 0;
                      $totalMinor = 0;
                      $accHoles1 = 0;
                      $accHoles2 = 0;
                      $accNFG = 0;
                      $accNAG = 0;
                      $accMajor = 0;
                      $accMinor = 0;
                      $ovAQL = array();
                      $ovfinalD = array();
                      $ovUD = array();
                      $ovLayeringTest = array();
                      $ovDonningTearingTest = array();
                      $ovCountingTest = array();
                      $ovGloveWeightAverage = array();
                      $ovPackagingDefectTestValue = array();
                      $ovOverallIPTVALUE = array();
                      $ovOverallPDTVALUE = array();
                      $recordDate_temp = 0;
                      $prodDate_temp = 0;
                      $prodDate_temp_arr = array();
                      $defectArr_temp = array();


                      foreach ($distinct_size as $groupsize ) {
                        // code...
                        if(isset($tablebyLot[$groupsize])){
                          foreach ($distinct_lotCount as $grouplotcount) {
                            // code...
                            if(isset($tablebyLot[$groupsize][$grouplotcount])){
                              foreach ($distinct_condition as $groupcondition) {
                                // code...
                                if(isset($tablebyLot[$groupsize][$grouplotcount][$groupcondition])){
                                  foreach ($distinct_Insp as $groupInsp) {
                                    // code...


                                    if(isset($tablebyLot[$groupsize][$grouplotcount][$groupcondition][$groupInsp])){
                                      foreach ($tablebyLot[$groupsize][$grouplotcount][$groupcondition][$groupInsp] as $tablebyLotRow) {
                                        // code...

                                          // echo  "tab_i: ".$tab_i."arr_i: ".$arr_i."<br />";
                                          // echo "CartonNumber: ".$tablebyLotRow['CartonNumber']."<br />";
                                          //----------SONumber---------------------------
                                          $summary_Table_byLot['SONumber'][$tab_i] = $tablebyLotRow['SONumber'];
                                          //----------SOItemNumber---------------------------
                                          $summary_Table_byLot['SOItemNumber'][$tab_i] = $tablebyLotRow['SOItemNumber'];
                                          //----------LotNumber---------------------------
                                          $summary_Table_byLot['LotNumber'][$tab_i] = $tablebyLotRow['LotNumber'];
                                          //----------LotCount---------------------------
                                          $summary_Table_byLot['LotCount'][$tab_i] = $tablebyLotRow['LotCount'];
                                          //----------Factory---------------------------
                                          $summary_Table_byLot['Factory'][$tab_i] = $tablebyLotRow['Factory'];
                                          //----------CustomerName---------------------------
                                          $summary_Table_byLot['CustomerName'][$tab_i] = $tablebyLotRow['CustomerName'];
                                          //----------BrandName---------------------------
                                          $summary_Table_byLot['BrandName'][$tab_i] = $tablebyLotRow['BrandName'];
                                          //----------GloveProductTypeName---------------------------
                                          $summary_Table_byLot['GloveProductTypeName'][$tab_i] = $tablebyLotRow['GloveProductTypeName'];
                                          //----------GloveCodeLong---------------------------
                                          $summary_Table_byLot['GloveCodeLong'][$tab_i] = $tablebyLotRow['GloveCodeLong'];
                                          //----------GloveColourName---------------------------
                                          $summary_Table_byLot['GloveColourName'][$tab_i] = $tablebyLotRow['GloveColourName'];
                                          //----------GloveColourCode---------------------------
                                          $summary_Table_byLot['GloveColourCode'][$tab_i] = $tablebyLotRow['GloveColourCode'];
                                          //----------GloveSizeCodeLong---------------------------
                                          $summary_Table_byLot['GloveSizeCodeLong'][$tab_i] = $tablebyLotRow['GloveSizeCodeLong'];
                                          //----------GloveSurfaceCode---------------------------
                                          $summary_Table_byLot['GloveSurfaceCode'][$tab_i] = $tablebyLotRow['GloveSurfaceCode'];
                                          //----------InspectionPlanName---------------------------
                                          $summary_Table_byLot['InspectionPlanName'][$tab_i] = $tablebyLotRow['InspectionPlanName'];
                                          //----------CartonQuantity---------------------------
                                          $CartonQuantity += $tablebyLotRow['CartonQuantity'];
                                          $summary_Table_byLot['CartonQuantity'][$tab_i] = $CartonQuantity;
                                          //----------CartonNumber---------------------------
                                          if($arr_i == 0) {
                                            $cartonNumber_temp =   $cartonNumber_temp.$tablebyLotRow['CartonNumber'];
                                          }else{
                                            $cartonNumber_temp =   $cartonNumber_temp.",".$tablebyLotRow['CartonNumber'];
                                          }
                                          $summary_Table_byLot['CartonNumber'][$tab_i] = $cartonNumber_temp;
                                          //----------InspectionCount---------------------------
                                          $summary_Table_byLot['InspectionCount'][$tab_i] = $tablebyLotRow['InspectionCount'];
                                          //----------RecordCreatedDateTime---------------------------
                                          if (strtotime($tablebyLotRow['RecordCreatedDateTime']) > strtotime($recordDate_temp)){
                                            $recordDate_temp = $tablebyLotRow['RecordCreatedDateTime'];
                                            $summary_Table_byLot['RecordCreatedDateTime'][$tab_i] = date('d/m/Y',strtotime($recordDate_temp));
                                          }
                                          //----------ProductionDate---------------------------
                                          $prodDate_temp_arr = explode(',' , $tablebyLotRow['ProductionDate']);
                                         foreach ($prodDate_temp_arr as $prodDate_temp_array) {
                                           if (strtotime($prodDate_temp_array) > strtotime($prodDate_temp)){
                                             $prodDate_temp = $prodDate_temp_array;
                                             $summary_Table_byLot['ProductionDate'][$tab_i] = date('d/m/Y',strtotime($prodDate_temp));
                                           }
                                         }

                                          //----------SampleSizeVisual---------------------------
                                          $samplesizeVisual += $tablebyLotRow['SampleSizeVisual'];
                                          $summary_Table_byLot['SampleSizeVisual'][$tab_i] = $samplesizeVisual;
                                          //----------SampleSizeAPT/WTTLevel1---------------------------
                                          $samplesizeAPT1 += $tablebyLotRow['SampleSizeAPT/WTTLevel1'];
                                          $summary_Table_byLot['SampleSizeAPT/WTTLevel1'][$tab_i] = $samplesizeAPT1;
                                          //----------SampleSizeAPT/WTTLevel2---------------------------
                                          $samplesizeAPT2 += $tablebyLotRow['SampleSizeAPT/WTTLevel2'];
                                          $summary_Table_byLot['SampleSizeAPT/WTTLevel2'][$tab_i] = $samplesizeAPT2;
                                          //----------TotalHoles---------------------------
                                          $totalHoles += $tablebyLotRow['TotalHoles'];
                                          $summary_Table_byLot['TotalHoles'][$tab_i] = $totalHoles;
                                          //----------TotalHoles1---------------------------
                                          $totalHoles1 += $tablebyLotRow['TotalHoles1'];
                                          $summary_Table_byLot['TotalHoles1'][$tab_i] = $totalHoles1;
                                          //----------TotalHoles2---------------------------
                                          $totalHoles2 += $tablebyLotRow['TotalHoles2'];
                                          $summary_Table_byLot['TotalHoles2'][$tab_i] = $totalHoles2;
                                          //----------TotalNonFunctionalCritical---------------------------
                                          $totalNFG += $tablebyLotRow['TotalNonFunctionalCritical'];
                                          $summary_Table_byLot['TotalNonFunctionalCritical'][$tab_i] = $totalNFG;
                                          //----------TotalNAG_CP---------------------------
                                          $totalNAG += $tablebyLotRow['TotalNAG_CP'];
                                          $summary_Table_byLot['TotalNAG_CP'][$tab_i] = $totalNAG;
                                          //----------TotalDefectMajorVisual---------------------------
                                          $totalMajor += $tablebyLotRow['TotalDefectMajorVisual'];
                                          $summary_Table_byLot['TotalDefectMajorVisual'][$tab_i] = $totalMajor;
                                          //----------TotalDefectMinorVisual---------------------------
                                          $totalMinor += $tablebyLotRow['TotalDefectMinorVisual'];
                                          $summary_Table_byLot['TotalDefectMinorVisual'][$tab_i] = $totalMinor;
                                          //----------AcceptanceHoles1---------------------------
                                          $accHoles1 += $tablebyLotRow['AcceptanceHoles1'];
                                          $summary_Table_byLot['AcceptanceHoles1'][$tab_i] = $accHoles1;
                                          //----------AcceptanceHoles2---------------------------
                                          if(isset($tablebyLotRow['AcceptanceHoles2']) AND !empty($tablebyLotRow['AcceptanceHoles2'])){
                                            $accHoles2 += $tablebyLotRow['AcceptanceHoles2'];
                                          }

                                          $summary_Table_byLot['AcceptanceHoles2'][$tab_i] = $accHoles2;
                                          //----------AcceptanceNonFunctionalCritical---------------------------
                                          $accNFG += $tablebyLotRow['AcceptanceNonFunctionalCritical'];
                                          $summary_Table_byLot['AcceptanceNonFunctionalCritical'][$tab_i] = $accNFG;
                                          //----------AcceptanceNonAcceptableCritical---------------------------
                                          $accNAG += $tablebyLotRow['AcceptanceNonAcceptableCritical'];
                                          $summary_Table_byLot['AcceptanceNonAcceptableCritical'][$tab_i] = $accNAG;
                                          //----------AcceptableMajorVisual---------------------------
                                          $accMajor += $tablebyLotRow['AcceptableMajorVisual'];
                                          $summary_Table_byLot['AcceptableMajorVisual'][$tab_i] = $accMajor;
                                          //----------AcceptableMinorVisual---------------------------
                                          $accMinor += $tablebyLotRow['AcceptableMinorVisual'];
                                          $summary_Table_byLot['AcceptableMinorVisual'][$tab_i] = $accMinor;
                                          //----------OverallAQL---------------------------
                                          $ovAQL[$arr_i]= $tablebyLotRow['OverallAQL'];
                                          $arr_freq = array_count_values($ovAQL); arsort($arr_freq); $new_arr = array_keys($arr_freq);
                                          $summary_Table_byLot['OverallAQL'][$tab_i] = $new_arr[0];
                                          //----------FinalDisposition---------------------------
                                          $ovfinalD[$arr_i]= $tablebyLotRow['FinalDisposition'];
                                          $arr_freq = array_count_values($ovfinalD);
                                          if(isset($arr_freq['FAIL'])){
                                            $resultTest = 'FAIL';
                                          }else{
                                            $resultTest = 'PASS';
                                          }
                                          $summary_Table_byLot['FinalDisposition'][$tab_i] = $resultTest;
                                          //----------UDResultCode---------------------------
                                          $ovUD[$arr_i]= $tablebyLotRow['UDResultCode'];
                                          $arr_freq = array_count_values($ovUD); arsort($arr_freq); $new_arr = array_keys($arr_freq);
                                          $summary_Table_byLot['UDResultCode'][$tab_i] = $new_arr[0];
                                          //----------LayeringTest---------------------------
                                          $ovLayeringTest[$arr_i]= $tablebyLotRow['LayeringTest'];
                                          $arr_freq = array_count_values($ovLayeringTest); arsort($arr_freq); $new_arr = array_keys($arr_freq);
                                          $summary_Table_byLot['LayeringTest'][$tab_i] = $new_arr[0];
                                          //----------DonningTearingTest---------------------------
                                          $ovDonningTearingTest[$arr_i]= $tablebyLotRow['DonningTearingTest'];
                                          $arr_freq = array_count_values($ovDonningTearingTest);
                                          if(isset($arr_freq['FAIL'])){
                                            $resultTest = 'FAIL';
                                          }else{
                                            $resultTest = 'PASS';
                                          }
                                          $summary_Table_byLot['DonningTearingTest'][$tab_i] = $resultTest;
                                          //----------CountingTest---------------------------
                                          $ovCountingTest[$arr_i]= $tablebyLotRow['CountingTest'];
                                          $arr_freq = array_count_values($ovCountingTest);
                                          if(isset($arr_freq['FAIL'])){
                                            $resultTest = 'FAIL';
                                          }else{
                                            $resultTest = 'PASS';
                                          }
                                          $summary_Table_byLot['CountingTest'][$tab_i] = $resultTest;
                                          //----------GloveWeightAverage---------------------------
                                          $ovGloveWeightAverage[$arr_i]= $tablebyLotRow['GloveWeightAverage'];
                                          $max_arr = max($ovGloveWeightAverage);
                                          $min_arr = min($ovGloveWeightAverage);
                                          $min_max = "Min: ".$min_arr.", Max: ".$max_arr;
                                          $summary_Table_byLot['GloveWeightAverage'][$tab_i] = $min_max;
                                          //----------PackagingDefectTestValue---------------------------
                                          $ovPackagingDefectTestValue[$arr_i]= $tablebyLotRow['PackagingDefectTestValue'];
                                          $arr_freq = array_count_values($ovPackagingDefectTestValue);
                                          if(isset($arr_freq['FAIL'])){
                                            $resultTest = 'FAIL';
                                          }else{
                                            $resultTest = 'PASS';
                                          }
                                          $summary_Table_byLot['PackagingDefectTestValue'][$tab_i] = $resultTest;
                                          //----------OverallIPTVALUE---------------------------
                                          $ovOverallIPTVALUE[$arr_i]= $tablebyLotRow['OverallIPTVALUE'];
                                          $arr_freq = array_count_values($ovOverallIPTVALUE);
                                          if(isset($arr_freq['FAIL'])){
                                            $resultTest = 'FAIL';
                                          }else{
                                            $resultTest = 'PASS';
                                          }
                                          $summary_Table_byLot['OverallIPTVALUE'][$tab_i] = $resultTest;
                                          //----------OverallPDTVALUE---------------------------
                                          $ovOverallPDTVALUE[$arr_i]= $tablebyLotRow['OverallPDTVALUE'];
                                          $arr_freq = array_count_values($ovOverallPDTVALUE);
                                          if(isset($arr_freq['FAIL'])){
                                            $resultTest = 'FAIL';
                                          }else{
                                            $resultTest = 'PASS';
                                          }
                                          $summary_Table_byLot['OverallPDTVALUE'][$tab_i] = $resultTest;
                                          //----------totalPallet---------------------------
                                          $summary_Table_byLot['totalPallet'][$tab_i] = $arr_i+1;
                                          //----------DefectValues---------------------------
                                          foreach ($tableDefectGroup[$tablebyLotRow['LotIDKey']] as $defectRow) {
                                            // code...
                                            if(isset($defectArr_temp[$defectRow['DefectTypeName']][$defectRow['DefectCode']])){
                                              $defectArr_temp[$defectRow['DefectTypeName']][$defectRow['DefectCode']] += $defectRow['DefectValue'];
                                            }else{
                                              $defectArr_temp[$defectRow['DefectTypeName']][$defectRow['DefectCode']] = $defectRow['DefectValue'];
                                            }
                                          }

                                          //--------Sorting array value in descending order ---------------------
                                          if(isset($defectArr_temp['Minor Visual'])){
                                            arsort($defectArr_temp['Minor Visual']);
                                            $defectstr = json_encode(array_slice($defectArr_temp['Minor Visual'], 0, 3));
                                            $defectstr = preg_replace('/\{/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\}/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\"/', '', trim($defectstr));

                                            $summary_Table_byLot['Minor Visual'][$tab_i] = $defectstr;
                                          }else{
                                            $summary_Table_byLot['Minor Visual'][$tab_i] = '';
                                          }
                                          if(isset($defectArr_temp['Major Visual'])){
                                            arsort($defectArr_temp['Major Visual']);
                                            $defectstr = json_encode(array_slice($defectArr_temp['Major Visual'], 0, 3));
                                            $defectstr = preg_replace('/\{/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\}/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\"/', '', trim($defectstr));

                                            $summary_Table_byLot['Major Visual'][$tab_i] = $defectstr;
                                          }else{
                                            $summary_Table_byLot['Major Visual'][$tab_i] = '';
                                          }
                                          if(isset($defectArr_temp['Major Printing'])){
                                            arsort($defectArr_temp['Major Printing']);
                                            $defectstr = json_encode(array_slice($defectArr_temp['Major Printing'], 0, 3));
                                            $defectstr = preg_replace('/\{/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\}/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\"/', '', trim($defectstr));

                                            $summary_Table_byLot['Major Printing'][$tab_i] = $defectstr;
                                          }else{
                                            $summary_Table_byLot['Major Printing'][$tab_i] = '';
                                          }
                                          if(isset($defectArr_temp['Non Acceptable Critical'])){
                                            arsort($defectArr_temp['Non Acceptable Critical']);
                                            $defectstr = json_encode(array_slice($defectArr_temp['Non Acceptable Critical'], 0, 3));
                                            $defectstr = preg_replace('/\{/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\}/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\"/', '', trim($defectstr));

                                            $summary_Table_byLot['Non Acceptable Critical'][$tab_i] = $defectstr;
                                          }else{
                                            $summary_Table_byLot['Non Acceptable Critical'][$tab_i] = '';
                                          }
                                          if(isset($defectArr_temp['Non Functional Critical'])){
                                            arsort($defectArr_temp['Non Functional Critical']);
                                            $defectstr = json_encode(array_slice($defectArr_temp['Non Functional Critical'], 0, 3));
                                            $defectstr = preg_replace('/\{/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\}/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\"/', '', trim($defectstr));

                                            $summary_Table_byLot['Non Functional Critical'][$tab_i] = $defectstr;
                                          }else{
                                            $summary_Table_byLot['Non Functional Critical'][$tab_i] = '';
                                          }
                                          if(isset($defectArr_temp['Critical Printing'])){
                                            arsort($defectArr_temp['Critical Printing']);
                                            $defectstr = json_encode(array_slice($defectArr_temp['Critical Printing'], 0, 3));
                                            $defectstr = preg_replace('/\{/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\}/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\"/', '', trim($defectstr));

                                            $summary_Table_byLot['Critical Printing'][$tab_i] = $defectstr;
                                          }else{
                                            $summary_Table_byLot['Critical Printing'][$tab_i] = '';
                                          }
                                          if(isset($defectArr_temp['Holes'])){
                                            arsort($defectArr_temp['Holes']);
                                            $defectstr = json_encode(array_slice($defectArr_temp['Holes'], 0, 3));
                                            $defectstr = preg_replace('/\{/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\}/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\"/', '', trim($defectstr));

                                            $summary_Table_byLot['Holes'][$tab_i] = $defectstr;
                                          }else{
                                            $summary_Table_byLot['Holes'][$tab_i] = '';
                                          }
                                          if(isset($defectArr_temp['Holes2'])){
                                            arsort($defectArr_temp['Holes2']);
                                            $defectstr = json_encode(array_slice($defectArr_temp['Holes2'], 0, 3));
                                            $defectstr = preg_replace('/\{/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\}/', '', trim($defectstr));
                                            $defectstr = preg_replace('/\"/', '', trim($defectstr));

                                            $summary_Table_byLot['Holes2'][$tab_i] = $defectstr;
                                          }else{
                                            $summary_Table_byLot['Holes2'][$tab_i] = '';
                                          }




                                          $arr_i++;

                                      }
                                      $arr_i = 0;
                                      $CartonQuantity = 0;
                                      $cartonNumber_temp = '';
                                      $samplesizeVisual = 0;
                                      $samplesizeAPT1 = 0;
                                      $samplesizeAPT2 = 0;
                                      $totalHoles = 0;
                                      $totalHoles1 = 0;
                                      $totalHoles2 = 0;
                                      $totalNFG = 0;
                                      $totalNAG = 0;
                                      $totalMajor = 0;
                                      $totalMinor = 0;
                                      $accHoles1 = 0;
                                      $accHoles2 = 0;
                                      $accNFG = 0;
                                      $accNAG = 0;
                                      $accMajor = 0;
                                      $accMinor = 0;
                                      $ovAQL = array();
                                      $ovfinalD = array();
                                      $ovUD = array();
                                      $ovLayeringTest = array();
                                      $ovDonningTearingTest = array();
                                      $ovCountingTest = array();
                                      $ovGloveWeightAverage = array();
                                      $ovPackagingDefectTestValue = array();
                                      $ovOverallIPTVALUE = array();
                                      $ovOverallPDTVALUE = array();
                                      $recordDate_temp = 0;
                                      $prodDate_temp = 0;
                                      $prodDate_temp_arr = array();
                                      $defectArr_temp = array();

                                    }
                                  }
                                  $tab_i++;
                                }
                              }
                            }
                          }
                        }
                      }




                      // echo "<br />";
                      // echo "<br />";
                      // print_r($summary_Table_byLot);
                      // echo "<br />";
                      // echo "<br />";
                      // // echo $summary_Table_byLot['CustomerName'][0];
                      // print_r($summary_Table_byLot['CustomerName']);


                      $row_i = 0;
                      for ($row_i; $row_i < count($summary_Table_byLot['CustomerName']); $row_i++) {
                        // echo "<br />";
                        // echo "<br />".$row_i;
                        // echo $summary_Table_byLot['CustomerName'][$row_i];
                        // echo "<br />";
                        // echo "<br />";

                  ?>
                  <tr class="text-center">
                    <td><?php echo $summary_Table_byLot['SONumber'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['CustomerName'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['SOItemNumber'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['LotNumber'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['GloveProductTypeName'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['GloveCodeLong'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['GloveSizeCodeLong'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['ProductionDate'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['LotCount'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['totalPallet'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['CartonQuantity'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['InspectionCount'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['SampleSizeVisual'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['SampleSizeAPT/WTTLevel1'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['SampleSizeAPT/WTTLevel2'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['AcceptanceHoles1'][$row_i];?></td>
                    <td><?php if($summary_Table_byLot['AcceptanceHoles2'][$row_i] == 0){
                      echo "N/A";
                    }else{
                    echo $summary_Table_byLot['AcceptanceHoles2'][$row_i];
                    } ?></td>
                    <td><?php echo $summary_Table_byLot['AcceptanceNonFunctionalCritical'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['AcceptanceNonAcceptableCritical'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['AcceptableMajorVisual'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['AcceptableMinorVisual'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['FinalDisposition'][$row_i];?></td>
                    <!-- total holes is total barrier = total holes 1 + total holes 2 + total NFG-->
                    <td><?php echo $summary_Table_byLot['TotalHoles'][$row_i];?></td>
                    <?php if($summary_Table_byLot['TotalHoles1'][$row_i] <= $summary_Table_byLot['AcceptanceHoles1'][$row_i]){ ?>
                    <td bgcolor="#7cff76">
                    <?php }else{ ?>
                    <td bgcolor="#ff6767"> <?php } ?>
                    <?php
                    echo $summary_Table_byLot['TotalHoles1'][$row_i]."<br />";
                    echo $summary_Table_byLot['Holes'][$row_i];
                    ?>
                    </td>

                    <?php if($summary_Table_byLot['TotalHoles2'][$row_i] <= $summary_Table_byLot['AcceptanceHoles2'][$row_i]){ ?>
                    <td bgcolor="#7cff76">
                    <?php }else{ ?>
                    <td bgcolor="#ff6767"> <?php } ?>
                    <?php
                    if($summary_Table_byLot['AcceptanceHoles2'][$row_i] == 0){
                      echo "N/A <br />";
                    }else{
                    echo $summary_Table_byLot['TotalHoles2'][$row_i]."<br />";
                    }

                    echo $summary_Table_byLot['Holes2'][$row_i];
                    ?>
                  </td>


                    <?php if($summary_Table_byLot['TotalNonFunctionalCritical'][$row_i] <= $summary_Table_byLot['AcceptanceNonFunctionalCritical'][$row_i]){ ?>
                    <td bgcolor="#7cff76">
                    <?php }else{ ?>
                    <td bgcolor="#ff6767"> <?php } ?>
                    <?php
                    echo $summary_Table_byLot['TotalNonFunctionalCritical'][$row_i]."<br />";
                    echo $summary_Table_byLot['Non Functional Critical'][$row_i];
                    ?>
                  </td>


                    <?php if($summary_Table_byLot['TotalNAG_CP'][$row_i] <= $summary_Table_byLot['AcceptanceNonAcceptableCritical'][$row_i]){ ?>
                    <td bgcolor="#7cff76">
                    <?php }else{ ?>
                    <td bgcolor="#ff6767"> <?php } ?>
                    <?php
                    echo $summary_Table_byLot['TotalNAG_CP'][$row_i]."<br />";
                    $NAG_CP = $summary_Table_byLot['Non Acceptable Critical'][$row_i].",".$summary_Table_byLot['Critical Printing'][$row_i];
                    if($NAG_CP == ','){
                      $NAG_CP = '';
                    }
                    echo rtrim($NAG_CP, ',');
                    ?>
                  </td>


                    <?php if($summary_Table_byLot['TotalDefectMajorVisual'][$row_i] <= $summary_Table_byLot['AcceptableMajorVisual'][$row_i]){ ?>
                    <td bgcolor="#7cff76">
                    <?php }else{ ?>
                    <td bgcolor="#ff6767"> <?php } ?>
                    <?php
                    echo $summary_Table_byLot['TotalDefectMajorVisual'][$row_i]."<br />";
                    $Major = $summary_Table_byLot['Major Visual'][$row_i].",".$summary_Table_byLot['Major Printing'][$row_i];
                    if($Major == ','){
                      $Major = '';
                    }
                    echo rtrim($Major, ',');
                    ?>
                  </td>

                    <?php if($summary_Table_byLot['TotalDefectMinorVisual'][$row_i] <= $summary_Table_byLot['AcceptableMinorVisual'][$row_i]){ ?>
                    <td bgcolor="#7cff76">
                    <?php }else{ ?>
                    <td bgcolor="#ff6767"> <?php } ?>
                    <?php
                    echo $summary_Table_byLot['TotalDefectMinorVisual'][$row_i]."<br />";
                    echo $summary_Table_byLot['Minor Visual'][$row_i];
                    ?>
                  </td>


                    <td><?php echo $summary_Table_byLot['Factory'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['BrandName'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['GloveColourName'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['InspectionPlanName'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['GloveWeightAverage'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['OverallAQL'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['UDResultCode'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['CountingTest'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['PackagingDefectTestValue'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['OverallIPTVALUE'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['DonningTearingTest'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['OverallPDTVALUE'][$row_i];?></td>
                    <td><?php echo $summary_Table_byLot['CartonNumber'][$row_i];?></td>
                  </tr>

                  <?php }
                        } ?>
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
              columns: [0, 1, 2, 3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43],
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
          {column_number: 0, filter_default_label: "Select"},
          {column_number: 1, filter_default_label: "Select"},
          {column_number: 2, filter_default_label: "Select"},
          {column_number: 3, filter_default_label: "Select"},
          {column_number: 4, filter_default_label: "Select"},
          {column_number: 5, filter_default_label: "Select"},
          {column_number: 6, filter_default_label: "Select"},
          {column_number: 7, filter_type: "date",  date_format : "dd/mm/yyyy"},
          {column_number: 8, filter_default_label: "Select"},
          {column_number: 9, filter_default_label: "Select"},
          {column_number: 10, filter_default_label: "Select"},
          {column_number: 11, filter_default_label: "Select"},
          {column_number: 12, filter_default_label: "Select"},
          {column_number: 13, filter_default_label: "Select"},
          {column_number: 14, filter_default_label: "Select"},
          {column_number: 15, filter_default_label: "Select"},
          {column_number: 16, filter_default_label: "Select"},
          {column_number: 17, filter_default_label: "Select"},
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
          {column_number: 31, filter_default_label: "Select"},
          {column_number: 32, filter_default_label: "Select"},
          {column_number: 33, filter_default_label: "Select"},
          {column_number: 34, filter_default_label: "Select"},
          {column_number: 35, filter_default_label: "Select"},
          {column_number: 36, filter_default_label: "Select"},
          {column_number: 37, filter_default_label: "Select"},
          {column_number: 38, filter_default_label: "Select"},
          {column_number: 39, filter_default_label: "Select"},
          {column_number: 40, filter_default_label: "Select"},
          {column_number: 41, filter_default_label: "Select"},
          {column_number: 42, filter_default_label: "Select"},
          {column_number: 43, filter_default_label: "Select"}
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

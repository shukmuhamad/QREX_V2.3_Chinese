  <!-- Print Result  -->
  <!-- Print Result  -->
<?php
include('../includes/database_connection.php');
include('../includes/session.php');
include('../includes/header.php');

$lotID = $_GET['LotIDKey'];
$RecordID = $_GET['RecordID'];

// echo $lotID;
// echo "<br />".$RecordID;
?>

  <body>

    <nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
      <div  class = "container-fluid">
        <div class = "navbar-header">
          <a class = "navbar-brand" ><b>QUALITY RECORD E SYSTEM (QREX) - SFG</b></a>
        </div>
      </div>
    </nav>

    <?php
      $query = $connect->prepare("{CALL SP_GetLotExistingRec(?)}");
      $query -> bindParam(1, $lotID);
      $query->execute();
      $T_Lot_ProductionDateWLine = $query->fetchAll();
      $query -> nextRowset();
      $T_Lot_PackingDate = $query->fetch();
      //echo $T_Lot_PackingDate['PackingDate'];
      $query -> nextRowset();
      $T_Lot_CartonNum = $query->fetch();
      // echo $T_Lot_CartonNum['CartonNum'];
      $query -> nextRowset();
      $T_Lot_FG = $query->fetch();
      // echo $T_Lot_FG['BatchNumber'];
      $query -> nextRowset();
      $T_Lot_SFG = $query->fetch();
      // echo $T_Lot_SFG['BatchNumber'];


      $query2 = $connect->prepare("{CALL SP_GetRecordExistingRec(?)}");
      $query2 -> bindParam(1, $RecordID);
      $query2->execute();
      $T_Record_Instrument = $query2->fetchAll();
      $query2 -> nextRowset();
      $T_Record_Test = $query2->fetchAll();
      $query2 -> nextRowset();
      $T_Record_SampleSize = $query2->fetchAll();
      $query2 -> nextRowset();
      $T_Record_Defect = $query2->fetchAll();
      $query2 -> nextRowset();
      $T_Record_AQL = $query2->fetchAll();
      $query2 -> nextRowset();
      $T_Record_UDResult = $query2->fetchAll();

      $defectResult_pivot = array();
      for($i = 0; $i < count($T_Record_Defect); $i++){
        $defectResult_pivot_temp= array(
          $T_Record_Defect[$i]['DefectKey']."d"=>$T_Record_Defect[$i]['DefectValue']
        );
        $defectResult_pivot = array_merge($defectResult_pivot,$defectResult_pivot_temp);
      }


      $query3 = $connect->prepare("SELECT * FROM T_Record_Master WHERE RecordID = ?");
      $query3 -> bindParam(1, $RecordID);
      $query3 ->execute();
      $T_Record_Master = $query3->fetch();


      function callDefectValue($defectkey_,$defectResult_pivot){
        $result_ = 0;
        $zeroVal_ = '';
        if(isset($defectResult_pivot[$defectkey_.'d'])){
          $result_ = $defectResult_pivot[$defectkey_.'d'];
        }

        if($result_ == 0){
          echo $zeroVal_;
        }else{
          echo $result_;
        }

      }

      function returnDefectValue($defectkey_,$defectResult_pivot){
        $result_ = 0;
          if(isset($defectResult_pivot[$defectkey_.'d'])){
          $result_ = $defectResult_pivot[$defectkey_.'d'];
        }
        return $result_;
      }

      $testResult_pivot = array();
      for($i = 0; $i < count($T_Record_Test); $i++){
        $testResult_pivot_temp= array(
          $T_Record_Test[$i]['TestName']=>$T_Record_Test[$i]['TestValue']
        );
        $testResult_pivot = array_merge($testResult_pivot,$testResult_pivot_temp);
      }

      $testSRText_pivot = array();
      for($i = 0; $i < count($T_Record_Test); $i++){
        $testSRText_pivot_temp= array(
          $T_Record_Test[$i]['TestName']=>$T_Record_Test[$i]['SRText']
        );
        $testSRText_pivot = array_merge($testSRText_pivot,$testSRText_pivot_temp);
      }

      $AQLResult_pivot = array();
      for($i = 0; $i < count($T_Record_AQL); $i++){
        $AQLResult_pivot_temp= array(
          $T_Record_AQL[$i]['TestName']=>$T_Record_AQL[$i]['AQLValue']
        );
        $AQLResult_pivot = array_merge($AQLResult_pivot,$AQLResult_pivot_temp);
      }

    ?>

    <div class = "container-fluid">

      <div class="panel panel-primary">
        <div class="panel-heading">  
        产品信息/Product Information
        </div>

        <div class="panel-body">
          <div class="row">

            <div class="col-lg-6">

                      <div class="form-group">

                      工厂:
                        <label> <?php echo $T_Lot_SFG['PlantName'];  ?> </label>
                      </div>

                      <div class="form-group">
                        <?php $date = date("d/m/Y h:i:s A", strtotime($T_Record_Master['RecordCreatedDateTime'])); ?>
                        实施日期:
                        <label><?php echo $date;?></label>
                      </div>

                      <div class="form-group">
                      批量编号:
                        <label><?php echo $T_Lot_SFG['BatchNumber'];?></label>
                      </div>

                      <div class="form-group">
                      检验阶段:
                        <label> <?php echo 'SEMI FINISHED GOOD'?></label></br>
                      </div>

                      <div class="form-group">
                      成品标准: <label><?php echo $T_Lot_SFG['InspectionPlanName']; ?></label></br>
                      </div>

                      <div class="form-group">
                      规格:<label> <?php echo $T_Lot_SFG['GloveSizeCodeLong'];?> </label></br>
                      </div>

                      <div class="form-group">
                      检验序号:
                        <label> <?php echo $T_Record_Master['InspectionCount'];?></label></br>
                      </div>

										  <div class="form-group">
                      纸箱/袋的数量:
                        <label><?php echo $T_Lot_SFG['CartonQuantity'];?></label></br>
                      </div>

										  <div class="form-group">
                      箱号:
                        <label><?php echo $T_Lot_CartonNum['CartonNum'];?></label></br>
                      </div>

                      <div class="form-group">
                        <?php $Packdate = date("d/m/Y", strtotime($T_Lot_PackingDate['PackingDate'])); ?>
                        包装日期:
                        <label> <?php echo $Packdate ?></label>
                      </div>

                      <div class="form-group">
                      状态:
                        <label>
                        <?php if ($T_Record_Master['RecordStatusFlag'] == '1') echo "N/A";
                              if ($T_Record_Master['RecordStatusFlag'] == '2') echo "Reinspect";
                              if ($T_Record_Master['RecordStatusFlag'] == '3') echo "Convert Inspection";
                              if ($T_Record_Master['RecordStatusFlag'] == '4') echo "Repack Inspection";?>
                        </label></br>
                      </div>
                      </div>

                      <div class="col-lg-6">


				<div class="form-group">
                      顾客名称:
                        <label><?php echo $T_Lot_SFG['CustomerName'];?></label><br>
                      </div>

                      <div class="form-group">
                      品牌:
                        <label><?php echo $T_Lot_SFG['BrandName'];?></label>
                      </div>

                      <div class="form-group">
                      产品编号:
                        <label><?php echo $T_Lot_SFG['LotNumber'];?></label>
                      </div>

                      <div class="form-group">
                      品种 : <label><?php echo $T_Lot_SFG['GloveProductTypeName'];?></label>
                      </div>

                      <div class="form-group">
                      克重标准: <label><?php echo $T_Lot_SFG['GloveCodeLong'];?></label>
                      </div>

                      <div class="form-group">
                      颜色:  <label><?php echo $T_Lot_SFG['GloveColourName']; ?></label>
                      </div>

                      <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                        <tr class="info">
                          <th class="text-center" colspan="2">生产:</th>
                          <th class="text-center">班次:</th>
                        </tr>
                        <?php
                          foreach ($T_Lot_ProductionDateWLine as $row) {
                        ?>
                        <tr>
                        <?php
                            if ($row['SHIFT'] == NULL) { ?>
                            <input type="hidden" name="ProductionLineKey1" value="<?php echo $row['ProductionLineName'] ?>">
                            <input type="hidden" name="production_date1" value="<?php echo $row['ProductionDate'] ?>">
                            <input type="hidden" name="shift1" value="<?php echo $row['SHIFT'] ?>">

                            <?php } else { ?>

                          <td style="text-align:center"><?php echo $row['ProductionLineName'];}?></td>
                          <?php $ProductDate = date("d/m/Y", strtotime($row['ProductionDate'])); ?>
                          <td style="text-align:center"><?php echo $ProductDate;?></td>
                          <td style="text-align:center"><?php echo $row['SHIFT'];}?></td>
                        </tr>
                      </table>



                      <div class="form-group">
                      检查人:
                        <label><?php echo $T_Record_Master['InspectionUserID'];?></label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                      内部物理检验
                      </div>

<!-----------------------------------------------------------1.INSTRUMENT--------------------------------------------------------------------------->
                      <div class="col-lg-6"></br>

                      <label>1. Instruments</label></br></br>
                      <div class="form-group">
                      电子秤号: <label><?php echo $T_Record_Instrument[0]['InstrumentValue'];?></label>
                      </div>

                      <div class="form-group">
                      尺号:<label> <?php echo $T_Record_Instrument[2]['InstrumentValue'];?> </label>
                      </div>

                      <div class="form-group">
                      测厚仪号:<label>  <?php echo $T_Record_Instrument[1]['InstrumentValue'];?></label>
                      </div>
										    <br>
<!-----------------------------------------------------------2. TEST RESULT--------------------------------------------------------------------------->
<label>2. Test Result</label></br></br>


<div class="form-group">
手套克重:

    <?php if ($testSRText_pivot['GloveWeightAverage'] != NULL ) { ?>
  <label><?php echo $testResult_pivot['GloveWeightTest'];?>, <?php echo $testResult_pivot['GloveWeightAverage'];?></label>
<?php }else{ ?>
  <label><?php echo  $testResult_pivot['GloveWeightTest'];}?></label>

</div>

<div class="form-group">
数量:
  <?php if ($testSRText_pivot['CountingTest'] != NULL ) { ?>
<label><?php echo $testResult_pivot['CountingTest'];?>, <?php echo $testSRText_pivot['CountingTest'];?></label>
<?php }else{ ?>
<label><?php echo  $testResult_pivot['CountingTest'];}?></label>
</div>

<div class="form-group">
包装缺陷:
  <?php if ($testSRText_pivot['PackagingDefectsTest'] != NULL ) { ?>
<label><?php echo $testResult_pivot['PackagingDefectsTest'];?>, <?php echo $testSRText_pivot['PackagingDefectsTest'];?></label>
<?php }else{ ?>
<label><?php echo $testResult_pivot['PackagingDefectsTest'];}?></label>
</div>
</div><br>

<!-----------------------------------------------------------3. INTERNAL PHYSICAL TESTING ------------------------------------------------------------>                   <!-- /.col-lg-6 (nested) -->
<div class="col-lg-4">
<label>3. 内部物理检验</label>

<table class="table table-bordered" id="dataTable" width="20%" cellspacing="0">
  <tr>
    <div class="form-group">

    <th scope="col" class="info">层次测试:</th>
    <td><?php echo $testResult_pivot['LayeringTest'];?></td>

    <th class="info">异味测试:</th>
    <td><?php echo $testResult_pivot['SmellTest'];?></td>
  </tr>

  <tr>
    <th scope="col" class="info">握力测试:</th>
    <td><?php echo $testResult_pivot['GripTest'];;?></td>


    <th scope="col" class="info">黑布测试:</th>
    <td><?php echo $testResult_pivot['BlackClothTest'];?></td>


  </tr>

  <tr>
    <th class="info"> 粘连测试:</th>
    <td><?php echo $testResult_pivot['StickingTest'];?></td>


    <th scope="col" class="info">分配测试:</th>
    <td><?php echo $testResult_pivot['DispensingTest'];?></td>


  </tr>

  <tr>
    <th class="info">白布测试:</th>
    <td><?php echo $testResult_pivot['WhiteClothTest'];?></td>


    <th class="info"> 燃料漏测试:</th>
    <td><?php echo $testResult_pivot['Dye Leak Test'];?></td>


  </tr>
  <tr>
    <th class="info">着色检漏测试:</th>
    <td><?php echo  $testResult_pivot['Sealing Test'];?></td>


    <th class="info">爆裂测试:</th>
    <td><?php echo $testResult_pivot['BurstTest'];?></td>

  </tr>
  <tr>
    <th class="info">视觉与剥离能力:</th>
    <td><?php echo $testResult_pivot['Visual & Peel Ability'];?></td>

  </tr>
</table><br>

<table class="table table-bordered" id="dataTable" width="20%" cellspacing="0">
<tr>
  <th class="info" rowspan="2"> 穿戴与撕裂检测:</th>
  <th>Result</th>
  <th>Remark</th>
</tr>
<tr>
<div class="form-group">

  <td><?php echo $testResult_pivot['DonningTearingTest'];?></td>
  <td><?php echo $testSRText_pivot['DonningTearingTest'];?></td>

</div>
</tr>
</table>

<!-----------------------------------------------------------4. SPECIAL REQUIREMENT ------------------------------------------------------------------>

<label>4. Special Requirements</label>

<table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  <tr>
    <div class="form-group">
    <th scope="col" class="info">测试项目:</th>
    <th class="info">测试名称:</th>
    <th scope="col" class="info"> 检验结果判定:</th>
  </tr>

  <tr>
    <th scope="col" class="info">测试 1:</th>

    <td><?php echo $testResult_pivot['Test 1 Name'];?></td>
    <td><?php echo $testSRText_pivot['Test 1 Name'];?></td>
  </tr>

  <tr>
    <th scope="col" class="info">测试 2:</th>

    <td><?php echo $testResult_pivot['Test 2 Name'];?></td>
    <td><?php echo $testSRText_pivot['Test 2 Name'];?></td>
  </tr>

  <tr>
    <th scope="col" class="info">测试 3:</th>

    <td><?php echo $testResult_pivot['Test 3 Name'];?></td>
    <td><?php echo $testSRText_pivot['Test 3 Name'];?></td>
  </tr>

  <tr>
    <th scope="col" class="info">测试 4:</th>

    <td><?php echo $testResult_pivot['Test 4 Name'];?></td>
    <td><?php echo $testSRText_pivot['Test 4 Name'];?></td>
  </tr>

  <tr>
    <th scope="col" class="info">测试 5:</th>

    <td><?php echo $testResult_pivot['Test 5 Name'];?></td>
    <td><?php echo $testSRText_pivot['Test 5 Name'];?></td>
  </tr>
</table>
</div>

<!-----------------------------------------------------------PHYSICAL DIMENSION TEST --------------------------------------------------------------->
<div class="row">
 <div class="col-lg-12">
   <div class="panel panel-primary">
     <div class="panel-heading">
     规格尺寸检验
     </div>
   </div>
   <div class="col-lg-6">
<table class="table table-bordered" id="dataTable" >
<tr>
<th scope="col" class="info">方法:</th>


<td><?php echo $testResult_pivot['ThicknessTestMethod'];?></td>
</tr>
         </table>
</div>
   <div class="col-lg-12">

     <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
      <tr class="info">
        <th class="text-center"> 抽样只数</th>
      <th class="text-center">1</th>
      <th class="text-center">2</th>
      <th class="text-center">3</th>
      <th class="text-center">4</th>
      <th class="text-center">5</th>
      <th class="text-center">6</th>
      <th class="text-center">7</th>
      <th class="text-center">8</th>
      <th class="text-center">9</th>
      <th class="text-center">10</th>
      <th class="text-center">11</th>
      <th class="text-center">12</th>
      <th class="text-center">13</th>
      <th class="text-center">PASS/FAIL</th>
</tr>

    <tr>
        <th scope="col" class="info">长度（毫米）:</th>
        <td class="text-center"><?php echo $testResult_pivot['Length1'];?></td>
        <td class="text-center"><?php echo $testResult_pivot['Length2'];?></td>
        <td class="text-center"><?php echo $testResult_pivot['Length3'];?></td>
        <td class="text-center"><?php echo $testResult_pivot['Length4'];?></td>
        <td class="text-center"><?php echo $testResult_pivot['Length5'];?></td>
        <td class="text-center"><?php echo $testResult_pivot['Length6'];?></td>
        <td class="text-center"><?php echo $testResult_pivot['Length7'];?></td>
        <td class="text-center"><?php echo $testResult_pivot['Length8'];?></td>
        <td class="text-center"><?php echo $testResult_pivot['Length9'];?></td>
        <td class="text-center"><?php echo $testResult_pivot['Length10'];?></td>
        <td class="text-center"><?php echo $testResult_pivot['Length11'];?></td>
        <td class="text-center"><?php echo $testResult_pivot['Length12'];?></td>
        <td class="text-center"><?php echo $testResult_pivot['Length13'];?></td>
        <td class="text-center"><?php echo $testResult_pivot['LengthTest'];?></td>
  </tr>

  <tr>
    <th scope="col" class="info">宽度（毫米）:</th>
    <td class="text-center"><?php echo $testResult_pivot['Width1'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Width2'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Width3'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Width4'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Width5'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Width6'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Width7'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Width8'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Width9'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Width10'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Width11'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Width12'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Width13'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['WidthTest'];?></td>
  </tr>

  <tr>
    <th scope="col" class="info">卷边厚度:</th>

    <td class="text-center"><?php echo $testResult_pivot['Cuff1'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Cuff2'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Cuff3'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Cuff4'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Cuff5'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Cuff6'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Cuff7'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Cuff8'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Cuff9'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Cuff10'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Cuff11'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Cuff12'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Cuff13'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['CuffTest'];?></td>

  </tr>

  <tr>
    <th scope="col" class="info">掌部厚度:</th>
    <td class="text-center"><?php echo $testResult_pivot['Palm1'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Palm2'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Palm3'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Palm4'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Palm5'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Palm6'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Palm7'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Palm8'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Palm9'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Palm10'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Palm11'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Palm12'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Palm13'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['PalmTest'];?></td>
  </tr>

  <tr>
    <th scope="col" class="info">指尖厚度:</th>
    <td class="text-center"><?php echo $testResult_pivot['Fingertip1'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Fingertip2'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Fingertip3'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Fingertip4'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Fingertip5'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Fingertip6'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Fingertip7'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Fingertip8'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Fingertip9'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Fingertip10'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Fingertip11'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Fingertip12'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Fingertip13'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['FingertipTest'];?></td>
  </tr>

  <tr>
    <th scope="col" class="info">圆缘直径厚度:</th>
    <td class="text-center"><?php echo $testResult_pivot['DiaBeading1'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['DiaBeading2'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['DiaBeading3'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['DiaBeading4'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['DiaBeading5'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['DiaBeading6'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['DiaBeading7'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['DiaBeading8'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['DiaBeading9'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['DiaBeading10'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['DiaBeading11'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['DiaBeading12'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['DiaBeading13'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['DiaBeadingTest'];?></td>
  </tr>

  <tr>
    <th scope="col" class="info">卷边边缘厚度:</th>
    <td class="text-center"><?php echo $testResult_pivot['Wrist1'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Wrist2'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Wrist3'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Wrist4'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Wrist5'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Wrist6'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Wrist7'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Wrist8'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Wrist9'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Wrist10'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Wrist11'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Wrist12'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Wrist13'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['WristTest'];?></td>
  </tr>

  <tr>
    <th scope="col" class="info"> 手套克重:</th>
    <td class="text-center"><?php echo $testResult_pivot['Weight1'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Weight2'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Weight3'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Weight4'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Weight5'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Weight6'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Weight7'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Weight8'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Weight9'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Weight10'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Weight11'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Weight12'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['Weight13'];?></td>
    <td class="text-center"><?php echo $testResult_pivot['WeightTest'];?></td>
  </tr>

</table>

</div>
</div>
</div>
</div><br><br>

<!----------------------------------------------------------- INSPECTION RECORD --------------------------------------------------------------------->
<div class="panel panel-primary">
<div class="panel-heading">
检查记录
</div>
</div>
<div class="col-lg-12">
<table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

<tr>
<th scope="col" class="info">水密/吹气测试样本量第一层:</th>
<td><?php echo $T_Record_SampleSize[1]['SampleSizeValue']; ?></td>

<th scope="col" class="info">外观检验样本量:</th>
<td><?php echo $T_Record_SampleSize[0]['SampleSizeValue']; ?></td>
</tr>

<tr>
<th scope="col" class="info">水密/吹气测试样本量第二层:</th>
<td><?php echo $T_Record_SampleSize[2]['SampleSizeValue']; ?></td>

<th scope="col" class="info">机械号:</th>
<td><?php echo $T_Record_Instrument[3]['InstrumentValue']; ?></td>

</tr>
</table>

<td><b>**检查标准 </b><a class = "btn btn-default"
     data-toggle="modal" data-target="#remark" href="pdf/GL PQC S07 Inspection Plan 1.1 Published.pdf" target="iframe_i">?</a><br></td>
     <td><b>*手套检验</b></td>

<table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
<tr class="info">
<th></th>
<th colspan="2" width="13%">MINOR VISUAL</th>
<th colspan="4" width="30%">MAJOR VISUAL</th>
<th colspan="3" width="18%">CRITICAL NAG</th>
<th colspan="3" width="13%">CRITICAL NFG</th>
<th colspan="2" width="13%">FREEDOM FROM HOLES LEVEL 1</th>
<th colspan="2" width="13%">FREEDOM FROM HOLES LEVEL 2</th>
<th colspan="2" width="13%">GOOD GLOVES</th>
</tr>
<tr>
<th scope="col" class="info">AQL:</th>
<td colspan="2"><?php echo $AQLResult_pivot['AQLMinor'];?></td>
<td colspan="4"><?php echo $AQLResult_pivot['AQLMajor'];?></td>
<td colspan="3"><?php echo $AQLResult_pivot['AQLNAG_CP'];?></td>
<td colspan="3"><?php echo $AQLResult_pivot['AQLNFG'];?></td>
<td colspan="2"><?php echo $AQLResult_pivot['AQLHoles1'];?></td>
<td colspan="2"><?php echo $AQLResult_pivot['AQLHoles2'];?></td>
<td colspan="2"><?php echo $AQLResult_pivot['AQLGG'];?></td>
</tr>

<tr>
<th scope="col" class="info">Acceptance:</th>
<td colspan="2"><?php echo $AQLResult_pivot['AcceptanceMinor'];?></td>
<td colspan="4"><?php echo $AQLResult_pivot['AcceptanceMajor'];?></td>
<td colspan="3"><?php echo $AQLResult_pivot['AcceptanceNAG_CP'];?></td>
<td colspan="3"><?php echo $AQLResult_pivot['AcceptanceNFG'];?></td>
<td colspan="2"><?php echo $AQLResult_pivot['AcceptanceHoles1'];?></td>
<td colspan="2"><?php echo $AQLResult_pivot['AcceptanceHoles2'];?></td>
<td colspan="2"><?php echo $AQLResult_pivot['AcceptanceGG'];?></td>
</tr>

<tr>
<th rowspan="13" scope="col" class="info"> Defect</th>
                                 <!------------ MINOR VIS L1 ------------------------------------>

                                 <td>DB:
                                   <b><font color="red"><?php callDefectValue(1,$defectResult_pivot); ?></font></td>
                                 <td>SD:
                                   <b><font color="red"><?php callDefectValue(2,$defectResult_pivot); ?></font></td>


                                 <!------------ MAJOR VIS L1 ------------------------------------>
                                 <td>CA:
                                   <b><font color="red"><?php callDefectValue(4,$defectResult_pivot); ?></font></td>
                                 <td>CL:
                                   <b><font color="red"><?php callDefectValue(5,$defectResult_pivot); ?></font></td>
                                 <td>CLD:
                                   <b><font color="red"><?php callDefectValue(6,$defectResult_pivot); ?></font></td>
                                 <td>CS:
                                   <b><font color="red"><?php callDefectValue(7,$defectResult_pivot); ?></font></td>


                                 <!------------ CRITICAL NAG L1 ------------------------------------->

                                 <td>BPC:
                                   <b><font color="red"><?php callDefectValue(51,$defectResult_pivot); ?></font></td>
                                 <td>CR:
                                   <b><font color="red"><?php callDefectValue(52,$defectResult_pivot); ?></font></td>
                                 <td>DC:
                                   <b><font color="red"><?php callDefectValue(53,$defectResult_pivot); ?></font></td>


                                 <!------------ DEF NFG L1 ------------------------------------->
                                 <td>CH:
                                   <b><font color="red"><?php callDefectValue(68,$defectResult_pivot); ?></font></td>
                                 <td>FK:
                                   <b><font color="red"><?php callDefectValue(69,$defectResult_pivot); ?></font></td>
                                 <td>MF:
                                   <b><font color="red"><?php callDefectValue(70,$defectResult_pivot); ?></font></td>




                                 <!------------ DEF HOLES 1 L1 ----------------------------------->
                                 <td>BF:
                                   <b><font color="red"><?php callDefectValue(77,$defectResult_pivot);?></font></td>
                                 <td>CF:
                                   <b><font color="red"><?php callDefectValue(78,$defectResult_pivot);?></font></td>


                                 <!------------ DEF HOLES 2 L1 ----------------------------------->
                                 <td>BF:
                                   <b><font color="red"><?php callDefectValue(88,$defectResult_pivot); ?></font></td>
                                 <td>CF:
                                   <b><font color="red"><?php callDefectValue(89,$defectResult_pivot); ?></font></td>

                                 <!------------ DEF GG L1 ----------------------------------->
                                 <td>GG:
                                   <b><font color="red"><?php callDefectValue(168,$defectResult_pivot); ?></font></td>
                                 <td></td>

                               </tr>

                               <tr>

                                 <!------------ MINOR VIS L2 ----------------------------------->
                                 <td>SP:
                                   <b><font color="red"><?php callDefectValue(3,$defectResult_pivot); ?></font></td>
                                 <td>STNs:
                                   <b><font color="red"><?php callDefectValue(158,$defectResult_pivot); ?></font></td>


                                 <!------------ MAJOR VIS L2 ---------------------------------->

                                 <td>DF:
                                   <b><font color="red"><?php callDefectValue(8,$defectResult_pivot); ?></font></td>
                                 <td>DT:
                                   <b><font color="red"><?php callDefectValue(9,$defectResult_pivot); ?></font></td>
                                 <td>EFI:
                                   <b><font color="red"><?php callDefectValue(10,$defectResult_pivot); ?></font></td>
                                 <td>FM:
                                   <b><font color="red"><?php callDefectValue(11,$defectResult_pivot); ?></font></td>


                                 <!------------ CRITICAL NAG L2 ---------------------------------->
                                 <td>DD:
                                   <b><font color="red"><?php callDefectValue(54,$defectResult_pivot); ?></font></td>
                                 <td>DIS:
                                   <b><font color="red"><?php callDefectValue(55,$defectResult_pivot); ?></font></td>
                                 <td>FMT:
                                   <b><font color="red"><?php callDefectValue(56,$defectResult_pivot); ?></font></td>


                                 <!------------ DEF NFG L2 ---------------------------------->

                                 <td>TAH:
                                   <b><font color="red"><?php callDefectValue(71,$defectResult_pivot); ?></font></td>
                                 <td>TH:
                                   <b><font color="red"><?php callDefectValue(72,$defectResult_pivot); ?></font></td>
                                 <td>TR:
                                   <b><font color="red"><?php callDefectValue(73,$defectResult_pivot); ?></font></td>


                                 <!------------ DEF HOLES 1 L2 ---------------------------------->
                                 <td>CHs:
                                   <b><font color="red"><?php callDefectValue(79,$defectResult_pivot); ?></font></td>
                                 <td>FKs:
                                   <b><font color="red"><?php callDefectValue(80,$defectResult_pivot); ?></font></td>


                                 <!------------ DEF HOLES 2 L2 ---------------------------------->
                                 <td>CHs:
                                   <b><font color="red"><?php callDefectValue(90,$defectResult_pivot); ?></font></td>
                                 <td>FKs:
                                   <b><font color="red"><?php callDefectValue(91,$defectResult_pivot); ?></font></td>

                                     <!------------ DEF GG L2 ----------------------------------->
                                     <td></td>
                                     <td></td>

                               </tr>



                               <tr>

                                 <!------------ MINOR VIS L3 -------------------------------------->
                                 <td>SLDs:
                                   <b><font color="red"><?php callDefectValue(160,$defectResult_pivot); ?></font></td>
                                 <td>Ls:
                                   <b><font color="red"><?php callDefectValue(161,$defectResult_pivot); ?></font></td>



                                 <!------------ MAJOR VIS L3 -------------------------------------->

                                 <td>FNO:
                                   <b><font color="red"><?php callDefectValue(12,$defectResult_pivot); ?></font></td>
                                 <td>FO:
                                   <b><font color="red"><?php callDefectValue(13,$defectResult_pivot); ?></font></td>
                                 <td>GNO:
                                   <b><font color="red"><?php callDefectValue(14,$defectResult_pivot); ?></font></td>
                                 <td>IB:
                                   <b><font color="red"><?php callDefectValue(15,$defectResult_pivot); ?></font></td>

                                 <!------------ CRITICAL NAG  L3 --------------------------------------->

                                 <td>GL:
                                   <b><font color="red"><?php callDefectValue(57,$defectResult_pivot); ?></font></td>
                                 <td>L:
                                   <b><font color="red"><?php callDefectValue(58,$defectResult_pivot); ?></font></td>
                                 <td>MP:
                                   <b><font color="red"><?php callDefectValue(59,$defectResult_pivot); ?></font></td>



                                 <!------------ CRITICAL NFG L3 ------------------------------------->

                                 <td>GSH:
                                   <b><font color="red"><?php callDefectValue(148,$defectResult_pivot); ?></font></td>
                                 <td></td>
                                 <td></td>


                                 <!------------ DEF HOLES 1 L3 ------------------------------------>

                                 <td>FT:
                                   <b><font color="red"><?php callDefectValue(81,$defectResult_pivot); ?></font></td>
                                 <td>GB:
                                   <b><font color="red"><?php callDefectValue(82,$defectResult_pivot); ?></font></td>


                                 <!------------ DEF HOLES 2 L3 ------------------------------------->
                                 <td>FT:
                                   <b><font color="red"><?php callDefectValue(92,$defectResult_pivot); ?></font></td>
                                 <td>GB:
                                   <b><font color="red"><?php callDefectValue(93,$defectResult_pivot); ?></font></td>

                                     <!------------ DEF GG L3 ----------------------------------->
                                     <td></td>
                                     <td></td>

                               </tr>



                               <tr>

                                 <!------------ MINOR VIS L4 -------------------------------------->
                                 <td>TSs:
                                   <b><font color="red"><?php callDefectValue(169,$defectResult_pivot); ?></font></td>

                                 <td></td>

                                 <!------------ MAJOR VIS L4 ---------------------------------------->

                                 <td>ICT:
                                   <b><font color="red"><?php callDefectValue(16,$defectResult_pivot); ?></font></td>
                                 <td>L:
                                   <b><font color="red"><?php callDefectValue(17,$defectResult_pivot); ?></font></td>
                                 <td>LS:
                                   <b><font color="red"><?php callDefectValue(18,$defectResult_pivot); ?></font></td>
                                 <td>PLM:
                                   <b><font color="red"><?php callDefectValue(19,$defectResult_pivot); ?></font></td>



                                 <!------------ CRITICAL NAG L4 ------------------------------------------>

                                 <td>NB:
                                   <b><font color="red"><?php callDefectValue(60,$defectResult_pivot); ?></font></td>
                                 <td>NF:
                                   <b><font color="red"><?php callDefectValue(61,$defectResult_pivot); ?></font></td>
                                 <td>PGM:
                                   <b><font color="red"><?php callDefectValue(62,$defectResult_pivot); ?></font></td>


                                 <!------------ CRITICAL NFG L4 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <td></td>


                                 <!------------ DEF HOLES 1 L4 ----------------------------------------->

                                 <td>P:
                                   <b><font color="red"><?php callDefectValue(83,$defectResult_pivot); ?></font></td>
                                 <td>SF:
                                   <b><font color="red"><?php callDefectValue(84,$defectResult_pivot); ?></font></td>


                                 <!------------ DEF HOLES 2 L4 ----------------->
                                 <td>P:
                                   <b><font color="red"><?php callDefectValue(94,$defectResult_pivot); ?></font></td>
                                 <td>SF:
                                   <b><font color="red"><?php callDefectValue(95,$defectResult_pivot); ?></font></td>

                                     <!------------ DEF GG L4 ----------------------------------->
                                     <td></td>
                                     <td></td>


                                 </tr>

                               <tr>

                                 <td></td>
                                 <td></td>


                                 <!------------ MAJOR VIS L5 ---------------------------------------->

                                 <td>PMI:
                                   <b><font color="red"><?php callDefectValue(20,$defectResult_pivot); ?></font></td>
                                 <td>PMO:
                                   <b><font color="red"><?php callDefectValue(21,$defectResult_pivot); ?></font></td>
                                 <td>RC:
                                   <b><font color="red"><?php callDefectValue(22,$defectResult_pivot); ?></font></td>
                                 <td>RM:
                                   <b><font color="red"><?php callDefectValue(23,$defectResult_pivot); ?></font></td>


                                 <!------------ CRITICAL NAG L5 ---------------------------------------->

                                 <td>SDG:
                                   <b><font color="red"><?php callDefectValue(63,$defectResult_pivot); ?></font></td>
                                 <td>TW:
                                   <b><font color="red"><?php callDefectValue(64,$defectResult_pivot); ?></font></td>
                                 <td>URD:
                                   <b><font color="red"><?php callDefectValue(65,$defectResult_pivot); ?></font></td>


                                 <!------------ CRITICAL NFG L5 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <td></td>


                                 <!------------ DEF HOLES 1 L5 ---------------------------------------->
                                 <td>TAHs:
                                   <b><font color="red"><?php callDefectValue(85,$defectResult_pivot); ?></font></td>
                                 <td>THs:
                                   <b><font color="red"><?php callDefectValue(86,$defectResult_pivot); ?></font></td>

                                 <!------------ DEF HOLES 2 L5 ---------------------------------------->
                                 <td>TAHs:
                                   <b><font color="red"><?php callDefectValue(96,$defectResult_pivot); ?></font></td>
                                 <td>THs:
                                   <b><font color="red"><?php callDefectValue(97,$defectResult_pivot); ?></font></td>

                                     <!------------ DEF GG L5 ----------------------------------->
                                     <td></td>
                                     <td></td>

                             	</tr>

                               <tr>

                               <td></td>

                               <td></td>


                                 <!------------ MAJOR VIS L6 ---------------------------------------->
                                 <td>SAG:
                                   <b><font color="red"><?php callDefectValue(24,$defectResult_pivot); ?></font></td>
                                 <td>SG:
                                   <b><font color="red"><?php callDefectValue(25,$defectResult_pivot); ?></font></td>
                                 <td>SHN:
                                   <b><font color="red"><?php callDefectValue(26,$defectResult_pivot); ?></font></td>
                                 <td>SI:
                                   <b><font color="red"><?php callDefectValue(27,$defectResult_pivot); ?></font></td>



                                 <!------------ CRITICAL NAG L6 ---------------------------------------->

                                 <td>WE:
                                   <b><font color="red"><?php callDefectValue(66,$defectResult_pivot); ?></font></td>
                                 <td>WG:
                                   <b><font color="red"><?php callDefectValue(67,$defectResult_pivot); ?></font></td>
                                 <td>MS:
                                   <b><font color="red"><?php callDefectValue(147,$defectResult_pivot); ?></font></td>


                                 <!------------ CRITICAL NFG L6 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <td></td>



                                 <!------------ DEF HOLES 1 L6 ---------------------------------------->
                                 <td>TRs:
                                   <b><font color="red"><?php callDefectValue(87,$defectResult_pivot); ?></font></td>
                                 <td>L:
                                   <b><font color="red"><?php callDefectValue(143,$defectResult_pivot); ?></font></td>


                                 <!------------ DEF HOLES 2 L6 ---------------------------------------->
                                 <td>TRs:
                                   <b><font color="red"><?php callDefectValue(98,$defectResult_pivot); ?></font></td>
                                 <td>L:
                                   <b><font color="red"><?php callDefectValue(144,$defectResult_pivot); ?></font></td>

                                     <!------------ DEF GG L6 ----------------------------------->
                                     <td></td>
                                     <td></td>

                               </tr>

                               <tr>
                                 <td></td>
                                 <td></td>

                                 <!------------ MAJOR VIS L7 ---------------------------------------->

                                 <td>SKV:
                                   <b><font color="red"><?php callDefectValue(28,$defectResult_pivot); ?></font></td>
                                 <td>SLD:
                                   <b><font color="red"><?php callDefectValue(29,$defectResult_pivot); ?></font></td>
                                 <td>SO:
                                   <b><font color="red"><?php callDefectValue(30,$defectResult_pivot); ?></font></td>
                                 <td>STK:
                                   <b><font color="red"><?php callDefectValue(31,$defectResult_pivot); ?></font></td>



                                 <!------------ CRITICAL NAG L7 ---------------------------------------->
                                 <td>PFK:
                                   <b><font color="red"><?php callDefectValue(149,$defectResult_pivot); ?></font></td>
                                 <td>MG:
                                   <b><font color="red"><?php callDefectValue(162,$defectResult_pivot); ?></font></td>
                                 <td>MD:
                                       <b><font color="red"><?php callDefectValue(163,$defectResult_pivot); ?></font></td>


                                 <!------------ CRITICAL NFG L7 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <td></td>


                                 <!------------ DEF HOLE 1 L7 ---------------------------------------->

                                 <td>LH:
                                   <b><font color="red"><?php callDefectValue(150,$defectResult_pivot); ?></font></td>
                                 <td>MH:
                                   <b><font color="red"><?php callDefectValue(155,$defectResult_pivot); ?></font></td>


                                 <!------------ DEF HOLE 2 L7 ---------------------------------------->

                                 <td>LH:
                                   <b><font color="red"><?php callDefectValue(151,$defectResult_pivot); ?></font></td>
                                 <td>MH:
                                   <b><font color="red"><?php callDefectValue(156,$defectResult_pivot); ?></font></td>

                                     <!------------ DEF GG L7 ----------------------------------->
                                     <td></td>
                                     <td></td>


                               </tr>

                               <tr>

                                 <td></td>
                                 <td></td>

                                 <!------------ MAJOR VIS L8 ---------------------------------------->

                                 <td>STN:
                                   <b><font color="red"><?php callDefectValue(32,$defectResult_pivot); ?></font></td>
                                 <td>TA:
                                   <b><font color="red"><?php callDefectValue(33,$defectResult_pivot); ?></font></td>
                                 <td>TS:
                                   <b><font color="red"><?php callDefectValue(34,$defectResult_pivot); ?></font></td>
                                 <td>UNF:
                                   <b><font color="red"><?php callDefectValue(35,$defectResult_pivot); ?></font></td>


                                 <!------------ CRITICAL NAG L8 ---------------------------------------->
                                 <td>TP:
                                   <b><font color="red"><?php callDefectValue(164,$defectResult_pivot); ?></font></td>
                                 <td>SVD:
                                   <b><font color="red"><?php callDefectValue(165,$defectResult_pivot); ?></font></td>
                                 <td></td>


                                 <td></td>
                                 <td></td>
                                 <td></td>

                                 <td></td>
                                 <td></td>

                                 <td></td>
                                 <td></td>

                                 <!------------ DEF GG L8 ----------------------------------->
                                 <td></td>
                                 <td></td>


                               </tr>

                               <tr>

                                 <td></td>
                                 <td></td>

                                 <!------------ MAJOR VIS L9 ---------------------------------------->
                                 <td>WL:
                                   <b><font color="red"><?php callDefectValue(36,$defectResult_pivot); ?></font></td>
                                 <td>WSI:
                                   <b><font color="red"><?php callDefectValue(37,$defectResult_pivot); ?></font></td>
                                 <td>WSO:
                                   <b><font color="red"><?php callDefectValue(38,$defectResult_pivot); ?></font></td>
                                 <td>GF:
                                   <b><font color="red"><?php callDefectValue(146,$defectResult_pivot); ?></font></td>


                                 <!------------ CRITICAL L9 ---------------------------------------->

                                 <td>ICP:
                                   <b><font color="red"><?php callDefectValue(74,$defectResult_pivot); ?></font></td>
                                 <td>NP:
                                   <b><font color="red"><?php callDefectValue(75,$defectResult_pivot);?></font></td>
                                 <td>WP:
                                   <b><font color="red"><?php callDefectValue(76,$defectResult_pivot);?></font></td>

                                 <td></td>
                                 <td></td>
                                 <td></td>

                                 <td></td>
                                 <td></td>

                                 <td></td>
                                 <td></td>

                                 <!------------ DEF GG L9 ----------------------------------->
                                 <td></td>
                                 <td></td>
                               </tr>

                               <tr>
                                 <!------------ MINOR VIS L10 ---------------------------------------->
                                 <td></td>
                                 <td></td>

                                 <!------------ MAJOR VIS L10 ---------------------------------------->

                                 <td>BP:
                                   <b><font color="red"><?php callDefectValue(40,$defectResult_pivot); ?></font></td>
                                 <td>DP:
                                   <b><font color="red"><?php callDefectValue(41,$defectResult_pivot); ?></font></td>
                                 <td>DSP:
                                   <b><font color="red"><?php callDefectValue(42,$defectResult_pivot); ?></font></td>
                                 <td>DTP:
                                   <b><font color="red"><?php callDefectValue(43,$defectResult_pivot); ?></font></td>


                                 <!------------ CRITICAL L10 ---------------------------------------->

                                 <td></td>
                                 <td></td>
                                 <td></td>

                                 <td></td>
                                 <td></td>
                                 <td></td>

                                 <td></td>
                                 <td></td>

                                 <td></td>
                                 <td></td>

                                 <!------------ DEF GG L10 ----------------------------------->
                                 <td></td>
                                 <td></td>


                               </tr>

                               <tr>
                                 <!------------ MINOR VIS L11 ---------------------------------------->
                                 <td></td>
                                 <td></td>

                                 <!------------ MAJOR VIS L11 ---------------------------------------->

                                 <td>IA:
                                   <b><font color="red"><?php callDefectValue(44,$defectResult_pivot); ?></font></td>
                                 <td>IFS:
                                   <b><font color="red"><?php callDefectValue(45,$defectResult_pivot); ?></font></td>
                                 <td>IP:
                                   <b><font color="red"><?php callDefectValue(46,$defectResult_pivot); ?></font></td>
                                 <td>OP:
                                   <b><font color="red"><?php callDefectValue(47,$defectResult_pivot); ?></font></td>


                                 <!------------ CRITICAL L11 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <!------------ HOLES1 L10 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <!------------ HOLES2 L10 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <!------------ HOLES3 L10 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <!------------ DEF GG L11 ----------------------------------->
                                 <td></td>
                                 <td></td>
                               </tr>


                               <tr>
                                 <td></td>
                                 <td></td>

                                 <!------------ MAJOR VIS L12 ---------------------------------------->

                                 <td>RP:
                                   <b><font color="red"><?php callDefectValue(48,$defectResult_pivot); ?></font></td>
                                 <td>SH:
                                   <b><font color="red"><?php callDefectValue(49,$defectResult_pivot); ?></font></td>
                                 <td>SMP:
                                   <b><font color="red"><?php callDefectValue(50,$defectResult_pivot); ?></font></td>
                                 <td></td>

                                 <!------------ CRITICAL L12 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <!------------ HOLES1 L10 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <!------------ HOLES2 L10 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <!------------ HOLES3 L10 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <!------------ DEF GG L12 ----------------------------------->
                                 <td></td>
                                 <td></td>
                               </tr>

                               <tr>
                                 <td></td>
                                 <td></td>

                                 <!------------ MAJOR VIS L13 ---------------------------------------->


                                 <td>FKI:
                                   <b><font color="red"><?php callDefectValue(166,$defectResult_pivot); ?></font></td>
                                 <td>FKO:
                                   <b><font color="red"><?php callDefectValue(167,$defectResult_pivot); ?></font></td>
                                 <td></td>
                                 <td></td>

                                 <!------------ CRITICAL L12 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <!------------ HOLES1 L10 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <!------------ HOLES2 L10 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <!------------ HOLES3 L10 ---------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <!------------ DEF GG L12 ----------------------------------->
                                 <td></td>
                                 <td></td>
                               </tr>


                               <tr>


                                 <th scope="col" class="info">Total defect</th>

                                 <?php
                                 $sum1 = 0;

                                   $sum1 += returnDefectValue(1,$defectResult_pivot);
                                   $sum1 += returnDefectValue(2,$defectResult_pivot);
                                   $sum1 += returnDefectValue(3,$defectResult_pivot);
                                   $sum1 += returnDefectValue(158,$defectResult_pivot);
                                   $sum1 += returnDefectValue(160,$defectResult_pivot);
                                   $sum1 += returnDefectValue(161,$defectResult_pivot);

                                 $_SESSION['total_minor'] = $sum1;

                                 ?>

                                 <td colspan="2"><input class="form-control" name="total_minor" value="<?php echo $sum1; ?>" disabled></td>

                                 <?php
                                 $sum2 = 0;
                                 for($i = 4; $i<=50; $i++){
                                   $sum2 += returnDefectValue($i,$defectResult_pivot);
                                 }

                                   $sum2 += returnDefectValue(146,$defectResult_pivot);
                                   $sum2 += returnDefectValue(166,$defectResult_pivot);
                                   $sum2 += returnDefectValue(167,$defectResult_pivot);

                                 $_SESSION['total_major'] = $sum2;
                                 ?>

                                 <td colspan="4"><input class="form-control" name="total_major" value="<?php echo $sum2; ?>" disabled></td>

                                 <?php
                                 $sum3 = 0;
                                 for($i = 51; $i<=67; $i++){
                                   $sum3 += returnDefectValue($i,$defectResult_pivot);
                                 }
                                 for($i = 74; $i<=76; $i++){
                                   $sum3 += returnDefectValue($i,$defectResult_pivot);
                                 }

                                   $sum3 += returnDefectValue(147,$defectResult_pivot);
                                   $sum3 += returnDefectValue(149,$defectResult_pivot);
                                   $sum3 += returnDefectValue(162,$defectResult_pivot);
                                   $sum3 += returnDefectValue(163,$defectResult_pivot);
                                   $sum3 += returnDefectValue(164,$defectResult_pivot);
                                   $sum3 += returnDefectValue(165,$defectResult_pivot);

                                   $_SESSION['total_critical_nag'] = $sum3;

                                 ?>


                                 <td colspan="3"><input class="form-control" name="critical_nag" value="<?php echo $sum3; ?>" disabled></td>


                                 <?php
                                 $sum4 = 0;
                                 for($i = 68; $i<=73; $i++){
                                   $sum4 += returnDefectValue($i,$defectResult_pivot);
                                 }
                                   $sum4 += returnDefectValue(148,$defectResult_pivot);

                                   $_SESSION['total_critical_nfg'] = $sum4;
                                 ?>


                                 <td colspan="3"><input class="form-control" name="critical_nfg" value="<?php echo $sum4; ?>" disabled></td>

                                 <?php
                                 $sum5 = 0;
                                 for($i = 77; $i<=87; $i++){
                                   $sum5 += returnDefectValue($i,$defectResult_pivot);
                                 }

                                   $sum5 += returnDefectValue(143,$defectResult_pivot);
                                   $sum5 += returnDefectValue(150,$defectResult_pivot);
                                   $sum5 += returnDefectValue(155,$defectResult_pivot);

                                   $_SESSION['total_holes1'] = $sum5;
                                 ?>

                                 <td colspan="2"><input class="form-control" name="total_holes1" value="<?php echo $sum5; ?>" disabled></td>

                                 <?php
                                 $sum6 = 0;
                                 for($i = 88; $i<=98; $i++){
                                   $sum6 += returnDefectValue($i,$defectResult_pivot);
                                 }
                                   $sum6 += returnDefectValue(144,$defectResult_pivot);
                                   $sum6 += returnDefectValue(151,$defectResult_pivot);
                                   $sum6 += returnDefectValue(162,$defectResult_pivot);

                                   $_SESSION['total_holes2'] = $sum6;
                                 ?>

                                 <td colspan="2"><input class="form-control" name="total_holes2" value="<?php echo $sum6; ?>" disabled></td>

                                 <?php
                                 $sum7 = 0;
                                   $sum7 += returnDefectValue(168,$defectResult_pivot);

                                   $_SESSION['total_goodglove'] = $sum7;
                                 ?>

                                 <td colspan="2"><input class="form-control" name="total_goodgloves" value="<?php echo $sum7; ?>" disabled></td>

                               </tr>

                               <?php
                               $grandTotal = $sum1 + $sum2 + $sum3 + $sum4 + $sum5 + $sum6;

                               $_SESSION['grand_total'] = $grandTotal;

                               ?>
                               <tr>
                                 <th scope="col" class="info">Grand Total Defect</th>
                                 <td colspan="18">
                                   <input class="form-control" name="grand_total" value="<?php echo $grandTotal; ?>" disabled>
                                 </td>
                               </tr>
                             </table>

                             <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                               <?php
                                 $TotalBarier =  $sum4 + $sum5 + $sum6;
                                 $_SESSION['total_barrier'] = $TotalBarier;
                               ?>
                               <tr>
                                 <th scope="col" class="info">Total Barrier:</th>

                                 <td><input class="form-control" name="total_holes" value="<?php echo $TotalBarier; ?>" disabled></td>


                                 <th scope="col" class="info">Overall AQL:</th>

                                 <td><input class="form-control" name="overall_AQL" value="<?php echo $T_Record_AQL[8]['AQLValue']?>" disabled></td>

                                 <th scope="col" class="info">UD Disposition:</th>
                                 <td><input class="form-control" name="UD_disposition" value="<?php echo $T_Record_UDResult[0]['UDResultCode'];?>" disabled></td>
                               </tr>
                             </table>

                             <td><b>*包装检验（手术手套）</b></td>

                             <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                               <tr class="info"><br>
                                 <th></th>
                                 <th colspan="3">规管包装缺陷</th>
                                 <th colspan="4">严重包装缺陷</th>
                                 <th colspan="4">视觉包装缺陷</th>

                               </tr>

                               <tr>
                                 <th scope="col" class="info">**AQL:</th>

                                 <td colspan="3"><?php echo $T_Record_AQL[13]['AQLValue'];?></td>
                                 <td colspan="4"><?php echo $T_Record_AQL[11]['AQLValue'];?></td>
                                 <td colspan="4"><?php echo $T_Record_AQL[9]['AQLValue'];?></td>

                               </tr>

                               <tr>
                                 <th scope="col" class="info">Acceptance:</th>
                                 <td colspan="3"><?php echo $T_Record_AQL[14]['AQLValue'];?></td>
                                 <td colspan="4"><?php echo $T_Record_AQL[12]['AQLValue'];?></td>
                                 <td colspan="4"><?php echo $T_Record_AQL[10]['AQLValue'];?></td>

                               </tr>
                               <tr>

                                 <th scope="col" class="info" rowspan="6"> Defect</th>

                                 <!-------------- REGULATOR PACKAGING L1 -------------------------->
                                 <td>WLN:
                                   <b><font color="red"><?php callDefectValue(113,$defectResult_pivot); ?></font></td>
                                 <td>WMD:
                                   <b><font color="red"><?php callDefectValue(114,$defectResult_pivot); ?></font></td>
                                 <td>WED:
                                   <b><font color="red"><?php callDefectValue(112,$defectResult_pivot); ?></font></td>


                                 <!----------------------------CRITICAL PACKAGING L1------------------>
                                 <td>WQ:
                                   <b><font color="red"><?php callDefectValue(133,$defectResult_pivot); ?></font></td>
                                 <td>MS:
                                   <b><font color="red"><?php callDefectValue(122,$defectResult_pivot); ?></font></td>
                                 <td>MB:
                                   <b><font color="red"><?php callDefectValue(119,$defectResult_pivot); ?></font></td>
                                 <td>MLN:
                                   <b><font color="red"><?php callDefectValue(120,$defectResult_pivot); ?></font></td>


                                 <!------------ VISUAL PACKAGING L1 ------------------------------------->
                                 <td>WT:
                                   <b><font color="red"><?php callDefectValue(142,$defectResult_pivot); ?></font></td>
                                 <td>CT:
                                   <b><font color="red"><?php callDefectValue(135,$defectResult_pivot); ?></font></td>
                                 <td>POP:
                                   <b><font color="red"><?php callDefectValue(140,$defectResult_pivot); ?></font></td>
                                 <td></td>
                               </tr>

                               <tr>

                                 <!-------------- REGULATOR PACKAGING L2 -------------------------->
                                 <td>WPC:
                                   <b><font color="red"><?php callDefectValue(115,$defectResult_pivot); ?></font></td>
                                 <td>MM:
                                   <b><font color="red"><?php callDefectValue(111,$defectResult_pivot); ?></font></td>
                                 <td>IP:
                                   <b><font color="red"><?php callDefectValue(110,$defectResult_pivot); ?></font></td>

                                 <!----------------------------CRITICAL PACKAGING L2------------------>
                                 <td>WGS:
                                   <b><font color="red"><?php callDefectValue(129,$defectResult_pivot); ?></font></td>
                                 <td>WGT:
                                   <b><font color="red"><?php callDefectValue(130,$defectResult_pivot); ?></font></td>
                                 <td>WGA:
                                   <b><font color="red"><?php callDefectValue(128,$defectResult_pivot); ?></font></td>
                                 <td>OS:
                                   <b><font color="red"><?php callDefectValue(124,$defectResult_pivot); ?></font></td>
                                 <!------------ VISUAL PACKAGING L2 ------------------------------------->
                                 <td>FG:
                                   <b><font color="red"><?php callDefectValue(137,$defectResult_pivot); ?></font></td>
                                 <td>PIS:
                                   <b><font color="red"><?php callDefectValue(139,$defectResult_pivot); ?></font></td>
                                 <td>MSA:
                                   <b><font color="red"><?php callDefectValue(138,$defectResult_pivot); ?></font></td>
                                 <td></td>
                               </tr>

                               <tr>

                                 <!-------------- REGULATOR PACKAGING L3 -------------------------->

                                 <td></td>
                                 <td></td>
                                 <td></td>



                                 <!----------------------------CRITICAL PACKAGING L3------------------>
                                 <td>WTS:
                                   <b><font color="red"><?php callDefectValue(134,$defectResult_pivot); ?></font></td>
                                 <td>PTS:
                                   <b><font color="red"><?php callDefectValue(126,$defectResult_pivot); ?></font></td>
                                 <td>WPO:
                                   <b><font color="red"><?php callDefectValue(132,$defectResult_pivot); ?></font></td>
                                 <td>DMG:
                                   <b><font color="red"><?php callDefectValue(117,$defectResult_pivot); ?></font></td>
                                 <!------------ VISUAL PACKAGING L3 ------------------------------------->

                                 <td>WIS:
                                   <b><font color="red"><?php callDefectValue(141,$defectResult_pivot); ?></font></td>
                                 <td>DT:
                                   <b><font color="red"><?php callDefectValue(136,$defectResult_pivot); ?></font></td>
                                 <td></td>
                                 <td></td>
                               </tr>

                               <tr>
                                 <!-------------- REGULATOR PACKAGING L4 -------------------------->

                                 <td></td>
                                 <td></td>
                                 <td></td>

                                 <!----------------------------CRITICAL PACKAGING L4 ------------------>
                                 <td>MSG:
                                   <b><font color="red"><?php callDefectValue(121,$defectResult_pivot); ?></font></td>
                                 <td>FC:
                                   <b><font color="red"><?php callDefectValue(118,$defectResult_pivot); ?></font></td>
                                 <td>POS:
                                   <b><font color="red"><?php callDefectValue(125,$defectResult_pivot); ?></font></td>
                                 <td>BC:
                                   <b><font color="red"><?php callDefectValue(116,$defectResult_pivot); ?></font></td>
                                 <!------------ VISUAL PACKAGING L4 ------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                               </tr>

                               <tr>
                                 <!-------------- REGULATOR PACKAGING L5 -------------------------->

                                 <td></td>
                                 <td></td>
                                 <td></td>

                                 <!----------------------------CRITICAL PACKAGING L5 ------------------>
                                 <td>WPD:
                                   <b><font color="red"><?php callDefectValue(131,$defectResult_pivot); ?></font></td>
                                 <td>MSI:
                                   <b><font color="red"><?php callDefectValue(123,$defectResult_pivot); ?></font></td>
                                 <td>TRP:
                                   <b><font color="red"><?php callDefectValue(127,$defectResult_pivot); ?></font></td>
                                 <td>NCN:
                                   <b><font color="red"><?php callDefectValue(170,$defectResult_pivot); ?></font></td>


                                 <!------------ VISUAL PACKAGING L5 ------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                               </tr>
                               <tr>
                                 <!-------------- REGULATOR PACKAGING L6 -------------------------->

                                 <td></td>
                                 <td></td>
                                 <td></td>

                                 <!----------------------------CRITICAL PACKAGING L6 ------------------>

                                 <td>CNS:
                                   <b><font color="red"><?php callDefectValue(171,$defectResult_pivot); ?></font></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>


                                 <!------------ VISUAL PACKAGING L6 ------------------------------------->
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                               </tr>

                      <tr>
                        <?php

                        ?>
                        <th scope="col" class="info">Result</th>

                        <td colspan="3"><input class="form-control" name="Result_Regulatory" value="<?php echo $T_Record_AQL[17]['AQLValue'];?>" disabled></td>
                        <td colspan="4"><input class="form-control" name="Result_Critical" value="<?php echo $T_Record_AQL[16]['AQLValue'];?>" disabled></td>
                        <td colspan="4"><input class="form-control" name="Result_Visual" value="<?php echo $T_Record_AQL[15]['AQLValue'];?>" disabled></td>

                      </tr>
                    </table>

                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                      <tr>
                        <th scope="col" class="info">最终检验结果判定:</th>


                        <td><input class="form-control" name="final_disposition" value="<?php echo $T_Record_AQL[18]['AQLValue'];?>" disabled></td>

                      </tr>
                    </table>

                    <div class="form-group">
                    验证者工号:<label><?php echo $T_Record_Master['VerifierID'];?></label>
                      </div>

                      <div class="form-group">
                        <?php $date2 = date("d/m/Y h:i:s A", strtotime($T_Record_Master['VerifiedDate'])); ?>
                        日期:<label><?php echo $date2;?></label>
                      </div>

                       <center>
                         <?php
                           if($_SESSION['PositionKey']==1){
                             ?>
                             <a class = "btn btn-success" target="_blank" href = "form-SFG-Edit.php?LotIDKey=<?php echo $lotID;?>&RecordID=<?php echo $RecordID;?>" > Update/Verify</a>&nbsp;&nbsp;
                         <?php
                           }
                         ?>
                         <?php
                           if($_SESSION['PositionKey']!=2){
                             ?>
                         <a class = "btn btn-warning" target="_blank" href = "form-SFG-Reinspect.php?LotIDKey=<?php echo $lotID;?>&RecordID=<?php echo $RecordID;?>" > Reinspec</a>&nbsp;&nbsp;
                         <a class = "btn btn-info" target="_blank" href = "viewPage-SFG-TravelTag.php?LotIDKey=<?php echo $lotID;?>&RecordID=<?php echo $RecordID;?>" > Travel Tag</a>&nbsp;&nbsp;
                         <?php
                           }
                         ?>
                         <a target="" href="#" role="button" class="btn btn-primary" title="Print" onClick="window.print()"><i class = "glyphicon glyphicon-print"></i>Print</a>
                       </center><br><br>
                     </form>
 									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">




                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


        </div>
        <!-- /#page-wrapper -->
		</div>
	</div>

	<br />
	<br />

	<div style = "text-align:center; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		<label>Copyright © 2021 by QA PQC SQUAD</label>
	</div>
</body>

</html>

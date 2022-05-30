<?php
  ini_set('memory_limit', '1024M');
  include('../includes/database_connection.php');
  include('../includes/session.php');
  include('../includes/header.php');
  $lotID = $_GET['LotIDKey'];
  $RecordID = $_GET['RecordID'];


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

  if($T_Lot_FG['SONumber'] != ''){
    $inspectionStage = 1;
  }else{
    $inspectionStage = 2;
  }


  $query2 = $connect->prepare("{CALL SP_GetRecordExistingRec(?)}");
  $query2 -> bindParam(1, $RecordID);
  $query2 -> execute();
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
  for($i = 0; $i < 144; $i++){
    $defectResult_pivot_temp= array(
      $T_Record_Defect[$i]['DefectKey']."d"=>$T_Record_Defect[$i]['DefectValue']
    );
    $defectResult_pivot = array_merge($defectResult_pivot,$defectResult_pivot_temp);
  }

  $testResult_pivot = array();
  for($i = 0; $i < 134; $i++){
    $testResult_pivot_temp= array(
      $T_Record_Test[$i]['TestName']=>$T_Record_Test[$i]['TestValue']
    );
    $testResult_pivot = array_merge($testResult_pivot,$testResult_pivot_temp);
  }

  $testSRText_pivot = array();
  for($i = 0; $i < 134; $i++){
    $testSRText_pivot_temp= array(
      $T_Record_Test[$i]['TestName']=>$T_Record_Test[$i]['SRText']
    );
    $testSRText_pivot = array_merge($testSRText_pivot,$testSRText_pivot_temp);
  }

  $AQLResult_pivot = array();
  for($i = 0; $i < 23; $i++){
    $AQLResult_pivot_temp= array(
      $T_Record_AQL[$i]['TestName']=>$T_Record_AQL[$i]['AQLValue']
    );
    $AQLResult_pivot = array_merge($AQLResult_pivot,$AQLResult_pivot_temp);
  }


  $query3 = $connect->prepare("SELECT * FROM T_Record_Master WHERE RecordID = ?");
  $query3 -> bindParam(1, $RecordID);
  $query3 ->execute();
  $T_Record_Master = $query3->fetch();

  //If user role is general, redirect to home
  if($_SESSION['PositionKey']==2){
    header('Location: ../Home/home.php');
  }



?>

<body>
  <div id="wrapper">
      <?php include('../navbar/navbar.php');?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Reinspection FG Form</h1>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->

<!------------------------------------------------------- PRODUCT INFORMATION -------------------------------------------------->
          <div class="row">

              <div class="col-lg-12">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                      产品信息
                      </div>
                      <div class="panel-body">
                          <div class="row">
                            <form role="form" method ="post" id="InspectionForm">

                              <div class="col-lg-6">
                                <input type="hidden" class="form-control digit" name="LotID" id="LotID" value="<?php echo $T_Lot_FG['LotIDKey']; ?>" >

                                <div class="form-group">


                                    <label>工厂</label>
                                  <select class="form-control" id="PlantKey" name="PlantKey" readonly></td>

                                    <option value="<?php echo $T_Lot_FG['PlantName'];?>"><?php echo $T_Lot_FG['PlantName'];?></option>
                                    </select>
                                </div>

                                <!-- /.form-group -->
                                <div class="form-group">
                                  <label>批数:</label>
                                  <input class="form-control" name="LotCount" id="LotCount" placeholder="Enter Lot Count" value="<?php echo $T_Lot_FG['LotCount']; ?>" readonly>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>检验日期:</label>
                                    <?php //$date = date("Y-m-d\TH:i:s", strtotime($T_Record_Master['RecordCreatedDateTime'])); ?>
                                  <input class="form-control" type="datetime-local" name="RecordCreatedDateTime" onkeydown="return false" max="<?php echo date('Y-m-d\TH:i:s'); ?>" value="<?php echo date('Y-m-d\TH:i:s');?>">
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>批号:</label>
                                  <input class="form-control" name="BatchNumber" id="BatchNumber" maxlength="40" placeholder="Enter Batch Number" value="<?php echo $T_Lot_FG['BatchNumber']; ?>" readonly>
                                  <div id="checkk"></div>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>托盘ID:</label>
                                  <input class="form-control" name="PalletID" id="PalletID" placeholder="Enter Pallet ID" value="<?php echo $T_Lot_FG['PalletID']; ?>" readonly>

                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>检查阶段:</label></br>
                                    <div class="radio">
                                      <label>
                                      <input type="radio" name="inspection_stage" value="1" id="FGCondradio1" onclick="EnableDisableTextBox()" readonly>FINISHED GOOD
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                      <input type="radio" name="inspection_stage" value="0"  id="FGCondradio2" onclick="EnableDisableTextBox()" readonly>FINISHED GOOD OVERALL (COMBINE SIZE)
                                      </label>
                                    </div>
                                    <script>
                                        $('.inspection_stage').ready(function(){
                                          var inspection_stage = '<?php echo $T_Lot_FG['FGCondition'];?>';
                                          console.log('inspection_stage : '+inspection_stage);
                                          if(inspection_stage== '1'){
                                            $('#FGCondradio1').prop("checked", true);
                                          }else{
                                            $('#FGCondradio2').prop("checked", true);
                                          }
                                        })

                                    </script>

                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>类别:</label></br>

                                <select class="form-control " id="InspectionPlanKey" name="InspectionPlanKey" readonly></td>
                                          <option value="<?php echo $T_Lot_FG['InspectionPlanName'];?>"><?php echo $T_Lot_FG['InspectionPlanName'];?></option>
                                  </select>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">

                                  <label>尺寸:</label>
                                <select class="form-control" id="GloveSizeCodeLong" name="GloveSizeCodeLong" readonly></td>
                                    <option value="<?php echo $T_Lot_FG['GloveSizeCodeLong'];?>"><?php echo $T_Lot_FG['GloveSizeCodeLong'];?></option>

                                  </select>

                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>Pallet Number:</label>
                                  <input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="PalletNumber" id="PalletNumber" value="<?php echo $T_Lot_FG['PalletNumber']; ?>" readonly>

                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>检查次数:</label>
                                  <input class="form-control" type="number" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null;" name="InspectionCount" id="InspectionCount" placeholder="Enter Inspection Count" onkeyup="checkcount()"   required>
                                </div>
                                <!-- /.form-group -->

                                <script>
                                  function checkcount() {
                                    var x, text;
                                    x = document.getElementById("InspectionCount").value;

                                    if (isNaN(x) || x < 0 || x > 101) {
                                      document.getElementById("InspectionCount").value = "";
                                      alert('limit count')
                                    }else{

                                    }
                                  }
                                </script>

                                <div class="form-group">
                                  <label>数量 CTN/BAG:</label>
                                  <input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control" name="CartonQuantity" placeholder="Enter Carton Quantity" value="<?php echo $T_Lot_FG['CartonQuantity']; ?>"readonly>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>纸箱号:</label>
                                  <input class="form-control" name="CartonNum" placeholder="Enter Carton Number" value="<?php echo $T_Lot_CartonNum['CartonNum']; ?>"required>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>地位:</label>

                                  <label class="checkbox-inline">
                                    <input type="radio" name="RecordStatusFlag" id="optionsRadios1" value="1" >&nbsp;N/A
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="radio" name="RecordStatusFlag" id="optionsRadios2" value="2" checked>&nbsp;Reinspect
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="radio" name="RecordStatusFlag" id="optionsRadios3" value="3">&nbsp;Convert Inspection
                                  </label>
                                  <label class="checkbox-inline">
                                    <input type="radio" name="RecordStatusFlag" id="optionsRadios4" value="4">&nbsp;Repack Inspection
                                  </label>
                                </div>
                                <!-- /.form-group -->

                              </div>
                              <!-- /.col-lg-6 -->

                              <div class="col-lg-6">

                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>项目编号:</label>
                                  <input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="SOItemNumber" id="SOItemNumber" value="<?php echo $T_Lot_FG['SOItemNumber']; ?>" readonly>

                                </div>

                                <!-- /.form-group -->

                                <div class="form-group">



                                  <label>顾客:</label>
                                <select class="form-control " id="CustomerName" name="CustomerName" readonly></td>
                                          <option value="<?php echo $T_Lot_FG['CustomerName'];?>"><?php echo $T_Lot_FG['CustomerName'];?></option>

                                  </select>

                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>牌:</label>
                                <select class="form-control " id="BrandName" name="BrandName" readonly></td>
                                        <option value="<?php echo $T_Lot_FG['BrandName'];?>"><?php echo $T_Lot_FG['BrandName'];?></option>

                                  </select>


                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>编号:</label>
                                  <input type="number" class="form-control" min="1" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength="10" name="SONumber" id="SONumber" value="<?php echo $T_Lot_FG['SONumber']; ?>" readonly>
                                  <div id="checkk"></div>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>批号:</label>
                                  <input type="input" class="form-control" name="LotNumber" id="LotNumber" value="<?php echo $T_Lot_FG['LotNumber']; ?>" readonly>

                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>产品:</label>
                                <select class="form-control " id="GloveProductTypeName" name="GloveProductTypeName" readonly></td>
                                          <option value="<?php echo $T_Lot_FG['GloveProductTypeName'];?>"><?php echo $T_Lot_FG['GloveProductTypeName'];?></option>

                                  </select>

                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>产品代码:</label>
                                  <select class="form-control" id="GloveCodeLong" name="GloveCodeLong" readonly></td>
                                        <option value="<?php echo $T_Lot_FG['GloveCodeLong'];?>"><?php echo $T_Lot_FG['GloveCodeLong'];?></option>

                                  </select>

                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>颜色:</label>


                                  <?php
                                  function Colour_selection($connect, $matching)
                                  {
                                    $output = '';
                                    $query = "SELECT * FROM M_GloveColour";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    $result = $statement->fetchAll();
                                    foreach($result as $row)
                                    {

                                        if($row['GloveColourName'] == $matching ){
                                          $output .= '<option value="'.$row['GloveColourCode'].'" selected>'.$row['GloveColourName'].'</option>';
                                        }else{
                                          $output .= '<option value="'.$row['GloveColourCode'].'" >'.$row['GloveColourName'].'</option>';
                                        }
                                    }
                                    return $output;
                                  }
                                  ?>

                                  <select class="form-control " id="GloveColourCode" name="GloveColourCode" readonly></td>
                                      <?php echo Colour_selection($connect,$T_Lot_FG['GloveColourName']);?>
                                  </select>

                                </div>
                                <!-- /.form-group -->

                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                  <tr class="info">
                                    <th class="text-center" colspan="2">生产:</th>
                                    <th class="text-center">转移:</th>
                                  </tr>

                                  <tr>
                                    <td>
                                      <?php
                                      function ProductionLineName_selection($connect, $matching)
                                      {
                                        $output = '';
                                        $query = "SELECT ProductionLineName FROM DimProductionLine";
                                        $statement = $connect->prepare($query);
                                        $statement->execute();
                                        $result = $statement->fetchAll();
                                        foreach($result as $row)
                                        {

                                            if($row['ProductionLineName'] == $matching ){
                                              $output .= '<option value="'.$row['ProductionLineName'].'" selected>'.$row['ProductionLineName'].'</option>';
                                            }else{
                                              $output .= '<option value="'.$row['ProductionLineName'].'" >'.$row['ProductionLineName'].'</option>';
                                            }
                                        }
                                        return $output;
                                      }
                                      ?>
                                      <select class="form-control fstdropdown-select" name="ProductionLineName1" required>
                                          <?php echo ProductionLineName_selection($connect,$T_Lot_ProductionDateWLine[0]['ProductionLineName']);?>
                                      </select>
                                    </td>

                                    <td>
                                      <?php $dateP1 = date("Y-m-d", strtotime($T_Lot_ProductionDateWLine[0]['ProductionDate'])); ?>

                                      <input type="date" class="form-control" name="product_date1" value="<?php echo $dateP1; ?>" id="product_date1" onkeydown="return false" required style="padding: 0 0 0 8px;">
                                    </td>

                                    <td>
                                      <select class="form-control" id="shift1" name="shift1" required>
                                        <option name="shift1" value=""> N/A</option>
                                        <option name="shift1" value="1"> Shift 1</option>
                                        <option name="shift1" value="2"> Shift 2</option>
                                        <option name="shift1" value="3"> Shift 3</option>
                                      </select>
                                      <script>
                                          $('.shift1').ready(function(){
                                            var shift1 = '<?php echo $T_Lot_ProductionDateWLine[0]['SHIFT'];?>';
                                            console.log('shift1 : '+shift1);
                                            $("#shift1 > [value=" + shift1 + "]").attr("selected", "true");
                                          })

                                      </script>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td>

                                      <select class="form-control fstdropdown-select" name="ProductionLineName2">
                                        <option class="form-control" value=""> 生产线</option>
                                        <?php

                                          if( count($T_Lot_ProductionDateWLine) >= 2){
                                            echo ProductionLineName_selection($connect,$T_Lot_ProductionDateWLine[1]['ProductionLineName']);
                                          }else{
                                            echo ProductionLineName_selection($connect,"NaN");
                                          }?>
                                      </select>


                                    </td>

                                    <td>
                                      <?php if( count($T_Lot_ProductionDateWLine) >= 2){ ?>
                                        <?php $dateP2 = date("Y-m-d", strtotime($T_Lot_ProductionDateWLine[1]['ProductionDate'])); ?>

                                      <input type="date" class="form-control" name="product_date2" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $dateP2; ?>" id="product_date2" onkeydown="return false" style="padding: 0 0 0 8px;">
                                    <?php }else{ ?>

                                      <input type="date" class="form-control" name="product_date2" max="<?php echo date('Y-m-d'); ?>" id="product_date2" onkeydown="return false" style="padding: 0 0 0 8px;">

                                    <?php } ?>
                                    </td>

                                    <td>
                                      <select class="form-control" id="shift2" name="shift2">

                                        <option name="shift2" value=""> N/A</option>
                                        <option name="shift2" value="1"> Shift 1</option>
                                        <option name="shift2" value="2"> Shift 2</option>
                                        <option name="shift2" value="3"> Shift 3</option>
                                        <?php if( count($T_Lot_ProductionDateWLine) >= 2){  ?>
                                          <script>
                                              $('.shift2').ready(function(){
                                                var shift2 = '<?php echo $T_Lot_ProductionDateWLine[1]['SHIFT'];?>';
                                                console.log('shift2 : '+shift2);
                                                $("#shift2 > [value=" + shift2 + "]").attr("selected", "true");
                                              })

                                          </script>
                                          <?php
                                        }else{ } ?>

                                      </select>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td>
                                      <select class="form-control fstdropdown-select" name="ProductionLineName3">
                                        <option class="form-control" value=""> 生产线</option>
                                        <?php

                                          if( count($T_Lot_ProductionDateWLine) >= 3){
                                            echo ProductionLineName_selection($connect,$T_Lot_ProductionDateWLine[2]['ProductionLineName']);
                                          }else{
                                            echo ProductionLineName_selection($connect,"NaN");
                                          }?>
                                        </select>

                                    </td>

                                    <td>
                                      <?php if( count($T_Lot_ProductionDateWLine) >= 3){ ?>
                                        <?php $dateP2 = date("Y-m-d", strtotime($T_Lot_ProductionDateWLine[2]['ProductionDate'])); ?>

                                      <input type="date" class="form-control" name="product_date3" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $dateP2; ?>" id="product_date3" onkeydown="return false" style="padding: 0 0 0 8px;">
                                    <?php }else{ ?>

                                      <input type="date" class="form-control" name="product_date3" max="<?php echo date('Y-m-d'); ?>" id="product_date3" onkeydown="return false" style="padding: 0 0 0 8px;">

                                    <?php } ?>
                                    </td>

                                    <td>
                                      <select class="form-control" id="shift3" name="shift3">
                                        <option name="shift3" value=""> N/A</option>
                                        <option name="shift3" value="1"> Shift 1</option>
                                        <option name="shift3" value="2"> Shift 2</option>
                                        <option name="shift3" value="3"> Shift 3</option>
                                        <?php if( count($T_Lot_ProductionDateWLine) >= 3){  ?>
                                          <script>
                                              $('.shift3').ready(function(){
                                                var shift3 = '<?php echo $T_Lot_ProductionDateWLine[2]['SHIFT'];?>';
                                                console.log('shift3 : '+shift3);
                                                $("#shift3 > [value=" + shift3 + "]").attr("selected", "true");
                                              })

                                          </script>
                                          <?php
                                        }else{ } ?>
                                      </select>
                                    </td>
                                  </tr>

                                </table>

                                <div class="form-group">
                                  <label>包装日期:</label>
                                  <?php $pkdate = date("Y-m-d", strtotime($T_Lot_PackingDate['PackingDate'])); ?>
                                  <input class="form-control" type="date" name="PackingDate" id="PackingDate" value="<?php echo $pkdate; ?>" onkeydown="return false" required style="padding: 0 0 0 8px;">
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group">
                                  <label>通过检查:</label>

                                  <input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control" name="InspectionUserID" placeholder="Insert Badge ID" value="<?php echo $T_Record_Master['InspectionUserID']; ?>" list="InspectionUserID" required>

                                </div>
                                <!-- /.form-group -->

                              </div>
                              <!-- /.col-lg-6 -->

                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                      </div>
                      <!-- /.panel -->

                      <!-------------------------------------------------------OTHER TESTING------------------------------------------------------->
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                        其他测试
                        </div>

                        <div class="panel-body">
                          <div class="row">

                            <div class="col-lg-6">

                              <label>1. 检测设备</label>
                              </br></br>

                              <div class="form-group">
                                <label>体重秤 ID</label>
                                <input class="form-control" type="text" name="InstrumentValue" id="InstrumentValue" value="<?php echo $T_Record_Instrument[0]['InstrumentValue'];?>" readonly><br>
                              </div>
                              <!-- /.form-group -->

                              <div class="form-group">
                                <label>统治者 ID</label>
                                <input class="form-control" type="text" name="InstrumentValue2" id="InstrumentValue" value="<?php echo $T_Record_Instrument[2]['InstrumentValue'];?>" readonly><br>
                              </div>
                              <!-- /.form-group -->

                              <div class="form-group">
                                <label>测厚仪 ID</label>
                                <input class="form-control" type="text" name="InstrumentValue3" id="InstrumentValue" value="<?php echo $T_Record_Instrument[1]['InstrumentValue'];?>" readonly><br>
                              </div>
                              <!-- /.form-group -->

                              <label>2. 手套重量、计数、包装缺陷</label>
                              </br></br>

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                <tr>
                                  <td width="20%" class="info">GLOVE WEIGHT:</td>
                                  <td>
                                    <label class="checkbox-inline">
                                    <input type="radio" name="TestValue" id="TV1optionsRadios1" value="N/A">N/A
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="radio" name="TestValue" id="TV1optionsRadios2" value="PASS">PASS
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="radio" name="TestValue" id="TV1optionsRadios3" value="FAIL">FAIL
                                    </label>
                                    <script>
                                        $('.TestValue').ready(function(){
                                          var testval1 = '<?php echo  $testResult_pivot['GloveWeightTest'];?>';
                                          console.log(testval1);
                                          if(testval1 == 'PASS'){
                                            $('#TV1optionsRadios2').prop("checked", true);
                                          }else if (testval1 == 'FAIL') {
                                              $('#TV1optionsRadios3').prop("checked", true);
                                          }else{
                                            $('#TV1optionsRadios1').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>
                                  <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="SRText1" placeholder="Enter code" value="<?php echo $testResult_pivot['GloveWeightAverage'];?>"></td>
                                </tr>

                                <tr>
                                  <td width="20%" class="info">数数:</td>
                                  <td><label class="checkbox-inline">
                                    <input type="radio" name="TestValue2" id="TV2optionsRadios1" value="N/A">N/A
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="radio" name="TestValue2" id="TV2optionsRadios2" value="PASS">PASS
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="radio" name="TestValue2" id="TV2optionsRadios3" value="FAIL">FAIL
                                    </label>
                                  </td>
                                  <script>
                                      $('.TestValue2').ready(function(){
                                        var testval2 = '<?php echo  $testResult_pivot['CountingTest'];?>';
                                        console.log(testval2);
                                        if(testval2 == 'PASS'){
                                          $('#TV2optionsRadios2').prop("checked", true);
                                        }else if (testval2 == 'FAIL') {
                                            $('#TV2optionsRadios3').prop("checked", true);
                                        }else{
                                          $('#TV2optionsRadios1').prop("checked", true);
                                        }
                                      })

                                  </script>
                                  <td><input class="form-control" name="SRText2" placeholder="Enter code" value="<?php echo $testSRText_pivot['CountingTest'];?>" ></td>
                                </tr>

                                <tr>
                                  <td width="20%" class="info">包装缺陷:</td>
                                  <td><label class="checkbox-inline">
                                    <input type="radio" name="TestValue3" id="TV3optionsRadios1" value="N/A" checked>N/A
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="radio" name="TestValue3" id="TV3optionsRadios2" value="PASS">PASS
                                    </label>
                                    <label class="checkbox-inline">
                                    <input type="radio" name="TestValue3" id="TV3optionsRadios3" value="FAIL">FAIL
                                    </label>
                                  </td>
                                  <script>
                                      $('.TestValue3').ready(function(){
                                        var testval3 = '<?php echo  $testResult_pivot['PackagingDefectsTest'];?>';
                                        console.log(testval3);
                                        if(testval3 == 'PASS'){
                                          $('#TV3optionsRadios2').prop("checked", true);
                                        }else if (testval3 == 'FAIL') {
                                            $('#TV3optionsRadios3').prop("checked", true);
                                        }else{
                                          $('#TV3optionsRadios1').prop("checked", true);
                                        }
                                      })

                                  </script>
                                  <td><input class="form-control" name="SRTextPackaging" placeholder="Enter code" value="<?php echo $testSRText_pivot['PackagingDefectsTest'];?>" ></td>
                                </tr>

                              </table>

                            </div>
                            <!-- /.col-lg-6 -->

                            <div class="col-lg-6">

                              <label>3. 内部物理测试</label>

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                <tr>
                                  <th scope="col" class="info">Layering:</th>
                                  <td>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue4" id="optionsRadios4t1" value="N/A" >N/A
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue4" id="optionsRadios4t2" value="PASS">PASS
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue4" id="optionsRadios4t3" value="FAIL">FAIL
                                    </label>
                                    <script>
                                        $('.TestValue4').ready(function(){
                                          var testval4 = '<?php echo  $testResult_pivot['LayeringTest'];?>';
                                          console.log('layering: '+testval4);
                                          if(testval4 == 'PASS'){
                                            $('#optionsRadios4t2').prop("checked", true);
                                          }else if (testval4  == 'FAIL') {
                                              $('#optionsRadios4t3').prop("checked", true);
                                          }else{
                                            $('#optionsRadios4t1').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th class="info">臭:</th>
                                  <td>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue5" id="optionsRadios5t1" value="N/A" >N/A
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue5" id="optionsRadios5t2" value="PASS">PASS
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue5" id="optionsRadios5t3" value="FAIL">FAIL
                                    </label>
                                    <script>
                                        $('.TestValue5').ready(function(){
                                          var testval5 = '<?php echo  $testResult_pivot['SmellTest'];?>';
                                          console.log('Smelly: '+testval5);
                                          if(testval5 == 'PASS'){
                                            $('#optionsRadios5t2').prop("checked", true);
                                          }else if (testval5  == 'FAIL') {
                                              $('#optionsRadios5t3').prop("checked", true);
                                          }else{
                                            $('#optionsRadios5t1').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">抓地力:</th>
                                  <td>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue6" id="optionsRadios6t1" value="N/A" checked>N/A
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue6" id="optionsRadios6t2" value="PASS">PASS
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue6" id="optionsRadios6t3" value="FAIL">FAIL
                                    </label>
                                    <script>
                                        $('.TestValue6').ready(function(){
                                          var testval6 = '<?php echo  $testResult_pivot['GripTest'];?>';
                                          console.log('grip: '+testval6);
                                          if(testval6== 'PASS'){
                                            $('#optionsRadios6t2').prop("checked", true);
                                          }else if (testval6  == 'FAIL') {
                                              $('#optionsRadios6t3').prop("checked", true);
                                          }else{
                                            $('#optionsRadios6t1').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">黑布:</th>
                                  <td>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue8" id="optionsRadios8t1" value="N/A" >N/A
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue8" id="optionsRadios8t2" value="PASS" >PASS
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue8" id="optionsRadios8t3" value="FAIL">FAIL
                                    </label>
                                    <script>
                                        $('.TestValue8').ready(function(){
                                          var testval8 = '<?php echo  $testResult_pivot['BlackClothTest'];?>';
                                          console.log('black cloth: '+testval8);
                                          if(testval8== 'PASS'){
                                            $('#optionsRadios8t2').prop("checked", true);
                                          }else if (testval8  == 'FAIL') {
                                              $('#optionsRadios8t3').prop("checked", true);
                                          }else{
                                            $('#optionsRadios8t1').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th class="info">粘着:</th>
                                  <td>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue9" id="optionsRadios9t1" value="N/A" checked>N/A
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue9" id="optionsRadios9t2" value="PASS">PASS
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue9" id="optionsRadios9t3" value="FAIL">FAIL
                                    </label>
                                    <script>
                                        $('.TestValue9').ready(function(){
                                          var testval9 = '<?php echo  $testResult_pivot['StickingTest'];?>';
                                          console.log('sticky: '+testval9);
                                          if(testval9== 'PASS'){
                                            $('#optionsRadios9t2').prop("checked", true);
                                          }else if (testval9  == 'FAIL') {
                                              $('#optionsRadios9t3').prop("checked", true);
                                          }else{
                                            $('#optionsRadios9t1').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">点胶:</th>
                                  <td>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue10" id="optionsRadios10t1" value="N/A" >N/A
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue10" id="optionsRadios10t2" value="PASS">PASS
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue10" id="optionsRadios10t3" value="FAIL">FAIL
                                    </label>
                                    <script>
                                        $('.TestValue10').ready(function(){
                                          var testval10 = '<?php echo  $testResult_pivot['DispensingTest'];?>';
                                          console.log('dispesing : '+testval10);
                                          if(testval10== 'PASS'){
                                            $('#optionsRadios10t2').prop("checked", true);
                                          }else if (testval10  == 'FAIL') {
                                              $('#optionsRadios10t3').prop("checked", true);
                                          }else{
                                            $('#optionsRadios10t1').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th class="info">白布:</th>
                                  <td>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue11" id="optionsRadios11t1" value="N/A" >N/A
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue11" id="optionsRadios11t2" value="PASS" >PASS
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue11" id="optionsRadios11t3" value="FAIL">FAIL
                                    </label>
                                    <script>
                                        $('.TestValue11').ready(function(){
                                          var testval11 = '<?php echo  $testResult_pivot['WhiteClothTest'];?>';
                                          console.log('whitecloth : '+testval11);
                                          if(testval11== 'PASS'){
                                            $('#optionsRadios11t2').prop("checked", true);
                                          }else if (testval11  == 'FAIL') {
                                              $('#optionsRadios11t3').prop("checked", true);
                                          }else{
                                            $('#optionsRadios11t1').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th class="info">染料泄漏:</th>
                                  <td>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue17" id="optionsRadios17t1" value="N/A" >N/A
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue17" id="optionsRadios17t2" value="PASS" >PASS
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue17" id="optionsRadios17t3" value="FAIL">FAIL
                                    </label>
                                    <script>
                                        $('.TestValue17').ready(function(){
                                          var testval17 = '<?php echo  $testResult_pivot['Dye Leak Test'];?>';

                                          console.log('dyeleak : '+testval17);
                                          if(testval17== 'PASS'){
                                            $('#optionsRadios17t2').prop("checked", true);
                                          }else if (testval17  == 'FAIL') {
                                              $('#optionsRadios17t3').prop("checked", true);
                                          }else{
                                            $('#optionsRadios17t1').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th class="info">密封:</th>
                                  <td>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue18" id="optionsRadios18t1" value="N/A" >N/A
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue18" id="optionsRadios18t2" value="PASS" >PASS
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue18" id="optionsRadios18t3" value="FAIL">FAIL
                                    </label>
                                    <script>
                                        $('.TestValue18').ready(function(){
                                          var testval18 = '<?php echo  $testResult_pivot['Sealing Test'];?>';
                                          console.log('sealing : '+testval18);
                                          if(testval18== 'PASS'){
                                            $('#optionsRadios18t2').prop("checked", true);
                                          }else if (testval18  == 'FAIL') {
                                              $('#optionsRadios18t3').prop("checked", true);
                                          }else{
                                            $('#optionsRadios18t1').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th class="info">爆破测试:</th>
                                  <td>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue19" id="optionsRadios19t1" value="N/A" >N/A
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue19" id="optionsRadios19t2" value="PASS" >PASS
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue19" id="optionsRadios19t3" value="FAIL">FAIL
                                    </label>
                                    <script>
                                        $('.TestValue19').ready(function(){
                                          var testval19 = '<?php echo  $testResult_pivot['BurstTest'];?>';
                                          console.log('burst : '+testval19);
                                          if(testval19== 'PASS'){
                                            $('#optionsRadios19t2').prop("checked", true);
                                          }else if (testval19  == 'FAIL') {
                                              $('#optionsRadios19t3').prop("checked", true);
                                          }else{
                                            $('#optionsRadios19t1').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th class="info">视觉和剥离能力:</th>
                                  <td>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue20" id="optionsRadios20t1" value="N/A" checked>N/A
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue20" id="optionsRadios20t2" value="PASS" >PASS
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue20" id="optionsRadios20t3" value="FAIL">FAIL
                                    </label>
                                    <script>
                                        $('.TestValue20').ready(function(){
                                          var testval20 = '<?php echo  $testResult_pivot['Visual & Peel Ability'];?>';
                                          console.log('vp ability : '+testval20);
                                          if(testval20== 'PASS'){
                                            $('#optionsRadios20t2').prop("checked", true);
                                          }else if (testval20  == 'FAIL') {
                                              $('#optionsRadios20t3').prop("checked", true);
                                          }else{
                                            $('#optionsRadios20t1').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>
                                </tr>

                              </table>

                              <table class="table table-bordered">

                                <tr>
                                  <th style=" vertical-align: middle;" class="info" rowspan="2" width="30%">穿戴和撕裂:</th>
                                  <th class="info text-center" width="30%">结果:</th>
                                  <th class="info text-center">评论:</th>
                                </tr>

                                <tr>
                                  <td>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue7" id="optionsRadios7t1" value="N/A" >N/A
                                    </label>

                                    <br>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue7" id="optionsRadios7t2" value="PASS">PASS
                                    </label>
                                    <br>

                                    <label class="checkbox-inline">
                                      <input type="radio" name="TestValue7" id="optionsRadios7t3" value="FAIL">FAIL
                                    </label>

                                    <script>
                                        $('.TestValue7').ready(function(){
                                          var testval7 = '<?php echo  $testResult_pivot['DonningTearingTest'];?>';
                                          console.log('DonningTearingTest : '+testval7);
                                          if(testval7== 'PASS'){
                                            $('#optionsRadios7t2').prop("checked", true);
                                          }else if (testval7  == 'FAIL') {
                                              $('#optionsRadios7t3').prop("checked", true);
                                          }else{
                                            $('#optionsRadios7t1').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>

                                  <td>
                                    <input class="form-control" name="SRText8" id="remark_donningtearing" placeholder="Enter text" value="<?php echo  $testSRText_pivot['DonningTearingTest'];?>">
                                  </td>
                                </tr>

                              </table>

                              <label>4. Special Requirements</label>
                              <br><br>

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                <tr class="info">
                                  <th>测试 No:</th>
                                  <th>测试 Name:</th>
                                  <th>处置:</th>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">Test 1:</th>
                                  <td>
                                    <select class="form-control" id="TestValue12" name="TestValue12">
                                      <option class="form-control" name="TestValue12" value="N/A">N/A</option>
                                      <option class="form-control" name="TestValue12" value="OMT"> OMT</option>
                                      <option class="form-control" name="TestValue12" value="Foaming "> Foaming </option>
                                      <option  class="form-control" name="TestValue12" value="Rubbing"> Rubbing</option>
                                      <option class="form-control" name="TestValue12" value="IPA "> IPA </option>
                                      <option class="form-control" name="TestValue12" value="Alcohol "> Alcohol </option>
                		      <option class="form-control" name="TestValue12" value="Physical Properties "> Physical Properties </option>
                                    </select>

                                    <script>
                                        $('.TestValue12').ready(function(){
                                          var TestValue12 = '<?php echo  $testResult_pivot['Test 1 Name'];?>';
                                          console.log('TestValue12 : '+TestValue12);
                                          $("#TestValue12 > [value='" + TestValue12 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                  <td>
                                    <select class="form-control" id="SRText3" name="SRText3">
                                      <option class="form-control" name="SRText3" value="N/A"> N/A </option>
                                      <option class="form-control" name="SRText3" value="PASS"> PASS</option>
                                      <option class="form-control" name="SRText3" value="FAIL "> FAIL </option>
                                    </select>
                                    <script>
                                        $('.SRText3').ready(function(){
                                          var SRText3 = '<?php echo  $testSRText_pivot['Test 1 Name'];?>';
                                          console.log('SRText3 : '+SRText3);
                                          $("#SRText3 > [value='" + SRText3 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">Test 2:</th>
                                  <td>
                                    <select class="form-control" id="TestValue13" name="TestValue13" >
                                      <option class="form-control" name="TestValue13" value="N/A">N/A</option>
                                      <option class="form-control" name="TestValue13" value="OMT"> OMT</option>
                                      <option class="form-control" name="TestValue13" value="Foaming "> Foaming </option>
                                      <option  class="form-control" name="TestValue13" value="Rubbing"> Rubbing</option>
                                      <option class="form-control" name="TestValue13" value="IPA "> IPA </option>
                                      <option class="form-control" name="TestValue13" value="Alcohol "> Alcohol </option>
                		      <option class="form-control" name="TestValue13" value="Physical Properties "> Physical Properties </option>
                                    </select>
                                    <script>
                                        $('.TestValue13').ready(function(){
                                          var TestValue13 = '<?php echo  $testResult_pivot['Test 2 Name'];?>';
                                          console.log('TestValue13 : '+TestValue12);
                                          $("#TestValue13 > [value='" + TestValue13 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>

                                  <td>
                                    <select class="form-control" id="SRText4" name="SRText4">
                                      <option class="form-control" name="SRText4" value="N/A"> N/A </option>
                                      <option class="form-control" name="SRText4" value="PASS"> PASS</option>
                                      <option class="form-control" name="SRText4" value="FAIL "> FAIL </option>
                                    </select>
                                    <script>
                                        $('.SRText4').ready(function(){
                                          var SRText4 = '<?php echo  $testSRText_pivot['Test 2 Name'];?>';
                                          console.log('SRText4 : '+SRText4);
                                          $("#SRText4 > [value='" + SRText4 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">Test 3:</th>
                                  <td>
                                    <select class="form-control" id="TestValue14" name="TestValue14" >
                                      <option class="form-control" name="TestValue14" value="N/A">N/A</option>
                                      <option class="form-control" name="TestValue14" value="OMT"> OMT</option>
                                      <option class="form-control" name="TestValue14" value="Foaming "> Foaming </option>
                                      <option  class="form-control" name="TestValue14" value="Rubbing"> Rubbing</option>
                                      <option class="form-control" name="TestValue14" value="IPA "> IPA </option>
                                      <option class="form-control" name="TestValue14" value="Alcohol "> Alcohol </option>
                		      <option class="form-control" name="TestValue14" value="Physical Properties "> Physical Properties </option>
                                    </select>
                                    <script>
                                        $('.TestValue14').ready(function(){
                                          var TestValue14 = '<?php echo  $testResult_pivot['Test 3 Name'];?>';
                                          console.log('TestValue14 : '+TestValue14);
                                          $("#TestValue14 > [value='" + TestValue14 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                  <td>
                                    <select class="form-control" id="SRText5" name="SRText5">
                                      <option class="form-control" name="SRText5" value="N/A"> N/A </option>
                                      <option class="form-control" name="SRText5" value="PASS"> PASS</option>
                                      <option class="form-control" name="SRText5" value="FAIL "> FAIL </option>
                                    </select>
                                    <script>
                                        $('.SRText5').ready(function(){
                                          var SRText5 = '<?php echo  $testSRText_pivot['Test 3 Name'];?>';
                                          console.log('SRText5 : '+SRText5);
                                          $("#SRText5 > [value='" + SRText5 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">Test 4:</th>
                                  <td>
                                    <select class="form-control" id="TestValue15" name="TestValue15" >
                                      <option class="form-control" name="TestValue15" value="N/A">N/A</option>
                                      <option class="form-control" name="TestValue15" value="OMT"> OMT</option>
                                      <option class="form-control" name="TestValue15" value="Foaming "> Foaming </option>
                                      <option  class="form-control" name="TestValue15" value="Rubbing"> Rubbing</option>
                                      <option class="form-control" name="TestValue15" value="IPA "> IPA </option>
                                      <option class="form-control" name="TestValue15" value="Alcohol "> Alcohol </option>
                		      <option class="form-control" name="TestValue15" value="Physical Properties "> Physical Properties </option>
                                    </select>
                                    <script>
                                        $('.TestValue15').ready(function(){
                                          var TestValue15 = '<?php echo  $testResult_pivot['Test 4 Name'];?>';
                                          console.log('TestValue15 : '+TestValue15);
                                          $("#TestValue15 > [value='" + TestValue15 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                  <td>
                                    <select class="form-control" id="SRText6" name="SRText6">
                                      <option class="form-control" name="SRText6" value="N/A"> N/A </option>
                                      <option class="form-control" name="SRText6" value="PASS"> PASS</option>
                                      <option class="form-control" name="SRText6" value="FAIL "> FAIL </option>
                                    </select>
                                    <script>
                                        $('.SRText6').ready(function(){
                                          var SRText6 = '<?php echo  $testSRText_pivot['Test 4 Name'];?>';
                                          console.log('SRText6 : '+SRText6);
                                          $("#SRText6 > [value='" + SRText6 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">Test 5:</th>
                                  <td>
                                    <select class="form-control" id="TestValue16" name="TestValue16" >
                                      <option class="form-control" name="TestValue16" value="N/A">N/A</option>
                                      <option class="form-control" name="TestValue16" value="OMT"> OMT</option>
                                      <option class="form-control" name="TestValue16" value="Foaming "> Foaming </option>
                                      <option  class="form-control" name="TestValue16" value="Rubbing"> Rubbing</option>
                                      <option class="form-control" name="TestValue16" value="IPA "> IPA </option>
                                      <option class="form-control" name="TestValue16" value="Alcohol "> Alcohol </option>
                		      <option class="form-control" name="TestValue16" value="Physical Properties "> Physical Properties </option>
                                    </select>
                                    <script>
                                        $('.TestValue16').ready(function(){
                                          var TestValue16 = '<?php echo  $testResult_pivot['Test 5 Name'];?>';
                                          console.log('TestValue16 : '+TestValue16);
                                          $("#TestValue16 > [value='" + TestValue16 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                  <td>
                                    <select class="form-control" id="SRText7" name="SRText7">
                                      <option class="form-control" name="SRText7" value="N/A"> N/A </option>
                                      <option class="form-control" name="SRText7" value="PASS"> PASS</option>
                                      <option class="form-control" name="SRText7" value="FAIL "> FAIL </option>
                                    </select>
                                    <script>
                                        $('.SRText7').ready(function(){
                                          var SRText7 = '<?php echo  $testSRText_pivot['Test 5 Name'];?>';
                                          console.log('SRText7 : '+SRText7);
                                          $("#SRText7 > [value='" + SRText7 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                </tr>

                              </table>

                            </div><br>
                            <!-- /.col-lg-6 -->

                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                      </div>
                      <!-- /.panel -->

                      <!--------------------------------------------------PHYSICAL DIMENSION TEST-------------------------------------------------->
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                        物理尺寸测试
                        </div>

                        <div class="panel-body">
                          <div class="row">

                            <div class="col-lg-6">

                              <table class="table table-bordered" id="dataTable">

                                <tr>
                                  <th scope="col" class="info">方法:</th>
                                  <td>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="method" id="optionsRadiosmethod2" value="SINGLE WALL">单墙
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="method" id="optionsRadiosmethod1" value="DOUBLE WALL">双墙
                                    </label>
                                    <script>
                                        $('.method').ready(function(){
                                          var method = '<?php echo  $testResult_pivot['ThicknessTestMethod'];?>';
                                          console.log('method : '+method);
                                          if(method== 'SINGLE WALL'){
                                            $('#optionsRadiosmethod2').prop("checked", true);
                                          }else{
                                            $('#optionsRadiosmethod1').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>
                                </tr>

                              </table>

                            </div>
                            <!-- /.col-lg-6 -->

                            <div class="col-lg-12">

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                <tr class="info">
                                  <th>测试样本</th>
                                  <th>1</th>
                                  <th>2</th>
                                  <th>3</th>
                                  <th>4</th>
                                  <th>5</th>
                                  <th>6</th>
                                  <th>7</th>
                                  <th>8</th>
                                  <th>9</th>
                                  <th>10</th>
                                  <th>11</th>
                                  <th>12</th>
                                  <th>13</th>
                                  <th>PASS/FAIL</th>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">长度(mm):</th>
                                  <td><input class="form-control decimal" name="length1" id="length" placeholder="" value="<?php echo  $testResult_pivot['Length1'];?>"></td>
                                  <td><input class="form-control decimal" name="length2" id="length2" placeholder="" value="<?php echo  $testResult_pivot['Length2'];?>"></td>
                                  <td><input class="form-control decimal" name="length3" id="length3" placeholder="" value="<?php echo  $testResult_pivot['Length3'];?>"></td>
                                  <td><input class="form-control decimal" name="length4" id="length4" placeholder="" value="<?php echo  $testResult_pivot['Length4'];?>"></td>
                                  <td><input class="form-control decimal" name="length5" id="length5" placeholder="" value="<?php echo  $testResult_pivot['Length5'];?>"></td>
                                  <td><input class="form-control decimal" name="length6" id="length6" placeholder="" value="<?php echo  $testResult_pivot['Length6'];?>"></td>
                                  <td><input class="form-control decimal" name="length7" id="length7" placeholder="" value="<?php echo  $testResult_pivot['Length7'];?>"></td>
                                  <td><input class="form-control decimal" name="length8" id="length8" placeholder="" value="<?php echo  $testResult_pivot['Length8'];?>"></td>
                                  <td><input class="form-control decimal" name="length9" id="length9" placeholder="" value="<?php echo  $testResult_pivot['Length9'];?>"></td>
                                  <td><input class="form-control decimal" name="length10" id="length10" placeholder="" value="<?php echo  $testResult_pivot['Length10'];?>"></td>
                                  <td><input class="form-control decimal" name="length11" id="length11" placeholder="" value="<?php echo  $testResult_pivot['Length11'];?>"></td>
                                  <td><input class="form-control decimal" name="length12" id="length12" placeholder="" value="<?php echo  $testResult_pivot['Length12'];?>"></td>
                                  <td><input class="form-control decimal" name="length13" id="length13" placeholder="" value="<?php echo  $testResult_pivot['Length13'];?>"></td>
                                  <td>
                                    <select class="form-control" id="result_length" name="length_p_f">
                                      <option class="form-control" name="length_p_f" value="N/A"> N/A</option>
                                      <option class="form-control" name="length_p_f" value="PASS"> P</option>
                                      <option class="form-control" name="length_p_f" value="FAIL"> F</option>
                                    </select>
                                    <script>
                                        $('.length_p_f').ready(function(){
                                          var length_p_f = '<?php echo  $testResult_pivot['LengthTest'];?>';
                                          console.log('length_p_f : '+length_p_f);
                                          $("#result_length > [value='" + length_p_f + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">宽度(mm):</th>
                                  <td><input class="form-control decimal" name="width1" id="width1" placeholder="" value="<?php echo $testResult_pivot['Width1'];?>"></td>
                                  <td><input class="form-control decimal" name="width2" id="width2" placeholder="" value="<?php echo $testResult_pivot['Width2'];?>"></td>
                                  <td><input class="form-control decimal" name="width3" id="width3" placeholder="" value="<?php echo $testResult_pivot['Width3'];?>"></td>
                                  <td><input class="form-control decimal" name="width4" id="width4" placeholder="" value="<?php echo $testResult_pivot['Width4'];?>"></td>
                                  <td><input class="form-control decimal" name="width5" id="width5" placeholder="" value="<?php echo $testResult_pivot['Width5'];?>"></td>
                                  <td><input class="form-control decimal" name="width6" id="width6" placeholder="" value="<?php echo $testResult_pivot['Width6'];?>"></td>
                                  <td><input class="form-control decimal" name="width7" id="width7" placeholder="" value="<?php echo $testResult_pivot['Width7'];?>"></td>
                                  <td><input class="form-control decimal" name="width8" id="width8" placeholder="" value="<?php echo $testResult_pivot['Width8'];?>"></td>
                                  <td><input class="form-control decimal" name="width9" id="width9" placeholder="" value="<?php echo $testResult_pivot['Width9'];?>"></td>
                                  <td><input class="form-control decimal" name="width10" id="width10" placeholder="" value="<?php echo $testResult_pivot['Width10'];?>"></td>
                                  <td><input class="form-control decimal" name="width11" id="width11" placeholder="" value="<?php echo $testResult_pivot['Width11'];?>"></td>
                                  <td><input class="form-control decimal" name="width12" id="width12" placeholder="" value="<?php echo $testResult_pivot['Width12'];?>"></td>
                                  <td><input class="form-control decimal" name="width13" id="width13" placeholder="" value="<?php echo $testResult_pivot['Width13'];?>"></td>
                                  <td>
                                    <select class="form-control" id="result_length2" name="width_p_f">
                                      <option class="form-control" name="width_p_f" value="N/A"> N/A</option>
                                      <option class="form-control" name="width_p_f" value="PASS"> P</option>
                                      <option class="form-control" name="width_p_f" value="FAIL"> F</option>
                                    </select>
                                    <script>
                                        $('.result_length2').ready(function(){
                                          var result_length2 = '<?php echo  $testResult_pivot['WidthTest'];?>';
                                          console.log('result_length2 : '+result_length2);
                                          $("#result_length2 > [value='" + result_length2 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">袖带厚度(mm):</th>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff1" id="cuff1" placeholder="" value="<?php echo $testResult_pivot['Cuff1'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff2" id="cuff2" placeholder="" value="<?php echo $testResult_pivot['Cuff2'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff3" id="cuff3" placeholder="" value="<?php echo $testResult_pivot['Cuff3'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff4" id="cuff4" placeholder="" value="<?php echo $testResult_pivot['Cuff4'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff5" id="cuff5" placeholder="" value="<?php echo $testResult_pivot['Cuff5'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff6" id="cuff6" placeholder="" value="<?php echo $testResult_pivot['Cuff6'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff7" id="cuff7" placeholder="" value="<?php echo $testResult_pivot['Cuff7'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff8" id="cuff8" placeholder="" value="<?php echo $testResult_pivot['Cuff8'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff9" id="cuff9" placeholder="" value="<?php echo $testResult_pivot['Cuff9'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff10" id="cuff10" placeholder="" value="<?php echo $testResult_pivot['Cuff10'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff11" id="cuff11" placeholder="" value="<?php echo $testResult_pivot['Cuff11'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff12" id="cuff12" placeholder="" value="<?php echo $testResult_pivot['Cuff12'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff13" id="cuff13" placeholder="" value="<?php echo $testResult_pivot['Cuff13'];?>"></td>
                                  <td>
                                    <select class="form-control" id="result_length3" name="cuff_p_f">
                                      <option class="form-control" name="cuff_p_f" value="N/A"> N/A</option>
                                      <option class="form-control" name="cuff_p_f" value="PASS"> P</option>
                                      <option class="form-control" name="cuff_p_f" value="FAIL"> F</option>
                                    </select>
                                    <script>
                                        $('.result_length3').ready(function(){
                                          var result_length3 = '<?php echo  $testResult_pivot['CuffTest'];?>';
                                          console.log('result_length3 : '+result_length3);
                                          $("#result_length3 > [value='" + result_length3 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">手掌厚度(mm):</th>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm1" id="palm1" placeholder="" value="<?php echo $testResult_pivot['Palm1'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm2" id="palm2" placeholder="" value="<?php echo $testResult_pivot['Palm2'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm3" id="palm3" placeholder="" value="<?php echo $testResult_pivot['Palm3'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm4" id="palm4" placeholder="" value="<?php echo $testResult_pivot['Palm4'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm5" id="palm5" placeholder="" value="<?php echo $testResult_pivot['Palm5'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm6" id="palm6" placeholder="" value="<?php echo $testResult_pivot['Palm6'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm7" id="palm7" placeholder="" value="<?php echo $testResult_pivot['Palm7'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm8" id="palm8" placeholder="" value="<?php echo $testResult_pivot['Palm8'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm9" id="palm9" placeholder="" value="<?php echo $testResult_pivot['Palm9'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm10" id="palm10" placeholder="" value="<?php echo $testResult_pivot['Palm10'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm11" id="palm11" placeholder="" value="<?php echo $testResult_pivot['Palm11'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm12" id="palm12" placeholder="" value="<?php echo $testResult_pivot['Palm12'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm13" id="palm13" placeholder="" value="<?php echo $testResult_pivot['Palm13'];?>"></td>
                                  <td>
                                    <select class="form-control" id="result_length4" name="palm_p_f">
                                      <option class="form-control" name="palm_p_f" value="N/A"> N/A</option>
                                      <option class="form-control" name="palm_p_f" value="PASS"> P</option>
                                      <option class="form-control" name="palm_p_f" value="FAIL"> F</option>
                                  </select>
                                  <script>
                                      $('.result_length4').ready(function(){
                                        var result_length4 = '<?php echo  $testResult_pivot['PalmTest'];?>';
                                        console.log('result_length4 : '+result_length4);
                                        $("#result_length4 > [value='" + result_length4 + "']").attr("selected", "true");
                                      })

                                  </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">指尖粗细(mm):</th>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip1" id="fingertip1" placeholder="" value="<?php echo $testResult_pivot['Fingertip1'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip2" id="fingertip2" placeholder="" value="<?php echo $testResult_pivot['Fingertip2'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip3" id="fingertip3" placeholder="" value="<?php echo $testResult_pivot['Fingertip3'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip4" id="fingertip4" placeholder="" value="<?php echo $testResult_pivot['Fingertip4'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip5" id="fingertip5" placeholder="" value="<?php echo $testResult_pivot['Fingertip5'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip6" id="fingertip6" placeholder="" value="<?php echo $testResult_pivot['Fingertip6'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip7" id="fingertip7" placeholder="" value="<?php echo $testResult_pivot['Fingertip7'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip8" id="fingertip8" placeholder="" value="<?php echo $testResult_pivot['Fingertip8'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip9" id="fingertip9" placeholder="" value="<?php echo $testResult_pivot['Fingertip9'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip10" id="fingertip10" placeholder="" value="<?php echo $testResult_pivot['Fingertip10'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip11" id="fingertip11" placeholder="" value="<?php echo $testResult_pivot['Fingertip11'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip12" id="fingertip12" placeholder="" value="<?php echo $testResult_pivot['Fingertip12'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip13" id="fingertip13" placeholder="" value="<?php echo $testResult_pivot['Fingertip13'];?>"></td>
                                  <td>
                                    <select class="form-control" id="result_length5" name="fingertip_p_f">
                                      <option class="form-control" name="fingertip_p_f" value="N/A"> N/A</option>
                                      <option class="form-control" name="fingertip_p_f" value="PASS"> P</option>
                                      <option class="form-control" name="fingertip_p_f" value="FAIL"> F</option>
                                  </select>
                                  <script>
                                      $('.result_length5').ready(function(){
                                        var result_length5 = '<?php echo  $testResult_pivot['FingertipTest'];?>';
                                        console.log('result_length5 : '+result_length5);
                                        $("#result_length5 > [value='" + result_length5 + "']").attr("selected", "true");
                                      })

                                  </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">*珠径厚度:</th>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter1" id="bead_diameter1" placeholder="" value="<?php echo $testResult_pivot['DiaBeading1'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter2" id="bead_diameter2" placeholder="" value="<?php echo $testResult_pivot['DiaBeading2'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter3" id="bead_diameter3" placeholder="" value="<?php echo $testResult_pivot['DiaBeading3'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter4" id="bead_diameter4" placeholder="" value="<?php echo $testResult_pivot['DiaBeading4'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter5" id="bead_diameter5" placeholder="" value="<?php echo $testResult_pivot['DiaBeading5'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter6" id="bead_diameter6" placeholder="" value="<?php echo $testResult_pivot['DiaBeading6'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter7" id="bead_diameter7" placeholder="" value="<?php echo $testResult_pivot['DiaBeading7'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter8" id="bead_diameter8" placeholder="" value="<?php echo $testResult_pivot['DiaBeading8'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter9" id="bead_diameter9" placeholder="" value="<?php echo $testResult_pivot['DiaBeading9'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter10" id="bead_diameter10" placeholder="" value="<?php echo $testResult_pivot['DiaBeading10'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter11" id="bead_diameter11" placeholder="" value="<?php echo $testResult_pivot['DiaBeading11'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter12" id="bead_diameter12" placeholder="" value="<?php echo $testResult_pivot['DiaBeading12'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter13" id="bead_diameter13" placeholder="" value="<?php echo $testResult_pivot['DiaBeading13'];?>"></td>
                                  <td>
                                    <select class="form-control" id="result_length6" name="bead_diameter_p_f">
                                      <option class="form-control" name="bead_diameter_p_f" value="N/A"> N/A</option>
                                      <option class="form-control" name="bead_diameter_p_f" value="PASS"> P</option>
                                      <option class="form-control" name="bead_diameter_p_f" value="FAIL"> F</option>
                                    </select>
                                    <script>
                                        $('.result_length6').ready(function(){
                                          var result_length6 = '<?php echo  $testResult_pivot['DiaBeadingTest'];?>';
                                          console.log('result_length6 : '+result_length6);
                                          $("#result_length6 > [value='" + result_length6 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">*袖口厚度:</th>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge1" id="cuff_edge1" placeholder="" value="<?php echo $testResult_pivot['Wrist1'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge2" id="cuff_edge2" placeholder="" value="<?php echo $testResult_pivot['Wrist2'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge3" id="cuff_edge3" placeholder="" value="<?php echo $testResult_pivot['Wrist3'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge4" id="cuff_edge4" placeholder="" value="<?php echo $testResult_pivot['Wrist4'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge5" id="cuff_edge5" placeholder="" value="<?php echo $testResult_pivot['Wrist5'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge6" id="cuff_edge6" placeholder="" value="<?php echo $testResult_pivot['Wrist6'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge7" id="cuff_edge7" placeholder="" value="<?php echo $testResult_pivot['Wrist7'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge8" id="cuff_edge8" placeholder="" value="<?php echo $testResult_pivot['Wrist8'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge9" id="cuff_edge9" placeholder="" value="<?php echo $testResult_pivot['Wrist9'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge10" id="cuff_edge10" placeholder="" value="<?php echo $testResult_pivot['Wrist10'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge11" id="cuff_edge11" placeholder="" value="<?php echo $testResult_pivot['Wrist11'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge12" id="cuff_edge12" placeholder="" value="<?php echo $testResult_pivot['Wrist12'];?>"></td>
                                  <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge13" id="cuff_edge13" placeholder="" value="<?php echo $testResult_pivot['Wrist13'];?>"></td>
                                  <td>
                                    <select class="form-control" id="result_length7" name="cuff_edge_p_f">
                                      <option class="form-control" name="cuff_edge_p_f" value="N/A"> N/A</option>
                                      <option class="form-control" name="cuff_edge_p_f" value="PASS"> P</option>
                                      <option class="form-control" name="cuff_edge_p_f" value="FAIL"> F</option>
                                    </select>
                                    <script>
                                        $('.result_length7').ready(function(){
                                          var result_length7 = '<?php echo  $testResult_pivot['WristTest'];?>';
                                          console.log('result_length7 : '+result_length7);
                                          $("#result_length7 > [value='" + result_length7 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">*手套重量:</th>
                                  <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight1" id="g_weight1" placeholder="" value="<?php echo $testResult_pivot['Weight1'];?>"></td>
                                  <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight2" id="g_weight2" placeholder="" value="<?php echo $testResult_pivot['Weight2'];?>"></td>
                                  <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight3" id="g_weight3" placeholder="" value="<?php echo $testResult_pivot['Weight3'];?>"></td>
                                  <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight4" id="g_weight4" placeholder="" value="<?php echo $testResult_pivot['Weight4'];?>"></td>
                                  <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight5" id="g_weight5" placeholder="" value="<?php echo $testResult_pivot['Weight5'];?>"></td>
                                  <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight6" id="g_weight6" placeholder="" value="<?php echo $testResult_pivot['Weight6'];?>"></td>
                                  <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight7" id="g_weight7" placeholder="" value="<?php echo $testResult_pivot['Weight7'];?>"></td>
                                  <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight8" id="g_weight8" placeholder="" value="<?php echo $testResult_pivot['Weight8'];?>"></td>
                                  <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight9" id="g_weight9" placeholder="" value="<?php echo $testResult_pivot['Weight9'];?>"></td>
                                  <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight10" id="g_weight10" placeholder="" value="<?php echo $testResult_pivot['Weight10'];?>"></td>
                                  <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight11" id="g_weight11" placeholder="" value="<?php echo $testResult_pivot['Weight11'];?>"></td>
                                  <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight12" id="g_weight12" placeholder="" value="<?php echo $testResult_pivot['Weight12'];?>"></td>
                                  <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight13" id="g_weight13" placeholder="" value="<?php echo $testResult_pivot['Weight13'];?>"></td>
                                  <td>
                                    <select class="form-control" id="result_length8" name="g_weight_p_f">
                                      <option class="form-control" name="g_weight_p_f" value="N/A"> N/A</option>
                                      <option class="form-control" name="g_weight_p_f" value="PASS"> P</option>
                                      <option class="form-control" name="g_weight_p_f" value="FAIL"> F</option>
                                    </select>
                                    <script>
                                        $('.result_length8').ready(function(){
                                          var result_length8 = '<?php echo  $testResult_pivot['WeightTest'];?>';
                                          console.log('result_length8 : '+result_length8);
                                          $("#result_length8 > [value='" + result_length8 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                </tr>

                              </table>

                              <td>* 根据客户要求</td>

                            </div>
                            <!-- /.col-lg-12 -->

                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                      </div>
                      <!-- /.panel -->

                      <!-----------------------------------------------------INSPECTION RECORD----------------------------------------------------->
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                        检验记录
                        </div>

                        <div class="panel-body">
                          <div class="row">

                            <div class="col-lg-12">

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                <tr>
                                  <th scope="col" class="info">样本大小 APT/WTT（级别 1）:</th>
                                  <td><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="sample_size_apt" id="sample_size_apt" value="<?php echo $T_Record_SampleSize[1]['SampleSizeValue']; ?>" ></td>

                                  <th scope="col" class="info">样品尺寸 VT:</th>
                                  <td><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="sample_size_vt" id="sample_size" value="<?php echo $T_Record_SampleSize[0]['SampleSizeValue']; ?>" ></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">样本大小 APT/WTT（级别 2）:</th>
                                  <td><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="sample_size_apt2" id="sample_size_apt2" placeholder="0" value="<?php echo $T_Record_SampleSize[2]['SampleSizeValue']; ?>"></td>

                                  <th scope="col" class="info">机器 ID:</th>
                                  <td><input class="form-control" name="machine_id" placeholder="MACHINE ID" value="<?php echo $T_Record_Instrument[3]['InstrumentValue']; ?>"></td>
                                </tr>

                              </table>

                              <div class="modal fade" id="remark" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                              <br><br><br><br>

                                <div class="modal-title">
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>

                                <li style="float: left;"><a class="btn btn-default" href="pdf/GL PQC S07 Inspection Plan 1.1 Published.pdf" target="iframe_i">展示</a></li>
                                <iframe height="560px" width="93%" name="iframe_i" href="pdf/QEIM-PQC- Physical Properties TGNAS.pdf" target="iframe_i"></iframe>
                              </div>
                              <!-- /.modal -->

                              <td>
                                <b>**检查计划和级别 </b>
                                <a class = "btn btn-default" data-toggle="modal" data-target="#remark" href="pdf/GL PQC S07 Inspection Plan 1.1 Published.pdf" target="iframe_i">?</a>
                                <br>
                              </td>
                              <td><b>*Glove Inspection</b></td>

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                <tr class="info"><br>
                                  <th></th>
                                  <th>MINOR VISUAL</th>
                                  <th>MAJOR VISUAL</th>
                                  <th>CRITICAL NAG</th>
                                  <th>CRITICAL NFG</th>
                                  <th>HOLES LEVEL 1</th>
                                  <th>HOLES LEVEL 2</th>
                                  <th>GOOD GLOVES</th>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">**AQL:</th>
                                  <td>
                                    <select class="form-control" id="AQL_minor" name="AQL_minor">
                                      <option class="form-control" name="AQL_minor" value="N/A"> N/A</option>
                                      <option class="form-control" name="AQL_minor" value="0.065"> 0.065</option>
                                      <option class="form-control" name="AQL_minor" value="0.10"> 0.10</option>
                                      <option class="form-control" name="AQL_minor" value="0.15"> 0.15</option>
                                      <option class="form-control" name="AQL_minor" value="0.25"> 0.25</option>
                                      <option class="form-control" name="AQL_minor" value="0.40"> 0.40</option>
                                      <option class="form-control" name="AQL_minor" value="0.65"> 0.65</option>
                                      <option class="form-control" name="AQL_minor" value="1.0"> 1.0</option>
                                      <option class="form-control" name="AQL_minor" value="1.5"> 1.5</option>
                                      <option class="form-control" name="AQL_minor" value="2.5"> 2.5</option>
                                      <option class="form-control" name="AQL_minor" value="4.0"> 4.0</option>
                                      <option class="form-control" name="AQL_minor" value="6.5"> 6.5</option>
                                    </select>
                                    <script>
                                        $('.AQL_minor').ready(function(){
                                          var AQL_minor = '<?php echo  $AQLResult_pivot['AQLMinor'];?>';
                                          console.log('AQL_minor : '+AQL_minor);
                                          $("#AQL_minor > [value='" + AQL_minor + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>

                                  <td>
                                    <select class="form-control" id="AQL_major" name="AQL_major">
                                      <option class="form-control" name="AQL_major" value="N/A"> N/A</option>
                                      <option class="form-control" name="AQL_major" value="0.065"> 0.065</option>
                                      <option class="form-control" name="AQL_major" value="0.10"> 0.10</option>
                                      <option class="form-control" name="AQL_major" value="0.15"> 0.15</option>
                                      <option class="form-control" name="AQL_major" value="0.25"> 0.25</option>
                                      <option class="form-control" name="AQL_major" value="0.40"> 0.40</option>
                                      <option class="form-control" name="AQL_major" value="0.65"> 0.65</option>
                                      <option class="form-control" name="AQL_major" value="1.0"> 1.0</option>
                                      <option class="form-control" name="AQL_major" value="1.5"> 1.5</option>
                                      <option class="form-control" name="AQL_major" value="2.5"> 2.5</option>
                                      <option class="form-control" name="AQL_major" value="4.0"> 4.0</option>
                                      <option class="form-control" name="AQL_major" value="6.5"> 6.5</option>
                                    </select>
                                    <script>
                                        $('.AQL_major').ready(function(){
                                          var AQL_major = '<?php echo  $AQLResult_pivot['AQLMajor'];?>';
                                          console.log('AQL_major : '+AQL_major);
                                          $("#AQL_major > [value='" + AQL_major + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>

                                  <td>
                                    <select class="form-control" id="AQL_criticalNAG" name="AQL_criticalNAG">
                                      <option class="form-control" name="AQL_criticalNAG" value="N/A"> N/A</option>
                                      <option class="form-control" name="AQL_criticalNAG" value="0.065"> 0.065</option>
                                      <option class="form-control" name="AQL_criticalNAG" value="0.10"> 0.10</option>
                                      <option class="form-control" name="AQL_criticalNAG" value="0.15"> 0.15</option>
                                      <option class="form-control" name="AQL_criticalNAG" value="0.25"> 0.25</option>
                                      <option class="form-control" name="AQL_criticalNAG" value="0.40"> 0.40</option>
                                      <option class="form-control" name="AQL_criticalNAG" value="0.65"> 0.65</option>
                                      <option class="form-control" name="AQL_criticalNAG" value="1.0"> 1.0</option>
                                      <option class="form-control" name="AQL_criticalNAG" value="1.5"> 1.5</option>
                                      <option class="form-control" name="AQL_criticalNAG" value="2.5"> 2.5</option>
                                      <option class="form-control" name="AQL_criticalNAG" value="4.0"> 4.0</option>
                                      <option class="form-control" name="AQL_criticalNAG" value="6.5"> 6.5</option>
                                    </select>
                                    <script>
                                        $('.AQL_criticalNAG').ready(function(){
                                          var AQL_criticalNAG = '<?php echo $AQLResult_pivot['AQLNAG_CP'];?>';
                                          console.log('AQL_criticalNAG : '+AQL_criticalNAG);
                                          $("#AQL_criticalNAG > [value='" + AQL_criticalNAG + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>

                                  <td>
                                    <select class="form-control" id="AQL_criticalNFG" name="AQL_criticalNFG">
                                      <option class="form-control" name="AQL_criticalNFG" value="N/A"> N/A</option>
                                      <option class="form-control" name="AQL_criticalNFG" value="0.065"> 0.065</option>
                                      <option class="form-control" name="AQL_criticalNFG" value="0.10"> 0.10</option>
                                      <option class="form-control" name="AQL_criticalNFG" value="0.15"> 0.15</option>
                                      <option class="form-control" name="AQL_criticalNFG" value="0.25"> 0.25</option>
                                      <option class="form-control" name="AQL_criticalNFG" value="0.40"> 0.40</option>
                                      <option class="form-control" name="AQL_criticalNFG" value="0.65"> 0.65</option>
                                      <option class="form-control" name="AQL_criticalNFG" value="1.0"> 1.0</option>
                                      <option class="form-control" name="AQL_criticalNFG" value="1.5"> 1.5</option>
                                      <option class="form-control" name="AQL_criticalNFG" value="2.5"> 2.5</option>
                                      <option class="form-control" name="AQL_criticalNFG" value="4.0"> 4.0</option>
                                      <option class="form-control" name="AQL_criticalNFG" value="6.5"> 6.5</option>
                                    </select>
                                    <script>
                                        $('.AQL_criticalNFG').ready(function(){
                                          var AQL_criticalNFG = '<?php echo  $AQLResult_pivot['AQLNFG'];?>';
                                          console.log('AQL_criticalNFG : '+AQL_criticalNFG);
                                          $("#AQL_criticalNFG > [value='" + AQL_criticalNFG + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>

                                  <td>
                                    <select class="form-control" id="AQL_holes1" name="AQL_holes1">
                                      <option class="form-control" name="AQL_holes1" value="N/A"> N/A</option>
                                      <option class="form-control" name="AQL_holes1" value="0.065"> 0.065</option>
                                      <option class="form-control" name="AQL_holes1" value="0.10"> 0.10</option>
                                      <option class="form-control" name="AQL_holes1" value="0.15"> 0.15</option>
                                      <option class="form-control" name="AQL_holes1" value="0.25"> 0.25</option>
                                      <option class="form-control" name="AQL_holes1" value="0.40"> 0.40</option>
                                      <option class="form-control" name="AQL_holes1" value="0.65"> 0.65</option>
                                      <option class="form-control" name="AQL_holes1" value="1.0"> 1.0</option>
                                      <option class="form-control" name="AQL_holes1" value="1.5"> 1.5</option>
                                      <option class="form-control" name="AQL_holes1" value="2.5"> 2.5</option>
                                      <option class="form-control" name="AQL_holes1" value="4.0"> 4.0</option>
                                      <option class="form-control" name="AQL_holes1" value="6.5"> 6.5</option>
                                    </select>
                                    <script>
                                        $('.AQL_holes1').ready(function(){
                                          var AQL_holes1 = '<?php echo $AQLResult_pivot['AQLHoles1'];?>';
                                          console.log('AQL_holes1 : '+AQL_holes1);
                                          $("#AQL_holes1 > [value='" + AQL_holes1 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>

                                  <td>
                                    <select class="form-control" id="AQL_holes2" name="AQL_holes2">
                                      <option class="form-control" name="AQL_holes2" value="N/A"> N/A</option>
                                      <option class="form-control" name="AQL_holes2" value="0.065"> 0.065</option>
                                      <option class="form-control" name="AQL_holes2" value="0.10"> 0.10</option>
                                      <option class="form-control" name="AQL_holes2" value="0.15"> 0.15</option>
                                      <option class="form-control" name="AQL_holes2" value="0.25"> 0.25</option>
                                      <option class="form-control" name="AQL_holes2" value="0.40"> 0.40</option>
                                      <option class="form-control" name="AQL_holes2" value="0.65"> 0.65</option>
                                      <option class="form-control" name="AQL_holes2" value="1.0"> 1.0</option>
                                      <option class="form-control" name="AQL_holes2" value="1.5"> 1.5</option>
                                      <option class="form-control" name="AQL_holes2" value="2.5"> 2.5</option>
                                      <option class="form-control" name="AQL_holes2" value="4.0"> 4.0</option>
                                      <option class="form-control" name="AQL_holes2" value="6.5"> 6.5</option>
                                    </select>
                                    <script>
                                        $('.AQL_holes2').ready(function(){
                                          var AQL_holes2 = '<?php echo $AQLResult_pivot['AQLHoles2'];?>';
                                          console.log('AQL_holes2 : '+AQL_holes2);
                                          $("#AQL_holes2 > [value='" + AQL_holes2 + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>

                                  <td>
                                    <select class="form-control" id="AQL_goodgloves" name="AQL_goodgloves">
                                      <option class="form-control" name="AQL_goodgloves" value="N/A"> N/A</option>
                                      <option class="form-control" name="AQL_goodgloves" value="0.065"> 0.065</option>
                                      <option class="form-control" name="AQL_goodgloves" value="0.10"> 0.10</option>
                                      <option class="form-control" name="AQL_goodgloves" value="0.15"> 0.15</option>
                                      <option class="form-control" name="AQL_goodgloves" value="0.25"> 0.25</option>
                                      <option class="form-control" name="AQL_goodgloves" value="0.40"> 0.40</option>
                                      <option class="form-control" name="AQL_goodgloves" value="0.65"> 0.65</option>
                                      <option class="form-control" name="AQL_goodgloves" value="1.0"> 1.0</option>
                                      <option class="form-control" name="AQL_goodgloves" value="1.5"> 1.5</option>
                                      <option class="form-control" name="AQL_goodgloves" value="2.5"> 2.5</option>
                                      <option class="form-control" name="AQL_goodgloves" value="4.0"> 4.0</option>
                                      <option class="form-control" name="AQL_goodgloves" value="6.5"> 6.5</option>
                                    </select>
                                  </td>
                                  <script>
                                      $('.AQL_goodgloves').ready(function(){
                                        var AQL_goodgloves = '<?php echo $AQLResult_pivot['AQLGG'];?>';
                                        console.log('AQL_goodgloves : '+AQL_goodgloves);
                                        $("#AQL_goodgloves > [value='" + AQL_goodgloves + "']").attr("selected", "true");
                                      })

                                  </script>

                                </tr>

                                <tr style="text-align: center;">
                                  <th scope="col" class="info">Acceptance:</th>
                                  <td><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="Acceptance_minor" value="<?php echo $AQLResult_pivot['AcceptanceMinor']; ?>" ></td>
                                  <td><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="Acceptance_major" value="<?php echo $AQLResult_pivot['AcceptanceMajor']; ?>" ></td>
                                  <td><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="Acceptance_nag" value="<?php echo $AQLResult_pivot['AcceptanceNAG_CP']; ?>" ></td>
                                  <td><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="Acceptance_nfg" value="<?php echo $AQLResult_pivot['AcceptanceNFG']; ?>" ></td>
                                  <td><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="Acceptance_holes1" value="<?php echo $AQLResult_pivot['AcceptanceHoles1']; ?>" ></td>
                                  <td><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="Acceptance_holes2" placeholder="0"value="<?php echo $AQLResult_pivot['AcceptanceHoles2']; ?>" ></td>
                                  <td><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="Acceptance_goodgloves" placeholder="0"></td>
                                </tr>

                                <tr style="text-align: center;">
                                  <th scope="col" class="info"></th>
                                  <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#minorModal">MINOR VISUAL</button></td>
                                  <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#majorModal">MAJOR VISUAL</button></td>
                                  <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#criticalNAG">CRITICAL NAG</button></td>
                                  <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#criticalNFG">CRITICAL NFG</button></td>
                                  <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#holes1Modal">HOLES 1</button></td>
                                  <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#holes2Modal">HOLES 2</button></td>
                                  <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#goodglovesModal">GOOD GLOVES</button></td>
                                </tr>

                                <!-- CALCULATE TOTAL DEFECT VALUE HERE -->
                                <tr id="countit">
                                  <th scope="col" class="info">Total Defect</th>
                                  <td><input class="input form-control form-control-lg" name="total_minor" readonly id="total_minor" value="0" ></td>
                                  <td><input class="input form-control form-control-lg" name="total_major" readonly id="total_major" value="0" ></td>
                                  <td><input class="input form-control form-control-lg" name="total_nag" readonly id="total_nag" value="0" ></td>
                                  <td><input class="input form-control form-control-lg" name="total_nfg" readonly id="total_nfg" value="0"</td>
                                  <td><input class="input form-control form-control-lg amount9" name="total_holes1" readonly id="total_holes1" value="0"</td>
                                  <td><input class="input form-control form-control-lg amount9" name="total_holes2" readonly id="total_holes2" value="0"</td>
                                  <td><input class="input form-control form-control-lg" name="total_goodglove" readonly id="total_goodglove" value="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">Grand Total Defect</th>
                                  <td colspan="7">
                                    <input class="input form-control form-control-lg" name="total_defect" readonly id="total_defect" placeholder="">
                                  </td>
                                </tr>

                              </table>

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                <tr>
                                  <th scope="col" class="info">Total Barrier:</th>
                                  <td><input class="form-control" name="total_holes" id="total_barrier" placeholder="0" readonly></td>
                                  <th scope="col" class="info">Overall AQL:</th>
                                  <td>
                                    <select class="form-control" id="overall_AQL" name="overall_AQL">
                                      <option class="form-control" name="overall_AQL" value="N/A"> N/A</option>
                                      <option class="form-control" name="overall_AQL" value="0.065"> 0.065</option>
                                      <option class="form-control" name="overall_AQL" value="0.10"> 0.10</option>
                                      <option class="form-control" name="overall_AQL" value="0.15"> 0.15</option>
                                      <option class="form-control" name="overall_AQL" value="0.25"> 0.25</option>
                                      <option class="form-control" name="overall_AQL" value="0.40"> 0.40</option>
                                      <option class="form-control" name="overall_AQL" value="0.65"> 0.65</option>
                                      <option class="form-control" name="overall_AQL" value="1.0"> 1.0</option>
                                      <option class="form-control" name="overall_AQL" value="1.5"> 1.5</option>
                                      <option class="form-control" name="overall_AQL" value="2.5"> 2.5</option>
                                      <option class="form-control" name="overall_AQL" value="4.0"> 4.0</option>
                                      <option class="form-control" name="overall_AQL" value="6.5"> 6.5</option>
                                    </select>
                                    <script>
                                        $('.overall_AQL').ready(function(){
                                          var overall_AQL = '<?php echo $AQLResult_pivot['AQLOverall'];?>';
                                          console.log('overall_AQL : '+overall_AQL);
                                          $("#overall_AQL > [value='" + overall_AQL + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>
                                  <?php
                                  function UD_selection($connect, $matching)
                                  {
                                    $output = '';
                                    $query = "SELECT * FROM M_UDResult";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    $result = $statement->fetchAll();
                                    foreach($result as $row)
                                    {

                                        if($row['UDResultCode'] == $matching ){
                                          $output .= '<option value="'.$row['UDResultCode'].'" selected>'.$row['UDResultCode'].'</option>';
                                        }else{
                                          $output .= '<option value="'.$row['UDResultCode'].'" >'.$row['UDResultCode'].'</option>';
                                        }
                                    }
                                    return $output;
                                  }
                                  ?>

                                  <th scope="col" id="" class="info">UD Disposition:</th>
                                  <td>
                                    <select class="form-control" name="UDResultCode" >
                                      <?php echo UD_selection($connect,$T_Record_UDResult[0]['UDResultCode']); ?>
                                    </select>

                                  </td>
                                </tr>

                              </table>

                              <td><b>*Product Packaging Inspection (Surgical)</b></td>

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                <tr class="info">
                                  <br>
                                  <th></th>
                                  <th>REGULATORY PACKAGING</th>
                                  <th>CRITICAL PACKAGING</th>
                                  <th>VISUAL PACKAGING</th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">**AQL:</th>
                                  <td>
                                    <select class="form-control" id="AQL_regulatorypackaging" name="AQL_regulatorypackaging">
                                      <option class="form-control" name="AQL_regulatorypackaging" value="N/A"> N/A</option>
                                      <option class="form-control" name="AQL_regulatorypackaging" value="0.065"> 0.065</option>
                                      <option class="form-control" name="AQL_regulatorypackaging" value="0.10"> 0.10</option>
                                      <option class="form-control" name="AQL_regulatorypackaging" value="0.15"> 0.15</option>
                                      <option class="form-control" name="AQL_regulatorypackaging" value="0.25"> 0.25</option>
                                      <option class="form-control" name="AQL_regulatorypackaging" value="0.40"> 0.40</option>
                                      <option class="form-control" name="AQL_regulatorypackaging" value="0.65"> 0.65</option>
                                      <option class="form-control" name="AQL_regulatorypackaging" value="1.0"> 1.0</option>
                                      <option class="form-control" name="AQL_regulatorypackaging" value="1.5"> 1.5</option>
                                      <option class="form-control" name="AQL_regulatorypackaging" value="2.5"> 2.5</option>
                                      <option class="form-control" name="AQL_regulatorypackaging" value="4.0"> 4.0</option>
                                      <option class="form-control" name="AQL_regulatorypackaging" value="6.5"> 6.5</option>
                                    </select>
                                    <script>
                                        $('.AQL_regulatorypackaging').ready(function(){
                                          var AQL_regulatorypackaging = '<?php echo $AQLResult_pivot['AQLRegulatoryPackaging'];?>';
                                          console.log('AQL_regulatorypackaging : '+AQL_regulatorypackaging);
                                          $("#AQL_regulatorypackaging > [value='" + AQL_regulatorypackaging + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>

                                  <td>
                                    <select class="form-control" id="AQL_criticalpackaging" name="AQL_criticalpackaging">
                                      <option class="form-control" name="AQL_majorpackaging" value="N/A"> N/A</option>
                                      <option class="form-control" name="AQL_majorpackaging" value="0.065"> 0.065</option>
                                      <option class="form-control" name="AQL_majorpackaging" value="0.10"> 0.10</option>
                                      <option class="form-control" name="AQL_majorpackaging" value="0.15"> 0.15</option>
                                      <option class="form-control" name="AQL_majorpackaging" value="0.25"> 0.25</option>
                                      <option class="form-control" name="AQL_majorpackaging" value="0.40"> 0.40</option>
                                      <option class="form-control" name="AQL_majorpackaging" value="0.65"> 0.65</option>
                                      <option class="form-control" name="AQL_majorpackaging" value="1.0"> 1.0</option>
                                      <option class="form-control" name="AQL_majorpackaging" value="1.5"> 1.5</option>
                                      <option class="form-control" name="AQL_majorpackaging" value="2.5"> 2.5</option>
                                      <option class="form-control" name="AQL_majorpackaging" value="4.0"> 4.0</option>
                                      <option class="form-control" name="AQL_majorpackaging" value="6.5"> 6.5</option>
                                    </select>
                                    <script>
                                        $('.AQL_criticalpackaging').ready(function(){
                                          var AQL_criticalpackaging = '<?php echo $AQLResult_pivot['AQLCriticalPackaging'];?>';
                                          console.log('AQL_criticalpackaging : '+AQL_criticalpackaging);
                                          $("#AQL_criticalpackaging > [value='" + AQL_criticalpackaging + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>

                                  <td>
                                    <select class="form-control" id="AQL_visualpackaging" name="AQL_visualpackaging">
                                      <option class="form-control" name="AQL_criticalpackaging" value="N/A"> N/A</option>
                                      <option class="form-control" name="AQL_criticalpackaging" value="0.065"> 0.065</option>
                                      <option class="form-control" name="AQL_criticalpackaging" value="0.10"> 0.10</option>
                                      <option class="form-control" name="AQL_criticalpackaging" value="0.15"> 0.15</option>
                                      <option class="form-control" name="AQL_criticalpackaging" value="0.25"> 0.25</option>
                                      <option class="form-control" name="AQL_criticalpackaging" value="0.40"> 0.40</option>
                                      <option class="form-control" name="AQL_criticalpackaging" value="0.65"> 0.65</option>
                                      <option class="form-control" name="AQL_criticalpackaging" value="1.0"> 1.0</option>
                                      <option class="form-control" name="AQL_criticalpackaging" value="1.5"> 1.5</option>
                                      <option class="form-control" name="AQL_criticalpackaging" value="2.5"> 2.5</option>
                                      <option class="form-control" name="AQL_criticalpackaging" value="4.0"> 4.0</option>
                                      <option class="form-control" name="AQL_criticalpackaging" value="6.5"> 6.5</option>
                                    </select>
                                    <script>
                                        $('.AQL_visualpackaging').ready(function(){
                                          var AQL_visualpackaging = '<?php echo $AQLResult_pivot['AQLVisualPackaging'];?>';
                                          console.log('AQL_visualpackaging : '+AQL_visualpackaging);
                                          $("#AQL_visualpackaging > [value='" + AQL_visualpackaging + "']").attr("selected", "true");
                                        })

                                    </script>
                                  </td>

                                  <td>
                                    <select class="form-control" disabled>
                                    </select>
                                  </td>

                                  <td>
                                    <select class="form-control" disabled>
                                    </select>
                                  </td>

                                  <td>
                                    <select class="form-control" disabled>
                                    </select>
                                  </td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">验收:</th>
                                  <td><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="Acceptance_regulatorypackaging" placeholder="0" value="<?php echo $AQLResult_pivot['AcceptanceRegulatoryPackaging'];?>"></td>
                                  <td><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="Acceptance_criticalpackaging" placeholder="0" value="<?php echo $AQLResult_pivot['AcceptanceCriticalPackaging'];?>"></td>
                                  <td><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="Acceptance_visualpackaging" placeholder="0" value="<?php echo $AQLResult_pivot['AcceptanceVisualPackaging'];?>"></td>
                                  <td><input class="form-control digit" disabled></td>
                                  <td><input class="form-control digit" disabled></td>
                                  <td><input class="form-control digit" disabled></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info"></th>
                                  <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#regulatoryPackagingModal">REGULATORY PACKAGING</a></center></td>
                                  <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#criticalPackagingModal">CRITICAL PACKAGING</a></center></td>
                                  <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#visualPackagingModal">VISUAL PACKAGING</a></center></td>
                                  <td><input class="form-control" disabled></td>
                                  <td><input class="form-control" disabled></td>
                                  <td><input class="form-control" disabled></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">Result</th>
                                  <td>
                                    <select class="form-control" id="Result_Regulatory" name="Result_Regulatory">
                                      <option class="form-control" name="Result_Regulatory" value="N/A"> N/A</option>
                                      <option class="form-control" name="Result_Regulatory" value="PASS"> PASS</option>
                                      <option class="form-control" name="Result_Regulatory" value="FAIL"> FAIL</option>
                                    </select>
                                  </td>
                                  <td>
                                    <select class="form-control" id="Result_Critical" name="Result_Critical">
                                      <option class="form-control" name="Result_Critical" value="N/A"> N/A</option>
                                      <option class="form-control" name="Result_Critical" value="PASS"> PASS</option>
                                      <option class="form-control" name="Result_Critical" value="FAIL"> FAIL</option>
                                    </select>
                                  </td>
                                  <td>
                                    <select class="form-control" id="Result_Visual" name="Result_Visual">
                                      <option class="form-control" name="Result_Visual" value="N/A"> N/A</option>
                                      <option class="form-control" name="Result_Visual" value="PASS"> PASS</option>
                                      <option class="form-control" name="Result_Visual" value="FAIL"> FAIL</option>
                                    </select>
                                  </td>

                                  <td><input class="form-control" disabled></td>
                                  <td><input class="form-control" disabled></td>
                                  <td><input class="form-control" disabled></td>
                                </tr>

                              </table>

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                <tr>
                                  <th scope="col" class="info">最终处置:</th>
                                  <td>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="final_disposition" id="FDRadios1" value="PASS" checked>PASS
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" name="final_disposition" id="FDRadios2" value="FAIL">FAIL
                                    </label>
                                    <script>
                                        $('.final_disposition').ready(function(){
                                          var final_disposition = '<?php echo $AQLResult_pivot['FinalDisposition'];?>';
                                          console.log('final_disposition : '+final_disposition);
                                          if(final_disposition== 'PASS'){
                                            $('#FDRadios1').prop("checked", true);
                                          }else{
                                            $('#FDRadios2').prop("checked", true);
                                          }
                                        })

                                    </script>
                                  </td>
                                </tr>

                              </table>

                            </div>
                            <!-- /.col-lg-12 -->

                            <div class="col-lg-6">

                              <div class="form-group">
                                <label>经核实:</label>
                                <input class="form-control" type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" name="verify_by" placeholder="Enter Badge ID" disabled><br>
                              </div>
                              <!-- /.form-group -->

                            </div>
                            <!-- /.col-lg-6 -->

                            <div class="col-lg-6">

                              <div class="form-group">
                                <label>日期：</label>
                                <input class="form-control" type="datetime-local" name="date_verify" max="<?php echo date('Y-m-d\TH:i:s'); ?>" value="<?php echo date('Y-m-d\TH:i:s');?>" onkeydown="return false" disabled><br>
                              </div>
                              <!-- /.form-group -->

                            </div>
                            <!-- /.col-lg-6 -->

                            <center>
                              <button type="submit" name="submit" id="savebtn" form="InspectionForm" class="btn btn-primary" style="margin-bottom: 20px;">SAVE</button>
                            </center>

                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                      </div>
                      <!-- /.panel -->

                      <!-- Minor Modal -->
                      <div class="modal fade" id="minorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <center><h2 class="modal-title" id="exampleModalLabel">Minor Visual</h2></center>
                            </div>

                            <div class="modal-body">

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                <tr>
                                  <th scope="col" class="info">DB:</th>
                                  <td><input class="form-control input-sm text-right amount digit" name="DB" placeholder="0" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" ></td>

                                  <th scope="col" class="info">SD:</th>
                                  <td><input class="form-control input-sm text-right amount digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SD" placeholder="0"></td>

                                  <th scope="col" class="info">SP:</th>
                                  <td><input class="form-control input-sm text-right amount digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SP" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">STNs:</th>
                                  <td><input class="form-control input-sm text-right amount digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="STNs" placeholder="0"></td>

                                  <th scope="col" class="info">SLDs:</th>
                                  <td><input class="form-control input-sm text-right amount digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SLDs" placeholder="0"></td>

                                  <th scope="col" class="info">Ls:</th>
                                  <td><input class="form-control input-sm text-right amount digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="Ls" placeholder="0"></td>
                                </tr>
                                <tr>
                                  <th scope="col" class="info">TSs:</th>
                                  <td><input class="form-control input-sm text-right amount digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TSs" placeholder="0"></td>

                                  <th scope="col" class="info"></th>
                                  <td><input class="form-control input-sm text-right amount digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SLDs" placeholder="0" disabled></td>

                                  <th scope="col" class="info"></th>
                                  <td><input class="form-control input-sm text-right amount digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="Ls" placeholder="0" disabled></td>
                                </tr>
                              </table>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.modal -->

                      <!-- Major Modal -->
                      <div class="modal fade" id="majorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <center><h2 class="modal-title" id="exampleModalLabel">Major Visual</h2></center>
                            </div>

                            <div class="modal-body">

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                <tr>
                                  <th scope="col" class="info">CA:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CA" placeholder="0"></td>

                                  <th scope="col" class="info">CL:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CL" placeholder="0"></td>

                                  <th scope="col" class="info">CLD:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CLD" placeholder="0"></td>

                                  <th scope="col" class="info">CS:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CS" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">DF:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DF" placeholder="0"></td>

                                  <th scope="col" class="info">DT:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DT" placeholder="0"></td>

                                  <th scope="col" class="info">EFI:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="EFI" placeholder="0"></td>

                                  <th scope="col" class="info">FM:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FM" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">FNO:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FNO" placeholder="0"></td>

                                  <th scope="col" class="info">FO:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FO" placeholder="0"></td>

                                  <th scope="col" class="info">GNO:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="GNO" placeholder="0"></td>

                                  <th scope="col" class="info">IB:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="IB" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">ICT:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="ICT" placeholder="0"></td>

                                  <th scope="col" class="info">L:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="L_Major" placeholder="0"></td>

                                  <th scope="col" class="info">LS:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="LS" placeholder="0"></td>

                                  <th scope="col" class="info">PMI:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="PMI" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">PMO:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="PMO" placeholder="0"></td>

                                  <th scope="col" class="info">PLM:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="PLM" placeholder="0"></td>

                                  <th scope="col" class="info">RM:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="RM" placeholder="0"></td>

                                  <th scope="col" class="info">RC:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="RC" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">SAG:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SAG" placeholder="0"></td>

                                  <th scope="col" class="info">SG:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SG" placeholder="0"></td>

                                  <th scope="col" class="info">SHN:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SHN" placeholder="0"></td>

                                  <th scope="col" class="info">SI:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SI" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">SKV:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SKV" placeholder="0"></td>

                                  <th scope="col" class="info">SLD:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SLD" placeholder="0"></td>

                                  <th scope="col" class="info">SO:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SO" placeholder="0"></td>

                                  <th scope="col" class="info">STK:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="STK" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">STN:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="STN" placeholder="0"></td>

                                  <th scope="col" class="info">TA:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TA" placeholder="0"></td>

                                  <th scope="col" class="info">TS:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TS" placeholder="0"></td>

                                  <th scope="col" class="info">UNF:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="UNF" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">WL:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="WL" placeholder="0"></td>

                                  <th scope="col" class="info">WSI:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="WSI" placeholder="0"></td>

                                  <th scope="col" class="info">WSO:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="WSO" placeholder="0"></td>

                                  <th scope="col" class="info">GF:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="GF" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">FKI:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FKI" placeholder="0"></td>

                                  <th scope="col" class="info">FKO:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FKO" placeholder="0"></td>

                                </tr>

                              </table>

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                <tr>
                                  <th scope="col" class="info">BP:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="BP" placeholder="0"></td>

                                  <th scope="col" class="info">DP:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DP" placeholder="0"></td>

                                  <th scope="col" class="info">DSP:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DSP" placeholder="0"></td>

                                  <th scope="col" class="info">DTP:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DTP" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">IA:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="IA" placeholder="0"></td>

                                  <th scope="col" class="info">IFS:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="IFS" placeholder="0"></td>

                                  <th scope="col" class="info">IP:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="IP_MAJOR" placeholder="0"></td>

                                  <th scope="col" class="info">OP:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="OP" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">RP:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="RP" placeholder="0"></td>

                                  <th scope="col" class="info">SH:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SH" placeholder="0"></td>

                                  <th scope="col" class="info">SMP:</th>
                                  <td><input class="form-control input-sm text-right amount2 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SMP" placeholder="0"></td>
                                </tr>

                              </table>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.modal -->

                      <!-- Critical NAG Modal -->
                      <div class="modal fade" id="criticalNAG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <center><h2 class="modal-title" id="exampleModalLabel">Critical NAG</h2></center>
                            </div>

                            <div class="modal-body">

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                <tr>
                                  <th scope="col" class="info">BPC:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="BPC" placeholder="0"></td>

                                  <th scope="col" class="info">CR:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CR" placeholder="0"></td>

                                  <th scope="col" class="info">DC:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DC" placeholder="0"></td>
                                </tr>

                                <tr>
                                    <th scope="col" class="info">DD:</th>
                                    <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DD" placeholder="0"></td>

                                    <th scope="col" class="info">DIS:</th>
                                    <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="DIS" placeholder="0"></td>

                                    <th scope="col" class="info">FMT:</th>
                                    <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FMT" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">L:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="L" placeholder="0"></td>

                                  <th scope="col" class="info">GL:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="GL" placeholder="0"></td>

                                  <th scope="col" class="info">MP:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="MP" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">NB:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="NB" placeholder="0"></td>

                                  <th scope="col" class="info">NF:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="NF" placeholder="0"></td>

                                  <th scope="col" class="info">TW:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TW" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">WE:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="WE" placeholder="0"></td>

                                  <th scope="col" class="info">WG:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="WG" placeholder="0"></td>

                                  <th scope="col" class="info">PGM:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="PGM" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">SDG:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SDG" placeholder="0"></td>

                                  <th scope="col" class="info">URD:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="URD" placeholder="0"></td>

                                  <th scope="col" class="info">MS:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="MS_critical" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">PFK:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="PFK" placeholder="0"></td>

                                  <th scope="col" class="info">MG:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="MG" placeholder="0"></td>

                                  <th scope="col" class="info">MD:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="MD" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">TP:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TP" placeholder="0"></td>

                                  <th scope="col" class="info">SVD:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SVD" placeholder="0"></td>

                                  </tr>

                              </table>

                              <table class="table table-bordered" id="dataTable">

                                <tr>
                                  <th scope="col" class="info">ICP:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="ICP" placeholder="0"></td>

                                  <th scope="col" class="info">NP:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="NP" placeholder="0"></td>

                                  <th scope="col" class="info">WP:</th>
                                  <td><input class="form-control input-sm text-right amount3 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="WP" placeholder="0"></td>
                                </tr>

                              </table>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.modal -->

                      <!-- Critical NFG Modal -->
                      <div class="modal fade" id="criticalNFG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <center><h2 class="modal-title" id="exampleModalLabel">Critical NFG</h2></center>
                            </div>

                            <div class="modal-body">

                              <table class="table table-bordered" id="dataTable">

                                <tr>
                                  <th scope="col" class="info">TH:</th>
                                  <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TH" placeholder="0"></td>

                                  <th scope="col" class="info">TR:</th>
                                  <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TR" placeholder="0"></td>

                                  <th scope="col" class="info">TAH:</th>
                                  <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TAH" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">MF:</th>
                                  <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="MF" placeholder="0"></td>

                                  <th scope="col" class="info">CH:</th>
                                  <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CH" placeholder="0"></td>

                                  <th scope="col" class="info">FK:</th>
                                  <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FK" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">GSH:</th>
                                  <td><input class="form-control input-sm text-right amount4 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="GSH" placeholder="0"></td>
                                </tr>

                              </table>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.modal -->

                      <!-- Holes 1 Modal -->
                      <div class="modal fade" id="holes1Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <center><h2 class="modal-title" id="exampleModalLabel">Holes 1</h2></center>
                            </div>

                            <div class="modal-body">

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                <tr>
                                  <th scope="col" class="info">BF:</th>
                                  <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="BF" placeholder="0"></td>

                                  <th scope="col" class="info">P:</th>
                                  <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="P" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">CF:</th>
                                  <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CF" placeholder="0"></td>

                                  <th scope="col" class="info">SF:</th>
                                  <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SF" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">TAHs:</th>
                                  <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TAHs" placeholder="0"></td>

                                  <th scope="col" class="info">FKS:</th>
                                  <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FKS" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">THs:</th>
                                  <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="THs" placeholder="0"></td>

                                  <th scope="col" class="info">FT:</th>
                                  <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FT" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">TRS:</th>
                                  <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TRS" placeholder="0"></td>

                                  <th scope="col" class="info">GB:</th>
                                  <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="GB" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">CHs:</th>
                                  <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CHs" placeholder="0"></td>

                                  <th scope="col" class="info">L:</th>
                                  <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="L_HOLES1" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">LH:</th>
                                  <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="LH" placeholder="0"></td>

                                  <th scope="col" class="info">MH:</th>
                                  <td><input class="form-control input-sm text-right amount5 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="MH" placeholder="0"></td>
                                </tr>

                              </table>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.modal -->

                      <!-- Holes 2 Modal -->
                      <div class="modal fade" id="holes2Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <center><h2 class="modal-title" id="exampleModalLabel">Holes 2</h2></center>
                            </div>

                            <div class="modal-body">

                              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                                <tr>
                                  <th scope="col" class="info">BF:</th>
                                  <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="BF_2" placeholder="0"></td>

                                  <th scope="col" class="info">P:</th>
                                  <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="P_2" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">CF:</th>
                                  <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CF_2" placeholder="0"></td>

                                  <th scope="col" class="info">SF:</th>
                                  <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="SF_2" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">TAHs:</th>
                                  <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TAHs_2" placeholder="0"></td>

                                  <th scope="col" class="info">FKS:</th>
                                  <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FKS_2" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">THs:</th>
                                  <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="THs_2" placeholder="0"></td>

                                  <th scope="col" class="info">FT:</th>
                                  <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="FT_2" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">TRS:</th>
                                  <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="TRS_2" placeholder="0"></td>

                                  <th scope="col" class="info">GB:</th>
                                  <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="GB_2" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">CHs:</th>

                                  <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="CHs_2" placeholder="0"></td>
                                  <th scope="col" class="info">L:</th>
                                  <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="L_HOLES2" placeholder="0"></td>
                                </tr>

                                <tr>
                                  <th scope="col" class="info">LH:</th>
                                  <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="LH_2" placeholder="0"></td>

                                  <th scope="col" class="info">MH:</th>
                                  <td><input class="form-control input-sm text-right amount6 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="MH_2" placeholder="0"></td>
                                </tr>

                              </table>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.modal -->

                      <!-- Regulatory Packaging Modal -->
                      <div class="modal fade" id="regulatoryPackagingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <center><h2 class="modal-title" id="exampleModalLabel">Regulatory Packaging</h2></center>
                            </div>

                            <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                              <tr>
                                <th scope="col" class="info">WLN:</th>
                                <td><input class="form-control" name="WLN" placeholder="0"></td>

                                <th scope="col" class="info">WMD:</th>
                                <td><input class="form-control" name="WMD" placeholder="0"></td>

                                <th scope="col" class="info">WED:</th>
                                <td><input class="form-control" name="WED" placeholder="0"></td>
                              </tr>

                              <tr>
                                <th scope="col" class="info">WPC:</th>
                                <td><input class="form-control" name="WPC" placeholder="0"></td>

                                <th scope="col" class="info">MM:</th>
                                <td><input class="form-control" name="MM" placeholder="0"></td>

                                <th scope="col" class="info">IP:</th>
                                <td><input class="form-control" name="IP" placeholder="0"></td>
                              </tr>

                            </table>

                          </div>
                        </div>
                      </div>
                      <!-- /.modal -->

                      <!-- cRITICAL Packaging Modal -->
                      <div class="modal fade" id="criticalPackagingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <center><h2 class="modal-title" id="exampleModalLabel">Critial Packaging</h2></center>
                            </div>

                            <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                              <tr>
                                <th scope="col" class="info">WQ:</th>
                                <td><input class="form-control" name="WQ" placeholder="0"></td>

                                <th scope="col" class="info">MS:</th>
                                <td><input class="form-control" name="MS" placeholder="0"></td>

                                <th scope="col" class="info">MB:</th>
                                <td><input class="form-control" name="MB" placeholder="0"></td>

                                <th scope="col" class="info">MLN:</th>
                                <td><input class="form-control" name="MLN" placeholder="0"></td>
                              </tr>

                              <tr>
                                <th scope="col" class="info">WGS:</th>
                                <td><input class="form-control" name="WGS" placeholder="0"></td>

                                <th scope="col" class="info">WGT:</th>
                                <td><input class="form-control" name="WGT" placeholder="0"></td>

                                <th scope="col" class="info">WGA:</th>
                                <td><input class="form-control" name="WGA" placeholder="0"></td>

                                <th scope="col" class="info">OS:</th>
                                <td><input class="form-control" name="OS" placeholder="0"></td>
                              </tr>

                              <tr>
                                <th scope="col" class="info">WTS:</th>
                                <td><input class="form-control" name="WTS" placeholder="0"></td>

                                <th scope="col" class="info">PTS:</th>
                                <td><input class="form-control" name="PTS" placeholder="0"></td>

                                <th scope="col" class="info">WPO:</th>
                                <td><input class="form-control" name="WPO" placeholder="0"></td>

                                <th scope="col" class="info">DMG:</th>
                                <td><input class="form-control" name="DMG" placeholder="0"></td>
                              </tr>

                              <tr>
                                <th scope="col" class="info">MSG:</th>
                                <td><input class="form-control" name="MSG" placeholder="0"></td>

                                <th scope="col" class="info">FC:</th>
                                <td><input class="form-control" name="FC" placeholder="0"></td>

                                <th scope="col" class="info">POS:</th>
                                <td><input class="form-control" name="POS" placeholder="0"></td>

                                <th scope="col" class="info">BC:</th>
                                <td><input class="form-control" name="BC" placeholder="0"></td>
                              </tr>

                              <tr>
                                <th scope="col" class="info">WPD:</th>
                                <td><input class="form-control" name="WPD" placeholder="0"></td>

                                <th scope="col" class="info">MSI:</th>
                                <td><input class="form-control" name="MSI" placeholder="0"></td>

                                <th scope="col" class="info">TRP:</th>
                                <td><input class="form-control" name="TRP" placeholder="0"></td>
                                <th scope="col" class="info">NCN:</th>
                                <td><input class="form-control" name="NCN" placeholder="0"></td>
                              </tr>
                              <tr>
                                <th scope="col" class="info">CNS:</th>
                                <td><input class="form-control" name="CNS" placeholder="0"></td>

                                <th scope="col" class="info"></th>
                                <td><input class="form-control" name="" placeholder="0" disabled></td>
                                <th scope="col" class="info"></th>
                                <td><input class="form-control" name="" placeholder="0" disabled></td>
                                <th scope="col" class="info"></th>
                                <td><input class="form-control" name="" placeholder="0" disabled></td>

                              </tr>

                            </table>

                          </div>
                        </div>
                      </div>
                      <!-- /.modal -->

                      <!-- VISUAL Packaging Modal -->
                      <div class="modal fade" id="visualPackagingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <center><h2 class="modal-title" id="exampleModalLabel">Visual Packaging</h2></center>
                            </div>

                            <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                              <tr>
                                <th scope="col" class="info">WT:</th>
                                <td><input class="form-control decimal" name="WT" placeholder="0"></td>

                                <th scope="col" class="info">CT:</th>
                                <td><input class="form-control decimal" name="CT" placeholder="0"></td>

                                <th scope="col" class="info">POP:</th>
                                <td><input class="form-control decimal" name="POP" placeholder="0"></td>

                                <th scope="col" class="info">FG:</th>
                                <td><input class="form-control decimal" name="FG" placeholder="0"></td>
                              </tr>

                              <tr>
                                <th scope="col" class="info">PIS:</th>
                                <td><input class="form-control decimal" name="PIS" placeholder="0"></td>

                                <th scope="col" class="info">MSA:</th>
                                <td><input class="form-control decimal" name="MSA" placeholder="0"></td>

                                <th scope="col" class="info">WIS:</th>
                                <td><input class="form-control decimal" name="WIS" placeholder="0"></td>

                                <th scope="col" class="info">DT:</th>
                                <td><input class="form-control decimal" name="DT_PACKING" placeholder="0"></td>
                              </tr>



                            </table>

                          </div>
                        </div>
                      </div>
                      <!-- /.modal -->

                      <!-- GOOD  GLOVES Modal -->
                      <div class="modal fade" id="goodglovesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                              <center><h2 class="modal-title" id="exampleModalLabel">Good Gloves</h2></center>
                            </div>

                            <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                              <tr>
                                <th scope="col" class="info">GG:</th>
                                <td><input class="form-control input-sm text-right amount7 digit" onkeyup="this.value = minmax(this.value, 0, 1000)" Maxlength="5" name="GG" placeholder="0"></td>

                              </tr>



                            </table>

                          </div>
                        </div>
                      </div>
                      <!-- /.modal -->

                      <!-- Modal: Display when total defect more than sample size, resets all fields-->
                      <div class="modal fade" id="errorModal" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">错误</h4>
                            </div>
                            <div class="modal-body">
                              <div class="alert alert-danger">
                                <strong> 总缺陷值大于样本量。. </strong>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.modal -->



                      </form>
                      <!-- /.col-lg-12 (nested) -->
                  </div>
                  <!-- /.row (nested) -->
              </div>
              <!-- /#page-wrapper -->
          </div>
            <!-- /.wrapper -->
      </div>






    <!-- Modal: Display when total defect more than sample size, resets all fields-->
    <div class="modal fade" id="errorModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">错误</h4>
                </div>
                <div class="modal-body">
                <div class="alert alert-danger">
                    <strong> 总缺陷值大于样本量。. </strong>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

      <?php include 'transaction-FG-Reinspect.php'?>



                                  <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto" style = "text-align:center; margin-right:10px;">
              <label>Copyright © 2020 by QA PQC SQUAD V2.3 </label>
            </div>
          </div>
        </footer>





      <!-- jQuery -->


      <!-- Bootstrap Core JavaScript -->
      <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
      <!-- Metis Menu Plugin JavaScript -->
      <script src="../../vendor/metisMenu/metisMenu.min.js"></script>
      <!-- Custom Theme JavaScript -->
      <script src="../../dist/js/sb-admin-2.js"></script>


  </body>
  <script>
  var decimal2 = function(e,places) {
    var t = e.value;
    e.value = (t.indexOf(".") >= 0) ? (t.substr(0, t.indexOf(".")) + t.substr(t.indexOf("."), places)) : t;
  }

  $('.decimal').keypress(function(evt){
      return (/^[0-9]*\.?[0-9]*$/).test($(this).val()+evt.key);
  });
  </script>

    <script>
    $(document).ready(function(){
      $("#SONumber").keyup(function(){

        var SONumber = $(this).val().trim();
        if(SONumber != ''){

          $("#checkk").show();



              if(SONumber.match(/\d/g).length === 10){
                $("#checkk").html("<span style='color:green;'>Good</span>");
                //$("#BatchNumber").val("");
              }else{
                $("#checkk").html("<span style='color:red;'>Must be 10 digit</span>");
              }

        }else{
          $("#checkk").hide();
        }
      });
      });

    </script>

  <SCRIPT language=Javascript>

        function isNumberKey(evt)
        {
           var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;

           return true;
      }

   </SCRIPT>

<script type="text/javascript">

function stopRKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
}

document.onkeypress = stopRKey;

</script>
<script src="function_edit.js"></script>



</html>

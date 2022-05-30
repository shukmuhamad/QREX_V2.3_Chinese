<html>
<?php
include('../includes/database_connection.php');
include('../includes/session.php');
include('../includes/header.php');
$formtype = 'bypallet';

    $date = date("Y-m-d\TH:i:s");

    $sql = "SELECT * FROM DimPlant WITH (NOLOCK);";
    $sql .= "SELECT * FROM M_Brand  WITH (NOLOCK) ORDER BY BrandName ASC;";
    $sql .= "SELECT * FROM M_Customer WITH (NOLOCK) ORDER BY CustomerName ASC;";
    $sql .= "SELECT * FROM M_InspectionPlan WITH (NOLOCK) WHERE InspectionPlanKey IN (1,2,4);";
    $sql .= "SELECT * FROM M_GloveColour WITH (NOLOCK) ORDER BY GloveColourName ASC;";
    $sql .= "SELECT * FROM M_GloveProductType WITH (NOLOCK) ORDER BY GloveProductTypeName ASC;";
    $sql .= "SELECT * FROM M_GloveCode WITH (NOLOCK) ORDER BY GloveCodeLong ASC;";
    $sql .= "SELECT * FROM M_GloveSize WITH (NOLOCK);";

    $stmt = $connect->prepare($sql);
    $stmt->execute();

    $Dimplant = $stmt->fetchAll();
    $stmt -> nextRowset();
    $M_Brand = $stmt->fetchAll();
    $stmt -> nextRowset();
    $M_Customer = $stmt->fetchAll();
    $stmt -> nextRowset();
    $M_InspectionPlan = $stmt->fetchAll();
    $stmt -> nextRowset();
    $M_GloveColour = $stmt->fetchAll();
    $stmt -> nextRowset();
    $M_GloveProductType = $stmt->fetchAll();
    $stmt -> nextRowset();
    $M_GloveCode = $stmt->fetchAll();
    $stmt -> nextRowset();
    $M_GloveSize = $stmt->fetchAll();

 ?>


 <body>
   <div id="wrapper">
     <?php include('../navbar/navbar.php');?>

     <div id="page-wrapper">
       <div class="row">
         <div class="col-lg-12">
           <h1 class="page-header">FG Form by Pallet</h1>
         </div>
         <!-- /.col-lg-12 -->
       </div>
       <!-- /.row -->
<!----------------------------------------------------PRODUCT INFORMATION---------------------------------------------------->
<div class="panel panel-primary">
  <div class="panel-heading">
  产品信息
  </div>

  <div class="panel-body">
    <div class="row">

      <form role="form" method ="post" id="InspectionForm">

        <div class="col-lg-6">
          <input type="hidden" class="form-control digit" name="LotIDPreset" id="LotIDPreset" value="" >
          <input type="hidden" class="form-control digit" name="RecordIDPreset" id="RecordIDPreset" value="" >

          <div class="form-group">

            <label>工厂</label>
            <select class="form-control fstdropdown-select" id="PlantName" name="PlantName" required></td>
            <option class="form-control" name="PlantName" value=""> 工厂</option>
            <?php foreach ($Dimplant as $row) { ?>
            <option name="PlantName" value="<?php echo $row['PlantName'];?>"><?php echo $row['PlantName']; }?></option>
            </select>
          </div>
          <!-- /.form-group -->

          <div class="form-group">

            <label>Lot 伯爵</label>
            <input type="number" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null" class="form-control" placeholder="Lot Count" id="LotCount" name="LotCount" required>

          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>检验日期:</label>
            <input class="form-control" type="datetime-local" name="RecordCreatedDateTime" onkeydown="return false" value="<?php echo $date; ?>">
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>批号:</label>
            <input class="form-control" name="BatchNumber" id="BatchNumber" maxlength="40" placeholder="Enter Batch Number" required>
            <div id="checkk"></div>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>托盘ID:</label>
            <input class="form-control" name="PalletID" id="PalletID" placeholder="Enter Pallet ID" required>

          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>检查阶段:</label></br>
            <div class="radio">
              <label>
              <input type="radio" name="inspection_stage" value="1" id="FGCondradio1" onclick="EnableDisableTextBox()">成品好
              </label>
            </div>
            <div class="radio">
              <label>
              <input type="radio" name="inspection_stage" value="0"  id="FGCondradio2" onclick="EnableDisableTextBox()" >成品整体不错（组合尺码）
              </label>
            </div>
          </div>

          <!-- /.form-group -->

          <div class="form-group">

            <label>类别:</label>
            <select class="form-control fstdropdown-select" id="InspectionPlanName" name="InspectionPlanName" required></td>
                    <option class="form-control" name="InspectionPlanName" value=""> 类别</option>
                    <?php foreach ($M_InspectionPlan as $row) {
                      if($row['ActiveStatus'] == 0){

                      }else{?>
                    <option name="InspectionPlanName" value="<?php echo $row['InspectionPlanName'];?>"><?php echo $row['InspectionPlanName'];?></option>
                  <?php }} ?>
            </select>
          </div>
          <!-- /.form-group -->

          <div class="form-group">

            <label>尺寸</label>
            <select name="GloveSizeCodeLong" class="form-control fstdropdown-select">
            <option value="">尺寸</option>
                <?php foreach ($M_GloveSize as $row) { ?>
            <option name="GloveSizeCodeLong" value="<?php echo $row['GloveSizeCodeLong'];?>"><?php echo $row['GloveSizeCodeLong']; }?></option>
            </select>

          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>托盘编号:</label>
            <input class="form-control" type="number" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null;" placeholder="Enter Pallet Number" name="PalletNumber" id="PalletNumber"  >
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>检验计数:</label>
            <input class="form-control" type="number" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null;" name="InspectionCount" id="InspectionCount" placeholder="Enter Inspection Count" onkeyup="checkcount()"  required>
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
            <input type="number" min="0" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;"class="form-control" name="CartonQuantity" placeholder="Enter Carton Quantity" required>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>纸箱号:</label>
            <input class="form-control" name="CartonNum" placeholder="Enter Carton Number" required>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>地位:</label>

            <label class="checkbox-inline">
              <input type="radio" name="RecordStatusFlag" id="optionsRadios1" value="1" checked>&nbsp;N/A
            </label>
            <label class="checkbox-inline">
              <input type="radio" name="RecordStatusFlag" id="optionsRadios2" value="2">&nbsp;检
            </label>
            <label class="checkbox-inline">
              <input type="radio" name="RecordStatusFlag" id="optionsRadios3" value="3">&nbsp;转换检验
            </label>
            <label class="checkbox-inline">
              <input type="radio" name="RecordStatusFlag" id="optionsRadios4" value="4">&nbsp;重新包装检验
            </label>
          </div>
          <!-- /.form-group -->

        </div>
        <!-- /.col-lg-6 -->

        <div class="col-lg-6">

          <!-- /.form-group -->

          <div class="form-group">
            <label>项目编号:</label>

            <input type="number" class="form-control" placeholder="Enter Item Number" name="SOItemNumber" id="SOItemNumber" min="1"
            oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null" required>
          </div>

          <!-- /.form-group -->

          <div class="form-group">
            <label>顾客:</label>
            <select class="form-control fstdropdown-select" id="CustomerName" name="CustomerName" required>
                <option class="form-control" name="" value=""> 顾客</option>
                <?php foreach ($M_Customer as $row) { ?>
                <option name="CustomerName" value="<?php echo $row['CustomerName'];?>"><?php echo $row['CustomerName']; }?></option>
            </select>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>牌:</label>
            <select class="form-control fstdropdown-select" id="BrandName" name="BrandName" required>
                <option class="form-control" name="" value="">牌 </option>
                <?php foreach ($M_Brand as $row) { ?>
                <option name="BrandName" value="<?php echo $row['BrandName'];?>"><?php echo $row['BrandName']; }?></option>
            </select>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>SO 数字:</label>
            <input type="number" class="form-control" name="SONumber" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength="10" id="SONumber" placeholder="Enter SO Number" required>
            <div id="checkkSO"></div>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>Lot 数字:</label>
            <input type="input" class="form-control" placeholder="Lot Number" id="LotNumber" name="LotNumber" required>

          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>产品:</label>
            <select class="form-control fstdropdown-select" id="GloveProductTypeName" name="GloveProductTypeName" required>
                <option class="form-control" name="GloveProductTypeName" value="">Product</option>
                <?php foreach ($M_GloveProductType as $row) { ?>
                <option name="GloveProductTypeName" value="<?php echo $row['GloveProductTypeName'];?>"><?php echo $row['GloveProductTypeName']; }?></option>
            </select>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>产品代码:</label>
            <select class="form-control fstdropdown-select" id="GloveCodeLong" name="GloveCodeLong" required>
                <option class="form-control " name="GloveCodeLong" value="">产品代码</option>
            <?php foreach ($M_GloveCode as $row) { ?>
                <option name="GloveCodeLong" value="<?php echo $row['GloveCodeLong'];?>"><?php echo $row['GloveCodeLong']; }?></option>
            </select>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>颜色:</label>
            <select class="form-control fstdropdown-select" id="GloveColourCode" name="GloveColourCode" required>
                <option class="form-control" name="GloveColourCode" value=""> 颜色</option>
                <?php foreach ($M_GloveColour as $row) { ?>
                <option name="GloveColourCode" value="<?php echo $row['GloveColourCode'];?>"><?php echo $row['GloveColourName']; }?></option>
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
                <select class="form-control fstdropdown-select" name="ProductionLineName1" required>
                  <?php
                    $query = $connect->prepare("SELECT ProductionLineName FROM DimProductionLine");
                    $query->execute();
                    $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                  ?>

                  <option class="form-control" value=""> 生产线</option>
                  <?php foreach ($fetch as $row){ ?>
                  <option value="<?php echo $row['ProductionLineName'];?>"><?php echo $row['ProductionLineName'];}?></option>
                </select>
              </td>

              <td>
                <input type="date" class="form-control" name="product_date1" max="<?php echo date('Y-m-d'); ?>" id="product_date1" onkeydown="return false" required style="padding: 0 0 0 8px;">
              </td>

              <td>
                <select class="form-control" id="shift1" name="shift1" required>
                  <option name="shift1" value=""> N/A</option>
                  <option name="shift1" value="1"> 转移 1</option>
                  <option name="shift1" value="2"> 转移 2</option>
                  <option name="shift1" value="3"> 转移 3</option>
                </select>
              </td>
            </tr>

            <tr>
              <td>
                <select class="form-control fstdropdown-select" name="ProductionLineName2">
                  <?php
                    $query = $connect->prepare("SELECT ProductionLineName FROM DimProductionLine");
                    $query->execute();
                    $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                  ?>

                  <option class="form-control" value=""> 生产线</option>
                  <?php foreach ($fetch as $row){ ?>
                  <option value="<?php echo $row['ProductionLineName'];?>"><?php echo $row['ProductionLineName'];}?></option>
                </select>
              </td>

              <td>
                <input type="date" class="form-control" name="product_date2" max="<?php echo date('Y-m-d'); ?>" id="product_date2" onkeydown="return false" style="padding: 0 0 0 8px;">
              </td>

              <td>
                <select class="form-control" id="shift2" name="shift2">
                  <option class="form-control" name="shift2" value=""> N/A</option>
                  <option class="form-control" name="shift2" value="1"> 转移 1 </option>
                  <option class="form-control" name="shift2" value="2"> 转移 2 </option>
                  <option class="form-control" name="shift2" value="3"> 转移 3 </option>
                </select>
              </td>
            </tr>

            <tr>
              <td>
                <select class="form-control fstdropdown-select" name="ProductionLineName3">
                  <?php
                    $query = $connect->prepare("SELECT ProductionLineName FROM DimProductionLine");
                    $query->execute();
                    $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                  ?>

                  <option class="form-control" value="" > 生产线</option>
                  <?php foreach ($fetch as $row){ ?>
                  <option value="<?php echo $row['ProductionLineName'];?>"><?php echo $row['ProductionLineName'];}?></option>
                </select>
              </td>

              <td>
                <input type="date" class="form-control" name="product_date3" max="<?php echo date('Y-m-d'); ?>" id="product_date3" onkeydown="return false" style="padding: 0 0 0 8px;">
              </td>

              <td>
                <select class="form-control" id="shift3" name="shift3" >
                  <option class="form-control" name="shift3" value=""> N/A</option>
                  <option class="form-control" name="shift3" value="1"> 转移 1</option>
                  <option class="form-control" name="shift3" value="2"> 转移 2</option>
                  <option class="form-control" name="shift3" value="3"> 转移 3 </option>
                </select>
              </td>
            </tr>

          </table>

          <div class="form-group">
            <label>包装日期:</label>
            <input class="form-control" type="date" name="PackingDate" id="PackingDate" onkeydown="return false" required style="padding: 0 0 0 8px;">
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>通过检查:</label>
            <?php
                $query = $connect->prepare("SELECT DISTINCT InspectionUserID FROM T_Record_Master");
                $query->execute();
                $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control" name="InspectionUserID" placeholder="Insert Badge ID" list="InspectionUserID" required>
            <datalist id="InspectionUserID">
              <?php
                foreach ($fetch as $row) {
              ?>
              <option name="InspectionUserID" value="<?php echo $row['InspectionUserID'];?>"><?php echo $row['InspectionUserID'];}?></option>
            </datalist>
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
          <input class="form-control" type="text" name="InstrumentValue" id="InstrumentValue"><br>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label>统治者 ID</label>
          <input class="form-control" type="text" name="InstrumentValue2" id="InstrumentValue"><br>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label>测厚仪 ID</label>
          <input class="form-control" type="text" name="InstrumentValue3" id="InstrumentValue"><br>
        </div>
        <!-- /.form-group -->

        <label>2. 手套重量, 数数, 包装缺陷</label>
        </br></br>

        <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

          <tr>
            <td width="20%" class="info">手套重量:</td>
            <td>
              <label class="checkbox-inline">
              <input type="radio" name="TestValue" id="optionsRadios1" value="N/A" checked>N/A
              </label>
              <label class="checkbox-inline">
              <input type="radio" name="TestValue" id="optionsRadios2" value="PASS">及格
              </label>
              <label class="checkbox-inline">
              <input type="radio" name="TestValue" id="optionsRadios3" value="FAIL">失败
              </label>
            </td>
            <td><input oninput="decimal2(this,3);" class="form-control decimal" name="SRText1" placeholder="Enter code"></td>
          </tr>

          <tr>
            <td width="20%" class="info">数数:</td>
            <td><label class="checkbox-inline">
              <input type="radio" name="TestValue2" id="optionsRadios1" value="N/A" checked>N/A
              </label>
              <label class="checkbox-inline">
              <input type="radio" name="TestValue2" id="optionsRadios2" value="PASS">及格
              </label>
              <label class="checkbox-inline">
              <input type="radio" name="TestValue2" id="optionsRadios3" value="FAIL">失败
              </label>
            </td>
            <td><input class="form-control" name="SRText2" placeholder="Enter code"></td>
          </tr>

          <!-- <tr>
            <td width="20%" class="info">PACKAGING DEFECT:</td>
            <td><label class="checkbox-inline">
              <input type="radio" name="TestValue3" id="optionsRadios1" value="N/A" checked>N/A
              </label>
              <label class="checkbox-inline">
              <input type="radio" name="TestValue3" id="optionsRadios2" value="PASS">PASS
              </label>
              <label class="checkbox-inline">
              <input type="radio" name="TestValue3" id="optionsRadios3" value="FAIL">FAIL
              </label>
            </td>
            <td><input class="form-control" name="SRTextPackaging" placeholder="Enter code" ></td>
          </tr> -->

        </table>

      </div>
      <!-- /.col-lg-6 -->

      <div class="col-lg-6">

        <label>3. 内部物理测试</label>

        <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

          <tr>
            <th scope="col" class="info">层次感:</th>
            <td>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue4" id="optionsRadios1" value="N/A" checked>N/A
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue4" id="optionsRadios1" value="PASS">及格
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue4" id="optionsRadios2" value="FAIL">失败
              </label>
            </td>
          </tr>

          <tr>
            <th class="info">臭:</th>
            <td>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue5" id="optionsRadios1" value="N/A" checked>N/A
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue5" id="optionsRadios1" value="PASS">及格
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue5" id="optionsRadios2" value="FAIL">失败
              </label>
            </td>
          </tr>

          <tr>
            <th scope="col" class="info">抓地力:</th>
            <td>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue6" id="optionsRadios1" value="N/A" checked>N/A
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue6" id="optionsRadios1" value="PASS">及格
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue6" id="optionsRadios2" value="FAIL">失败
              </label>
            </td>
          </tr>

          <tr>
            <th scope="col" class="info">黑布:</th>
            <td>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue8" id="optionsRadios1" value="N/A" checked>N/A
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue8" id="optionsRadios1" value="PASS" >及格
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue8" id="optionsRadios2" value="FAIL">失败
              </label>
            </td>
          </tr>

          <tr>
            <th class="info">粘着:</th>
            <td>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue9" id="optionsRadios1" value="N/A" checked>N/A
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue9" id="optionsRadios1" value="PASS">及格
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue9" id="optionsRadios2" value="FAIL">失败
              </label>
            </td>
          </tr>

          <tr>
            <th scope="col" class="info">点胶:</th>
            <td>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue10" id="optionsRadios1" value="N/A" checked>N/A
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue10" id="optionsRadios1" value="PASS">及格
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue10" id="optionsRadios2" value="FAIL">失败
              </label>
            </td>
          </tr>

          <tr>
            <th class="info">白布:</th>
            <td>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue11" id="optionsRadios1" value="N/A" checked>N/A
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue11" id="optionsRadios1" value="PASS" >及格
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue11" id="optionsRadios2" value="FAIL">失败
              </label>
            </td>
          </tr>

          <tr>
            <th class="info">染料泄漏:</th>
            <td>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue17" id="optionsRadios1" value="N/A" checked>N/A
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue17" id="optionsRadios1" value="PASS" >及格
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue17" id="optionsRadios2" value="FAIL">失败
              </label>
            </td>
          </tr>

          <tr>
            <th class="info">密封:</th>
            <td>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue18" id="optionsRadios1" value="N/A" checked>N/A
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue18" id="optionsRadios1" value="PASS" >及格
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue18" id="optionsRadios2" value="FAIL">失败
              </label>
            </td>
          </tr>

          <tr>
            <th class="info">爆破测试:</th>
            <td>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue19" id="optionsRadios1" value="N/A" checked>N/A
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue19" id="optionsRadios1" value="PASS" >及格
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue19" id="optionsRadios2" value="FAIL">失败
              </label>
            </td>
          </tr>

          <tr>
            <th class="info">视觉和剥离能力:</th>
            <td>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue20" id="optionsRadios1" value="N/A" checked>N/A
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue20" id="optionsRadios1" value="PASS" >及格
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue20" id="optionsRadios2" value="FAIL">失败
              </label>
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
                <input type="radio" name="TestValue7" id="optionsRadios1" value="N/A" checked>N/A
              </label>

              <br>
              <label class="checkbox-inline">
                <input type="radio" name="TestValue7" id="optionsRadios1" value="PASS">及格
              </label>
              <br>

              <label class="checkbox-inline">
                <input type="radio" name="TestValue7" id="optionsRadios2" value="FAIL">失败
              </label>
            </td>

            <td>
              <input class="form-control" name="SRText8" id="remark_donningtearing" placeholder="Enter text">
            </td>
          </tr>

        </table>

        <label>4. 特殊要求</label>
        <br><br>

        <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

          <tr class="info">
            <th>测试 No:</th>
            <th>测试名称:</th>
            <th>性格:</th>
          </tr>

          <tr>
            <th scope="col" class="info">测试 1:</th>
            <td>
              <select class="form-control" id="TestValue12" name="TestValue12">
                <option class="form-control" name="TestValue12" value="N/A">N/A</option>
                <option class="form-control" name="TestValue12" value="OMT"> OMT</option>
                <option class="form-control" name="TestValue12" value="Foaming "> Foaming </option>
                <option  class="form-control" name="TestValue12" value="Rubbing"> Rubbing</option>
                <option class="form-control" name="TestValue12" value="IPA/Alcohol "> IPA/Alcohol </option>
                <option class="form-control" name="TestValue12" value="Physical Properties"> Physical Properties</option>
                <option class="form-control" name="TestValue12" value="Protein"> Protein</option>
                <option class="form-control" name="TestValue12" value="Predictive Aging"> Predictive Aging</option>
                <option class="form-control" name="TestValue12" value="Powder Content/Residue"> Powder Content/Residue</option>
              </select>
            </td>
            <td>
              <select class="form-control" id="SRText3" name="SRText3">
                <option class="form-control" name="SRText3" value="N/A"> N/A </option>
                <option class="form-control" name="SRText3" value="PASS"> PASS</option>
                <option class="form-control" name="SRText3" value="FAIL "> FAIL </option>
              </select>
            </td>
          </tr>

          <tr>
            <th scope="col" class="info">测试 2:</th>
            <td>
              <select class="form-control" id="TestValue13" name="TestValue13" >
                <option class="form-control" name="TestValue13" value="N/A ">N/A</option>
                <option class="form-control" name="TestValue13" value="OMT"> OMT</option>
                <option class="form-control" name="TestValue13" value="Foaming "> Foaming </option>
                <option  class="form-control" name="TestValue13" value="Rubbing"> Rubbing</option>
                <option class="form-control" name="TestValue13" value="IPA/Alcohol "> IPA/Alcohol </option>
                <option class="form-control" name="TestValue13" value="Physical Properties "> Physical Properties </option>
                <option class="form-control" name="TestValue13" value="Protein"> Protein</option>
                <option class="form-control" name="TestValue13" value="Predictive Aging"> Predictive Aging</option>
                <option class="form-control" name="TestValue13" value="Powder Content/Residue"> Powder Content/Residue</option>
              </select>
            </td>

            <td>
              <select class="form-control" id="SRText4" name="SRText4">
                <option class="form-control" name="SRText4" value="N/A "> N/A </option>
                <option class="form-control" name="SRText4" value="PASS"> PASS</option>
                <option class="form-control" name="SRText4" value="FAIL "> FAIL </option>
              </select>
            </td>
          </tr>

          <tr>
            <th scope="col" class="info">测试 3:</th>
            <td>
              <select class="form-control" id="TestValue14" name="TestValue14" >
                <option class="form-control" name="TestValue14" value="N/A ">N/A</option>
                <option class="form-control" name="TestValue14" value="OMT"> OMT</option>
                <option class="form-control" name="TestValue14" value="Foaming "> Foaming </option>
                <option  class="form-control" name="TestValue14" value="Rubbing"> Rubbing</option>
                <option class="form-control" name="TestValue14" value="IPA/Alcohol "> IPA/Alcohol </option>
                <option class="form-control" name="TestValue14" value="Physical Properties "> Physical Properties </option>
                <option class="form-control" name="TestValue14" value="Protein"> Protein</option>
                <option class="form-control" name="TestValue14" value="Predictive Aging"> Predictive Aging</option>
                <option class="form-control" name="TestValue14" value="Powder Content/Residue"> Powder Content/Residue</option>
              </select>
            </td>
            <td>
              <select class="form-control" id="SRText5" name="SRText5">
                <option class="form-control" name="SRText5" value="N/A "> N/A </option>
                <option class="form-control" name="SRText5" value="PASS"> PASS</option>
                <option class="form-control" name="SRText5" value="FAIL "> FAIL </option>
              </select>
            </td>
          </tr>

          <tr>
            <th scope="col" class="info">测试 4:</th>
            <td>
              <select class="form-control" id="TestValue15" name="TestValue15" >
                <option class="form-control" name="TestValue15" value="N/A ">N/A</option>
                <option class="form-control" name="TestValue15" value="OMT"> OMT</option>
                <option class="form-control" name="TestValue15" value="Foaming "> Foaming </option>
                <option  class="form-control" name="TestValue15" value="Rubbing"> Rubbing</option>
                <option class="form-control" name="TestValue15" value="IPA/Alcohol "> IPA/Alcohol </option>
                <option class="form-control" name="TestValue15" value="Physical Properties "> Physical Properties </option>
                <option class="form-control" name="TestValue15" value="Protein"> Protein</option>
                <option class="form-control" name="TestValue15" value="Predictive Aging"> Predictive Aging</option>
                <option class="form-control" name="TestValue15" value="Powder Content/Residue"> Powder Content/Residue</option>
              </select>
            </td>
            <td>
              <select class="form-control" id="SRText6" name="SRText6">
                <option class="form-control" name="SRText6" value="N/A "> N/A </option>
                <option class="form-control" name="SRText6" value="PASS"> PASS</option>
                <option class="form-control" name="SRText6" value="FAIL "> FAIL </option>
              </select>
            </td>
          </tr>

          <tr>
            <th scope="col" class="info">测试 5:</th>
            <td>
              <select class="form-control" id="TestValue16" name="TestValue16" >
                <option class="form-control" name="TestValue16" value="N/A ">N/A</option>
                <option class="form-control" name="TestValue16" value="OMT"> OMT</option>
                <option class="form-control" name="TestValue16" value="Foaming "> Foaming </option>
                <option  class="form-control" name="TestValue16" value="Rubbing"> Rubbing</option>
                <option class="form-control" name="TestValue16" value="IPA/Alcohol "> IPA/Alcohol </option>
                <option class="form-control" name="TestValue16" value="Physical Properties "> Physical Properties </option>
                <option class="form-control" name="TestValue16" value="Protein"> Protein</option>
                <option class="form-control" name="TestValue16" value="Predictive Aging"> Predictive Aging</option>
                <option class="form-control" name="TestValue16" value="Powder Content/Residue"> Powder Content/Residue</option>
              </select>
            </td>
            <td>
              <select class="form-control" id="SRText7" name="SRText7">
                <option class="form-control" name="SRText7" value="N/A "> N/A </option>
                <option class="form-control" name="SRText7" value="PASS"> PASS</option>
                <option class="form-control" name="SRText7" value="FAIL "> FAIL </option>
              </select>
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
                <input type="radio" name="method" id="optionsRadios1" value="SINGLE WALL" checked>SINGLE WALL
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="method" id="optionsRadios1" value="DOUBLE WALL">DOUBLE WALL
              </label>
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
            <td><input class="form-control decimal" name="length1" id="length" placeholder="" ></td>
            <td><input class="form-control decimal" name="length2" id="length2" placeholder="" ></td>
            <td><input class="form-control decimal" name="length3" id="length3" placeholder="" ></td>
            <td><input class="form-control decimal" name="length4" id="length4" placeholder="" ></td>
            <td><input class="form-control decimal" name="length5" id="length5" placeholder="" ></td>
            <td><input class="form-control decimal" name="length6" id="length6" placeholder="" ></td>
            <td><input class="form-control decimal" name="length7" id="length7" placeholder="" ></td>
            <td><input class="form-control decimal" name="length8" id="length8" placeholder="" ></td>
            <td><input class="form-control decimal" name="length9" id="length9" placeholder="" ></td>
            <td><input class="form-control decimal" name="length10" id="length10" placeholder="" ></td>
            <td><input class="form-control decimal" name="length11" id="length11" placeholder="" ></td>
            <td><input class="form-control decimal" name="length12" id="length12" placeholder="" ></td>
            <td><input class="form-control decimal" name="length13" id="length13" placeholder="" ></td>
            <td>
              <select class="form-control" id="result_length" name="length_p_f">
                <option class="form-control" name="length_p_f" value="N/A"> N/A</option>
                <option class="form-control" name="length_p_f" value="PASS"> P</option>
                <option class="form-control" name="length_p_f" value="FAIL"> F</option>
              </select>
            </td>
          </tr>

          <tr>
            <th scope="col" class="info">宽度(mm):</th>
            <td><input class="form-control decimal" name="width1" id="width1" placeholder="" ></td>
            <td><input class="form-control decimal" name="width2" id="width2" placeholder="" ></td>
            <td><input class="form-control decimal" name="width3" id="width3" placeholder="" ></td>
            <td><input class="form-control decimal" name="width4" id="width4" placeholder="" ></td>
            <td><input class="form-control decimal" name="width5" id="width5" placeholder="" ></td>
            <td><input class="form-control decimal" name="width6" id="width6" placeholder="" ></td>
            <td><input class="form-control decimal" name="width7" id="width7" placeholder="" ></td>
            <td><input class="form-control decimal" name="width8" id="width8" placeholder="" ></td>
            <td><input class="form-control decimal" name="width9" id="width9" placeholder="" ></td>
            <td><input class="form-control decimal" name="width10" id="width10" placeholder="" ></td>
            <td><input class="form-control decimal" name="width11" id="width11" placeholder="" ></td>
            <td><input class="form-control decimal" name="width12" id="width12" placeholder="" ></td>
            <td><input class="form-control decimal" name="width13" id="width13" placeholder="" ></td>
            <td>
              <select class="form-control" id="result_length2" name="width_p_f">
                <option class="form-control" name="width_p_f" value="N/A"> N/A</option>
                <option class="form-control" name="width_p_f" value="PASS"> P</option>
                <option class="form-control" name="width_p_f" value="FAIL"> F</option>
              </select>
            </td>
          </tr>

          <tr>
            <th scope="col" class="info">袖口的厚度(mm):</th>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff1" id="cuff1" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff2" id="cuff2" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff3" id="cuff3" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff4" id="cuff4" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff5" id="cuff5" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff6" id="cuff6" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff7" id="cuff7" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff8" id="cuff8" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff9" id="cuff9" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff10" id="cuff10" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff11" id="cuff11" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff12" id="cuff12" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff13" id="cuff13" placeholder="" ></td>
            <td>
              <select class="form-control" id="result_length3" name="cuff_p_f">
                <option class="form-control" name="cuff_p_f" value="N/A"> N/A</option>
                <option class="form-control" name="cuff_p_f" value="PASS"> P</option>
                <option class="form-control" name="cuff_p_f" value="FAIL"> F</option>
              </select>
            </td>
          </tr>

          <tr>
            <th scope="col" class="info">手掌厚度(mm):</th>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm1" id="palm1" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm2" id="palm2" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm3" id="palm3" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm4" id="palm4" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm5" id="palm5" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm6" id="palm6" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm7" id="palm7" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm8" id="palm8" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm9" id="palm9" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm10" id="palm10" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm11" id="palm11" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm12" id="palm12" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="palm13" id="palm13" placeholder="" ></td>
            <td>
              <select class="form-control" id="result_length4" name="palm_p_f">
                <option class="form-control" name="palm_p_f" value="N/A"> N/A</option>
                <option class="form-control" name="palm_p_f" value="PASS"> P</option>
                <option class="form-control" name="palm_p_f" value="FAIL"> F</option>
            </select>
            </td>
          </tr>

          <tr>
            <th scope="col" class="info">指尖粗细(mm):</th>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip1" id="fingertip1" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip2" id="fingertip2" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip3" id="fingertip3" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip4" id="fingertip4" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip5" id="fingertip5" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip6" id="fingertip6" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip7" id="fingertip7" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip8" id="fingertip8" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip9" id="fingertip9" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip10" id="fingertip10" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip11" id="fingertip11" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip12" id="fingertip12" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="fingertip13" id="fingertip13" placeholder="" ></td>
            <td>
              <select class="form-control" id="result_length5" name="fingertip_p_f">
                <option class="form-control" name="fingertip_p_f" value="N/A"> N/A</option>
                <option class="form-control" name="fingertip_p_f" value="PASS"> P</option>
                <option class="form-control" name="fingertip_p_f" value="FAIL"> F</option>
            </select>
            </td>
          </tr>

          <tr>
            <th scope="col" class="info">*珠径厚度:</th>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter1" id="bead_diameter1" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter2" id="bead_diameter2" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter3" id="bead_diameter3" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter4" id="bead_diameter4" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter5" id="bead_diameter5" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter6" id="bead_diameter6" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter7" id="bead_diameter7" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter8" id="bead_diameter8" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter9" id="bead_diameter9" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter10" id="bead_diameter10" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter11" id="bead_diameter11" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter12" id="bead_diameter12" placeholder="" ></td>
            <td><input oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="bead_diameter13" id="bead_diameter13" placeholder="" ></td>
            <td>
              <select class="form-control" id="result_length6" name="bead_diameter_p_f">
                <option class="form-control" name="bead_diameter_p_f" value="N/A"> N/A</option>
                <option class="form-control" name="bead_diameter_p_f" value="PASS"> P</option>
                <option class="form-control" name="bead_diameter_p_f" value="FAIL"> F</option>
              </select>
            </td>
          </tr>

          <tr>
            <th scope="col" class="info">*袖口边缘的厚度:</th>
            <td><input  oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge1" id="cuff_edge1" placeholder="" ></td>
            <td><input  oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge2" id="cuff_edge2" placeholder="" ></td>
            <td><input  oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge3" id="cuff_edge3" placeholder="" ></td>
            <td><input  oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge4" id="cuff_edge4" placeholder="" ></td>
            <td><input  oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge5" id="cuff_edge5" placeholder="" ></td>
            <td><input  oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge6" id="cuff_edge6" placeholder="" ></td>
            <td><input  oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge7" id="cuff_edge7" placeholder="" ></td>
            <td><input  oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge8" id="cuff_edge8" placeholder="" ></td>
            <td><input  oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge9" id="cuff_edge9" placeholder="" ></td>
            <td><input  oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge10" id="cuff_edge10" placeholder="" ></td>
            <td><input  oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge11" id="cuff_edge11" placeholder="" ></td>
            <td><input  oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge12" id="cuff_edge12" placeholder="" ></td>
            <td><input  oninput="decimal2(this,4);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="cuff_edge13" id="cuff_edge13" placeholder="" ></td>
            <td>
              <select class="form-control" id="result_length7" name="cuff_edge_p_f">
                <option class="form-control" name="cuff_edge_p_f" value="N/A"> N/A</option>
                <option class="form-control" name="cuff_edge_p_f" value="PASS"> P</option>
                <option class="form-control" name="cuff_edge_p_f" value="FAIL"> F</option>
              </select>
            </td>
          </tr>

          <tr>
            <th scope="col" class="info">*手套重量:</th>
            <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight1" id="g_weight1" placeholder="" ></td>
            <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight2" id="g_weight2" placeholder="" ></td>
            <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight3" id="g_weight3" placeholder="" ></td>
            <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight4" id="g_weight4" placeholder="" ></td>
            <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight5" id="g_weight5" placeholder="" ></td>
            <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight6" id="g_weight6" placeholder="" ></td>
            <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight7" id="g_weight7" placeholder="" ></td>
            <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight8" id="g_weight8" placeholder="" ></td>
            <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight9" id="g_weight9" placeholder="" ></td>
            <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight10" id="g_weight10" placeholder="" ></td>
            <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight11" id="g_weight11" placeholder="" ></td>
            <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight12" id="g_weight12" placeholder="" ></td>
            <td><input oninput="decimal2(this,3);this.value = !!this.value && this.value >= 0 ? this.value : null;" class="form-control decimal" name="g_weight13" id="g_weight13" placeholder="" ></td>
            <td>
              <select class="form-control" id="result_length8" name="g_weight_p_f">
                <option class="form-control" name="g_weight_p_f" value="N/A"> N/A</option>
                <option class="form-control" name="g_weight_p_f" value="PASS"> P</option>
                <option class="form-control" name="g_weight_p_f" value="FAIL"> F</option>
              </select>
            </td>
          </tr>

        </table>

        <td>* Upon Customer Request</td>

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
  验货记录
  </div>

  <div class="panel-body">
    <div class="row">

      <div class="col-lg-12">

        <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

          <tr>
            <th scope="col" class="info">样本量 APT/WTT (水平 1):</th>
            <td><input  class="form-control digit" name="sample_size_apt" id="sample_size_apt"  > </td>

            <th scope="col" class="info">样本量 VT:</th>
            <td><input class="form-control digit" name="sample_size_vt" id="sample_size"  > </td>
          </tr>

          <tr>
            <th scope="col" class="info">样本量 APT/WTT (水平 2):</th>
            <td><input type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" class="form-control digit" name="sample_size_apt2" id="sample_size_apt2" placeholder="0" ></td>

            <th scope="col" class="info">机器 ID:</th>
            <td><input class="form-control" name="machine_id" placeholder="MACHINE ID" ></td>
          </tr>

        </table>

        <div class="modal fade" id="remark" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <br><br><br><br>

          <div class="modal-title">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>

          <li style="float: left;"><a class="btn btn-default" href="../pdf/GL PQC S07 Inspection Plan 1.1 Published.pdf" target="iframe_i">显示</a></li>
          <iframe height="560px" width="93%" name="iframe_i" href="../pdf/QEIM-PQC- Physical Properties TGNAS.pdf" target="iframe_i"></iframe>
        </div>
        <!-- /.modal -->

        <td>
          <b>**检查计划 & 水平 </b>
          <a class = "btn btn-default" data-toggle="modal" data-target="#remark" href="../pdf/GL PQC S07 Inspection Plan 1.1 Published.pdf" target="iframe_i">?</a>
          <br>
        </td>
        <td><b>*手套检验</b></td>

        <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

          <tr class="info"><br>
            <th></th>
            <th>MINOR 视觉的</th>
            <th>MAJOR 视觉的</th>
            <th>危急 NAG</th>
            <th>危急 NFG</th>
            <th>孔 LEVEL 1</th>
            <th>孔 LEVEL 2</th>
            <th>好手套</th>
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

          </tr>

          <tr style="text-align: center;">
            <th scope="col" class="info">验收:</th>
            <td><input  class="form-control digit" name="Acceptance_minor"  placeholder="0" > </td>
            <td><input  class="form-control digit" name="Acceptance_major"  placeholder="0" ></td>
            <td><input  class="form-control digit" name="Acceptance_nag"  placeholder="0" > </td>
            <td><input  class="form-control digit" name="Acceptance_nfg"   placeholder="0"> </td>
            <td><input  class="form-control digit" name="Acceptance_holes1"  placeholder="0" > </td>
            <td><input class="form-control digit" name="Acceptance_holes2" placeholder="0"></td>
            <td><input class="form-control digit" name="Acceptance_goodgloves" placeholder="0"></td>
          </tr>

          <tr style="text-align: center;">
            <th scope="col" class="info"></th>
            <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#minorModal">MINOR 视觉的</button></td>
            <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#majorModal">MAJOR 视觉的</button></td>
            <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#criticalNAG">危急 NAG</button></td>
            <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#criticalNFG">危急 NFG</button></td>
            <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#holes1Modal">孔 1</button></td>
            <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#holes2Modal">孔 2</button></td>
            <td><button type="button" class="btn btn-success defect-btn" href="#" data-toggle="modal" data-target="#goodglovesModal">好手套</button></td>
          </tr>

          <!-- CALCULATE TOTAL DEFECT VALUE HERE -->
          <tr id="countit">
            <th scope="col" class="info">总缺陷</th>
            <td><input class="input form-control form-control-lg" name="total_minor" readonly id="total_minor" value="0" ></td>
            <td><input class="input form-control form-control-lg" name="total_major" readonly id="total_major" value="0" ></td>
            <td><input class="input form-control form-control-lg" name="total_nag" readonly id="total_nag" value="0" ></td>
            <td><input class="input form-control form-control-lg" name="total_nfg" readonly id="total_nfg" value="0"></td>
            <td><input class="input form-control form-control-lg amount9" name="total_holes1" readonly id="total_holes1" value="0"></td>
            <td><input class="input form-control form-control-lg amount9" name="total_holes2" readonly id="total_holes2" value="0"></td>
            <td><input class="input form-control form-control-lg" name="total_goodglove" readonly id="total_goodglove" value="0"></td>
          </tr>

          <tr>
            <th scope="col" class="info">Grand 总缺陷</th>
            <td colspan="7">
              <input class="input form-control form-control-lg" name="total_defect" readonly id="total_defect" placeholder="">
            </td>
          </tr>

        </table>

        <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

          <tr>
            <th scope="col" class="info">总屏障:</th>
            <td><input class="form-control" name="total_holes" id="total_barrier" placeholder="0" readonly></td>
            <th scope="col" class="info">总体 AQL:</th>
            <td>
              <select class="form-control" id="P/f" name="overall_AQL">
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
            </td>

            <?php
              $sql="SELECT UDResultCode FROM M_UDResult";
              $query= $connect->exec($sql);
            ?>

            <th scope="col" class="info">UD Disposition:</th>
            <td>
              <select class="form-control" name="UDResultCode" >
                <?php
                  foreach ($connect -> query($sql) as $row){
                ?>
                <option value="<?php echo $row['UDResultCode']; ?>"> <?php echo $row['UDResultCode']; }?> </option>
              </select>
            </td>
          </tr>

        </table>

        <td><b>*产品包装检验</b></td>

        <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

          <tr class="info">
            <br>
            <th></th>
            <th>法规包装G</th>
            <th>CRITICAL 包装</th>
            <th>VISUAL 包装</th>
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
            <td><input class="form-control digit" name="Acceptance_regulatorypackaging" placeholder="0" ></td>
            <td><input class="form-control digit" name="Acceptance_criticalpackaging" placeholder="0" ></td>
            <td><input class="form-control digit" name="Acceptance_visualpackaging" placeholder="0" ></td>
            <td><input class="form-control digit" disabled></td>
            <td><input class="form-control digit" disabled></td>
            <td><input class="form-control digit" disabled></td>
          </tr>

          <tr>
            <th scope="col" class="info"></th>
            <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#regulatoryPackagingModal">REGULATORY 包装</a></center></td>
            <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#criticalPackagingModal">CRITICAL 包装</a></center></td>
            <td><center><a class = "btn btn-success" href = "#" data-toggle="modal" data-target="#visualPackagingModal">VISUAL 包装</a></center></td>
            <td><input class="form-control" disabled></td>
            <td><input class="form-control" disabled></td>
            <td><input class="form-control" disabled></td>
          </tr>

          <tr>
            <th scope="col" class="info">结果</th>
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
                <input type="radio" name="final_disposition" id="optionsRadios1" value="PASS" checked>PASS
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="final_disposition" id="optionsRadios1" value="FAIL">FAIL
              </label>
            </td>
          </tr>

        </table>

      </div>
      <!-- /.col-lg-12 -->

      <div class="col-lg-6">

        <div class="form-group">
          <label>已验证 by:</label>
          <input class="form-control" type="number" name="verify_by" placeholder="Enter Badge ID" disabled><br>
        </div>
        <!-- /.form-group -->

      </div>
      <!-- /.col-lg-6 -->

      <div class="col-lg-6">

        <div class="form-group">
          <label>日期:</label>
          <input class="form-control" type="date" name="date_verify" max="<?php echo date('Y-m-d\TH:i:s'); ?>" value="<?php echo date('Y-m-d\TH:i:s');?>" onkeydown="return false" ><br>
        </div>
        <!-- /.form-group -->

      </div>
      <!-- /.col-lg-6 -->

      <center>
        <button type="submit" name="submit" id="savebtn" form="InspectionForm" class="btn btn-primary" style="margin-bottom: 20px;">节省</button>
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
        <center><h2 class="modal-title" id="exampleModalLabel">Minor 视觉的</h2></center>
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
        <center><h2 class="modal-title" id="exampleModalLabel">Major 视觉的</h2></center>
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
        <center><h2 class="modal-title" id="exampleModalLabel">危急 NAG</h2></center>
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
        <center><h2 class="modal-title" id="exampleModalLabel">危急 NFG</h2></center>
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
        <center><h2 class="modal-title" id="exampleModalLabel">孔 1</h2></center>
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
        <center><h2 class="modal-title" id="exampleModalLabel">孔 2</h2></center>
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
        <center><h2 class="modal-title" id="exampleModalLabel">法规包装</h2></center>
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

<!-- Critical Packaging Modal -->
<div class="modal fade" id="criticalPackagingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <center><h2 class="modal-title" id="exampleModalLabel">关键包装</h2></center>
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

<!-- vISUAL Packaging Modal -->
<div class="modal fade" id="visualPackagingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <center><h2 class="modal-title" id="exampleModalLabel">视觉包装</h2></center>
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
        <center><h2 class="modal-title" id="exampleModalLabel">好手套</h2></center>
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
        <h4 class="modal-title">Error</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger">
          <strong> 总缺陷值大于样本量。 请重新输入. </strong>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->



</form>
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<?php include('transaction-FG.php'); ?>
<!-- jQuery -->
<!-- Bootstrap Core JavaScript -->
<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="../../vendor/metisMenu/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../../dist/js/sb-admin-2.js"></script>
<!-- Script to check Existence of Batch Number -->
<script type="text/javascript" src="../../jquery-1.11.3-jquery.min.js"></script>

<script src="../functionByPallet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>



<script>
var decimal2 = function(e,places) {
  var t = e.value;
  e.value = (t.indexOf(".") >= 0) ? (t.substr(0, t.indexOf(".")) + t.substr(t.indexOf("."), places)) : t;
}

$("#BatchNumber").keyup(function(){
  var BatchNumber = $(this).val().trim();
  if(BatchNumber != ''){

    $("#checkk").show();

    $.ajax({
      url: '../ajaxfile.php',
      type: 'post',
      data: {BatchNumber:BatchNumber},
      success: function(html){
        var html = html.trim();

        if(html == "Already exist"){
          $("#checkk").html("<span style='color:red;'>Already exist</span>");
          //$("#BatchNumber").val("");
        }else if (html == "Available"){
          $("#checkk").html("<span style='color:green;'>Available</span>");
        }
      }
    });

  }else{
    $("#checkk").hide();
  }
});


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


function minmax(value, min, max){
  if(parseInt(value) < min || isNaN(parseInt(value)))
    return min;
  else if(parseInt(value) > max)
    return "";
  else return value;
};



</script>
<!-- /.form -->
</body>
</html>

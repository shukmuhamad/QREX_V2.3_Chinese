<!DOCTYPE html>
    <?php
        include('../includes/database_connection.php');
        // include('../includes/database_connection_acc.php');
        include('../includes/header.php');
        include('../includes/session.php');
        //initialize so no.
        //$_SESSION['SO_num']="";

        $sql = "SELECT * FROM DimPlant WITH (NOLOCK);";
        $sql .= "SELECT * FROM M_Brand  WITH (NOLOCK) ORDER BY BrandName ASC;";
        $sql .= "SELECT * FROM M_Customer WITH (NOLOCK) ORDER BY CustomerName ASC;";
        $sql .= "SELECT * FROM M_InspectionPlan WITH (NOLOCK);";
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

<html lang="en">
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <?php include('../navbar/navbar.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-13">
                    <h4 class="page-header">QUALITY RECORD E SYSTEM (QREX)</h4>
                </div>
                <!-- /.col-lg-13 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-13">
                    <div class="panel panel-primary" >
                        <div class="panel-heading">预设批次详情</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <!-- --------------------------------------------------------------------------------- -->
                        <form method="post" id="insert_formA">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                      <!-- SELECT FACTORY /.form-group -->
                                        <div class="form-group">
                                          <?php
                                          // $query = $connect->prepare("SELECT * FROM DimPlant");
                                          // $query->execute();
                                          // $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>工厂</label>
                                            <select class="form-control fstdropdown-select" id="PlantKey" name="PlantKey" required></td>
                                            <option class="form-control" name="PlantKey" value=""> 工厂</option>
                                            <?php foreach ($Dimplant as $row) { ?>
                                            <option name="PlantKey" value="<?php echo $row['PlantName'];?>"><?php echo $row['PlantName']; }?></option>
                                            </select>
                                        </div>
                                        <!-- SO NUMBER /.form-group -->
                                        <div class="form-group">
                                            <label>SO 编号</label>
                                            <input type="number" class="form-control" name="SONumber" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength="10" id="SONumber" placeholder="Enter SO Number" required>
                                            <div id="checkk"></div>
                                        </div>
                                        <!-- ITEM NUMBER /.form-group -->
                                        <!-- <div class="form-group">
                                            <label>Item Number</label>
                                            <input type="number" class="form-control" placeholder="Enter Item Number" name="itemnumber" id="ItemNumber" min="1"
                                            oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null" required>
                                        </div> -->
                                        <!-- SELECT BRAND /.form-group -->
                                        <div class="form-group">
                                          <?php
                                              // $query = $connect->prepare("SELECT * FROM M_Brand ORDER BY BrandName ASC");
                                              // $query->execute();
                                              // $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>品牌</label>
                                            <select class="form-control fstdropdown-select" id="Brand" name="Brand" required>
                                                <option class="form-control" name="" value="">品牌 </option>
                                                <?php foreach ($M_Brand as $row) { ?>
                                                <option name="Brand" value="<?php echo $row['BrandName'];?>"><?php echo $row['BrandName']; }?></option>
                                                </select>
                                        </div>
                                        <!-- CUSTOMER /.form-group -->
                                        <div class="form-group">
                                          <?php
                                              // $query = $connect->prepare("SELECT * FROM M_Customer ORDER BY CustomerName ASC");
                                              // $query->execute();
                                              // $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>顾客</label>
                                            <select class="form-control fstdropdown-select" id="Customer" name="Customer" required>
                                                <option class="form-control" name="" value=""> 顾客</option>
                                                <?php foreach ($M_Customer as $row) { ?>
                                                <option name="Customer" value="<?php echo $row['CustomerName'];?>"><?php echo $row['CustomerName']; }?></option>
                                            </select>
                                        </div>
                                        <!-- CATEGORY /.form-group -->
                                        <div class="form-group">
                                          <?php
                                          // $query = $connect->prepare("SELECT * FROM M_InspectionPlan");
                                          // $query->execute();
                                          // $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>类别</label>
                                            <select class="form-control fstdropdown-select" id="InspectionPlanKey" name="InspectionPlanKey" required></td>
                                                    <option class="form-control" name="InspectionPlanKey" value=""> 类别</option>
                                                    <?php foreach ($M_InspectionPlan as $row) {
                                                      if($row['ActiveStatus'] == 0){

                                                      }else{?>
                                                    <option name="InspectionPlanKey" value="<?php echo $row['InspectionPlanName'];?>"><?php echo $row['InspectionPlanName'];?></option>
                                                  <?php }} ?>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <!-- SIZE /.form-group -->
                                    <div class="col-md-6">

                                        <!-- COLOUR /.form-group -->

                                        <div class="form-group">
                                          <?php
                                              // $query = $connect->prepare("SELECT * FROM M_GloveColour ORDER BY GloveColourName ASC");
                                              // $query->execute();
                                              // $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>颜色</label>
                                            <select class="form-control fstdropdown-select" id="GloveColourKey" name="GloveColourKey" required>
                                                <option class="form-control" name="GloveColourKey" value=""> 颜色</option>
                                                <?php foreach ($M_GloveColour as $row) { ?>
                                                <option name="GloveColourKey" value="<?php echo $row['GloveColourCode'];?>"><?php echo $row['GloveColourName']; }?></option>
                                            </select>
                                        </div>
                                        <!-- LOT COUNT /.form-group -->

                                        <!-- <div class="form-group">
                                            <label>Lot Count</label>
                                            <input type="number" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null" class="form-control" placeholder="Lot Count" id="lotcount" name="lotcount" required>
                                        </div> -->
                                        <!-- LOT NUMBER /.form-group -->

                                        <div class="form-group">
                                            <label>批号</label>
                                            <input type="input" class="form-control" placeholder="Lot Number" id="lotnumber" name="lotnumber" required>
                                        </div>
                                        <!-- PRODUCT /.form-group -->

                                        <div class="form-group">
                                          <?php
                                              // $query = $connect->prepare("SELECT * FROM M_GloveProductType ORDER BY GloveProductTypeName ASC");
                                              // $query->execute();
                                              // $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>产品</label>
                                            <select class="form-control fstdropdown-select" id="GloveProductTypeKey" name="GloveProductTypeKey" required>
                                                <option class="form-control" name="GloveProductTypeKey" value="">产品</option>
                                                <?php foreach ($M_GloveProductType as $row) { ?>
                                                <option name="GloveProductTypeKey" value="<?php echo $row['GloveProductTypeName'];?>"><?php echo $row['GloveProductTypeName']; }?></option>
                                            </select>
                                        </div>
                                        <!-- PRODUCT CODE /.form-group -->

                                        <div class="form-group">
                                          <?php
                                              // $query = $connect->prepare("SELECT * FROM M_GloveCode ORDER BY GloveCodeLong ASC");
                                              // $query->execute();
                                              // $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>产品代码</label>
                                            <select class="form-control fstdropdown-select" id="GloveCodeKey" name="GloveCodeKey" required>
                                                <option class="form-control" name="GloveCodeKey" value="">产品代码</option>
                                            <?php foreach ($M_GloveCode as $row) { ?>
                                                <option name="GloveCodeKey" value="<?php echo $row['GloveCodeLong'];?>"><?php echo $row['GloveCodeLong']; }?></option>
                                            </select>
                                        </div>

                                        <!-- fg condition /.form-group -->

                                        <div class="form-group">

                                            <label>检查阶段</label>
                                            <select class="form-control fstdropdown-select" id="fgcondition" name="fgcondition" required>
                                              <option class="form-control" name="fgcondition" value="1">成品好</option>
                                              <option class="form-control" name="fgcondition" value="0">成品总体不错（综合尺码）</option>
                                            </select>
                                        </div>


                                    </div>
                                    <!-- /.col -->

                                    <div class="form-group" style="padding-left: 40%; padding-right: 40%;">
                                      <label>尺寸</label>

                                          <div class="toolt"><sup><i class="fa fa-info-circle" aria-hidden="true"></i></sup>
                                              <span class="toolttext">仅在所有托盘具有相同尺寸时才选择*</span>
                                          </div>


                                      <select name="GloveSizeKey[]" class="form-control gloveSizePrimary"><option value="">Size</option><?php echo size_selection($connect,$M_GloveSize); ?></select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.row -->
                            </div>
                          </form>
                          <!-- FORM A END -->
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-13">
                    <div class="panel panel-primary" >
                        <div class="panel-heading">预设托盘输入</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">

                            <!-- <div class="form-inline"> -->
                            <div class="table-repsonsive">
                              <form method="post" id="insert_form_calculate">
                                <span id="error"></span>
                                <table class="table" id="input_table" style="bordered: none;">
                                    <tr>
                                      <th>总订单 (CTN) <input type="number" class="form-control" name="totalOrder" id="totalOrder"/></th>
                                      <th>每个托盘的总 CTN <input type="number" class="form-control" name="totalCTN" id="totalCTN"/></th>
                                      <th>总托盘 <input type="number" class="form-control" name="totalPallet" id="totalPallet"/></th>
                                      <th>最大限度 CTN <input type="number" class="form-control" name="maxCTN" id="maxCTN"/></th>
                                   </tr>
                                </table>

                                <table class="table" id="carton_table" style="bordered: none;">
                                    <tr>
                                      <th>数字 </th>
                                      <th>每批总托盘</th>
                                      <th>Total pcs </th>
                                      <th>Total ctn</th>
                                      <th>actual total ctn </th>
                                      <th>balance ctn </th>
                                      <th>formula </th>
                                      <th>Total sample size </th>
                                   </tr>

                                   <tr>
                                     <td>1 </td>
                                     <td><input type="number" class="form-control" name="TPallet1" id="TPallet1" readonly/> </td>
                                     <td><input type="number" class="form-control" name="TPcs1" id="TPcs1" readonly/> </td>
                                     <td><input type="number" class="form-control" name="TCTN1" id="TCTN1" readonly/> </td>
                                     <td><input type="number" class="form-control" name="ATCTN1" id="ATCTN1" readonly/> </td>
                                     <td><input type="number" class="form-control" name="Balance1" id="Balance1" readonly/> </td>
                                     <td><input type="number" class="form-control" name="Formula1" id="Formula1" readonly/> </td>
                                     <th><input type="number" class="form-control" name="TSS1" id="TSS1" readonly/></th>
                                  </tr>

                                  <tr>
                                    <td>2 </td>
                                    <td><input type="number" class="form-control" name="TPallet2" id="TPallet2" readonly/> </td>
                                    <td><input type="number" class="form-control" name="TPcs2" id="TPcs2" readonly/> </td>
                                    <td><input type="number" class="form-control" name="TCTN2" id="TCTN2" readonly/> </td>
                                    <td><input type="number" class="form-control" name="ATCTN2" id="ATCTN2" readonly/> </td>
                                    <td><input type="number" class="form-control" name="Balance2" id="Balance2" readonly/> </td>
                                    <td><input type="number" class="form-control" name="Formula2" id="Formula2" readonly/> </td>
                                    <th><input type="number" class="form-control" name="TSS2" id="TSS2" readonly/></th>
                                 </tr>

                                 <tr>
                                   <td>3 </td>
                                   <td><input type="number" class="form-control" name="TPallet3" id="TPallet3" readonly/> </td>
                                   <td><input type="number" class="form-control" name="TPcs3" id="TPcs3" readonly/> </td>
                                   <td><input type="number" class="form-control" name="TCTN3" id="TCTN3" readonly/> </td>
                                   <td><input type="number" class="form-control" name="ATCTN3" id="ATCTN3" readonly/> </td>
                                   <td><input type="number" class="form-control" name="Balance3" id="Balance3" readonly/> </td>
                                   <td><input type="number" class="form-control" name="Formula3" id="Formula3" readonly/> </td>
                                   <th><input type="number" class="form-control" name="TSS3" id="TSS3" readonly/></th>
                                </tr>

                                <tr>
                                  <td>4 </td>
                                  <td><input type="number" class="form-control" name="TPallet4" id="TPallet4" readonly/> </td>
                                  <td><input type="number" class="form-control" name="TPcs4" id="TPcs4" readonly/> </td>
                                  <td><input type="number" class="form-control" name="TCTN4" id="TCTN4" readonly/> </td>
                                  <td><input type="number" class="form-control" name="ATCTN4" id="ATCTN4" readonly/> </td>
                                  <td><input type="number" class="form-control" name="Balance4" id="Balance4" readonly/> </td>
                                  <td><input type="number" class="form-control" name="Formula4" id="Formula4" readonly/> </td>
                                  <th><input type="number" class="form-control" name="TSS4" id="TSS4" readonly/></th>
                               </tr>

                               <tr>
                                 <td>5 </td>
                                 <td><input type="number" class="form-control" name="TPallet5" id="TPallet5" readonly/> </td>
                                 <td><input type="number" class="form-control" name="TPcs5" id="TPcs5" readonly/> </td>
                                 <td><input type="number" class="form-control" name="TCTN5" id="TCTN5" readonly/> </td>
                                 <td><input type="number" class="form-control" name="ATCTN5" id="ATCTN5" readonly/> </td>
                                 <td><input type="number" class="form-control" name="Balance5" id="Balance5" readonly/> </td>
                                 <td><input type="number" class="form-control" name="Formula5" id="Formula5" readonly/> </td>
                                 <th><input type="number" class="form-control" name="TSS5" id="TSS5" readonly/></th>
                              </tr>
                                </table>

                                <table class="table" id="AQL_table" style="bordered: none;">
                                    <tr>
                                      <th>AQL Holes
                                        <select class="form-control" id="AQL_holes" name="AQL_holes">
                                          <option class="form-control" value="N/A"> N/A</option>
                                          <option class="form-control" value="0.065"> 0.065</option>
                                          <option class="form-control" value="0.10"> 0.10</option>
                                          <option class="form-control" value="0.15"> 0.15</option>
                                          <option class="form-control" value="0.25"> 0.25</option>
                                          <option class="form-control" value="0.40"> 0.40</option>
                                          <option class="form-control" value="0.65"> 0.65</option>
                                          <option class="form-control" value="1.00"> 1.0</option>
                                          <option class="form-control" value="1.50"> 1.5</option>
                                          <option class="form-control" value="2.50"> 2.5</option>
                                          <option class="form-control" value="4.00"> 4.0</option>
                                          <option class="form-control" value="6.50"> 6.5</option>
                                        </select>
                                      </th>
                                      <th>AQL NFG
                                        <select class="form-control" id="AQL_NFG" name="AQL_NFG">
                                          <option class="form-control" value="N/A"> N/A</option>
                                          <option class="form-control" value="0.065"> 0.065</option>
                                          <option class="form-control" value="0.10"> 0.10</option>
                                          <option class="form-control" value="0.15"> 0.15</option>
                                          <option class="form-control" value="0.25"> 0.25</option>
                                          <option class="form-control" value="0.40"> 0.40</option>
                                          <option class="form-control" value="0.65"> 0.65</option>
                                          <option class="form-control" value="1.00"> 1.0</option>
                                          <option class="form-control" value="1.50"> 1.5</option>
                                          <option class="form-control" value="2.50"> 2.5</option>
                                          <option class="form-control" value="4.00"> 4.0</option>
                                          <option class="form-control" value="6.50"> 6.5</option>
                                        </select>
                                      </th>
                                      <th>AQL NAG
                                        <select class="form-control" id="AQL_NAG" name="AQL_NAG">
                                          <option class="form-control" value="N/A"> N/A</option>
                                          <option class="form-control" value="0.065"> 0.065</option>
                                          <option class="form-control" value="0.10"> 0.10</option>
                                          <option class="form-control" value="0.15"> 0.15</option>
                                          <option class="form-control" value="0.25"> 0.25</option>
                                          <option class="form-control" value="0.40"> 0.40</option>
                                          <option class="form-control" value="0.65"> 0.65</option>
                                          <option class="form-control" value="1.00"> 1.0</option>
                                          <option class="form-control" value="1.50"> 1.5</option>
                                          <option class="form-control" value="2.50"> 2.5</option>
                                          <option class="form-control" value="4.00"> 4.0</option>
                                          <option class="form-control" value="6.50"> 6.5</option>
                                        </select>
                                      </th>
                                      <th>AQL Major
                                        <select class="form-control" id="AQL_Major" name="AQL_Major">
                                          <option class="form-control" value="N/A"> N/A</option>
                                          <option class="form-control" value="0.065"> 0.065</option>
                                          <option class="form-control" value="0.10"> 0.10</option>
                                          <option class="form-control" value="0.15"> 0.15</option>
                                          <option class="form-control" value="0.25"> 0.25</option>
                                          <option class="form-control" value="0.40"> 0.40</option>
                                          <option class="form-control" value="0.65"> 0.65</option>
                                          <option class="form-control" value="1.00"> 1.0</option>
                                          <option class="form-control" value="1.50"> 1.5</option>
                                          <option class="form-control" value="2.50"> 2.5</option>
                                          <option class="form-control" value="4.00"> 4.0</option>
                                          <option class="form-control" value="6.50"> 6.5</option>
                                        </select>
                                      </th>
                                      <th>AQL Minor
                                        <select class="form-control" id="AQL_Minor" name="AQL_Minor">
                                          <option class="form-control" value="N/A"> N/A</option>
                                          <option class="form-control" value="0.065"> 0.065</option>
                                          <option class="form-control" value="0.10"> 0.10</option>
                                          <option class="form-control" value="0.15"> 0.15</option>
                                          <option class="form-control" value="0.25"> 0.25</option>
                                          <option class="form-control" value="0.40"> 0.40</option>
                                          <option class="form-control" value="0.65"> 0.65</option>
                                          <option class="form-control" value="1.00"> 1.0</option>
                                          <option class="form-control" value="1.50"> 1.5</option>
                                          <option class="form-control" value="2.50"> 2.5</option>
                                          <option class="form-control" value="4.00"> 4.0</option>
                                          <option class="form-control" value="6.50"> 6.5</option>
                                        </select>
                                      </th>
                                   </tr>
                                </table>
                                <button type="button" name="generate" class="btn btn-success generate">Generate details</button>

                              </form>
                              <!-- insert_form_calculate ENND -->

                            </div>
                            <!-- </div> -->

                        </div>
                    </div>
                </div>
            </div>



                        <br>




            <!-- /.table-responsive -->
        </div>

            <div class="row">
                <div class="col-lg-13">
                    <div class="panel panel-primary" >
                        <div class="panel-heading">Preset Pallet Details</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">

                            <!-- <div class="form-inline"> -->

                              <form method="post" id="insert_formB">
                                <span id="error"></span>
                                <table id="item_table" style="bordered: none;">
                                    <tr>
                                      <th>Size</th>
                                      <th>Item Number</th>
                                      <th>Lot Count</th>
                                      <th>Pallet Number</th>
                                      <th>Sampling ctn /pallet</th>
                                      <th>1. Sampling Inner /ctn</th>
                                      <th>1. Sampling pcs /Inner</th>
                                      <th>2. Sampling Inner /ctn </th>
                                      <th>2. Sampling pcs /Inner </th>
                                        <th>Sample Size Visual</th>
                                        <th>Sample Size APT/WTT</th>
                                        <th>Acc Hole</th>
                                        <th>Acc Critical NFG</th>
                                        <th>Acc Critical NAG</th>
                                        <th>Acc Major</th>
                                        <th>Acc Minor</th>
                                        <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
                                    </tr>

                                    <?php
                                    function size_selection($connect,$M_GloveSize)
                                    {
                                      $output = '';
                                      // $query = "SELECT * FROM M_GloveSize";
                                      // $statement = $connect->prepare($query);
                                      // $statement->execute();
                                      // $result = $statement->fetchAll();
                                      foreach($M_GloveSize as $row)
                                      {
                                        $output .= '<option value="'.$row["GloveSizeCodeLong"].'">'.$row["GloveSizeCodeLong"].'</option>';
                                      }
                                      return $output;
                                    }

                                    ?>
                                </table>

                                <div align="center">
                                    <input type="submit" name="submit" class="btn btn-info" value="Insert" />
                                </div>
                              </form>
                              <!-- FORM B END -->
                              <div id="test">

                              </div>

                            <!-- </div> -->

                        </div>
                    </div>
                </div>
            </div>



                        <br>




            <!-- /.table-responsive -->
        </div>
            <!-- /.row -->

            <!-- /.row -->

            <!-- /.row -->

                <!-- /.col-lg-6 -->

                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    </div>
    <div id="test">

    </div>

          <?php   include('script.php'); ?>
          <?php   include('script-Preset-FG.php'); ?>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->


        <script>


            $(document).ready(function(){

                $('#insert_formB').on('submit', function(event){
                    event.preventDefault();
                    //event.preventDefault();
                    var error = '';

                    if ($('#PlantKey').val() === '') {
                      $('#PlantKey').focus();
                      error = 'Factory not selected';
                    }
                    else if ($('#SONumber').val() === '') {
                      error = 'SO number not inserted.';
                    }
                    else if ($('#ItemNumber').val() === '') {
                      error = 'Item number not inserted.';
                    }
                    else if ($('#InspectionPlanKey').val() === '') {
                      $('#InspectionPlanKey').focus();
                      error = 'Category not inserted.';
                    }
                    else if ($('#GloveColourKey').val() === '') {
                      $('#GloveColourKey').focus();
                      error = 'Colour not inserted.';
                    }
                    else if ($('#lotcount').val() === '') {
                      error = 'Lot Count not inserted.';
                    }
                    else if ($('#lotnumber').val() === '') {
                      error = 'Lot number not inserted.';
                    }
                    else if ($('#GloveProductTypeKey').val() === '') {
                      $('#GloveProductTypeKey').focus();
                      error = 'Product type not inserted.';
                    }
                    else if ($('#GloveCodeKey').val() === '') {
                      $('#GloveCodeKey').focus();
                      error = 'Product code not inserted.';
                    }


                    var form_dataA = $('#insert_formA').serializeArray();
                    var form_dataB = $(this).serializeArray();
                    console.log(form_dataA);
                    console.log(form_dataB);


                    if(error == '')
                    {

                     $("#test").load("transaction-Preset.php",{
                       form_dataA: form_dataA,
                       form_dataB: form_dataB

                     });

                     alert("Data saved!");
                    }
                    else
                    {
                     // $('#error').html('<div class="alert alert-danger">'+error+'</div>');
                     alert("Form not complete. "+error);
                     event.preventDefault();
                    }
                });
            });
        </script>
        <style>

.toolt {
    cursor: pointer;
    position: relative;
    display: inline-block;
}

.toolttext {
    opacity: 0;
    z-index: 99;
    color: #bbb;
    width: 190px;
    display: block;
    font-size: 11px;
    padding: 5px 10px;
    border-radius: 3px;
    text-align: center;
    text-shadow: 1px 1px 2px #111;
    background: rgba(51,51,51,0.9);
    border: 1px solid rgba(34,34,34,0.9);
    box-shadow: 0 0 3px rgba(0,0,0,0.5);
    -webkit-transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    -ms-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -o-transform: scale(0);
    -ms-transform: scale(0);
    transform: scale(0);
    position: absolute;
    right: -165px;
    bottom: 30px;
}

/* triangle punya css */
.toolttext:before,.toolttext:after {
    content: '';
    border-left: 0px solid transparent;
    border-right: 10px solid transparent;
    border-top: 10px solid rgba(51,51,51,0.9);
    position: absolute;
    bottom: -10px;
    left: 10%;
}

.toolt:hover .toolttext,a:hover .toolttext {
    opacity: 1;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -o-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
}

        </style>
    </body>
</html>

<!DOCTYPE html>
    <?php
        include('../includes/database_connection.php');
        include('../includes/header.php');
        include('../includes/session.php');

        $lotID = $_GET['LotIDKey'];
        $RecordID = $_GET['RecordID'];

        echo $lotID;
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


        $T_Lot_FG_Preset = $_SESSION['T_Lot_FG_Preset'];
        $T_Record_SampleSize_Preset = $_SESSION['T_Record_SampleSize_Preset'];
        $T_Record_AQL_Preset = $_SESSION['T_Record_AQL_Preset'];
        $T_Record_Master = $_SESSION['T_Record_Master'];



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
                                          function factory_selection(  $matching, $Dimplant)
                                          {
                                            $output = '';

                                            foreach($Dimplant as $row)
                                            {

                                                if($row['PlantName'] == $matching ){
                                                  $output .= '<option value="'.$row['PlantKey'].'" selected>'.$row['PlantName'].'</option>';
                                                }else{
                                                  $output .= '<option value="'.$row['PlantKey'].'" >'.$row['PlantName'].'</option>';
                                                }
                                            }
                                            return $output;
                                          }
                                          ?>
                                            <label>Factory</label>
                                          <select class="form-control fstdropdown-select" id="PlantKey" name="PlantKey" required></td>
                                            <?php echo factory_selection(  $T_Lot_FG_Preset['PlantName'], $Dimplant); ?>
                                            </select>
                                        </div>
                                        <!-- SO NUMBER /.form-group -->
                                        <div class="form-group">
                                          <label>SO Number:</label>
                                          <input  type="number" min="1" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength="10"  class="form-control" name="SONumber" id="SONumber" value="<?php echo $T_Lot_FG_Preset['SONumber']; ?>" >
                                          <div id="checkk"></div>
                                        </div>
                                        <!-- ITEM NUMBER /.form-group -->
                                        <div class="form-group">
                                          <label>Item Number:</label>
                                          <input type="number" class="form-control digit" name="SOItemNumber" id="SOItemNumber" value="<?php echo $T_Lot_FG_Preset['SOItemNumber']; ?>" min="1"
                                          oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null" required>

                                        </div>
                                        <!-- SELECT BRAND /.form-group -->
                                        <div class="form-group">
                                          <label>Brand:</label>

                                          <?php
                                          function Brand_selection(  $matching, $result)
                                          {
                                            $output = '';

                                            foreach($result as $row)
                                            {

                                                if($row['BrandName'] == $matching ){
                                                  $output .= '<option value="'.$row['BrandKey'].'" selected>'.$row['BrandName'].'</option>';
                                                }else{
                                                  $output .= '<option value="'.$row['BrandKey'].'" >'.$row['BrandName'].'</option>';
                                                }
                                            }
                                            return $output;
                                          }
                                          ?>
                                        <select class="form-control fstdropdown-select " id="BrandName" name="BrandName" required></td>
                                                <?php echo Brand_selection( $T_Lot_FG_Preset['BrandName'],$M_Brand);?>
                                          </select>


                                        </div>
                                        <!-- CUSTOMER /.form-group -->
                                        <div class="form-group">

                                          <?php
                                          function Customer_selection(  $matching, $result)
                                          {
                                            $output = '';

                                            foreach($result as $row)
                                            {

                                                if($row['CustomerName'] == $matching ){
                                                  $output .= '<option value="'.$row['CustomerKey'].'" selected>'.$row['CustomerName'].'</option>';
                                                }else{
                                                  $output .= '<option value="'.$row['CustomerKey'].'" >'.$row['CustomerName'].'</option>';
                                                }
                                            }
                                            return $output;
                                          }
                                          ?>

                                          <label>Customer:</label>
                                        <select class="form-control fstdropdown-select " id="CustomerName" name="CustomerName" required></td>
                                                  <?php echo Customer_selection(  $T_Lot_FG_Preset['CustomerName'], $M_Customer);?>
                                          </select>

                                        </div>
                                        <!-- CATEGORY /.form-group -->
                                        <div class="form-group">
                                          <label>Category:</label></br>



                                          <?php
                                          function InspectionPlan_selection(  $matching,$result)
                                          {
                                            $output = '';

                                            foreach($result as $row)
                                            {

                                                if($row['ActiveStatus'] == 0){

                                                }elseif($row['InspectionPlanName'] == $matching ){
                                                  $output .= '<option value="'.$row['InspectionPlanKey'].'" selected>'.$row['InspectionPlanName'].'</option>';
                                                }else{
                                                  $output .= '<option value="'.$row['InspectionPlanKey'].'" >'.$row['InspectionPlanName'].'</option>';
                                                }
                                            }
                                            return $output;
                                          }
                                          ?>

                                        <select class="form-control fstdropdown-select " id="InspectionPlanKey" name="InspectionPlanKey" required></td>
                                                  <?php echo InspectionPlan_selection( $T_Lot_FG_Preset['InspectionPlanName'], $M_InspectionPlan);?>
                                          </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <!-- SIZE /.form-group -->
                                    <div class="col-md-6">

                                        <!-- COLOUR /.form-group -->

                                        <div class="form-group">
                                          <label>Colour:</label>


                                          <?php
                                          function Colour_selection(  $matching, $result)
                                          {
                                            $output = '';

                                            foreach($result as $row)
                                            {

                                                if($row['GloveColourName'] == $matching ){
                                                  $output .= '<option value="'.$row['GloveColourKey'].'" selected>'.$row['GloveColourName'].'</option>';
                                                }else{
                                                  $output .= '<option value="'.$row['GloveColourKey'].'" >'.$row['GloveColourName'].'</option>';
                                                }
                                            }
                                            return $output;
                                          }
                                          ?>

                                          <select class="form-control fstdropdown-select" id="GloveColourCode" name="GloveColourCode" required></td>
                                              <?php echo Colour_selection( $T_Lot_FG_Preset['GloveColourName'], $M_GloveColour);?>
                                          </select>

                                        </div>
                                        <!-- LOT COUNT /.form-group -->
                                        <div class="form-group">
                                          <label>Lot Count:</label>
                                          <input type="number" class="form-control" name="LotCount" id="LotCount" placeholder="Enter Lot Count" value="<?php echo $T_Lot_FG_Preset['LotCount']; ?>"
                                           min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null" required>
                                        </div>

                                        <!-- LOT NUMBER /.form-group -->

                                        <div class="form-group">
                                          <label>Lot Number:</label>
                                          <input type="input" class="form-control" name="LotNumber" id="LotNumber" value="<?php echo $T_Lot_FG_Preset['LotNumber']; ?>" >

                                        </div>

                                        <!-- PRODUCT /.form-group -->

                                        <div class="form-group">
                                          <label>Product:</label>

                                          <?php
                                          function Product_selection($matching, $result)
                                          {
                                            $output = '';

                                            foreach($result as $row)
                                            {

                                                if($row['GloveProductTypeName'] == $matching ){
                                                  $output .= '<option value="'.$row['GloveProductTypeKey'].'" selected>'.$row['GloveProductTypeName'].'</option>';
                                                }else{
                                                  $output .= '<option value="'.$row['GloveProductTypeKey'].'" >'.$row['GloveProductTypeName'].'</option>';
                                                }
                                            }
                                            return $output;
                                          }
                                          ?>


                                        <select class="form-control fstdropdown-select" id="GloveProductTypeName" name="GloveProductTypeName" required></td>
                                                  <?php echo Product_selection($T_Lot_FG_Preset['GloveProductTypeName'], $M_GloveProductType);?>
                                          </select>

                                        </div>
                                        <!-- PRODUCT CODE /.form-group -->

                                        <div class="form-group">
                                          <label>Product Code:</label>


                                          <?php
                                          function ProductCode_selection( $matching, $result )
                                          {
                                            $output = '';

                                            foreach($result as $row)
                                            {

                                                if($row['GloveCodeLong'] == $matching ){
                                                  $output .= '<option value="'.$row['GloveCodeKey'].'" selected>'.$row['GloveCodeLong'].'</option>';
                                                }else{
                                                  $output .= '<option value="'.$row['GloveCodeKey'].'" >'.$row['GloveCodeLong'].'</option>';
                                                }
                                            }
                                            return $output;
                                          }
                                          ?>

                                          <select class="form-control fstdropdown-select" id="GloveCodeLong" name="GloveCodeLong" required></td>
                                                <?php echo ProductCode_selection($T_Lot_FG_Preset['GloveCodeLong'], $M_GloveCode);?>
                                          </select>

                                        </div>

                                        <!-- fg condition /.form-group -->

                                        <div class="form-group">

                                            <label>Inspection Stage</label>
                                            <select class="form-control" id="fgcondition" name="fgcondition" required>
                                              <?php if($T_Lot_FG_Preset['FGCondition'] == 1){ ?>
                                              <option class="form-control" name="fgcondition" value="1" selected>Finished Good</option>
                                              <option class="form-control" name="fgcondition" value="0">Finished Good Overall (Combined Size)</option>
                                            <?php }else{ ?>
                                              <option class="form-control" name="fgcondition" value="1" >Finished Good</option>
                                              <option class="form-control" name="fgcondition" value="0" selected>Finished Good Overall (Combined Size)</option>
                                              <?php } ?>
                                            </select>
                                        </div>

                                        <input type="hidden" id="LotIDKey" name="LotIDKey" value="<?php echo $lotID;?>" />


                                    </div>
                                    <!-- /.col -->


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
                        <div class="panel-heading">Preset Pallet Details</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">

                            <!-- <div class="form-inline"> -->
                            <div class="table-repsonsive">
                              <form method="post" id="insert_formB">
                                <span id="error"></span>
                                <table class="table" id="item_table" style="bordered: none;">
                                    <tr>
                                      <th>Size</th>
                                        <th>Sample Size Visual</th>
                                        <th>Sample Size APT/WTT</th>
                                        <th>Acc Hole</th>
                                        <th>Acc Critical NFG</th>
                                        <th>Acc Critical NAG</th>
                                        <th>Acc Major</th>
                                        <th>Acc Minor</th>
                                        <th>Pallet Number</th>
                                    </tr>
                                  <tr>
                                    <td width="100px"><select name="GloveSizeKey" class="form-control gloveSizeSub" required><option value="">Size</option><?php echo size_selection($T_Lot_FG_Preset['GloveSizeCodeLong'], $M_GloveSize); ?></select></td>
                                    <td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="visual" class="form-control sample " placeholder="SS Visual" value="<?php echo $T_Record_SampleSize_Preset[0]['SampleSizeValue']; ?>" required></td>
                                    <td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="sample" class="form-control sample " placeholder="APT/WTT" value="<?php echo $T_Record_SampleSize_Preset[1]['SampleSizeValue']; ?>" required></td>
                                    <td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accFFH" class="form-control accFFH " placeholder="Acc FFH" value="<?php echo $T_Record_AQL_Preset[2]['AQLValue'];?>" required></td>
                                    <td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accNFG" class="form-control accNFG " placeholder="Acc Critical NFG" value="<?php echo $T_Record_AQL_Preset[3]['AQLValue'];?>" required></td>
                                    <td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accNAG" class="form-control accNAG " placeholder="Acc Critical NAG" value="<?php echo $T_Record_AQL_Preset[4]['AQLValue'];?>" required></td>
                                    <td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accMajor" class="form-control accMajor" placeholder="Acc Major" value="<?php echo $T_Record_AQL_Preset[1]['AQLValue'];?>" required></td>
                                    <td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accMinor" class="form-control accMinor" placeholder="Acc Minor" value="<?php echo $T_Record_AQL_Preset[0]['AQLValue'];?>" required></td>
                                    <td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="palletNumber" class="form-control palletNumber" placeholder="Pallet Number" value="<?php echo $T_Lot_FG_Preset['PalletNumber'];?>"></td>
                                  </tr>

                                    <?php
                                    function size_selection( $matching, $M_GloveSize)
                                    {
                                      $output = '';
                                      foreach($M_GloveSize as $row)
                                      {
                                        if($row['GloveSizeCodeLong'] == $matching ){
                                          $output .= '<option value="'.$row['GloveSizeKey'].'" selected>'.$row['GloveSizeCodeLong'].'</option>';
                                        }else{
                                          $output .= '<option value="'.$row['GloveSizeKey'].'" >'.$row['GloveSizeCodeLong'].'</option>';
                                        }
                                      }
                                      return $output;
                                    }

                                    ?>
                                </table>

                                <div align="center">
                                    <input type="submit" name="submit" class="btn btn-info" value="Save update" />
                                </div>
                              </form>
                              <!-- FORM B END -->
                              <div id="test">

                              </div>
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

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>

        var list = 0;
        var _selectedSize = '';
        var sizeRow = '';
        var sizeNew = '';
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



                $('#insert_formB').on('submit', function(event){
                    //event.preventDefault();
                    // event.preventDefault();
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
                    else if ($('#Brand').val() === '') {
                      $('#Brand').focus();
                      error = 'Brand not inserted.';
                    }
                    else if ($('#Customer').val() === '') {
                      $('#Customer').focus();
                      error = 'Customer not inserted.';
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

                     $("#test").load("transaction-Preset-Edit.php",{
                       form_dataA: form_dataA,
                       form_dataB: form_dataB

                     });
                     // event.preventDefault();
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

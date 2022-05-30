<!DOCTYPE html>
    <?php
        include('../includes/database_connection.php');
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
                        <div class="panel-heading">预设 Lot 详情</div>
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
                                            <select class="form-control" id="PlantKey" name="PlantKey" required></td>
                                            <option class="form-control" name="PlantKey" value=""> 工厂</option>
                                            <?php foreach ($Dimplant as $row) { ?>
                                            <option name="PlantKey" value="<?php echo $row['PlantName'];?>"><?php echo $row['PlantName']; }?></option>
                                            </select>
                                        </div>
                                        <!-- SO NUMBER /.form-group -->
                                        <div class="form-group">
                                            <label>SO 数字</label>
                                            <input type="number" class="form-control" name="SONumber" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength="10" id="SONumber" placeholder="Enter SO Number" required>
                                            <div id="checkk"></div>
                                        </div>
                                        <!-- ITEM NUMBER /.form-group -->
                                        <div class="form-group">
                                            <label>项目编号</label>
                                            <input type="number" class="form-control" placeholder="Enter Item Number" name="itemnumber" id="ItemNumber" min="1"
                                            oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null" required>
                                        </div>
                                        <!-- SELECT BRAND /.form-group -->
                                        <div class="form-group">
                                          <?php
                                              // $query = $connect->prepare("SELECT * FROM M_Brand ORDER BY BrandName ASC");
                                              // $query->execute();
                                              // $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>品牌</label>
                                            <select class="form-control" id="Brand" name="Brand" required>
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
                                            <select class="form-control" id="Customer" name="Customer" required>
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
                                            <select class="form-control" id="InspectionPlanKey" name="InspectionPlanKey" required></td>
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
                                            <select class="form-control" id="GloveColourKey" name="GloveColourKey" required>
                                                <option class="form-control" name="GloveColourKey" value=""> 颜色</option>
                                                <?php foreach ($M_GloveColour as $row) { ?>
                                                <option name="GloveColourKey" value="<?php echo $row['GloveColourCode'];?>"><?php echo $row['GloveColourName']; }?></option>
                                            </select>
                                        </div>
                                        <!-- LOT COUNT /.form-group -->

                                        <div class="form-group">
                                            <label>Lot 计数</label>
                                            <input type="number" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null" class="form-control" placeholder="Lot Count" id="lotcount" name="lotcount" required>
                                        </div>
                                        <!-- LOT NUMBER /.form-group -->

                                        <div class="form-group">
                                            <label>Lot 数字</label>
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
                                            <select class="form-control" id="GloveProductTypeKey" name="GloveProductTypeKey" required>
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
                                            <select class="form-control" id="GloveCodeKey" name="GloveCodeKey" required>
                                                <option class="form-control" name="GloveCodeKey" value="">产品代码</option>
                                            <?php foreach ($M_GloveCode as $row) { ?>
                                                <option name="GloveCodeKey" value="<?php echo $row['GloveCodeLong'];?>"><?php echo $row['GloveCodeLong']; }?></option>
                                            </select>
                                        </div>

                                        <!-- fg condition /.form-group -->

                                        <div class="form-group">

                                            <label>检查阶段</label>
                                            <select class="form-control" id="fgcondition" name="fgcondition" required>
                                              <option class="form-control" name="fgcondition" value="1">成品好</option>
                                              <option class="form-control" name="fgcondition" value="0">Finished 完成度总体不错 (组合尺寸)</option>
                                            </select>
                                        </div>


                                    </div>
                                    <!-- /.col -->

                                    <div class="form-group" style="padding-left: 40%; padding-right: 40%;">
                                      <label>Size</label>

                                          <div class="toolt"><sup><i class="fa fa-info-circle" aria-hidden="true"></i></sup>
                                              <span class="toolttext">仅在所有托盘具有相同尺寸时才选择*</span>
                                          </div>


                                      <select name="GloveSizeKey[]" class="form-control gloveSizePrimary"><option value="">尺寸</option><?php echo size_selection($connect,$M_GloveSize); ?></select>
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
                        <div class="panel-heading">预设托盘详细信息</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">

                            <!-- <div class="form-inline"> -->
                            <div class="table-repsonsive">
                              <form method="post" id="insert_formB">
                                <span id="error"></span>
                                <table class="table" id="item_table" style="bordered: none;">
                                    <tr>
                                        <th>尺寸</th>
                                        <th>样本大小视觉</th>
                                        <th>样本量 APT/WTT</th>
                                        <th>验收孔</th>
                                        <th>关键验收 NFG</th>
                                        <th>关键验收 NAG</th>
                                        <th>验收 Major</th>
                                        <th>验收 Minor</th>
                                        <th>托盘编号</th>
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

              newrow();

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


              $(".gloveSizePrimary").change(function() {
                //console.log(list);
                _selectedSize = $(".gloveSizePrimary").val();
                for (var i = 1; i <= list; i++) {
                //  console.log(i);
                  sizeNew = ".sizeRow"+i;
                  //console.log(sizeNew);
                  //console.log(_selectedSize);
                  if($(sizeNew).val() == ''){
                    $(sizeNew).val(_selectedSize);
                  }
                }
              });

                $(document).on('click', '.add', function(){
                  newrow();
                });


                function newrow(){
                  _selectedSize = $(".gloveSizePrimary").val();
                  if (list < 25){
                    list++;
                    var html = '';
                    html += '<tr>';
                    html += '<td width="100px"><select name="GloveSizeKey[]" class="form-control gloveSizeSub sizeRow'+list+'" required><option value="">Size</option><?php echo size_selection($connect,$M_GloveSize); ?></select></td>';
                    html += '<td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="visual[]" class="form-control sample'+list+'" placeholder="SS Visual" value="0" required></td>';
                    html += '<td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="sample[]" class="form-control sample'+list+'" placeholder="APT/WTT" value="0" required></td>';
                    html += '<td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accFFH[]" class="form-control accFFH'+list+'" placeholder="Acc FFH" value="0" required></td>';
                    html += '<td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accNFG[]" class="form-control accNFG'+list+'" placeholder="Acc Critical NFG" value="0" required></td>';
                    html += '<td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accNAG[]" class="form-control accNAG'+list+'" placeholder="Acc Critical NAG" value="0" required></td>';
                    html += '<td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accMajor[]" class="form-control accMajor'+list+'" placeholder="Acc Major" value="0" required></td>';
                    html += '<td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accMinor[]" class="form-control accMinor'+list+'" placeholder="Acc Minor" value="0" required></td>';
                    html += '<td><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="palletNumber[]" class="form-control palletNumber'+list+'" placeholder="Pallet Number" value="'+list+'"></td>';
                    if (list == 1){
                      html += '<td></td></tr>';
                    }else {
                      html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';

                    }
                    $('#item_table').append(html);
                    //console.log(_selectedSize);
                    sizeRow = ".sizeRow"+list;
                    // alert(sizeRow);
                    if(_selectedSize != ''){
                      $(sizeRow).val(_selectedSize);
                    }
                  }else{
                    alert("reached maximum number of pallets");
                  }

                }

                $(document).on('click', '.remove', function(){
                  list -- ;
                    $(this).closest('tr').remove();
                });

                $('#insert_formB').on('submit', function(event){
                    //event.preventDefault();
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
                    // else if ($('#Brand').val() === '') {
                    //   $('#Brand').focus();
                    //   error = 'Brand not inserted.';
                    // }
                    // else if ($('#Customer').val() === '') {
                    //   $('#Customer').focus();
                    //   error = 'Customer not inserted.';
                    // }
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

<?php
  include('../includes/database_connection.php');
  include('../includes/session.php');
  include('../includes/header.php');

  //If user role is not staff, redirect to home
  if($_SESSION['PositionKey']==2){
    header('Location: ../Home/home.php');
  }

  $Verify_ID = $_SESSION['BadgeID'];

  if(isset($_POST['search'])){

    $_SESSION['Ofactory'] = $_POST['factory'];
    $_SESSION['OsoNumber'] = $_POST['soNumber'];
    $_SESSION['OitemNumber']  = $_POST['itemNumber'];
    $_SESSION['OgloveSize'] = $_POST['gloveSize'];
    $_SESSION['OlotCount'] = $_POST['lotCount'];
    $_SESSION['OinspectionCount'] = $_POST['inspectionCount'];
    $_SESSION['Ofgcondition'] = $_POST['fgcondition'];
  }
  if((!isset($_POST['search'])) && (!isset($_POST['update']))){
    $_SESSION['Ofactory'] = NULL;
    $_SESSION['OsoNumber'] =NULL;
    $_SESSION['OitemNumber']  = NULL;
    $_SESSION['OgloveSize'] = NULL;
    $_SESSION['OlotCount'] = NULL;
    $_SESSION['OinspectionCount'] = NULL;
    $_SESSION['Ofgcondition'] = NULL;
  }

  $totalhole =0;
  $totalhole1 =0;
  $totalhole2 =0;
  $totalNFG =0;
  $totalNAG =0;
  $totalMajor =0;
  $totalMinor =0;

  $accHole1 =0;
  $accHole2 =0;
  $accNFG =0;
  $accNAG =0;
  $accMajor =0;
  $accMinor =0;

  $arr_aql = array();
  $arr_fd = array();
  $arr_UD = array();

?>

  <body>
    <div id="wrapper">
      <?php include('../navbar/navbar.php');?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
              <?php   if($_SESSION['PositionKey']==1){?>
                <h1 class="page-header">FG整体更新</h1>
              <?php }else{ ?>
                <h1 class="page-header">FG 整体批次</h1>
              <?php } ?>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="panel panel-primary" >
          <div class="panel-heading">
          批次详情
          </div>

          <div class="panel-body">

              <form method="POST" id="idOfForm">

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>工厂</label>
                      <?php
                        $smt = $connect->prepare('SELECT * From DimPlant');
                        $smt->execute();
                        $data = $smt->fetchAll();
                      ?>

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

                        <?php foreach($data as $row){?>
                        <option value="<?php echo $row['PlantName'];?>">
                          <?php echo $row['PlantName'];}?>
                        </option>
                      </select>
                    </div>
                    <!-- /.form-group -->



                    <div class="form-group">
                      <label>编号</label>

                      <input type="text" class="form-control" placeholder="SO Number" name="soNumber" id="SONumber"
                        type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength="10"
                        value="<?php
                        if($_SESSION['OsoNumber'] != ''){
                          echo $_SESSION['OsoNumber'];
                        }else{}
                          ?>" required>
                          <div id="checkk"></div>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>项目编号</label>
                      <input type="number" class="form-control" placeholder="Item Number" name="itemNumber" min="0"
                      value="<?php
                      if($_SESSION['OitemNumber'] != ''){
                        echo $_SESSION['OitemNumber'];
                      }else{}
                        ?>" required>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>手套尺寸</label>
                      <?php
                        $smt = $connect->prepare('SELECT * FROM M_GloveSize');
                        $smt->execute();
                        $data = $smt->fetchAll();
                      ?>

                      <select class="form-control" name="gloveSize" id="gloveSize">
                        <?php if($_SESSION['OgloveSize'] != ''){
                          ?>
                          <option value="<?php echo $_SESSION['OgloveSize'];?>"><?php echo $_SESSION['OgloveSize'];?></option>
                          <?php
                        }else{
                          ?>
                          <option value="">选择手套尺寸</option>
                          <option value="Combined Size">组合尺寸</option>

                          <?php
                        } ?>

                        <?php foreach ($data as $row){?>
                        <option value="<?php echo $row['GloveSizeCodeLong'];?>">
                          <?php echo $row['GloveSizeCodeLong'];}?>
                        </option>
                      </select>

                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-6 -->

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>批数</label>
                      <input type="number" class="form-control" name="lotCount" min="0"
                      value="<?php
                      if($_SESSION['OlotCount'] != ''){
                        echo $_SESSION['OlotCount'];
                      }else{}
                        ?>" required>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>检查阶段</label>
                      <select class="form-control" id="fgcondition" name="fgcondition" required>
                        <?php if($_SESSION['Ofgcondition'] != ''){
                          if($_SESSION['Ofgcondition'] == 0){
                            ?>
                            <option class="form-control" name="fgcondition" value="1">成品好</option>
                            <option class="form-control" name="fgcondition" value="0" selected>成品总体不错（综合尺码）</option>
                            <?php
                          }else{
                            ?>
                            <option class="form-control" name="fgcondition" value="1" selected>成品好</option>
                            <option class="form-control" name="fgcondition" value="0">成品总体不错（综合尺码）</option>
                            <?php
                          }
                        }else{
                          ?>
                        <option class="form-control" name="fgcondition" value="1">成品好</option>
                        <option class="form-control" name="fgcondition" value="0">成品总体不错（综合尺码）)</option>
                        <?php
                      }
                         ?>
                        </select>
                    </div>

                    <script>
                    document.getElementById("fgcondition").oninput = function() {
                      if ($('#fgcondition').val() == 0){
                        $("#gloveSize > [value='Combined Size']").attr("selected", "true");
                      }else{
                        $('#gloveSize').prop("required", true);
                      }

                    };

                    </script>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>检查次数</label>
                      <input type="number" class="form-control" placeholder="Inspection Count" name="inspectionCount" min="0"
                      value="<?php
                      if($_SESSION['OinspectionCount'] != ''){
                        echo $_SESSION['OinspectionCount'];
                      }else{}
                        ?>" required>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                    <button class="btn btn-success" name="search" id="mySearch" style="margin-top: 23px;">
                    搜索
                    </button>
                  </div>
                  <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-6 -->

                </div>
                <!-- /.row -->

              </form>
              <!-- /.form -->
              <?php   if($_SESSION['PositionKey']==1){?>
              <form method="POST">

                <div class="row">

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>整体 AQL</label>
                      <select class="form-control" id="P/f" name="overallAQL">
                        <option value="N/A"> N/A</option>
                        <option value="0.065"> 0.065</option>
                        <option value="0.10"> 0.10</option>
                        <option value="0.15"> 0.15</option>
                        <option value="0.25"> 0.25</option>
                        <option value="0.40"> 0.40</option>
                        <option value="0.65"> 0.65</option>
                        <option value="1.0"> 1.0</option>
                        <option value="1.5"> 1.5</option>
                        <option value="2.5"> 2.5</option>
                        <option value="4.0"> 4.0</option>
                        <option value="6.5"> 6.5</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-2 -->

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>UD 处置</label>
                      <?php
                        $smt = $connect->prepare('SELECT * FROM M_UDResult');
                        $smt->execute();
                        $data = $smt->fetchAll();
                      ?>

                      <select class="form-control" id="UDResultKey" name="UDResultKey">
                        <option value=""> N/A</option>
                        <?php foreach($data as $row){?>
                        <option name="UDResultKey" value="<?php echo $row['UDResultCode']; ?>">
                          <?php echo $row['UDResultCode'];}?>
                        </option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-2 -->

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>最终处置</label>
                      <select class="form-control" id="final_disposition" name="finalDisposition">
                        <option value=""> N/A</option>
                        <option value="PASS"> PASS</option>
                        <option value="FAIL"> FAIL </option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-2 -->

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>经核实</label>
                      <input type="text" class="form-control" placeholder="Badge ID" id="Verify_ID" name="verifiedBy">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-2 -->

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>验证日期</label>
                      <input type="date" class="form-control"  id="verify_date" name="verifyDate">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-2 -->

                  <div class="col-md-1">
                    <button class="btn btn-primary" name="update" id="myUpdate" style="margin-top:25px;" disabled>更新</button>
                  </div>
                  <!-- /.col-md-1 -->

                </div>
                <!-- /.row -->

              </form>
              <!-- /.form -->
              <?php  } ?>
              <div class="row">
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
                          <th rowspan="2">整体 AQL</th>
                          <th rowspan="2">UD 结果代码</th>
                          <th rowspan="2">数数</th>
                          <th rowspan="2">包装缺陷</th>
                          <th rowspan="2">整体内部物理测试</th>
                          <th rowspan="2">穿着和撕裂</th>
                          <th rowspan="2">整体物理尺寸测试</th>
                          <th rowspan="2">地段 ID</th>
                          <th rowspan="2">检查方式（徽章 ID）</th>
                          <th rowspan="2">检查方式（姓名）</th>
                          <th rowspan="2">验证方式（徽章 ID）</th>
                          <th rowspan="2">验证（名称）</th>
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
                      <tbody id="myTable">

                        <?php

                          if(isset($_POST['update'])){

                            $overallAQL = $_POST['overallAQL'];
                            $UDResultKey = $_POST['UDResultKey'];
                            $finalDisposition = $_POST['finalDisposition'];
                            $verifiedBy = $_POST['verifiedBy'];
                            $verifyDate = $_POST['verifyDate'];


                            if( $Verify_ID == $_SESSION['BadgeID']){
                              $totalhole =0;
                              $totalhole1 =0;
                              $totalhole2 =0;
                              $totalNFG =0;
                              $totalNAG =0;
                              $totalMajor =0;
                              $totalMinor =0;

                              $accHole1 =0;
                              $accHole2 =0;
                              $accNFG =0;
                              $accNAG =0;
                              $accMajor =0;
                              $accMinor =0;

                              $arr_i = 0;

                              $gloveSize_ = $_SESSION['OgloveSize'];

                              // echo $_SESSION['Ofactory']."<br />";
                              // echo $_SESSION['OsoNumber']."<br />";
                              // echo $_SESSION['OitemNumber']."<br />";
                              if($_SESSION['OgloveSize'] == 'Combined Size'){
                                $gloveSize_ = NULL;
                                echo "null";
                              }else{
                                $gloveSize_ = $_SESSION['OgloveSize'];
                                //echo $_SESSION['OgloveSize']."<br />";
                              }

                              // echo $_SESSION['OlotCount']."<br />";
                              // echo $_SESSION['OinspectionCount']."<br />";

                              $query="{CALL SP_Update_Overall_FG(?,?,?,?,?,?,?,?,?,?,?)}";

                              $stmt=$connect->prepare($query);
                              $stmt->bindParam(1, $_SESSION['Ofactory']);
                              $stmt->bindParam(2, $_SESSION['OsoNumber']);
                              $stmt->bindParam(3, $_SESSION['OitemNumber']);
                              $stmt->bindParam(4, $gloveSize_);
                              $stmt->bindParam(5, $_SESSION['OlotCount']);
                              $stmt->bindParam(6, $_SESSION['OinspectionCount']);
                              $stmt->bindParam(7, $overallAQL);
                              $stmt->bindParam(8, $UDResultKey);
                              $stmt->bindParam(9, $finalDisposition);
                              $stmt->bindParam(10, $verifiedBy);
                              $stmt->bindParam(11, $_SESSION['Ofgcondition']);
                              if($stmt->execute()){
                                $stmt->closeCursor();
                                echo '
                                <script>
                                console.log("updated")
                                </script>
                                ';
                              }

                        ?>

                          <div id="myModal" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">成功更新!</h4>
                                </div>
                                <div class="modal-body">
                                  <p><?php echo $stmt->rowCount() ." records updated successfully and verified by " .$_SESSION['BadgeID'];?></p>
                                  <?php
                                  date_default_timezone_set("Asia/Kuala_Lumpur");
                                  $query = "UPDATE T_Record_Master SET VerifiedDate = '".$verifyDate." ".date("h:i:sa")."' WHERE RecordID IN";
                                  $query .= "(";
                                  $query .= "SELECT RecordID FROM [dbo].[View_all_FG_Lot_Record] WHERE [Factory] = '".$_SESSION['Ofactory']."' ";
                                  $query .= "AND [SONumber] = '".$_SESSION['OsoNumber']."' ";
                                  $query .= "AND [SOItemNumber] = '".$_SESSION['OitemNumber']."' ";
                                  if($gloveSize_ != NULL){
                                  $query .= "AND [GloveSizeCodeLong] = '".$gloveSize_."' ";
                                  }
                                  $query .= "AND [LotCount] = '".$_SESSION['OlotCount']."' ";
                                  $query .= "AND [InspectionCount] = '".$_SESSION['OinspectionCount']."' ";
                                  $query .= "AND [FGCondition] = '".$_SESSION['Ofgcondition']."' ";
                                  $query .= ");";
                                  // echo $query;
                                  $stmt=$connect->prepare($query);
                                  $stmt->execute();
                                  $stmt->closeCursor();
                                   ?>
                                </div>
                              </div>
                            </div>
                          </div>

                        <?php

                        $query2="{CALL SP_View_Overall_FG(?,?,?,?,?,?,?)}";

                        $stmt2=$connect->prepare($query2);
                        $stmt2->bindParam(1, $_SESSION['Ofactory']);
                        $stmt2->bindParam(2, $_SESSION['OsoNumber']);
                        $stmt2->bindParam(3, $_SESSION['OitemNumber']);
                        $stmt2->bindParam(4, $gloveSize_);
                        $stmt2->bindParam(5, $_SESSION['OlotCount']);
                        $stmt2->bindParam(6, $_SESSION['OinspectionCount']);
                        $stmt2->bindParam(7, $_SESSION['Ofgcondition']);
                        $stmt2->execute();
                        while ($row=$stmt2->fetch()){
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
                            <td><?php echo $row['AcceptanceHoles1']; if(!empty($row['AcceptanceHoles1'])){$accHole1 += $row['AcceptanceHoles1'];}?></td>
                            <td><?php echo $row['AcceptanceHoles2']; if(!empty($row['AcceptanceHoles2'])){$accHole2 += $row['AcceptanceHoles2'];}?></td>
                            <td><?php echo $row['AcceptanceNonFunctionalCritical']; if(!empty($row['AcceptanceNonFunctionalCritical'])){$accNFG += $row['AcceptanceNonFunctionalCritical'];}?></td>
                            <td><?php echo $row['AcceptanceNonAcceptableCritical']; if(!empty($row['AcceptanceNonAcceptableCritical'])){$accNAG += $row['AcceptanceNonAcceptableCritical'];}?></td>
                            <td><?php echo $row['AcceptableMajorVisual']; if(!empty($row['AcceptableMajorVisual'])){$accMajor += $row['AcceptableMajorVisual'];}?></td>
                            <td><?php echo $row['AcceptableMinorVisual']; if(!empty($row['AcceptableMinorVisual'])){$accMinor += $row['AcceptableMinorVisual'];}?></td>
                            <td><?php echo $row['FinalDisposition']; $arr_fd[$arr_i] = $row['FinalDisposition'];?></td>
                            <!-- total holes is total barrier = total holes 1 + total holes 2 + total NFG-->
                            <td><?php echo $row['TotalHoles']; if(!empty($row['TotalHoles'])){$totalhole += $row['TotalHoles'];}?></td>
                            <?php if($row['TotalHoles1'] <= $row['AcceptanceHoles1']){ ?>
                            <td bgcolor="#7cff76">
                            <?php }else{ ?>
                            <td bgcolor="#ff6767"> <?php } ?>
                            <?php echo $row['TotalHoles1']; if(!empty($row['TotalHoles1'])){$totalhole1 += $row['TotalHoles1'];}?></td>

                            <?php if($row['TotalHoles2'] <= $row['AcceptanceHoles2']){ ?>
                            <td bgcolor="#7cff76">
                            <?php }else{ ?>
                            <td bgcolor="#ff6767"> <?php } ?>
                            <?php echo $row['TotalHoles2']; if(!empty($row['TotalHoles2'])){$totalhole2 += $row['TotalHoles2'];}?></td>


                            <?php if($row['TotalNonFunctionalCritical'] <= $row['AcceptanceNonFunctionalCritical']){ ?>
                            <td bgcolor="#7cff76">
                            <?php }else{ ?>
                            <td bgcolor="#ff6767"> <?php } ?>
                            <?php echo $row['TotalNonFunctionalCritical']; if(!empty($row['TotalNonFunctionalCritical'])){$totalNFG += $row['TotalNonFunctionalCritical'];}?></td>


                            <?php if($row['TotalNAG_CP'] <= $row['AcceptanceNonAcceptableCritical']){ ?>
                            <td bgcolor="#7cff76">
                            <?php }else{ ?>
                            <td bgcolor="#ff6767"> <?php } ?>
                            <?php echo $row['TotalNAG_CP']; if(!empty($row['TotalNAG_CP'])){$totalNAG += $row['TotalNAG_CP'];}?></td>


                            <?php if($row['TotalDefectMajorVisual'] <= $row['AcceptableMajorVisual']){ ?>
                            <td bgcolor="#7cff76">
                            <?php }else{ ?>
                            <td bgcolor="#ff6767"> <?php } ?>
                            <?php echo $row['TotalDefectMajorVisual']; if(!empty($row['TotalDefectMajorVisual'])){$totalMajor += $row['TotalDefectMajorVisual'];}?></td>


                            <?php if($row['TotalDefectMinorVisual'] <= $row['AcceptableMinorVisual']){ ?>
                            <td bgcolor="#7cff76">
                            <?php }else{ ?>
                            <td bgcolor="#ff6767"> <?php } ?>
                            <?php echo $row['TotalDefectMinorVisual']; if(!empty($row['TotalDefectMinorVisual'])){$totalMinor += $row['TotalDefectMinorVisual'];}?></td>


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
                            <td><?php echo $row['OverallAQL']; $arr_aql[$arr_i] = $row['OverallAQL'];?></td>
                            <td><?php echo $row['UDResultCode']; $arr_UD[$arr_i] = $row['UDResultCode'];?></td>
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


                          <?php

                        }

                        $query="{CALL SP_GetOverallPresetRecord(?,?,?,?,?,?,?)}";

                        $stmt2=$connect->prepare($query);
                        $stmt2->bindParam(1, $_SESSION['Ofactory']);
                        $stmt2->bindParam(2, $_SESSION['OsoNumber']);
                        $stmt2->bindParam(3, $_SESSION['OitemNumber']);
                        $stmt2->bindParam(4, $gloveSize_);
                        $stmt2->bindParam(5, $_SESSION['OlotCount']);
                        $stmt2->bindParam(6, $_SESSION['OinspectionCount']);
                        $stmt2->bindParam(7, $_SESSION['Ofgcondition']);
                        $stmt2->execute();
                        while ($row=$stmt2->fetch()){
                          ?>
                          <tr class="text-center">
                            <td>
                              <a class="btn btn-success" href="viewPage-Preset-FG.php?LotIDKey=<?php echo $row['LotIDKey'];?>&RecordID=<?php echo $row['RecordID'];?>" target="_blank">
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
                            <td></td>
                            <td><?php echo $row['InspectionCount'];?></td>
                            <td><?php echo $row['SampleSizeVisual'];?></td>
                            <td><?php echo $row['SampleSizeAPT/WTTLevel1'];?></td>
                            <td><?php echo $row['SampleSizeAPT/WTTLevel2'];?></td>
                            <td><?php echo $row['AcceptanceHoles1']; if(!empty($row['AcceptanceHoles1'])){$accHole1 += $row['AcceptanceHoles1'];}?></td>
                            <td></td>
                            <td><?php echo $row['AcceptanceNonFunctionalCritical']; if(!empty($row['AcceptanceNonFunctionalCritical'])){$accNFG += $row['AcceptanceNonFunctionalCritical'];}?></td>
                            <td><?php echo $row['AcceptanceNonAcceptableCritical']; if(!empty($row['AcceptanceNonAcceptableCritical'])){$accNAG += $row['AcceptanceNonAcceptableCritical'];}?></td>
                            <td><?php echo $row['AcceptableMajorVisual']; if(!empty($row['AcceptableMajorVisual'])){$accMajor += $row['AcceptableMajorVisual'];}?></td>
                            <td><?php echo $row['AcceptableMinorVisual']; if(!empty($row['AcceptableMinorVisual'])){$accMinor += $row['AcceptableMinorVisual'];}?></td>
                            <td></td>
                            <!-- total holes is total barrier = total holes 1 + total holes 2 + total NFG-->
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $row['Factory'];?></td>
                            <td><?php echo $row['GloveColourName'];?></td>
                            <td><?php echo date('d/m/Y',strtotime($row['RecordCreatedDateTime']));?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $row['InspectionPlanName'];?></td>
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
                            <td><?php echo $row['LotIDKey'];?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>

                        <?php
                        }

                          }else{
                        ?>

                        <div id="myModal" class="modal fade">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Unsuccessful Update!</h4>
                              </div>
                              <div class="modal-body">
                                <p>Verifier badge ID not matched with user account Badge ID.</p>
                              </div>
                            </div>
                          </div>
                        </div>

                        <?php
                            }
                          }
                        ?>

                      <?php

                        if(isset($_POST['search'])){

                          $factory = $_POST['factory'];
                          $_SESSION['Ofactory'] = $_POST['factory'];

                          $soNumber = $_POST['soNumber'];
                          $_SESSION['OsoNumber'] = $_POST['soNumber'];

                          $itemNumber  = $_POST['itemNumber'];
                          $_SESSION['OitemNumber']  = $_POST['itemNumber'];

                          if($_POST['gloveSize'] == 'Combined Size'){
                            $gloveSize = NULL;
                          }else{
                            $gloveSize = $_POST['gloveSize'];
                          }
                          //echo $_POST['gloveSize'];
                          //echo 'glovesize : '.$gloveSize;


                          $_SESSION['OgloveSize'] = $_POST['gloveSize'];

                          $lotCount = $_POST['lotCount'];
                          $_SESSION['OlotCount'] = $_POST['lotCount'];

                          $inspectionCount = $_POST['inspectionCount'];
                          $_SESSION['OinspectionCount'] = $_POST['inspectionCount'];

                          $fgcondition = $_POST['fgcondition'];
                          $_SESSION['Ofgcondition'] = $_POST['fgcondition'];

                          $totalhole =0;
                          $totalhole1 =0;
                          $totalhole2 =0;
                          $totalNFG =0;
                          $totalNAG =0;
                          $totalMajor =0;
                          $totalMinor =0;

                          $accHole1 =0;
                          $accHole2 =0;
                          $accNFG =0;
                          $accNAG =0;
                          $accMajor =0;
                          $accMinor =0;

                          $query="{CALL SP_View_Overall_FG(?,?,?,?,?,?,?)}";

                          $stmt=$connect->prepare($query);
                          $stmt->bindParam(1, $factory);
                          $stmt->bindParam(2, $soNumber);
                          $stmt->bindParam(3, $itemNumber);
                          $stmt->bindParam(4, $gloveSize);
                          $stmt->bindParam(5, $lotCount);
                          $stmt->bindParam(6, $inspectionCount);
                          $stmt->bindParam(7, $fgcondition);
                          $stmt->execute();
                          $arr_i = 0;
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
                        <td><?php echo $row['AcceptanceHoles1']; if(!empty($row['AcceptanceHoles1'])){$accHole1 += $row['AcceptanceHoles1'];}?></td>
                        <td><?php echo $row['AcceptanceHoles2']; if(!empty($row['AcceptanceHoles2'])){$accHole2 += $row['AcceptanceHoles2'];}?></td>
                        <td><?php echo $row['AcceptanceNonFunctionalCritical']; if(!empty($row['AcceptanceNonFunctionalCritical'])){$accNFG += $row['AcceptanceNonFunctionalCritical'];}?></td>
                        <td><?php echo $row['AcceptanceNonAcceptableCritical']; if(!empty($row['AcceptanceNonAcceptableCritical'])){$accNAG += $row['AcceptanceNonAcceptableCritical'];}?></td>
                        <td><?php echo $row['AcceptableMajorVisual']; if(!empty($row['AcceptableMajorVisual'])){$accMajor += $row['AcceptableMajorVisual'];}?></td>
                        <td><?php echo $row['AcceptableMinorVisual']; if(!empty($row['AcceptableMinorVisual'])){$accMinor += $row['AcceptableMinorVisual'];}?></td>
                        <td><?php echo $row['FinalDisposition']; $arr_fd[$arr_i] = $row['FinalDisposition'];?></td>
                        <!-- total holes is total barrier = total holes 1 + total holes 2 + total NFG-->
                        <td><?php echo $row['TotalHoles']; if(!empty($row['TotalHoles'])){$totalhole += $row['TotalHoles'];}?></td>
                        <?php if($row['TotalHoles1'] <= $row['AcceptanceHoles1']){ ?>
                        <td bgcolor="#7cff76">
                        <?php }else{ ?>
                        <td bgcolor="#ff6767"> <?php } ?>
                        <?php echo $row['TotalHoles1']; if(!empty($row['TotalHoles1'])){$totalhole1 += $row['TotalHoles1'];}?></td>

                        <?php if($row['TotalHoles2'] <= $row['AcceptanceHoles2']){ ?>
                        <td bgcolor="#7cff76">
                        <?php }else{ ?>
                        <td bgcolor="#ff6767"> <?php } ?>
                        <?php echo $row['TotalHoles2']; if(!empty($row['TotalHoles2'])){$totalhole2 += $row['TotalHoles2'];}?></td>


                        <?php if($row['TotalNonFunctionalCritical'] <= $row['AcceptanceNonFunctionalCritical']){ ?>
                        <td bgcolor="#7cff76">
                        <?php }else{ ?>
                        <td bgcolor="#ff6767"> <?php } ?>
                        <?php echo $row['TotalNonFunctionalCritical']; if(!empty($row['TotalNonFunctionalCritical'])){$totalNFG += $row['TotalNonFunctionalCritical'];}?></td>


                        <?php if($row['TotalNAG_CP'] <= $row['AcceptanceNonAcceptableCritical']){ ?>
                        <td bgcolor="#7cff76">
                        <?php }else{ ?>
                        <td bgcolor="#ff6767"> <?php } ?>
                        <?php echo $row['TotalNAG_CP']; if(!empty($row['TotalNAG_CP'])){$totalNAG += $row['TotalNAG_CP'];}?></td>


                        <?php if($row['TotalDefectMajorVisual'] <= $row['AcceptableMajorVisual']){ ?>
                        <td bgcolor="#7cff76">
                        <?php }else{ ?>
                        <td bgcolor="#ff6767"> <?php } ?>
                        <?php echo $row['TotalDefectMajorVisual']; if(!empty($row['TotalDefectMajorVisual'])){$totalMajor += $row['TotalDefectMajorVisual'];}?></td>


                        <?php if($row['TotalDefectMinorVisual'] <= $row['AcceptableMinorVisual']){ ?>
                        <td bgcolor="#7cff76">
                        <?php }else{ ?>
                        <td bgcolor="#ff6767"> <?php } ?>
                        <?php echo $row['TotalDefectMinorVisual']; if(!empty($row['TotalDefectMinorVisual'])){$totalMinor += $row['TotalDefectMinorVisual'];}?></td>


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
                        <td><?php echo $row['OverallAQL']; $arr_aql[$arr_i] = $row['OverallAQL'];?></td>
                        <td><?php echo $row['UDResultCode']; $arr_UD[$arr_i] = $row['UDResultCode'];?></td>
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
                    <?php
                    $arr_i ++;
                  }

                    $query="{CALL SP_GetOverallPresetRecord(?,?,?,?,?,?,?)}";

                    $stmt=$connect->prepare($query);
                    $stmt->bindParam(1, $factory);
                    $stmt->bindParam(2, $soNumber);
                    $stmt->bindParam(3, $itemNumber);
                    $stmt->bindParam(4, $gloveSize);
                    $stmt->bindParam(5, $lotCount);
                    $stmt->bindParam(6, $inspectionCount);
                    $stmt->bindParam(7, $fgcondition);
                    $stmt->execute();
                    while ($row=$stmt->fetch()){
                      ?>
                      <tr class="text-center">
                        <td>
                          <a class="btn btn-success" href="viewPage-Preset-FG.php?LotIDKey=<?php echo $row['LotIDKey'];?>&RecordID=<?php echo $row['RecordID'];?>" target="_blank">
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
                        <td></td>
                        <td><?php echo $row['InspectionCount'];?></td>
                        <td><?php echo $row['SampleSizeVisual'];?></td>
                        <td><?php echo $row['SampleSizeAPT/WTTLevel1'];?></td>
                        <td><?php echo $row['SampleSizeAPT/WTTLevel2'];?></td>
                        <td><?php echo $row['AcceptanceHoles1'];$accHole1 += $row['AcceptanceHoles1'];?></td>
                        <td></td>
                        <td><?php echo $row['AcceptanceNonFunctionalCritical'];$accNFG += $row['AcceptanceNonFunctionalCritical'];?></td>
                        <td><?php echo $row['AcceptanceNonAcceptableCritical'];$accNAG += $row['AcceptanceNonAcceptableCritical'];?></td>
                        <td><?php echo $row['AcceptableMajorVisual'];$accMajor += $row['AcceptableMajorVisual'];?></td>
                        <td><?php echo $row['AcceptableMinorVisual'];$accMinor += $row['AcceptableMinorVisual'];?></td>
                        <td></td>
                        <!-- total holes is total barrier = total holes 1 + total holes 2 + total NFG-->
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $row['Factory'];?></td>
                        <td><?php echo $row['GloveColourName'];?></td>
                        <td><?php echo date('d/m/Y',strtotime($row['RecordCreatedDateTime']));?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $row['InspectionPlanName'];?></td>
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
                        <td><?php echo $row['LotIDKey'];?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>

                    <?php
                    $arr_i ++;
                    }
                  } ?>
                      </tbody>
                      <tfoot>
                        <tr class="text-center">
                          <td colspan="14"></td>
                          <td style="text-align: right;">Total Overall:</td>
                          <!-- total holes is total barrier = total holes 1 + total holes 2 + total NFG-->
                          <td><?php echo $accHole1;?></td>
                          <td><?php echo $accHole2;?></td>
                          <td><?php echo $accNFG;?></td>
                          <td><?php echo $accNAG;?></td>
                          <td><?php echo $accMajor;?></td>
                          <td><?php echo $accMinor;?></td>
                          <td><?php $arr_freq = array_count_values($arr_fd); arsort($arr_freq); $new_arr = array_keys($arr_freq); echo $new_arr[0];?></td>
                          <td><?php echo $totalhole;?></td>
                          <td><?php echo $totalhole1;?></td>
                          <td><?php echo $totalhole2;?></td>
                          <td><?php echo $totalNFG;?></td>
                          <td><?php echo $totalNAG;?></td>
                          <td><?php echo $totalMajor;?></td>
                          <td><?php echo $totalMinor;?></td>
                          <td  colspan="11"><?php //echo $row['GloveWeightAverage'];?></td>
                          <td><?php $arr_freq = array_count_values($arr_aql); arsort($arr_freq); $new_arr = array_keys($arr_freq); echo $new_arr[0];?></td>

                          <td><?php $arr_freq = array_count_values($arr_UD); arsort($arr_freq); $new_arr = array_keys($arr_freq); echo $new_arr[0];?></td>
                          <td  colspan="10"></td>
                        </tr>
                      </tfoot>

                    </table>

                  </div>
                  <!-- /.table-responsive -->

                </div>
                <!-- /.col-md-12 -->
              </div>
              <!-- /.row -->

          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

      </div>
      <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables-plugins/dataTables.bootstrap.js"></script>
    <script src="../../dist/js/sb-admin-2.js"></script>
    <script src="../../vendor/datatables/datatables-demo.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" language="javascript" src="../../../../../examples/resources/demo.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="../jquery.datatables.yadcf.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <script src="../jquery.dataTables.yadcf.js"></script>
    <!-- This file affects the navbar -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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

    <script>

      $(document).ready(function(){

        $('#Verify_ID').keyup(function(){
          selectVal = $('#Verify_ID').val();

          if(selectVal == ''){
            $('#myUpdate').prop("disabled", true);
          }
          else{
            $('#myUpdate').prop("disabled", false);
          }
        })

        $("#myModal").modal('show');

        $('#tableID').dataTable({
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
  </body>
</html>

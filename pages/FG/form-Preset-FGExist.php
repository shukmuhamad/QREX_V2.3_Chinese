<?php
  ini_set('memory_limit', '1024M');
  include('../includes/database_connection.php');
  include('../includes/session.php');
  include('../includes/header.php');

  //If user role is general, redirect to home
  if($_SESSION['PositionKey']==2){
    header('Location: ../Home/home.php');
  }
?>

  <body>
    <?php
      if(isset($_POST['initialSubmit'])){

        $factory = $_POST['factory']!='' ? $_POST['factory'] : NULL;
        $soNumber = $_POST['soNumber']!='' ? $_POST['soNumber'] : NULL;
        $itemNumber = $_POST['itemNumber']!='' ? $_POST['itemNumber'] : NULL;
        $size = $_POST['size']!='' ? $_POST['size'] : NULL;
        $lotCount = $_POST['lotCount']!='' ? $_POST['lotCount'] : NULL;
        $palletNumber = $_POST['palletNumber']!='' ? $_POST['palletNumber'] : NULL;

        $_SESSION['fForm'] = $factory;
        $_SESSION['soForm'] = $soNumber;
        $_SESSION['itemForm'] = $itemNumber;
        $_SESSION['sizeForm'] = $size;
        $_SESSION['lotForm'] = $lotCount;
        $_SESSION['palletForm'] = $palletNumber;

        $q = "{CALL SP_CheckPresetRecord(?,?,?,?,?,?)}";

        $s = $connect->prepare($q);
        $s->bindParam(1, $factory);
        $s->bindParam(2, $soNumber);
        $s->bindParam(3, $itemNumber, PDO::PARAM_INT);
        $s->bindParam(4, $size);
        $s->bindParam(5, $lotCount, PDO::PARAM_INT);
        $s->bindParam(6, $_SESSION['palletForm']);
        $s->execute();
        $r = $s->fetch();
        $result = $r['EXISTS'];

        if($result==1){
          //Assign LotIDKey to variable
        header('Location: form-FG-Frame.php');


          //
          //
          //
          // //If pallet exist, redirect to full form page
          // echo '<script>$(location).attr("href", "formfg.php?LotID='.$lotID.'&Record='.$RecordID.'")</script>';
        }else{
          //Else call modal
    ?>

          <!-- Modal No Pallet-->
          <div class="modal fade" id="modalNoPallet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Pallet Not Found!</h4>
                </div>
                <div class="modal-body">
                  <div class="alert alert-danger">
                    <strong>Incorrect information or the pallet has already been filled.</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.modal -->

    <?php
        }//Else row != 1
      }//Else !isset
    ?>
    <div id="wrapper">
      <?php include('../navbar/navbar.php');?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">FG Form</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- Initial Form -->
        <div class="panel panel-primary" id="initialForm">
          <div class="panel-heading">
            托盘详情
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">

            <form method="post">

              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    $query = $connect->prepare("SELECT * FROM DimPlant");
                    $query->execute();
                    $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <label>工厂</label>
                    <select name="factory" class="form-control fstdropdown-select" style="width: 100%;">
                      <option selected="selected" value="">选择工厂</option>
                      <?php foreach ($fetch as $row) { ?>
                      <option name="factory" value="<?php echo $row['PlantName'];?>"><?php echo $row['PlantName']; }?></option>
                    </select>
                  </div>
                  <!-- /.form-group -->

                  <div class="form-group">
                    <label>SO 数字</label>
                    <input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength="10" name="soNumber" class="form-control" placeholder="SO 数字" id="SONumber">
                    <div id="checkk"></div>
                  </div>
                  <!-- /.form-group -->

                  <div class="form-group">
                    <label>项目编号</label>
                    <input type="number" name="itemNumber" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null;" class="form-control" placeholder="项目编号">
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <?php
                function size_selection($connect)
                {
                  $output = '';
                  $query = "SELECT * FROM M_GloveSize";
                  $statement = $connect->prepare($query);
                  $statement->execute();
                  $result = $statement->fetchAll();
                  foreach($result as $row)
                  {
                    $output .= '<option value="'.$row["GloveSizeCodeLong"].'">'.$row["GloveSizeCodeLong"].'</option>';
                  }
                  return $output;
                }

                ?>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>尺寸</label>
                    <select name="size" class="form-control fstdropdown-select" style="width: 100%;">
                      <option selected="selected" value="">选择大小</option>
                      <?php echo size_selection($connect); ?>
                    </select>
                  </div>
                  <!-- /.form-group -->

                  <div class="form-group">
                    <label>Lot 计数</label>
                    <input type="number" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null;" name="lotCount" class="form-control" placeholder="Lot 计数">
                  </div>
                  <!-- /.form-group -->

                  <div class="form-group">
                    <label>托盘编号</label>
                    <input type="number" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null;" name="palletNumber" class="form-control" placeholder="托盘编号">
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->

              </div>
              <!-- /.row -->

              <center><button type="submit" name="initialSubmit" class="btn btn-primary">好的</button></center>

            </form>
            <!-- /.form -->

          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->


      </div>
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
    <!-- Script to check Existence of Batch Number -->
    <script type="text/javascript" src="../../jquery-1.11.3-jquery.min.js"></script>

    <script src="../function.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

    <script type="text/javascript">
      //No pallet modal
      $("#modalNoPallet").modal("show");

      $(document).ready(function(){



        $(".digit").on("keypress keyup blur",function (event) {
          $(this).val($(this).val().replace(/[^\d].+/, ""));
          if ((event.which < 48 || event.which > 57)) {
          event.preventDefault();
          }
        });

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
  </body>
</html>

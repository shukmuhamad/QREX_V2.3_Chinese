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

        <?php


            $factory = $_SESSION['fForm'];
            $soNumber = $_SESSION['soForm'];
            $itemNumber = $_SESSION['itemForm'];
            $size = $_SESSION['sizeForm'];
            $lotCount = $_SESSION['lotForm'];
            $palletNumber = $_SESSION['palletForm'];




            $q = "{CALL SP_CheckPresetRecord(?,?,?,?,?,?)}";

            $s = $connect->prepare($q);
            $s->bindParam(1, $factory);
            $s->bindParam(2, $soNumber);
            $s->bindParam(3, $itemNumber, PDO::PARAM_INT);
            $s->bindParam(4, $size);
            $s->bindParam(5, $lotCount, PDO::PARAM_INT);
            $s->bindParam(6, $palletNumber);
            $s->execute();
            $r = $s->fetch();
            $result = $r['EXISTS'];


            if($result==1){
              include('form-FG-Body.php');
              include('transaction-FG.php');


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
                      <h4 class="modal-title">未找到托盘!</h4>
                    </div>
                    <div class="modal-body">
                      <div class="alert alert-danger">
                        <strong>信息不正确或托盘已经装满.</strong>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.modal -->

        <?php
            }//Else row != 1

        ?>



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
  </body>
</html>

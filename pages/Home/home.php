<?php
  include('../includes/database_connection.php');
  include('../includes/session.php');	
  include('../includes/header.php');
?>

  <body>
    <div id="wrapper">
      <?php include('../navbar/navbar.php');?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">QREX 主页</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="card mb-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-list-alt fa-fw"></i>
              SFG & FG 验货记录
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <center><img src="../../picture/top glove.png" width="100%" height="350"/></center>
            </div>
            <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
        </div>
        <!-- /.card -->
          
      </div>
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="../../vendor/raphael/raphael.min.js"></script>
    <script src="../../vendor/morrisjs/morris.min.js"></script>
    <script src="../../data/morris-data.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>
  </body>
</html>

<?php
  include('../includes/header.php');
  include('../includes/database_connection.php');
?>

  <body>
    <nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
      <div  class = "topnav-right">
        <div class = "navbar-header">
          <a class = "navbar-brand" >QUALITY RECORD E SYSTEM (QREX)</a>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">

          <div class="login-panel panel panel-default">
            <div class="panel-heading">
              <center><h3 class="panel-title">登录以开始您的会话</h3></center>
            </div>
            <div class="panel-body">
              <form role="form" method="post">
                <fieldset>
                  <div class="form-group input-group">
                    <input class="form-control" placeholder="Badge ID" name="BadgeID" type="text" required>
                    <span class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </span>
                  </div>
                  <div class="form-group input-group">
                    <input class="form-control" placeholder="请输入登录密码" name="Password" type="password" value="" required>
                    <span class="input-group-addon">
                      <i class="fa fa-lock"></i>
                    </span>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input name="remember" type="checkbox" value="Remember Me">永久登录
                    </label>
                  </div>
                  <!-- Change this to a button or input when using this as a form -->
                  <button name = "submit" class = "form-control btn btn-primary btn-block">
                    <i class="glyphicon glyphicon-log-in"></i> 
                    登录
                  </button>
                </fieldset>
              </form>

              <?php
                if(isset($_POST['submit'])) {
                  
                  $BadgeID = $_POST['BadgeID'];
                  $Password = $_POST['Password'];
                            
                  $query = "SELECT * from M_UserInfo where Password=? AND BadgeID=?";
                  $stmt = $connect->prepare($query);
                  
                  $stmt->bindParam(1, $Password);
                  $stmt->bindParam(2, $BadgeID);
                  $stmt->execute();
                  $result = $stmt->fetchAll();
                        
                  $row = $stmt->rowCount();
                  
                  if($row == 1){
                    session_start();

                    $_SESSION['BadgeID']=$result[0]['BadgeID'];
                    $_SESSION['Name']=$result[0]['Name'];
                    $_SESSION['PositionKey']=$result[0]['PositionKey'];

                    header('Location: ../Home/home.php');
                  }else{
                    echo "<center><label style = 'color:red;'>Wrong Badge ID or Password!</label></center>";
                  }           
                }
              ?>

            </div>
            <!-- /.panel-body -->
          </div>
          <!-- /.login-panel -->

        </div>
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

  </body>
</html>

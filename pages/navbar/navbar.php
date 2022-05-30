<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <a class="navbar-brand" href="../Home/home.php">QUALITY RECORD E SYSTEM (QREX)</a>
  </div>
  <!-- /.navbar-header -->
  <ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
      <?php echo $_SESSION['Name'];?>
    </li>
    <!-- /.dropdown -->
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
      </a>
      <ul class="dropdown-menu dropdown-user">
          <li><a href="../profile/userprofile.php"><i class="fa fa-user fa-fw"></i> 用户资料</a>
        </li>
        <li class="divider"></li>
        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i>登出</a>
        </li>
      </ul>
      <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
  </ul>
  <!-- /.navbar-top-links -->
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">

        <?php
          //PHP to include relevant sidebar links according to user role
          if($_SESSION['PositionKey']==1){
            include('navbarStaff.php');
          }elseif($_SESSION['PositionKey']==0){
            include('navbarWorker.php');
          }elseif($_SESSION['PositionKey']==2){
            include('navbarGeneral.php');
          }
        ?>

      </ul>
    </div>
    <!-- /.sidebar-collapse -->
  </div>
  <!-- /.navbar-static-side -->
</nav>

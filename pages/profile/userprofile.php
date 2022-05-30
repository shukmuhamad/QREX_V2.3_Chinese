<?php
		include('../includes/database_connection.php');
		include('../includes/header.php');
		include('../includes/session.php');
		//initialize so no.
		//$_SESSION['SO_num']="";

		$session_BadgeID = $_SESSION['BadgeID'];
		// echo $session_BadgeID;

		$query = "SELECT TOP (1) BadgeID, Name, PositionKey, PositionFullText, Password FROM M_UserInfo WHERE BadgeID = ?";

	  $stmt = $connect->prepare($query);
		$stmt->bindParam(1, $session_BadgeID);
	  $stmt->execute();
		$UserDetails = $stmt -> fetch();

		// print_r($UserDetails);
		// echo $UserDetails['Name'];
?>

<html lang="en">
<body>
		<div id="wrapper">
				<!-- Navigation -->
				<?php include('../navbar/navbar.php');?>

		<div id="page-wrapper">
				<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">QREX update profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Update Profile
                        </div>
                         <div class="panel-body">
                         <div class="row">
                         <div class="col-lg-6">
                            </br>



									<form role="form" method ="post">
                                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                              <tr >
                      					<th class="info">ID</th>
                      					<td><input class="form-control" name="badge_id" id="badge_id"  placeholder="<?php echo $UserDetails['BadgeID'];?>" disabled></td>
                    					</tr>
                              <tr >
                      					<th class="info">NAME</th>
                      					<td><input class="form-control" name="name" id="name" value="<?php echo $UserDetails['Name'];?>" required></td>
                    					</tr>
                              <tr >
                      					<th class="info">OLD PASSWORD</th>
                      					<td><input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Old Password" required></td>
                    					</tr>
															<tr >
                      					<th class="info">NEW PASSWORD</th>
                      					<td><input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New Password" required></td>
                    					</tr>


                  			       </table>



                              <center><button name="update" class="btn btn-success">UPDATE</button> </center><br>

                                        <!--<a href="production_detail.php" class="btn btn-primary"> Next</a>-->

                                       </form>

                     </div>
		</div>
        </div>
      </div>
    </div>

<?php
	if(ISSET($_POST['update'])){
		$name = $_POST['name'];
		$oldPassword = $_POST['oldPassword'];
		$newPassword = $_POST['newPassword'];

		if($oldPassword = $UserDetails['Password']){

			$query = "UPDATE M_UserInfo SET Password = ?, Name = ? WHERE BadgeID = ? AND Name = ? AND PositionKey = ? AND PositionFullText = ? AND Password = ?";

		  $stmt = $connect->prepare($query);
			$stmt->bindParam(1, $newPassword);
			$stmt->bindParam(2, $name);
			$stmt->bindParam(3, $UserDetails['BadgeID']);
			$stmt->bindParam(4, $UserDetails['Name']);
			$stmt->bindParam(5, $UserDetails['PositionKey']);
			$stmt->bindParam(6, $UserDetails['PositionFullText']);
			$stmt->bindParam(7, $oldPassword);
		  $stmt->execute();
			echo"<script>alert('You have successfully Updated your profile!');
			 			window.location='userprofile.php';
							</script>";
		}



	}
?>

 									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">




                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


        </div>
        <!-- /#page-wrapper -->

    </div>


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

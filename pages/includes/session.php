<!-- Session -->
<?php
  session_start();
  if(!isset($_SESSION['BadgeID'])){
    //If session Badge ID is not set, redirect to login page
    session_destroy();
    header('Location: ../Login/index.php');
  }
?>

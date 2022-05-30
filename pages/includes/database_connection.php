<?php
  try{
    // $connect = new PDO("sqlsrv:Server=172.16.10.202; Database=QAPQC02", "QA_ITUser01", "projects01");
    // $connect = new PDO("sqlsrv:Server=10.39.0.179; Database=QAPQC01", "qapqc", "qapqc01");
    $connect = new PDO("sqlsrv:Server=172.16.10.61\QAPQC; Database=QAPQC02", "pqcapp", "TGQApqcQrex");
    //$connect = new PDO("mysql:host=localhost;dbname=database", 'username', 'password');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(Exception $e){
    die(print_r($e->getMessage()));
  }
?>

<?php

    include('../includes/database_connection.php');
 include('../includes/session.php');

 date_default_timezone_set('Asia/Kuala_Lumpur');
 $datecreated = date('Y-m-d h:i:s ', time());
$UserID = $_SESSION['BadgeID'];

 $dataA = array();
 $dataB = array();


 $dataA = $_POST["form_dataA"];
 $dataB = $_POST["form_dataB"];

 // print_r($dataA);
 // print_r($dataB);

 $size = array();
 $ssVisual = array();
 $sampleSize = array();
 $accFFH = array();
 $accNFG = array();
 $accNAG = array();
 $accMajor = array();
 $accMinor = array();
 $palletNumber = array();
 $palletID = array();

// echo $dataB[8]["value"];
// -------------dataA into array -------------------------


    $factoryName = $dataA[0]["value"];
    $SoNumber = $dataA[1]["value"];
    $itemNumber = $dataA[2]["value"];
    $Brand = $dataA[3]["value"];
    $Customer = $dataA[4]["value"];
    $InspectionPlan = $dataA[5]["value"];
    $Colour = $dataA[6]["value"];
    $lotCount = $dataA[7]["value"];
    $lotNumber = $dataA[8]["value"];
    $ProductType = $dataA[9]["value"];
    $GloveCode = $dataA[10]["value"];
    $fgcondition = $dataA[11]["value"];

    $_SESSION['prev_fac'] = $factoryName;
    $_SESSION['prev_sonum'] = $SoNumber;
    $_SESSION['prev_itemnum'] = $itemNumber;
    $_SESSION['prev_brand'] = $Brand;
    $_SESSION['prev_customer'] = $Customer;
    $_SESSION['prev_category'] = $InspectionPlan;
    $_SESSION['prev_colour'] = $Colour;
    $_SESSION['prev_lotcount'] = $lotCount;
    $_SESSION['prev_lotnum'] = $lotNumber;
    $_SESSION['prev_product'] = $ProductType;
    $_SESSION['prev_code'] = $GloveCode;



    echo "<br/> Factory:".$factoryName."<br/>";
    echo "<br/> SO Number:".$SoNumber."<br/>";
    echo "<br/> Item Number:".$itemNumber."<br/>";
    echo "<br/> Brand:".$Brand."<br/>";
    echo "<br/> Customer:".$Customer."<br/>";
    echo "<br/> Inspection Plan:".$InspectionPlan."<br/>";
    echo "<br/> Colour:".$Colour."<br/>";
    echo "<br/> Lot count:".$lotCount."<br/>";
    echo "<br/> Lot Number:".$lotNumber."<br/>";
    echo "<br/> Glove Code:".$GloveCode."<br/>";
    echo "<br/> Product type:".$ProductType."<br/>";


// -------------dataB into array -------------------------
     $totalpallet = 0;
     $limit = 9;
     $n = 0;
     $i = 0;
     $j =0;
     foreach ( $dataB as $result){
       if($i == $limit){
                 $i = 0;
                 $n++;
            }else{  }
        if($i == 0){
              $size[$n] = $dataB[$j]["value"];
            }elseif ($i == 1) {
              $ssVisual[$n] = $dataB[$j]["value"];
            }elseif ($i == 2) {
              $sampleSize[$n] = $dataB[$j]["value"];
            }elseif ($i == 3) {
              $accFFH[$n] = $dataB[$j]["value"];
            }elseif ($i == 4) {
              $accNFG[$n] = $dataB[$j]["value"];
            }elseif ($i == 5) {
              $accNAG[$n] = $dataB[$j]["value"];
            }elseif ($i == 6) {
              $accMajor[$n] = $dataB[$j]["value"];
            }elseif ($i == 7) {
              $accMinor[$n] = $dataB[$j]["value"];
            }elseif ($i == 8) {
              $palletNumber[$n] = $dataB[$j]["value"];
            }else{  }
       $i++;
       $j++;

     }
     $totalpallet = $n+1;

     echo "<br/>";
     echo "<br/>";
     echo "size: ";
     print_r($size);
     echo "<br/>";
     echo "samplesize: ";
     print_r($sampleSize);
     echo "<br/>";
     echo "accffh: ";
     print_r($accFFH);
     echo "<br/>";
     echo "accNAG: ";
     print_r($accNAG);
     echo "<br/>";
     echo "accNFG: ";
     print_r($accNFG);
     echo "<br/>";
     echo "accMajor: ";
     print_r($accMajor);
     echo "<br/>";
     echo "accMinor: ";
     print_r($accMinor);
     echo "<br/>";
     echo "palletnumber: ";
     print_r($palletNumber);
     echo "<br/>";
     echo "<br/>";
     echo "Total Pallet:".$totalpallet;

     echo "<br />";

//----------------------- create record in database -------------------------



//
//
//                 $query = "{CALL insert_val(?,?,?)}";
//           $stmt = $connect->prepare($query);
//
//           $stmt->bindParam(1, $size);
//           $stmt->bindParam(2, $target);
//           $stmt->bindParam(3, $unit);
//           $stmt->execute();
//
//                 echo "Data Inserted";


for ($x = 0; $x < $totalpallet; $x++) {




  $Plant = $factoryName;
  echo $Plant;
  echo "<br>";

  $SONumber = $SoNumber;
  echo $SONumber;
  echo "<br>";

  $SOItemNumber = $itemNumber;
  echo $SOItemNumber."<br>";

  $Customer = $Customer;
  echo $Customer."<br>";

  $Brand = $Brand;
  echo $Brand."<br>";

  $LotNumber = $lotNumber;
  echo $LotNumber."<br>";

  $LotCount = $lotCount;
  echo $LotCount."<br>";

  $PalletNumber = $palletNumber[$x];//----------------------
  echo $PalletNumber."<br>";

  $GloveCode = $GloveCode;
  echo $GloveCode."<br>";

  $GloveColour = $Colour;
  echo $GloveColour."<br>";

  $GloveProductType = $ProductType;
  echo $GloveProductType."<br>";

  $GloveSize = $size[$x];
  echo $GloveSize."<br>";

  $InspectionUserID = $UserID;
  echo $InspectionUserID."<br>";

  $InspectionPlan = $InspectionPlan;
  echo $InspectionPlan."<br>";

  $InspectionCount = '1';
  echo $InspectionCount."<br>";

  $RecordCreatedDateTime =  $datecreated;
  echo $RecordCreatedDateTime."<br>";

  $RecordStatusFlag = '0';
  echo $RecordStatusFlag."<br>";


  $AQL = array(
    array(
      "AQLDescription"=>"AcceptanceMinor",
      "AQLValue"=>$accMinor[$x]//--------
    )
    ,array(
      "AQLDescription"=>"AcceptanceMajor",
      "AQLValue"=>$accMajor[$x]
    )
    ,array(
      "AQLDescription"=>"AcceptanceHoles1",
      "AQLValue"=>$accFFH[$x]
    )
    ,array(
      "AQLDescription"=>"AcceptanceNFG",
      "AQLValue"=>$accNFG[$x]
    )
    ,array(
      "AQLDescription"=>"AcceptanceNAG_CP",
      "AQLValue"=>$accNAG[$x]
    )

  );


  $AQLResult_JSON = json_encode($AQL);
  echo "AQL";
  echo "<br>";
  echo $AQLResult_JSON;

  echo "<br>";
  echo "<br>";
  echo "<br>";

  $SampleSizeResult=array(
    array(
      "SampleSize"=>'SampleSizeVisual',
      "SampleSizeValue"=>$ssVisual[$x]
    ),
    array(
      "SampleSize"=>'SampleSizeAPT/WTTLevel1',
      "SampleSizeValue"=>$sampleSize[$x]
    ),
  );


  $SampleSizeResult_JSON = json_encode($SampleSizeResult);

  echo "SampleSizeResult";
  echo "<br>";
  echo $SampleSizeResult_JSON;
  echo "<br>";
  echo "<br>";
  echo "<br>";

  $q = "{CALL SP_CheckPresetRecord(?,?,?,?,?,?)}";
    $s = $connect->prepare($q);
    $s->bindParam(1, $Plant);
    $s->bindParam(2, $SONumber);
    $s->bindParam(3, $SOItemNumber, PDO::PARAM_INT);
    $s->bindParam(4, $GloveSize);
    $s->bindParam(5, $LotCount, PDO::PARAM_INT);
    $s->bindParam(6, $PalletNumber);
    $s->execute();
    $r = $s->fetch();
    $resultExist = $r['EXISTS'];
    $s->closeCursor();


  $q = "IF EXISTS(SELECT 1  FROM T_Lot_FG
        WHERE PlantKey = (
        SELECT PlantKey FROM [DimPlant] WHERE PlantName = ?
        )AND SONumber = ? AND SOItemNumber = ?
        AND GloveSizeKey = (
        SELECT [GloveSizeKey] FROM [M_GloveSize] WHERE [GloveSizeCodeLong]=?
        )AND LotCount = ? AND PalletNumber = ?)
        BEGIN
          SELECT 1 AS 'EXISTS'
        END
        ELSE
        BEGIN
          SELECT 0 AS 'EXISTS'
        END";
    $s = $connect->prepare($q);
    $s->bindParam(1, $Plant);
    $s->bindParam(2, $SONumber);
    $s->bindParam(3, $SOItemNumber, PDO::PARAM_INT);
    $s->bindParam(4, $GloveSize);
    $s->bindParam(5, $LotCount, PDO::PARAM_INT);
    $s->bindParam(6, $PalletNumber);
    $s->execute();
    $r = $s->fetch();
    // print_r($r);
    $resultExist2 = $r['EXISTS'];
    $s->closeCursor();
echo $resultExist." || ".$resultExist2;
if($resultExist==0 AND $resultExist2==0){

// echo " dalam benar";
  $query = "{CALL SP_AddPreset(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)}";
  $stmt = $connect->prepare($query);
  $stmt->bindParam(1, $Plant);
  $stmt->bindParam(2, $SONumber, PDO::PARAM_INT);
  $stmt->bindParam(3, $SOItemNumber, PDO::PARAM_INT);
  $stmt->bindParam(4, $Customer);
  $stmt->bindParam(5, $Brand);
  $stmt->bindParam(6, $LotNumber, PDO::PARAM_INT);
  $stmt->bindParam(7, $LotCount, PDO::PARAM_INT);
  $stmt->bindParam(8, $PalletNumber, PDO::PARAM_INT);
  $stmt->bindParam(9, $GloveCode);
  $stmt->bindParam(10, $GloveColour);
  $stmt->bindParam(11, $GloveProductType);
  $stmt->bindParam(12, $GloveSize);
  $stmt->bindParam(13, $InspectionUserID);
  $stmt->bindParam(14, $InspectionPlan);
  $stmt->bindParam(15, $SampleSizeResult_JSON);
  $stmt->bindParam(16, $AQLResult_JSON);
  $stmt->bindParam(17, $InspectionCount, PDO::PARAM_INT);
  $stmt->bindParam(18, $RecordCreatedDateTime);
  $stmt->bindParam(19, $RecordStatusFlag, PDO::PARAM_INT);
  $stmt->bindParam(20, $nullVal);
  $stmt->bindParam(21, $fgcondition);


  if($stmt->execute()){
    echo '<script> alert(Data Saved!); </script>';
  }
  }else{
    // echo " dalam salah";
  }

}

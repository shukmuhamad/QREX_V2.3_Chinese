<?php


  function updateLot($connect, $tableName, $lotID, $columnVal, $identifier ){

    $stmt = $connect->prepare("{CALL SP_UpdateLot(?,?,?,?)}");
    $stmt->bindParam(1, $tableName);
    $stmt->bindParam(2, $lotID);
    $stmt->bindParam(3, $columnVal);
    $stmt->bindParam(4, $identifier);

    if($stmt->execute()){
      // echo '<script>
      // console.log("'.$tableName.' has been updated.");
      // </script>';
    }

  }

  function updateRecord($connect, $tableName, $recordID, $columnVal, $identifier ){

    $stmt = $connect->prepare("{CALL SP_UpdateRecord(?,?,?,?)}");
    $stmt->bindParam(1, $tableName);
    $stmt->bindParam(2, $recordID);
    $stmt->bindParam(3, $columnVal);
    $stmt->bindParam(4, $identifier);

    if($stmt->execute()){
      // echo '<script>
      // console.log("'.$tableName.' has been updated.");
      // </script>';
    }

  }

        if (isset($_POST['submit']))
        {
          $Plant                  = $_POST['PlantKey'];
          $RecordCreatedDateTime  = date('Y-m-d H:i:s', strtotime(str_replace("/","-",$_POST['RecordCreatedDateTime'])));
          $BatchNumber            = $_POST['BatchNumber'];
          $InspectionPlan         = $_POST['InspectionPlanKey'];
          $GloveSize              = $_POST['GloveSizeCodeLong'];
          $InspectionCount        = $_POST['InspectionCount'];
          $CartonQuantity         = $_POST['CartonQuantity'];
          $CartonNum              = explode(",", $_POST['CartonNum']);
          $Customer               = $_POST['CustomerName'];
          $Brand                  = $_POST['BrandName'];
          $LotNumber              = $_POST['LotNumber'];
          $GloveProductType       = $_POST['GloveProductTypeName'];
          $GloveCode              = $_POST['GloveCodeLong'];
          $GloveColour            = $_POST['GloveColourCode'];
          $ProductionLineKey1     = $_POST['ProductionLineName1'];
          $ProductionLineKey2     = $_POST['ProductionLineName2'];
          $ProductionLineKey3     = $_POST['ProductionLineName3'];
          $ProductDate1           = $_POST['product_date1'];
          $ProductDate2           = $_POST['product_date2'];
          $ProductDate3           = $_POST['product_date3'];
          $Shift1                 = $_POST['shift1'];
          $Shift2                 = $_POST['shift2'];
          $Shift3                 = $_POST['shift3'];
          $PackingDate            = $_POST['PackingDate'];
          $InspectionUserID       = $_POST['InspectionUserID'];
          $VerifierID              = $_POST['verify_by'];
          $VerifiedDate            = date('Y-m-d H:i:s', strtotime(str_replace("/","-",$_POST['date_verify'])));
          $RecordStatusFlag       = $_POST['RecordStatusFlag'];



          $ThicknessTestingMethod = $_REQUEST['method'];
          $WeighingScaleID    = $_REQUEST['InstrumentValue'];
          $RulerID            = $_REQUEST['InstrumentValue2'];
          $ThicknessGauge     = $_REQUEST['InstrumentValue3'];
          $GloveWeightTest    = $_REQUEST['TestValue'];
          $CountingTest       = $_REQUEST['TestValue2'];
          $PackagingDefectsTest = $_REQUEST['TestValue3'];
          $LayeringTest       = $_REQUEST['TestValue4'];
          $SmellTest          = $_REQUEST['TestValue5'];
          $GripTest           = $_REQUEST['TestValue6'];
          $DonningTearingTest = $_REQUEST['TestValue7'];
          $BlackClothTest     = $_REQUEST['TestValue8'];
          $StickingTest       = $_REQUEST['TestValue9'];
          $DispensingTest     = $_REQUEST['TestValue10'];
          $WhiteClothTest     = $_REQUEST['TestValue11'];
          $Test1Name          = $_REQUEST['TestValue12'];
          $Test2Name          = $_REQUEST['TestValue13'];
          $Test3Name          = $_REQUEST['TestValue14'];
          $Test4Name          = $_REQUEST['TestValue15'];
          $Test5Name          = $_REQUEST['TestValue16'];
          $DyeLeakTest        = $_REQUEST['TestValue17'];
          $SealingTest        = $_REQUEST['TestValue18'];
          $BurstTest          = $_REQUEST['TestValue19'];
          $VPA                = $_REQUEST['TestValue20'];

          $length1            = $_REQUEST['length1'];
          $length2            = $_REQUEST['length2'];
          $length3            = $_REQUEST['length3'];
          $length4            = $_REQUEST['length4'];
          $length5            = $_REQUEST['length5'];
          $length6            = $_REQUEST['length6'];
          $length7            = $_REQUEST['length7'];
          $length8            = $_REQUEST['length8'];
          $length9            = $_REQUEST['length9'];
          $length10           = $_REQUEST['length10'];
          $length11           = $_REQUEST['length11'];
          $length12           = $_REQUEST['length12'];
          $length13           = $_REQUEST['length13'];
          $length_p_f         = $_REQUEST['length_p_f'];

          $width1             = $_REQUEST['width1'];
          $width2             = $_REQUEST['width2'];
          $width3             = $_REQUEST['width3'];
          $width4             = $_REQUEST['width4'];
          $width5             = $_REQUEST['width5'];
          $width6             = $_REQUEST['width6'];
          $width7             = $_REQUEST['width7'];
          $width8             = $_REQUEST['width8'];
          $width9             = $_REQUEST['width9'];
          $width10            = $_REQUEST['width10'];
          $width11            = $_REQUEST['width11'];
          $width12            = $_REQUEST['width12'];
          $width13            = $_REQUEST['width13'];
          $width_p_f          = $_REQUEST['width_p_f'];

          $cuff1              = $_REQUEST['cuff1'];
          $cuff2              = $_REQUEST['cuff2'];
          $cuff3              = $_REQUEST['cuff3'];
          $cuff4              = $_REQUEST['cuff4'];
          $cuff5              = $_REQUEST['cuff5'];
          $cuff6              = $_REQUEST['cuff6'];
          $cuff7              = $_REQUEST['cuff7'];
          $cuff8              = $_REQUEST['cuff8'];
          $cuff9              = $_REQUEST['cuff9'];
          $cuff10             = $_REQUEST['cuff10'];
          $cuff11             = $_REQUEST['cuff11'];
          $cuff12             = $_REQUEST['cuff12'];
          $cuff13             = $_REQUEST['cuff13'];
          $cuff_p_f           = $_REQUEST['cuff_p_f'];

          $palm1              = $_REQUEST['palm1'];
          $palm2              = $_REQUEST['palm2'];
          $palm3              = $_REQUEST['palm3'];
          $palm4              = $_REQUEST['palm4'];
          $palm5              = $_REQUEST['palm5'];
          $palm6              = $_REQUEST['palm6'];
          $palm7              = $_REQUEST['palm7'];
          $palm8              = $_REQUEST['palm8'];
          $palm9              = $_REQUEST['palm9'];
          $palm10             = $_REQUEST['palm10'];
          $palm11             = $_REQUEST['palm11'];
          $palm12             = $_REQUEST['palm12'];
          $palm13             = $_REQUEST['palm13'];
          $palm_p_f           = $_REQUEST['palm_p_f'];

          $fingertip1         = $_REQUEST['fingertip1'];
          $fingertip2         = $_REQUEST['fingertip2'];
          $fingertip3         = $_REQUEST['fingertip3'];
          $fingertip4         = $_REQUEST['fingertip4'];
          $fingertip5         = $_REQUEST['fingertip5'];
          $fingertip6         = $_REQUEST['fingertip6'];
          $fingertip7         = $_REQUEST['fingertip7'];
          $fingertip8         = $_REQUEST['fingertip8'];
          $fingertip9         = $_REQUEST['fingertip9'];
          $fingertip10        = $_REQUEST['fingertip10'];
          $fingertip11        = $_REQUEST['fingertip11'];
          $fingertip12        = $_REQUEST['fingertip12'];
          $fingertip13        = $_REQUEST['fingertip13'];
          $fingertip_p_f      = $_REQUEST['fingertip_p_f'];

          $bead_diameter1     = $_REQUEST['bead_diameter1'];
          $bead_diameter2     = $_REQUEST['bead_diameter2'];
          $bead_diameter3     = $_REQUEST['bead_diameter3'];
          $bead_diameter4     = $_REQUEST['bead_diameter4'];
          $bead_diameter5     = $_REQUEST['bead_diameter5'];
          $bead_diameter6     = $_REQUEST['bead_diameter6'];
          $bead_diameter7     = $_REQUEST['bead_diameter7'];
          $bead_diameter8     = $_REQUEST['bead_diameter8'];
          $bead_diameter9     = $_REQUEST['bead_diameter9'];
          $bead_diameter10    = $_REQUEST['bead_diameter10'];
          $bead_diameter11    = $_REQUEST['bead_diameter11'];
          $bead_diameter12    = $_REQUEST['bead_diameter12'];
          $bead_diameter13    = $_REQUEST['bead_diameter13'];
          $bead_diameter_p_f  = $_REQUEST['bead_diameter_p_f'];

          $cuff_edge1         = $_REQUEST['cuff_edge1'];
          $cuff_edge2         = $_REQUEST['cuff_edge2'];
          $cuff_edge3         = $_REQUEST['cuff_edge3'];
          $cuff_edge4         = $_REQUEST['cuff_edge4'];
          $cuff_edge5         = $_REQUEST['cuff_edge5'];
          $cuff_edge6         = $_REQUEST['cuff_edge6'];
          $cuff_edge7         = $_REQUEST['cuff_edge7'];
          $cuff_edge8         = $_REQUEST['cuff_edge8'];
          $cuff_edge9         = $_REQUEST['cuff_edge9'];
          $cuff_edge10        = $_REQUEST['cuff_edge10'];
          $cuff_edge11        = $_REQUEST['cuff_edge11'];
          $cuff_edge12        = $_REQUEST['cuff_edge12'];
          $cuff_edge13        = $_REQUEST['cuff_edge13'];
          $cuff_edge_p_f      = $_REQUEST['cuff_edge_p_f'];

          $g_weight1          = $_REQUEST['g_weight1'];
          $g_weight2          = $_REQUEST['g_weight2'];
          $g_weight3          = $_REQUEST['g_weight3'];
          $g_weight4          = $_REQUEST['g_weight4'];
          $g_weight5          = $_REQUEST['g_weight5'];
          $g_weight6          = $_REQUEST['g_weight6'];
          $g_weight7          = $_REQUEST['g_weight7'];
          $g_weight8          = $_REQUEST['g_weight8'];
          $g_weight9          = $_REQUEST['g_weight9'];
          $g_weight10         = $_REQUEST['g_weight10'];
          $g_weight11         = $_REQUEST['g_weight11'];
          $g_weight12         = $_REQUEST['g_weight12'];
          $g_weight13         = $_REQUEST['g_weight13'];
          $g_weight_p_f       = $_REQUEST['g_weight_p_f'];

          $SRText1            = $_REQUEST['SRText1'];
          $SRText2            = $_REQUEST['SRText2'];
          $SRText3            = $_REQUEST['SRText3'];
          $SRText4            = $_REQUEST['SRText4'];
          $SRText5            = $_REQUEST['SRText5'];
          $SRText6            = $_REQUEST['SRText6'];
          $SRText7            = $_REQUEST['SRText7'];
          $SRText8            = $_REQUEST['SRText8'];
          $SRTextPackaging    = $_REQUEST['SRTextPackaging'];

          $machine_id         = $_REQUEST['machine_id'];
          $sample_size        = $_REQUEST['sample_size_vt'];
          $sample_size_apt    = $_REQUEST['sample_size_apt'];
          $sample_size_apt2   = $_REQUEST['sample_size_apt2'];
          $AQL_minor          = $_REQUEST['AQL_minor'];
          $AQL_major          = $_REQUEST['AQL_major'];
          $AQL_criticalNAG    = $_REQUEST['AQL_criticalNAG'];
          $AQL_criticalNFG    = $_REQUEST['AQL_criticalNFG'];
          $AQL_holes1         = $_REQUEST['AQL_holes1'];
          $AQL_holes2         = $_REQUEST['AQL_holes2'];
          $AQL_gg         = $_REQUEST['AQL_goodgloves'];

          $Acceptance_minor   = $_REQUEST['Acceptance_minor'];
          $Acceptance_major   = $_REQUEST['Acceptance_major'];
          $Acceptance_nag  = $_REQUEST['Acceptance_nag'];
          $Acceptance_nfg= $_REQUEST['Acceptance_nfg'];
          $Acceptance_holes1  = $_REQUEST['Acceptance_holes1'];
          $Acceptance_holes2  = $_REQUEST['Acceptance_holes2'];
          $Acceptance_gg  = $_REQUEST['Acceptance_goodgloves'];

          $AQL_regulatoryPackaging        = $_REQUEST['AQL_regulatorypackaging'];
          $Acceptance_RegulatoryPackaging = $_REQUEST['Acceptance_regulatorypackaging'];
          $AQL_VisualPackaging            = $_REQUEST['AQL_visualpackaging'];
          $Acceptance_VisualPackaging     = $_REQUEST['Acceptance_visualpackaging'];
          $AQL_CriticalPackaging          = $_REQUEST['AQL_criticalpackaging'];
          $Acceptance_CriticalPackaging   = $_REQUEST['Acceptance_criticalpackaging'];

          $Result_RegulatoryPackaging   = $_REQUEST['Result_Regulatory'];
          $Result_CriticalPackaging   = $_REQUEST['Result_Critical'];
          $Result_VisualPackaging   = $_REQUEST['Result_Visual'];
          $Final_Disposition   = $_REQUEST['final_disposition'];
          $Total_holes    = $_REQUEST['total_holes'];
      //------------MINOR-------------------//
          $DB     = $_REQUEST['DB'];
          $SD     = $_REQUEST['SD'];
          $SP     = $_REQUEST['SP'];

      //------------MAJOR-------------------//
          $CA     = $_REQUEST['CA'];
          $CL     = $_REQUEST['CL'];
          $CLD    = $_REQUEST['CLD'];
          $CS     = $_REQUEST['CS'];
          $DF     = $_REQUEST['DF'];
          $DT     = $_REQUEST['DT'];
          $EFI    = $_REQUEST['EFI'];
          $FM     = $_REQUEST['FM'];
          $FNO    = $_REQUEST['FNO'];
          $FO     = $_REQUEST['FO'];
          $GNO    = $_REQUEST['GNO'];
          $IB     = $_REQUEST['IB'];
          $ICT    = $_REQUEST['ICT'];
          $L_Major      = $_REQUEST['L_Major'];
          $PMI    = $_REQUEST['PMI'];
          $PMO    = $_REQUEST['PMO'];
          $PLM    = $_REQUEST['PLM'];
          $RC     = $_REQUEST['RC'];
          $RM     = $_REQUEST['RM'];
          $SAG    = $_REQUEST['SAG'];
          $SG     = $_REQUEST['SG'];
          $SHN    = $_REQUEST['SHN'];
          $SI     = $_REQUEST['SI'];
          $SKV    = $_REQUEST['SKV'];
          $SLD    = $_REQUEST['SLD'];
          $SO     = $_REQUEST['SO'];
          $STK    = $_REQUEST['STK'];
          $STN    = $_REQUEST['STN'];
          $TA     = $_REQUEST['TA'];
          $TS     = $_REQUEST['TS'];
          $UNF    = $_REQUEST['UNF'];
          $WL     = $_REQUEST['WL'];
          $WSI    = $_REQUEST['WSI'];
          $WSO    = $_REQUEST['WSO'];
          $LS     = $_REQUEST['LS'];
      //-------------------------------//
          $BP     = $_REQUEST['BP'];
          $DP     = $_REQUEST['DP'];
          $DSP    = $_REQUEST['DSP'];
          $DTP    = $_REQUEST['DTP'];
          $IA     = $_REQUEST['IA'];
          $IFS    = $_REQUEST['IFS'];
          $IP_MAJOR     = $_REQUEST['IP_MAJOR'];
          $OP     = $_REQUEST['OP'];
          $RP     = $_REQUEST['RP'];
          $SH     = $_REQUEST['SH'];
          $SMP    = $_REQUEST['SMP'];
      //-------------CRITICAL------------------//
          $BPC    = $_REQUEST['BPC'];
          $CR     = $_REQUEST['CR'];
          $DC     = $_REQUEST['DC'];
          $DD     = $_REQUEST['DD'];
          $DIS    = $_REQUEST['DIS'];
          $FMT    = $_REQUEST['FMT'];
          $L       = $_REQUEST['L'];
          $GL     = $_REQUEST['GL'];
          $MP     = $_REQUEST['MP'];
          $NB     = $_REQUEST['NB'];
          $NF     = $_REQUEST['NF'];
          $TW     = $_REQUEST['TW'];
          $WE     = $_REQUEST['WE'];
          $WG     = $_REQUEST['WG'];
          $PGM     = $_REQUEST['PGM'];
          $SDG     = $_REQUEST['SDG'];
          $URD     = $_REQUEST['URD'];
      //-------------------------------//
          $CH     = $_REQUEST['CH'];
          $FK     = $_REQUEST['FK'];
          $TAH    = $_REQUEST['TAH'];
          $TR    = $_REQUEST['TR'];
          $TH     = $_REQUEST['TH'];
          $MF     = $_REQUEST['MF'];
      //-------------------------------//
          $ICP    = $_REQUEST['ICP'];
          $NP     = $_REQUEST['NP'];
          $WP     = $_REQUEST['WP'];
      //------------HOLES1-------------------//
          $BF     = $_REQUEST['BF'];
          $P      = $_REQUEST['P'];
          $CF     = $_REQUEST['CF'];
          $SF     = $_REQUEST['SF'];
          $TAHs   = $_REQUEST['TAHs'];
          $FKS    = $_REQUEST['FKS'];
          $THs    = $_REQUEST['THs'];
          $FT     = $_REQUEST['FT'];
          $TRS    = $_REQUEST['TRS'];
          $GB     = $_REQUEST['GB'];
          $CHs    = $_REQUEST['CHs'];
          $L_HOLES1    = $_REQUEST['L_HOLES1'];
      //--------------HOLES2-----------------//
          $BF_2   = $_REQUEST['BF_2'];
          $P_2    = $_REQUEST['P_2'];
          $CF_2   = $_REQUEST['CF_2'];
          $SF_2   = $_REQUEST['SF_2'];
          $TAHs_2 = $_REQUEST['TAHs_2'];
          $FKS_2  = $_REQUEST['FKS_2'];
          $THs_2  = $_REQUEST['THs_2'];
          $FT_2   = $_REQUEST['FT_2'];
          $TRS_2  = $_REQUEST['TRS_2'];
          $GB_2   = $_REQUEST['GB_2'];
          $CHs_2  = $_REQUEST['CHs_2'];
          $L_HOLES2    = $_REQUEST['L_HOLES2'];

      //-------------REGULATOR------------------//
          $WLN    = $_REQUEST['WLN'];
          $WPC    = $_REQUEST['WPC'];
          $WMD    = $_REQUEST['WMD'];
          $MM     = $_REQUEST['MM'];
          $WED    = $_REQUEST['WED'];
          $IP     = $_REQUEST['IP'];
      //-------------CRITICAL PACKAGING------------------//
          $WQ     = $_REQUEST['WQ'];
          $WGS    = $_REQUEST['WGS'];
          $WTS    = $_REQUEST['WTS'];
          $MSG    = $_REQUEST['MSG'];
          $WPD    = $_REQUEST['WPD'];
          $MS     = $_REQUEST['MS'];
          $WGT    = $_REQUEST['WGT'];
          $PTS    = $_REQUEST['PTS'];
          $FC     = $_REQUEST['FC'];
          $MSI    = $_REQUEST['MSI'];
          $MB     = $_REQUEST['MB'];
          $WGA    = $_REQUEST['WGA'];
          $WPO    = $_REQUEST['WPO'];
          $POS    = $_REQUEST['POS'];
          $TRP    = $_REQUEST['TRP'];
          $MLN    = $_REQUEST['MLN'];
          $OS     = $_REQUEST['OS'];
          $DMG    = $_REQUEST['DMG'];
          $BC     = $_REQUEST['BC'];
      //--------------VISUAL PACKAGING-----------------//
          $WT     = $_REQUEST['WT'];
          $PIS    = $_REQUEST['PIS'];
          $CT     = $_REQUEST['CT'];
          $MSA    = $_REQUEST['MSA'];
          $POP    = $_REQUEST['POP'];
          $WIS    = $_REQUEST['WIS'];
          $FG     = $_REQUEST['FG'];
          $DT_PACKING     = $_REQUEST['DT_PACKING'];


          $overall_AQL    = $_REQUEST['overall_AQL'];
          $UDResultKey    = $_REQUEST['UDResultCode'];

      //--------------new add defect-----------------//

          $STNs     = $_REQUEST['STNs'];
          $SLDs     = $_REQUEST['SLDs'];
          $Ls     = $_REQUEST['Ls'];
          $GF    = $_REQUEST['GF'];
          $MS_critical     = $_REQUEST['MS_critical'];
          $PFK    = $_REQUEST['PFK'];
          $GSH     = $_REQUEST['GSH'];
          $LH     = $_REQUEST['LH'];
          $MH    = $_REQUEST['MH'];
          $LH_2     = $_REQUEST['LH_2'];
          $MH_2    = $_REQUEST['MH_2'];
          $MG    = $_REQUEST['MG'];
          $MD    = $_REQUEST['MD'];
          $TP    = $_REQUEST['TP'];
          $SVD    = $_REQUEST['SVD'];
          $FKI    = $_REQUEST['FKI'];
          $FKO    = $_REQUEST['FKO'];
          $GG    = $_REQUEST['GG'];
          $TSs    = $_REQUEST['TSs'];
          $NCN    = $_REQUEST['NCN'];
          $CNS    = $_REQUEST['CNS'];





//---------------------------------------------------------Updating T_Record_Master---------------------------------------------------------//

$colVal_array = array(
  array(
    "col"=>"InspectionUserID",
    "newcolval"=>$InspectionUserID,
    "oldcolval"=>$T_Record_Master['InspectionUserID'],
  )
  ,array(
    "col"=>"RecordCreatedDateTime",
    "newcolval"=>$RecordCreatedDateTime,
    "oldcolval"=>$T_Record_Master['RecordCreatedDateTime'],
  )
  ,array(
    "col"=>"InspectionCount",
    "newcolval"=>$InspectionCount,
    "oldcolval"=>$T_Record_Master['InspectionCount'],
  )
  ,array(
    "col"=>"VerifiedDate",
    "newcolval"=>$VerifiedDate,
    "oldcolval"=>$T_Record_Master['VerifiedDate'],
  )
  ,array(
    "col"=>"VerifierID",
    "newcolval"=>$VerifierID,
    "oldcolval"=>$T_Record_Master['VerifierID'],
  )
  ,array(
    "col"=>"RecordStatusFlag",
    "newcolval"=>$RecordStatusFlag,
    "oldcolval"=>$T_Record_Master['RecordStatusFlag'],
  )
);

  $colVal_JSON = json_encode($colVal_array);

  // echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"RecordID",
      "iColVal"=>$T_Record_Master['RecordID'],
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  // echo "<br />".$indentifier_JSON;

  if($InspectionUserID != $T_Record_Master['InspectionUserID']
   OR $RecordCreatedDateTime != $T_Record_Master['RecordCreatedDateTime']
   OR $InspectionCount != $T_Record_Master['InspectionCount']
   OR $VerifiedDate != $T_Record_Master['VerifiedDate']
   OR $VerifierID != $T_Record_Master['VerifierID']
   OR $RecordStatusFlag != $T_Record_Master['RecordStatusFlag']
 ){
   updateRecord($connect,"T_Record_Master", $RecordID, $colVal_JSON,$indentifier_JSON);
 }

  $q1 = "UPDATE T_lot_master SET LotCreatedDate = ? WHERE LotIDKey = ?";
  $s1 = $connect->prepare($q1);
  $s1->bindParam(1, $RecordCreatedDateTime);
  $s1->bindParam(2, $lotID);
  $s1->execute();


//------------------------------updating T_Record_instrument-------------------------------------------------

function updateInstrument($connect,$RecordID ,$newVal,$oldVal,$identifierValue){
  $colVal_array = array(
    array(
      "col"=>"InstrumentValue",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  // echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"InstrumentKey",
      "iColVal"=>$identifierValue,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  // echo "<br />".$indentifier_JSON;

if($newVal != $oldVal){
  updateRecord($connect,"T_Record_Instrument", $RecordID, $colVal_JSON,$indentifier_JSON);
}

}




updateInstrument($connect, $RecordID, $WeighingScaleID, $T_Record_Instrument[0]['InstrumentValue'], "1");
updateInstrument($connect, $RecordID, $ThicknessGauge, $T_Record_Instrument[1]['InstrumentValue'], "2");
updateInstrument($connect, $RecordID, $RulerID, $T_Record_Instrument[2]['InstrumentValue'], "3");
updateInstrument($connect, $RecordID, $machine_id, $T_Record_Instrument[3]['InstrumentValue'], "4");

//-------------------------------------------------------------------------------------------------------------------------------
//------------------------------updating T_Record_Test-------------------------------------------------

function updateTest($connect,$RecordID ,$newVal,$oldVal, $newSRTVal, $oldSRTVal, $identifierValue){
  $colVal_array = array(
    array(
      "col"=>"TestValue",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
    ,array(
      "col"=>"SRText",
      "newcolval"=>$newSRTVal,
      "oldcolval"=>$oldSRTVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  // echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"TestKey",
      "iColVal"=>$identifierValue,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  // echo "<br />".$indentifier_JSON."<br /><br />";
if($newVal != $oldVal OR $newSRTVal != $oldSRTVal ){
  updateRecord($connect,"T_Record_Test", $RecordID, $colVal_JSON,$indentifier_JSON);
  }
}

updateTest($connect, $RecordID, $ThicknessTestingMethod, $testResult_pivot['ThicknessTestMethod'], null, null, "1");
 updateTest($connect, $RecordID, $GloveWeightTest, $testResult_pivot['GloveWeightTest'], null, null, "12");
 updateTest($connect, $RecordID, $SRText1, $testResult_pivot['GloveWeightAverage'], null, null, "13");
updateTest($connect, $RecordID, $CountingTest, $testResult_pivot['CountingTest'], $SRText2, $testSRText_pivot['CountingTest'], "14");
updateTest($connect, $RecordID, $PackagingDefectsTest, $testResult_pivot['PackagingDefectsTest'], $SRTextPackaging, $testSRText_pivot['PackagingDefectsTest'], "8");
updateTest($connect, $RecordID, $LayeringTest, $testResult_pivot['LayeringTest'], null, null, "2");
updateTest($connect, $RecordID, $SmellTest,  $testResult_pivot['SmellTest'], null, null, "5");
updateTest($connect, $RecordID, $GripTest,  $testResult_pivot['GripTest'], null, null, "6");
updateTest($connect, $RecordID, $DonningTearingTest,  $testResult_pivot['DonningTearingTest'],$SRText8, $testSRText_pivot['DonningTearingTest'], "3");
updateTest($connect, $RecordID, $BlackClothTest,  $testResult_pivot['BlackClothTest'], null, null, "9");
updateTest($connect, $RecordID, $StickingTest,  $testResult_pivot['StickingTest'], null, null, "7");
updateTest($connect, $RecordID, $DispensingTest,  $testResult_pivot['DispensingTest'], null, null, "4");
updateTest($connect, $RecordID, $WhiteClothTest,  $testResult_pivot['WhiteClothTest'], null, null, "10");
updateTest($connect, $RecordID, $Test1Name,  $testResult_pivot['Test 1 Name'], $SRText3, $testSRText_pivot['Test 1 Name'], "144");
updateTest($connect, $RecordID, $Test2Name,  $testResult_pivot['Test 2 Name'], $SRText4, $testSRText_pivot['Test 2 Name'], "145");
updateTest($connect, $RecordID, $Test3Name,  $testResult_pivot['Test 3 Name'], $SRText5, $testSRText_pivot['Test 3 Name'], "146");
updateTest($connect, $RecordID, $Test4Name,  $testResult_pivot['Test 4 Name'], $SRText6, $testSRText_pivot['Test 4 Name'], "147");
updateTest($connect, $RecordID, $Test5Name,  $testResult_pivot['Test 5 Name'], $SRText7, $testSRText_pivot['Test 5 Name'], "148");
updateTest($connect, $RecordID, $DyeLeakTest,  $testResult_pivot['Dye Leak Test'], null, null, "150");
updateTest($connect, $RecordID, $SealingTest,  $testResult_pivot['Sealing Test'], null, null, "149");
updateTest($connect, $RecordID, $BurstTest,  $testResult_pivot['BurstTest'], null, null, "157");
updateTest($connect, $RecordID, $VPA,  $testResult_pivot['Visual & Peel Ability'], null, null, "158");

updateTest($connect, $RecordID, $length1, $testResult_pivot['Length1'], null, null, "17");
updateTest($connect, $RecordID, $length2, $testResult_pivot['Length2'], null, null, "18");
updateTest($connect, $RecordID, $length3, $testResult_pivot['Length3'], null, null, "19");
updateTest($connect, $RecordID, $length4, $testResult_pivot['Length4'], null, null, "20");
updateTest($connect, $RecordID, $length5, $testResult_pivot['Length5'], null, null, "21");
updateTest($connect, $RecordID, $length6, $testResult_pivot['Length6'], null, null, "22");
updateTest($connect, $RecordID, $length7, $testResult_pivot['Length7'], null, null, "23");
updateTest($connect, $RecordID, $length8, $testResult_pivot['Length8'], null, null, "24");
updateTest($connect, $RecordID, $length9, $testResult_pivot['Length9'], null, null, "25");
updateTest($connect, $RecordID, $length10, $testResult_pivot['Length10'], null, null, "26");
updateTest($connect, $RecordID, $length11, $testResult_pivot['Length11'], null, null, "27");
updateTest($connect, $RecordID, $length12, $testResult_pivot['Length12'], null, null, "28");
updateTest($connect, $RecordID, $length13, $testResult_pivot['Length13'], null, null, "29");
updateTest($connect, $RecordID, $length_p_f, $testResult_pivot['LengthTest'], null, null, "16");

updateTest($connect, $RecordID, $width1, $testResult_pivot['Width1'], null, null, "31");
updateTest($connect, $RecordID, $width2, $testResult_pivot['Width2'], null, null, "32");
updateTest($connect, $RecordID, $width3, $testResult_pivot['Width3'], null, null, "33");
updateTest($connect, $RecordID, $width4, $testResult_pivot['Width4'], null, null, "34");
updateTest($connect, $RecordID, $width5, $testResult_pivot['Width5'], null, null, "35");
updateTest($connect, $RecordID, $width6, $testResult_pivot['Width6'], null, null, "36");
updateTest($connect, $RecordID, $width7, $testResult_pivot['Width7'], null, null, "37");
updateTest($connect, $RecordID, $width8,$testResult_pivot['Width8'], null, null, "38");
updateTest($connect, $RecordID, $width9, $testResult_pivot['Width9'], null, null, "39");
updateTest($connect, $RecordID, $width10, $testResult_pivot['Width10'], null, null, "40");
updateTest($connect, $RecordID, $width11, $testResult_pivot['Width11'], null, null, "41");
updateTest($connect, $RecordID, $width12, $testResult_pivot['Width12'], null, null, "42");
updateTest($connect, $RecordID, $width13, $testResult_pivot['Width13'], null, null, "43");
updateTest($connect, $RecordID, $width_p_f, $testResult_pivot['WidthTest'], null, null, "30");

updateTest($connect, $RecordID, $cuff1, $testResult_pivot['Cuff1'], null, null, "45");
updateTest($connect, $RecordID, $cuff2, $testResult_pivot['Cuff2'], null, null, "46");
updateTest($connect, $RecordID, $cuff3, $testResult_pivot['Cuff3'], null, null, "47");
updateTest($connect, $RecordID, $cuff4, $testResult_pivot['Cuff4'], null, null, "48");
updateTest($connect, $RecordID, $cuff5, $testResult_pivot['Cuff5'], null, null, "49");
updateTest($connect, $RecordID, $cuff6, $testResult_pivot['Cuff6'], null, null, "50");
updateTest($connect, $RecordID, $cuff7, $testResult_pivot['Cuff7'], null, null, "51");
updateTest($connect, $RecordID, $cuff8, $testResult_pivot['Cuff8'], null, null, "52");
updateTest($connect, $RecordID, $cuff9, $testResult_pivot['Cuff9'], null, null, "53");
updateTest($connect, $RecordID, $cuff10, $testResult_pivot['Cuff10'], null, null, "54");
updateTest($connect, $RecordID, $cuff11, $testResult_pivot['Cuff11'], null, null, "55");
updateTest($connect, $RecordID, $cuff12, $testResult_pivot['Cuff12'], null, null, "56");
updateTest($connect, $RecordID, $cuff13, $testResult_pivot['Cuff13'], null, null, "57");
updateTest($connect, $RecordID, $cuff_p_f, $testResult_pivot['CuffTest'], null, null, "44");

updateTest($connect, $RecordID, $palm1, $testResult_pivot['Palm1'], null, null, "59");
updateTest($connect, $RecordID, $palm2, $testResult_pivot['Palm2'], null, null, "60");
updateTest($connect, $RecordID, $palm3, $testResult_pivot['Palm3'], null, null, "61");
updateTest($connect, $RecordID, $palm4, $testResult_pivot['Palm4'], null, null, "62");
updateTest($connect, $RecordID, $palm5, $testResult_pivot['Palm5'], null, null, "63");
updateTest($connect, $RecordID, $palm6, $testResult_pivot['Palm6'], null, null, "64");
updateTest($connect, $RecordID, $palm7, $testResult_pivot['Palm7'], null, null, "65");
updateTest($connect, $RecordID, $palm8, $testResult_pivot['Palm8'], null, null, "66");
updateTest($connect, $RecordID, $palm9, $testResult_pivot['Palm9'], null, null, "67");
updateTest($connect, $RecordID, $palm10, $testResult_pivot['Palm10'], null, null, "68");
updateTest($connect, $RecordID, $palm11, $testResult_pivot['Palm11'], null, null, "69");
updateTest($connect, $RecordID, $palm12, $testResult_pivot['Palm12'], null, null, "70");
updateTest($connect, $RecordID, $palm13, $testResult_pivot['Palm13'], null, null, "71");
updateTest($connect, $RecordID, $palm_p_f, $testResult_pivot['PalmTest'], null, null, "58");

updateTest($connect, $RecordID, $fingertip1, $testResult_pivot['Fingertip1'], null, null, "73");
updateTest($connect, $RecordID, $fingertip2, $testResult_pivot['Fingertip2'], null, null, "74");
updateTest($connect, $RecordID, $fingertip3, $testResult_pivot['Fingertip3'], null, null, "75");
updateTest($connect, $RecordID, $fingertip4, $testResult_pivot['Fingertip4'], null, null, "76");
updateTest($connect, $RecordID, $fingertip5, $testResult_pivot['Fingertip5'], null, null, "77");
updateTest($connect, $RecordID, $fingertip6, $testResult_pivot['Fingertip6'], null, null, "78");
updateTest($connect, $RecordID, $fingertip7, $testResult_pivot['Fingertip7'], null, null, "79");
updateTest($connect, $RecordID, $fingertip8, $testResult_pivot['Fingertip8'], null, null, "80");
updateTest($connect, $RecordID, $fingertip9, $testResult_pivot['Fingertip9'], null, null, "81");
updateTest($connect, $RecordID, $fingertip10, $testResult_pivot['Fingertip10'], null, null, "82");
updateTest($connect, $RecordID, $fingertip11, $testResult_pivot['Fingertip11'], null, null, "83");
updateTest($connect, $RecordID, $fingertip12, $testResult_pivot['Fingertip12'], null, null, "84");
updateTest($connect, $RecordID, $fingertip13, $testResult_pivot['Fingertip13'], null, null, "85");
updateTest($connect, $RecordID, $fingertip_p_f, $testResult_pivot['FingertipTest'], null, null, "72");

updateTest($connect, $RecordID, $bead_diameter1, $testResult_pivot['DiaBeading1'], null, null, "87");
updateTest($connect, $RecordID, $bead_diameter2, $testResult_pivot['DiaBeading2'], null, null, "88");
updateTest($connect, $RecordID, $bead_diameter3, $testResult_pivot['DiaBeading3'], null, null, "89");
updateTest($connect, $RecordID, $bead_diameter4, $testResult_pivot['DiaBeading4'], null, null, "90");
updateTest($connect, $RecordID, $bead_diameter5, $testResult_pivot['DiaBeading5'], null, null, "91");
updateTest($connect, $RecordID, $bead_diameter6, $testResult_pivot['DiaBeading6'], null, null, "92");
updateTest($connect, $RecordID, $bead_diameter7, $testResult_pivot['DiaBeading7'], null, null, "93");
updateTest($connect, $RecordID, $bead_diameter8, $testResult_pivot['DiaBeading8'], null, null, "94");
updateTest($connect, $RecordID, $bead_diameter9, $testResult_pivot['DiaBeading9'], null, null, "95");
updateTest($connect, $RecordID, $bead_diameter10, $testResult_pivot['DiaBeading10'], null, null, "96");
updateTest($connect, $RecordID, $bead_diameter11, $testResult_pivot['DiaBeading11'], null, null, "97");
updateTest($connect, $RecordID, $bead_diameter12, $testResult_pivot['DiaBeading12'], null, null, "98");
updateTest($connect, $RecordID, $bead_diameter13, $testResult_pivot['DiaBeading13'], null, null, "99");
updateTest($connect, $RecordID, $bead_diameter_p_f, $testResult_pivot['DiaBeadingTest'], null, null, "86");

updateTest($connect, $RecordID, $cuff_edge1, $testResult_pivot['Wrist1'], null, null, "101");
updateTest($connect, $RecordID, $cuff_edge2, $testResult_pivot['Wrist2'], null, null, "102");
updateTest($connect, $RecordID, $cuff_edge3, $testResult_pivot['Wrist3'], null, null, "103");
updateTest($connect, $RecordID, $cuff_edge4, $testResult_pivot['Wrist4'], null, null, "104");
updateTest($connect, $RecordID, $cuff_edge5, $testResult_pivot['Wrist5'], null, null, "105");
updateTest($connect, $RecordID, $cuff_edge6, $testResult_pivot['Wrist6'], null, null, "106");
updateTest($connect, $RecordID, $cuff_edge7, $testResult_pivot['Wrist7'], null, null, "107");
updateTest($connect, $RecordID, $cuff_edge8, $testResult_pivot['Wrist8'], null, null, "108");
updateTest($connect, $RecordID, $cuff_edge9, $testResult_pivot['Wrist9'], null, null, "109");
updateTest($connect, $RecordID, $cuff_edge10, $testResult_pivot['Wrist10'], null, null, "110");
updateTest($connect, $RecordID, $cuff_edge11, $testResult_pivot['Wrist11'], null, null, "111");
updateTest($connect, $RecordID, $cuff_edge12, $testResult_pivot['Wrist12'], null, null, "112");
updateTest($connect, $RecordID, $cuff_edge13, $testResult_pivot['Wrist13'], null, null, "113");
updateTest($connect, $RecordID, $cuff_edge_p_f,$testResult_pivot['WristTest'], null, null, "100");

updateTest($connect, $RecordID, $g_weight1, $testResult_pivot['Weight1'], null, null, "115");
updateTest($connect, $RecordID, $g_weight2, $testResult_pivot['Weight2'], null, null, "116");
updateTest($connect, $RecordID, $g_weight3, $testResult_pivot['Weight3'], null, null, "117");
updateTest($connect, $RecordID, $g_weight4, $testResult_pivot['Weight4'], null, null, "118");
updateTest($connect, $RecordID, $g_weight5, $testResult_pivot['Weight5'], null, null, "119");
updateTest($connect, $RecordID, $g_weight6, $testResult_pivot['Weight6'], null, null, "120");
updateTest($connect, $RecordID, $g_weight7, $testResult_pivot['Weight7'], null, null, "121");
updateTest($connect, $RecordID, $g_weight8, $testResult_pivot['Weight8'], null, null, "122");
updateTest($connect, $RecordID, $g_weight9, $testResult_pivot['Weight9'], null, null, "123");
updateTest($connect, $RecordID, $g_weight10, $testResult_pivot['Weight10'], null, null, "124");
updateTest($connect, $RecordID, $g_weight11, $testResult_pivot['Weight11'], null, null, "125");
updateTest($connect, $RecordID, $g_weight12, $testResult_pivot['Weight12'], null, null, "126");
updateTest($connect, $RecordID, $g_weight13, $testResult_pivot['Weight13'], null, null, "127");
updateTest($connect, $RecordID, $g_weight_p_f, $testResult_pivot['WeightTest'], null, null, "114");


//-------------------------------------------------------------------------------------------------------------------------------

//------------------------------updating T_Record_AQL-------------------------------------------------

function updateAQL($connect,$RecordID ,$newVal,$oldVal, $identifierValue){
  $colVal_array = array(
    array(
      "col"=>"AQLValue",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  //echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"AQLDescriptionKey",
      "iColVal"=>$identifierValue,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  //echo "<br />".$indentifier_JSON;
if($newVal != $oldVal ){
  updateRecord($connect,"T_Record_AQL", $RecordID, $colVal_JSON,$indentifier_JSON);
  }
}

updateAQL($connect, $RecordID, $AQL_minor, $AQLResult_pivot['AQLMinor'], "128");
updateAQL($connect, $RecordID, $AQL_major, $AQLResult_pivot['AQLMajor'], "130");
updateAQL($connect, $RecordID, $AQL_criticalNAG, $AQLResult_pivot['AQLNAG_CP'], "167");
updateAQL($connect, $RecordID, $AQL_criticalNFG, $AQLResult_pivot['AQLNFG'], "166");
updateAQL($connect, $RecordID, $AQL_holes1, $AQLResult_pivot['AQLHoles1'], "134");
updateAQL($connect, $RecordID, $AQL_holes2, $AQLResult_pivot['AQLHoles2'], "136");
updateAQL($connect, $RecordID, $AQL_gg, $AQLResult_pivot['AQLGG'], "170");

updateAQL($connect, $RecordID, $Acceptance_minor, $AQLResult_pivot['AcceptanceMinor'], "129");
updateAQL($connect, $RecordID, $Acceptance_major, $AQLResult_pivot['AcceptanceMajor'], "131");
updateAQL($connect, $RecordID, $Acceptance_nag, $AQLResult_pivot['AcceptanceNAG_CP'], "165");
updateAQL($connect, $RecordID, $Acceptance_nfg, $AQLResult_pivot['AcceptanceNFG'], "164");
updateAQL($connect, $RecordID, $Acceptance_holes1, $AQLResult_pivot['AcceptanceHoles1'], "135");
updateAQL($connect, $RecordID, $Acceptance_holes2, $AQLResult_pivot['AcceptanceHoles2'], "137");
updateAQL($connect, $RecordID, $Acceptance_gg, $AQLResult_pivot['AcceptanceGG'], "171");

 updateAQL($connect, $RecordID, $AQL_regulatoryPackaging, $AQLResult_pivot['AQLRegulatoryPackaging'], "155");
 updateAQL($connect, $RecordID, $Acceptance_RegulatoryPackaging, $AQLResult_pivot['AcceptanceRegulatoryPackaging'], "156");
  updateAQL($connect, $RecordID, $AQL_VisualPackaging, $AQLResult_pivot['AQLVisualPackaging'], "151");
  updateAQL($connect, $RecordID, $Acceptance_VisualPackaging, $AQLResult_pivot['AcceptanceVisualPackaging'], "154");
  updateAQL($connect, $RecordID, $AQL_CriticalPackaging, $AQLResult_pivot['AQLCriticalPackaging'], "153");
  updateAQL($connect, $RecordID, $Acceptance_CriticalPackaging, $AQLResult_pivot['AcceptanceCriticalPackaging'], "152");

  updateAQL($connect, $RecordID, $Result_RegulatoryPackaging, $AQLResult_pivot['ResultRegulatoryPackaging'], "161");
  updateAQL($connect, $RecordID, $Result_CriticalPackaging, $AQLResult_pivot['ResultCriticalPackaging'], "160");
  updateAQL($connect, $RecordID, $Result_VisualPackaging, $AQLResult_pivot['ResultVisualPackaging'], "159");
  updateAQL($connect, $RecordID, $Final_Disposition, $AQLResult_pivot['FinalDisposition'], "162");
  // updateAQL($connect, $RecordID, $Total_holes, $AQLResult_pivot['FinalDisposition'], "140");

  updateAQL($connect, $RecordID, $overall_AQL, $AQLResult_pivot['AQLOverall'], "140");
//-------------------------------------------------------------------------------------------------------------------------------

//------------------------------updating T_Record_Defect-------------------------------------------------

function updateDefect($connect,$RecordID ,$newVal,$oldVal, $identifierValue){
  $colVal_array = array(
    array(
      "col"=>"DefectValue",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  //echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"DefectKey",
      "iColVal"=>$identifierValue,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  //echo "<br />".$indentifier_JSON;
  if($newVal != $oldVal ){
  updateRecord($connect,"T_Record_Defect", $RecordID, $colVal_JSON,$indentifier_JSON);
  }
}

updateDefect($connect, $RecordID, $DB, $defectResult_pivot['1d'], "1");
updateDefect($connect, $RecordID, $SD, $defectResult_pivot['2d'], "2");
updateDefect($connect, $RecordID, $SP, $defectResult_pivot['3d'], "3");

updateDefect($connect, $RecordID, $CA, $defectResult_pivot['4d'], "4");
updateDefect($connect, $RecordID, $CL, $defectResult_pivot['5d'], "5");
updateDefect($connect, $RecordID, $CLD, $defectResult_pivot['6d'], "6");
updateDefect($connect, $RecordID, $CS, $defectResult_pivot['7d'], "7");
updateDefect($connect, $RecordID, $DF, $defectResult_pivot['8d'], "8");
updateDefect($connect, $RecordID, $DT, $defectResult_pivot['9d'], "9");
updateDefect($connect, $RecordID, $EFI, $defectResult_pivot['10d'], "10");
updateDefect($connect, $RecordID, $FM, $defectResult_pivot['11d'], "11");
updateDefect($connect, $RecordID, $FNO, $defectResult_pivot['12d'], "12");
updateDefect($connect, $RecordID, $FO, $defectResult_pivot['13d'], "13");
updateDefect($connect, $RecordID, $GNO, $defectResult_pivot['14d'], "14");
updateDefect($connect, $RecordID, $IB, $defectResult_pivot['15d'], "15");
updateDefect($connect, $RecordID, $ICT, $defectResult_pivot['16d'], "16");
updateDefect($connect, $RecordID, $L_Major, $defectResult_pivot['17d'], "17");
updateDefect($connect, $RecordID, $PMI, $defectResult_pivot['20d'], "20");
updateDefect($connect, $RecordID, $PMO, $defectResult_pivot['21d'], "21");
updateDefect($connect, $RecordID, $PLM, $defectResult_pivot['19d'], "19");
updateDefect($connect, $RecordID, $RC, $defectResult_pivot['22d'], "22");
updateDefect($connect, $RecordID, $RM, $defectResult_pivot['23d'], "23");
updateDefect($connect, $RecordID, $SAG, $defectResult_pivot['24d'], "24");
updateDefect($connect, $RecordID, $SG, $defectResult_pivot['25d'], "25");
updateDefect($connect, $RecordID, $SHN, $defectResult_pivot['26d'], "26");
updateDefect($connect, $RecordID, $SI, $defectResult_pivot['27d'], "27");
updateDefect($connect, $RecordID, $SKV, $defectResult_pivot['28d'], "28");
updateDefect($connect, $RecordID, $SLD, $defectResult_pivot['29d'], "29");
updateDefect($connect, $RecordID, $SO, $defectResult_pivot['30d'], "30");
updateDefect($connect, $RecordID, $STK, $defectResult_pivot['31d'], "31");
updateDefect($connect, $RecordID, $STN, $defectResult_pivot['32d'], "32");
updateDefect($connect, $RecordID, $TA, $defectResult_pivot['33d'], "33");
updateDefect($connect, $RecordID, $TS, $defectResult_pivot['34d'], "34");
updateDefect($connect, $RecordID, $UNF, $defectResult_pivot['35d'], "35");
updateDefect($connect, $RecordID, $WL, $defectResult_pivot['36d'], "36");
updateDefect($connect, $RecordID, $WSI, $defectResult_pivot['37d'], "37");
updateDefect($connect, $RecordID, $WSO, $defectResult_pivot['38d'], "38");
updateDefect($connect, $RecordID, $LS, $defectResult_pivot['18d'], "18");

updateDefect($connect, $RecordID, $BP, $defectResult_pivot['40d'], "40");
updateDefect($connect, $RecordID, $DP, $defectResult_pivot['41d'], "41");
updateDefect($connect, $RecordID, $DSP, $defectResult_pivot['42d'], "42");
updateDefect($connect, $RecordID, $DTP, $defectResult_pivot['43d'], "43");
updateDefect($connect, $RecordID, $IA, $defectResult_pivot['44d'], "44");
updateDefect($connect, $RecordID, $IFS, $defectResult_pivot['45d'], "45");
updateDefect($connect, $RecordID, $IP_MAJOR, $defectResult_pivot['46d'], "46");
updateDefect($connect, $RecordID, $OP, $defectResult_pivot['47d'], "47");
updateDefect($connect, $RecordID, $RP, $defectResult_pivot['48d'], "48");
updateDefect($connect, $RecordID, $SH, $defectResult_pivot['49d'], "49");
updateDefect($connect, $RecordID, $SMP, $defectResult_pivot['50d'], "50");

updateDefect($connect, $RecordID, $BPC, $defectResult_pivot['51d'], "51");
updateDefect($connect, $RecordID, $CR, $defectResult_pivot['52d'], "52");
updateDefect($connect, $RecordID, $DC, $defectResult_pivot['53d'], "53");
updateDefect($connect, $RecordID, $DD, $defectResult_pivot['54d'], "54");
updateDefect($connect, $RecordID, $DIS, $defectResult_pivot['55d'], "55");
updateDefect($connect, $RecordID, $FMT, $defectResult_pivot['56d'], "56");
updateDefect($connect, $RecordID, $L, $defectResult_pivot['58d'], "58");
updateDefect($connect, $RecordID, $GL, $defectResult_pivot['57d'], "57");
updateDefect($connect, $RecordID, $MP, $defectResult_pivot['59d'], "59");
updateDefect($connect, $RecordID, $NB, $defectResult_pivot['60d'], "60");
updateDefect($connect, $RecordID, $NF, $defectResult_pivot['61d'], "61");
updateDefect($connect, $RecordID, $TW, $defectResult_pivot['64d'], "64");
updateDefect($connect, $RecordID, $WE, $defectResult_pivot['66d'], "66");
updateDefect($connect, $RecordID, $WG, $defectResult_pivot['67d'], "67");
updateDefect($connect, $RecordID, $PGM, $defectResult_pivot['62d'], "62");
updateDefect($connect, $RecordID, $SDG, $defectResult_pivot['63d'], "63");
updateDefect($connect, $RecordID, $URD, $defectResult_pivot['65d'], "65");

updateDefect($connect, $RecordID, $CH, $defectResult_pivot['68d'], "68");
updateDefect($connect, $RecordID, $FK, $defectResult_pivot['69d'], "69");
updateDefect($connect, $RecordID, $TAH, $defectResult_pivot['71d'], "71");
updateDefect($connect, $RecordID, $TR, $defectResult_pivot['73d'], "73");
updateDefect($connect, $RecordID, $TH, $defectResult_pivot['72d'], "72");
updateDefect($connect, $RecordID, $MF, $defectResult_pivot['70d'], "70");

updateDefect($connect, $RecordID, $ICP, $defectResult_pivot['74d'], "74");
updateDefect($connect, $RecordID, $NP, $defectResult_pivot['75d'], "75");
updateDefect($connect, $RecordID, $WP, $defectResult_pivot['76d'], "76");

updateDefect($connect, $RecordID, $BF, $defectResult_pivot['77d'], "77");
updateDefect($connect, $RecordID, $P, $defectResult_pivot['83d'], "83");
updateDefect($connect, $RecordID, $CF, $defectResult_pivot['78d'], "78");
updateDefect($connect, $RecordID, $SF, $defectResult_pivot['84d'], "84");
updateDefect($connect, $RecordID, $TAHs, $defectResult_pivot['85d'], "85");
updateDefect($connect, $RecordID, $FKS, $defectResult_pivot['80d'], "80");
updateDefect($connect, $RecordID, $THs, $defectResult_pivot['86d'], "86");
updateDefect($connect, $RecordID, $FT, $defectResult_pivot['81d'], "81");
updateDefect($connect, $RecordID, $TRS, $defectResult_pivot['87d'], "87");
updateDefect($connect, $RecordID, $GB, $defectResult_pivot['82d'], "82");
updateDefect($connect, $RecordID, $CHs, $defectResult_pivot['79d'], "79");
updateDefect($connect, $RecordID, $L_HOLES1, $defectResult_pivot['143d'], "143");

updateDefect($connect, $RecordID, $BF_2, $defectResult_pivot['88d'], "88");
updateDefect($connect, $RecordID, $P_2, $defectResult_pivot['94d'], "94");
updateDefect($connect, $RecordID, $CF_2, $defectResult_pivot['89d'], "89");
updateDefect($connect, $RecordID, $SF_2, $defectResult_pivot['95d'], "95");
updateDefect($connect, $RecordID, $TAHs_2, $defectResult_pivot['96d'], "96");
updateDefect($connect, $RecordID, $FKS_2, $defectResult_pivot['91d'], "91");
updateDefect($connect, $RecordID, $THs_2, $defectResult_pivot['97d'], "97");
updateDefect($connect, $RecordID, $FT_2, $defectResult_pivot['92d'], "92");
updateDefect($connect, $RecordID, $TRS_2, $defectResult_pivot['98d'], "98");
updateDefect($connect, $RecordID, $GB_2, $defectResult_pivot['93d'], "93");
updateDefect($connect, $RecordID, $CHs_2, $defectResult_pivot['90d'], "90");
updateDefect($connect, $RecordID, $L_HOLES2, $defectResult_pivot['144d'], "144");

updateDefect($connect, $RecordID, $WLN, $defectResult_pivot['113d'], "113");
updateDefect($connect, $RecordID, $WPC, $defectResult_pivot['115d'], "115");
updateDefect($connect, $RecordID, $WMD, $defectResult_pivot['114d'], "114");
updateDefect($connect, $RecordID, $MM, $defectResult_pivot['111d'], "111");
updateDefect($connect, $RecordID, $WED, $defectResult_pivot['112d'], "112");
updateDefect($connect, $RecordID, $IP, $defectResult_pivot['110d'], "110");

updateDefect($connect, $RecordID, $WQ, $defectResult_pivot['133d'], "133");
updateDefect($connect, $RecordID, $WGS, $defectResult_pivot['129d'], "129");
updateDefect($connect, $RecordID, $WTS, $defectResult_pivot['134d'], "134");
updateDefect($connect, $RecordID, $MSG, $defectResult_pivot['121d'], "121");
updateDefect($connect, $RecordID, $WPD, $defectResult_pivot['131d'], "131");
updateDefect($connect, $RecordID, $MS, $defectResult_pivot['122d'], "122");
updateDefect($connect, $RecordID, $WGT, $defectResult_pivot['130d'], "130");
updateDefect($connect, $RecordID, $PTS, $defectResult_pivot['126d'], "126");
updateDefect($connect, $RecordID, $FC, $defectResult_pivot['118d'], "118");
updateDefect($connect, $RecordID, $MSI, $defectResult_pivot['123d'], "123");
updateDefect($connect, $RecordID, $MB, $defectResult_pivot['119d'], "119");
updateDefect($connect, $RecordID, $WGA, $defectResult_pivot['128d'], "128");
updateDefect($connect, $RecordID, $WPO, $defectResult_pivot['132d'], "132");
updateDefect($connect, $RecordID, $POS, $defectResult_pivot['125d'], "125");
updateDefect($connect, $RecordID, $TRP, $defectResult_pivot['127d'], "127");
updateDefect($connect, $RecordID, $MLN, $defectResult_pivot['120d'], "120");
updateDefect($connect, $RecordID, $OS, $defectResult_pivot['124d'], "124");
updateDefect($connect, $RecordID, $DMG, $defectResult_pivot['117d'], "117");
updateDefect($connect, $RecordID, $BC, $defectResult_pivot['116d'], "116");

updateDefect($connect, $RecordID, $WT, $defectResult_pivot['142d'], "142");
updateDefect($connect, $RecordID, $PIS, $defectResult_pivot['139d'], "139");
updateDefect($connect, $RecordID, $CT, $defectResult_pivot['135d'], "135");
updateDefect($connect, $RecordID, $MSA, $defectResult_pivot['138d'], "138");
updateDefect($connect, $RecordID, $POP, $defectResult_pivot['12d'], "12");
updateDefect($connect, $RecordID, $WIS, $defectResult_pivot['141d'], "141");
updateDefect($connect, $RecordID, $FG, $defectResult_pivot['137d'], "137");
updateDefect($connect, $RecordID, $DT_PACKING, $defectResult_pivot['136d'], "136");

updateDefect($connect, $RecordID, $STNs, $defectResult_pivot['158d'], "158");
updateDefect($connect, $RecordID, $SLDs, $defectResult_pivot['160d'], "160");
updateDefect($connect, $RecordID, $Ls, $defectResult_pivot['161d'], "161");
updateDefect($connect, $RecordID, $GF, $defectResult_pivot['146d'], "146");
updateDefect($connect, $RecordID, $MS_critical, $defectResult_pivot['147d'], "147");
updateDefect($connect, $RecordID, $PFK, $defectResult_pivot['149d'], "149");
updateDefect($connect, $RecordID, $GSH, $defectResult_pivot['148d'], "148");
updateDefect($connect, $RecordID, $LH, $defectResult_pivot['150d'], "150");
updateDefect($connect, $RecordID, $MH, $defectResult_pivot['155d'], "155");
updateDefect($connect, $RecordID, $LH_2, $defectResult_pivot['151d'], "151");
updateDefect($connect, $RecordID, $MH_2, $defectResult_pivot['156d'], "156");
updateDefect($connect, $RecordID, $MG, $defectResult_pivot['162d'], "162");

updateDefect($connect, $RecordID, $MD, $defectResult_pivot['163d'], "163");
updateDefect($connect, $RecordID, $TP, $defectResult_pivot['164d'], "164");
updateDefect($connect, $RecordID, $SVD, $defectResult_pivot['165d'], "165");
updateDefect($connect, $RecordID, $FKI, $defectResult_pivot['166d'], "166");
updateDefect($connect, $RecordID, $FKO, $defectResult_pivot['167d'], "167");
updateDefect($connect, $RecordID, $GG, $defectResult_pivot['168d'], "168");
updateDefect($connect, $RecordID, $TSs, $defectResult_pivot['169d'], "169");
updateDefect($connect, $RecordID, $NCN, $defectResult_pivot['170d'], "170");
updateDefect($connect, $RecordID, $CNS, $defectResult_pivot['171d'], "171");
//-------------------------------------------------------------------------------------------------------------------------------


//------------------------------updating T_Record_SampleSize-------------------------------------------------

function updateSampleSize($connect,$RecordID ,$newVal,$oldVal, $identifierValue){
  $colVal_array = array(
    array(
      "col"=>"SampleSizeValue",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  //echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"SampleSizeCategoryKey",
      "iColVal"=>$identifierValue,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  //echo "<br />".$indentifier_JSON;
if($newVal != $oldVal ){
  updateRecord($connect,"T_Record_SampleSize", $RecordID, $colVal_JSON,$indentifier_JSON);
  }
}

updateSampleSize($connect, $RecordID, $sample_size, $T_Record_SampleSize[0]['SampleSizeValue'], "142");
updateSampleSize($connect, $RecordID, $sample_size_apt, $T_Record_SampleSize[1]['SampleSizeValue'], "168");
updateSampleSize($connect, $RecordID, $sample_size_apt2, $T_Record_SampleSize[2]['SampleSizeValue'], "169");

//-------------------------------------------------------------------------------------------------------------------------------


//------------------------------updating T_Record_UDResult-------------------------------------------------

function updateUDResult($connect,$RecordID ,$newVal,$oldVal, $identifierValue){
  $colVal_array = array(
    array(
      "col"=>"UDResultKey",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

 //echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"UDResultKey",
      "iColVal"=>$identifierValue,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  //echo "<br />".$indentifier_JSON;
  if($newVal != $oldVal ){
  updateRecord($connect,"T_Record_UDResult", $RecordID, $colVal_JSON,$indentifier_JSON);
  }
}

updateUDResult($connect, $RecordID, $UDResultKey, $T_Record_UDResult[0]['UDResultCode'], $T_Record_UDResult[0]['UDResultCode']);

//-------------------------------------------------------------------------------------------------------------------------------


//------------------------------updating T_Lot_SFG-------------------------------------------------
$matching = $T_Lot_SFG['GloveColourName'];
$query = "SELECT * FROM M_GloveColour";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{

    if($row['GloveColourName'] == $matching ){
    $oldColourCode = $row['GloveColourCode'];
    }
}
  $colVal_array = array(
    array(
      "col"=>"PlantKey",
      "newcolval"=>$Plant,
      "oldcolval"=>$T_Lot_SFG['PlantName'],
    )
    ,array(
      "col"=>"BatchNumber",
      "newcolval"=>$BatchNumber,
      "oldcolval"=>$T_Lot_SFG['BatchNumber'],
    )
    ,array(
      "col"=>"CustomerKey",
      "newcolval"=>$Customer,
      "oldcolval"=>$T_Lot_SFG['CustomerName'],
    )
    ,array(
      "col"=>"BrandKey",
      "newcolval"=>$Brand,
      "oldcolval"=>$T_Lot_SFG['BrandName'],
    )
    ,array(
      "col"=>"LotNumber",
      "newcolval"=>$LotNumber,
      "oldcolval"=>$T_Lot_SFG['LotNumber'],
    )
    ,array(
      "col"=>"InspectionPlanKey",
      "newcolval"=>$InspectionPlan,
      "oldcolval"=>$T_Lot_SFG['InspectionPlanName'],
    )
    ,array(
      "col"=>"CartonQuantity",
      "newcolval"=>$CartonQuantity,
      "oldcolval"=>$T_Lot_SFG['CartonQuantity'],
    )
    ,array(
      "col"=>"GloveCodeKey",
      "newcolval"=>$GloveCode,
      "oldcolval"=>$T_Lot_SFG['GloveCodeLong'],
    )
    ,array(
      "col"=>"GloveColourKey",
      "newcolval"=>$GloveColour,
      "oldcolval"=>$oldColourCode,
    )
    ,array(
      "col"=>"GloveProductTypeKey",
      "newcolval"=>$GloveProductType,
      "oldcolval"=>$T_Lot_SFG['GloveProductTypeName'],
    )
    ,array(
      "col"=>"GloveSizeKey",
      "newcolval"=>$GloveSize,
      "oldcolval"=>$T_Lot_SFG['GloveSizeCodeLong'],
    )

  );

  $colVal_JSON = json_encode($colVal_array);

  // echo "<br />".$colVal_JSON;

  if($Plant != $T_Lot_SFG['PlantName']
   OR $BatchNumber != $T_Lot_SFG['BatchNumber']
   OR $Customer != $T_Lot_SFG['CustomerName']
   OR $Brand != $T_Lot_SFG['BrandName']
   OR $LotNumber != $T_Lot_SFG['LotNumber']
   OR $InspectionPlan != $T_Lot_SFG['InspectionPlanName']
   OR $CartonQuantity != $T_Lot_SFG['CartonQuantity']
   OR $GloveCode != $T_Lot_SFG['GloveCodeLong']
   OR $GloveColour != $oldColourCode
   OR $GloveProductType != $T_Lot_SFG['GloveProductTypeName']
   OR $GloveSize != $T_Lot_SFG['GloveSizeCodeLong']
  ){

  updateLot($connect,"T_Lot_SFG", $lotID, $colVal_JSON,null);
  }

//-------------------------------------------------------------------------------------------------------------------------------

//------------------------------updating T_Lot_PackingDate-------------------------------------------------

function updatePackingDate($connect,$lotID ,$newVal,$oldVal, $identifierValue){
  $colVal_array = array(
    array(
      "col"=>"PackingDate",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  // echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"Shift",
      "iColVal"=>$identifierValue,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  // echo "<br />".$indentifier_JSON;
if($newVal != $oldVal ){
  updateLot($connect,"T_Lot_PackingDate", $lotID, $colVal_JSON,$indentifier_JSON);
  }
}

updatePackingDate($connect, $lotID, $PackingDate, $T_Lot_PackingDate['PackingDate'], "0");

//-------------------------------------------------------------------------------------------------------------------------------


//------------------------------updating T_Lot_ProductionDateWLine-------------------------------------------------

$Line_array[0] = array(

    "lotidkey"=>$lotID,
    "plant"=>$Plant,
    "productiondate"=>$ProductDate1,
    "shift"=>$Shift1,
    "productionline"=>$ProductionLineKey1,
    "productionkey"=>"1",
);

if($ProductDate2 != ''){
  $Line_array[1] = array(

      "lotidkey"=>$lotID,
      "plant"=>$Plant,
      "productiondate"=>$ProductDate2,
      "shift"=>$Shift2,
      "productionline"=>$ProductionLineKey2,
      "productionkey"=>"2",
  );
}

if($ProductDate3 != ''){
  $Line_array[2] = array(

      "lotidkey"=>$lotID,
      "plant"=>$Plant,
      "productiondate"=>$ProductDate3,
      "shift"=>$Shift3,
      "productionline"=>$ProductionLineKey3,
      "productionkey"=>"3",
  );
}

$tableName = "T_Lot_ProductionDateWLine";


function updatePDWL($connect,$lotID ,$newDateVal, $oldDateVal, $newShiftVal, $oldShiftVal ,$newLineVal, $oldLineVal, $identifierValue, $identifierValue2){
  $colVal_array = array(
    array(
      "col"=>"ProductionDate",
      "newcolval"=>$newDateVal,
      "oldcolval"=>$oldDateVal,
    )
    ,array(
      "col"=>"Shift",
      "newcolval"=>$newShiftVal,
      "oldcolval"=>$oldShiftVal,
    )
    ,array(
      "col"=>"ProductionLineKey",
      "newcolval"=>$newLineVal,
      "oldcolval"=>$oldLineVal,
    )

  );

  $colVal_JSON = json_encode($colVal_array);

  //echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"Shift",
      "iColVal"=>$identifierValue,
    )
    ,array(
      "iCol"=>"ProductionKey",
      "iColVal"=>$identifierValue2,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  // echo "<br />".$indentifier_JSON;
  if($newDateVal != $oldDateVal
  OR $newShiftVal != $oldShiftVal
  OR $newLineVal != $oldLineVal
  ){
  updateLot($connect,"T_Lot_ProductionDateWLine", $lotID, $colVal_JSON,$indentifier_JSON);
  }
}

updatePDWL($connect, $lotID, $ProductDate1, $T_Lot_ProductionDateWLine[0]['ProductionDate'], $Shift1, $T_Lot_ProductionDateWLine[0]['SHIFT'], $ProductionLineKey1, $T_Lot_ProductionDateWLine[0]['ProductionLineName'], $T_Lot_ProductionDateWLine[0]['SHIFT'], "1");
if(count($T_Lot_ProductionDateWLine) >= 2){
  updatePDWL($connect, $lotID, $ProductDate2, $T_Lot_ProductionDateWLine[1]['ProductionDate'], $Shift2, $T_Lot_ProductionDateWLine[1]['SHIFT'], $ProductionLineKey2, $T_Lot_ProductionDateWLine[1]['ProductionLineName'], $T_Lot_ProductionDateWLine[1]['SHIFT'], "2");
  if(count($T_Lot_ProductionDateWLine) >= 3){
    updatePDWL($connect, $lotID, $ProductDate3, $T_Lot_ProductionDateWLine[2]['ProductionDate'], $Shift3, $T_Lot_ProductionDateWLine[2]['SHIFT'], $ProductionLineKey3, $T_Lot_ProductionDateWLine[2]['ProductionLineName'], $T_Lot_ProductionDateWLine[2]['SHIFT'], "3");
  }
}



function newProdLine($connect, $tableName, $Line_JSON){

  $NewLine = "[".$Line_JSON."]";
  $query5 = $connect->prepare("{CALL SP_INSERTEXTRALOT(?,?)}");
  $query5 -> bindParam(1, $tableName);
  $query5 -> bindParam(2, $NewLine);
  $query5->execute();
}

if(count($T_Lot_ProductionDateWLine) == 1 &&  $ProductDate2 != '' && $Shift2 != ''){
  newProdLine($connect, $tableName, json_encode($Line_array[1]));
}


if(count($T_Lot_ProductionDateWLine) == 2 &&  $ProductDate3 != '' && $Shift3 != ''){
  newProdLine($connect, $tableName, json_encode($Line_array[2]));
}

//-------------------------------------------------------------------------------------------------------------------------------


//------------------------------updating T_Lot_CartonNum-------------------------------------------------

$OldCartonNum  = explode(",", $T_Lot_CartonNum['CartonNum']);
$tableName2 = "T_Lot_CartonNum";


function updateCartonNum($connect,$lotID ,$newVal, $oldVal){
  $colVal_array = array(
    array(
      "col"=>"CartonNum",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  // echo "<br />".$colVal_JSON;

if($newVal != $oldVal ){
  updateLot($connect,"T_Lot_CartonNum", $lotID, $colVal_JSON,null);
  }
}

function newCartonNum($connect, $tableName, $newCarton_JSON){

  $NewCarton = "[".$newCarton_JSON."]";
  $query5 = $connect->prepare("{CALL SP_INSERTEXTRALOT(?,?)}");
  $query5 -> bindParam(1, $tableName);
  $query5 -> bindParam(2, $NewCarton);
  $query5->execute();
}

$iStart =0;
for($i = 0; $i < count($OldCartonNum); $i++ ){
  updateCartonNum($connect, $lotID, $CartonNum[$i], $OldCartonNum[$i]);
  $iStart = $i;
}

if(count($OldCartonNum) < count($CartonNum)){
  for($i = $iStart+1; $i < count($CartonNum); $i++ ){
    //echo "<br /> new value for add:".$CartonNum[$i];
    $cartonArr = array(
      "lotidkey"=>$lotID,
      "cartonnum"=>$CartonNum[$i],
    );

    newCartonNum($connect, $tableName2, json_encode($cartonArr));

  }
}

//-------------------------------------------------------------------------------------------------------------------------------


           echo"<script>alert('Data is saved!!');</script>";
          // echo '<meta http-equiv="refresh" content="0">';
          echo"<script>location.replace('transaction-SFG-Edit.php?LotIDKey=".$lotID."&RecordID=".$RecordID."');</script>";

//-------------------------------------------------------------------------------------------------------------------------------

} //if isset submit

            ?>

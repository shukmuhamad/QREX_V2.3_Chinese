<?php
        if (isset($_POST['submit']))
        {
            //$LotIDKey               = $_POST['LotIDKey'];
            $Plant                  = $_POST['PlantKey'];
            $RecordCreatedDateTime  = date('Y-m-d H:i:s', strtotime(str_replace("/","-",$_POST['RecordCreatedDateTime'])));
            $BatchNumber            = $_POST['BatchNumber'];
            $SONumber               = $_POST['SONumber'];
            $LotCount               = $_POST['LotCount'];
            $ItemNumber             = $_POST['SOItemNumber'];
            $InspectionPlan         = $_POST['InspectionPlanKey'];
            $GloveSize              = $_POST['GloveSizeCodeLong'];
            $PalletNumber           = $_POST['PalletNumber'];
            $InspectionCount        = $_POST['InspectionCount'];
            $CartonQuantity         = $_POST['CartonQuantity'];
            $palletID               = $_POST['PalletID'];
            $FGCondition            = $_POST['inspection_stage'];
            $LotIDPreset            = '';
            $RecordIDPreset         = '';
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
            $ProductDate1           = date('Y-m-d H:i:s', strtotime(str_replace("/","-",$_POST['product_date1'])));
            $ProductDate2           = date('Y-m-d H:i:s', strtotime(str_replace("/","-",$_POST['product_date2'])));
            $ProductDate3           = date('Y-m-d H:i:s', strtotime(str_replace("/","-",$_POST['product_date3'])));
            $Shift1                 = $_POST['shift1'];
            $Shift2                 = $_POST['shift2'];
            $Shift3                 = $_POST['shift3'];
            $PackingDate            = $_POST['PackingDate'];
            $InspectionUserID       = $_POST['InspectionUserID'];
            $VerifierID              = NULL;//$_POST['verify_by'];
            $VerifiedDate            = NULL;//date('Y-m-d H:i:s', strtotime(str_replace("/","-",$_POST['date_verify'])));
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
            $Acceptance_nag     = $_REQUEST['Acceptance_nag'];
            $Acceptance_nfg     = $_REQUEST['Acceptance_nfg'];
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







//---------------------------------------------------------PRODUCT INFORMATION---------------------------------------------------------//






  $ReinspectionFlag = '1';
  // echo $ReinspectionFlag."<br>";

  $ConvertFlag = '0';
  // echo $ConvertFlag."<br>";

  $PackingShift = '0';
  // echo $PackingShift."<br>";


  $GloveSurface = 'Z';
  // echo $GloveSurface."<br>";


  $AQL = array(
    array(
      "AQLDescription"=>"AQLMinor",
      "AQLValue"=>$AQL_minor
    )
    ,array(
      "AQLDescription"=>"AcceptanceMinor",
      "AQLValue"=>$Acceptance_minor
    )
    ,array(
      "AQLDescription"=>"AQLMajor",
      "AQLValue"=>$AQL_major
    )
    ,array(
      "AQLDescription"=>"AcceptanceMajor",
      "AQLValue"=>$Acceptance_major
    )
    ,array(
      "AQLDescription"=>"AQLHoles1",
      "AQLValue"=>$AQL_holes1
    )
    ,array(
      "AQLDescription"=>"AcceptanceHoles1",
      "AQLValue"=>$Acceptance_holes1
    )
    ,array(
      "AQLDescription"=>"AQLHoles2",
      "AQLValue"=>$AQL_holes2
    )
    ,array(
      "AQLDescription"=>"AcceptanceHoles2",
      "AQLValue"=>$Acceptance_holes2
    )
    ,array(
      "AQLDescription"=>"AQLOverall",
      "AQLValue"=>$overall_AQL
    )
    ,array(
      "AQLDescription"=>"AQLVisualPackaging",
      "AQLValue"=>$AQL_VisualPackaging
    )
    ,array(
      "AQLDescription"=>"AcceptanceVisualPackaging",
      "AQLValue"=>$Acceptance_VisualPackaging
    )
    ,array(
      "AQLDescription"=>"AQLCriticalPackaging",
      "AQLValue"=>$AQL_CriticalPackaging
    )
    ,array(
      "AQLDescription"=>"AcceptanceCriticalPackaging",
      "AQLValue"=>$Acceptance_CriticalPackaging
    )
    ,array(
      "AQLDescription"=>"AQLRegulatoryPackaging",
      "AQLValue"=>$AQL_regulatoryPackaging
    )
    ,array(
      "AQLDescription"=>"AcceptanceRegulatoryPackaging",
      "AQLValue"=>$Acceptance_RegulatoryPackaging
    )
    ,array(
      "AQLDescription"=>"ResultVisualPackaging",
      "AQLValue"=>$Result_VisualPackaging
    )
    ,array(
      "AQLDescription"=>"ResultCriticalPackaging",
      "AQLValue"=>$Result_CriticalPackaging
    )
    ,array(
      "AQLDescription"=>"ResultRegulatoryPackaging",
      "AQLValue"=>$Result_RegulatoryPackaging
    )
    ,array(
      "AQLDescription"=>"FinalDisposition",
      "AQLValue"=>$Final_Disposition
    )
    ,array(
      "AQLDescription"=>"AcceptanceNFG",
      "AQLValue"=>$Acceptance_nfg
    )
    ,array(
      "AQLDescription"=>"AcceptanceNAG_CP",
      "AQLValue"=>$Acceptance_nag
    )
    ,array(
      "AQLDescription"=>"AQLNFG",
      "AQLValue"=>$AQL_criticalNFG
    )
    ,array(
      "AQLDescription"=>"AQLNAG_CP",
      "AQLValue"=>$AQL_criticalNAG
    )
    ,array(
      "AQLDescription"=>"AQLGG",
      "AQLValue"=>$AQL_gg
    )
    ,array(
      "AQLDescription"=>"AcceptanceGG",
      "AQLValue"=>$Acceptance_gg
    )

  );


  $AQLResult_JSON = json_encode($AQL);
  // echo "AQL";
  // echo "<br>";
  // echo $AQLResult_JSON;
  //
  // echo "<br>";
  // echo "<br>";
  // echo "<br>";

  $ProductionDateWLine[0]=array(
      "Plant"=>$Plant ,
      "ProductionDate"=>$ProductDate1 ,
      "Shift"=>$Shift1,
      "ProductionLine"=>$ProductionLineKey1,
      "ProductionKey"=>"1"
  );
  if($ProductionLineKey2 != NULL){
    $ProductionDateWLine[1]=array(
        "Plant"=>$Plant ,
        "ProductionDate"=>$ProductDate2 ,
        "Shift"=>$Shift2,
        "ProductionLine"=>$ProductionLineKey2,
        "ProductionKey"=>"2"
    );
  }
  if($ProductionLineKey3 != NULL){
  $ProductionDateWLine[2]=array(
    "Plant"=>$Plant ,
    "ProductionDate"=>$ProductDate3 ,
    "Shift"=>$Shift3,
    "ProductionLine"=>$ProductionLineKey3,
      "ProductionKey"=>"3"
  );
  }



  $ProductionDateWLine_JSON = json_encode($ProductionDateWLine);

  // echo "ProductionDate";
  // echo "<br>";
  // echo "<script> alert('$ProductionDateWLine_JSON'); </script>";
  //
  //
  // echo "<br>";
  // echo "<br>";
  // echo "<br>";

  $DefectResult=array(
      //------------MINOR-------------------//
    array(
      "Defect"=>"1",
      "DefectValue"=>$DB
    ),
    array(
      "Defect"=>"2",
      "DefectValue"=>$SD
    ),
    array(
      "Defect"=>"3",
      "DefectValue"=>$SP
    ),
    array(
      "Defect"=>"158",
      "DefectValue"=>$STNs
    ),
    array(
      "Defect"=>"160",
      "DefectValue"=>$SLDs
    ),
    array(
      "Defect"=>"161",
      "DefectValue"=>$Ls
    ),

    //------------MAJOR-------------------//
    array(
      "Defect"=>"4",
      "DefectValue"=>$CA
    ),
    array(
      "Defect"=>"5",
      "DefectValue"=>$CL
    ),
    array(
      "Defect"=>"6",
      "DefectValue"=>$CLD
    ),
    array(
      "Defect"=>"7",
      "DefectValue"=>$CS
    ),
    array(
      "Defect"=>"8",
      "DefectValue"=>$DF
    ),
    array(
      "Defect"=>"9",
      "DefectValue"=>$DT
    ),
    array(
      "Defect"=>"10",
      "DefectValue"=>$EFI
    ),
    array(
      "Defect"=>"11",
      "DefectValue"=>$FM
    ),
    array(
      "Defect"=>"12",
      "DefectValue"=>$FNO
    ),
    array(
      "Defect"=>"13",
      "DefectValue"=>$FO
    ),
    array(
      "Defect"=>"14",
      "DefectValue"=>$GNO
    ),
    array(
      "Defect"=>"15",
      "DefectValue"=>$IB
    ),
    array(
      "Defect"=>"16",
      "DefectValue"=>$ICT
    ),
    array(
      "Defect"=>"17",
      "DefectValue"=>$L_Major
    ),
    array(
      "Defect"=>"18",
      "DefectValue"=>$LS
    ),
    array(
      "Defect"=>"19",
      "DefectValue"=>$PLM
    ),
    array(
      "Defect"=>"20",
      "DefectValue"=>$PMI
    ),
    array(
      "Defect"=>"21",
      "DefectValue"=>$PMO
    ),
    array(
      "Defect"=>"22",
      "DefectValue"=>$RC
    ),
    array(
      "Defect"=>"23",
      "DefectValue"=>$RM
    ),
    array(
      "Defect"=>"24",
      "DefectValue"=>$SAG
    ),
    array(
      "Defect"=>"25",
      "DefectValue"=>$SG
    ),
    array(
      "Defect"=>"26",
      "DefectValue"=>$SHN
    ),
    array(
      "Defect"=>"27",
      "DefectValue"=>$SI
    ),
    array(
      "Defect"=>"28",
      "DefectValue"=>$SKV
    ),
    array(
      "Defect"=>"29",
      "DefectValue"=>$SLD
    ),
    array(
      "Defect"=>"30",
      "DefectValue"=>$SO
    ),
    array(
      "Defect"=>"31",
      "DefectValue"=>$STK
    ),
    array(
      "Defect"=>"32",
      "DefectValue"=>$STN
    ),
    array(
      "Defect"=>"33",
      "DefectValue"=>$TA
    ),
    array(
      "Defect"=>"34",
      "DefectValue"=>$TS
    ),
    array(
      "Defect"=>"35",
      "DefectValue"=>$UNF
    ),
    array(
      "Defect"=>"36",
      "DefectValue"=>$WL
    ),
    array(
      "Defect"=>"37",
      "DefectValue"=>$WSI
    ),
    array(
      "Defect"=>"38",
      "DefectValue"=>$WSO
    ),
    array(
      "Defect"=>"146",
      "DefectValue"=>$GF
    ),

    //-------------------------------//

    array(
      "Defect"=>"40",
      "DefectValue"=>$BP
    ),
    array(
      "Defect"=>"41",
      "DefectValue"=>$DP
    ),
    array(
      "Defect"=>"42",
      "DefectValue"=>$DSP
    ),
    array(
      "Defect"=>"43",
      "DefectValue"=>$DTP
    ),
    array(
      "Defect"=>"44",
      "DefectValue"=>$IA
    ),
    array(
      "Defect"=>"45",
      "DefectValue"=>$IFS
    ),
    array(
      "Defect"=>"46",
      "DefectValue"=>$IP_MAJOR
    ),
    array(
      "Defect"=>"47",
      "DefectValue"=>$OP
    ),
    array(
      "Defect"=>"48",
      "DefectValue"=>$RP
    ),
    array(
      "Defect"=>"49",
      "DefectValue"=>$SH
    ),
    array(
      "Defect"=>"50",
      "DefectValue"=>$SMP
    ),

      //-------------CRITICAL------------------//
      //--------------NAG---------------------//
    array(
      "Defect"=>"51",
      "DefectValue"=>$BPC
    ),
    array(
      "Defect"=>"52",
      "DefectValue"=>$CR
    ),
    array(
      "Defect"=>"53",
      "DefectValue"=>$DC
    ),
    array(
      "Defect"=>"54",
      "DefectValue"=>$DD
    ),
    array(
      "Defect"=>"55",
      "DefectValue"=>$DIS
    ),
    array(
      "Defect"=>"56",
      "DefectValue"=>$FMT
    ),
    array(
      "Defect"=>"57",
      "DefectValue"=>$GL
    ),
    array(
      "Defect"=>"58",
      "DefectValue"=>$L
    ),
    array(
      "Defect"=>"59",
      "DefectValue"=>$MP
    ),
    array(
      "Defect"=>"60",
      "DefectValue"=>$NB
    ),
    array(
      "Defect"=>"61",
      "DefectValue"=>$NF
    ),
    array(
      "Defect"=>"62",
      "DefectValue"=>$PGM
    ),
    array(
      "Defect"=>"63",
      "DefectValue"=>$SDG
    ),
    array(
      "Defect"=>"64",
      "DefectValue"=>$TW
    ),
    array(
      "Defect"=>"65",
      "DefectValue"=>$URD
    ),
    array(
      "Defect"=>"66",
      "DefectValue"=>$WE
    ),
    array(
      "Defect"=>"67",
      "DefectValue"=>$WG
    ),
    array(
      "Defect"=>"147",
      "DefectValue"=>$MS_critical
    ),
    array(
      "Defect"=>"149",
      "DefectValue"=>$PFK
    ),

    //------------------------NFG-------------------------------------//
    array(
      "Defect"=>"68",
      "DefectValue"=>$CH
    ),
    array(
      "Defect"=>"69",
      "DefectValue"=>$FK
    ),
    array(
      "Defect"=>"70",
      "DefectValue"=>$MF
    ),
    array(
      "Defect"=>"71",
      "DefectValue"=>$TAH
    ),
    array(
      "Defect"=>"72",
      "DefectValue"=>$TH
    ),
    array(
      "Defect"=>"73",
      "DefectValue"=>$TR
    ),
    array(
      "Defect"=>"148",
      "DefectValue"=>$GSH
    ),
    //--------------------printing------------------------//
    array(
      "Defect"=>"74",
      "DefectValue"=>$ICP
    ),
    array(
      "Defect"=>"75",
      "DefectValue"=>$NP
    ),
    array(
      "Defect"=>"76",
      "DefectValue"=>$WP
    ),

    //------------HOLES1-------------------//
    array(
      "Defect"=>"77",
      "DefectValue"=>$BF
    ),
    array(
      "Defect"=>"78",
      "DefectValue"=>$CF
    ),
    array(
      "Defect"=>"79",
      "DefectValue"=>$CHs
    ),
    array(
      "Defect"=>"80",
      "DefectValue"=>$FKS
    ),
    array(
      "Defect"=>"81",
      "DefectValue"=>$FT
    ),
    array(
      "Defect"=>"82",
      "DefectValue"=>$GB
    ),
    array(
      "Defect"=>"83",
      "DefectValue"=>$P
    ),
    array(
      "Defect"=>"84",
      "DefectValue"=>$SF
    ),
    array(
      "Defect"=>"85",
      "DefectValue"=>$TAHs
    ),
    array(
      "Defect"=>"86",
      "DefectValue"=>$THs
    ),
    array(
      "Defect"=>"87",
      "DefectValue"=>$TRS
    ),
    array(
      "Defect"=>"143",
      "DefectValue"=>$L_HOLES1
    ),
    array(
      "Defect"=>"150",
      "DefectValue"=>$LH
    ),
    array(
      "Defect"=>"155",
      "DefectValue"=>$MH
    ),
        //--------------HOLES2-----------------//
    array(
      "Defect"=>"88",
      "DefectValue"=>$BF_2
    ),
    array(
      "Defect"=>"89",
      "DefectValue"=>$CF_2
    ),
    array(
      "Defect"=>"90",
      "DefectValue"=>$CHs_2
    ),
    array(
      "Defect"=>"91",
      "DefectValue"=>$FKS_2
    ),
    array(
      "Defect"=>"92",
      "DefectValue"=>$FT_2
    ),
    array(
      "Defect"=>"93",
      "DefectValue"=>$GB_2
    ),
    array(
      "Defect"=>"94",
      "DefectValue"=>$P_2
    ),
    array(
      "Defect"=>"95",
      "DefectValue"=>$SF_2
    ),
    array(
      "Defect"=>"96",
      "DefectValue"=>$TAHs_2
    ),
    array(
      "Defect"=>"97",
      "DefectValue"=>$THs_2
    ),
    array(
      "Defect"=>"98",
      "DefectValue"=>$TRS_2
    ),
    array(
      "Defect"=>"144",
      "DefectValue"=>$L_HOLES2
    ),
    array(
      "Defect"=>"151",
      "DefectValue"=>$LH_2
    ),
    array(
      "Defect"=>"156",
      "DefectValue"=>$MH_2
    ),

    //-------------REGULATOR------------------//
    array(
      "Defect"=>"110",
      "DefectValue"=>$IP
    ),
    array(
      "Defect"=>"111",
      "DefectValue"=>$MM
    ),
    array(
      "Defect"=>"112",
      "DefectValue"=>$WED
    ),
    array(
      "Defect"=>"113",
      "DefectValue"=>$WLN
    ),
    array(
      "Defect"=>"114",
      "DefectValue"=>$WMD
    ),
    array(
      "Defect"=>"115",
      "DefectValue"=>$WPC
    ),

    //-------------CRITICAL PACKAGING------------------//

    array(
      "Defect"=>"116",
      "DefectValue"=>$BC
    ),
    array(
      "Defect"=>"117",
      "DefectValue"=>$DMG
    ),
    array(
      "Defect"=>"118",
      "DefectValue"=>$FC
    ),
    array(
      "Defect"=>"119",
      "DefectValue"=>$MB
    ),
    array(
      "Defect"=>"120",
      "DefectValue"=>$MLN
    ),
    array(
      "Defect"=>"121",
      "DefectValue"=>$MSG
    ),
    array(
      "Defect"=>"122",
      "DefectValue"=>$MS
    ),
    array(
      "Defect"=>"123",
      "DefectValue"=>$MSI
    ),
    array(
      "Defect"=>"124",
      "DefectValue"=>$OS
    ),
    array(
      "Defect"=>"125",
      "DefectValue"=>$POS
    ),
    array(
      "Defect"=>"126",
      "DefectValue"=>$PTS
    ),
    array(
      "Defect"=>"127",
      "DefectValue"=>$TRP
    ),
    array(
      "Defect"=>"128",
      "DefectValue"=>$WGA
    ),
    array(
      "Defect"=>"129",
      "DefectValue"=>$WGS
    ),
    array(
      "Defect"=>"130",
      "DefectValue"=>$WGT
    ),
    array(
      "Defect"=>"131",
      "DefectValue"=>$WPD
    ),
    array(
      "Defect"=>"132",
      "DefectValue"=>$WPO
    ),
    array(
      "Defect"=>"133",
      "DefectValue"=>$WQ
    ),
    array(
      "Defect"=>"134",
      "DefectValue"=>$WTS
    ),

    //--------------VISUAL PACKAGING-----------------//
    array(
      "Defect"=>"135",
      "DefectValue"=>$CT
    ),
    array(
      "Defect"=>"136",
      "DefectValue"=>$DT_PACKING
    ),
    array(
      "Defect"=>"137",
      "DefectValue"=>$FG
    ),
    array(
      "Defect"=>"138",
      "DefectValue"=>$MSA
    ),
    array(
      "Defect"=>"139",
      "DefectValue"=>$PIS
    ),
    array(
      "Defect"=>"140",
      "DefectValue"=>$POP
    ),
    array(
      "Defect"=>"141",
      "DefectValue"=>$WIS
    ),
    array(
      "Defect"=>"142",
      "DefectValue"=>$WT
    ),
    //-------------------add new defect here------//
    array(
      "Defect"=>"162",
      "DefectValue"=>$MG
    ),
    array(
      "Defect"=>"163",
      "DefectValue"=>$MD
    ),
    array(
      "Defect"=>"164",
      "DefectValue"=>$TP
    ),
    array(
      "Defect"=>"165",
      "DefectValue"=>$SVD
    ),
    array(
      "Defect"=>"166",
      "DefectValue"=>$FKI
    ),
    array(
      "Defect"=>"167",
      "DefectValue"=>$FKO
    ),
    array(
      "Defect"=>"168",
      "DefectValue"=>$GG
    ),
    array(
      "Defect"=>"169",
      "DefectValue"=>$TSs
    ),
    array(
      "Defect"=>"170",
      "DefectValue"=>$NCN
    ),
    array(
      "Defect"=>"171",
      "DefectValue"=>$CNS
    ),
  );



  $DefectResult_JSON = json_encode($DefectResult);
  // echo "Defect result";
  // echo "<br>";
  // echo $DefectResult_JSON;
  //
  // echo "<br>";
  // echo "<br>";
  // echo "<br>";

  $Instrument = array(
    array(
      "Instrument"=>"Weighing Scale ID",
      "InstrumentValue"=>$WeighingScaleID
    )
    ,array(
      "Instrument"=>"Thickness Gauge",
      "InstrumentValue"=>$ThicknessGauge
    )
    ,array(
      "Instrument"=>"Ruler ID",
      "InstrumentValue"=>$RulerID
    )
    ,array(
      "Instrument"=>"APT/WTT ID",
      "InstrumentValue"=>$machine_id
    )
  );



  $InstrumentResult_JSON = json_encode($Instrument);


  // echo "Instrument result";
  // echo "<br>";
  // echo $InstrumentResult_JSON;
  //
  // echo "<br>";
  // echo "<br>";
  // echo "<br>";

  $TestResult=array(
    array(
      "Test"=>"ThicknessTestMethod",
      "TestValue"=>$ThicknessTestingMethod,
      "SRText"=>null
    ),
    array(
      "Test"=>"LayeringTest",
      "TestValue"=>$LayeringTest,
      "SRText"=>null
    ),
    array(
      "Test"=>"DonningTearingTest",
      "TestValue"=>$DonningTearingTest,
      "SRText"=>$SRText8
    ),
    array(
      "Test"=>"DispensingTest",
      "TestValue"=>$DispensingTest,
      "SRText"=>null
    ),
    array(
      "Test"=>"SmellTest",
      "TestValue"=>$SmellTest,
      "SRText"=>null
    ),
    array(
      "Test"=>"GripTest",
      "TestValue"=>$GripTest,
      "SRText"=>null
    ),
    array(
      "Test"=>"StickingTest",
      "TestValue"=>$StickingTest,
      "SRText"=>null
    ),
    array(
      "Test"=>"PackagingDefectsTest",
      "TestValue"=>$PackagingDefectsTest,
      "SRText"=>$SRTextPackaging
    ),
    array(
      "Test"=>"BlackClothTest",
      "TestValue"=>$BlackClothTest,
      "SRText"=>null
    ),
    array(
      "Test"=>"WhiteClothTest",
      "TestValue"=>$WhiteClothTest,
      "SRText"=>null
    ),
    array(
      "Test"=>"GloveWeightTest",
      "TestValue"=>$GloveWeightTest,
      "SRText"=>null
    ),
    array(
      "Test"=>"GloveWeightAverage",
      "TestValue"=>$SRText1,
      "SRText"=>null
    ),
    array(
      "Test"=>"CountingTest",
      "TestValue"=>$CountingTest,
      "SRText"=>$SRText2
    ),
    array(
      "Test"=>"LengthTest",
      "TestValue"=>$length_p_f ,
      "SRText"=>null
    ),
    array(
      "Test"=>"Length1",
      "TestValue"=>$length1,
      "SRText"=>null
    ),
    array(
      "Test"=>"Length2",
      "TestValue"=>$length2,
      "SRText"=>null
    ),
    array(
      "Test"=>"Length3",
      "TestValue"=>$length3,
      "SRText"=>null
    ),
    array(
      "Test"=>"Length4",
      "TestValue"=>$length4,
      "SRText"=>null
    ),
    array(
      "Test"=>"Length5",
      "TestValue"=>$length5,
      "SRText"=>null
    ),
    array(
      "Test"=>"Length6",
      "TestValue"=>$length6,
      "SRText"=>null
    ),
    array(
      "Test"=>"Length7",
      "TestValue"=>$length7,
      "SRText"=>null
    ),
    array(
      "Test"=>"Length8",
      "TestValue"=>$length8,
      "SRText"=>null
    ),
    array(
      "Test"=>"Length9",
      "TestValue"=>$length9,
      "SRText"=>null
    ),
    array(
      "Test"=>"Length10",
      "TestValue"=>$length10,
      "SRText"=>null
    ),
    array(
      "Test"=>"Length11",
      "TestValue"=>$length11,
      "SRText"=>null
    ),
    array(
      "Test"=>"Length12",
      "TestValue"=>$length12,
      "SRText"=>null
    ),
    array(
      "Test"=>"Length13",
      "TestValue"=>$length13,
      "SRText"=>null
    ),
    array(
      "Test"=>"WidthTest",
      "TestValue"=>$width_p_f,
      "SRText"=>null
    ),
    array(
      "Test"=>"Width1",
      "TestValue"=>$width1,
      "SRText"=>null
    ),
    array(
      "Test"=>"Width2",
      "TestValue"=>$width2,
      "SRText"=>null
    ),
    array(
      "Test"=>"Width3",
      "TestValue"=>$width3,
      "SRText"=>null
    ),
    array(
      "Test"=>"Width4",
      "TestValue"=>$width4,
      "SRText"=>null
    ),
    array(
      "Test"=>"Width5",
      "TestValue"=>$width5,
      "SRText"=>null
    ),
    array(
      "Test"=>"Width6",
      "TestValue"=>$width6,
      "SRText"=>null
    ),
    array(
      "Test"=>"Width7",
      "TestValue"=>$width7,
      "SRText"=>null
    ),
    array(
      "Test"=>"Width8",
      "TestValue"=>$width8,
      "SRText"=>null
    ),
    array(
      "Test"=>"Width9",
      "TestValue"=>$width9,
      "SRText"=>null
    ),
    array(
      "Test"=>"Width10",
      "TestValue"=>$width10,
      "SRText"=>null
    ),
    array(
      "Test"=>"Width11",
      "TestValue"=>$width11,
      "SRText"=>null
    ),
    array(
      "Test"=>"Width12",
      "TestValue"=>$width12,
      "SRText"=>null
    ),
    array(
      "Test"=>"Width13",
      "TestValue"=>$width13,
      "SRText"=>null
    ),
    array(
      "Test"=>"CuffTest",
      "TestValue"=>$cuff_p_f,
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff1",
      "TestValue"=>$cuff1,
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff2",
      "TestValue"=>$cuff2,
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff3",
      "TestValue"=>$cuff3,
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff4",
      "TestValue"=>$cuff4,
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff5",
      "TestValue"=>$cuff5,
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff6",
      "TestValue"=>$cuff6,
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff7",
      "TestValue"=>$cuff7,
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff8",
      "TestValue"=>$cuff8,
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff9",
      "TestValue"=>$cuff9,
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff10",
      "TestValue"=>$cuff10,
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff11",
      "TestValue"=>$cuff11,
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff12",
      "TestValue"=>$cuff12,
      "SRText"=>null
    ),
    array(
      "Test"=>"Cuff13",
      "TestValue"=>$cuff13,
      "SRText"=>null
    ),
    array(
      "Test"=>"PalmTest",
      "TestValue"=>$palm_p_f,
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm1",
      "TestValue"=>$palm1,
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm2",
      "TestValue"=>$palm2,
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm3",
      "TestValue"=>$palm3,
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm4",
      "TestValue"=>$palm4,
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm5",
      "TestValue"=>$palm5,
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm6",
      "TestValue"=>$palm6,
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm7",
      "TestValue"=>$palm7,
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm8",
      "TestValue"=>$palm8,
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm9",
      "TestValue"=>$palm9,
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm10",
      "TestValue"=>$palm10,
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm11",
      "TestValue"=>$palm11,
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm12",
      "TestValue"=>$palm12,
      "SRText"=>null
    ),
    array(
      "Test"=>"Palm13",
      "TestValue"=>$palm13,
      "SRText"=>null
    ),
    array(
      "Test"=>"FingertipTest",
      "TestValue"=>$fingertip_p_f ,
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip1",
      "TestValue"=>$fingertip1 ,
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip2",
      "TestValue"=>$fingertip2,
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip3",
      "TestValue"=>$fingertip3,
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip4",
      "TestValue"=>$fingertip4,
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip5",
      "TestValue"=>$fingertip5,
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip6",
      "TestValue"=>$fingertip6,
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip7",
      "TestValue"=>$fingertip7,
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip8",
      "TestValue"=>$fingertip8,
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip9",
      "TestValue"=>$fingertip9,
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip10",
      "TestValue"=>$fingertip10,
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip11",
      "TestValue"=>$fingertip11,
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip12",
      "TestValue"=>$fingertip12,
      "SRText"=>null
    ),
    array(
      "Test"=>"Fingertip13",
      "TestValue"=>$fingertip13,
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeadingTest",
      "TestValue"=>$bead_diameter_p_f,
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading1",
      "TestValue"=>$bead_diameter1,
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading2",
      "TestValue"=>$bead_diameter2,
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading3",
      "TestValue"=>$bead_diameter3,
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading4",
      "TestValue"=>$bead_diameter4,
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading5",
      "TestValue"=>$bead_diameter5,
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading6",
      "TestValue"=>$bead_diameter6,
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading7",
      "TestValue"=>$bead_diameter7,
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading8",
      "TestValue"=>$bead_diameter8,
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading9",
      "TestValue"=>$bead_diameter9,
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading10",
      "TestValue"=>$bead_diameter10,
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading11",
      "TestValue"=>$bead_diameter11,
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading12",
      "TestValue"=>$bead_diameter12,
      "SRText"=>null
    ),
    array(
      "Test"=>"DiaBeading13",
      "TestValue"=>$bead_diameter13,
      "SRText"=>null
    ),
    array(
      "Test"=>"WristTest",
      "TestValue"=>$cuff_edge_p_f,
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist1",
      "TestValue"=>$cuff_edge1,
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist2",
      "TestValue"=>$cuff_edge2,
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist3",
      "TestValue"=>$cuff_edge3,
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist4",
      "TestValue"=>$cuff_edge4,
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist5",
      "TestValue"=>$cuff_edge5,
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist6",
      "TestValue"=>$cuff_edge6,
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist7",
      "TestValue"=>$cuff_edge7,
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist8",
      "TestValue"=>$cuff_edge8,
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist9",
      "TestValue"=>$cuff_edge9,
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist10",
      "TestValue"=>$cuff_edge10,
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist11",
      "TestValue"=>$cuff_edge11,
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist12",
      "TestValue"=>$cuff_edge12,
      "SRText"=>null
    ),
    array(
      "Test"=>"Wrist13",
      "TestValue"=>$cuff_edge13,
      "SRText"=>null
    ),
    array(
      "Test"=>"WeightTest",
      "TestValue"=>$g_weight_p_f,
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight1",
      "TestValue"=>$g_weight1,
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight2",
      "TestValue"=>$g_weight2,
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight3",
      "TestValue"=>$g_weight3,
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight4",
      "TestValue"=>$g_weight4,
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight5",
      "TestValue"=>$g_weight5,
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight6",
      "TestValue"=>$g_weight6,
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight7",
      "TestValue"=>$g_weight7,
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight8",
      "TestValue"=>$g_weight8,
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight9",
      "TestValue"=>$g_weight9,
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight10",
      "TestValue"=>$g_weight10,
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight11",
      "TestValue"=>$g_weight11,
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight12",
      "TestValue"=>$g_weight12,
      "SRText"=>null
    ),
    array(
      "Test"=>"Weight13",
      "TestValue"=>$g_weight13,
      "SRText"=>null
    ),
    array(
      "Test"=>"Test 1 Name",
      "TestValue"=>$Test1Name,
      "SRText"=>$SRText3
    ),
    array(
      "Test"=>"Test 2 Name",
      "TestValue"=>$Test2Name ,
      "SRText"=>$SRText4
    ),
    array(
      "Test"=>"Test 3 Name",
      "TestValue"=>$Test3Name,
      "SRText"=>$SRText5
    ),
    array(
      "Test"=>"Test 4 Name",
      "TestValue"=>$Test4Name,
      "SRText"=>$SRText6
    ),
    array(
      "Test"=>"Test 5 Name",
      "TestValue"=>$Test5Name ,
      "SRText"=>$SRText7
    ),
    array(
      "Test"=>"Sealing Test",
      "TestValue"=>$SealingTest,
      "SRText"=>null
    ),
    array(
      "Test"=>"Dye Leak Test",
      "TestValue"=>$DyeLeakTest,
      "SRText"=>null
    ),
    array(
      "Test"=>"BurstTest",
      "TestValue"=>$BurstTest,
      "SRText"=>null
    ),
    array(
      "Test"=>"Visual & Peel Ability",
      "TestValue"=>$VPA,
      "SRText"=>null
    )
  );

  $TestResult_JSON = json_encode($TestResult);

  // echo "TestResult";
  // echo "<br>";
  // echo $TestResult_JSON;
  // echo "<br>";
  // echo "<br>";
  // echo "<br>";

  $SampleSizeResult=array(
    array(
      "SampleSize"=>"SampleSizeVisual",
      "SampleSizeValue"=>$sample_size
    ),
    array(
      "SampleSize"=>"SampleSizeAPT/WTTLevel1",
      "SampleSizeValue"=>$sample_size_apt
    ),
    array(
      "SampleSize"=>"SampleSizeAPT/WTTLevel2",
      "SampleSizeValue"=>$sample_size_apt2
    )
  );


  $SampleSizeResult_JSON = json_encode($SampleSizeResult);

  // echo "SampleSizeResult";
  // echo "<br>";
  // echo $SampleSizeResult_JSON;
  // echo "<br>";
  // echo "<br>";
  // echo "<br>";

  for($i = 0; $i < count($CartonNum); $i++){
    $CartonNumber[$i] = array(
      "CartonNum"=>$CartonNum[$i]
    );
  }


  $CartonNum_JSON = json_encode($CartonNumber);

  // echo "CartonNum";
  // echo "<br>";
  // echo $CartonNum_JSON;
  // echo "<br>";
  // echo "<br>";
  // echo "<br>";
  echo "recordid: ".$RecordIDPreset;
  $query = "{CALL SP_AddNewFGRecord(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)}";
  $stmt = $connect->prepare($query);
  $stmt->bindParam(1, $Plant);
  $stmt->bindParam(2, $palletID);
  $stmt->bindParam(3, $BatchNumber, PDO::PARAM_INT);
  $stmt->bindParam(4, $SONumber);
  $stmt->bindParam(5, $ItemNumber);
  $stmt->bindParam(6, $Customer);
  $stmt->bindParam(7, $Brand);
  $stmt->bindParam(8, $LotNumber, PDO::PARAM_INT);
  $stmt->bindParam(9, $LotCount, PDO::PARAM_INT);
  $stmt->bindParam(10, $InspectionPlan);
  $stmt->bindParam(11, $PalletNumber);
  $stmt->bindParam(12, $CartonQuantity, PDO::PARAM_INT);
  $stmt->bindParam(13, $ReinspectionFlag, PDO::PARAM_INT);
  $stmt->bindParam(14, $ConvertFlag, PDO::PARAM_INT);
  $stmt->bindParam(15, $ProductionDateWLine_JSON);
  $stmt->bindParam(16, $PackingDate);
  $stmt->bindParam(17, $PackingShift, PDO::PARAM_INT);
  $stmt->bindParam(18, $GloveCode);
  $stmt->bindParam(19, $GloveColour);
  $stmt->bindParam(20, $GloveSurface);
  $stmt->bindParam(21, $GloveProductType);
  $stmt->bindParam(22, $GloveSize);
  $stmt->bindParam(23, $CartonNum_JSON );
  $stmt->bindParam(24, $FGCondition );
  $stmt->bindParam(25, $LotIDPreset );
  $stmt->bindParam(26, $RecordIDPreset );
  $stmt->bindParam(27, $InspectionCount, PDO::PARAM_INT);
  $stmt->bindParam(28, $RecordCreatedDateTime);
  $stmt->bindParam(29, $InspectionUserID, PDO::PARAM_INT);
  $stmt->bindParam(30, $RecordStatusFlag, PDO::PARAM_INT);
  $stmt->bindParam(31, $VerifierID);
  $stmt->bindParam(32, $VerifiedDate);
  $stmt->bindParam(33, $InstrumentResult_JSON);
  $stmt->bindParam(34, $TestResult_JSON );
  $stmt->bindParam(35, $DefectResult_JSON );
  $stmt->bindParam(36, $AQLResult_JSON );
  $stmt->bindParam(37, $SampleSizeResult_JSON);
  $stmt->bindParam(38, $UDResultKey);

  if($stmt->execute()){

      echo '<script>
      alert("Data is saved!!");
      location.replace("form-FG-Body-Pallet.php")
      </script>';


  }else{
    echo"<script>alert('Data is not saved!!');</script>";
  }




//-------------------------------------------------------------------------------------------------------------------------------




    }
    $connect = null;
            ?>

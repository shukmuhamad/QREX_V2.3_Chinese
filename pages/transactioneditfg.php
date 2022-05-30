<?php 
        if (isset($_POST['submit']))
        {
            $LotIDKey               = $_GET['LotIDKey'];
            $PlantKey               = $_POST['PlantKey'];
            $DateConversion         = new DateTime($_POST['RecordCreatedDateTime']);
            $RecordCreatedDateTime  = date_format($DateConversion, 'Y-m-d H:i:s');
            $DateConversion2        = new DateTime($_POST['VerifiedDate']);
            $date_verify            = date_format($DateConversion2, 'Y-m-d H:i:s');
            $verify_by              = $_POST['verify_by'];
            $BatchNumber            = $_POST['BatchNumber'];
            $InspectionPlanKey      = $_POST['InspectionPlanKey'];
            $GloveSizeKey           = $_POST['GloveSizeKey'];
            $InspectionCount        = $_POST['InspectionCount'];
            $CartonQuantity         = $_POST['CartonQuantity'];
            $CartonNum              = $_POST['CartonNum'];
            $Customer               = $_POST['Customer'];
            $Brand                  = $_POST['Brand'];
            $LotNumber              = $_POST['LotNumber'];
            $GloveProductTypeKey    = $_POST['GloveProductTypeKey'];
            $GloveCodeKey           = $_POST['GloveCodeKey'];
            $GloveColourKey         = $_POST['GloveColourKey'];
            $PackingDate            = $_POST['PackingDate'];
            $InspectionUserID       = $_POST['InspectionUserID'];
            $ProductionLineKey1     = $_POST['ProductionLineKey1'];
            $ProductDate1           = $_POST['product_date1'];
            $Shift1                 = $_POST['shift1'];
            $RecordStatusFlag       = $_POST['RecordStatusFlag'];
            

            $method             = $_REQUEST['method'];   
            $RecordID           = $get['RecordID'];
            $InstrumentValue    = $_REQUEST['InstrumentValue'];
            $InstrumentValue2   = $_REQUEST['InstrumentValue2'];
            $InstrumentValue3   = $_REQUEST['InstrumentValue3'];
            $TestValue          = $_REQUEST['TestValue'];
            $TestValue2         = $_REQUEST['TestValue2'];
            $TestValue3         = $_REQUEST['TestValue3'];
            $TestValue4         = $_REQUEST['TestValue4'];
            $TestValue5         = $_REQUEST['TestValue5'];
            $TestValue6         = $_REQUEST['TestValue6'];
            $TestValue7         = $_REQUEST['TestValue7'];
            $TestValue8         = $_REQUEST['TestValue8'];
            $TestValue9         = $_REQUEST['TestValue9'];
            $TestValue10        = $_REQUEST['TestValue10'];
            $TestValue11        = $_REQUEST['TestValue11'];
            $TestValue12        = $_REQUEST['TestValue12'];
            $TestValue13        = $_REQUEST['TestValue13'];
            $TestValue14        = $_REQUEST['TestValue14'];
            $TestValue15        = $_REQUEST['TestValue15'];
            $TestValue16        = $_REQUEST['TestValue16'];
            $TestValue17        = $_REQUEST['TestValue17'];
            $TestValue18        = $_REQUEST['TestValue18'];
            $TestValue19        = $_REQUEST['TestValue19'];
            $TestValue20        = $_REQUEST['TestValue20'];

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

            $Acceptance_minor   = $_REQUEST['Acceptance_minor'];
            $Acceptance_major   = $_REQUEST['Acceptance_major'];
            $Acceptance_critical= $_REQUEST['Acceptance_critical'];
            $Acceptance_holes1  = $_REQUEST['Acceptance_holes1'];
            $Acceptance_holes2  = $_REQUEST['Acceptance_holes2'];
            $Acceptance_holes3  = $_REQUEST['Acceptance_holes3'];

            $machine_id         = $_REQUEST['machine_id'];
            $sample_size        = $_REQUEST['sample_size'];
            $test_method        = $_REQUEST['sample_size_apt'];
            $AQL_minor          = $_REQUEST['AQL_minor'];
            $AQL_major          = $_REQUEST['AQL_major'];
            $AQL_critical       = $_REQUEST['AQL_critical'];
            $AQL_holes1         = $_REQUEST['AQL_holes1'];
            $AQL_holes2         = $_REQUEST['AQL_holes2'];
            $AQL_holes3         = $_REQUEST['AQL_holes3'];

            $Acceptance_minor   = $_REQUEST['Acceptance_minor'];
            $Acceptance_major   = $_REQUEST['Acceptance_major'];
            $Acceptance_critical= $_REQUEST['Acceptance_critical'];
            $Acceptance_holes1  = $_REQUEST['Acceptance_holes1'];
            $Acceptance_holes2  = $_REQUEST['Acceptance_holes2'];
            $Acceptance_holes3  = $_REQUEST['Acceptance_holes3'];

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
            $SG    = $_REQUEST['SG'];
            $SHN    = $_REQUEST['SHN'];
            $SI     = $_REQUEST['SI'];
            $SKV     = $_REQUEST['SKV'];
            $SLD     = $_REQUEST['SLD'];
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
            $IP_MAJOR  = $_REQUEST['IP_MAJOR'];
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
            $MG     = $_REQUEST['MG'];
            $MS     = $_REQUEST['MS'];
            $GF     = $_REQUEST['GF'];
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
        //---------------HOLES3----------------//
            $BF_3   = $_REQUEST['BF_3'];
            $P_3    = $_REQUEST['P_3'];
            $CF_3   = $_REQUEST['CF_3'];
            $SF_3   = $_REQUEST['SF_3'];
            $TAHs_3 = $_REQUEST['TAHs_3'];
            $FKS_3  = $_REQUEST['FKS_3'];
            $THs_3  = $_REQUEST['THs_3'];
            $FT_3   = $_REQUEST['FT_3'];
            $TRS_3  = $_REQUEST['TRS_3'];
            $GB_3   = $_REQUEST['GB_3'];
            $CHs_3  = $_REQUEST['CHs_3'];
            $L_HOLES3    = $_REQUEST['L_HOLES3'];
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

            //--------------new add defect-----------------//

            $STNs     = $_REQUEST['STNs'];
            $SLDs     = $_REQUEST['SLDs'];
            $Ls     = $_REQUEST['Ls'];
            $WSO    = $_REQUEST['GF'];
            $MS_critical     = $_REQUEST['MS_critical'];
            $WSO    = $_REQUEST['PFK'];
            $GSH     = $_REQUEST['GSH'];
            $LH     = $_REQUEST['LH'];
            $MH    = $_REQUEST['MH'];
            $LH_2     = $_REQUEST['LH_2'];
            $MH_2    = $_REQUEST['MH_2'];
            $LH_3     = $_REQUEST['LH_3'];
            $MH_3    = $_REQUEST['MH_3'];

            $overall_AQL    = $_REQUEST['overall_AQL'];
            $UDResultKey    = $_REQUEST['UDResultKey'];

//---------------------------------------------------------PRODUCT INFORMATION---------------------------------------------------------//
$connect->beginTransaction();
{

    $query2 = $connect->prepare("UPDATE T_Record_Master SET InspectionUserID = '$InspectionUserID' , RecordCreatedDateTime = '$RecordCreatedDateTime' ,InspectionCount = '$InspectionCount', VerifiedDate = '$date_verify', VerifierID = '$verify_by', RecordStatusFlag = '$RecordStatusFlag' WHERE RecordID = '$RecordID'");
    $query2->execute();

    $query3 = $connect->prepare("UPDATE T_Lot_InspectionPlan SET InspectionPlanKey = '$InspectionPlanKey' WHERE LotIDKey = '$LotIDKey'");
    $query3->execute();

    $query4 = $connect->prepare("UPDATE T_Lot_GloveSize SET GloveSizeKey = '$GloveSizeKey' WHERE LotIDKey = '$LotIDKey'");
    $query4->execute();

    $query6 = $connect->prepare("UPDATE T_Lot_CartonNum SET CartonNum = '$CartonNum' WHERE LotIDKey = '$LotIDKey'");
    $query6->execute();

    $query7 = $connect->prepare("UPDATE T_Lot_GloveCode SET GloveCodeKey = '$GloveCodeKey' WHERE LotIDKey = '$LotIDKey'");
    $query7->execute();

    $query8 = $connect->prepare("UPDATE T_Lot_GloveColour SET GloveColourKey = '$GloveColourKey' WHERE LotIDKey = '$LotIDKey'");
    $query8->execute();

    if ($_POST['shift2'] == '') {


    $query9 = $connect->prepare("UPDATE T_Lot_ProductionDateWLine SET PlantKey = '$PlantKey', ProductionDate = '$ProductDate1', ProductionLineKey = '$ProductionLineKey1', Shift = '$Shift1' WHERE LotIDKey = '$LotIDKey' AND ProductionKey = 1 ");
    $query9->execute();

    $query9 = $connect->prepare("UPDATE T_Lot_ProductionDateWLine SET PlantKey = '$PlantKey', WHERE LotIDKey = '$LotIDKey' AND ProductionKey = 2 ");
    $query9->execute();

    $query9 = $connect->prepare("UPDATE T_Lot_ProductionDateWLine SET PlantKey = '$PlantKey',WHERE LotIDKey = '$LotIDKey' AND ProductionKey = 3 ");
    $query9->execute();

    }else if($_POST['shift3'] == '') {

        $ProductionLineKey2     = $_POST['ProductionLineKey2'];
        $ProductDate2           = $_POST['product_date2'];
        $Shift2                 = $_POST['shift2'];

        $query9 = $connect->prepare("UPDATE T_Lot_ProductionDateWLine SET PlantKey = '$PlantKey', ProductionDate = '$ProductDate1', ProductionLineKey = '$ProductionLineKey1', Shift = '$Shift1' WHERE LotIDKey = '$LotIDKey' AND ProductionKey = 1 ");
        $query9->execute();

        $query9 = $connect->prepare("UPDATE T_Lot_ProductionDateWLine SET PlantKey = '$PlantKey', ProductionDate = '$ProductDate2', ProductionLineKey = '$ProductionLineKey2', Shift = '$Shift2' WHERE LotIDKey = '$LotIDKey' AND ProductionKey = 2 ");
        $query9->execute();

        $query9 = $connect->prepare("UPDATE T_Lot_ProductionDateWLine SET PlantKey = '$PlantKey', WHERE LotIDKey = '$LotIDKey' AND ProductionKey = 3 ");
        $query9->execute();

    }else{

    
        $ProductionLineKey2     = $_POST['ProductionLineKey2'];
        $ProductionLineKey3     = $_POST['ProductionLineKey3'];
        $ProductDate2           = $_POST['product_date2'];
        $ProductDate3           = $_POST['product_date3'];
        $Shift2                 = $_POST['shift2'];
        $Shift3                 = $_POST['shift3'];

        $query9 = $connect->prepare("UPDATE T_Lot_ProductionDateWLine SET PlantKey = '$PlantKey', ProductionDate = '$ProductDate1', ProductionLineKey = '$ProductionLineKey1', Shift = '$Shift1' WHERE LotIDKey = '$LotIDKey' AND ProductionKey = 1 ");
        $query9->execute();

        $query9 = $connect->prepare("UPDATE T_Lot_ProductionDateWLine SET PlantKey = '$PlantKey', ProductionDate = '$ProductDate2', ProductionLineKey = '$ProductionLineKey2', Shift = '$Shift2' WHERE LotIDKey = '$LotIDKey' AND ProductionKey = 2 ");
        $query9->execute();

        $query9 = $connect->prepare("UPDATE T_Lot_ProductionDateWLine SET PlantKey = '$PlantKey', ProductionDate = '$ProductDate3', ProductionLineKey = '$ProductionLineKey3', Shift = '$Shift3' WHERE LotIDKey = '$LotIDKey' AND ProductionKey = 3 ");
        $query9->execute();
    }

    $query10 = $connect->prepare("UPDATE T_Lot_PackingDate SET PackingDate = '$PackingDate' WHERE LotIDKey = '$LotIDKey'");
    $query10->execute();
                                    
    $query11 = $connect->prepare("UPDATE T_Lot_GloveProductType SET GloveProductTypeKey = '$GloveProductTypeKey' WHERE LotIDKey = '$LotIDKey'");
    $query11->execute();

    $PalletNumber       = $_POST['PalletNumber'];
    $SONumber           = $_POST['SONumber'];

    $query1 = $connect->prepare("UPDATE T_Lot_FG SET PlantKey = '$PlantKey', BatchNumber = '$BatchNumber', SONumber = '$SONumber', Customer = '$Customer', Brand = '$Brand', LotNumber = '$LotNumber', InspectionPlanKey = '$InspectionPlanKey', PalletNumber = '$PalletNumber', CartonQuantity = '$CartonQuantity' WHERE LotIDKey = '$LotIDKey'");
    $query1->execute();


//--------------------------------------------------OTHER TESTING & PHYSICAL DIMENSION TEST--------------------------------------------//
        

        $sql = "UPDATE T_Record_Instrument
            SET InstrumentValue = (case
                                when InstrumentKey = 1 then '$InstrumentValue'
                                when InstrumentKey = 2 then '$InstrumentValue2'
                                when InstrumentKey = 3 then '$InstrumentValue3'
                                when InstrumentKey = 4 then '$machine_id'
                            end)
            WHERE InstrumentKey in (1,2,3,4) AND
            RecordID = '$RecordID'";
        $query= $connect->exec($sql);

        $sql = "UPDATE T_Record_Test
            SET TestValue = (case
                                when TestKey = 1 then '$method'
                                when TestKey = 12 then '$TestValue'
                                when TestKey = 14 then '$TestValue2'
                                when TestKey = 8 then '$TestValue3'
                                when TestKey = 2 then '$TestValue4'
                                when TestKey = 6 then '$TestValue6'
                                when TestKey = 9 then '$TestValue8'
                                when TestKey = 4 then '$TestValue10'
                                when TestKey = 5 then '$TestValue5'
                                when TestKey = 3 then '$TestValue7'
                                when TestKey = 7 then '$TestValue9'
                                when TestKey = 10 then '$TestValue11'
                                when TestKey = 144 then '$TestValue12'
                                when TestKey = 145 then '$TestValue13'
                                when TestKey = 146 then '$TestValue14'
                                when TestKey = 147 then '$TestValue15'
                                when TestKey = 148 then '$TestValue16'
                                when TestKey = 150 then '$TestValue17'
                                when TestKey = 149 then '$TestValue18'
                                when TestKey = 157 then '$TestValue19'
                                when TestKey = 158 then '$TestValue20'
                                when TestKey = 16 then '$length_p_f'
                                when TestKey = 17 then '$length1'
                                when TestKey = 18 then '$length2'
                                when TestKey = 19 then '$length3'
                                when TestKey = 20 then '$length4'
                                when TestKey = 21 then '$length5'
                                when TestKey = 22 then '$length6'
                                when TestKey = 23 then '$length7'
                                when TestKey = 24 then '$length8'
                                when TestKey = 25 then '$length9'
                                when TestKey = 26 then '$length10'
                                when TestKey = 27 then '$length11'
                                when TestKey = 28 then '$length12'
                                when TestKey = 29 then '$length13'
                                when TestKey = 30 then '$width_p_f'
                                when TestKey = 31 then '$width1'
                                when TestKey = 32 then '$width2'
                                when TestKey = 33 then '$width3'
                                when TestKey = 34 then '$width4'
                                when TestKey = 35 then '$width5'
                                when TestKey = 36 then '$width6'
                                when TestKey = 37 then '$width7'
                                when TestKey = 38 then '$width8'
                                when TestKey = 39 then '$width9'
                                when TestKey = 40 then '$width10'
                                when TestKey = 41 then '$width11'
                                when TestKey = 42 then '$width12'
                                when TestKey = 43 then '$width13'
                                when TestKey = 44 then '$cuff_p_f'
                                when TestKey = 45 then '$cuff1'
                                when TestKey = 46 then '$cuff2'
                                when TestKey = 47 then '$cuff3'
                                when TestKey = 48 then '$cuff4'
                                when TestKey = 49 then '$cuff5'
                                when TestKey = 50 then '$cuff6'
                                when TestKey = 51 then '$cuff7'
                                when TestKey = 52 then '$cuff8'
                                when TestKey = 53 then '$cuff9'
                                when TestKey = 54 then '$cuff10'
                                when TestKey = 55 then '$cuff11'
                                when TestKey = 56 then '$cuff12'
                                when TestKey = 57 then '$cuff13'
                                when TestKey = 58 then '$palm_p_f'
                                when TestKey = 59 then '$palm1'
                                when TestKey = 60 then '$palm2'
                                when TestKey = 61 then '$palm3'
                                when TestKey = 62 then '$palm4'
                                when TestKey = 63 then '$palm5'
                                when TestKey = 64 then '$palm6'
                                when TestKey = 65 then '$palm7'
                                when TestKey = 66 then '$palm8'
                                when TestKey = 67 then '$palm9'
                                when TestKey = 68 then '$palm10'
                                when TestKey = 69 then '$palm11'
                                when TestKey = 70 then '$palm12'
                                when TestKey = 71 then '$palm13'
                                when TestKey = 72 then '$fingertip_p_f'
                                when TestKey = 73 then '$fingertip1'
                                when TestKey = 74 then '$fingertip2'
                                when TestKey = 75 then '$fingertip3'
                                when TestKey = 76 then '$fingertip4'
                                when TestKey = 77 then '$fingertip5'
                                when TestKey = 78 then '$fingertip6'
                                when TestKey = 79 then '$fingertip7'
                                when TestKey = 80 then '$fingertip8'
                                when TestKey = 81 then '$fingertip9'
                                when TestKey = 82 then '$fingertip10'
                                when TestKey = 83 then '$fingertip11'
                                when TestKey = 84 then '$fingertip12'
                                when TestKey = 85 then '$fingertip13'
                                when TestKey = 86 then '$bead_diameter_p_f'
                                when TestKey = 87 then '$bead_diameter1'
                                when TestKey = 88 then '$bead_diameter2'
                                when TestKey = 89 then '$bead_diameter3'
                                when TestKey = 90 then '$bead_diameter4'
                                when TestKey = 91 then '$bead_diameter5'
                                when TestKey = 92 then '$bead_diameter6'
                                when TestKey = 93 then '$bead_diameter7'
                                when TestKey = 94 then '$bead_diameter8'
                                when TestKey = 95 then '$bead_diameter9'
                                when TestKey = 96 then '$bead_diameter10'
                                when TestKey = 97 then '$bead_diameter11'
                                when TestKey = 98 then '$bead_diameter12'
                                when TestKey = 99 then '$bead_diameter13'
                                when TestKey = 100 then '$cuff_edge_p_f'
                                when TestKey = 101 then '$cuff_edge1'
                                when TestKey = 102 then '$cuff_edge2'
                                when TestKey = 103 then '$cuff_edge3'
                                when TestKey = 104 then '$cuff_edge4'
                                when TestKey = 105 then '$cuff_edge5'
                                when TestKey = 106 then '$cuff_edge6'
                                when TestKey = 107 then '$cuff_edge7'
                                when TestKey = 108 then '$cuff_edge8'
                                when TestKey = 109 then '$cuff_edge9'
                                when TestKey = 110 then '$cuff_edge10'
                                when TestKey = 111 then '$cuff_edge11'
                                when TestKey = 112 then '$cuff_edge12'
                                when TestKey = 113 then '$cuff_edge13'
                                when TestKey = 114 then '$g_weight_p_f'
                                when TestKey = 115 then '$g_weight1'
                                when TestKey = 116 then '$g_weight2'
                                when TestKey = 117 then '$g_weight3'
                                when TestKey = 118 then '$g_weight4'
                                when TestKey = 119 then '$g_weight5'
                                when TestKey = 120 then '$g_weight6'
                                when TestKey = 121 then '$g_weight7'
                                when TestKey = 122 then '$g_weight8'
                                when TestKey = 123 then '$g_weight9'
                                when TestKey = 124 then '$g_weight10'
                                when TestKey = 125 then '$g_weight11'
                                when TestKey = 126 then '$g_weight12'
                                when TestKey = 127 then '$g_weight13'
                                when TestKey = 142 then '$sample_size'
                                when TestKey = 143 then '$test_method'
                                when TestKey = 128 then '$AQL_minor'
                                when TestKey = 130 then '$AQL_major'
                                when TestKey = 132 then '$AQL_critical'
                                when TestKey = 134 then '$AQL_holes1'
                                when TestKey = 136 then '$AQL_holes2'
                                when TestKey = 138 then '$AQL_holes3'
                                when TestKey = 129 then '$Acceptance_minor'
                                when TestKey = 131 then '$Acceptance_major'
                                when TestKey = 133 then '$Acceptance_critical'
                                when TestKey = 135 then '$Acceptance_holes1'
                                when TestKey = 137 then '$Acceptance_holes2'
                                when TestKey = 139 then '$Acceptance_holes3'
                                when TestKey = 155 then '$AQL_regulatoryPackaging'
                                when TestKey = 156 then '$Acceptance_RegulatoryPackaging'
                                when TestKey = 161 then '$Result_RegulatoryPackaging'
                                when TestKey = 153 then '$AQL_CriticalPackaging'
                                when TestKey = 154 then '$Acceptance_CriticalPackaging'
                                when TestKey = 160 then '$Result_CriticalPackaging'
                                when TestKey = 151 then '$AQL_VisualPackaging'
                                when TestKey = 152 then '$Acceptance_VisualPackaging'
                                when TestKey = 159 then '$Result_VisualPackaging'
                                when TestKey = 140 then '$overall_AQL'
                                when TestKey = 163 then '$Total_holes'
                                when TestKey = 162 then '$Final_Disposition'
                                end),
                    SRText =  (case
                                when TestKey = 1 then '$SRText1'
                                when TestKey = 12 then '$SRText1'
                                when TestKey = 14 then '$SRText2'
                                when TestKey = 8 then '$SRTextPackaging'
                                when TestKey = 3 then '$SRText8'
                                when TestKey = 144 then '$SRText3'
                                when TestKey = 145 then '$SRText4'
                                when TestKey = 146 then '$SRText5'
                                when TestKey = 147 then '$SRText6'
                                when TestKey = 148 then '$SRText7'
                                end)
            WHERE TestKey in (1,12,14,8,2,6,9,4,5,3,7,10,144,145,146,147,148,150,149,157,158,16,17,18,19,20,
                                21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,
                                48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,
                                75,76,77,78,79,80,81,82,83,84,85,86,87, 88,89,90,91,92,93,94,95,96,97,98,99,100,
                                101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,
                                121,122,123,124,125,126,127,142,143,128,130,132,134,136,138,129,131,133,135,137,
                                139,155,156,161,153,154,160,151,152,159,140,163,162) AND
            RecordID = '$RecordID'";
        $query= $connect->exec($sql); 
        
        
        $sql = "UPDATE T_Record_Defect
            SET DefectValue = (case
                                when DefectKey = 1 then '$DB'
                                when DefectKey = 2 then '$SD'
                                when DefectKey = 3 then '$SP'
                                when DefectKey = 4 then '$CA'
                                when DefectKey = 5 then '$CL'
                                when DefectKey = 6 then '$CLD'
                                when DefectKey = 7 then '$CS'
                                when DefectKey = 8 then '$DF'
                                when DefectKey = 9 then '$DT'
                                when DefectKey = 10 then '$EFI'
                                when DefectKey = 11 then '$FM'
                                when DefectKey = 12 then '$FNO'
                                when DefectKey = 13 then '$FO'
                                when DefectKey = 14 then '$GNO'
                                when DefectKey = 15 then '$IB'
                                when DefectKey = 16 then '$CA'
                                when DefectKey = 17 then '$L_Major'
                                when DefectKey = 18 then '$LS'
                                when DefectKey = 20 then '$PMI'
                                when DefectKey = 21 then '$PMO'
                                when DefectKey = 19 then '$PLM'
                                when DefectKey = 23 then '$RM'
                                when DefectKey = 22 then '$RC'
                                when DefectKey = 24 then '$SAG'
                                when DefectKey = 25 then '$SG'
                                when DefectKey = 26 then '$SHN'
                                when DefectKey = 27 then '$SI'
                                when DefectKey = 28 then '$SKV'
                                when DefectKey = 29 then '$SLD'
                                when DefectKey = 30 then '$SO'
                                when DefectKey = 31 then '$STK'
                                when DefectKey = 32 then '$STN'
                                when DefectKey = 33 then '$TA'
                                when DefectKey = 34 then '$TS'
                                when DefectKey = 35 then '$UNF'
                                when DefectKey = 36 then '$WL'
                                when DefectKey = 37 then '$WSI'
                                when DefectKey = 38 then '$WSO'
                                when DefectKey = 40 then '$BP'
                                when DefectKey = 41 then '$DP'
                                when DefectKey = 42 then '$DSP'
                                when DefectKey = 43 then '$DTP'
                                when DefectKey = 44 then '$IA'
                                when DefectKey = 45 then '$IFS'
                                when DefectKey = 46 then '$IP_MAJOR'
                                when DefectKey = 47 then '$OP'
                                when DefectKey = 48 then '$RP'
                                when DefectKey = 49 then '$SH'
                                when DefectKey = 50 then '$SMP'
                                when DefectKey = 52 then '$CR'
                                when DefectKey = 51 then '$BPC'
                                when DefectKey = 53 then '$DC'
                                when DefectKey = 54 then '$DD'
                                when DefectKey = 55 then '$DIS'
                                when DefectKey = 56 then '$FMT'
                                when DefectKey = 58 then '$L'
                                when DefectKey = 57 then '$GL'
                                when DefectKey = 59 then '$MP'
                                when DefectKey = 60 then '$NB'
                                when DefectKey = 61 then '$NF'
                                when DefectKey = 64 then '$TW'
                                when DefectKey = 66 then '$WE'
                                when DefectKey = 67 then '$WG'
                                when DefectKey = 62 then '$PGM'
                                when DefectKey = 63 then '$SDG'
                                when DefectKey = 65 then '$URD'
                                when DefectKey = 74 then '$ICP'
                                when DefectKey = 75 then '$NP'
                                when DefectKey = 76 then '$WP'
                                when DefectKey = 72 then '$TH'
                                when DefectKey = 73 then '$TR'
                                when DefectKey = 71 then '$TAH'
                                when DefectKey = 70 then '$MF'
                                when DefectKey = 68 then '$CH'
                                when DefectKey = 69 then '$FK'
                                when DefectKey = 77 then '$BF'
                                when DefectKey = 78 then '$CF'
                                when DefectKey = 79 then '$CHs'
                                when DefectKey = 80 then '$FKS'
                                when DefectKey = 81 then '$FT'
                                when DefectKey = 82 then '$GB'
                                when DefectKey = 83 then '$P'
                                when DefectKey = 84 then '$SF'
                                when DefectKey = 85 then '$TAHs'
                                when DefectKey = 86 then '$THs'
                                when DefectKey = 87 then '$TRS'
                                when DefectKey = 143 then '$L_HOLES1'
                                when DefectKey = 88 then '$BF_2'
                                when DefectKey = 89 then '$CF_2'
                                when DefectKey = 90 then '$CHs_2'
                                when DefectKey = 91 then '$FKS_2'
                                when DefectKey = 92 then '$FT_2'
                                when DefectKey = 93 then '$GB_2'
                                when DefectKey = 94 then '$P_2'
                                when DefectKey = 95 then '$SF_2'
                                when DefectKey = 96 then '$TAHs_2'
                                when DefectKey = 97 then '$THs_2'
                                when DefectKey = 98 then '$TRS_2'
                                when DefectKey = 144 then '$L_HOLES2'
                                when DefectKey = 99 then '$BF_3'
                                when DefectKey = 100 then '$CF_3'
                                when DefectKey = 101 then '$CHs_3'
                                when DefectKey = 102 then '$FKS_3'
                                when DefectKey = 103 then '$FT_3'
                                when DefectKey = 104 then '$GB_3'
                                when DefectKey = 105 then '$P_3'
                                when DefectKey = 106 then '$SF_3'
                                when DefectKey = 107 then '$TAHs_3'
                                when DefectKey = 108 then '$THs_3'
                                when DefectKey = 109 then '$TRS_3'
                                when DefectKey = 145 then '$L_HOLES3'
                                when DefectKey = 113 then '$WLN'
                                when DefectKey = 114 then '$WMD'
                                when DefectKey = 112 then '$WED'
                                when DefectKey = 115 then '$WPC'
                                when DefectKey = 111 then '$MM'
                                when DefectKey = 110 then '$IP'
                                when DefectKey = 133 then '$WQ'
                                when DefectKey = 122 then '$MS'
                                when DefectKey = 119 then '$MB'
                                when DefectKey = 120 then '$MLN'
                                when DefectKey = 129 then '$WGS'
                                when DefectKey = 130 then '$WGT'
                                when DefectKey = 128 then '$WGA'
                                when DefectKey = 124 then '$OS'
                                when DefectKey = 134 then '$WTS'
                                when DefectKey = 126 then '$PTS'
                                when DefectKey = 132 then '$WPO'
                                when DefectKey = 117 then '$DMG'
                                when DefectKey = 121 then '$MSG'
                                when DefectKey = 118 then '$FC'
                                when DefectKey = 125 then '$POS'
                                when DefectKey = 116 then '$BC'
                                when DefectKey = 131 then '$WPD'
                                when DefectKey = 123 then '$MSI'
                                when DefectKey = 127 then '$TRP'
                                when DefectKey = 142 then '$WT'
                                when DefectKey = 135 then '$CT'
                                when DefectKey = 140 then '$POP'
                                when DefectKey = 137 then '$FG'
                                when DefectKey = 139 then '$PIS'
                                when DefectKey = 138 then '$MSA'
                                when DefectKey = 141 then '$WIS'
                                when DefectKey = 136 then '$DT_PACKING'

                                when DefectKey = 158 then '$STNs'
                                when DefectKey = 160 then '$SLDs'
                                when DefectKey = 161 then '$Ls'
                                when DefectKey = 146 then '$GF'
                                when DefectKey = 147 then '$MS_critical'
                                when DefectKey = 149 then '$PFK'
                                when DefectKey = 148 then '$GSH'
                                when DefectKey = 150 then '$LH'
                                when DefectKey = 155 then '$MH'
                                when DefectKey = 151 then '$LH_2'
                                when DefectKey = 156 then '$MH_2'
                                when DefectKey = 152 then '$LH_3'
                                when DefectKey = 157 then '$MH_3'

                            end)
            WHERE DefectKey in (1,2,3,4,5,6,7,8,9,10,11,12,13,
                                14,15,16,17,18,20,21,19,23,
                                22,24,25,26,27,28,29,30,31,
                                32,33,34,35,36,37,38,40,41,42,
                                43,44,45,46,47,48,49,50,52,51,
                                53,54,55,56,58,57,59,60,61,64,66,67,
                                62,63,65,74,75,76,72,73,71,
                                70,68,69,77,78,79,80,81,82,83,
                                84,85,86,87,143,88,89,90,91,92,93,
                                94,95,96,97,9,144,99,10,101,102,103,
                                104,105,106,107,108,109,145,113,114,
                                112,115,111,110,133,122,119,120,
                                129,130,128,124,134,126,132,117,12,
                                118,125,116,131,123,127,142,135,140,
                                137,139,138,141,136,158,160,161,146,147,149,148,150,155,151,156,152,157) AND
            RecordID = '$RecordID'";
        $query= $connect->exec($sql);
    

    $sql="UPDATE T_Record_UDResult SET UDResultKey = '$UDResultKey' WHERE RecordID = '$RecordID' ";
    $query= $connect->exec($sql);
   


           echo"<script>alert('Data is saved!!');</script>";  
          // echo '<meta http-equiv="refresh" content="0">';
          echo"<script>location.replace('page(staff).php');</script>"; 

//-------------------------------------------------------------------------------------------------------------------------------
}         
$connect->commit();                                    
         }
         $connect = null;  
            ?>
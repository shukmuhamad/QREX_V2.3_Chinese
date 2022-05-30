<?php 
        if (isset($_POST['submit']))
        {
            //$LotIDKey               = $_POST['LotIDKey'];
            $PlantKey               = $_POST['PlantKey'];
            $RecordCreatedDateTime = date('Y-m-d H:i:s', strtotime(str_replace("/","-",$_POST['RecordCreatedDateTime'])));
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
            $ProductionLineKey1     = $_POST['ProductionLineKey1'];
            $ProductDate1           = $_POST['product_date1'];
            $ProductDate2           = $_POST['product_date2'];
            $ProductDate3           = $_POST['product_date3'];
            $Shift1                 = $_POST['shift1'];
            $PackingDate            = $_POST['PackingDate'];
            $InspectionUserID       = $_POST['InspectionUserID'];
            $verify_by              = $_POST['verify_by'];
            $date_verify            = date('Y-m-d H:i:s', strtotime(str_replace("/","-",$_POST['date_verify'])));
            $RecordStatusFlag       = $_POST['RecordStatusFlag'];
            
    

            $method             = $_REQUEST['method'];
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
            $Acceptance_VisualPackaging     = $_REQUEST['Acceptance_majorpackaging'];
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
            

            $overall_AQL    = $_REQUEST['overall_AQL'];
            $UDResultKey    = $_REQUEST['UDResultKey'];

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
            $LH_3     = $_REQUEST['LH_3'];
            $MH_3    = $_REQUEST['MH_3'];

            $query = "SELECT LotIDKey FROM T_Lot_FG WHERE BatchNumber = ?";
            $stmt = $connect->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt->bindParam(1, $BatchNumber);
            $stmt->execute();
            $row = $stmt->rowCount();
            
            $query2 = "SELECT LotIDKey FROM T_Lot_SFG WHERE BatchNumber = ?";
            $stmt2 = $connect->prepare($query2, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $stmt2->bindParam(1, $BatchNumber);
            $stmt2->execute();
            $row2 = $stmt2->rowCount();
            
            if($row > 0 )
            {
                $message = "Batch number already exist";
                echo "<script type='text/javascript'>alert('$message');</script>";
                  
            }elseif($row2 > 0 ){

                $message = "Batch number already exist";
                echo "<script type='text/javascript'>alert('$message');</script>";
            
            }else{
               
                


            
//---------------------------------------------------------PRODUCT INFORMATION---------------------------------------------------------//
$connect->beginTransaction();
{            

            $query2 = $connect->prepare("INSERT INTO T_Lot_Master (LotIDKey, LotCreatedDate, LotCreatedUserID) VALUES ((Select Coalesce(Max(LotIDKey), 0) + 1 FROM T_Lot_Master), '', '')");
            $query2->execute();

            $query = $connect->prepare("SELECT LotIDKey FROM T_Lot_Master");
            $query->execute();
            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($fetch as $test){ $LotIDKey = $test['LotIDKey'];}

            $sql="INSERT INTO T_Record_Master(RecordID, RecordModuleKey, LotIDKey, InspectionCount, RecordCreatedDateTime, LastSavedDateTime, InspectionUserID, VerifiedDate, VerifierID, RecordStatusFlag) VALUES ((Select Coalesce(Max(RecordID), 0) + 1 FROM T_Record_Master),'','$LotIDKey','$InspectionCount','$RecordCreatedDateTime','','$InspectionUserID','$date_verify','$verify_by','$RecordStatusFlag')";
                $query= $connect->exec($sql);

            $query = $connect->prepare("SELECT RecordID FROM T_Record_Master");
            $query->execute();
            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($fetch as $test){ $RecordID = $test['RecordID'];}    

            $query3 = $connect->prepare("INSERT INTO T_Lot_InspectionPlan (LotIDKey, InspectionPlanKey) VALUES ('$LotIDKey', '$InspectionPlanKey')");
            $query3->execute();

            $query4 = $connect->prepare("INSERT INTO T_Lot_GloveSize (LotIDKey, GloveSizeKey) VALUES ('$LotIDKey', '$GloveSizeKey')");
            $query4->execute();

            $query6 = $connect->prepare("INSERT INTO T_Lot_CartonNum (LotIDKey, CartonNum) VALUES ('$LotIDKey', '$CartonNum')");
            $query6->execute();

            $query7 = $connect->prepare("INSERT INTO T_Lot_GloveCode (LotIDKey, GloveCodeKey) VALUES ('$LotIDKey', '$GloveCodeKey')");
            $query7->execute();

            $query11 = $connect->prepare("INSERT INTO T_Lot_GloveProductType (LotIDKey, GloveProductTypeKey) VALUES ('$LotIDKey', '$GloveProductTypeKey')");
            $query11->execute();

            $query8 = $connect->prepare("INSERT INTO T_Lot_GloveColour (LotIDKey, GloveColourKey) VALUES ('$LotIDKey', '$GloveColourKey')");
            $query8->execute();

            if ($_POST['shift2'] == "") {

            $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '$ProductDate1', '$ProductionLineKey1', '$Shift1', '1')");
            $query9->execute();

            $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '', '', '', '2')");
            $query9->execute();

            $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '', '', '', '3')");
            $query9->execute();

            }else if($_POST['shift3'] == "") {

                $ProductionLineKey2     = $_POST['ProductionLineKey2'];
                $Shift2                 = $_POST['shift2'];
                

                $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '$ProductDate1', '$ProductionLineKey1', '$Shift1', '1')");
                $query9->execute();
    
                $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '$ProductDate2', '$ProductionLineKey2', '$Shift2', '2')");
                $query9->execute();

                $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '', '', '', '3')");
                $query9->execute();

            }else{

                $ProductionLineKey2     = $_POST['ProductionLineKey2'];
                $ProductionLineKey3     = $_POST['ProductionLineKey3'];
                $Shift2                 = $_POST['shift2'];
                $Shift3                 = $_POST['shift3'];

                $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '$ProductDate1', '$ProductionLineKey1', '$Shift1', '1')");
                $query9->execute();
    
                $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '$ProductDate2', '$ProductionLineKey2', '$Shift2', '2')");
                $query9->execute();
    
                $query9 = $connect->prepare("INSERT INTO T_Lot_ProductionDateWLine (LotIDKey, PlantKey, ProductionDate, ProductionLineKey, Shift, ProductionKey) VALUES ('$LotIDKey', '$PlantKey', '$ProductDate3', '$ProductionLineKey3', '$Shift3', '3')");
                $query9->execute();
            }

            $query10 = $connect->prepare("INSERT INTO T_Lot_PackingDate (LotIDKey,PackingDate, Shift) VALUES ('$LotIDKey', '$PackingDate', '')");
            $query10->execute();

            if ($_POST['inspection_stage'] == '3') {

                $query1 = $connect->prepare("INSERT INTO T_Lot_SFG (LotIDKey, PlantKey, BatchNumber, Customer, Brand, LotNumber, InspectionPlanKey, CartonQuantity) VALUES ('$LotIDKey', '$PlantKey', '$BatchNumber', '$Customer', '$Brand', '$LotNumber', '$InspectionPlanKey', '$CartonQuantity')");
                $query1->execute();
            }
            else {

                $PalletNumber       = $_POST['PalletNumber'];
                $SONumber           = $_POST['SONumber'];

                $query1 = $connect->prepare("INSERT INTO T_Lot_FG (LotIDKey, PalletID, PlantKey, BatchNumber, SONumber, Customer, Brand, LotNumber, InspectionPlanKey, PalletNumber, CartonQuantity) VALUES ('$LotIDKey', '', '$PlantKey', '$BatchNumber', '$SONumber', '$Customer', '$Brand', '$LotNumber', '$InspectionPlanKey', '$PalletNumber', '$CartonQuantity')");
                $query1->execute();
            }

//-------------------------------------------------- OTHER TESTING & PHYSICAL DIMENSION TEST --------------------------------------------//

        $sql="INSERT INTO T_Record_Instrument(RecordID, InstrumentKey, InstrumentValue) VALUES 
                ('$RecordID','1','$InstrumentValue'),
                ('$RecordID','2','$InstrumentValue2'),
                ('$RecordID','3','$InstrumentValue3'),
                ('$RecordID','4','$machine_id')";
        $query= $connect->exec($sql);


        $sql="INSERT INTO T_Record_Test(RecordID, TestKey, TestValue, SRText) VALUES 
                ('$RecordID','1','$method','$SRText1'),
                ('$RecordID','12','$TestValue','$SRText1'),
                ('$RecordID','14','$TestValue2','$SRText2'),
                ('$RecordID','8','$TestValue3','$SRTextPackaging'),
                ('$RecordID','2','$TestValue4',''),
                ('$RecordID','6','$TestValue6',''),
                ('$RecordID','9','$TestValue8',''),
                ('$RecordID','4','$TestValue10',''),
                ('$RecordID','5','$TestValue5',''),
                ('$RecordID','3','$TestValue7','$SRText8'),
                ('$RecordID','7','$TestValue9',''),
                ('$RecordID','10','$TestValue11',''),
                ('$RecordID','150','$TestValue17',''),
                ('$RecordID','149','$TestValue18',''),
                ('$RecordID','158','$TestValue20',''),
                ('$RecordID','157','$TestValue19',''),
                ('$RecordID','144','$TestValue12','$SRText3'),
                ('$RecordID','145','$TestValue13','$SRText4'),
                ('$RecordID','146','$TestValue14','$SRText5'),
                ('$RecordID','147','$TestValue15','$SRText6'),
                ('$RecordID','148','$TestValue16','$SRText7'),
                ('$RecordID','16','$length_p_f',''),
                ('$RecordID','17','$length1',''),
                ('$RecordID','18','$length2',''),
                ('$RecordID','19','$length3',''),
                ('$RecordID','20','$length4',''),
                ('$RecordID','21','$length5',''),
                ('$RecordID','22','$length6',''),
                ('$RecordID','23','$length7',''),
                ('$RecordID','24','$length8',''),
                ('$RecordID','25','$length9',''),
                ('$RecordID','26','$length10',''),
                ('$RecordID','27','$length11',''),
                ('$RecordID','28','$length12',''),
                ('$RecordID','29','$length13',''),
                ('$RecordID','30','$width_p_f',''),
                ('$RecordID','31','$width1',''),
                ('$RecordID','32','$width2',''),
                ('$RecordID','33','$width3',''),
                ('$RecordID','34','$width4',''),
                ('$RecordID','35','$width5',''),
                ('$RecordID','36','$width6',''),
                ('$RecordID','37','$width7',''),
                ('$RecordID','38','$width8',''),
                ('$RecordID','39','$width9',''),
                ('$RecordID','40','$width10',''),
                ('$RecordID','41','$width11',''),
                ('$RecordID','42','$width12',''),
                ('$RecordID','43','$width13',''),
                ('$RecordID','44','$cuff_p_f',''),
                ('$RecordID','45','$cuff1',''),
                ('$RecordID','46','$cuff2',''),
                ('$RecordID','47','$cuff3',''),
                ('$RecordID','48','$cuff4',''),
                ('$RecordID','49','$cuff5',''),
                ('$RecordID','50','$cuff6',''),
                ('$RecordID','51','$cuff7',''),
                ('$RecordID','52','$cuff8',''),
                ('$RecordID','53','$cuff9',''),
                ('$RecordID','54','$cuff10',''),
                ('$RecordID','55','$cuff11',''),
                ('$RecordID','56','$cuff12',''),
                ('$RecordID','57','$cuff13',''),
                ('$RecordID','58','$palm_p_f',''),
                ('$RecordID','59','$palm1',''),
                ('$RecordID','60','$palm2',''),
                ('$RecordID','61','$palm3',''),
                ('$RecordID','62','$palm4',''),
                ('$RecordID','63','$palm5',''),
                ('$RecordID','64','$palm6',''),
                ('$RecordID','65','$palm7',''),
                ('$RecordID','66','$palm8',''),
                ('$RecordID','67','$palm9',''),
                ('$RecordID','68','$palm10',''),
                ('$RecordID','69','$palm11',''),
                ('$RecordID','70','$palm12',''),
                ('$RecordID','71','$palm13',''),
                ('$RecordID','72','$fingertip_p_f',''),
                ('$RecordID','73','$fingertip1',''),
                ('$RecordID','74','$fingertip2',''),
                ('$RecordID','75','$fingertip3',''),
                ('$RecordID','76','$fingertip4',''),
                ('$RecordID','77','$fingertip5',''),
                ('$RecordID','78','$fingertip6',''),
                ('$RecordID','79','$fingertip7',''),
                ('$RecordID','80','$fingertip8',''),
                ('$RecordID','81','$fingertip9',''),
                ('$RecordID','82','$fingertip10',''),
                ('$RecordID','83','$fingertip11',''),
                ('$RecordID','84','$fingertip12',''),
                ('$RecordID','85','$fingertip13',''),
                ('$RecordID','86','$bead_diameter_p_f',''),
                ('$RecordID','87','$bead_diameter1',''),
                ('$RecordID','88','$bead_diameter2',''),
                ('$RecordID','89','$bead_diameter3',''),
                ('$RecordID','90','$bead_diameter4',''),
                ('$RecordID','91','$bead_diameter5',''),
                ('$RecordID','92','$bead_diameter6',''),
                ('$RecordID','93','$bead_diameter7',''),
                ('$RecordID','94','$bead_diameter8',''),
                ('$RecordID','95','$bead_diameter9',''),
                ('$RecordID','96','$bead_diameter10',''),
                ('$RecordID','97','$bead_diameter11',''),
                ('$RecordID','98','$bead_diameter12',''),
                ('$RecordID','99','$bead_diameter13',''),
                ('$RecordID','100','$cuff_edge_p_f',''),
                ('$RecordID','101','$cuff_edge1',''),
                ('$RecordID','102','$cuff_edge2',''),
                ('$RecordID','103','$cuff_edge3',''),
                ('$RecordID','104','$cuff_edge4',''),
                ('$RecordID','105','$cuff_edge5',''),
                ('$RecordID','106','$cuff_edge6',''),
                ('$RecordID','107','$cuff_edge7',''),
                ('$RecordID','108','$cuff_edge8',''),
                ('$RecordID','109','$cuff_edge9',''),
                ('$RecordID','110','$cuff_edge10',''),
                ('$RecordID','111','$cuff_edge11',''),
                ('$RecordID','112','$cuff_edge12',''),
                ('$RecordID','113','$cuff_edge13',''),
                ('$RecordID','114','$g_weight_p_f',''),
                ('$RecordID','115','$g_weight1',''),
                ('$RecordID','116','$g_weight2',''),
                ('$RecordID','117','$g_weight3',''),
                ('$RecordID','118','$g_weight4',''),
                ('$RecordID','119','$g_weight5',''),
                ('$RecordID','120','$g_weight6',''),
                ('$RecordID','121','$g_weight7',''),
                ('$RecordID','122','$g_weight8',''),
                ('$RecordID','123','$g_weight9',''),
                ('$RecordID','124','$g_weight10',''),
                ('$RecordID','125','$g_weight11',''),
                ('$RecordID','126','$g_weight12',''),
                ('$RecordID','127','$g_weight13',''),
                ('$RecordID','142','$sample_size',''),
                ('$RecordID','143','$test_method',''),
                ('$RecordID','128','$AQL_minor',''),
                ('$RecordID','130','$AQL_major',''),
                ('$RecordID','132','$AQL_critical',''),
                ('$RecordID','134','$AQL_holes1',''),
                ('$RecordID','136','$AQL_holes2',''),
                ('$RecordID','138','$AQL_holes3',''),
                ('$RecordID','129','$Acceptance_minor',''),
                ('$RecordID','131','$Acceptance_major',''),
                ('$RecordID','133','$Acceptance_critical',''),
                ('$RecordID','135','$Acceptance_holes1',''),
                ('$RecordID','137','$Acceptance_holes2',''),
                ('$RecordID','139','$Acceptance_holes3',''),
                ('$RecordID','155','$AQL_regulatoryPackaging',''),
                ('$RecordID','156',' $Acceptance_RegulatoryPackaging',''),
                ('$RecordID','161','$Result_RegulatoryPackaging',''),
                ('$RecordID','153','$AQL_CriticalPackaging',''),
                ('$RecordID','154','$Acceptance_CriticalPackaging',''),
                ('$RecordID','160','$Result_CriticalPackaging',''),
                ('$RecordID','151','$AQL_VisualPackaging',''),
                ('$RecordID','152','$Acceptance_VisualPackaging',''),
                ('$RecordID','159','$Result_VisualPackaging',''),
                ('$RecordID','140','$overall_AQL',''),
                ('$RecordID','163','$Total_holes',''),
                ('$RecordID','162','$Final_Disposition','')";
        $query= $connect->exec($sql);

//-----------------------------------------------Defect Minor Visual-----------------------------------------------------------//
        $sql="INSERT INTO T_Record_Defect(RecordID, DefectKey, DefectValue) VALUES
                ('$RecordID','1','$DB'),
                ('$RecordID','2','$SD'),
                ('$RecordID','3','$SP'),
                ('$RecordID','4','$CA'),
                ('$RecordID','5','$CL'),
                ('$RecordID','6','$CLD'),
                ('$RecordID','7','$CS'),
                ('$RecordID','8','$DF'),
                ('$RecordID','9','$DT'),
                ('$RecordID','10','$EFI'),
                ('$RecordID','11','$FM'),
                ('$RecordID','12','$FNO'),
                ('$RecordID','13','$FO'),
                ('$RecordID','14','$GNO'),
                ('$RecordID','15','$IB'),
                ('$RecordID','16','$ICT'),
                ('$RecordID','17','$L_Major'),
                ('$RecordID','18','$LS'),
                ('$RecordID','20','$PMI'),
                ('$RecordID','21','$PMO'),
                ('$RecordID','19','$PLM'),
                ('$RecordID','23','$RM'),
                ('$RecordID','22','$RC'),
                ('$RecordID','24','$SAG'),
                ('$RecordID','25','$SG'),
                ('$RecordID','26','$SHN'),
                ('$RecordID','27','$SI'),
                ('$RecordID','28','$SKV'),
                ('$RecordID','29','$SLD'),
                ('$RecordID','30','$SO'),
                ('$RecordID','31','$STK'),
                ('$RecordID','32','$STN'),
                ('$RecordID','33','$TA'),
                ('$RecordID','34','$TS'),
                ('$RecordID','35','$UNF'),
                ('$RecordID','36','$WL'),
                ('$RecordID','37','$WSI'),
                ('$RecordID','38','$WSO'),
                ('$RecordID','40','$BP'),
                ('$RecordID','41','$DP'),
                ('$RecordID','42','$DSP'),
                ('$RecordID','43','$DTP'),
                ('$RecordID','44','$IA'),
                ('$RecordID','45','$IFS'),
                ('$RecordID','46','$IP_MAJOR'),
                ('$RecordID','47','$OP'),
                ('$RecordID','48','$RP'),
                ('$RecordID','49','$SH'),
                ('$RecordID','50','$SMP'),
                ('$RecordID','51','$BPC'),
                ('$RecordID','52','$CR'),
                ('$RecordID','53','$DC'),
                ('$RecordID','54','$DD'),
                ('$RecordID','55','$DIS'),
                ('$RecordID','56','$FMT'),
                ('$RecordID','57','$GL'),
                ('$RecordID','58','$L'),
                ('$RecordID','59','$MP'),
                ('$RecordID','60','$NB'),
                ('$RecordID','61','$NF'),
                ('$RecordID','62','$PGM'),
                ('$RecordID','63','$SDG'),
                ('$RecordID','64','$TW'),
                ('$RecordID','65','$URD'),
                ('$RecordID','66','$WE'),
                ('$RecordID','67','$WG'),
                ('$RecordID','74','$ICP'),
                ('$RecordID','75','$NP'),
                ('$RecordID','76','$WP'),
                ('$RecordID','68','$CH'),
                ('$RecordID','69','$FK'),
                ('$RecordID','70','$MF'),
                ('$RecordID','71','$TAH'),
                ('$RecordID','72','$TH'),
                ('$RecordID','73','$TR'),
                ('$RecordID','77','$BF'),
                ('$RecordID','78','$CF'),
                ('$RecordID','79','$CHs'),
                ('$RecordID','80','$FKS'),
                ('$RecordID','81','$FT'),
                ('$RecordID','82','$GB'),
                ('$RecordID','83','$P'),
                ('$RecordID','84','$SF'),
                ('$RecordID','85','$TAHs'),
                ('$RecordID','86','$THs'),
                ('$RecordID','87','$TRS'),
                ('$RecordID','143','$L_HOLES1'),
                ('$RecordID','88','$BF_2'),
                ('$RecordID','89','$CF_2'),
                ('$RecordID','90','$CHs_2'),
                ('$RecordID','91','$FKS_2'),
                ('$RecordID','92','$FT_2'),
                ('$RecordID','93','$GB_2'),
                ('$RecordID','94','$P_2'),
                ('$RecordID','95','$SF_2'),
                ('$RecordID','96','$TAHs_2'),
                ('$RecordID','97','$THs_2'),
                ('$RecordID','98','$TRS_2'),
                ('$RecordID','144','$L_HOLES2'),
                ('$RecordID','99','$BF_3'),
                ('$RecordID','100','$CF_3'),
                ('$RecordID','101','$CHs_3'),
                ('$RecordID','102','$FKS_3'),
                ('$RecordID','103','$FT_3'),
                ('$RecordID','104','$GB_3'),
                ('$RecordID','105','$P_3'),
                ('$RecordID','106','$SF_3'),
                ('$RecordID','107','$TAHs_3'),
                ('$RecordID','108','$THs_3'),
                ('$RecordID','109','$TRS_3'),
                ('$RecordID','145','$L_HOLES3'),
                ('$RecordID','113','$WLN'),
                ('$RecordID','114','$WMD'),
                ('$RecordID','112','$WED'),
                ('$RecordID','115','$WPC'),
                ('$RecordID','111','$MM'),
                ('$RecordID','110','$IP'),
                ('$RecordID','133','$WQ'),
                ('$RecordID','122','$MS'),
                ('$RecordID','119','$MB'),
                ('$RecordID','120','$MLN'),
                ('$RecordID','129','$WGS'),
                ('$RecordID','130','$WGT'),
                ('$RecordID','128','$WGA'),
                ('$RecordID','124','$OS'),
                ('$RecordID','134','$WTS'),
                ('$RecordID','126','$PTS'),
                ('$RecordID','132','$WPO'),
                ('$RecordID','117','$DMG'),
                ('$RecordID','121','$MSG'),
                ('$RecordID','118','$FC'),
                ('$RecordID','125','$POS'),
                ('$RecordID','116','$BC'),
                ('$RecordID','131','$WPD'),
                ('$RecordID','123','$MSI'),
                ('$RecordID','127','$TRP'),
                ('$RecordID','142','$WT'),
                ('$RecordID','135','$CT'),
                ('$RecordID','140','$POP'),
                ('$RecordID','137','$FG'),
                ('$RecordID','139','$PIS'),
                ('$RecordID','138','$MSA'),
                ('$RecordID','141','$WIS'),
                ('$RecordID','136','$DT_PACKING'),
                ('$RecordID','158','$STNs'),
                ('$RecordID','160','$SLDs'),
                ('$RecordID','161','$Ls'),
                ('$RecordID','146','$GF'),
                ('$RecordID','147','$MS_critical'),
                ('$RecordID','148','$GSH'),
                ('$RecordID','149','$PFK'),
                ('$RecordID','150','$LH'),
                ('$RecordID','151','$LH_2'),
                ('$RecordID','152','$LH_3'),
                ('$RecordID','155','$MH'),
                ('$RecordID','156','$MH_2'),
                ('$RecordID','157','$MH_3')";
        $query= $connect->exec($sql);

        $sql="INSERT INTO T_Record_UDResult(RecordID, UDResultKey) VALUES ('$RecordID','$UDResultKey')";
        $query= $connect->exec($sql);

        echo"<script>alert('Data is saved!!');</script>";
                


//-------------------------------------------------------------------------------------------------------------------------------
            
}         
$connect->commit();                                              
        }
    }
    $connect = null; 
            ?>
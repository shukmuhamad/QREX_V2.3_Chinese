<?php
	require_once 'session_stff.php';
	require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>QA PQC Inspection Module</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">TOP GLOVE</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown"><?php echo $session_name;?>
                    
                    
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="userprofile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        
                        <li>
                            <a href="forms.php"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        
                        <li>
                            <a href="tables.php"><i class="fa fa-table fa-fw"></i> All Inspection Records</a>
                        </li>
                        
                        <li>
                            <a href="tables search SFG.php"><i class="fa fa-table fa-fw"></i> Search Records SFG</a>
                          
                        </li>
                        
                        <li>
                             <a href="tables search FG.php"><i class="fa fa-table fa-fw"></i> Search Records FG</a>
                          </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">QA PQC Inspection Module</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Product Information
                        </div>
                         <div class="panel-body">
                         
                         <div class="row">
                         <div class="col-lg-6">
                            </br>
                            
									<form role="form" method ="post">
                                   	
                                   	   <div>
                                       <th scope="col" class="info"</th><label>Factory:</label>
                                            <td><select class="form-control" id="factory" name="factory" required></td>
                                            <option class="form-control" name="factory" value=""> Factory</option>
                                        	<option class="form-control" name="factory" value="M02"> M02</option>
                                        	<option class="form-control" name="factory" value="M09"> M09</option>
                                        	<option class="form-control" name="factory" value="F10"> F10</option>
											<option class="form-control" name="factory" value="F11"> F11</option>
											<option class="form-control" name="factory" value="F13"> F13</option>
											<option class="form-control" name="factory" value="F31"> F31</option>
											</select></td>
                                         
                                         </div>  
                                         <br>
                                   	
                                    	<div class="form-group">
                                            <label>Date:</label>
                                            <input type="date" name="date" id="date" placeholder="">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Batch No:</label>
                                            <input class="form-control" name="batch_id" id="batch_id" placeholder="Enter text">
                                            
                                        </div>
                                        
                                          <div class="form-group">
                                            <label>Inspection Stage:</label></br>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="Inspection_Stage" id="optionsRadios1" value="FINISHED GOOD" checked>FINISHED GOOD
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                  <input type="radio" name="Inspection_Stage" id="optionsRadios2" value="SEMI FINISHED GOOD">SEMI FINISHED GOOD
                                                </label>
                                            </div>
                                            
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Category:</label></br>
                                              <td><select class="form-control" id="Product_Type" name="Product_Type" required></td>
                                            <option class="form-control" name="Product_Type" value="">Category</option>
                                        	<option class="form-control" name="Product_Type" value="USA"> USA</option>
                                        	<option class="form-control" name="Product_Type" value="NON USA"> Non USA</option>
                                        	<option class="form-control" name="Product_Type" value="Japan"> Japan</option>
                                        	<option class="form-control" name="Product_Type" value="Selected Moh"> Selected Moh</option>
                                        	<option class="form-control" name="Product_Type" value="Premium Medical"> Premium Medical</option>
                                        	<option class="form-control" name="Product_Type" value="Japan/korea"> Japan/korea</option>
                                        	<option class="form-control" name="Product_Type" value="Standard Medical"> Standard Medical</option>
                                        	<option class="form-control" name="Product_Type" value="Non Medical"> Non Medical</option>
                                        	<option class="form-control" name="Product_Type" value="2nd Grade"> 2nd Grade</option>
                                        	<option class="form-control" name="Product_Type" value="3rd Party Inspection"> 3rd Party Inspection</option>
                                        	<option class="form-control" name="Product_Type" value="Return Container"> Return Container</option>
                                         </select></td>
                                        </div>
                                        
                                        
                                      
                                        <div>
                                       <th scope="col" class="info"</th><label>Size:</label>
                                            <td><select class="form-control" id="size" name="size">
                                            <option class="form-control" name="size" value="">Size</option>
                                        	<option class="form-control" name="size" value="XS">XS</option>
                                     		<option class="form-control" name="size" value="S"> S</option>
                                            <option class="form-control" name="size" value="M"> M</option>
                                     		<option class="form-control" name="size" value="L"> L</option>
                                            <option class="form-control" name="size" value="XL"> XL</option>
                                     		<option class="form-control" name="size" value="XXL"> XXL</option>
                                        	<option class="form-control" name="size" value="FS">FS</option>
                                     		<option class="form-control" name="size" value="6.0"> 6.0</option>
                                            <option class="form-control" name="size" value="6.5"> 6.5</option>
                                     		<option class="form-control" name="size" value="7.0"> 7.0</option>
                                            <option class="form-control" name="size" value="7.5"> 7.5</option>
                                     		<option class="form-control" name="size" value="8.0"> 8.0</option>
                                        	<option class="form-control" name="size" value="8.5"> 8.5</option>
                                        	<option class="form-control" name="size" value="9.0"> 9.0</option>
                                         </select></td>
                                         
                                         </div>
                                         <br>
                                          
                                            <div class="form-group">
                                            <label>Pallet NO:</label>
                                            <input class="form-control" name="pallet_no" id="pallet_no" placeholder="Enter text">
                                            
                                        </div>
                                       
                                          <br>
                                           <div class="form-group">
                                            <label>Inspection Level: </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="level" id="optionsRadiosInline1" value="1st Level" checked> 1st Level
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="level" id="optionsRadiosInline2" value="2nd Level">2nd Level
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="level" id="optionsRadiosInline3" value="3rd Level">3rd Level
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="level" id="optionsRadiosInline3" value="4th Level">4th Level
                                            </label>
                                            </div>
                                            
                                       	<div class="form-group">
                                            <label>QUANTITY CTN/BAG</label>
                                            <input class="form-control" name="quantity_ctn" id="quantity_ctn" placeholder="Enter text" required>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>CARTON NUMBER</label>
                                            <input class="form-control" name="carton_no" id="carton_no" placeholder="Enter text" required>
                                         
                                        </div>  
                                       
                                       
                                       
                                
                                     </div>  
                                          <br>
                                    <div class="col-lg-6">
                                    
                                        
                                            <div class="form-group">
                                                 <th scope="col" class="info"><label>Customer:</label>
                                            <td><select class="form-control" id="customer" name="customer">
                                            	<option class="form-control" name="customer" value=""> Customer</option>
                                        	<option class="form-control" name="customer" value="4 Gasa S/L">4 Gasa S/L </option>
                                     		<option class="form-control" name="customer" value="A.R. Medicom Inc. (Asia) Ltd."> A.R. Medicom Inc. (Asia) Ltd.</option>
                                            	<option class="form-control" name="customer" value="Aamedix Glove Sdn. Bhd."> Aamedix Glove Sdn. Bhd. </option>
                                     		<option class="form-control" name="customer" value=" Abena A/S"> Abena A/S</option>
                                          	<option class="form-control" name="customer" value="Activ Tomasz Pacholczyk">Activ Tomasz Pacholczyk </option>
                                     		<option class="form-control" name="customer" value="Advanced Tech"> Advanced Tech </option>
                                            	<option class="form-control" name="customer" value="Ah-Kim Pech"> Ah-Kim Pech </option>
                                     		<option class="form-control" name="customer" value=" Alam Altijara General Trading"> Alam Altijara General Trading </option>
                                          	<option class="form-control" name="customer" value="ALFA Trading S.A.S">ALFA Trading S.A.S </option>
                                     		<option class="form-control" name="customer" value=" Ansell Global Trading Center"> Ansell Global Trading Center</option>
                                            	<option class="form-control" name="customer" value="Arhimed Severo-zapad"> Arhimed Severo-zapad </option>
                                     		<option class="form-control" name="customer" value="Asap International Sdn. Bhd."> Asap International Sdn. Bhd. </option>
                                          	<option class="form-control" name="customer" value="Ascend Eagle, Incorporated">Ascend Eagle, Incorporated </option>
                                     		<option class="form-control" name="customer" value=" Ascent Care Sdn. Bhd."> Ascent Care Sdn. Bhd. </option>
                                            	<option class="form-control" name="customer" value="Autosafe & Equipment Supplies"> Autosafe & Equipment Supplies </option>
                                     		<option class="form-control" name="customer" value="Bahrain Plastic Company"> Bahrain Plastic Company </option>
                                          	<option class="form-control" name="customer" value="Balkamp, Inc.">Balkamp, Inc. </option>
                                     		<option class="form-control" name="customer" value="Barclay-Swann Limited T/AS"> Barclay-Swann Limited T/AS </option>
						<option class="form-control" name="customer" value="Becon Enterprise Sdn Bhd"> Becon Enterprise Sdn Bhd </option>
                                            	<option class="form-control" name="customer" value="Benovy Co. Ltd"> Benovy Co. Ltd </option>
                                     		<option class="form-control" name="customer" value=" Bergamot Sdn. Bhd."> Bergamot Sdn. Bhd. </option>
                                          	<option class="form-control" name="customer" value="Bertozzl S.R.L">Bertozzl S.R.L </option>
                                     		<option class="form-control" name="customer" value="Bidfood Procurement Community"> Bidfood Procurement Community </option>
                                           	<option class="form-control" name="customer" value="Big Time Products LLC"> Big Time Products LLC </option>
                                     		<option class="form-control" name="customer" value=" Biz Med"> Biz Med </option>
                                          	<option class="form-control" name="customer" value="Body Products Relax Gmbh">Body Products Relax Gmbh </option>
                                     		<option class="form-control" name="customer" value=" Boss Manufacturing Co."> Boss Manufacturing Co. </option>
                                           	<option class="form-control" name="customer" value=" Brenta S.R.L"> Brenta S.R.L </option>
						<option class="form-control" name="customer" value=" Brtozzi SRL"> Brtozzi SRL </option>
                                     		<option class="form-control" name="customer" value="Bunzl UK Limited"> Bunzl UK Limited </option>
                                          	<option class="form-control" name="customer" value="Careline GMBH & CO. KG">Careline GMBH & CO. KG </option>
                                     		<option class="form-control" name="customer" value=" Cassiopeia Co. Ltd."> Cassiopeia Co. Ltd. </option>
                                           	<option class="form-control" name="customer" value="Cedo Household Products LLC"> Cedo Household Products LLC </option>
                                     		<option class="form-control" name="customer" value="Cemex Trescon Bv"> Cemex Trescon Bv </option>
                                          	<option class="form-control" name="customer" value="Centrum Zaopatrzenia Medycznego">Centrum Zaopatrzenia Medycznego </option>
                                     		<option class="form-control" name="customer" value="Cerebrum-M Co.LTD"> Cerebrum-M Co.LTD </option>
                                            	<option class="form-control" name="customer" value="Chase Prossor & CO LTD"> Chase Prossor & CO LTD </option>
                                     		<option class="form-control" name="customer" value="Chimtrade-Komet Ltd"> Chimtrade-Komet Ltd </option>
                                          	<option class="form-control" name="customer" value="China Cerantec Industrial Co,Limited">China Cerantec Industrial Co,Limited </option>
                                     		<option class="form-control" name="customer" value="Chong Lap Asia- Pacific Health"> Chong Lap Asia- Pacific Health</option>
                                           	<option class="form-control" name="customer" value="Comforties. Com Ltd"> Comforties. Com Ltd </option>
                                     		<option class="form-control" name="customer" value=" Company 'Khabarovskaya"> Company "Khabarovskaya </option>
                                           	<option class="form-control" name="customer" value="Converex Int' L (Hk) Company"> Converex Int' L (Hk) Company </option>
                                            	<option class="form-control" name="customer" value="Cosmomed S.A ">Cosmomed S.A </option>
                                     		<option class="form-control" name="customer" value=" Cranberry International Sdn."> Cranberry International Sdn.</option>
                                            	<option class="form-control" name="customer" value="Cross Protection (M) SDN BHD"> Cross Protection (M) SDN BHD</option>
                                     		<option class="form-control" name="customer" value="Dalton International Ltd"> Dalton International Ltd</option>
                                            	<option class="form-control" name="customer" value="Dasom"> Dasom</option>
                                            	<option class="form-control" name="customer" value="Dealpack LLC">Dealpack LLC </option>
                                     		<option class="form-control" name="customer" value="Demophorius Ltd"> Demophorius Ltd </option>
                                            	<option class="form-control" name="customer" value="Dentl Protect"> Dentl Protect </option>
                                     		<option class="form-control" name="customer" value=" Dentotal Protect"> Dentotal Protect</option>
                                           	<option class="form-control" name="customer" value="Dis - Rivas , S.L."> Dis - Rivas , S.L. </option>
                                           	<option class="form-control" name="customer" value="Double-S (Thailand) Company">Double-S (Thailand) Company </option>
											<option class="form-control" name="customer" value="Distribuidora Venus  S.A.S">Distribuidora Venus  S.A.S </option>
                                     		<option class="form-control" name="customer" value="Ds Enterprise Inc"> Ds Enterprise Inc </option>
                                           	<option class="form-control" name="customer" value=" Ebuno (JAPAN) CO., LTD"> Ebuno (JAPAN) CO., LTD </option>
                                     		<option class="form-control" name="customer" value="Ebuno Japan Co Ltd"> Ebuno Japan Co Ltd </option>
                                            	<option class="form-control" name="customer" value=" Eif CO.LTD"> Eif CO.LTD </option>
                                           	<option class="form-control" name="customer" value="Eltoma Limited ">Eltoma Limited </option>
                                     		<option class="form-control" name="customer" value="Enhance Dental Group Sdn.Bhd"> Enhance Dental Group Sdn.Bhd</option>
                                            	<option class="form-control" name="customer" value="Espeon S.R.O. "> Espeon S.R.O. </option>
                                     		<option class="form-control" name="customer" value="Euro Pacific Safety Products "> Euro Pacific Safety Products </option>
                                            	<option class="form-control" name="customer" value="Euro Pacific Safety Products Limited "> Euro Pacific Safety Products Limited </option>
                                            	<option class="form-control" name="customer" value="Evergreen Latex C.C ">Evergreen Latex C.C </option>
                                     		<option class="form-control" name="customer" value="FAHERMA S.L "> FAHERMA S.L </option>
                                            	<option class="form-control" name="customer" value="Falcon Pack Industry "> Falcon Pack Industry </option>
                                     		<option class="form-control" name="customer" value="Flying Horse Industrial Co "> Flying Horse Industrial Co </option>
                                            	<option class="form-control" name="customer" value="Focus Corporation "> Focus Corporation </option>
                                            	<option class="form-control" name="customer" value="Franz Mensch Gmbh ">Franz Mensch Gmbh </option>
                                     		<option class="form-control" name="customer" value="Free Stock "> Free Stock </option>
                                            <option class="form-control" name="customer" value="Galenova Inc. "> Galenova Inc. </option>
                                     		<option class="form-control" name="customer" value="GD Care Inc"> GD Care Inc</option>
                                            <option class="form-control" name="customer" value="Gdc Limited Liability Company "> Gdc Limited Liability Company </option>
                                            <option class="form-control" name="customer" value="Gemstark Trading Ltd ">Gemstark Trading Ltd </option>
                                     		<option class="form-control" name="customer" value="Globus (Shetland) Ltd "> Globus (Shetland) Ltd </option>
                                            <option class="form-control" name="customer" value="Goetzloff  Gmbh "> Goetzloff  Gmbh </option>
                                     		<option class="form-control" name="customer" value="GP Medical  Sdn  Bhd "> GP Medical  Sdn  Bhd </option>
                                            <option class="form-control" name="customer" value="Gramfarma S.R.L "> Gramfarma S.R.L </option>
                                           <option class="form-control" name="customer" value="Great Glove (Usa) Inc ">Great Glove (Usa) Inc </option>
                                     		<option class="form-control" name="customer" value="Hexagon Company "> Hexagon Company </option>
                                            <option class="form-control" name="customer" value="Hospifar"> Hospifar</option>
                                     		<option class="form-control" name="customer" value="Hpc Healthline Ltd "> Hpc Healthline Ltd </option>
                                            <option class="form-control" name="customer" value="Huhtamaki Hungary Ltd. "> Huhtamaki Hungary Ltd. </option>
                                            <option class="form-control" name="customer" value="IBN Rushd Dental ">IBN Rushd Dental </option>
                                     		<option class="form-control" name="customer" value="Ico Guanti S.P.A "> Ico Guanti S.P.A </option>
                                            <option class="form-control" name="customer" value="Impact Products, LLC. "> Impact Products, LLC. </option>
                                     		<option class="form-control" name="customer" value="Inter Globus Sp. Z O.O. "> Inter Globus Sp. Z O.O. </option>
                                            <option class="form-control" name="customer" value="Intermedic, S.A "> Intermedic, S.A </option>
                                            <option class="form-control" name="customer" value="Itaan Ltd ">Itaan Ltd </option>
                                     		<option class="form-control" name="customer" value="James Boylan Safety  (NI) LTD. "> James Boylan Safety  (NI) LTD. </option>
                                            <option class="form-control" name="customer" value="Jickson Corporation "> Jickson Corporation </option>
                                     		<option class="form-control" name="customer" value="JSC Liandvars "> JSC Liandvars </option>
                                            <option class="form-control" name="customer" value="Jumla Medical Supplies "> Jumla Medical Supplies </option>
                                            <option class="form-control" name="customer" value="Kalibr LLC">Kalibr LLC</option>
                                     		<option class="form-control" name="customer" value="Kataho Sarl "> Kataho Sarl </option>
                                            <option class="form-control" name="customer" value="Kawanishi Industry Co. Ltd"> Kawanishi Industry Co. Ltd</option>
                                     		<option class="form-control" name="customer" value="Kolmi Hopen "> Kolmi Hopen </option>
                                            <option class="form-control" name="customer" value="Konner Ltd "> Konner Ltd </option>
                                            <option class="form-control" name="customer" value="Laborayori Euromedis Italia ">Laborayori Euromedis Italia </option>
											<option class="form-control" name="customer" value="Latex Ltd ">Latex Ltd </option>
                                     		<option class="form-control" name="customer" value="Lay Bare Supplies Distribution "> Lay Bare Supplies Distribution </option>
                                            <option class="form-control" name="customer" value="LDF Industries Inc "> LDF Industries Inc </option>
                                     		<option class="form-control" name="customer" value="Le Yen Anh Co. Ltd "> Le Yen Anh Co. Ltd </option>
                                            <option class="form-control" name="customer" value="Lindstrom Oy "> Lindstrom Oy </option>
                                            <option class="form-control" name="customer" value="LLC Glove-eco ">LLC Glove-eco </option>
                                     		<option class="form-control" name="customer" value="Llc Maxi Group "> Llc Maxi Group </option>
                                            <option class="form-control" name="customer" value="Lumens Technology "> Lumens Technology </option>
                                     		<option class="form-control" name="customer" value="Luvax Safe "> Luvax Safe </option>
                                            <option class="form-control" name="customer" value="Mapa Gloves sdn.bhd. "> Mapa Gloves sdn.bhd. </option>
                                            <option class="form-control" name="customer" value="Marko LTD ">Marko LTD </option>
                                     		<option class="form-control" name="customer" value="Markoo  Ltd "> Markoo  Ltd </option>
                                            <option class="form-control" name="customer" value="Maxflex  S.A.S. "> Maxflex  S.A.S. </option>
                                     		<option class="form-control" name="customer" value="Maxflex S.A.S. NIT 900080924-7 "> Maxflex S.A.S. NIT 900080924-7 </option>
                                            <option class="form-control" name="customer" value="Maxi Support SDN. BHD "> Maxi Support SDN. BHD </option>
                                            <option class="form-control" name="customer" value="Maxi Support sdn.bhd ">Maxi Support sdn.bhd </option>
                                     		<option class="form-control" name="customer" value="Mccordick Glove & Safety "> Mccordick Glove & Safety </option>
                                            <option class="form-control" name="customer" value="Mccordick Glove & Safety INC. "> Mccordick Glove & Safety INC. </option>
                                     		<option class="form-control" name="customer" value="Mcd Gmbh "> Mcd Gmbh </option>
                                            <option class="form-control" name="customer" value="Mcd Medical Care Dental Gmbh "> Mcd Medical Care Dental Gmbh </option>
                                            <option class="form-control" name="customer" value="Mecattaf Trading CO S.A.L ">Mecattaf Trading CO S.A.L </option>
                                     		<option class="form-control" name="customer" value="Medasept  SP. Z.O.O. "> Medasept  SP. Z.O.O. </option>
                                            <option class="form-control" name="customer" value="Medicom Healthcare BV "> Medicom Healthcare BV </option>
                                     		<option class="form-control" name="customer" value="Medicosm Company Limited "> Medicosm Company Limited </option>
                                            <option class="form-control" name="customer" value="Medigloves S.R.L "> Medigloves S.R.L </option>
                                            <option class="form-control" name="customer" value="Mediscom Company Limited ">Mediscom Company Limited </option>
                                     		<option class="form-control" name="customer" value="Metro Sourcing International "> Metro Sourcing International </option>
                                            <option class="form-control" name="customer" value="Mexpo International Inc "> Mexpo International Inc </option>
                                     		<option class="form-control" name="customer" value="Mildmed” Limited Liability "> Mildmed” Limited Liability </option>
                                            <option class="form-control" name="customer" value="Miyaco.co.ltd "> Miyaco.co.ltd </option>
                                            <option class="form-control" name="customer" value="Modellino Co., Ltd ">Modellino Co., Ltd </option>
											<option class="form-control" name="customer" value="Multi-Com Gmbh & Co "> Multi-Com Gmbh & Co </option>
                                     		<option class="form-control" name="customer" value="Multi Supply Intertrade CO "> Multi Supply Intertrade CO </option>
                                            <option class="form-control" name="customer" value="Mutsumi Chemical Industries "> Mutsumi Chemical Industries </option>
                                     		<option class="form-control" name="customer" value="Nacatur International Import "> Nacatur International Import </option>
                                            <option class="form-control" name="customer" value="Neri S.P.A. A Socio Unico "> Neri S.P.A. A Socio Unico </option>
                                            <option class="form-control" name="customer" value="New Growth Disposable Product ">New Growth Disposable Product </option>
                                     		<option class="form-control" name="customer" value="Nexgen Medical Co., LLC "> Nexgen Medical Co., LLC </option>
                                            <option class="form-control" name="customer" value="OMNISAFE SA DE CV "> OMNISAFE SA DE CV </option>
                                     		<option class="form-control" name="customer" value="Omnisafe Sa De Cv "> Omnisafe Sa De Cv </option>
                                            <option class="form-control" name="customer" value="One Dental "> One Dental </option>
                                            <option class="form-control" name="customer" value="One Dental  Supply ">One Dental  Supply </option>
                                     		<option class="form-control" name="customer" value="OOO 'Torgoviy Dom Evrasia "> OOO "Torgoviy Dom Evrasia </option>
                                            <option class="form-control" name="customer" value="OOO Alyansopttorg"> OOO Alyansopttorg</option>
                                     		<option class="form-control" name="customer" value="OOO Medtovaropt "> OOO Medtovaropt </option>
                                            <option class="form-control" name="customer" value="Ozax Corporation "> Ozax Corporation </option>
                                            <option class="form-control" name="customer" value="PA.PI.GIO SNC ">PA.PI.GIO SNC </option>
                                     		<option class="form-control" name="customer" value="Pacific Blossom Hk "> Pacific Blossom Hk </option>
                                            <option class="form-control" name="customer" value="Pacific Blossom Hk Ltd "> Pacific Blossom Hk Ltd </option>
                                     		<option class="form-control" name="customer" value="Pack Service S.R.L. "> Pack Service S.R.L. </option>
                                            <option class="form-control" name="customer" value="Packwell Ltd "> Packwell Ltd </option>
                                            <option class="form-control" name="customer" value="Paper & Linen Product Resources ">Paper & Linen Product Resources </option>
                                     		<option class="form-control" name="customer" value="PJD Safety Supplies LTD "> PJD Safety Supplies LTD </option>
                                            <option class="form-control" name="customer" value="Plock  Gmbh "> Plock  Gmbh </option>
                                     		<option class="form-control" name="customer" value="Plus Papier S.R.L. "> Plus Papier S.R.L. </option>
                                            <option class="form-control" name="customer" value="Pluspak Safety "> Pluspak Safety </option>
                                            <option class="form-control" name="customer" value="Poly Medical ">Poly Medical </option>
											<option class="form-control" name="customer" value="Provi Swiss Gmbh ">Provi Swiss Gmbh </option>
                                     		<option class="form-control" name="customer" value="PT. Sumber Energy "> PT. Sumber Energy </option>
                                            <option class="form-control" name="customer" value="Qin Craft Company  "> Qin Craft Company  </option>
                                     		<option class="form-control" name="customer" value="Rezostar Corporation "> Rezostar Corporation </option>
                                            <option class="form-control" name="customer" value="RG Safety "> RG Safety </option>
                                            <option class="form-control" name="customer" value="Robby Trading ">Robby Trading </option>
                                     		<option class="form-control" name="customer" value="Robe Medical "> Robe Medical </option>
                                            <option class="form-control" name="customer" value="Roial Srl "> Roial Srl </option>
                                     		<option class="form-control" name="customer" value="Safak Dental "> Safak Dental </option>
											<option class="form-control" name="customer" value="Santex 2000 Internacional S.L "> Santex 2000 Internacional S.L </option>
											<option class="form-control" name="customer" value="S.C Dispo Trading SRL "> S.C Dispo Trading SRL </option>
                                            <option class="form-control" name="customer" value="Science Tech Innovation Co;Ltd "> Science Tech Innovation Co;Ltd </option>
											<option class="form-control" name="customer" value="Seoil Technology "> Seoil Technology </option>
                                            <option class="form-control" name="customer" value="SF Medical Products Gmbh ">SF Medical Products Gmbh </option>
                                     		<option class="form-control" name="customer" value="Sfm Hospital Products Gmbh "> Sfm Hospital Products Gmbh </option>
                                            <option class="form-control" name="customer" value="Shaklin LLC "> Shaklin LLC </option>
                                     		<option class="form-control" name="customer" value="Shanghai Junyu International "> Shanghai Junyu International </option>
                                            <option class="form-control" name="customer" value="Sinelco International BVBA"> Sinelco International BVBA</option>
                                            <option class="form-control" name="customer" value="ST. John Ambulance Of Malaysia ">ST. John Ambulance Of Malaysia </option>
                                     		<option class="form-control" name="customer" value="Steeldrrill Workwear "> Steeldrrill Workwear </option>
                                            <option class="form-control" name="customer" value="Superior Glove Works Ltd. "> Superior Glove Works Ltd. </option>
                                     		<option class="form-control" name="customer" value="Tdl Textile, Llc "> Tdl Textile, Llc </option>
                                            <option class="form-control" name="customer" value="Tehnodent Poka SRL "> Tehnodent Poka SRL </option>
                                            <option class="form-control" name="customer" value="Teijin Frontier Co Ltd.">Teijin Frontier Co Ltd.</option>
                                     		<option class="form-control" name="customer" value="TG Medical  (USA) INC "> TG Medical  (USA) INC </option>
                                            <option class="form-control" name="customer" value="Tggd Medical Clinic Sdn. Bhd. "> Tggd Medical Clinic Sdn. Bhd. </option>
                                     		<option class="form-control" name="customer" value="The Avec Corporation "> The Avec Corporation </option>
                                            <option class="form-control" name="customer" value="The Safety Zone LLC "> The Safety Zone LLC </option>
                                            <option class="form-control" name="customer" value="TK <<Servis>> LLC ">TK <<Servis>> LLC </option>
                                     		<option class="form-control" name="customer" value="Tomas Bodero "> Tomas Bodero </option>
                                            <option class="form-control" name="customer" value="Top Corporation "> Top Corporation </option>
                                     		<option class="form-control" name="customer" value="Top Glove Europe Gmbh. "> Top Glove Europe Gmbh. </option>
                                            <option class="form-control" name="customer" value="UAP INC "> UAP INC </option>
                                            <option class="form-control" name="customer" value="UG Global Resource Sdn Bhd ">UG Global Resource Sdn Bhd </option>
                                     		<option class="form-control" name="customer" value="Unigloves Arzte& Klinikbedarf  "> Unigloves Arzte& Klinikbedarf  </option>
                                            <option class="form-control" name="customer" value="Unigloves UK Ltd"> Unigloves UK Ltd</option>
                                     		<option class="form-control" name="customer" value="Unixfarm  Up "> Unixfarm  Up </option>
                                            <option class="form-control" name="customer" value="Unizell Medicare Ghbh "> Unizell Medicare Ghbh </option>
                                            <option class="form-control" name="customer" value="Utsunomiya Seisaku Co. LTD ">Utsunomiya Seisaku Co. LTD </option>
                                     		<option class="form-control" name="customer" value="VENDORS LTD "> VENDORS LTD </option>
                                            <option class="form-control" name="customer" value="Viet Nam Fishery Material "> Viet Nam Fishery Material </option>
                                     		<option class="form-control" name="customer" value="Vik Dental "> Vik Dental </option>
                                            <option class="form-control" name="customer" value="Vinasea Co., Ltd "> Vinasea Co., Ltd </option>
                                            <option class="form-control" name="customer" value="Vision Trading Grup SRL ">Vision Trading Grup SRL </option>
                                     		<option class="form-control" name="customer" value="Vogt Medical Vertrieb Gmbh "> Vogt Medical Vertrieb Gmbh </option>
                                            <option class="form-control" name="customer" value="W.F.S. Limited "> W.F.S. Limited </option>
                                     		<option class="form-control" name="customer" value="Wan Sing Trading Co "> Wan Sing Trading Co </option>
                                            <option class="form-control" name="customer" value="West Chester Holdings Inc "> West Chester Holdings Inc </option>
                                            <option class="form-control" name="customer" value="Westdeutscher Binderarn ">Westdeutscher Binderarn </option>
                                     		<option class="form-control" name="customer" value="X & Y Industrial Company Limited "> X & Y Industrial Company Limited </option>
                                            <option class="form-control" name="customer" value="Zarys International Group Sp."> Zarys International Group Sp.</option>
                                     		
                                            
                                            
                                         </select></td>
                                           
                                           
                                            </div>
                              
                                            
                                                <th scope="col" class="info"</th><label>Brand:</label>
                                            <td><select class="form-control" id="brand" name="brand">
                                            <option class="form-control" name="brand" value=""> Brand</option>
                                        	<option class="form-control" name="brand" value="Abena Classic"> Abena Classic</option>
                                     		<option class="form-control" name="brand" value="Adele Pearl Pink NF"> Adele Pearl Pink NF</option>
                                            <option class="form-control" name="brand" value="Airclean"> Airclean</option>
                                     		<option class="form-control" name="brand" value="Ajsia"> Ajsia</option>
                                            <option class="form-control" name="brand" value="Albens"> Albens</option>
                                     		<option class="form-control" name="brand" value="Alfa Safe"> Alfa Safe</option>
                                        	<option class="form-control" name="brand" value="Alfa-Med"> Alfa-Med</option>
                                     		<option class="form-control" name="brand" value="ALL4MED (NPF)"> ALL4MED (NPF)</option>
                                            <option class="form-control" name="brand" value="Alvita (S)"> Alvita (S)</option>
                                     		<option class="form-control" name="brand" value="American"> American</option>
                                            <option class="form-control" name="brand" value="Arda"> Arda</option>
                                     		<option class="form-control" name="brand" value="Aylex Medical"> Aylex Medical</option>
                                        	<option class="form-control" name="brand" value="Beauty Basic"> Beauty Basic</option>
                                        	<option class="form-control" name="brand" value="Beesure "> Beesure </option>
                                        	<option class="form-control" name="brand" value="Beholi"> Beholi</option>
                                        	<option class="form-control" name="brand" value="Benovy ">Benovy </option>
                                     		<option class="form-control" name="brand" value="Benovy Be OCT17"> Benovy Be OCT17</option>
                                            <option class="form-control" name="brand" value="Benovy Be sept18 "> Benovy Be sept18 </option>
                                     		<option class="form-control" name="brand" value="Benovy DF Be Aug18"> Benovy DF Be Aug18</option>
                                            <option class="form-control" name="brand" value="Benson"> Benson</option>
                                     		<option class="form-control" name="brand" value="Blossom "> Blossom </option>
                                        	<option class="form-control" name="brand" value="Blossom Plus"> Blossom Plus</option>
                                     		<option class="form-control" name="brand" value="Body Tech"> Body Tech</option>
                                            <option class="form-control" name="brand" value="Boss B.M.C : USAW50"> Boss B.M.C : USAW50</option>
                                     		<option class="form-control" name="brand" value="Boxerline"> Boxerline</option>
                                            <option class="form-control" name="brand" value="Bulk Pack"> Bulk Pack</option>
                                     		<option class="form-control" name="brand" value="Care Glove"> Care Glove</option>
                                        	<option class="form-control" name="brand" value="Care More"> Care More</option>
                                        	<option class="form-control" name="brand" value="Cassiopeia"> Cassiopeia</option>
                                        	<option class="form-control" name="brand" value="Cerebrum"> Cerebrum</option>
                                        	<option class="form-control" name="brand" value="Challenger (8MIL)">Challenger (8MIL)</option>
                                     		<option class="form-control" name="brand" value="Chemy -Plast Strtile"> Chemy -Plast Strtile</option>
                                            <option class="form-control" name="brand" value="Citipack"> Citipack </option>
                                     		<option class="form-control" name="brand" value="Clean Grip"> Clean Grip</option>
                                            <option class="form-control" name="brand" value="Club (Bergamot)"> Club (Bergamot)</option>
                                     		<option class="form-control" name="brand" value="CMT"> CMT</option>
                                        	<option class="form-control" name="brand" value="Comfeel (Npf) ">Comfeel (Npf)</option>
                                     		<option class="form-control" name="brand" value="Comforties"> Comforties</option>
                                            <option class="form-control" name="brand" value="Condor"> Condor</option>
                                     		<option class="form-control" name="brand" value="Condor  NP"> Condor  NP</option>
                                            <option class="form-control" name="brand" value="Condor (N)"> Condor (N)</option>
                                     		<option class="form-control" name="brand" value="Converex"> Converex</option>
                                        	<option class="form-control" name="brand" value="Cover II"> Cover II</option>
                                        	<option class="form-control" name="brand" value="Craft Gloves Adult"> Craft Gloves Adult</option>
                                        	<option class="form-control" name="brand" value="Dealpack (HR001-4G)"> Dealpack (HR001-4G)</option>
                                        	
                                        	<option class="form-control" name="brand" value="Demotek "> Demotek</option>
                                            <option class="form-control" name="brand" value="Derma Sensitive "> Derma Sensitive</option>
                                     		<option class="form-control" name="brand" value="Dermik Gloves Hr Latex "> Dermik Gloves Hr Latex </option>
                                            <option class="form-control" name="brand" value="Discovery "> Discovery </option>
                                     		<option class="form-control" name="brand" value="Diverssa Med (8628) "> Diverssa Med (8628) </option>
                                       		<option class="form-control" name="brand" value="Dora Glove "> Dora Glove </option>
                                     		<option class="form-control" name="brand" value="Dr. Protect "> Dr. Protect </option>
                                            <option class="form-control" name="brand" value="Dr. Senst "> Dr. Senst </option>
                                     		<option class="form-control" name="brand" value="Dura Glove "> Dura Glove </option>
                                            <option class="form-control" name="brand" value="Duraskin "> Duraskin </option>
                                            <option class="form-control" name="brand" value="Ebuno"> Ebuno </option>
                                            <option class="form-control" name="brand" value="Elegance "> Elegance </option>
                                     		<option class="form-control" name="brand" value="EP "> EP </option>
                                            <option class="form-control" name="brand" value="Espeon "> Espeon </option>
                                     		<option class="form-control" name="brand" value="Eurotechnique Nitrile Black "> Eurotechnique Nitrile Black </option>
                                       		<option class="form-control" name="brand" value="Evergrade "> Evergrade </option>
                                     		<option class="form-control" name="brand" value="Excel Fit (PF) "> Excel Fit (PF) </option>
                                            <option class="form-control" name="brand" value="Excel Fit N440 "> Excel Fit N440 </option>
                                     		<option class="form-control" name="brand" value="Faher "> Faher </option>
                                            <option class="form-control" name="brand" value="Falcon "> Falcon </option>
                                            <option class="form-control" name="brand" value="Favorit  Soft Violet "> Favorit  Soft Violet </option>
                                            <option class="form-control" name="brand" value="Favorit ECO "> Favorit ECO </option>
                                     		<option class="form-control" name="brand" value="FAVORIT SOFT VIOLET "> FAVORIT SOFT VIOLET </option>
                                            <option class="form-control" name="brand" value="Filoskin "> Filoskin </option>
                                     		<option class="form-control" name="brand" value="First Glove "> First Glove </option>
                                       		<option class="form-control" name="brand" value="Flexshield Nite "> Flexshield Nite </option>
                                     		<option class="form-control" name="brand" value="Flyhorse "> Flyhorse </option>
                                            <option class="form-control" name="brand" value="Fpco Finger Micro Text "> Fpco Finger Micro Text </option>
                                     		<option class="form-control" name="brand" value="FPCO Grip Plus "> FPCO Grip Plus </option>
                                            <option class="form-control" name="brand" value="FPCO Palm Text "> FPCO Palm Text </option>
                                            <option class="form-control" name="brand" value="Framar "> Framar </option>
                                            <option class="form-control" name="brand" value="Free Stock "> Free Stock </option>
											<option class="form-control" name="brand" value="Frutti Treasure "> Frutti Treasure </option>
                                     		<option class="form-control" name="brand" value="Fuji "> Fuji </option>
                                            <option class="form-control" name="brand" value="Generic "> Generic </option>
                                     		<option class="form-control" name="brand" value="Generic ( X & Y ) "> Generic ( X & Y ) </option>
                                       		<option class="form-control" name="brand" value="Generic (Arhimed) "> Generic (Arhimed) </option>
                                     		<option class="form-control" name="brand" value="GENERIC (ICON QUALITY) "> GENERIC (ICON QUALITY) </option>
                                            <option class="form-control" name="brand" value="Generic (Non-Medical) "> Generic (Non-Medical) </option>
                                     		<option class="form-control" name="brand" value="GENERIC-TUOFENG "> GENERIC-TUOFENG </option>
                                            <option class="form-control" name="brand" value="Global Orchid "> Global Orchid </option>
                                            
                                            <option class="form-control" name="brand" value="Glomed "> Glomed </option>
                                            <option class="form-control" name="brand" value="Glove Mania "> Glove Mania </option>
                                     		<option class="form-control" name="brand" value="Glovezain "> Glovezain </option>
                                       		<option class="form-control" name="brand" value="Golden Glove "> Golden Glove </option>
                                     		<option class="form-control" name="brand" value="Gorilla Grip "> Gorilla Grip </option>
                                            <option class="form-control" name="brand" value="Grease Monkey "> Grease Monkey </option>
                                     		<option class="form-control" name="brand" value="Great  Nitril  Purple"> Great  Nitril  Purple</option>
                                            
                                            <option class="form-control" name="brand" value="Great Glove"> Great Glove</option>
                                            <option class="form-control" name="brand" value="Great Glove - MPG BY TG"> Great Glove - MPG BY TG</option>
                                     		<option class="form-control" name="brand" value="Great Nitril Green "> Great Nitril Green </option>
                                            <option class="form-control" name="brand" value="Green Pearl "> Green Pearl </option>
                                     		<option class="form-control" name="brand" value="Green Touch "> Green Touch </option>
                                       		<option class="form-control" name="brand" value="Guante De Latex (Azul) "> Guante De Latex (Azul) </option>
                                     		<option class="form-control" name="brand" value="H&S "> H&S </option>
                                            <option class="form-control" name="brand" value="Handel Med "> Handel Med </option>
                                     		<option class="form-control" name="brand" value="Handplus+ "> Handplus+ </option>
                                            <option class="form-control" name="brand" value="HDX "> HDX </option>
                                            <option class="form-control" name="brand" value="Head Gear "> Head Gear </option>
											<option class="form-control" name="brand" value="Henry Schein Grip Plus "> Henry Schein Grip Plus </option>
                                            <option class="form-control" name="brand" value="Hygieco "> Hygieco </option>
                                     		<option class="form-control" name="brand" value="Hygiline "> Hygiline </option>
                                            <option class="form-control" name="brand" value="Hygostar Safe Light Green "> Hygostar Safe Light Green </option>
                                     		<option class="form-control" name="brand" value="Hygostar Safe Light Red "> Hygostar Safe Light Red </option>
                                       		<option class="form-control" name="brand" value="I:Asap "> I:Asap </option>
                                     		<option class="form-control" name="brand" value="Inekta "> Inekta </option>
                                            <option class="form-control" name="brand" value="Inekta High Risk "> Inekta High Risk </option>
                                     		<option class="form-control" name="brand" value="Interglobus "> Interglobus </option>
                                            <option class="form-control" name="brand" value="JFM "> JFM </option>
                                            <option class="form-control" name="brand" value="Jpra "> Jpra </option>
                                            <option class="form-control" name="brand" value="Kalibr "> Kalibr </option>
                                     		<option class="form-control" name="brand" value="Keep Kleen (Usa) "> Keep Kleen (Usa) </option>
                                            <option class="form-control" name="brand" value="Lab+ "> Lab+ </option>
                                     		<option class="form-control" name="brand" value="Laborant "> Laborant </option>
                                       		<option class="form-control" name="brand" value="Labtide "> Labtide </option>
                                     		<option class="form-control" name="brand" value="LACYS "> LACYS </option>
                                            <option class="form-control" name="brand" value="Lakeland"> Lakeland</option>
                                     		<option class="form-control" name="brand" value="Lanchester NF Purple "> Lanchester NF Purple </option>
                                            <option class="form-control" name="brand" value="Latex "> Latex </option>
                                            <option class="form-control" name="brand" value="Lay Bare "> Lay Bare </option>
                                            <option class="form-control" name="brand" value="LDF "> LDF </option>
                                     		<option class="form-control" name="brand" value="Leyenanh "> Leyenanh </option>
                                            <option class="form-control" name="brand" value="LIFT "> LIFT </option>
                                     		<option class="form-control" name="brand" value="Lilac "> Lilac </option>
                                       		<option class="form-control" name="brand" value="Lindstrom "> Lindstrom </option>
                                     		<option class="form-control" name="brand" value="Luvax "> Luvax </option>
                                            <option class="form-control" name="brand" value="M+W Nitrile PF Mint "> M+W Nitrile PF Mint </option>
                                     		<option class="form-control" name="brand" value="M+W Sensitive "> M+W Sensitive </option>
                                            <option class="form-control" name="brand" value="Magica (CAREMED) "> Magica (CAREMED) </option>
                                            <option class="form-control" name="brand" value="Matrix High Risk Latex "> Matrix High Risk Latex </option>
                                            <option class="form-control" name="brand" value="Mc Glove "> Mc Glove </option>
                                     		<option class="form-control" name="brand" value="Medasept "> Medasept </option>
                                            <option class="form-control" name="brand" value="Medicare "> Medicare </option>
                                     		<option class="form-control" name="brand" value="Medicosm "> Medicosm </option>
                                       		<option class="form-control" name="brand" value="Medicosm Oct18"> Medicosm Oct18</option>
                                     		<option class="form-control" name="brand" value="Mediglove"> Mediglove</option>
                                            <option class="form-control" name="brand" value="Medi-Inn "> Medi-Inn </option>
                                     		<option class="form-control" name="brand" value="Mediok "> Mediok </option>
                                            <option class="form-control" name="brand" value="Mediquip "> Mediquip </option>
                                            
                                            <option class="form-control" name="brand" value="Medisafe "> Medisafe </option>
                                            <option class="form-control" name="brand" value="Mediscom  Aug18"> Mediscom  Aug18</option>
                                     		<option class="form-control" name="brand" value="Metro Professional "> Metro Professional </option>
                                            <option class="form-control" name="brand" value="Microflex "> Microflex </option>
                                     		<option class="form-control" name="brand" value="Midnight Mitts (300) "> Midnight Mitts (300) </option>
                                       		<option class="form-control" name="brand" value="Mildmed "> Mildmed </option>
                                     		<option class="form-control" name="brand" value="Mint   Pearl "> Mint   Pearl </option>
                                            <option class="form-control" name="brand" value="Minut Glove "> Minut Glove </option>
											<option class="form-control" name="brand" value="Missena "> Missena </option>
                                     		<option class="form-control" name="brand" value="Miyaco "> Miyaco </option>
                                            <option class="form-control" name="brand" value="MSI Gloves "> MSI Gloves </option>
                                            <option class="form-control" name="brand" value="Multipro "> Multipro </option>
                                            <option class="form-control" name="brand" value="Multipro N-Purple "> Multipro N-Purple </option>
                                     		<option class="form-control" name="brand" value="Mutsumi Nf "> Mutsumi Nf </option>
                                            <option class="form-control" name="brand" value="Nitras Black Wave "> Nitras Black Wave </option>
                                     		<option class="form-control" name="brand" value="Nitras Green Wave "> Nitras Green Wave </option>
                                       		<option class="form-control" name="brand" value="Nitras Mint Wave "> Nitras Mint Wave </option>
                                     		<option class="form-control" name="brand" value="Nitras Protect  300 "> Nitras Protect  300 </option>
                                            <option class="form-control" name="brand" value="Nitras Red Wave "> Nitras Red Wave </option>
                                     		<option class="form-control" name="brand" value="Nitrile "> Nitrile </option>
											<option class="form-control" name="brand" value="Nitrile Green "> Nitrile Green </option>
                                            <option class="form-control" name="brand" value="Nitrile Top "> Nitrile Top </option>
                                            <option class="form-control" name="brand" value="Nitrile Top38 (PD Blue) "> Nitrile Top38 (PD Blue) </option>
                                            <option class="form-control" name="brand" value="Nitrimax "> Nitrimax </option>
                                     		<option class="form-control" name="brand" value="Nitrimax Green "> Nitrimax Green </option>
                                            <option class="form-control" name="brand" value="Nitrimax Red "> Nitrimax Red </option>
                                     		<option class="form-control" name="brand" value="NP"> NP</option>
                                       		<option class="form-control" name="brand" value="Ohg Supablue "> Ohg Supablue </option>
                                     		<option class="form-control" name="brand" value="Omega Line "> Omega Line </option>
                                            <option class="form-control" name="brand" value="Omnident Soft "> Omnident Soft </option>
                                     		<option class="form-control" name="brand" value="Omnident Violet "> Omnident Violet </option>
                                            <option class="form-control" name="brand" value="OMNISAFE BLACK "> OMNISAFE BLACK </option>
                                            <option class="form-control" name="brand" value="Omnisafe Light Purple "> Omnisafe Light Purple </option>
                                            <option class="form-control" name="brand" value="Paclan Contact "> Paclan Contact </option>
                                     		<option class="form-control" name="brand" value="Pakwell "> Pakwell </option>
                                            <option class="form-control" name="brand" value="Paper and Linen "> Paper and Linen </option>
                                     		<option class="form-control" name="brand" value="Peppler "> Peppler </option>
                                       		<option class="form-control" name="brand" value="Ph Shield (Gd20) "> Ph Shield (Gd20) </option>
                                     		<option class="form-control" name="brand" value="Pharma Global "> Pharma Global </option>
                                            <option class="form-control" name="brand" value="Plain"> Plain</option>
                                     		<option class="form-control" name="brand" value="Pluradent "> Pluradent </option>
                                            <option class="form-control" name="brand" value="Posi Shield (2900) "> Posi Shield (2900) </option>
                                             <option class="form-control" name="brand" value="Prime Gloves "> Prime Gloves </option>
                                     		<option class="form-control" name="brand" value="Pro Smart Choice (HOLLAND) "> Pro Smart Choice (HOLLAND) </option>
                                            <option class="form-control" name="brand" value="PRO+350"> PRO+350</option>
                                            
                                            <option class="form-control" name="brand" value="Proff Comfot (High Risk)"> Proff Comfot (High Risk)</option>
                                            <option class="form-control" name="brand" value="Proguard (8646) "> Proguard (8646) </option>
                                     		<option class="form-control" name="brand" value="Pro-Tect "> Pro-Tect </option>
                                            <option class="form-control" name="brand" value="Protection Plus "> Protection Plus </option>
                                     		<option class="form-control" name="brand" value="Queen + Dispo "> Queen + Dispo </option>
                                       		<option class="form-control" name="brand" value="R.E "> R.E </option>
                                     		<option class="form-control" name="brand" value="Radnor "> Radnor </option>
                                            <option class="form-control" name="brand" value="Red Care "> Red Care </option>
											<option class="form-control" name="brand" value="Reldeen "> Reldeen </option>
                                     		<option class="form-control" name="brand" value="Red Pearl "> Red Pearl </option>
                                            <option class="form-control" name="brand" value="Roial Cinque Stelle "> Roial Cinque Stelle </option>
                                            <option class="form-control" name="brand" value="ROYAL "> ROYAL </option>
                                            <option class="form-control" name="brand" value="S.Touch Adv.Bk "> S.Touch Adv.Bk </option>
                                     		<option class="form-control" name="brand" value="SAFARI "> SAFARI </option>
                                            <option class="form-control" name="brand" value="Safe & Care "> Safe & Care </option>
                                     		<option class="form-control" name="brand" value="Safe Touch "> Safe Touch </option>
                                       		<option class="form-control" name="brand" value="Safetouch Advanced Guard "> Safetouch Advanced Guard </option>
                                     		<option class="form-control" name="brand" value="Salon Services "> Salon Services </option>
											<option class="form-control" name="brand" value="Santex GD18 (NPF Black) (PPE) "> Santex GD18 (NPF Black) (PPE) </option>
                                            <option class="form-control" name="brand" value="Schutz(Gipplus) "> Schutz(Gipplus) </option>
                                     		<option class="form-control" name="brand" value="Screen Food Nitril Green"> Screen Food Nitril Green</option>
                                            <option class="form-control" name="brand" value="SEMPRO "> SEMPRO </option>
                                            <option class="form-control" name="brand" value="Semycare "> Semycare </option>
                                            <option class="form-control" name="brand" value="Sensiskin "> Sensiskin </option>
                                     		<option class="form-control" name="brand" value="Sevgloves "> Sevgloves </option>
                                            <option class="form-control" name="brand" value="SF Medical "> SF Medical </option>
                                     		<option class="form-control" name="brand" value="SF MEDICAL (EU) "> SF MEDICAL (EU) </option>
                                       		<option class="form-control" name="brand" value="Sfm (Tnusg) "> Sfm (Tnusg) </option>
                                     		<option class="form-control" name="brand" value="Singer (NF) "> Singer (NF) </option>
                                            <option class="form-control" name="brand" value="Singer (NP) "> Singer (NP) </option>
                                     		<option class="form-control" name="brand" value="Skintex"> Skintex</option>
                                            <option class="form-control" name="brand" value="Skytec Iric "> Skytec Iric </option>
                                            <option class="form-control" name="brand" value="Skytec Rhode "> Skytec Rhode </option>
                                            <option class="form-control" name="brand" value="Smooth Fit "> Smooth Fit </option>
                                     		<option class="form-control" name="brand" value="Softskin Poka "> Softskin Poka </option>
                                            <option class="form-control" name="brand" value="Stylus "> Stylus </option>
                                     		<option class="form-control" name="brand" value="Stylus By Ah-Kim-Pech "> Stylus By Ah-Kim-Pech </option>
                                       		<option class="form-control" name="brand" value="Sure Touch "> Sure Touch </option>
                                     		<option class="form-control" name="brand" value="Task Gloves "> Task Gloves </option>
                                            <option class="form-control" name="brand" value="Teijin "> Teijin </option>
                                     		<option class="form-control" name="brand" value="Tg Kids Gloves "> Tg Kids Gloves </option>
                                            <option class="form-control" name="brand" value="Tg Kids Gloves  (WITH HANGER) "> Tg Kids Gloves  (WITH HANGER) </option>
                                            <option class="form-control" name="brand" value="TG Medical "> TG Medical </option>
                                            <option class="form-control" name="brand" value="The Safety Zone "> The Safety Zone </option>
                                     		<option class="form-control" name="brand" value="TOP "> TOP </option>
                                            <option class="form-control" name="brand" value="TOP CARE-TG "> TOP CARE-TG </option>
                                     		<option class="form-control" name="brand" value="Top Glove"> Top Glove</option>
                                       		<option class="form-control" name="brand" value="Touch Morado "> Touch Morado </option>
                                     		<option class="form-control" name="brand" value="Triple-D "> Triple-D </option>
                                            <option class="form-control" name="brand" value="Tuff Nite Purple "> Tuff Nite Purple </option>
                                     		<option class="form-control" name="brand" value="Ulithclean "> Ulithclean </option>
                                            <option class="form-control" name="brand" value="Ultra Fresh "> Ultra Fresh </option>
                                            
                                            <option class="form-control" name="brand" value="Ultraglove"> Ultraglove</option>
                                     		<option class="form-control" name="brand" value="Uni Max "> Uni Max </option>
                                            <option class="form-control" name="brand" value="Unicare Soft "> Unicare Soft </option>
                                     		<option class="form-control" name="brand" value="Unigloves "> Unigloves </option>
                                            <option class="form-control" name="brand" value="Unigloves Mint Pearl "> Unigloves Mint Pearl </option>
                                            <option class="form-control" name="brand" value="Unigloves Red Pearl"> Unigloves Red Pearl</option>
                                     		<option class="form-control" name="brand" value="Unigloves Violet Pearl "> Unigloves Violet Pearl </option>
                                            <option class="form-control" name="brand" value="Viet Nam FMC "> Viet Nam FMC </option>
                                     		<option class="form-control" name="brand" value="Violet Pearl "> Violet Pearl </option>
                                            <option class="form-control" name="brand" value="Violet Touch "> Violet Touch </option>
                                            <option class="form-control" name="brand" value="VM - RU 05 "> VM - RU 05 </option>
                                     		<option class="form-control" name="brand" value="Walking Kids Glove "> Walking Kids Glove </option>
                                            <option class="form-control" name="brand" value="Work-Inn "> Work-Inn </option>
                                     		<option class="form-control" name="brand" value="Wright (UK) "> Wright (UK) </option>
                                            <option class="form-control" name="brand" value="Zks Domirisk"> Zks Domirisk</option>
                                            
                                         </select></td>
                                            <br>
                                            
                                            <div class="form-group">
                                                <label>SO NO:</label>
                                                <input type="text" class="form-control" name="so_no">
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label>LOT NO:</label>
                                                <input type="text" class="form-control" name="lot_no">
                                            </div>
                                            
                                             
                                       <th scope="col" class="info"</th><label>Product:</label>
                                            <td><select class="form-control" id="product" name="product">
                                            <option class="form-control" name="product" value=""> Product</option>
                                        	<option class="form-control" name="product" value="LPFPT"> LPFPT</option>
                                     		<option class="form-control" name="product" value="LPFS"> LPFS</option>
                                            <option class="form-control" name="product" value="NPFFT"> NPFFT</option>
                                     		<option class="form-control" name="product" value="NPFFTT"> NPFFTT</option>
                                            <option class="form-control" name="product" value="NPFPT"> NPFPT</option>
                                     		<option class="form-control" name="product" value="NPFT"> NPFT</option>
											<option class="form-control" name="product" value="NPPT"> NPPT</option>
                                       		<option class="form-control" name="product" value="NPFTT"> NPFTT</option>
                                     		<option class="form-control" name="product" value="NSPFPT"> NSPFPT</option>
                                            <option class="form-control" name="product" value="PFS"> PFS</option>
                                     		<option class="form-control" name="product" value="PFT"> PFT</option>
                                            <option class="form-control" name="product" value="SNP"> SNP</option>
                                     		
                                         </select></td>
                                          <br>
                                        
                                            
                                            
                                          
                                                <th scope="col" class="info"</th><label>Product Code:</label>
                                            <td><select class="form-control" id="product_code" name="product_code">
            								<option class="form-control" name="product_code" value=""> Product Code</option>
                                     		<option class="form-control" name="product_code" value="CW030"> CW030</option>
                                            <option class="form-control" name="product_code" value="CW035"> CW035</option>
                                     		<option class="form-control" name="product_code" value="CW038"> CW038</option>
                                            <option class="form-control" name="product_code" value="CW040"> CW040</option>
                                     		<option class="form-control" name="product_code" value="CW044"> CW044</option>
                                        	<option class="form-control" name="product_code" value="CW050"> CW050</option>
                                     		<option class="form-control" name="product_code" value="CW058"> CW058</option>
                                            <option class="form-control" name="product_code" value="CW059"> CW059</option>
                                     		<option class="form-control" name="product_code" value="CW060"> CW060</option>
                                            <option class="form-control" name="product_code" value="CW064"> CW064</option>
                                     		<option class="form-control" name="product_code" value="CW070"> CW070</option>
                                        	<option class="form-control" name="product_code" value="CW130"> CW130</option>
                                        	<option class="form-control" name="product_code" value="CW150"> CW150</option>
                                        	<option class="form-control" name="product_code" value="CW185"> CW185</option>
                                            <option class="form-control" name="product_code" value="ENW030"> ENW030</option>
                                     		<option class="form-control" name="product_code" value="ENW035"> ENW035</option>
                                            <option class="form-control" name="product_code" value="ENW038"> ENW038</option>
                                     		<option class="form-control" name="product_code" value="ENW040"> ENW040</option>
                                        	<option class="form-control" name="product_code" value="ENW050"> ENW050</option>
                                     		<option class="form-control" name="product_code" value="ENW065"> ENW065</option>
                                            <option class="form-control" name="product_code" value="ENW075"> ENW075</option>
                                     		<option class="form-control" name="product_code" value="ENW130"> ENW130</option>
                                            <option class="form-control" name="product_code" value="ENW185"> ENW185</option>
                                     		<option class="form-control" name="product_code" value="ISOW050"> ISOW050</option>
                                        	<option class="form-control" name="product_code" value="USAW030"> USAW030</option>
                                        	<option class="form-control" name="product_code" value="USAW040"> USAW040</option>
                                        	<option class="form-control" name="product_code" value="USAW050"> USAW050</option>
                                     		<option class="form-control" name="product_code" value="USAW130"> USAW130</option>
                                            <option class="form-control" name="product_code" value="USEW035"> USEW035</option>
                                     		<option class="form-control" name="product_code" value="USEW038">
                                           	USEW038 </option>
                                            <option class="form-control" name="product_code" value="USEW040"> USEW040</option>
                                     		<option class="form-control" name="product_code" value="USEW044"> USEW044</option>
                                        	<option class="form-control" name="product_code" value="USEW046"> USEW046</option>
                                     		<option class="form-control" name="product_code" value="USEW050"> USEW050</option>
                                            <option class="form-control" name="product_code" value="USEW058"> USEW058</option>
                                     		<option class="form-control" name="product_code" value="USEW059"> USEW059</option>
                                            <option class="form-control" name="product_code" value="USEW130 "> USEW130</option>
                                     		<option class="form-control" name="product_code" value="USEW44"> USEW44</option>
                                        	<option class="form-control" name="product_code" value="USEW46"> USEW46</option>
                                        	<option class="form-control" name="product_code" value="USEW58"> USEW58</option>
                                         </select></td>
                                            
                                            <br>
                                              <th scope="col" class="info"</th><label>Colour:</label>
                                            <td><select class="form-control" id="colour" name="colour">
                                            <option class="form-control" name="colour" value=""> Colour</option>
                                        	<option class="form-control" name="colour" value="White"> White</option>
                                     		<option class="form-control" name="colour" value="Blue"> Blue</option>
                                            	<option class="form-control" name="colour" value="Green"> Green</option>
                                     		<option class="form-control" name="colour" value="Black">Black </option>
                                            	<option class="form-control" name="colour" value="Orange black"> Orange black</option>
                                     		<option class="form-control" name="colour" value="Avocado Green"> Avocado Green</option>
											<option class="form-control" name="colour" value="Fluorescent Green"> Fluorescent Green</option>
                                        	<option class="form-control" name="colour" value="Red"> Red</option>
                                     		<option class="form-control" name="colour" value="Forest Green "> Forest Green </option>
                                            	<option class="form-control" name="colour" value="Light Purple"> Light Purple</option>
                                     		<option class="form-control" name="colour" value="Darkblue"> Darkblue</option>
                                            	<option class="form-control" name="colour" value="Pearlescent Pink "> Pearlescent Pink </option>
                                     		<option class="form-control" name="colour" value="Natural"> Natural</option>
                                        	<option class="form-control" name="colour" value="VioletBlue"> VioletBlue</option>
                                        	<option class="form-control" name="colour" value="Ocean Blue"> Ocean Blue</option>
                                         	</select></td>
                                           <br>
                                    
                                            <div class="form-group">
                                                <th scope="col" class="info"</th><label>Production Line:</label>
                                            	<td><select class="form-control" id="line" name="line">
                                            	<option class="form-control" name="line" value=""> Production Line</option>
                                        	<option class="form-control" name="line" value="L01"> L01</option>
                                     		<option class="form-control" name="line" value="L02"> L02</option>
						<option class="form-control" name="line" value="L03"> L03</option>
						<option class="form-control" name="line" value="L04"> L04</option>
						<option class="form-control" name="line" value="L05"> L05</option>
						<option class="form-control" name="line" value="L06"> L06</option>
						<option class="form-control" name="line" value="L07"> L07</option>
						<option class="form-control" name="line" value="L08"> L08</option>
						<option class="form-control" name="line" value="L09"> L09</option>
						<option class="form-control" name="line" value="L10"> L10</option>
						<option class="form-control" name="line" value="L11"> L11</option>
						<option class="form-control" name="line" value="L12"> L12</option>
						<option class="form-control" name="line" value="L13"> L13</option>
						<option class="form-control" name="line" value="L14"> L14</option>
						<option class="form-control" name="line" value="L15"> L15</option>
						<option class="form-control" name="line" value="L16"> L16</option>
						<option class="form-control" name="line" value="L17"> L17</option>
						<option class="form-control" name="line" value="L18"> L18</option>
						<option class="form-control" name="line" value="L19"> L19</option>
						<option class="form-control" name="line" value="L20"> L20</option>
                                         </select></td>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Product Detail:</label>
                                                <input type="text" class="form-control" name="product_detail">
                                            </div>
                                            
                                            <div class="form-group">
                                            <label>Shift: </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="shift" id="optionsRadiosInline1" value="shift 1" checked>Shift 1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="shift" id="optionsRadiosInline2" value="shift 2">Shift 2
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="shift" id="optionsRadiosInline3" value="Shift 3">Shift 3
                                            </label>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label>Pack Date:</label>
                                            <input type="date" name="pack_date" id="pack_date" placeholder="">
                                            
                                        </div>

											<div class="form-group">
                                                <label>QA ID (Check by):</label>
                                                <input type="text" class="form-control" name="QA_ID">
                                            </div>
                                  </div>
                                  </div>
                                  </div>
                                  
                                  
                                  
                      <div class="row">
                <div class="col-lg-12">                   
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        Other Testing
                        </div>
                                     <div class="col-lg-6">
                            		 </br>
                                    
                                        <label>1. Testing Equipment</label></br>
                                </br>
                                     
                                        <div class="form-group">

                                            <label>WEIGHING SCALE ID</label>
                                     		<input class="form-control" name="weighing_scale" id="weighing_scale" placeholder="Enter text" required>
                                                                              
                                        </div>
                                        <div class="form-group">
                                            <label>RULER ID</label>
                                            <input class="form-control" name="ruler" id="ruler" placeholder="Enter text" required>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>THICKNESS GAUGE ID</label>
                                            <input class="form-control" name="thickness" id="thickness" placeholder="Enter text" required>
                                            
                                        </div>
                                        
                                        <br>
                                        
                                          <label>2. Glove Weight, Counting, Packaging Defect</label></br></br>
                                   
                                   <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  										<tr>
                                        
                                     <td class="info">GLOVE WEIGHT:</td>
                                         <td><label class="checkbox-inline">
                                                <input type="radio" name="glove_weight_p_f" id="optionsRadios1" value="PASS" checked>PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="glove_weight_p_f" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                          </td>
                                          
                                          
                                        <td><input class="form-control" name="glove_weight" placeholder="Enter code"></td>
 										</tr>
    									
                                        <tr>
                                        
                                        
                                        <td class="info">COUNTING:</td>
                                         <td><label class="checkbox-inline">
                                                <input type="radio" name="counting_p_f" id="optionsRadios1" value="PASS" checked>PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="counting_p_f" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                          </td>
                                        
                                        <td><input class="form-control" name="counting" placeholder="Enter code" required></td>
  										</tr>
  										
  										  <tr>
                                            <td class="info">PACKAGING DEFECT:</td>
                                            <td><label class="checkbox-inline">
                                                <input type="radio" name="pack_defect" id="optionsRadios1" value="PASS" checked>PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="pack_defect" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                        	</td>
                                        </tr>
  										
 									</table>
                                        
                                        </div>
                                      
                                     </div>
                                    
                                
                                
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                
                                   
                                    <label>3. Internal Physical Testing</label>
                                    
                                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  										<tr>
                                        <div class="form-group">
                                        
                                        <th scope="col" class="info">Layering:</th>
                                        <td><label class="checkbox-inline">
                                                <input type="radio" name="layering" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="layering" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="layering" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                         </td>
                                        
                                         <th class="info">Smelly:</th>
                                         <td><label class="checkbox-inline">
                                                <input type="radio" name="smelly" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            
                                            <label class="checkbox-inline">
                                                <input type="radio" name="smelly" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            
                                            <label class="checkbox-inline">
                                                <input type="radio" name="smelly" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                          </td>
                                          </tr>
                                        
                                          <tr>
                                          <th scope="col" class="info">Gripness:</th>
                                          <td><label class="checkbox-inline">
                                                <input type="radio" name="gripness" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="gripness" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="gripness" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                           </td>
                                        
                                           <th class="info">Donning & Tearing:</th>
                                           <td><label class="checkbox-inline">
                                                <input type="radio" name="donning" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="donning" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="donning" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                            </td>
                                            </tr>
                                        
                                        <tr>
                                            <th scope="col" class="info">Black Cloth:</th>
                                            <td><label class="checkbox-inline">
                                                <input type="radio" name="black_test" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="black_test" id="optionsRadios1" value="PASS" >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="black_test" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                            </td>
                                            
                                        
                                            <th class="info">Sticking:</th>
                                            <td><label class="checkbox-inline">
                                                <input type="radio" name="sticking" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="sticking" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="sticking" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                            </td>
                                         </tr>
                                         
                                        <tr>
                                            <th scope="col" class="info">Dispensing:</th>
                                            <td><label class="checkbox-inline">
                                                <input type="radio" name="dispensing_test" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="dispensing_test" id="optionsRadios1" value="PASS">PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="dispensing_test" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                            </td>
                                            
                                        
                                            <th class="info">White Cloth:</th>
                                            <td><label class="checkbox-inline">
                                                <input type="radio" name="white_test" id="optionsRadios1" value="N/A" checked>N/A
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="white_test" id="optionsRadios1" value="PASS" >PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="white_test" id="optionsRadios2" value="FAIL">FAIL
                                            </label>
                                            </td>
                                         </tr>
                                        
                                      
                                    </table>
                                    
                                    <label>4. Special Requirement</label>
                                    
                                        <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  										<tr>
                                        <div class="form-group">
                   
                                        <th scope="col" class="info">Test No:</th>
                                        <th class="info">Test Name:</th>
                                        <th scope="col" class="info">Disposition:</th>
                                        </tr>
                                     
                                        <th scope="col" class="info">Test 1:</th>
                                        <td>
                                        <select class="form-control" id="test1" name="test1">
                                        	<option class="form-control" name="test1" value="N/A"> N/A</option>
                                     		<option class="form-control" name="test1" value="OMT"> OMT</option>
                                        	<option class="form-control" name="test1" value="Foaming"> Foaming</option>
                                        	<option class="form-control" name="test1" value="Rubbing"> Rubbing</option>
                                        	<option class="form-control" name="test1" value="IPA"> IPA</option>
                                         </select>
                                        </td>
                                        
                           				<td>
                                        <select class="form-control" id="test1_disposition" name="test1_disposition">
                                        	<option class="form-control" name="test1_disposition" value="PASS"> N/A</option>
                                        	<option class="form-control" name="test1_disposition" value="PASS"> PASS</option>
                                     		<option class="form-control" name="test1_disposition" value="FAIL"> FAIL</option>
                                         </select>
                                        </td>
											</tr>
                                    <tr>
                                     
                                      <th scope="col" class="info">Test 2:</th>
                                        <td>
                                        <select class="form-control" id="test2" name="test2">
                                        	<option class="form-control" name="test2" value="N/A"> N/A</option>
                                     		<option class="form-control" name="test2" value="OMT"> OMT</option>
                                        	<option class="form-control" name="test2" value="Foaming"> Foaming</option>
                                        	<option class="form-control" name="test2" value="Rubbing"> Rubbing</option>
                                        	<option class="form-control" name="test2" value="IPA"> IPA</option>
                                         </select>
                                        </td>
                                        
                           				<td>
                                        <select class="form-control" id="test2_disposition" name="test2_disposition">
                                        	<option class="form-control" name="test2_disposition" value="PASS"> N/A</option>
                                        	<option class="form-control" name="test2_disposition" value="PASS"> PASS</option>
                                     		<option class="form-control" name="test2_disposition" value="FAIL"> FAIL</option>
                                         </select>
                                        </td>
                                        </tr>
                                    <tr>
                                     
                                      <th scope="col" class="info">Test 3:</th>
                                        <td>
                                        <select class="form-control" id="test3" name="test3">
                                        	<option class="form-control" name="test3" value="N/A"> N/A</option>
                                     		<option class="form-control" name="test3" value="OMT"> OMT</option>
                                        	<option class="form-control" name="test3" value="Foaming"> Foaming</option>
                                        	<option class="form-control" name="test3" value="Rubbing"> Rubbing</option>
                                        	<option class="form-control" name="test3" value="IPA"> IPA</option>
                                         </select>
                                        </td>
                                        
                           				<td>
                                        <select class="form-control" id="test3_disposition" name="test3_disposition">
                                        	<option class="form-control" name="test3_disposition" value="PASS"> N/A</option>
                                        	<option class="form-control" name="test3_disposition" value="PASS"> PASS</option>
                                     		<option class="form-control" name="test3_disposition" value="FAIL"> FAIL</option>
                                         </select>
                                        </td>
                                          <tr>
                                     
                                      <th scope="col" class="info">Test 4:</th>
                                        <td>
                                        <select class="form-control" id="test4" name="test4">
                                        	<option class="form-control" name="test4" value="N/A"> N/A</option>
                                     		<option class="form-control" name="test4" value="OMT"> OMT</option>
                                        	<option class="form-control" name="test4" value="Foaming"> Foaming</option>
                                        	<option class="form-control" name="test4" value="Rubbing"> Rubbing</option>
                                        	<option class="form-control" name="test4" value="IPA"> IPA</option>
                                         </select>
                                        </td>
                                        
                           				<td>
                                        <select class="form-control" id="test4_disposition" name="test4_disposition">
                                        	<option class="form-control" name="test4_disposition" value="PASS"> N/A</option>
                                        	<option class="form-control" name="test4_disposition" value="PASS"> PASS</option>
                                     		<option class="form-control" name="test4_disposition" value="FAIL"> FAIL</option>
                                         </select>
                                        </td>
                                        </tr>
                                          <tr>
                                     
                                      <th scope="col" class="info">Test 5:</th>
                                        <td>
                                        <select class="form-control" id="test5" name="test5">
                                        	<option class="form-control" name="test5" value="N/A"> N/A</option>
                                     		<option class="form-control" name="test5" value="OMT"> OMT</option>
                                        	<option class="form-control" name="test5" value="Foaming"> Foaming</option>
                                        	<option class="form-control" name="test5" value="Rubbing"> Rubbing</option>
                                        	<option class="form-control" name="test5" value="IPA"> IPA</option>
                                         </select>
                                        </td>
                                        
                           				<td>
                                        <select class="form-control" id="test5_disposition" name="test5_disposition">
                                        	<option class="form-control" name="test5_disposition" value="PASS"> N/A</option>
                                        	<option class="form-control" name="test5_disposition" value="PASS"> PASS</option>
                                     		<option class="form-control" name="test5_disposition" value="FAIL"> FAIL</option>
                                         </select>
                                        </td>
                                        </tr>
                                    </table>
                                    
                                    </div>
                                    
                    
                   <div class="row">
                   <div class="col-lg-12">                                              
                    <div class="panel panel-primary">
                   
                        <div class="panel-heading">
                            Physical Dimensions Test
                        </div>
                       </div> 
                                      <div class="col-lg-7">               
                                    
                                    
                               
                               
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  										<tr>
    									<th scope="col" class="info">METHOD:</th>
    
      									<td><label class="checkbox-inline">
                                                <input type="radio" name="testing_method" id="optionsRadios1" value="SINGLE WALL" checked>SINGLE WALL
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="testing_method" id="optionsRadios1" value="DOUBLE WALL">DOUBLE WALL
                                            </label>
                                        </td>
 										</tr>
                                 </table>
                                 </div>
                                   
                                 
                                <div class="col-lg-12">
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                		<tr class="info">
                     
                      					<th>TESTS SAMPLE</th>
                      					<th>1</th>
                      					<th>2</th>
                      					<th>3</th>
                      					<th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>13</th>
                                        <th>PASS/FAIL</th>
                    					</tr>
  										<tr>
    									<th scope="col" class="info">Length(mm):</th>
                                        
                                        
                            			<td><input class="form-control" name="length1" id="length" placeholder="" required></td>
                           				<td><input class="form-control" name="length2" id="length" placeholder="" required></td>
                            			<td><input class="form-control" name="length3" id="length" placeholder="" required></td>
                            			<td><input class="form-control" name="length4" id="length" placeholder="" ></td>
                            			<td><input class="form-control" name="length5" id="length" placeholder="" ></td>
                            			<td><input class="form-control" name="length6" id="length" placeholder="" ></td>
                            			<td><input class="form-control" name="length7" id="length" placeholder="" ></td>
                            			<td><input class="form-control" name="length8" id="length" placeholder="" ></td>
                            			<td><input class="form-control" name="length9" id="length" placeholder="" ></td>
                            			<td><input class="form-control" name="length10" id="length" placeholder="" ></td>
                            			<td><input class="form-control" name="length11" id="length" placeholder="" ></td>
                            			<td><input class="form-control" name="length12" id="length" placeholder="" ></td>
                            			<td><input class="form-control" name="length13" id="length" placeholder="" ></td>
      									<td>
                                        <select class="form-control" id="P/f" name="length">
                                        	<option class="form-control" name="length" value="PASS"> P</option>
                                     		<option class="form-control" name="length" value="FAIL"> F</option>
                                         </select>
                                        </td>
 										</tr>
    									
                                        <tr>
    									<th scope="col" class="info">Width(mm):</th>
                                        
                                       		<td><input class="form-control" name="width1" id="width" placeholder="" required></td>
                            			<td><input class="form-control" name="width2" id="width" placeholder="" required></td>
                           			<td><input class="form-control" name="width3" id="width" placeholder="" required></td>
                            			<td><input class="form-control" name="width4" id="width" placeholder="" ></td>
                            			<td><input class="form-control" name="width5" id="width" placeholder="" ></td>
                            			<td><input class="form-control" name="width6" id="width" placeholder="" ></td>
                            			<td><input class="form-control" name="width7" id="width" placeholder="" ></td>
                            			<td><input class="form-control" name="width8" id="width" placeholder="" ></td>
                                        <td><input class="form-control" name="width9" id="width" placeholder="" ></td>
                            			<td><input class="form-control" name="width10" id="width" placeholder="" ></td>
                            			<td><input class="form-control" name="width11" id="width" placeholder="" ></td>
                            			<td><input class="form-control" name="width12" id="width" placeholder="" ></td>
                            			<td><input class="form-control" name="width13" id="width" placeholder="" ></td>
      									<td>
                                        <select class="form-control" id="P/f" name="width">
                                        	<option class="form-control" name="width" value="PASS"> P</option>
                                     		<option class="form-control" name="width" value="FAIL"> F</option>
                                         </select>
                                        </td>
 										</tr><tr>
    									<th scope="col" class="info">Thicknes Cuff(mm):</th>
                                        
                                        <td><input class="form-control" name="cuff1" id="cuff" placeholder="" required></td>
                            			<td><input class="form-control" name="cuff2" id="cuff" placeholder="" required></td>
                           				<td><input class="form-control" name="cuff3" id="cuff" placeholder="" required></td>
                            			<td><input class="form-control" name="cuff4" id="cuff" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff5" id="cuff" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff6" id="cuff" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff7" id="cuff" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff8" id="cuff" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff9" id="cuff" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff10" id="cuff" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff11" id="cuff" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff12" id="cuff" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff13" id="cuff" placeholder="" ></td>
      									<td>
                                        <select class="form-control" id="P/f" name="cuff">
                                        	<option class="form-control" name="cuff" value="PASS"> P</option>
                                     		<option class="form-control" name="cuff" value="FAIL"> F</option>
                                         </select>
                                        </td>
 										</tr><tr>
    									<th scope="col" class="info">Thicknes Palm(mm):</th>
                                        
                                        <td><input class="form-control" name="palm1" id="palm" placeholder="" required></td>
                            			<td><input class="form-control" name="palm2" id="palm" placeholder="" required></td>
                           				<td><input class="form-control" name="palm3" id="palm" placeholder="" required></td>
                            			<td><input class="form-control" name="palm4" id="palm" placeholder="" ></td>
                            			<td><input class="form-control" name="palm5" id="palm" placeholder="" ></td>
                            			<td><input class="form-control" name="palm6" id="palm" placeholder="" ></td>
                            			<td><input class="form-control" name="palm7" id="palm" placeholder="" ></td>
                            			<td><input class="form-control" name="palm8" id="palm" placeholder="" ></td>
                            			<td><input class="form-control" name="palm9" id="palm" placeholder="" ></td>
                            			<td><input class="form-control" name="palm10" id="palm" placeholder="" ></td>
                            			<td><input class="form-control" name="palm11" id="palm" placeholder="" ></td>
                            			<td><input class="form-control" name="palm12" id="palm" placeholder="" ></td>
                            			<td><input class="form-control" name="palm13" id="palm" placeholder="" ></td>
      									<td>
                                        <select class="form-control" id="P/f" name="palm">
                                        	<option class="form-control" name="palm" value="PASS"> P</option>
                                     		<option class="form-control" name="palm" value="FAIL"> F</option>
                                         </select>
                                        </td>
 										</tr>
                                        <tr>
    									<th scope="col" class="info">Thicknes Fingertip(mm):</th>
                                        
                                        <td><input class="form-control" name="fingertip1" id="fingertip" placeholder="" required></td>
                            			<td><input class="form-control" name="fingertip2" id="fingertip" placeholder="" required></td>
                                        <td><input class="form-control" name="fingertip3" id="fingertip" placeholder="" required></td>
                            			<td><input class="form-control" name="fingertip4" id="fingertip" placeholder="" ></td>
                            			<td><input class="form-control" name="fingertip5" id="fingertip" placeholder="" ></td>
                            			<td><input class="form-control" name="fingertip6" id="fingertip" placeholder="" ></td>
                            			<td><input class="form-control" name="fingertip7" id="fingertip" placeholder="" ></td>
                            			<td><input class="form-control" name="fingertip8" id="fingertip" placeholder="" ></td>
                            			<td><input class="form-control" name="fingertip9" id="fingertip" placeholder="" ></td>
                            			<td><input class="form-control" name="fingertip10" id="fingertip" placeholder="" ></td>
                            			<td><input class="form-control" name="fingertip11" id="fingertip" placeholder="" ></td>
                            			<td><input class="form-control" name="fingertip12" id="fingertip" placeholder="" ></td>
                            			<td><input class="form-control" name="fingertip13" id="fingertip" placeholder="" ></td>
      									<td>
                                        <select class="form-control" id="P/f" name="fingertip">
                                        	<option class="form-control" name="fingertip" value="PASS"> P</option>
                                     		<option class="form-control" name="fingertip" value="FAIL"> F</option>
                                         </select>
                                        </td>
 										</tr>
                                        <tr>
    									<th scope="col" class="info">*Thicknes Bead Diameter:</th>
                                        
                                        <td><input class="form-control" name="bead_diamete1" id="bead_diamete" placeholder="" required></td>
                            			<td><input class="form-control" name="bead_diamete2" id="bead_diamete" placeholder="" required></td>
                           				<td><input class="form-control" name="bead_diamete3" id="bead_diamete" placeholder="" required></td>
                            			<td><input class="form-control" name="bead_diamete4" id="bead_diamete" placeholder="" ></td>
                            			<td><input class="form-control" name="bead_diamete5" id="bead_diamete" placeholder="" ></td>
                            			<td><input class="form-control" name="bead_diamete6" id="bead_diamete" placeholder="" ></td>
                            			<td><input class="form-control" name="bead_diamete7" id="bead_diamete" placeholder="" ></td>
                            			<td><input class="form-control" name="bead_diamete8" id="bead_diamete" placeholder="" ></td>
                            			<td><input class="form-control" name="bead_diamete9" id="bead_diamete" placeholder="" ></td>
                            			<td><input class="form-control" name="bead_diamete10" id="bead_diamete" placeholder="" ></td>
                            			<td><input class="form-control" name="bead_diamete11" id="bead_diamete" placeholder="" ></td>
                            			<td><input class="form-control" name="bead_diamete12" id="bead_diamete" placeholder="" ></td>
                            			<td><input class="form-control" name="bead_diamete13" id="bead_diamete" placeholder="" ></td>
      									<td>
                                        <select class="form-control" id="P/f" name="bead_diamete">
                                        	<option class="form-control" name="bead_diamete" value="PASS"> P</option>
                                     		<option class="form-control" name="bead_diamete" value="FAIL"> F</option>
                                         </select>
                                        </td>
 										</tr><tr>
    									<th scope="col" class="info">*Thicknes Cuff Edge:</th>
                                        
                                        <td><input class="form-control" name="cuff_edge1" id="cuff_edge" placeholder="" required></td>
                            			<td><input class="form-control" name="cuff_edge2" id="cuff_edge" placeholder="" required></td>
                           				<td><input class="form-control" name="cuff_edge3" id="cuff_edge" placeholder="" required></td>
                            			<td><input class="form-control" name="cuff_edge4" id="cuff_edge" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff_edge5" id="cuff_edge" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff_edge6" id="cuff_edge" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff_edge7" id="cuff_edge" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff_edge8" id="cuff_edge" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff_edge9" id="cuff_edge" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff_edge10" id="cuff_edge" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff_edge11" id="cuff_edge" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff_edge12" id="cuff_edge" placeholder="" ></td>
                            			<td><input class="form-control" name="cuff_edge13" id="cuff_edge" placeholder="" ></td>
      									<td>
                                        <select class="form-control" id="P/f" name="cuff_edge">
                                        	<option class="form-control" name="cuff_edge" value="PASS"> P</option>
                                     		<option class="form-control" name="cuff_edge" value="FAIL"> F</option>
                                         </select>
                                        </td>
 										</tr><tr>
    									<th scope="col" class="info">*Glove Weight:</th>
                                        
                                        <td><input class="form-control" name="weight1" id="weight" placeholder="" required></td>
                            			<td><input class="form-control" name="weight2" id="weight" placeholder="" required></td>
                           				<td><input class="form-control" name="weight3" id="weight" placeholder="" required></td>
                            			<td><input class="form-control" name="weight4" id="weight" placeholder="" ></td>
                            			<td><input class="form-control" name="weight5" id="weight" placeholder="" ></td>
                            			<td><input class="form-control" name="weight6" id="weight" placeholder="" ></td>
                            			<td><input class="form-control" name="weight7" id="weight" placeholder="" ></td>
                            			<td><input class="form-control" name="weight8" id="weight" placeholder="" ></td>
                            			<td><input class="form-control" name="weight9" id="weight" placeholder="" ></td>
                            			<td><input class="form-control" name="weight10" id="weight" placeholder="" ></td>
                            			<td><input class="form-control" name="weight11" id="weight" placeholder="" ></td>
                            			<td><input class="form-control" name="weight12" id="weight" placeholder="" ></td>
                            			<td><input class="form-control" name="weight13" id="weight" placeholder="" ></td>
      									<td>
                                        <select class="form-control" id="P/f" name="weight">
                                        	<option class="form-control" name="weight" value="PASS"> P</option>
                                     		<option class="form-control" name="weight" value="FAIL"> F</option>
                                         </select>
                                        </td>
 										</tr>
                  			</table>
                              	<td>* Upon Customer Request</td>
                              	
                            </div>
                            </div>
                            </div>
                            <br>
              
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Inspection Record
                        </div>
                        </div>
                      
                                <div class="col-lg-12">
                                
                                
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  										<tr>
                          
                                        
    									<th scope="col" class="info">MACHINE ID:</th>
    									<td><input class="form-control" name="machine_id" placeholder="0" required></td>
                                        
                                        <th scope="col" class="info">SAMPLE SIZE:</th>
    									<td><input class="form-control" name="sample_size" placeholder="0" required></td>
                                        
                                        
                                        <th scope="col" class="info">TEST METHOD:</th>
      									<td><label class="checkbox-inline">
                                                <input type="radio" name="select_method" id="optionsRadios1" value="WTT" checked>WTT
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="select_method" id="optionsRadios1" value="APT">APT
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="select_method" id="optionsRadios1" value="UT">VT
                                            </label>
                                        </td>
 										</tr>
                                 </table>
                                
     <div class="modal fade" id="remark" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
     <br>
                              
       
                                <br>
                                <br>
                                <br>
                                
          <div class="modal-title">
          
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
         
                              <li style="float: left;"><a class="btn btn-default" href="pdf/GL PQC S07 Inspection Plan 1.1 Published.pdf" target="iframe_i">Show</a></li>
                                  
                                   <iframe height="560px" width="93%" name="iframe_i" href="pdf/QEIM-PQC- Physical Properties TGNAS.pdf" target="iframe_i"></iframe>
                                 </dv>
                                 </div>
                                
                                 

                                 <td>**Inspection Plan & Level <a class = "btn btn-default" 
                             data-toggle="modal" data-target="#remark" href="pdf/GL PQC S07 Inspection Plan 1.1 Published.pdf" target="iframe_i">?</a><br></td> 
                              
                               
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                		<tr class="info">
                     <br>
                      					<th></th>
                      					<th>MINOR VISUAL</th>
                      					<th>MAJOR VISUAL</th>
                      					<th>CRITICAL</th>
                      					<th>HOLES LEVEL 1</th>
                                        <th>HOLES LEVEL 2</th>
                                        <th>HOLES LEVEL 3</th>
                    					</tr>
                    					
  										<tr>
  										
    									<th scope="col" class="info">**AQL:</th>
                                        <td><select class="form-control" id="minor_AQL" name="minor_AQL">
                                        	<option class="form-control" name="minor_AQL" value="4.0"> 4.0</option>
                                        	<option class="form-control" name="minor_AQL" value="0.65"> 0.65</option>
                                     		<option class="form-control" name="minor_AQL" value="1.0"> 1.0</option>
                                            <option class="form-control" name="minor_AQL" value="1.5"> 1.5</option>
                                     		<option class="form-control" name="minor_AQL" value="2.5"> 2.5</option>
                                            <option class="form-control" name="minor_AQL" value="4.0"> 4.0</option>
                                     		<option class="form-control" name="minor_AQL" value="6.5"> 6.5</option>
                                         </select></td>
                                         
                            			<td><select class="form-control" id="major_AQL" name="major_AQL">
                                        	<option class="form-control" name="major_AQL" value="2.5"> 2.5</option>
                                        	<option class="form-control" name="major_AQL" value="0.65"> 0.65</option>
                                     		<option class="form-control" name="major_AQL" value="1.0"> 1.0</option>
                                            <option class="form-control" name="major_AQL" value="1.5"> 1.5</option>
                                     		<option class="form-control" name="major_AQL" value="2.5"> 2.5</option>
                                            <option class="form-control" name="major_AQL" value="4.0"> 4.0</option>
                                     		<option class="form-control" name="major_AQL" value="6.5"> 6.5</option>
                                         </select></td>
                                         
                           				<td><select class="form-control" id="critical_AQL" name="critical_AQL">
                                       		<option class="form-control" name="critical_AQL" value="N/L"> N/A</option>
                                        	<option class="form-control" name="critical_AQL" value="0.65"> 0.65</option>
                                     		<option class="form-control" name="critical_AQL" value="1.0"> 1.0</option>
                                            <option class="form-control" name="critical_AQL" value="1.5"> 1.5</option>
                                     		<option class="form-control" name="critical_AQL" value="2.5"> 2.5</option>
                                            <option class="form-control" name="critical_AQL" value="4.0"> 4.0</option>
                                     		<option class="form-control" name="critical_AQL" value="6.5"> 6.5</option>
                                         </select></td>
                                         
                            			<td><select class="form-control" id="hole1_AQL" name="hole1_AQL">
                                        	<option class="form-control" name="hole1_AQL" value="0.65"> 0.65</option>
                                     		<option class="form-control" name="hole1_AQL" value="1.0"> 1.0</option>
                                            <option class="form-control" name="hole1_AQL" value="1.5"> 1.5</option>
                                     		<option class="form-control" name="hole1_AQL" value="2.5"> 2.5</option>
                                            <option class="form-control" name="hole1_AQL" value="4.0"> 4.0</option>
                                     		<option class="form-control" name="hole1_AQL" value="6.5"> 6.5</option> 
                                         </select></td>
                                         
                            			<td><select class="form-control" id="hole2_AQL" name="hole2_AQL">
                                        	<option class="form-control" name="hole2_AQL" value="0.65"> 0.65</option>
                                     		<option class="form-control" name="hole2_AQL" value="1.0"> 1.0</option>
                                            <option class="form-control" name="hole2_AQL" value="1.5"> 1.5</option>
                                     		<option class="form-control" name="hole2_AQL" value="2.5"> 2.5</option>
                                            <option class="form-control" name="hole2_AQL" value="4.0"> 4.0</option>
                                     		<option class="form-control" name="hole2_AQL" value="6.5"> 6.5</option>
                                         </select></td>
                                         
                            			<td><select class="form-control" id="hole3_AQL" name="hole3_AQL">
                                        	<option class="form-control" name="hole3_AQL" value="0.65"> 0.65</option>
                                     		<option class="form-control" name="hole3_AQL" value="1.0"> 1.0</option>
                                            <option class="form-control" name="hole3_AQL" value="1.5"> 1.5</option>
                                     		<option class="form-control" name="hole3_AQL" value="2.5"> 2.5</option>
                                            <option class="form-control" name="hole3_AQL" value="4.0"> 4.0</option>
                                     		<option class="form-control" name="hole3_AQL" value="6.5"> 6.5</option>
                                         </select></td>
                                        </tr>
                                        
                                        <tr>
                                        <th scope="col" class="info">Acceptance:</th>
                                        <td><input class="form-control" name="Acceptanc1" placeholder="0" required></td>
                             			<td><input class="form-control" name="Acceptanc2" placeholder="0" required></td>
                           				<td><input class="form-control" name="Acceptanc3" placeholder="0" required></td>
                            			<td><input class="form-control" name="Acceptanc4" placeholder="0"></td>
                            			<td><input class="form-control" name="Acceptanc5" placeholder="0"></td>
                            			<td><input class="form-control" name="Acceptanc6" placeholder="0"></td>
                                        </tr>
                                        
                                     <tr>
                                        <th scope="col" class="info"></th>
                                        <td><center><a class = "btn btn-success" 
                            href = "#" data-toggle="modal" data-target="#minorModal">MINOR VISUAL</a></center></td>
                            			<td><center><a class = "btn btn-success" 
                            href = "#" data-toggle="modal" data-target="#majorModal">MAJOR VISUAL</a></center></td>
                           				<td><center><a class = "btn btn-success" 
                            href = "#" data-toggle="modal" data-target="#criticalModal">CRITICAL</a></center></td>
                            			<td><center><a class = "btn btn-success" 
                            href = "#" data-toggle="modal" data-target="#holes1Modal">SELECT HOLES 1</a></center></td>
                            			<td><center><a class = "btn btn-success" 
                            href = "#" data-toggle="modal" data-target="#holes2Modal">SELECT HOLES 2</a></center></td>
                            			<td><center><a class = "btn btn-success" 
                            href = "#" data-toggle="modal" data-target="#holes3Modal">SELECT HOLES 3</a></center></td>
                                        </tr>
                                         
                                          <tr>
                                        <th scope="col" class="info">Total defect</th>
                                        <td><input class="form-control" name="total1" placeholder="" required></td>
                            			<td><input class="form-control" name="total2" placeholder="" required></td>
                           				<td><input class="form-control" name="total3" placeholder="" required></td>
                            			<td><input class="form-control" name="total4" placeholder="" required></td>
                            			<td><input class="form-control" name="total5" placeholder="" required></td>
                            			<td><input class="form-control" name="total6" placeholder="" required></td>
                                        </tr>
                                  </table>
                                  
                                  
                                  <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  										<tr>
                                        
    									<th scope="col" class="info">Total holes:</th>
    									<td><input class="form-control" name="Total_holes" placeholder="0" required></td>
                                        
                                        <th scope="col" class="info">Overall AQL:</th>
    									<td><select class="form-control" id="P/f" name="Overall_AQL">
                                        	<option class="form-control" value="0.65"> 0.65</option>
                                     		<option class="form-control" value="1.0"> 1.0</option>
                                            <option class="form-control" value="1.5"> 1.5</option>
                                     		<option class="form-control" value="2.5"> 2.5</option>
                                            <option class="form-control" value="4.0"> 4.0</option>
                                     		<option class="form-control" value="6.5"> 6.5</option>
                                         </select></td>
                                        
                                          <th scope="col" class="info">UD Disposition:</th>
      									<td><select class="form-control" id="result" name="result">
                                       		<option class="form-control" value=""> </option>
                                        	<option class="form-control" value="A"> A</option>
                                     		<option class="form-control" value="RRW"> RRW</option>
                                            <option class="form-control" value="RDR"> RDR</option>
                                     		<option class="form-control" value="RDG"> RDG</option>
                                           
                                         </select></td>
                                        
                                        <th scope="col" class="info">FINAL DISPOSITION:</th>
      									<td><label class="checkbox-inline">
                                                <input type="radio" name="final" id="optionsRadios1" value="PASS" checked>PASS
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="final" id="optionsRadios1" value="FAIL">FAIL
                                            </label>
                                        </td>
 										</tr>
                                 </table>
                                 </div>
                              
                              
 	<div class="modal fade" id="minorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Minor Visual</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
         
          <form role="form" method ="post">
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  										<tr>
    									<th scope="col" class="info">DB:</th>
    									<td><input class="form-control" name="DB" placeholder="0"></td>
                                        
                                       <th scope="col" class="info">SD:</th>
    									<td><input class="form-control" name="SD" placeholder="0"></td>
 										</tr>
                                        <tr>
    									<th scope="col" class="info">SP:</th>
    									<td><input class="form-control" name="SP" placeholder="0"></td>
                                        </tr>
                               
                                 </table>
                                 
                                 </div>
                                 </div>
                                 </div> 
                                   
 <div class="modal fade" id="majorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Major Visual</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                
  										<tr>
    								
                                        <th scope="col" class="info">CA:</th>
    									<td><input class="form-control" name="CA" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">CL:</th>
    									<td><input class="form-control" name="CL" placeholder="0"></td>
                                        
    									<th scope="col" class="info">CLD:</th>
    									<td><input class="form-control" name="CLD" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">CS:</th>
    									<td><input class="form-control" name="CS" placeholder="0"></td>
                                       
                                        </tr>
                            
                                    
                                        <tr>
                                        <th scope="col" class="info">DF:</th>
    									<td><input class="form-control" name="DF" placeholder="0"></td>
                                     
                                       	<th scope="col" class="info">DT:</th>
    									<td><input class="form-control" name="DT" placeholder="0"></td>
                                       
                                      
                                        <th scope="col" class="info">FM:</th>
    									<td><input class="form-control" name="FM" placeholder="0"></td>
                                      
                                        <th scope="col" class="info">FNO:</th>
    									<td><input class="form-control" name="FNO" placeholder="0"></td>
    									
 										</tr>
                                        
                                        <tr>
                                  
                                        <th scope="col" class="info">GNO:</th>
    									<td><input class="form-control" name="GNO" placeholder="0"></td>
                                           
                                        <th scope="col" class="info">IB:</th>
    									<td><input class="form-control" name="IB" placeholder="0"></td>
    								
                                        <th scope="col" class="info">L:</th>
    									<td><input class="form-control" name="L" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">PMI:</th>
    									<td><input class="form-control" name="PMI" placeholder="0"></td>
                            
                                        
 										</tr>

                                        <tr>
                                      
                                        <th scope="col" class="info">PMO:</th>
    									<td><input class="form-control" name="PMO" placeholder="0"></td>
    									
    									<th scope="col" class="info">PLM:</th>
    									<td><input class="form-control" name="PLM" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">RC:</th>
    									<td><input class="form-control" name="RC" placeholder="0"></td>

                                        <th scope="col" class="info">RM:</th>
    									<td><input class="form-control" name="RM" placeholder="0"></td>
    									
 										</tr>
                                        
                                        <tr>
    								
                                        <th scope="col" class="info">SAG:</th>
    									<td><input class="form-control" name="SAG" placeholder="0"></td>
                                           
                                        <th scope="col" class="info">SG:</th>
    									<td><input class="form-control" name="SG" placeholder="0"></td>

                                      	<th scope="col" class="info">SHN:</th>
    									<td><input class="form-control" name="SHN" placeholder="0"></td>
                      
                                        <th scope="col" class="info">SI:</th>
    									<td><input class="form-control" name="SI" placeholder="0"></td>
                                        
 										</tr>
                                                             
                                        <tr>
                                    
                                        <th scope="col" class="info">SKV:</th>
    									<td><input class="form-control" name="SKV" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">SLD:</th>
    									<td><input class="form-control" name="SLD" placeholder="0"></td>
    									
    									<th scope="col" class="info">SO:</th>
    									<td><input class="form-control" name="SO" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">STK:</th>
    									<td><input class="form-control" name="STK" placeholder="0"></td>
 										</tr>
                         
                                        <tr>
                                        
                        				 <th scope="col" class="info">STN:</th>
    									<td><input class="form-control" name="STN" placeholder="0"></td>
                                     
                                        <th scope="col" class="info">TA:</th>
    									<td><input class="form-control" name="TA" placeholder="0"></td>
                              			
                              			<th scope="col" class="info">TS:</th>
    									<td><input class="form-control" name="TS" placeholder="0"></td>
                                   
                                        <th scope="col" class="info">WL:</th>
    									<td><input class="form-control" name="WL" placeholder="0"></td>
                            		    
                                      
 										</tr>
                               
                              			
                                 </table>
                                 
                                 </div>
                                  </div>
                                  </div>
                                  </div>
                                   
                                  <div class="modal fade" id="criticalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Critical</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  										<tr>
    									<th scope="col" class="info">CR:</th>
    									<td><input class="form-control" name="CR" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">BPC:</th>
    									<td><input class="form-control" name="BPC" placeholder="0"></td>
                                      
                                        <th scope="col" class="info">DC:</th>
    									<td><input class="form-control" name="DC" placeholder="0"></td>
                                       
 										</tr>
                                        
                                        <tr>
    									
                                        <th scope="col" class="info">DD:</th>
    									<td><input class="form-control" name="DD" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">DIS:</th>
    									<td><input class="form-control" name="DIS" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">FMT:</th>
    									<td><input class="form-control" name="FMT" placeholder="0"></td>
                                       
 										</tr>
                                        
                                        <tr>
    									
                                        <th scope="col" class="info">GL:</th>
    									<td><input class="form-control" name="GL" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">MG:</th>
    									<td><input class="form-control" name="MG" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">MS:</th>
    									<td><input class="form-control" name="MS" placeholder="0"></td>
 										</tr>
                                        
                                        <tr>
    								   <th scope="col" class="info">NB:</th>
    									<td><input class="form-control" name="NB" placeholder="0"></td>
                                       
                                        <th scope="col" class="info">SML:</th>
    									<td><input class="form-control" name="SML" placeholder="0"></td>
                                     
                                        <th scope="col" class="info">WG:</th>
    									<td><input class="form-control" name="WG" placeholder="0"></td>
                                     
                                      
 										</tr>
                                        
                                        <tr>
                                         <th scope="col" class="info">CH:</th>
    									<td><input class="form-control" name="CH" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">FK:</th>
    									<td><input class="form-control" name="FK" placeholder="0"></td>
                                        
    								    <th scope="col" class="info">FNE:</th>
    									<td><input class="form-control" name="FNE" placeholder="0"></td>
                                      
                                       
 										</tr>
                                        
                                        <tr>
    									
                                       	<th scope="col" class="info">TAHc:</th>
    									<td><input class="form-control" name="TAHc" placeholder="0"></td>
                                    
                                        <th scope="col" class="info">TH:</th>
    									<td><input class="form-control" name="TH" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">TR:</th>
    									<td><input class="form-control" name="TR" placeholder="0"></td>
 										</tr>
                                        
                                   
                                 </table>
                                    </div>
                                  </div>
                                  </div>
                                  </div>
                                   
                                   
                                    <div class="modal fade" id="holes1Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Holes 1</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          
                                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  										<tr>
    									<th scope="col" class="info">BF:</th>
    									<td><input class="form-control" name="BF" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">P:</th>
    									<td><input class="form-control" name="P" placeholder="0"></td>
 										</tr>
                                        <tr>
    									<th scope="col" class="info">CF:</th>
    									<td><input class="form-control" name="CF" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">SF:</th>
    									<td><input class="form-control" name="SF" placeholder="0"></td>
 										</tr>
                                        
                                        <tr>
                                         <th scope="col" class="info">TAH:</th>
    									<td><input class="form-control" name="TAH" placeholder="0"></td>
    									<th scope="col" class="info">FKS:</th>
    									<td><input class="form-control" name="FKS" placeholder="0"></td>
                                       
 										</tr>
                                       
                                        <tr>
                                         <th scope="col" class="info">THS:</th>
    									<td><input class="form-control" name="THS" placeholder="0"></td>
                                        
    									<th scope="col" class="info">FT:</th>
    									<td><input class="form-control" name="FT" placeholder="0"></td>
                                        
 										</tr>
                                       
                                        <tr>
                                          <th scope="col" class="info">TRS:</th>
    									<td><input class="form-control" name="TRS" placeholder="0"></td>
    									
    									<th scope="col" class="info">GB:</th>
    									<td><input class="form-control" name="GB" placeholder="0"></td>
                                        </tr>
    
                                 </table>
                                   
                                    </div>
                                  </div>
                                  </div>
                                  </div>
                                   
                                     <div class="modal fade" id="holes2Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Holes 2</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          
                               <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  										<tr>
    									<th scope="col" class="info">BF:</th>
    									<td><input class="form-control" name="BF_2" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">P:</th>
    									<td><input class="form-control" name="P_2" placeholder="0"></td>
 										</tr>
                                        <tr>
    									<th scope="col" class="info">CF:</th>
    									<td><input class="form-control" name="CF_2" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">SF:</th>
    									<td><input class="form-control" name="SF_2" placeholder="0"></td>
 										</tr>
                                        <tr>
                                        <th scope="col" class="info">TAH:</th>
    									<td><input class="form-control" name="TAH_2" placeholder="0"></td>
    									
    									<th scope="col" class="info">FKS:</th>
    									<td><input class="form-control" name="FKS_2" placeholder="0"></td>
 										</tr>
                                       
                                        <tr>
                                        <th scope="col" class="info">THS:</th>
    									<td><input class="form-control" name="THS_2" placeholder="0"></td>
    									<th scope="col" class="info">FT:</th>
    									<td><input class="form-control" name="FT_2" placeholder="0"></td>
 										</tr>
                                        <tr>
    									      
                                        <th scope="col" class="info">TRS:</th>
    									<td><input class="form-control" name="TRS_2" placeholder="0"></td>
    									<th scope="col" class="info">GB:</th>
    									<td><input class="form-control" name="GB_2" placeholder="0"></td>
 										</tr>
                                       

                                        
                                 </table>
                                   </div>
                                  </div>
                                  </div>
                                  </div>
                                   
                                    <div class="modal fade" id="holes3Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <center><h2 class="modal-title" id="exampleModalLabel">Holes 3</h2></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          
                                 <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  										<tr>
    									<th scope="col" class="info">BF:</th>
    									<td><input class="form-control" name="BF_3" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">P:</th>
    									<td><input class="form-control" name="P_3" placeholder="0"></td>
 										</tr>
                                        <tr>
    									<th scope="col" class="info">CF:</th>
    									<td><input class="form-control" name="CF_3" placeholder="0"></td>
                                        
                                        <th scope="col" class="info">SF:</th>
    									<td><input class="form-control" name="SF_3" placeholder="0"></td>
 										</tr>
                                        <tr>
    								
                                        <th scope="col" class="info">TAH:</th>
    									<td><input class="form-control" name="TAH_3" placeholder="0"></td>
    									<th scope="col" class="info">FKS:</th>
    									<td><input class="form-control" name="FKS_3" placeholder="0"></td>
 										</tr>
                                        <tr>
    									
                                        
                                        <th scope="col" class="info">THS:</th>
    									<td><input class="form-control" name="THS_3" placeholder="0"></td>
    									<th scope="col" class="info">FT:</th>
    									<td><input class="form-control" name="FT_3" placeholder="0"></td>
 										</tr>
                                        <tr>
    									
                                        
                                        <th scope="col" class="info">TRS:</th>
    									<td><input class="form-control" name="TRS_3" placeholder="0"></td>
    									<th scope="col" class="info">GB:</th>
    									<td><input class="form-control" name="GB_3" placeholder="0"></td>
 										</tr>
                                       
    									

                                        
                                 </table>
                                    </div>
              
                                  </div>
                                  </div>
                                  </div>
                 <div class="col-lg-6">
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div class="form-group">  
                                     VERIFY BY: <input class="form-control" name="verify"  placeholder="QA LEADER">
                                     </div>
                                       
    								 <div class="form-group">	
                                     DATE:  <input type="date" name="date_verify" >
                                     </div> 
                            </div>
                        </div>
                    </div>
                </div>
                                    
                                   <center><button type="submit" name="submit" class="btn btn-primary">SAVE</button><p></br>
                                           
                                        <!--<a href="production_detail.php" class="btn btn-primary"> Next</a>-->
<script>
function myFunction() {
  window.print();
}
</script>                                  
                                       </form>
                                       
      
                                     
<?php

if (isset ($_POST["submit"]))
{
	$link=mysqli_connect("localhost","root","");
	mysqli_select_db($link,"inspection");
	mysqli_query($link,"insert into sfg_fg  values('$_POST[batch_id]','$_POST[date]','$_POST[Product_Type]','$_POST[Inspection_Stage]','$_POST[size]','$_POST[pallet_no]','$_POST[level]','$_POST[factory]','$_POST[customer]','$_POST[so_no]','$_POST[lot_no]','$_POST[product]','$_POST[product_code]','$_POST[colour]','$_POST[brand]','$_POST[line]','$_POST[product_detail]','$_POST[shift]','$_POST[pack_date]','$_POST[QA_ID]','$_POST[weighing_scale]','$_POST[ruler]','$_POST[thickness]','$_POST[quantity_ctn]','$_POST[carton_no]','$_POST[glove_weight]','$_POST[glove_weight_p_f]','$_POST[counting]','$_POST[counting_p_f]','$_POST[pack_defect]','$_POST[layering]','$_POST[smelly]','$_POST[gripness]','$_POST[donning]','$_POST[black_test]','$_POST[sticking]','$_POST[dispensing_test]','$_POST[white_test]','$_POST[test1]','$_POST[test1_disposition]','$_POST[test2]','$_POST[test2_disposition]','$_POST[test3]','$_POST[test3_disposition]','$_POST[test4]','$_POST[test4_disposition]','$_POST[test5]','$_POST[test5_disposition]','$_POST[testing_method]','$_POST[length1]','$_POST[length2]','$_POST[length3]','$_POST[length4]','$_POST[length5]','$_POST[length6]','$_POST[length7]','$_POST[length8]','$_POST[length9]','$_POST[length10]','$_POST[length11]','$_POST[length12]','$_POST[length13]','$_POST[length]','$_POST[width1]','$_POST[width2]','$_POST[width3]','$_POST[width4]','$_POST[width5]','$_POST[width6]','$_POST[width7]','$_POST[width8]','$_POST[width9]','$_POST[width10]','$_POST[width11]','$_POST[width12]','$_POST[width13]','$_POST[width]','$_POST[cuff1]','$_POST[cuff2]','$_POST[cuff3]','$_POST[cuff4]','$_POST[cuff5]','$_POST[cuff6]','$_POST[cuff7]','$_POST[cuff8]','$_POST[cuff9]','$_POST[cuff10]','$_POST[cuff11]','$_POST[cuff12]','$_POST[cuff13]','$_POST[cuff]','$_POST[palm1]','$_POST[palm2]','$_POST[palm3]','$_POST[palm4]','$_POST[palm5]','$_POST[palm6]','$_POST[palm7]','$_POST[palm8]','$_POST[palm9]','$_POST[palm10]','$_POST[palm11]','$_POST[palm12]','$_POST[palm13]','$_POST[palm]','$_POST[fingertip1]','$_POST[fingertip2]','$_POST[fingertip3]','$_POST[fingertip4]','$_POST[fingertip5]','$_POST[fingertip6]','$_POST[fingertip7]','$_POST[fingertip8]','$_POST[fingertip9]','$_POST[fingertip10]','$_POST[fingertip11]','$_POST[fingertip12]','$_POST[fingertip13]','$_POST[fingertip]','$_POST[bead_diamete1]','$_POST[bead_diamete2]','$_POST[bead_diamete3]','$_POST[bead_diamete4]','$_POST[bead_diamete5]','$_POST[bead_diamete6]','$_POST[bead_diamete7]','$_POST[bead_diamete8]','$_POST[bead_diamete9]','$_POST[bead_diamete10]','$_POST[bead_diamete11]','$_POST[bead_diamete12]','$_POST[bead_diamete13]','$_POST[bead_diamete]','$_POST[cuff_edge1]','$_POST[cuff_edge2]','$_POST[cuff_edge3]','$_POST[cuff_edge4]','$_POST[cuff_edge5]','$_POST[cuff_edge6]','$_POST[cuff_edge7]','$_POST[cuff_edge8]','$_POST[cuff_edge9]','$_POST[cuff_edge10]','$_POST[cuff_edge11]','$_POST[cuff_edge12]','$_POST[cuff_edge13]','$_POST[cuff_edge]','$_POST[weight1]','$_POST[weight2]','$_POST[weight3]','$_POST[weight4]','$_POST[weight5]','$_POST[weight6]','$_POST[weight7]','$_POST[weight8]','$_POST[weight9]','$_POST[weight10]','$_POST[weight11]','$_POST[weight12]','$_POST[weight13]','$_POST[weight]','$_POST[machine_id]','$_POST[sample_size]','$_POST[select_method]','$_POST[minor_AQL]','$_POST[major_AQL]','$_POST[critical_AQL]','$_POST[hole1_AQL]','$_POST[hole2_AQL]','$_POST[hole3_AQL]','$_POST[Acceptanc1]','$_POST[Acceptanc2]','$_POST[Acceptanc3]','$_POST[Acceptanc4]','$_POST[Acceptanc5]','$_POST[Acceptanc6]','$_POST[DB]','$_POST[SD]','$_POST[SP]','$_POST[CA]','$_POST[CL]','$_POST[CLD]','$_POST[CS]','$_POST[DF]','$_POST[DT]','$_POST[FM]','$_POST[FNO]','$_POST[GNO]','$_POST[IB]','$_POST[L]','$_POST[PMI]','$_POST[PMO]','$_POST[PLM]','$_POST[RC]','$_POST[RM]','$_POST[SAG]','$_POST[SG]','$_POST[SHN]','$_POST[SI]','$_POST[SKV]','$_POST[SLD]','$_POST[SO]','$_POST[STK]','$_POST[STN]','$_POST[TA]','$_POST[TS]','$_POST[WL]','$_POST[CR]','$_POST[BPC]','$_POST[DC]','$_POST[DD]','$_POST[DIS]','$_POST[FMT]','$_POST[GL]','$_POST[MG]','$_POST[MS]','$_POST[NB]','$_POST[SML]','$_POST[WG]','$_POST[CH]','$_POST[FK]','$_POST[FNE]','$_POST[TAHc]','$_POST[TH]','$_POST[TR]','$_POST[BF]','$_POST[P]','$_POST[CF]','$_POST[SF]','$_POST[TAH]','$_POST[FKS]','$_POST[THS]','$_POST[FT]','$_POST[TRS]','$_POST[GB]','$_POST[BF_2]','$_POST[P_2]','$_POST[CF_2]','$_POST[SF_2]','$_POST[TAH_2]','$_POST[FKS_2]','$_POST[THS_2]','$_POST[FT_2]','$_POST[TRS_2]','$_POST[GB_2]','$_POST[BF_3]','$_POST[P_3]','$_POST[CF_3]','$_POST[SF_3]','$_POST[TAH_3]','$_POST[FKS_3]','$_POST[THS_3]','$_POST[FT_3]','$_POST[TRS_3]','$_POST[GB_3]','$_POST[total1]','$_POST[total2]','$_POST[total3]','$_POST[total4]','$_POST[total5]','$_POST[total6]','$_POST[Total_holes]','$_POST[Overall_AQL]','$_POST[result]','$_POST[final]'$_POST[verify]','$_POST[date_verify]')");
	
	
	
	echo"<script>alert('Data are save!!');
	window.location='tables.php';
		 			
						</script>";	
	
?>


<?php
}
?>

 									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                    
                                    
                                   
                                    
                                </div>
                                <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto" style = "text-align:center; margin-right:10px;">
            <label>&copy; Copyright M02/M09 QA Trainee 2019 (By Khuzaifi & Shukri) </label>
          </div>
        </div>
      </footer>
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
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>


</body>


</html>
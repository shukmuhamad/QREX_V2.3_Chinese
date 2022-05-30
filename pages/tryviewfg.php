<!-- Print Result  -->
<?php
  include('database_connection.php');
  include('session.php');	
  include('header.php');
?>

  <body>
    <nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
	    <div  class = "container-fluid">
		    <div class = "navbar-header">
			    <a class = "navbar-brand" >
            <b>View FG Record</b>
          </a>
        </div>
      </div>           
    </nav>	
    
    <div class="container-fluid">      

    <?php
      #$query = "";
      #$stmt=$connect->prepare($query);
      #$stmt->bindParam(1, $LotIDKey);
      #$stmt->execute();
      #$result = $stmt->fetchAll();

      #foreach ($result as $record) {}
    ?>  
    
      <!----------------------------------------------------PRODUCT INFORMATION---------------------------------------------------->       
      <div class="panel panel-primary">
        <div class="panel-heading">
          Product Information
        </div>
        <div class="panel-body"> 
          <div class="row">

            <div class="col-lg-6">

              <div class="form-group">
                <label>Factory: </label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
                                
              <div class="form-group">
                <label>Date:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
              
              <div class="form-group">
                <label>Batch Number:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
                                 
              <div class="form-group">
                <label>Inspection Stage:</label>
                <?php echo "new column yahuu";?>
              </div>
              <!-- /.form-group -->
                                
              <div class="form-group">
                <label>Category:</label>
                <?php echo "x";?>
              </div>   
              <!-- /.form-group -->
                                
              <div class="form-group">
                <label>Size:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
                                
              <div class="form-group">
                <label>Pallet Number:</label>  
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
                                
              <div class="form-group">
                <label>Inspection Count:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
							
				      <div class="form-group">
                <label>Quantity Carton / Bag:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
					
				      <div class="form-group">
                <label>Carton Number:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label>Status:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->

            </div> 
            <!-- /.col-lg-6 -->

            <div class="col-lg-6">

				      <div class="form-group">
                <label>Customer:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
  					  
              <div class="form-group">
                <label>Brand:</label> 
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
                                     
              <div class="form-group">
                <label>SO Number:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
            
              <div class="form-group">
                <label>Lot Number:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
            
              <div class="form-group">
                <label>Product :</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
            
              <div class="form-group">
                <label>Product Code:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->

              <div class="form-group">
                <label>Colour:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
            
              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                
                <tr class="info">
                  <th class="text-center" colspan="2">Production:</th>
                  <th class="text-center">Shift:</th>
                </tr>
                <?php 
                  $query = $connect->prepare("SELECT * FROM T_Lot_ProductionDateWLine WHERE LotIDKey = '".$_GET['LotIDKey']."'");
                  $query->execute();
                  $fetch = $query->fetchAll(PDO::FETCH_ASSOC);

                  foreach ($fetch as $record) {
                ?>
                <tr>
                  <?php 
                    $query = $connect->prepare("SELECT * FROM DimProductionLine WHERE ProductionLineKey = '".$record['ProductionLineKey']."'");
                    $query->execute();
                    $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($fetch as $data) {
                  ?>

                <?php 
                    if ($record['Shift'] == NULL) { ?>
                    <input type="hidden" name="ProductionLineKey1" value="<?php echo $record['ProductionLineKey'] ?>">
                    <input type="hidden" name="production_date1" value="<?php echo $record['ProductionDate'] ?>">
                    <input type="hidden" name="shift1" value="<?php echo $record['Shift'] ?>">
                  
                    <?php } else { ?>

                  <td style="text-align:center"><?php echo $data['ProductionLineName'];}?></td>
                  <?php $ProductDate = date("d/m/Y", strtotime($record['ProductionDate'])); ?>
                  <td style="text-align:center"><?php echo $ProductDate;?></td>
                  <td style="text-align:center"><?php echo $record['Shift'];}}?></td>
                </tr>
              </table>
					  
              <div class="form-group">
                <label>Pack Date:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
            
              <div class="form-group">
                <label>Checked By:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->

            </div>
            <!-- /.col-lg-6 -->

          </div>
          <!-- /.row -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->

      <!-------------------------------------------------------OTHER TESTING------------------------------------------------------->                                                       
      <div class="panel panel-primary">
        <div class="panel-heading">
          Internal Physical Test
        </div>

        <div class="panel-body"> 
          <div class="row">
        
            <div class="col-lg-6">

              <label>1. Instruments</label>
              </br></br>
          
              <div class="form-group">
                <label>Weighing Scale ID:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->
                                
							<div class="form-group">
                <label>Ruler ID:</label>
                <?php echo "x";?> 
              </div>
              <!-- /.form-group -->
                                
							<div class="form-group">
                <label>Thickness Gauge ID:</label>
                <?php echo "x";?>
              </div>
              <!-- /.form-group -->

							<br>
              										
							<label>2. Test Result</label>
              </br></br>

              <div class="form-group"> 
                <label>Glove Weight:</label>
                <?php echo "x".','."x";?>
              </div>   
              <!-- /.form-group -->
							
    					<div class="form-group">	
                <label>Counting:</label>
                <?php echo "x".','."x";?>
              </div>  
              <!-- /.form-group -->
              
              <div class="form-group">	
                <label>Packaging Defect:</label>
                <?php echo "x".','."x";?>
              </div> 
              <!-- /.form-group -->

            </div>
            <!-- /.col-lg-6 -->                      
                                
            <div class="col-lg-4">

              <label>3. Internal Physical Testing</label>
              </br></br>

              <table class="table table-bordered" id="dataTable" width="20%" cellspacing="0">

  						  <tr>
                  <th scope="col" class="info">Layering:</th>
                  <td><?php echo "x";?></td>
                              
                  <th class="info">Smelly:</th>
                  <td><?php echo "x";?></td>
                </tr>
                              
                <tr>
                  <th scope="col" class="info">Gripness:</th>
                  <td><?php echo "x";?></td>
                  
                  <th scope="col" class="info">Black Cloth:</th>
                  <td><?php echo "x";?></td>          
  
                </tr>
                              
                <tr>
                  <th class="info">Sticking:</th>
                  <td><?php echo "x";?></td>
                  
                  <th scope="col" class="info">Dispensing:</th>
                  <td><?php echo "x";?></td>

                </tr>
                               
                <tr>
                  <th class="info">White Cloth:</th>
                  <td><?php echo "x";?></td>

                  <th class="info">Dye Leak:</th>
                  <td><?php echo "x";?></td>
                </tr>

                <tr>
                  <th class="info">Sealing:</th>
                  <td><?php echo "x";?></td>
                
                  <th class="info">Burst Test:</th>
                  <td><?php echo "x";?></td>
                </tr>

                <tr>
                  <th class="info">Visual & Peel Ability:</th>
                  <td><?php echo "x";?></td>
                </tr>

              </table>
              
              <br>

              <table class="table table-bordered" id="dataTable" width="20%" cellspacing="0">

                <tr>
                  <th class="info" rowspan="2">Donning & Tearing:</th>
                  <th>Result</th>
                  <th>Remark</th>
                </tr>

                <tr>
                  <td><?php echo "x";?></td>
                  <td><?php echo "x";?></td>
                </tr>

              </table>
                                    
              <label>4. Special Requirements</label>
              </br></br>

              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

  						  <tr>
                  <div class="form-group">
                  <th scope="col" class="info">Test No:</th>
                  <th class="info">Test Name:</th>
                  <th scope="col" class="info">Disposition:</th>
                </tr>

                <tr>
                  <th scope="col" class="info">Test 1:</th>
                  <td><?php echo "x";?></td>
                  <td><?php echo "x";?></td>
                </tr>
              
                <tr>
                  <th scope="col" class="info">Test 2:</th>
                  <td><?php echo "x";?></td>
                  <td><?php echo "x";?></td>
                </tr>
              
                <tr>
                  <th scope="col" class="info">Test 3:</th>
                  <td><?php echo "x";?></td>
                  <td><?php echo "x";?></td>
                </tr>
              
                <tr>
                  <th scope="col" class="info">Test 4:</th>
                  <td><?php echo "x";?></td>
                  <td><?php echo "x";?></td>
                </tr>
              
                <tr>
                  <th scope="col" class="info">Test 5:</th>
                  <td><?php echo "x";?></td>
                  <td><?php echo "x";?></td>
                </tr>

              </table>

            </div>
            <!-- /.col-lg-4 -->
          
          </div>
          <!-- /.row -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->

      <!--------------------------------------------------PHYSICAL DIMENSION TEST-------------------------------------------------->                                                                                               
      <div class="panel panel-primary">
        <div class="panel-heading">
          Physical Dimensions Test
        </div>

        <div class="panel-body"> 
          <div class="row">

            <div class="col-lg-6"> 

              <table class="table table-bordered" id="dataTable" >

  							<tr>
    							<th scope="col" class="info">METHOD:</th>
      						<td><?php echo "x";?></td>
 								</tr>

              </table>

            </div>
            <!-- /.col-lg-6 -->  

            <div class="col-lg-12">

              <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                <tr class="info">
                  <th class="text-center">TEST</th>
                  <th class="text-center">1</th>
                  <th class="text-center">2</th>
                  <th class="text-center">3</th>
                  <th class="text-center">4</th>
                  <th class="text-center">5</th>
                  <th class="text-center">6</th>
                  <th class="text-center">7</th>
                  <th class="text-center">8</th>
                  <th class="text-center">9</th>
                  <th class="text-center">10</th>
                  <th class="text-center">11</th>
                  <th class="text-center">12</th>
                  <th class="text-center">13</th>
                  <th class="text-center">PASS/FAIL</th>
                </tr>

  							<tr>
                  <th scope="col" class="info">Length(mm):</th>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
      				    <td class="text-center"><?php echo "x";?></td>
 				        </tr>
  									
                <tr>
    						  <th scope="col" class="info">Width(mm):</th>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                 	<td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
      					  <td class="text-center"><?php echo "x";?></td>
                </tr>

                <tr>     
    						  <th scope="col" class="info">Thickness of Cuff(mm):</th>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                 	<td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
      					  <td class="text-center"><?php echo "x";?></td>
 								</tr>
                                    
                <tr>
    						  <th scope="col" class="info">Thickness of Palm(mm):</th>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                 	<td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
      					  <td class="text-center"><?php echo "x";?></td>
                </tr>
                                       
                <tr>
    						  <th scope="col" class="info">Thickness of Fingertip(mm):</th>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                 	<td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
      					  <td class="text-center"><?php echo "x";?></td>
 								</tr>
                                        
                <tr>
    						  <th scope="col" class="info">Thickness of Bead Diameter:</th>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                 	<td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
      					  <td class="text-center"><?php echo "x";?></td>
 								</tr>
                                        
                <tr>
    						  <th scope="col" class="info">Thickness of Cuff Edge:</th>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                 	<td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
      			      <td class="text-center"><?php echo "x";?></td>
 								</tr>
                                    
                <tr>
    						  <th scope="col" class="info">Weight:</th>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                 	<td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
                  <td class="text-center"><?php echo "x";?></td>
      					  <td class="text-center"><?php echo "x";?></td>
 								</tr>

              </table>
                             
            </div>
            <!-- /.col-lg-12 --> 

          </div>
          <!-- /.row -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->

      <!-----------------------------------------------------INSPECTION RECORD----------------------------------------------------->
      <div class="panel panel-primary">
        <div class="panel-heading">
          Inspection Record
        </div>
        
          <div class="panel-body"> 
            <div class="row">

              <div class="col-lg-12">
              
                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

  								<tr>

                    <th scope="col" class="info">MACHINE ID:</th>
    								<td><input class="form-control" id="machine_id" value="<?php echo "x";?>" disabled></td>

                    <th scope="col" class="info">SAMPLE SIZE VT:</th>
                    <td><input class="form-control" name="sample_size" value="<?php echo "x";?>" disabled></td>

                    <th scope="col" class="info">SAMPLE SIZE APT/WTT:</th>
                    <td><input class="form-control" name="test_method" value="<?php echo "x"?>" disabled></td>

 									</tr>
                   
                </table>

                <td>
                  <b>**Inspection Plan & Level </b>
                  <a class = "btn btn-default" data-toggle="modal" data-target="#remark" href="pdf/GL PQC S07 Inspection Plan 1.1 Published.pdf" target="iframe_i">?</a>
                  <br>
                </td> 

                <td><b>*Glove Inspection</b></td> 
                                 
                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                  <tr class="info">
                    <th></th>
                  	<th colspan="2" width="13%">MINOR VISUAL</th>
                  	<th colspan="4" width="30%">MAJOR VISUAL</th>
                  	<th colspan="3" width="18%">CRITICAL</th>
                  	<th colspan="2" width="13%">FREEDOM FROM HOLES LEVEL 1</th>
                    <th colspan="2" width="13%">FREEDOM FROM HOLES LEVEL 2</th>
                    <th colspan="2" width="13%">FREEDOM FROM HOLES LEVEL 3</th>
                  </tr>
                  
  								<tr>
    							  <th scope="col" class="info">AQL:</th>
                    <td colspan="2"><input class="form-control" id="AQL_minor" name="AQL_minor" value="<?php echo "x"?>" disabled></td>
                    <td colspan="4"><input class="form-control" id="AQL_major" name="AQL_major" value="<?php echo "x"?>" disabled></td>
                    <td colspan="3"><input class="form-control" id="AQL_critical" name="AQL_critical" value="<?php echo "x"?>" disabled></td>
                    <td colspan="2"><input class="form-control" id="AQL_holes1" name="AQL_holes1" value="<?php echo "x"?>" disabled></td>
                    <td colspan="2"><input class="form-control" id="AQL_holes2" name="AQL_holes2" value="<?php echo "x"?>" disabled></td>
                    <td colspan="2"><input class="form-control" id="AQL_holes3" name="AQL_holes3" value="<?php echo "x"?>" disabled></td>
                  </tr>
                                    
                  <tr>
                    <th scope="col" class="info">Acceptance:</th>
                    <td colspan="2"><input class="form-control" id="Acceptance_minor" name="Acceptance_minor" value="<?php echo "x"?>" disabled></td>
                    <td colspan="4"><input class="form-control" id="Acceptance_major" name="Acceptance_major" value="<?php echo "x"?>" disabled></td>
                    <td colspan="3"><input class="form-control" id="Acceptance_critical" name="Acceptance_critical" value="<?php echo "x"?>" disabled></td>
                    <td colspan="2"><input class="form-control" id="Acceptance_holes1" name="Acceptance_holes1" value="<?php echo "x"?>" disabled></td>
                    <td colspan="2"><input class="form-control" id="Acceptance_holes2" name="Acceptance_holes2" value="<?php echo "x"?>" disabled></td>
                    <td colspan="2"><input class="form-control" id="Acceptance_holes3" name="Acceptance_holes3" value="<?php echo "x"?>" disabled></td>
                  </tr>
                                       
                  <tr>
                    <th rowspan="12" scope="col" class="info"> Defect</th>

                    <!------------ MINOR VIS L1 ------------------------------------>
                    
                    <td>DB:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <td>SD:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ MAJOR VIS L1 ------------------------------------>

                    <td>CA:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
 
                    <td>CL:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>CLD:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>CS:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                   
                    <!------------ CRITICAL L1 ------------------------------------->
                    
                    <td>BPC:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>CR:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>DC:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <!------------ DEF HOLES 1 L1 ------------------------------------->              
                    <td>BF:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>P:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <!------------ DEF HOLES 2 L1 ----------------------------------->                
                    <td>BF:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>P:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ DEF HOLES 3 L1 ----------------------------------->                
                    <td>BF:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>P:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                  </tr>

                  <tr>
                    
                    <!------------ MINOR VIS L2 ----------------------------------->
                    <td>SP: 
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                   
                    <td>STNs: 
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                   
                    <!------------ MAJOR VIS L2 ---------------------------------->
                    
                    <td>DF:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                              
                    <td>DT:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>EFI:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <td>FM:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ CRITICAL L2 ---------------------------------->
                    <td>DD:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>DIS:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>FMT:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <!------------ DEF HOLES 1 L2 ---------------------------------->
                    
                    <td>CF:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>SF:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    
                    <!------------ DEF HOLES 2 L2 ---------------------------------->
                    <td>CF:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>SF:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                         
                    <!------------ DEF HOLES 3 L2 ---------------------------------->
                    <td>CF:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                   
                    <td>SF:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                  </tr>
                      
                  <tr>
                    
                    <!------------ MINOR VIS L3 -------------------------------------->
                    <td>SLDs:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>Ls:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ MAJOR VIS L3 -------------------------------------->
                    <td>FNO:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>FO:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>GNO:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>IB:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <!------------ CRITICAL L3 --------------------------------------->
                    <td>L:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>GL:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>MP:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ DEF HOLES 1 L3 ------------------------------------->
                    <td>TAHs:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                  
                    <td>FKS:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <!------------ DEF HOLES 2 L3 ------------------------------------>
                    <td>TAHs:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>FKS:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <!------------ DEF HOLES 3 L3 ------------------------------------->
                    <td>TAHs:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>FKS:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                  </tr>
                                     
                  <tr>
                        
                    <td></td>
                    <td></td>
                        
                    <!------------ MAJOR VIS L4 ---------------------------------------->
                    
                    <td>ICT:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>L:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>LS:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>PMI:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <!------------ CRITICAL L4 ------------------------------------------>
                    <td>NB:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>NF:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>TW:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <!------------ DEF HOLES 1 L4 ---------------------------------------->
                    <td>THs:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>FT:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ DEF HOLES 2 L4 ----------------------------------------->
                    <td>THs:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                                            
                    <td>FT:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
     
                    <!------------ DEF HOLES 3 L4 ----------------->
                    <td>THs:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <td>FT:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                  </tr>
                                     
                  <tr>
                    
                    <td></td>
                    <td></td>

                    <!------------ MAJOR VIS L5 ---------------------------------------->
                    <td>PMO:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>PLM:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                                            
                    <td>RM:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>RC:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <!------------ CRITICAL L5 ---------------------------------------->
                    <td>WE:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>WG:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>PGM:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ DEF HOLES 1 L5 ---------------------------------------->
                    <td>TRS:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>GB:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
	            
                    <!------------ DEF HOLES 2 L5 ---------------------------------------->
                    <td>TRS:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>GB:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

						        
                    <!------------ DEF HOLES 3 L5 ---------------------------------------->
                    <td>TRS:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>GB:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
      
				          </tr>
             
                  <tr>

                    <td></td>
                    <td></td>
                     
                    <!------------ MAJOR VIS L6 ---------------------------------------->
                    <td>SAG:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>SG:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>SHN:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>SI:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ CRITICAL L6 ---------------------------------------->
                    <td>SDG:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>URD:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td></td>
 
                    <!------------ DEF HOLES 1 L6 ---------------------------------------->
                    <td>CHs:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <td>L:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <!------------ DEF HOLES 2 L6 ---------------------------------------->
                    <td>CHs:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>L:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <!------------ DEF HOLES 3 L6 ---------------------------------------->
                    <td>CHs:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>L:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                  </tr>
                                     
                  <tr>
                    <td></td>
                    <td></td>
                    
                    <!------------ MAJOR VIS L7 ---------------------------------------->  
                    <td>SKV:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>SLD:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>SO:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>STK:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ CRITICAL L7 ---------------------------------------->
                    <td>ICP:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <td>NP:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>WP:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ DEF HOLE 1 L7 ---------------------------------------->
                    <td>LH:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>MH:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <!------------ DEF HOLE 2 L7 ---------------------------------------->
                    <td>LH:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>MH:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ DEF HOLE 3 L7 ---------------------------------------->
                    <td>LH:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>MH:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                                           
                  </tr>
                      
                  <tr>
                   
                    <td></td>
                    <td></td>
                    
                    <!------------ MAJOR VIS L8 ---------------------------------------->
                    <td>STN:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>TA:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>TS:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>UNF:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ CRITICAL L8 ---------------------------------------->
                    <td>TH:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>TR:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>TAH:
                    <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                                  
                    <td></td>
                    <td></td>

                    <td></td>
                    <td></td>
                    
                    <td></td>
                    <td></td>
              
                  </tr>  

                  <tr>
                   
                    <td></td>
                    <td></td>
                    
                    <!------------ MAJOR VIS L9 ---------------------------------------->
                    <td>WL:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>WSI:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>                 

                    <td>WSO:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>GF:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ CRITICAL L9 ---------------------------------------->

                    <td>MF:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>CH:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>FK:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
                  </tr>

                  <tr>

                    <!------------ MINOR VIS L10 ---------------------------------------->
                    <td></td>
                    <td></td>
                    
                    <!------------ MAJOR VIS L10 ---------------------------------------->
                    <td>BP:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>DP:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>DSP:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>DTP:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ CRITICAL L10 ---------------------------------------->
                    <td>MS:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>
                    
                    <td>PFK:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td></td>
                  
                    <!------------ HOLES1 L10 ---------------------------------------->
                    <td></td>
                    <td></td>

                    <!------------ HOLES2 L10 ---------------------------------------->
                    <td></td>
                    <td></td>

                    <!------------ HOLES3 L10 ---------------------------------------->
                    <td></td>
                    <td></td>
 
                  </tr> 

                  <tr>
                    <!------------ MINOR VIS L11 ---------------------------------------->
                    <td></td>
                    <td></td>
                    
                    <!------------ MAJOR VIS L11 ---------------------------------------->
                    
                    <td>IA:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>IFS:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>IP:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>OP:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <!------------ CRITICAL L11 ---------------------------------------->
                    <td></td>
                    <td></td>
                    <td></td>
                    <!------------ HOLES1 L10 ---------------------------------------->
                    <td></td>
                    <td></td>
                    <!------------ HOLES2 L10 ---------------------------------------->
                    <td></td>
                    <td></td>
                    <!------------ HOLES3 L10 ---------------------------------------->
                    <td></td>
                    <td></td>

                  </tr> 


                  <tr>
                    <td></td>
                    <td></td>
                    
                    <!------------ MAJOR VIS L12 ---------------------------------------->
                    <td>RP:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>SH:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td>SMP:
                      <b>
                      <font color="red">
                        <?php echo "x";?>
                      </font>
                    </td>

                    <td></td>

                    <!------------ CRITICAL L12 ---------------------------------------->
                    <td></td>
                    <td></td>
                    <td></td>

                    <!------------ HOLES1 L10 ---------------------------------------->
                    <td></td>
                    <td></td>

                    <!------------ HOLES2 L10 ---------------------------------------->
                    <td></td>
                    <td></td>

                    <!------------ HOLES3 L10 ---------------------------------------->
                    <td></td>
                    <td></td>
                    
                  </tr> 

                    
                      <tr>

                        <?php 
                        $query = $connect->prepare("SELECT * FROM View_NumberOfDefectByDefectType WHERE  RecordID = '".$record['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <th scope="col" class="info">Total defect</th>

                        <?php foreach ($fetch as $record) { 
                              if ($record['DefectTypeName'] == 'Minor Visual') { ?>
                        <td colspan="2"><input class="form-control" name="total_minor" value="<?php echo $record['TotalNumberOfDefects']?>" disabled></td>
                        <?php } }?>

                        <?php 
                        $query = $connect->prepare("SELECT * FROM View_TotalMajor WHERE  RecordID = '".$record['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                        <?php foreach ($fetch as $record) { if ($record['RecordID'] == $record['RecordID']) { ?> 
                        <td colspan="4"><input class="form-control" name="total_major" value="<?php echo $record['TotalMajor']?>" disabled></td>
                        <?php } }?>

                        <?php 
                        $query = $connect->prepare("SELECT * FROM View_TotalCritical WHERE  RecordID = '".$record['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                        <?php foreach ($fetch as $record) { if ($record['RecordID'] == $record['RecordID']) { ?> 
                        <td colspan="3"><input class="form-control" name="total_critical" value="<?php echo $record['TotalCritical']?>" disabled></td>
                        <?php } }?>

                        <?php 
                        $query = $connect->prepare("SELECT * FROM View_NumberOfDefectByDefectType WHERE  RecordID = '".$record['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                        <?php foreach ($fetch as $record) {
                              if ($record['DefectTypeName'] == 'Holes') { ?>
                        <td colspan="2"><input class="form-control" name="total_holes1" value="<?php echo $record['TotalNumberOfDefects']?>" disabled></td>
                        <?php } }?>

                        <?php foreach ($fetch as $record) { 
                              if ($record['DefectTypeName'] == 'Holes2') { ?>
                        <td colspan="2"><input class="form-control" name="total_holes2" value="<?php echo $record['TotalNumberOfDefects']?>" disabled></td>
                        <?php } }?>

                        <?php foreach ($fetch as $record) { 
                              if ($record['DefectTypeName'] == 'Holes3') { ?>
                        <td colspan="2"><input class="form-control" name="total_holes3" value="<?php echo $record['TotalNumberOfDefects']?>" disabled></td>
                        <?php } }?>
                      </tr>
                    </table>
                    
                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                      <?php 
                        $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, 
                                                    T_Record_Test.SRText
                                                    FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                    WHERE  T_Record_Master.RecordID = '".$record['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                      ?>
                      <tr>
                        <th scope="col" class="info">Total Barrier Holes:</th>
                        <?php foreach ($fetch as $record) {
                              if ($record['TestKey'] == '163') { ?>
                        <td><input class="form-control" name="total_holes" value="<?php echo $record['TestValue']?>" disabled></td>
                        <?php } }?>
                                        
                        <th scope="col" class="info">Overall AQL:</th>
                        <?php foreach ($fetch as $record) {
                              if ($record['TestKey'] == '140') { ?>
                        <td><input class="form-control" name="overall_AQL" value="<?php echo $record['TestValue']?>" disabled></td>
                        <?php } }?>
                        
                        <?php 
                        $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_UDResult.UDResultKey, M_UDResult.UDResultCode
                                                    FROM T_Record_UDResult LEFT JOIN T_Record_Master ON T_Record_UDResult.RecordID = T_Record_Master.RecordID 
                                                    FULL JOIN M_UDResult ON T_Record_UDResult.UDResultKey = M_UDResult.UDResultKey
                                                    WHERE  T_Record_Master.RecordID = '".$record['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <th scope="col" class="info">UD Disposition:</th>
                        <?php foreach ($fetch as $record) { ?>
                        <td><input class="form-control" name="UD_disposition" value="<?php echo $record['UDResultCode'];}?>" disabled></td> 
                      </tr>
                    </table>

                    <td><b>*Product Packaging Inspection (Surgical)</b></td>

                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                      <tr class="info"><br>
                        <th></th>
                        <th colspan="3">REGULATORY PACKAGING</th>
                        <th colspan="4">CRITICAL PACKAGING</th>
                        <th colspan="3">VISUAL PACKAGING</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                              
                      <tr>
                        <th scope="col" class="info">**AQL:</th>
                        <?php 
                          $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, 
                                                    T_Record_Test.SRText
                                                    FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                    WHERE  T_Record_Master.RecordID = '".$record['RecordID']."'");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        
                        <?php foreach ($fetch as $record) { //AQL_Regulatory
                              if ($record['TestKey'] == '155') { ?>
                        <td colspan="3"><?php echo $record['TestValue'];}?></td>
                        <?php } ?>
                        
                        <?php foreach ($fetch as $record) { //AQL_Critical
                              if ($record['TestKey'] == '153') { ?>
                        <td colspan="4"><?php echo $record['TestValue'];}?></td>
                        <?php } ?>

                        <?php foreach ($fetch as $record) { //AQL_Visual
                              if ($record['TestKey'] == '151') { ?>
                        <td colspan="3"><?php echo $record['TestValue'];}?></td>
                        <?php } ?>
                                       
                        <td>
                          <select class="form-control" id="AQL_holes1" name="AQL_holes1" disabled>
                            <option class="form-control" name="AQL_holes1" value="0.65"> </option>
                            <option class="form-control" name="AQL_holes1" value="1.0"> 1.0</option>
                            <option class="form-control" name="AQL_holes1" value="1.5"> 1.5</option>
                            <option class="form-control" name="AQL_holes1" value="2.5"> 2.5</option>
                            <option class="form-control" name="AQL_holes1" value="4.0"> 4.0</option>
                            <option class="form-control" name="AQL_holes1" value="6.5"> 6.5</option> 
                          </select>
                        </td>
                                         
                        <td>
                          <select class="form-control" id="AQL_holes2" name="AQL_holes2" disabled>
                            <option class="form-control" name="AQL_holes2" value="0.65"> </option>
                            <option class="form-control" name="AQL_holes2" value="1.0"> 1.0</option>
                            <option class="form-control" name="AQL_holes2" value="1.5"> 1.5</option>
                            <option class="form-control" name="AQL_holes2" value="2.5"> 2.5</option>
                            <option class="form-control" name="AQL_holes2" value="4.0"> 4.0</option>
                            <option class="form-control" name="AQL_holes2" value="6.5"> 6.5</option>
                          </select>
                        </td>
                                         
                        <td>
                          <select class="form-control" id="AQL_holes3" name="AQL_holes3" disabled>
                            <option class="form-control" name="AQL_holes3" value="0.65"> </option>
                            <option class="form-control" name="AQL_holes3" value="1.0"> 1.0</option>
                            <option class="form-control" name="AQL_holes3" value="1.5"> 1.5</option>
                            <option class="form-control" name="AQL_holes3" value="2.5"> 2.5</option>
                            <option class="form-control" name="AQL_holes3" value="4.0"> 4.0</option>
                            <option class="form-control" name="AQL_holes3" value="6.5"> 6.5</option>
                          </select>
                        </td>
                      </tr>

                      <tr>
                        <th scope="col" class="info">Acceptance:</th>

                        <?php foreach ($fetch as $record) { //Acceptance_Regulatory
                              if ($record['TestKey'] == '156') { ?>
                        <td colspan="3"><?php echo $record['TestValue'];}?></td>
                        <?php } ?>

                        <?php foreach ($fetch as $record) { //Acceptance_Critical
                              if ($record['TestKey'] == '154') { ?>
                        <td colspan="4"><?php echo $record['TestValue'];}?></td>
                        <?php } ?>

                        <?php foreach ($fetch as $record) { //Acceptance_Visual
                              if ($record['TestKey'] == '152') { ?>
                        <td colspan="3"><?php echo $record['TestValue'];}?></td>
                        <?php } ?>

                        

                        <td><input class="form-control" name="Acceptance_holes1" placeholder="" disabled></td>
                        <td><input class="form-control" name="Acceptance_holes2" placeholder="" disabled></td>
                        <td><input class="form-control" name="Acceptance_holes3" placeholder="" disabled></td>
                      </tr>
                      <tr>
                        <?php 
                        $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Defect.DefectKey, T_Record_Defect.DefectValue
                                                    FROM T_Record_Defect LEFT JOIN T_Record_Master ON T_Record_Defect.RecordID = T_Record_Master.RecordID 
                                                    WHERE  T_Record_Master.RecordID = '".$record['RecordID']."'");
                        $query->execute();
                        $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <th scope="col" class="info" rowspan="5"> Defect</th>

                        <!-------------- REGULATOR PACKAGING L1 -------------------------->
                        <td>WLN:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '113') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>WMD:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '114') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>WED:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '112') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <!----------------------------CRITICAL PACKAGING L1------------------>
                        <td>WQ:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '133') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>MS:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '122') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>MB:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '119') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>MLN:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '120') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <!------------ VISUAL PACKAGING L1 ------------------------------------->
                        <td>WT:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '142') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>CT:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '135') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>POP:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '140') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td></td>
                        <td></td>
                        <td></td>
                      </tr> 

                      <tr>
                        
                        <!-------------- REGULATOR PACKAGING L2 -------------------------->
                        <td>WPC:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '115') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>MM:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '111') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>IP:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '110') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <!----------------------------CRITICAL PACKAGING L2------------------>
                        <td>WGS:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '129') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>WGT:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '130') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>WGA:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '128') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>OS:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '124') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <!------------ VISUAL PACKAGING L2 ------------------------------------->
                        <td>FG:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '137') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>PIS:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '139') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>MSA:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '138') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>

                      <tr>
                        
                        <!-------------- REGULATOR PACKAGING L3 -------------------------->
                        
                        <td></td>
                        <td></td>
                        <td></td>

                        

                        <!----------------------------CRITICAL PACKAGING L3------------------>
                        <td>WTS:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '134') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>PTS:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '126') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>WPO:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '132') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>DMG:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '117') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <!------------ VISUAL PACKAGING L3 ------------------------------------->
                        
                        <td>WIS:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '141') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>DT:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '136') {
                                echo "x"?></td>
                        <?php } }?></font>
                        <td></td>
                        

                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>

                      <tr>
                        <!-------------- REGULATOR PACKAGING L4 -------------------------->
                        
                        <td></td>
                        <td></td>
                        <td></td>

                        <!----------------------------CRITICAL PACKAGING L4 ------------------>
                        <td>MSG:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '121') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>FC:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '118') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>POS:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '125') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>BC:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '116') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <!------------ VISUAL PACKAGING L4 ------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>
                        

                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>

                      <tr>
                        <!-------------- REGULATOR PACKAGING L5 -------------------------->
                        
                        <td></td>
                        <td></td>
                        <td></td>

                        <!----------------------------CRITICAL PACKAGING L5 ------------------>
                        <td>WPD:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '131') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>MSI:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '123') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td>TRP:
                          <b><font color="red"><?php foreach ($fetch as $record) { if ($record['DefectKey'] == '127') {
                                echo "x"?></td>
                        <?php } }?></font>

                        <td></td>
                        

                        <!------------ VISUAL PACKAGING L5 ------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>
                        

                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
               
                      <tr>
                        <?php 
                          $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, 
                                                    T_Record_Test.SRText
                                                    FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                    WHERE  T_Record_Master.RecordID = '".$record['RecordID']."'");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <th scope="col" class="info">Result</th>
                        <?php foreach ($fetch as $record) { //Result_Regulatory
                              if ($record['TestKey'] == '161') { ?>
                        <td colspan="3"><input class="form-control" name="Result_Regulatory" value="<?php echo $record['TestValue'];?>" disabled></td>
                        <?php } } ?>

                        <?php foreach ($fetch as $record) { //Result_Critical
                              if ($record['TestKey'] == '160') { ?>
                        <td colspan="4"><input class="form-control" name="Result_Critical" value="<?php echo $record['TestValue'];?>" disabled></td>
                        <?php } } ?>
                        
                        <?php foreach ($fetch as $record) { //Result_Visual
                              if ($record['TestKey'] == '159') { ?>
                        <td colspan="3"><input class="form-control" name="Result_Visual" value="<?php echo $record['TestValue'];?>" disabled></td>
                        <?php } } ?>

                        <td><input class="form-control" name="total_holes1" placeholder="" disabled></td>
                        <td><input class="form-control" name="total_holes2" placeholder="" disabled></td>
                        <td><input class="form-control" name="total_holes3" placeholder="" disabled></td>
                      </tr>
                    </table>
                                                
                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                      <tr>				
										    <th scope="col" class="info">Final Disposition:</th>
                        <?php 
                          $query = $connect->prepare("SELECT T_Record_Master.RecordID, T_Record_Test.TestKey, T_Record_Test.TestValue, 
                                                    T_Record_Test.SRText
                                                    FROM T_Record_Test LEFT JOIN T_Record_Master ON T_Record_Test.RecordID = T_Record_Master.RecordID 
                                                    WHERE  T_Record_Master.RecordID = '".$record['RecordID']."'");
                          $query->execute();
                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <?php foreach ($fetch as $record) {
                              if ($record['TestKey'] == '162') { ?>
      									<td><input class="form-control" name="final_disposition" value="<?php echo $record['TestValue'];?>" disabled></td>
                        <?php } } ?>
 										  </tr>
                    </table>

                    <div class="form-group">
                        verify by:<label><?php echo $record['VerifierID'];?></label>
                      </div>

                      <div class="form-group">
                        <?php $date2 = date("d/m/Y h:i:s A", strtotime($record['VerifiedDate'])); ?>
                        Date:<label><?php echo $date2;?></label>
                      </div>				
                                                                        
                                                                                   
          		<center>
                      <a class = "btn btn-primary" href = "tables_FG.php" > Back</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                        <a class = "btn btn-success" target="_blank" href = "formqrex_editFG.php?LotIDKey=<?php echo $_GET['LotIDKey']?>" > Update/Verify</a>&nbsp;&nbsp;&nbsp;&nbsp;     
                        <a class = "btn btn-warning" target="_blank" href = "reinspection_FG.php?LotIDKey=<?php echo $_GET['LotIDKey']?>" > Reinspec</a>&nbsp;&nbsp;                        
                        <a target="" href="#" role="button" class="btn btn-primary" title="Print" onClick="window.print()"><i class = "glyphicon glyphicon-print"></i>&nbsp;Print</a></center><br><br>                                      
                                       </form>
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
	</div>
    
	<br />
	<br />
  
	
</body>

</html>
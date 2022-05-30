<?php
  include('../includes/database_connection.php');
  // include('../includes/session.php');
  include('../includes/header.php');
$page='QrCode';

$SONumber = $_GET['SONumber'];
$Factory = $_GET['Factory'];
// echo $SONumber;
?>

  <body>
    <div id="wrapper">


      <div id="page-wrapper" style=" margin: 0 0 0 0px!important;">
        <div class="row">
          <div class="">
            <h1 class="page-header">FG Summary By SO Number</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="panel panel-primary" >
          <div class="panel-heading">
            FG Summary By SO Number
          </div>
          <!-- /.panel-heading -->

          <div class="panel-body">


            <br>

            <div class="col-md-12">

              <div class="table-responsive">

                <table class="table table-bordered" id="tableID" width="30%" cellspacing="0">
                  <thead>


                    <tr class="info">
                      <th rowspan="2">Action</th>
                      <th rowspan="2">Customer</th>
                      <th rowspan="2">SO Number</th>
                      <th rowspan="2">Item Number</th>
                      <th rowspan="2" class="brandHead">Brand</th>
                      <th rowspan="2">Product</th>
                      <th rowspan="2">Product Code</th>
                      <th rowspan="2">Glove Size</th>
                      <th rowspan="2">Lot Count</th>
                      <th rowspan="2">Pallet No</th>
                      <th rowspan="2">Carton Quantity</th>
                      <th rowspan="2">Inspection Count</th>
                      <th rowspan="2">Sample Size VT (Visual Test)</th>
                      <th rowspan="2">Sample Size APT/WTT level 1</th>
                      <th rowspan="2">Sample Size APT/WTT level 2</th>
                      <th colspan="6">Acceptance</th>
                      <th rowspan="2">Disposition</th>
                      <th colspan="7">Defects</th>
                      <th rowspan="2">Factory</th>
                      <th rowspan="2">Colour</th>
                      <th rowspan="2">Inspection Date</th>
                      <th rowspan="2">Production Date</th>
                      <th rowspan="2">Production Line</th>
                      <th rowspan="2">Shift</th>
                      <th rowspan="2">Packing Date</th>
                      <th rowspan="2">Category</th>
                      <th rowspan="2">Batch Number</th>
                      <th rowspan="2">Carton Number</th>
                      <th rowspan="2">Glove weight</th>
                      <th rowspan="2">Overall AQL</th>
                      <th rowspan="2">UD Result Code</th>
                      <th rowspan="2">Counting</th>
                      <th rowspan="2">Packaging Defect</th>
                      <th rowspan="2">Overall Internal Physical Test</th>
                      <th rowspan="2">Donning and Tearing</th>
                      <th rowspan="2">Overall Physical Dimension Test</th>
                      <th rowspan="2">Lot ID</th>
                      <th rowspan="2">Check By(Badge ID)</th>
                      <th rowspan="2">Check By(Name)</th>
                      <th rowspan="2">Verify By(Badge ID)</th>
                      <th rowspan="2">Verify By(Name)</th>
                    </tr>

                    <tr class="info">
                      <th>Acc Holes 1</th>
                      <th>Acc Holes 2</th>
                      <th>Acc Critical NFG</th>
                      <th>Acc Critical NAG</th>
                      <th>Acc Major</th>
                      <th>Acc Minor</th>
                      <th>Total Barrier</th>
                      <th>Total Holes 1</th>
                      <th>Total Holes 2</th>
                      <th>Total Defects Critical NFG</th>
                      <th>Total Defects Critical NAG</th>
                      <th>Total Defects Major</th>
                      <th>Total Defects Minor</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                      $query = "{CALL SP_View_All_FG_Alt(?,?,?)}";
                      $null = null;
                      // echo $query;
                      $stmt=$connect->prepare($query);
                      $stmt->bindParam(1, $Factory);
                      $stmt->bindParam(2, $SONumber);
                      $stmt->bindParam(3, $null);
                      $stmt->execute();

                      while ($row=$stmt->fetch()){
                  ?>

                    <tr class="text-center">
                      <td>
                        <a class="btn btn-success" href=" http://172.16.10.61:8011/pages/FG/viewPage-FG.php?LotIDKey=<?php echo $row['LotIDKey'];?>&RecordID=<?php echo $row['RecordID'];?>" target="_blank">
                          VIEW
                        </a>
                      </td>
                      <td><?php echo $row['CustomerName'];?></td>
                      <td><?php echo $row['SONumber'];?></td>
                      <td><?php echo $row['SOItemNumber'];?></td>
                      <td><?php echo $row['BrandName'];?></td>
                      <td><?php echo $row['GloveProductTypeName'];?></td>
                      <td><?php echo $row['GloveCodeLong'];?></td>
                      <td><?php echo $row['GloveSizeCodeLong'];?></td>
                      <td><?php echo $row['LotCount'];?></td>
                      <td><?php echo $row['PalletNumber'];?></td>
                      <td><?php echo $row['CartonQuantity'];?></td>
                      <td><?php echo $row['InspectionCount'];?></td>
                      <td><?php echo $row['SampleSizeVisual'];?></td>
                      <td><?php echo $row['SampleSizeAPT/WTTLevel1'];?></td>
                      <td><?php echo $row['SampleSizeAPT/WTTLevel2'];?></td>
                      <td><?php echo $row['AcceptanceHoles1'];?></td>
                      <td><?php echo $row['AcceptanceHoles2'];?></td>
                      <td><?php echo $row['AcceptanceNonFunctionalCritical'];?></td>
                      <td><?php echo $row['AcceptanceNonAcceptableCritical'];?></td>
                      <td><?php echo $row['AcceptableMajorVisual'];?></td>
                      <td><?php echo $row['AcceptableMinorVisual'];?></td>
                      <td><?php echo $row['FinalDisposition'];?></td>
                      <!-- total holes is total barrier = total holes 1 + total holes 2 + total NFG-->
                      <td><?php echo $row['TotalHoles'];?></td>
                      <?php if($row['TotalHoles1'] <= $row['AcceptanceHoles1']){ ?>
                      <td bgcolor="#7cff76">
                      <?php }else{ ?>
                      <td bgcolor="#ff6767"> <?php } ?>
                      <?php echo $row['TotalHoles1'];?></td>

                      <?php if($row['TotalHoles2'] <= $row['AcceptanceHoles2']){ ?>
                      <td bgcolor="#7cff76">
                      <?php }else{ ?>
                      <td bgcolor="#ff6767"> <?php } ?>
                      <?php echo $row['TotalHoles2'];?></td>


                      <?php if($row['TotalNonFunctionalCritical'] <= $row['AcceptanceNonFunctionalCritical']){ ?>
                      <td bgcolor="#7cff76">
                      <?php }else{ ?>
                      <td bgcolor="#ff6767"> <?php } ?>
                      <?php echo $row['TotalNonFunctionalCritical'];?></td>


                      <?php if($row['TotalNAG_CP'] <= $row['AcceptanceNonAcceptableCritical']){ ?>
                      <td bgcolor="#7cff76">
                      <?php }else{ ?>
                      <td bgcolor="#ff6767"> <?php } ?>
                      <?php echo $row['TotalNAG_CP'];?></td>


                      <?php if($row['TotalDefectMajorVisual'] <= $row['AcceptableMajorVisual']){ ?>
                      <td bgcolor="#7cff76">
                      <?php }else{ ?>
                      <td bgcolor="#ff6767"> <?php } ?>
                      <?php echo $row['TotalDefectMajorVisual'];?></td>


                      <?php if($row['TotalDefectMinorVisual'] <= $row['AcceptableMinorVisual']){ ?>
                      <td bgcolor="#7cff76">
                      <?php }else{ ?>
                      <td bgcolor="#ff6767"> <?php } ?>
                      <?php echo $row['TotalDefectMinorVisual'];?></td>


                      <td><?php echo $row['Factory'];?></td>
                      <td><?php echo $row['GloveColourName'];?></td>
                      <td><?php echo date('d/m/Y',strtotime($row['RecordCreatedDateTime']));?></td>
                      <td><?php
                      $prodDate = (explode(",",$row['ProductionDate']));
                      //echo $row['ProductionDate']."<br /><br />";
                      for($i = 0; $i < count($prodDate); $i++){
                        echo date('d/m/Y',strtotime($prodDate[$i])).",<br />";
                      }

                      ?></td>
                      <td><?php echo $row['ProductionLine'];?></td>
                      <td><?php echo $row['Shift'];?></td>
                      <td><?php echo date('d/m/Y',strtotime($row['PackingDate']));?></td>
                      <td><?php echo $row['InspectionPlanName'];?></td>
                      <td><?php echo $row['BatchNumber'];?></td>
                      <td><?php echo $row['CartonNumber'];?></td>
                      <td><?php echo $row['GloveWeightAverage'];?></td>
                      <td><?php echo $row['OverallAQL'];?></td>
                      <td><?php echo $row['UDResultCode'];?></td>
                      <td><?php echo $row['CountingTest'];?></td>
                      <td><?php echo $row['PackagingDefectTestValue'];?></td>
                      <td><?php echo $row['OverallIPTVALUE'];?></td>
                      <td><?php echo $row['DonningTearingTest'];?></td>
                      <td><?php echo $row['OverallPDTVALUE'];?></td>
                      <td><?php echo $row['LotIDKey'];?></td>
                      <td><?php echo $row['InspectionUserID'];?></td>
                      <td><?php echo $row['InspectorName'];?></td>
                      <td><?php echo $row['VerifierID'];?></td>
                      <td><?php echo $row['VerifierName'];?></td>
                    </tr>

                  <?php } ?>
                  </tbody>
                </table>

              </div>
              <!-- /.table-responsive -->

            </div>
            <!-- /.col-md-12 -->

          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

      </div>
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

  <?php   include('../FG/script.php'); ?>

    <script>
      $(document).ready(function(){

        $('#tableID').dataTable({
          "autoWidth": false,
          columnDefs: [
            { width: 2000, targets: 6 }
        ],
          pageLength: 10,
          "dom": 'Bfrtip',
          buttons: [
            {extend :'excel',
            text:'Export to Excel',
            footer: true,
            exportOptions: {
              columns: [ 1, 2, 3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51 ],
              format : {
                header : function (mDataProp, columnIdx) {
                  var htmlText = '<span>' + mDataProp + '</span>';
                  var jHtmlObject = jQuery(htmlText);
                  jHtmlObject.find('div').remove();
                  var newHtml = jHtmlObject.text();
                  console.log('My header > ' + newHtml);
                  return newHtml;
                }
              }
            }
          }
          ]
        }).yadcf([
          {column_number: 1, filter_default_label: "Select"},
          {column_number: 2, filter_default_label: "Select"},
          {column_number: 3, filter_default_label: "Select"},
          {column_number: 4, filter_default_label: "Select"},
          {column_number: 5, filter_default_label: "Select"},
          {column_number: 6, filter_default_label: "Select"},
          {column_number: 7, filter_default_label: "Select"},
          {column_number: 8, filter_default_label: "Select"},
          {column_number: 9, filter_default_label: "Select"},
          {column_number: 10, filter_default_label: "Select"},
          {column_number: 12, filter_default_label: "Select"},
          {column_number: 13, filter_default_label: "Select"},
          {column_number: 14, filter_default_label: "Select"},
          {column_number: 15, filter_default_label: "Select"},
          {column_number: 16, filter_default_label: "Select"},
          {column_number: 17, filter_default_label: "Select"},
          {column_number: 18, filter_default_label: "Select"},
          {column_number: 18, filter_default_label: "Select"},
          {column_number: 19, filter_default_label: "Select"},
          {column_number: 20, filter_default_label: "Select"},
          {column_number: 21, filter_default_label: "Select"},
          {column_number: 22, filter_default_label: "Select"},
          {column_number: 23, filter_default_label: "Select"},
          {column_number: 24, filter_default_label: "Select"},
          {column_number: 25, filter_default_label: "Select"},
          {column_number: 26, filter_default_label: "Select"},
          {column_number: 27, filter_default_label: "Select"},
          {column_number: 28, filter_default_label: "Select"},
          {column_number: 29, filter_default_label: "Select"},
          {column_number: 30, filter_default_label: "Select"},
          {column_number: 31, filter_type: "range_date",  date_format : "dd/mm/yyyy"},
          {column_number: 32, filter_type: "range_date",  date_format : "dd/mm/yyyy"},
          {column_number: 33, filter_default_label: "Select"},
          {column_number: 34, filter_default_label: "Select"},
          {column_number: 35, filter_type: "range_date",  date_format : "dd/mm/yyyy"},
          {column_number: 36, filter_default_label: "Select"},
          {column_number: 37, filter_default_label: "Select"},
          {column_number: 38, filter_default_label: "Select"},
          {column_number: 39, filter_default_label: "Select"},
          {column_number: 40, filter_default_label: "Select"},
          {column_number: 41, filter_default_label: "Select"},
          {column_number: 42, filter_default_label: "Select"},
          {column_number: 43, filter_default_label: "Select"},
          {column_number: 44, filter_default_label: "Select"},
          {column_number: 45, filter_default_label: "Select"},
          {column_number: 46, filter_default_label: "Select"},
          {column_number: 47, filter_default_label: "Select"},
          {column_number: 48, filter_default_label: "Select"},
          {column_number: 49, filter_default_label: "Select"},
          {column_number: 50, filter_default_label: "Select"},
          {column_number: 51, filter_default_label: "Select"},
        ]);

      });
    </script>
    <style>

      table.dataTable thead th.brandHead{
        padding: 3px 70px 3px 10px;
      }

    </style>
  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  </body>
</html>


<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
<?php
include('../includes/database_connection.php');
include('../includes/session.php');
include('../includes/header.php');


$lotID = $_GET['LotIDKey'];
$RecordID = $_GET['RecordID'];

$query = $connect->prepare("{CALL SP_GetLotExistingRec(?)}");
$query -> bindParam(1, $lotID);
$query->execute();
$T_Lot_ProductionDateWLine = $query->fetchAll();
$query -> nextRowset();
$T_Lot_PackingDate = $query->fetch();
//echo $T_Lot_PackingDate['PackingDate'];
$query -> nextRowset();
$T_Lot_CartonNum = $query->fetch();
// echo $T_Lot_CartonNum['CartonNum'];
$query -> nextRowset();
$T_Lot_FG = $query->fetch();
// echo $T_Lot_FG['BatchNumber'];
$query -> nextRowset();
$T_Lot_SFG = $query->fetch();
// echo $T_Lot_SFG['BatchNumber'];



$query2 = $connect->prepare("{CALL SP_GetRecordExistingRec(?)}");
$query2 -> bindParam(1, $RecordID);
$query2->execute();
$T_Record_Instrument = $query2->fetchAll();
$query2 -> nextRowset();
$T_Record_Test = $query2->fetchAll();
$query2 -> nextRowset();
$T_Record_SampleSize = $query2->fetchAll();
$query2 -> nextRowset();
$T_Record_Defect = $query2->fetchAll();
$query2 -> nextRowset();
$T_Record_AQL = $query2->fetchAll();
$query2 -> nextRowset();
$T_Record_UDResult = $query2->fetchAll();

$query5 = $connect->prepare("Select DefectKey,DefectCode from M_Defect");
$query5->execute();
$DefectList = $query5->fetchAll();



$defectResult_pivot = array();
for($i = 0; $i < count($T_Record_Defect); $i++){
  $defectResult_pivot_temp= array(
    $T_Record_Defect[$i]['DefectKey']."d"=> $T_Record_Defect[$i]['DefectValue']
  );
  $defectResult_pivot = array_merge($defectResult_pivot,$defectResult_pivot_temp);
}

$query3 = $connect->prepare("SELECT * FROM T_Record_Master WHERE RecordID = ?");
$query3 -> bindParam(1, $RecordID);
$query3 ->execute();
$T_Record_Master = $query3->fetch();


function callDefectValue($defectkey_,$defectResult_pivot){
  $result_ = 0;
  $zeroVal_ = '';
  if(isset($defectResult_pivot[$defectkey_.'d'])){
    $result_ = $defectResult_pivot[$defectkey_.'d'];
  }

  if($result_ == 0){
    echo $zeroVal_;
  }else{
    echo $result_;
  }

}

function returnDefectValue($defectkey_,$defectResult_pivot){
  $result_ = 0;
    if(isset($defectResult_pivot[$defectkey_.'d'])){
    $result_ = $defectResult_pivot[$defectkey_.'d'];
  }
  return $result_;
}

function returnDefectName($defectkey_,$defectResult_pivot,$DefectList){
  $result_ = '';
    if(isset($defectResult_pivot[$defectkey_.'d'])){
      for($i = 0; $i < count($DefectList); $i++){
        if($DefectList[$i]['DefectKey'] == $defectkey_){
          if($defectResult_pivot[$defectkey_.'d'] > 0){
            $result_ = $DefectList[$i]['DefectCode']."-".$defectResult_pivot[$defectkey_.'d'].' ';
            break;
          }
        }
      }

  }
  return $result_;
}
?>

<style>
@page { size: A5 }
.table {
    width: 550px! important;
    max-width: 100%;
    margin-bottom: 10px! important;
}
</style>


<html lang="en">

<body class="A5">
 <section class="sheet padding-5mm">
  <div style="text-align: center;font-size: 14px;padding-top:10px;">QA Inspection Result <br /> Glove Travel Tag</div>


<div style="width:45%;font-size: 9px! important;padding-left: 2mm;padding-top:7px;" >

  <form method="POST">

  <Table class="table table-bordered" width="100%">

    <tr>
      <th>
      系统批次号
      </th>
      <td>
        <?php echo $lotID;?>
      </td>
      <th>
      方法
      </th>
      <td>
        <?php echo $T_Record_Test[0]['TestValue'];?>
      </td>
    </tr>
    <tr>
      <th>
      克重标准
      </th>
      <td>
        <?php echo $T_Lot_SFG['GloveCodeLong']; ?>
      </td>
      <th>
      批量编号
      </th>
      <td>
        <?php echo $T_Lot_SFG['BatchNumber'];?>
      </td>
    </tr>
    <tr>
      <th>
      实施日期
      </th>
      <td>
          <?php $date2 = date("d/m/Y h:i:s A", strtotime($T_Record_Master['LastSavedDateTime']));
          echo $date2;?>
      </td>
      <th>
      样本量
      </th>
      <td>
        <?php echo $T_Record_SampleSize[1]['SampleSizeValue']; ?> pieces
      </td>
    </tr>
  </Table>

  <Table class="table table-bordered">

    <tr>
      <th style="width: 50px! important;max-width: 50px! important;">
      成品标准
      </th>
      <th>
        Results
      </th>
      <th style="text-align: justify;width: 85px! important;max-width: 85px! important;">
      缺陷代码 (数量)
      </th>
      <th style="max-width: 90px! important;">
      检验说明
      </th>
      <td >

      </td>
      <th style="width: 50px! important;max-width: 50px! important;">
      成品标准
      </th>
      <th>
        Results
      </th>
      <th style="max-width: 90px! important;">
      检验说明
      </th>
    </tr>

    <tr>
      <th>
       
      小视觉
      </th>
      <td>
        <?php $sum1 = 0;

          $sum1 += returnDefectValue(1,$defectResult_pivot);
          $sum1 += returnDefectValue(2,$defectResult_pivot);
          $sum1 += returnDefectValue(3,$defectResult_pivot);
          $sum1 += returnDefectValue(158,$defectResult_pivot);
          $sum1 += returnDefectValue(160,$defectResult_pivot);
          $sum1 += returnDefectValue(161,$defectResult_pivot);

          if($sum1 > $T_Record_AQL[1]['AQLValue']){
            echo "FAIL";
          }else{
            echo "PASS";
          }

          ?>
      </td>
      <td >
        <?php $defect1 = '';

          $defect1 .= returnDefectName(1,$defectResult_pivot,$DefectList);
          $defect1 .= returnDefectName(2,$defectResult_pivot,$DefectList);
          $defect1 .= returnDefectName(3,$defectResult_pivot,$DefectList);
          $defect1 .= returnDefectName(158,$defectResult_pivot,$DefectList);
          $defect1 .= returnDefectName(160,$defectResult_pivot,$DefectList);
          $defect1 .= returnDefectName(161,$defectResult_pivot,$DefectList);


          echo wordwrap($defect1,15,"<br>\n");


          ?>
      </td>
      <td >
        <?php
        if(isset($_POST['print'])){ echo wordwrap( $_POST['minor'],15,"<br>\n"); }else{
         ?>
         <input type="textarea" maxlength="50" name="minor" style="width: 80px! important;"/>
       <?php } ?>

      </td>
      <td>

      </td>
      <th>
      手套长度
      </th>
      <td>
        <?php
          $length = 0;
          $divider = 0;

          for($i = 14; $i < 27; $i++){
            if($T_Record_Test[$i]['TestValue'] > 0){
              $length += $T_Record_Test[$i]['TestValue'];
              $divider ++;
            }
          }

          $length = $length/$divider;
          echo $length."mm";

         ?>
      </td>
      <td >
        <?php
        if(isset($_POST['print'])){ echo wordwrap( $_POST['length'],17,"<br>\n"); }else{
         ?>
         <input type="textarea" maxlength="50" name="length" style="width: 80px! important;"/>
       <?php } ?>

      </td>
    </tr>


    <tr>
      <th>
      主要视觉
      </th>
      <td>
        <?php $sum2 = 0;
         for($i = 4; $i<=50; $i++){
           $sum2 += returnDefectValue($i,$defectResult_pivot);
         }

           $sum2 += returnDefectValue(146,$defectResult_pivot);
           $sum2 += returnDefectValue(166,$defectResult_pivot);
           $sum2 += returnDefectValue(167,$defectResult_pivot);

          if($sum2 > $T_Record_AQL[3]['AQLValue']){
            echo "FAIL";
          }else{
            echo "PASS";
          }

          ?>
      </td>
      <td>
        <?php $defect2 = '';

        for($i = 4; $i<=50; $i++){
          $defect2 .= returnDefectName($i,$defectResult_pivot,$DefectList);
        }

          $defect2 .= returnDefectName(146,$defectResult_pivot,$DefectList);
          $defect2 .= returnDefectName(166,$defectResult_pivot,$DefectList);
          $defect2 .= returnDefectName(167,$defectResult_pivot,$DefectList);


          echo wordwrap($defect2,15,"<br>\n");

          ?>
      </td>
      <td >
        <?php
        if(isset($_POST['print'])){ echo wordwrap( $_POST['major'],17,"<br>\n"); }else{
         ?>
         <input type="textarea" maxlength="50" name="major" style="width: 80px! important;"/>
       <?php } ?>

      </td>
      <td>

      </td>
      <th>
      手套掌宽
      </th>
      <td>
        <?php
          $width = 0;
          $divider = 0;

          for($i = 28; $i < 41; $i++){
            if($T_Record_Test[$i]['TestValue'] > 0){
              $width += $T_Record_Test[$i]['TestValue'];
              $divider ++;
            }
          }

          $width = $width/$divider;
          echo $width."mm";

         ?>
      </td>
      <td >
        <?php
        if(isset($_POST['print'])){ echo wordwrap( $_POST['width'],17,"<br>\n"); }else{
         ?>
         <input type="textarea" maxlength="50" name="width" style="width: 80px! important;"/>
       <?php } ?>

      </td>
    </tr>

    <tr>
      <th>
      关键NAG
      </th>
      <td>
        <?php $sum3 = 0;
        for($i = 51; $i<=67; $i++){
          $sum3 += returnDefectValue($i,$defectResult_pivot);
        }
        for($i = 74; $i<=76; $i++){
          $sum3 += returnDefectValue($i,$defectResult_pivot);
        }

          $sum3 += returnDefectValue(147,$defectResult_pivot);
          $sum3 += returnDefectValue(149,$defectResult_pivot);
          $sum3 += returnDefectValue(162,$defectResult_pivot);
          $sum3 += returnDefectValue(163,$defectResult_pivot);
          $sum3 += returnDefectValue(164,$defectResult_pivot);
          $sum3 += returnDefectValue(165,$defectResult_pivot);

          if($sum3 > $T_Record_AQL[20]['AQLValue']){
            echo "FAIL";
          }else{
            echo "PASS";
          }

          ?>
      </td>
      <td>
        <?php $defect3 = '';
        for($i = 51; $i<=67; $i++){
          $defect3 .= returnDefectName($i,$defectResult_pivot,$DefectList);
        }
        for($i = 74; $i<=76; $i++){
          $defect3 .= returnDefectName($i,$defectResult_pivot,$DefectList);
        }

          $defect3 .= returnDefectName(147,$defectResult_pivot,$DefectList);
          $defect3 .= returnDefectName(149,$defectResult_pivot,$DefectList);
          $defect3 .= returnDefectName(162,$defectResult_pivot,$DefectList);
          $defect3 .= returnDefectName(163,$defectResult_pivot,$DefectList);
          $defect3 .= returnDefectName(164,$defectResult_pivot,$DefectList);
          $defect3 .= returnDefectName(165,$defectResult_pivot,$DefectList);

            echo wordwrap($defect3,15,"<br>\n");

          ?>
      </td>
      <td >
        <?php
        if(isset($_POST['print'])){ echo wordwrap( $_POST['nag'],17,"<br>\n"); }else{
         ?>
         <input type="textarea" maxlength="50" name="nag" style="width: 80px! important;"/>
       <?php } ?>

      </td>
      <td>

      </td>
      <th>
      袖带厚度
      </th>
      <td>
        <?php
          $cuff = 0;
          $divider = 0;

          for($i = 42; $i < 55; $i++){
            if($T_Record_Test[$i]['TestValue'] > 0){
              $cuff += $T_Record_Test[$i]['TestValue'];
              $divider ++;
            }
          }

          $cuff = $cuff/$divider;
          echo $cuff."mm";

         ?>
      </td>
      <td >
        <?php
        if(isset($_POST['print'])){ echo wordwrap( $_POST['cuff'],17,"<br>\n"); }else{
         ?>
         <input type="textarea" maxlength="50" name="cuff" style="width: 80px! important;"/>
       <?php } ?>

      </td>
    </tr>
    <tr>
      <th>
      临界NFG
      </th>
      <td >
        <?php $sum4 = 0;
        for($i = 68; $i<=73; $i++){
          $sum4 += returnDefectValue($i,$defectResult_pivot);
        }
          $sum4 += returnDefectValue(148,$defectResult_pivot);

          if($sum4 > $T_Record_AQL[19]['AQLValue']){
            echo "FAIL";
          }else{
            echo "PASS";
          }

          ?>
      </td>
      <td>
        <?php $defect4 = '';
        for($i = 68; $i<=73; $i++){
            $defect4 .= returnDefectName($i,$defectResult_pivot,$DefectList);
        }
            $defect4 .= returnDefectName(148,$defectResult_pivot,$DefectList);

          echo wordwrap($defect4,15,"<br>\n");

          ?>
      </td>
      <td >
        <?php
        if(isset($_POST['print'])){ echo wordwrap( $_POST['nfg'],17,"<br>\n"); }else{
         ?>
         <input type="textarea" maxlength="50" name="nfg" style="width: 80px! important;"/>
       <?php } ?>

      </td>
      <td>

      </td>
      <th> 
      手掌厚度
      </th>
      <td>
        <?php
          $palm = 0;
          $divider = 0;

          for($i = 56; $i < 69; $i++){
            if($T_Record_Test[$i]['TestValue'] > 0){
              $palm += $T_Record_Test[$i]['TestValue'];
              $divider ++;
            }
          }

          $palm = $palm/$divider;
          echo $palm."mm";

         ?>
      </td>
      <td >
        <?php
        if(isset($_POST['print'])){ echo wordwrap( $_POST['palm'],17,"<br>\n"); }else{
         ?>
         <input type="textarea" maxlength="50" name="palm" style="width: 80px! important;"/>
       <?php } ?>

      </td>
    </tr>
    <tr>
      <th>
      免于漏洞
      </th>
      <td>
        <?php  $sum5 = 0;
         for($i = 77; $i<=87; $i++){
           $sum5 += returnDefectValue($i,$defectResult_pivot);
         }

           $sum5 += returnDefectValue(143,$defectResult_pivot);
           $sum5 += returnDefectValue(150,$defectResult_pivot);
           $sum5 += returnDefectValue(155,$defectResult_pivot);


          if($sum5 > $T_Record_AQL[5]['AQLValue']){
            echo "FAIL";
          }else{
            echo "PASS";
          }

          ?>
      </td>
      <td>
        <?php $defect5 = '';
        for($i = 77; $i<=87; $i++){
          $defect5 .= returnDefectName($i,$defectResult_pivot,$DefectList);
        }

          $defect5 .= returnDefectName(143,$defectResult_pivot,$DefectList);
          $defect5 .= returnDefectName(150,$defectResult_pivot,$DefectList);
          $defect5 .= returnDefectName(155,$defectResult_pivot,$DefectList);

            echo wordwrap($defect5,15,"<br>\n");

          ?>
      </td>
      <td >
        <?php
        if(isset($_POST['print'])){ echo wordwrap( $_POST['ffh'],17,"<br>\n"); }else{
         ?>
         <input type="textarea" maxlength="50" name="ffh" style="width: 80px! important;"/>
       <?php } ?>

      </td>
      <td>

      </td>
      <th>
      指尖厚度
      </th>
      <td>
        <?php
          $fingertip = 0;
          $divider = 0;

          for($i = 70; $i < 83; $i++){
            if($T_Record_Test[$i]['TestValue'] > 0){
              $fingertip += $T_Record_Test[$i]['TestValue'];
              $divider ++;
            }
          }

          $fingertip = $fingertip/$divider;
          echo $fingertip."mm";

         ?>
      </td>
      <td >
        <?php
        if(isset($_POST['print'])){ echo wordwrap( $_POST['fingertip'],17,"<br>\n"); }else{
         ?>
         <input type="textarea" maxlength="50" name="fingertip" style="width: 80px! important;"/>
       <?php } ?>

      </td>
    </tr>
    <tr>
      <th>
      手套克重
      </th>
      <td>
        <?php echo $T_Record_Test[10]['TestValue'];?>
      </td>
      <td>

      </td>
      <td >
        <?php
        if(isset($_POST['print'])){ echo wordwrap( $_POST['gweight'],17,"<br>\n"); }else{
         ?>
         <input type="textarea" maxlength="50" name="gweight" style="width: 80px! important;"/>
       <?php } ?>

      </td>
      <td>

      </td>
      <th>
      珠径
      </th>
      <td>
        <?php
          $bead = 0;
          $divider = 0;

          for($i = 84; $i < 97; $i++){
            if($T_Record_Test[$i]['TestValue'] > 0){
              $bead += $T_Record_Test[$i]['TestValue'];
              $divider ++;
            }
          }

          $bead = $bead/$divider;
          echo $bead."mm";

         ?>
      </td>
      <td >
        <?php
        if(isset($_POST['print'])){ echo wordwrap( $_POST['bead'],17,"<br>\n"); }else{
         ?>
         <input type="textarea" maxlength="50" name="bead" style="width: 80px! important;"/>
       <?php } ?>

      </td>
    </tr>
    <tr>
      <th>
      手套计数
      </th>
      <td>
        <?php echo $T_Record_Test[12]['TestValue'];?>
      </td>
      <td>

      </td>
      <td >
        <?php
        if(isset($_POST['print'])){ echo wordwrap( $_POST['gcount'],17,"<br>\n"); }else{
         ?>
         <input type="textarea" maxlength="50" name="gcount" style="width: 80px! important;"/>
       <?php } ?>

      </td>
      <td>

      </td>
      <th>

      </th>
      <td>
      </td>
      <td>

      </td>
    </tr>



  </Table>

  <Table class="table table-bordered">
    <tr>
      <td>
      最终检验结果判定
      </td>
      <td width="300px">
        <?php echo $T_Record_AQL[18]['AQLValue'];?>
      </td>
      <td>
      接收标准
      </td>
      <td width="300px">

      </td>
    </tr>
  </Table>

  <Table class="table table-bordered">
    <tr>

      <td>
      检查人姓名
      </td>
      <td width="250px">

          <?php
          if(isset($_POST['print'])){ echo wordwrap( $_POST['inspector'],25,"<br>\n"); }else{
           ?>
           <input type="textarea" maxlength="100" name="inspector" />
         <?php } ?>

      </td>
      <td>
      验证者姓名
      </td>
      <td width="250px">

          <?php
          if(isset($_POST['print'])){ echo wordwrap( $_POST['aprrover'],25,"<br>\n"); }else{
           ?>
           <input type="textarea" maxlength="100" name="aprrover" />
         <?php } ?>

      </td>
    </tr>
  </Table>
<?php
if(isset($_POST['print'])){}else{

 ?>
  <button class="btn btn-success" name="print" style="margin-top:25px;">
    <i class="fa fa-print"></i>
    Print
  </button>

<?php }?>
  </form>

</div >




  <script type="text/javascript">
  function codeAddress() {
    window.print();
  }

  <?php
  if(isset($_POST['print'])){

   ?>
  window.onload = codeAddress;
  <?php }else{} ?>
  </script>

</section>
</body>


</html>

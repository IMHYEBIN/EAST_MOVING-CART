<?

header( "Content-type: application/vnd.ms-excel" ); 
header( "Content-type: application/vnd.ms-excel; charset=utf-8");
header( "Content-Disposition: attachment; filename = inspection.xls" ); 
header( "Content-Description: PHP4 Generated Data" );

?>

<link href="/css/data_log.css" rel="stylesheet" type="text/css">

<?php 

$conn = new mysqli("localhost", "server", "00000000", "dataset");


$sql = "select * from main_viewer order by id desc"; 

setcookie('machine_no', $_POST["machine_no"], time() + 60, '/');
setcookie('item_no', $_POST["item_no"], time() + 60, '/');
setcookie('date_call', $_POST["date_call"], time() + 60, '/');
setcookie('judgement', $_POST["judgement"], time() + 60, '/');


$cDate = $_POST['date_call'];
$d_call =  preg_replace("/[^0-9]*/s", "", $cDate);
$m_no = $_POST['machine_no'];
$i_no = $_POST['item_no'];

$ju = $_POST['judgement'];


echo "<table border='1'>";
echo "<tr bgcolor='#EAEAEA'>";
echo "<th width='70px'>구분</th>
      <th width='80px'>호기 구분</th>
      <th width='150px'>품 목</th>
      <th width='80px'>검사 01</th>
      <th width='80px'>검사 02</th>
      <th width='80px'>검사 03</th>
      <th width='80px'>검사 04</th>
      <th width='80px'>검사 05</th>
      <th width='80px'>검사 06</th>
      <th width='80px'>검사 07</th>
      <th width='80px'>검사 08</th>
      <th width='80px'>검사 09</th>
      <th width='80px'>검사 10</th>
      <th width='100px'>합부 여부</th>
      <th width='90px'>발생 일자</th>
      <th width='90px'>발생 시간</th></tr>";
                                                   //기본 형태 갖추기

if ($i_no <=4)  {
   $sql = "select * from main_viewer where item_id_num = '".$i_no."' order by id desc"; 
   $res = mysqli_query($conn, $sql);
   $row = mysqli_fetch_array($res);
   if ($row[1]==0){$item0="CAP LID";}
   else if ($row[1]==1){$item0="지데코(소)&미쯔바";}
   else if ($row[1]==2){$item0="지데코(대)";}
   else if ($row[1]==3){$item0="YC-1컨넥터";}
   else {$item0="YC-2컨넥터";}                         //아이템 정렬

   if ($row[20]==1) {$shape1check="유검사";}
   else {$shape1check="무검사";}
                                                      //외관 검사 1 유/무검사 확인
   if ($row[21]==1) {$shape2check="유검사";}
   else {$shape2check="무검사";}
                                                      //외관 검사 2 유/무검사 확인
   if ($row[22]==1) {$shape3check="유검사";}
   else {$shape3check="무검사";}
                                                      //외관 검사 3 유/무검사 확인


   echo "<tr bgcolor='#EAEAEA'>";
   echo "<th colspan='2'>기준값</th>
         <th>".$item0."</th>
         <th>".$shape1check."</th>
         <th>".$shape2check."</th>
         <th>".$shape3check."</th>
         <th>".$row[6]."~".$row[7]."</th>
         <th>".$row[8]."~".$row[9]."</th>
         <th>".$row[10]."~".$row[11]."</th>
         <th>".$row[12]."~".$row[13]."</th>
         <th>".$row[14]."~".$row[15]."</th>
         <th>".$row[16]."~".$row[17]."</th>
         <th>".$row[18]."~".$row[19]."</th>
         <th colspan='3'>개정이력 :".$row[28]."</th>
   </tr>";

}
else {
   echo "<tr bgcolor='#EAEAEA'>";
   echo "<th colspan='16'>전체 아이템 조회시 기준값 출력 불가</th></tr>";
}



if ($i_no <= 5 && $ju == 0) {
   $sql2 = "select * from result1 where date = '".$cDate."' and index1 ='".$i_no."' and conclusion1 >= 2 order by id desc";
   } 
else if ($i_no <=5 && $ju == 1) {
   $sql2 = "select * from result1 where date = '".$cDate."' and index1 ='".$i_no."' and conclusion1 = 1 order by id desc";
   }
else if ($i_no <=5 && $ju == 2) {
   $sql2 = "select * from result1 where date = '".$cDate."' and index1 ='".$i_no."' order by id desc";
   }
else if ($i_no ==6 && $ju == 0) {
   $sql2 = "select * from result1 where date = '".$cDate."' and conclusion1 >= 2 order by id desc";
   }
else if ($i_no ==6 && $ju == 1) {
   $sql2 = "select * from result1 where date = '".$cDate."' and conclusion1 = 1 order by id desc";
   }
else {
   $sql2 = "select * from result1 where date = '".$cDate."' order by id desc";
   }

   $res2 = mysqli_query($conn, $sql2);  //조건별 데이터 정리
   for($countline2=1;$row2 = mysqli_fetch_array($res2);$countline2++){


      $sdate = date ('Y.m.d',strtotime($row2[1]));          //날짜 데이터 변환
      $ssdate = date('H:i:s',strtotime($row2[2]));           //시간 데이터 변환
      if ($row2[20]==1){$conclusion = "합격";}
      else {$conclusion = "불합격";}

      echo "<tr><td>" . $countline2 ."</td>
               <td>검사1호기</td>
               <td>".$item0."</td>
               <td>".number_format($row2[9],2)."</td>
               <td>".number_format($row2[10],2)."</td>
               <td>".number_format($row2[11],2)."</td>
               <td>".number_format($row2[12],2)."</td>
               <td>".number_format($row2[13],2)."</td>
               <td>".number_format($row2[14],2)."</td>
               <td>".number_format($row2[15],2)."</td>
               <td>".number_format($row2[16],2)."</td>
               <td>".number_format($row2[17],2)."</td>
               <td>".$row2[18]."</td>
               <td>".$conclusion."</td>
               <td>".$sdate."</td>
               <td>".$ssdate."</td>
               </tr>"               
      ;}                                           // 테이블 형식에 맞춰서 반복으로 출력하기 
      
      echo "</table>";
 mysqli_close($conn);    // 종료
   ?>
<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");

$sql = "create table check_vision_view (
   id int(11) primary key auto_increment, 
   mc_num varchar(60),
   mc_code varchar(60),
   localtime1 date,
   data1_min double,
   data1_max double,
   data2_min double,
   data2_max double,
   data3_min double,
   data3_max double,
   data4_min double,
   data4_max double,
   data5_min double,
   data5_max double,
   vcComment1 varchar(100), 
   vcRevision1 int(11), 
   vcComment2 varchar(60), 
   vcRevision_date1 date,
   data6_min double,
   data6_max double,
   data7_min double,
   data7_max double,
   data8_min double,
   data8_max double,
   data9_min double,
   data9_max double,
   data10_min double,
   data10_max double,
   vcComment3 varchar(100), 
   vcRevision2 int(11), 
   vcComment4 varchar(60), 
   vcRevision_date2 date)";
$res = mysqli_query($conn, $sql);		// 테이블 생성

$sql = "create table test1 (id int primary key auto_increment)";
$res = mysqli_query($conn, $sql);		// 테이블 생성

echo $res;

mysqli_close($conn); // 종료

?>

생성완료
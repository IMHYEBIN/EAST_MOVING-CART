<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");

$sql = "create table main_viewer (
   id int(11) primary key auto_increment, 
   item_id_num int(11),
   item_num varchar(60),
   item_name varchar(60),
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
   shape1_check varchar(60),
   shape2_check varchar(60),
   shape3_check varchar(60),
   acc1 varchar(60),
   acc2 varchar(60),
   acc3 varchar(60),
   vcComment1 varchar(100), 
   vcRevision1 int(11), 
   vcComment2 varchar(60), 
   vcRevision_date1 date,
   customer varchar(60))";
$res = mysqli_query($conn, $sql);		// 테이블 생성

$sql = "create table test1 (id int primary key auto_increment)";
$res = mysqli_query($conn, $sql);		// 테이블 생성

echo $res;

mysqli_close($conn); // 종료

?>

생성완료
<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");

$sql = "create table inspection_res (
   id int(11) primary key auto_increment, 
   machine_num int(11),
   check_date int(11),
   check_time int(11),
   item_Num varchar(60),
   inspection1 double,
   inspection2 double,
   inspection3 double,
   inspection4 double,
   inspection5 double,
   inspection6 double,
   inspection7 double,
   inspection8 double,
   inspection9 double,
   inspection10 double,
   ins_result int(11),
   acc1 varchar(60),
   acc2 varchar(60)
   )";
$res = mysqli_query($conn, $sql);		// 테이블 생성

$sql = "create table test1 (id int primary key auto_increment)";
$res = mysqli_query($conn, $sql);		// 테이블 생성

echo $res;

mysqli_close($conn); // 종료

?>

생성완료
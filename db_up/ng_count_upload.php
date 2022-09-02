<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");

$sql = "create table ng_count (
   id int(11) primary key auto_increment,
   date_count int(11),
   ok_count int(11),
   ng_total int(11),
   shape1_ngCount int(11),
   shape2_ngCount int(11),
   spc_ngCount int(11), 
   mc_num varchar(60)
   )";
$res = mysqli_query($conn, $sql);		// 테이블 생성 실행

echo $res;

mysqli_close($conn); // 종료

?>

생성완료
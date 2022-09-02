<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");

$sql = "select * from check_vision_view"; // 문구 보기
$res = mysqli_query($conn, $sql);

$sql = "show tables";
$res = mysqli_query($conn, $sql);                     //테이블 보여주기

echo $res;

mysqli_close($conn); // 종료

?>
<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");

$sql1 = "alter table main_viewer change data8_min shape1_check varchar(60)";
$sql2 = "alter table main_viewer change data8_max shape2_check varchar(60)";
$sql3 = "alter table main_viewer change data9_min shape3_check varchar(60)";
$sql4 = "alter table main_viewer change data9_max acc1 varchar(60)";
$sql5 = "alter table main_viewer change data10_min acc2 varchar(60)";
$sql6 = "alter table main_viewer change data10_max acc3 varchar(60)";
$sql7 = "alter table main_viewer change vcRevision2 vcRevision1 int(11)";
$sql8 = "alter table main_viewer change vcRevision_date2 vcRevision_date1 date";
$sql9 = "alter table main_viewer add customer varchar(60)";

$res1= mysqli_query($conn, $sql1);
$res2= mysqli_query($conn, $sql2);
$res3= mysqli_query($conn, $sql3);
$res4= mysqli_query($conn, $sql4);
$res5= mysqli_query($conn, $sql5);
$res6= mysqli_query($conn, $sql6);
$res7= mysqli_query($conn, $sql7);
$res8= mysqli_query($conn, $sql8);
$res9= mysqli_query($conn, $sql9);




mysqli_close($conn); // 종료

?>
change OK
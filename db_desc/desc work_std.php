<link href="/css/point.css" rel="stylesheet" type="text/css">

<?php

$conn = new mysqli("e-company.co.kr", "server", "00000000", "dataset");
$sql = "desc work_std";

$res = mysqli_query($conn, $sql);		

echo "desc work_std :"."<br><br>";
echo "<table>";
echo "<tr><td>no.</td><td>Field</td><td>Type</td><td>Null</td><td>Key</td><td>Default</td><td>Extra</td></tr>";
for ($count1=0;$row = mysqli_fetch_array($res);$count1++) {
   echo "<tr><td>".$count1."</td><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td></tr>";
   
   }                                                       
echo $res;
echo "</table>";
mysqli_close($conn); // 종료

?>

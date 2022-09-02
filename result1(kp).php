<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");
$sql = "select * from result1 order by id desc";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="chrome">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <meta http-equiv="Refresh" content="5;url=result1(kp).php"> -->
   <link href="/css/table.css" rel="stylesheet" type="text/css">
   <title>main viewer</title>
</head>
<body>
   <table width="188px" height="300px">
      <tr>
         <td>0</td>
      </tr>
      <tr>
         <td>0</td>
      </tr>
      <tr>
         <td>0</td>
      </tr>
      <tr>
         <td><?php echo $row[16]; ?></td>
      </tr>
      <tr>
         <td><?php echo $row[17]; ?></td>
      </tr>
      <tr>
         <td><?php echo $row[18]; ?></td>
      </tr>
      <tr>
         <td>0</td>
      </tr>
      <tr>
         <td>0</td>
      </tr>
      <tr>
         <td>0</td>
      </tr>
      <tr>
         <td>0</td>
      </tr>
</body>
</html>

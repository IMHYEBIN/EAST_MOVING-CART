<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");
$sql = "select * from controll1 order by id asc limit 1";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="chrome">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <meta http-equiv="Refresh" content="5"> -->
   <link href="/css/table.css" rel="stylesheet" type="text/css">
   <title>main viewer1</title>

</head>
<body>

   <img src="http://localhost:8080/img/<?php echo $row[4];?>" width="750px" height="380px">

</body>
</html>
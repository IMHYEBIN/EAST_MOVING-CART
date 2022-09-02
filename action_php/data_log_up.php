<!-- refresh 값 바꾸는 페이지 -->
<?php session_start();  // 세션 선언 필수 
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<?php $conn = new mysqli("localhost", "server", "00000000", "dataset");

	$refresh = $_POST["refresh"];

	if ($refresh == '1') {
		$sql00 = "update check1 set refresh = '0'";
		$res00 = mysqli_query($conn, $sql00);
	} else if ($refresh == '0') {
		$sql01 = "update check1 set refresh = '1'";
		$res01 = mysqli_query($conn, $sql01);
	}
	?>
</body>
<script type="text/javascript">
	opener.location.reload(); //부모의 부모창 새로고침
	// opener.close();					//부모창 닫기
 	self.close();						//본인창 닫기
	</script>
</html>
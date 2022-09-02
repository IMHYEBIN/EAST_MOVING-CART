<meta charset=UTF-8>
<?php session_start();

$_SESSION['reload'] = $_POST['reload']; // 조회시 발생한 값 불러오기
$reload = $_SESSION['reload']; // 조회시 발생한 값 불러오기

$conn = new mysqli("localhost", "server", "00000000", "dataset");

if ($reload != null) {
	$sql04 = "update controll1 set call1 = '" . $reload . "' where id = 1";
	$res04 = mysqli_query($conn, $sql04);
}

mysqli_close($conn); // 종료
?>

<script type="text/javascript">
	opener.document.location.reload(1);
	self.close(); //본인창 닫기
</script>
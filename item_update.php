<meta charset=UTF-8>
<?php session_start();

$_SESSION['selected_item'] = $_POST['selected_item']; // 조회시 발생한 값 불러오기
$selected_item = $_SESSION['selected_item']; // 조회시 발생한 값 불러오기

$conn = new mysqli("localhost", "server", "00000000", "dataset");

	if ($selected_item != "==제품전체==") {
		$sql = "update check1 set selected_item = '" . $selected_item . "'";
		$res = mysqli_query($conn, $sql);
	}else{
        $sql = "update check1 set selected_item = '==제품전체=='";
		$res = mysqli_query($conn, $sql);
    }

mysqli_close($conn); // 종료
?>

<script type="text/javascript">
	document.location.href = "/vision check1(kp).php";
	self.close(); //본인창 닫기
</script>
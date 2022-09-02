<meta charset=UTF-8>
<?php session_start();

$_SESSION['comment_value'] = $_POST['comment_value']; // 조회시 발생한 값 불러오기
$comment_value = $_SESSION['comment_value']; // 조회시 발생한 값 불러오기

$conn = new mysqli("localhost", "server", "00000000", "dataset");

for ($countA = 1; $countA < 11; $countA++) {
	$countR = $countA - 1;

	$comment_POST = $_POST['comment' . $countA . ''];
	$data_POST = $_POST['data' . $countA . ''];

	if ($comment_POST != null) {
		$sql = "update br1 set a" . $countR . " = '" . $data_POST . "'	where id = " . $comment_value;
		$res = mysqli_query($conn, $sql);

		$sql02 = "update controll1 set call1 = '2' where id = 1";
		$res02 = mysqli_query($conn, $sql02);

	}

	if ($data_POST != null) {
		$sql01 = "update br2 set a" . $countR . " = '" . $comment_POST . "'	where id = " . $comment_value;
		$res01 = mysqli_query($conn, $sql01);

		$sql03 = "update controll1 set call1 = '2' where id = 1";
		$res03 = mysqli_query($conn, $sql03);
	}
}
mysqli_close($conn); // 종료
?>

<script type="text/javascript">
	opener.document.location.href = "/comment2.php?currentPage=<?php echo $comment_value ?>"
	self.close(); //본인창 닫기
</script>
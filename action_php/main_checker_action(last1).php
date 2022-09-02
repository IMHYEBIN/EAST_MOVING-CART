<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");

$sql= "insert into check_vision_view (localtime1, data1_min, data1_max, data2_min, data2_max, data3_min, data3_max, data4_min, data4_max, data5_min, data5_max, data6_min, data6_max, data7_min, data7_max, data8_min, data8_max, data9_min, data9_max, data10_min, data10_max, vcComment1, vcComment2, vcComment3, vcComment4, vcRevision1, vcRevision2, vcRevision_date1, vcRevision_date2) 
		values ('".date("Y-m-d")."', ".$_POST["data1_min"].", ".$_POST["data1_max"].", ".$_POST["data2_min"].", ".$_POST["data2_max"].", ".$_POST["data3_min"].", ".$_POST["data3_max"].", ".$_POST["data4_min"].", ".$_POST["data4_max"].", ".$_POST["data5_min"].", 
					".$_POST["data5_max"].", ".$_POST["data6_min"].", ".$_POST["data6_max"].", ".$_POST["data7_min"].", ".$_POST["data7_max"].", ".$_POST["data8_min"].", ".$_POST["data8_max"].", ".$_POST["data9_min"].", ".$_POST["data9_max"].", ".$_POST["data10_min"].", ".$_POST["data10_max"].", 
					'".$_POST["vcComment1"]."', '".$_POST["vcComment2"]."', '".$_POST["vcComment3"]."', '".$_POST["vcComment4"]."', ".$_POST["vcRevision1"].", ".$_POST["vcRevision2"].", '".$_POST["vcRevision_date1"]."', '".$_POST["vcRevision_date2"]."')";		//values 뒤에꺼는 필드의 삽입될 값
$res= mysqli_query($conn, $sql);

$sql = "select * from check_vision_view order by id desc"; 																							// 문구 보기
$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($res);

	echo "[id] : " . $row[0] ."<br>";
	echo "[mc_num] : " . $row[1] ."<br>";
	echo "[mc_code] : " . $row[2] ."<br>";
	echo "[localtime1] : " . $row[3] ."<br>";
	echo "[data1_min] : " . $row[4] ."<br>";
	echo "[data1_max] : " . $row[5] ."<br>";
	echo "[data2_min] : " . $row[6] ."<br>";
	echo "[data2_max] : " . $row[7] ."<br>";
	echo "[data3_min] : " . $row[8] ."<br>";
	echo "[data3_max] : " . $row[9] ."<br>";
	echo "[data4_min] : " . $row[10] ."<br>";
	echo "[data4_max] : " . $row[11] ."<br>";
	echo "[data5_min] : " . $row[12] ."<br>";
	echo "[data5_max] : " . $row[13] ."<br>";
	echo "[vcComment1] : " . $row[14] ."<br>";
	echo "[vcRevision1] : " . $row[15] ."<br>";
	echo "[vcComment2] : " . $row[16] ."<br>";
	echo "[vcRevision_date1] : " . $row[17] ."<br>";
	echo "[data6_min] : " . $row[18] ."<br>";
	echo "[data6_max] : " . $row[19] ."<br>";
	echo "[data7_min] : " . $row[20] ."<br>";
	echo "[data7_max] : " . $row[21] ."<br>";
	echo "[data8_min] : " . $row[22] ."<br>";
	echo "[data8_max] : " . $row[23] ."<br>";
	echo "[data9_min] : " . $row[24] ."<br>";
	echo "[data9_max] : " . $row[25] ."<br>";
	echo "[data10_min] : " . $row[26] ."<br>";
	echo "[data10_max] : " . $row[27] ."<br>";
	echo "[vcComment3] : " . $row[28] ."<br>";
	echo "[vcRevision2] : " . $row[29] ."<br>";
	echo "[vcComment4] : " . $row[30] ."<br>";
	echo "[vcRevision_date2] : " . $row[31]. "<br><br>";

echo $_POST["vcRevision_date1"];
echo "현재 날짜:".date("Y-m-d")."<br>";
mysqli_close($conn); // 종료

?>

<script type="text/javascript">
		opener.document.location.href="/main/vision check2(jy).php"
		self.close();
	</script>
<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");

$sql= "insert into main_viewer (localtime1, item_id_num, item_num, item_name, mc_code, data1_min, data1_max, data2_min, data2_max, data3_min, data3_max, data4_min, data4_max, data5_min, data5_max, data6_min, data6_max, data7_min, data7_max, data8_min, data8_max, data9_min, data9_max, data10_min, data10_max, shape1_check, shape2_check, shape3_check, acc1, acc2, acc3, vcComment1, vcComment2, customer, vcRevision_date1, vcRevision1) 
		values ('".date("Y-m-d")."', ".$_POST["item_id_num"].", '".$_POST["item_num"]."', '".$_POST["item_name"]."', '".$_POST["mc_code"]."', ".$_POST["data1_min"].", ".$_POST["data1_max"].", ".$_POST["data2_min"].", ".$_POST["data2_max"].", ".$_POST["data3_min"].", ".$_POST["data3_max"].", ".$_POST["data4_min"].", ".$_POST["data4_max"].", ".$_POST["data5_min"].", ".$_POST["data5_max"].", 
					".$_POST["data6_min"].", ".$_POST["data6_max"].", ".$_POST["data7_min"].", ".$_POST["data7_max"].", ".$_POST["data8_min"].", ".$_POST["data8_max"].", ".$_POST["data9_min"].", ".$_POST["data9_max"].", ".$_POST["data10_min"].", ".$_POST["data10_max"].", '".$_POST["shape1_check"]."', '".$_POST["shape2_check"]."', '".$_POST["shape3_check"]."', '".$_POST["acc1"]."', '".$_POST["acc2"]."', '".$_POST["acc3"]."', 
					'".$_POST["vcComment1"]."', '".$_POST["vcComment2"]."', '".$_POST["customer"]."', '".$_POST["vcRevision_date1"]."', ".$_POST["vcRevision1"].")";		//values 뒤에꺼는 필드의 삽입될 값
$res= mysqli_query($conn, $sql);

$sql = "select * from main_viewer order by id desc"; 																							// 문구 보기
$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($res);

	echo "[id] : " . $row[0] ."<br>";
	echo "[item_id_num] : " . $row[1] ."<br>";
	echo "[item_num] : " . $row[2] ."<br>";
	echo "[item_name] : " . $row[3] ."<br>";
	echo "[mc_code] : " . $row[4] ."<br>";
	echo "[localtime1] : " . $row[5] ."<br>";
	echo "[data1_min] : " . $row[6] ."<br>";
	echo "[data1_max] : " . $row[7] ."<br>";
	echo "[data2_min] : " . $row[8] ."<br>";
	echo "[data2_max] : " . $row[9] ."<br>";
	echo "[data3_min] : " . $row[10] ."<br>";
	echo "[data3_max] : " . $row[11] ."<br>";
	echo "[data4_min] : " . $row[12] ."<br>";
	echo "[data4_max] : " . $row[13] ."<br>";
	echo "[data5_min] : " . $row[14] ."<br>";
	echo "[data5_max] : " . $row[15] ."<br>";
	echo "[data6_min] : " . $row[16] ."<br>";
	echo "[data6_max] : " . $row[17] ."<br>";
	echo "[data7_min] : " . $row[18] ."<br>";
	echo "[data7_max] : " . $row[19] ."<br>";
	echo "[data8_min] : " . $row[20] ."<br>";
	echo "[data8_max] : " . $row[21] ."<br>";
	echo "[data9_min] : " . $row[22] ."<br>";
	echo "[data9_max] : " . $row[23] ."<br>";
	echo "[data10_min] : " . $row[24] ."<br>";
	echo "[data10_max] : " . $row[25] ."<br>";
	echo "[shape1_check] : " . $row[26] ."<br>";
	echo "[shape2_check] : " . $row[27] ."<br>";
	echo "[shape3_check] : " . $row[28] ."<br>";
	echo "[acc1] : " . $row[29] ."<br>";
	echo "[acc2] : " . $row[30] ."<br>";
	echo "[acc3] : " . $row[31] ."<br>";
	echo "[vcComment1] : " . $row[32] ."<br>";
	echo "[vcRevision1] : " . $row[33] ."<br>";
	echo "[vcComment2] : " . $row[34] ."<br>";
	echo "[vcRevision_date1] : " . $row[35] ."<br>";
	echo "[customer] : " . $row[36] ."<br><br>";
	
mysqli_close($conn); // 종료

?>

<script type="text/javascript">
		opener.document.location.href="/vision check1(kp).php"
		self.close();
	</script>
<?php

$conn = new mysqli("e-company.co.kr", "server", "00000000", "dataset");
																			//date_count = 210601, ok_count = 32474, ng_total = 27, shape1_ngCount = 18, shape2_ngCount = 5, spc_ngCount = 4
// $sql= "update ng_count set item_indexNum = 2
//  		where id >= 23 ";							//in (31,32)
// $res= mysqli_query($conn, $sql);																										// 필드명 = "$_POST["값"]"

$sql = "select * from ng_count order by id desc"; 																							// 문구 보기
$res = mysqli_query($conn, $sql);

for (;$row = mysqli_fetch_array($res);){

echo "[id] : " . $row[0] ."<br>";
echo "[date_count] : " . $row[1] ."<br>";
echo "[ok_count] : " . $row[2] ."<br>";
echo "[ng_total] : " . $row[3] ."<br>";
echo "[shape1_ngCount] : " . $row[4] ."<br>";
echo "[shape2_ngCount] : " . $row[5] ."<br>";
echo "[spc_ngCount] : " . $row[6] ."<br>";
echo "[acc1] : " . $row[7] ."<br>";
echo "[acc2] : " . $row[8] ."<br>";
echo "[item_indexNum] : " . $row[9] ."<br><br>";
}

mysqli_close($conn); // 종료

?>

<!-- <script>
window.top.close();
</script>        			바로 창 닫기 -->
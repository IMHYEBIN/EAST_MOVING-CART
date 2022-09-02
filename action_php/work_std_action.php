<?php

$conn = new mysqli("e-company.co.kr", "server", "00000000", "dataset");

$sql= "insert into work_standard (localtime2, carType1, itemNo1, itemName1, machineName1, materialName1, materialGrade1, materialColor1, nozzle1, sHeater1, sHeater2, sHeater3, sHeater4, nozzle2, 
		wHeater1, wHeater2, wHeater3, wHeater4, sMoldTemper1, wMoldTemper1, sMoldTemper2, wMoldTemper2, sIPressure1, sIPressure2, sIPressure3, sIPressure4, sIPressure5, wIPressure1, wIPressure2, wIPressure3, 
		wIPressure4, wIPressure5, sISpeed1, sISpeed2, sISpeed3, sISpeed4, sISpeed5, wISpeed1, wISpeed2, wISpeed3, wISpeed4, wISpeed5, sIPosition1, sIPosition2, sIPosition3, sIPosition4, sIPosition5, 
		wIPosition1, wIPosition2, wIPosition3, wIPosition4, wIPosition5, sGuidePressure1, sGuidePressure2, sGuidePressure3, sGuidePressure4, sGuidePressure5, wGuidePressure1, wGuidePressure2, wGuidePressure3, 
		wGuidePressure4, wGuidePressure5, sGuideSpeed1, sGuideSpeed2, sGuideSpeed3, sGuideSpeed4, sGuideSpeed5, wGuideSpeed1, wGuideSpeed2, wGuideSpeed3, wGuideSpeed4, wGuideSpeed5, dryTime2, dryTemp2, meterage1, 
		cushion1, injectionTime1, guideTime1, dryTemp1, dryTime1, moldPreHeat1, moldPreHeat2, preShot1, revision1, revisionDate1, revisionReason1) 
		values ('".date("Y-m-d")."', '".$_POST["carType1"]."', '".$_POST["itemNo1"]."', '".$_POST["itemName1"]."', '".$_POST["machineName1"]."', '".$_POST["materialName1"]."', '".$_POST["materialGrade1"]."', '".$_POST["materialColor1"]."', 
		".$_POST["nozzle1"].", ".$_POST["sHeater1"].", ".$_POST["sHeater2"].", ".$_POST["sHeater3"].", ".$_POST["sHeater4"].", ".$_POST["nozzle2"].", ".$_POST["wHeater1"].", ".$_POST["wHeater2"].", ".$_POST["wHeater3"].", ".$_POST["wHeater4"].", 
		".$_POST["sMoldTemper1"].", ".$_POST["wMoldTemper1"].", ".$_POST["sMoldTemper2"].", ".$_POST["wMoldTemper2"].", ".$_POST["sIPressure1"].", ".$_POST["sIPressure2"].", ".$_POST["sIPressure3"].", ".$_POST["sIPressure4"].", ".$_POST["sIPressure5"].", 
		".$_POST["wIPressure1"].", ".$_POST["wIPressure2"].", ".$_POST["wIPressure3"].", ".$_POST["wIPressure4"].", ".$_POST["wIPressure5"].", ".$_POST["sISpeed1"].", ".$_POST["sISpeed2"].", ".$_POST["sISpeed3"].", ".$_POST["sISpeed4"].", ".$_POST["sISpeed5"].", 
		".$_POST["wISpeed1"].", ".$_POST["wISpeed2"].", ".$_POST["wISpeed3"].", ".$_POST["wISpeed4"].", ".$_POST["wISpeed5"].", ".$_POST["sIPosition1"].", ".$_POST["sIPosition2"].", ".$_POST["sIPosition3"].", ".$_POST["sIPosition4"].", ".$_POST["sIPosition5"].", 
		".$_POST["wIPosition1"].", ".$_POST["wIPosition2"].", ".$_POST["wIPosition3"].", ".$_POST["wIPosition4"].", ".$_POST["wIPosition5"].", ".$_POST["sGuidePressure1"].", ".$_POST["sGuidePressure2"].", ".$_POST["sGuidePressure3"].", ".$_POST["sGuidePressure4"].", 
		".$_POST["sGuidePressure5"].", ".$_POST["wGuidePressure1"].", ".$_POST["wGuidePressure2"].", ".$_POST["wGuidePressure3"].", ".$_POST["wGuidePressure4"].", ".$_POST["wGuidePressure5"].", ".$_POST["sGuideSpeed1"].", ".$_POST["sGuideSpeed2"].", 
		".$_POST["sGuideSpeed3"].", ".$_POST["sGuideSpeed4"].", ".$_POST["sGuideSpeed5"].", ".$_POST["wGuideSpeed1"].", ".$_POST["wGuideSpeed2"].", ".$_POST["wGuideSpeed3"].", ".$_POST["wGuideSpeed4"].", ".$_POST["wGuideSpeed5"].", ".$_POST["dryTime2"].", ".$_POST["dryTemp2"].", ".$_POST["meterage1"].", 
		".$_POST["cushion1"].", ".$_POST["injectionTime1"].", ".$_POST["guideTime1"].", ".$_POST["dryTemp1"].", ".$_POST["dryTime1"].", ".$_POST["moldPreHeat1"].", ".$_POST["moldPreHeat2"].", ".$_POST["preShot1"].", 
		'".$_POST["revision1"]."', '".$_POST["revisionDate1"]."', '".$_POST["revisionReason1"]."')";		//values 뒤에꺼는 필드의 삽입될 값
$res= mysqli_query($conn, $sql);

$sql = "select * from work_standard order by id desc"; 																							// 문구 보기
$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($res);

	echo "[id] : " . $row[0] ."<br>";
	echo "[localtime2] : " . $row[1] ."<br>";
	echo "[carType1] : " . $row[2] ."<br>";
	echo "[itemNo1] : " . $row[3] ."<br>";
	echo "[itemName1] : " . $row[4] ."<br>";
	echo "[machineName1] : " . $row[5] ."<br>";
	echo "[materialName1] : " . $row[6] ."<br>";
	echo "[materialGrade1] : " . $row[7] ."<br>";
	echo "[materialColor1] : " . $row[8] ."<br>";
	echo "[nozzle1] : " . $row[9] ."<br>";
	echo "[sHeater1] : " . $row[10] ."<br>";
	echo "[sHeater2] : " . $row[11] ."<br>";
	echo "[sHeater3] : " . $row[12] ."<br>";
	echo "[sHeater4] : " . $row[13] ."<br>";
	echo "[nozzle2] : " . $row[14] ."<br>";
	echo "[wHeater1] : " . $row[15] ."<br>";
	echo "[wHeater2] : " . $row[16] ."<br>";
	echo "[wHeater3] : " . $row[17] ."<br>";
	echo "[wHeater4] : " . $row[18] ."<br>";
	echo "[sMoldTemper1] : " . $row[19] ."<br>";
	echo "[wMoldTemper1] : " . $row[20] ."<br>";
	echo "[sMoldTemper2] : " . $row[21] ."<br>";
	echo "[wMoldTemper2] : " . $row[22] ."<br>";
	echo "[sIPressure1] : " . $row[23] ."<br>";
	echo "[sIPressure2] : " . $row[24] ."<br>";
	echo "[sIPressure3] : " . $row[25] ."<br>";
	echo "[sIPressure4] : " . $row[26] ."<br>";
	echo "[sIPressure5] : " . $row[27] ."<br>";
	echo "[wIPressure1] : " . $row[28] ."<br>";
	echo "[wIPressure2] : " . $row[29] ."<br>";
	echo "[wIPressure3] : " . $row[30] ."<br>";
	echo "[wIPressure4] : " . $row[31]. "<br>";
	echo "[wIPressure5] : " . $row[32]. "<br>";
	echo "[sISpeed1] : " . $row[33]. "<br>";
	echo "[sISpeed2] : " . $row[34]. "<br>";
	echo "[sISpeed3] : " . $row[35]. "<br>";
	echo "[sISpeed4] : " . $row[36]. "<br>";
	echo "[sISpeed5] : " . $row[37]. "<br>";
	echo "[wISpeed1] : " . $row[38]. "<br>";
	echo "[wISpeed2] : " . $row[39]. "<br>";
	echo "[wISpeed3] : " . $row[40]. "<br>";
	echo "[wISpeed4] : " . $row[41]. "<br>";
	echo "[wISpeed5] : " . $row[42]. "<br>";
	echo "[sIPosition1] : " . $row[43]. "<br>";
	echo "[sIPosition2] : " . $row[44]. "<br>";
	echo "[sIPosition3] : " . $row[45]. "<br>";
	echo "[sIPosition4] : " . $row[46]. "<br>";
	echo "[sIPosition5] : " . $row[47]. "<br>";
	echo "[wIPosition1] : " . $row[48]. "<br>";
	echo "[wIPosition2] : " . $row[49]. "<br>";
	echo "[wIPosition3] : " . $row[50]. "<br>";
	echo "[wIPosition4] : " . $row[51]. "<br>";
	echo "[wIPosition5] : " . $row[52]. "<br>";
	echo "[sGuidePressure1] : " . $row[53]. "<br>";
	echo "[sGuidePressure2] : " . $row[54]. "<br>";
	echo "[sGuidePressure3] : " . $row[55]. "<br>";
	echo "[sGuidePressure4] : " . $row[56]. "<br>";
	echo "[sGuidePressure5] : " . $row[57]. "<br>";
	echo "[wGuidePressure1] : " . $row[58]. "<br>";
	echo "[wGuidePressure2] : " . $row[59]. "<br>";
	echo "[wGuidePressure3] : " . $row[60]. "<br>";
	echo "[wGuidePressure4] : " . $row[61]. "<br>";
	echo "[wGuidePressure5] : " . $row[62]. "<br>";
	echo "[sGuideSpeed1] : " . $row[63]. "<br>";
	echo "[sGuideSpeed2] : " . $row[64]. "<br>";
	echo "[sGuideSpeed3] : " . $row[65]. "<br>";
	echo "[sGuideSpeed4] : " . $row[66]. "<br>";
	echo "[sGuideSpeed5] : " . $row[67]. "<br>";
	echo "[wGuideSpeed1] : " . $row[68]. "<br>";
	echo "[wGuideSpeed2] : " . $row[69]. "<br>";
	echo "[wGuideSpeed3] : " . $row[70]. "<br>";
	echo "[wGuideSpeed4] : " . $row[71]. "<br>";
	echo "[wGuideSpeed5] : " . $row[72]. "<br>";
	echo "[dryTime2] : " . $row[73]. "<br>";
	echo "[dryTemp2] : " . $row[74]. "<br>";
	echo "[meterage1] : " . $row[75]. "<br>";
	echo "[cushion1] : " . $row[76]. "<br>";
	echo "[injectionTime1] : " . $row[77]. "<br>";
	echo "[guideTime1] : " . $row[78]. "<br>";
	echo "[dryTemp1] : " . $row[79]. "<br>";
	echo "[drytime1] : " . $row[80]. "<br>";
	echo "[moldPreHeat1] : " . $row[81]. "<br>";
	echo "[moldPreHeat2] : " . $row[82]. "<br>";
	echo "[preShot1] : " . $row[83]. "<br>";
	echo "[revision1] : " . $row[84]. "<br>";
	echo "[revisionDate1] : " . $row[85]. "<br>";
	echo "[revisionReason1] : " . $row[86]. "<br>";
	
echo $_POST["Revision_date1"];
echo "현재 날짜:".date("Y-m-d")."<br>";
mysqli_close($conn); // 종료

?>

<script type="text/javascript">
		opener.document.location.href="/Injection Setting.php"
		self.close();
	</script>
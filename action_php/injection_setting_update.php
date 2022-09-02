<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");

$sql= "update work_std set localtime2 = '".date("Y-m-d")."', carType1 = '".$_POST["carType1"]."', item_index_no = '".$_POST["item_index_no"]."', itemNo1 = '".$_POST["itemNo1"]."', itemName1 = '".$_POST["itemName1"]."', machineName1 = '".$_POST["machineName1"]."', 
											materialName1 = '".$_POST["materialName1"]."', materialGrade1 = '".$_POST["materialGrade1"]."', materialColor1 = '".$_POST["materialColor1"]."', 
											nozzle1 = ".$_POST["nozzle1"].", sHeater1 = ".$_POST["sHeater1"].", sHeater2 = ".$_POST["sHeater2"].", sHeater3 = ".$_POST["sHeater3"].", sHeater4 = ".$_POST["sHeater4"].", 
											nozzle2 = ".$_POST["nozzle2"].", wHeater1 = ".$_POST["wHeater1"].", wHeater2 = ".$_POST["wHeater2"].", wHeater3 = ".$_POST["wHeater3"].", wHeater4 = ".$_POST["wHeater4"].", 
											sMoldTemper1 = ".$_POST["sMoldTemper1"].", sMoldTemper2 =".$_POST["sMoldTemper2"].", wMoldTemper1 = ".$_POST["wMoldTemper1"].", wMoldTemper2 = ".$_POST["wMoldTemper2"].", 
											sIPressure1 = ".$_POST["sIPressure1"].", sIPressure2 = ".$_POST["sIPressure2"].", sIPressure3 = ".$_POST["sIPressure3"].", sIPressure4 = ".$_POST["sIPressure4"].", sIPressure5 = ".$_POST["sIPressure5"].", 
											wIPressure1 = ".$_POST["wIPressure1"].", wIPressure2 = ".$_POST["wIPressure2"].", wIPressure3 = ".$_POST["wIPressure3"].", wIPressure4 = ".$_POST["wIPressure4"].", wIPressure5 = ".$_POST["wIPressure5"].", 
											sISpeed1 = ".$_POST["sISpeed1"].", sISpeed2 = ".$_POST["sISpeed2"].", sISpeed3 = ".$_POST["sISpeed3"].", sISpeed4 = ".$_POST["sISpeed4"].", sISpeed5 = ".$_POST["sISpeed5"].", 
											wISpeed1 = ".$_POST["wISpeed1"].", wISpeed2 = ".$_POST["wISpeed2"].", wISpeed3 = ".$_POST["wISpeed3"].", wISpeed4 = ".$_POST["wISpeed4"].", wISpeed5 = ".$_POST["wISpeed5"].", 
											sIPosition1 = ".$_POST["sIPosition1"].", sIPosition2 = ".$_POST["sIPosition2"].", sIPosition3 = ".$_POST["sIPosition3"].", sIPosition4 = ".$_POST["sIPosition4"].", sIPosition5 = ".$_POST["sIPosition5"].", 
											wIPosition1 = ".$_POST["wIPosition1"].", wIPosition2 = ".$_POST["wIPosition2"].", wIPosition3 = ".$_POST["wIPosition3"].", wIPosition4 = ".$_POST["wIPosition4"].", wIPosition5 = ".$_POST["wIPosition5"].", 
											sGuidePressure1 = ".$_POST["sGuidePressure1"].", sGuidePressure2 = ".$_POST["sGuidePressure2"].", sGuidePressure3 = ".$_POST["sGuidePressure3"].", sGuidePressure4 = ".$_POST["sGuidePressure4"].", sGuidePressure5 = ".$_POST["sGuidePressure5"].", 
											wGuidePressure1 = ".$_POST["wGuidePressure1"].", wGuidePressure2 = ".$_POST["wGuidePressure2"].", wGuidePressure3 = ".$_POST["wGuidePressure3"].", wGuidePressure4 = ".$_POST["wGuidePressure4"].", wGuidePressure5 = ".$_POST["wGuidePressure5"].", 
											sGuideSpeed1 = ".$_POST["sGuideSpeed1"].", sGuideSpeed2 = ".$_POST["sGuideSpeed2"].", sGuideSpeed3 = ".$_POST["sGuideSpeed3"].", sGuideSpeed4 = ".$_POST["sGuideSpeed4"].", sGuideSpeed5 = ".$_POST["sGuideSpeed5"].", 
											wGuideSpeed1 = ".$_POST["wGuideSpeed1"].", wGuideSpeed2 = ".$_POST["wGuideSpeed2"].", wGuideSpeed3 = ".$_POST["wGuideSpeed3"].", wGuideSpeed4 = ".$_POST["wGuideSpeed4"].", wGuideSpeed5 = ".$_POST["wGuideSpeed5"].", 
											dryTime2 = ".$_POST["dryTime2"].", dryTemp2 = ".$_POST["dryTemp2"].", meterage1 = ".$_POST["meterage1"].", cushion1 = ".$_POST["cushion1"].", injectionTime1 = ".$_POST["injectionTime1"].", guideTime1 = ".$_POST["guideTime1"].",
											dryTemp1 = ".$_POST["dryTemp1"].", dryTime1 = ".$_POST["dryTime1"].", moldPreHeat1 = ".$_POST["moldPreHeat1"].", moldPreHeat2 = ".$_POST["moldPreHeat2"].", preShot1 = ".$_POST["preShot1"]."
		where id=".$_POST["correctMatch"];
$res= mysqli_query($conn, $sql);																										// 필드명 = "$_POST["값"]"

$sql = "select * from work_std order by id desc"; 																							// 문구 보기
$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($res);

echo "[id] : " . $row[0] ."<br>";
echo "[localtime2] : " . $row[1] ."<br>";
echo "[carType1] : " . $row[2] ."<br>";
echo "[item_index_no] : " . $row[3] ."<br>";
echo "[itemNo1] : " . $row[4] ."<br>";
echo "[itemName1] : " . $row[5] ."<br>";
echo "[machineName1] : " . $row[6] ."<br>";
echo "[materialName1] : " . $row[7] ."<br>";
echo "[materialGrade1] : " . $row[8] ."<br>";
echo "[materialColor1] : " . $row[9] ."<br>";
echo "[nozzle1] : " . $row[10] ."<br>";
echo "[sHeater1] : " . $row[11] ."<br>";
echo "[sHeater2] : " . $row[12] ."<br>";
echo "[sHeater3] : " . $row[13] ."<br>";
echo "[sHeater4] : " . $row[14] ."<br>";
echo "[nozzle2] : " . $row[15] ."<br>";
echo "[wHeater1] : " . $row[16] ."<br>";
echo "[wHeater2] : " . $row[17] ."<br>";
echo "[wHeater3] : " . $row[18] ."<br>";
echo "[wHeater4] : " . $row[19] ."<br>";
echo "[sMoldTemper1] : " . $row[20] ."<br>";
echo "[wMoldTemper1] : " . $row[21] ."<br>";
echo "[sMoldTemper2] : " . $row[22] ."<br>";
echo "[wMoldTemper2] : " . $row[23] ."<br>";
echo "[sIPressure1] : " . $row[24] ."<br>";
echo "[sIPressure2] : " . $row[25] ."<br>";
echo "[sIPressure3] : " . $row[26] ."<br>";
echo "[sIPressure4] : " . $row[27] ."<br>";
echo "[sIPressure5] : " . $row[28] ."<br>";
echo "[wIPressure1] : " . $row[29] ."<br>";
echo "[wIPressure2] : " . $row[30] ."<br>";
echo "[wIPressure3] : " . $row[31] ."<br>";
echo "[wIPressure4] : " . $row[32]. "<br>";
echo "[wIPressure5] : " . $row[33]. "<br>";
echo "[sISpeed1] : " . $row[34]. "<br>";
echo "[sISpeed2] : " . $row[35]. "<br>";
echo "[sISpeed3] : " . $row[36]. "<br>";
echo "[sISpeed4] : " . $row[37]. "<br>";
echo "[sISpeed5] : " . $row[38]. "<br>";
echo "[wISpeed1] : " . $row[39]. "<br>";
echo "[wISpeed2] : " . $row[40]. "<br>";
echo "[wISpeed3] : " . $row[41]. "<br>";
echo "[wISpeed4] : " . $row[42]. "<br>";
echo "[wISpeed5] : " . $row[43]. "<br>";
echo "[sIPosition1] : " . $row[44]. "<br>";
echo "[sIPosition2] : " . $row[45]. "<br>";
echo "[sIPosition3] : " . $row[46]. "<br>";
echo "[sIPosition4] : " . $row[47]. "<br>";
echo "[sIPosition5] : " . $row[48]. "<br>";
echo "[wIPosition1] : " . $row[49]. "<br>";
echo "[wIPosition2] : " . $row[50]. "<br>";
echo "[wIPosition3] : " . $row[51]. "<br>";
echo "[wIPosition4] : " . $row[52]. "<br>";
echo "[wIPosition5] : " . $row[53]. "<br>";
echo "[sGuidePressure1] : " . $row[54]. "<br>";
echo "[sGuidePressure2] : " . $row[55]. "<br>";
echo "[sGuidePressure3] : " . $row[56]. "<br>";
echo "[sGuidePressure4] : " . $row[57]. "<br>";
echo "[sGuidePressure5] : " . $row[58]. "<br>";
echo "[wGuidePressure1] : " . $row[59]. "<br>";
echo "[wGuidePressure2] : " . $row[60]. "<br>";
echo "[wGuidePressure3] : " . $row[61]. "<br>";
echo "[wGuidePressure4] : " . $row[62]. "<br>";
echo "[wGuidePressure5] : " . $row[63]. "<br>";
echo "[sGuideSpeed1] : " . $row[64]. "<br>";
echo "[sGuideSpeed2] : " . $row[65]. "<br>";
echo "[sGuideSpeed3] : " . $row[66]. "<br>";
echo "[sGuideSpeed4] : " . $row[67]. "<br>";
echo "[sGuideSpeed5] : " . $row[68]. "<br>";
echo "[wGuideSpeed1] : " . $row[69]. "<br>";
echo "[wGuideSpeed2] : " . $row[70]. "<br>";
echo "[wGuideSpeed3] : " . $row[71]. "<br>";
echo "[wGuideSpeed4] : " . $row[72]. "<br>";
echo "[wGuideSpeed5] : " . $row[73]. "<br>";
echo "[dryTime2] : " . $row[74]. "<br>";
echo "[dryTemp2] : " . $row[75]. "<br>";
echo "[meterage1] : " . $row[76]. "<br>";
echo "[cushion1] : " . $row[77]. "<br>";
echo "[injectionTime1] : " . $row[78]. "<br>";
echo "[guideTime1] : " . $row[79]. "<br>";
echo "[dryTemp1] : " . $row[80]. "<br>";
echo "[drytime1] : " . $row[81]. "<br>";
echo "[moldPreHeat1] : " . $row[82]. "<br>";
echo "[moldPreHeat2] : " . $row[83]. "<br>";
echo "[preShot1] : " . $row[84]. "<br>";
echo "[revision1] : " . $row[85]. "<br>";
echo "[revisionDate1] : " . $row[86]. "<br>";
echo "[revisionReason1] : " . $row[87]. "<br>";
echo "[acc1] : " . $row[88]. "<br>";
echo "[acc2] : " . $row[89]. "<br>";
echo "[acc3] : " . $row[90]. "<br><br>";

mysqli_close($conn); // 종료

?>

<!-- 바로 창 닫기 -->
<script>
window.top.close();
</script>
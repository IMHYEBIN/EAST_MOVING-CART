<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");

$sql1 = "select * from main_viewer where item_id_num = 1 order by id desc limit 3"; 		// 문구 보기
$res1 = mysqli_query($conn, $sql1);

$row1 = mysqli_fetch_array($res1);


$item_id_num = $row1[1];
$item_num = $row1[2];
$item_name = $row1[3];					//검사 호기
$mc_code = $row1[4];				//회사 코드명
$localtime1 = $row1[5];				//저장한 일자 정보 기록
$data1_min = $row1[6];			$data1_max = $row1[7];
$data2_min = $row1[8];			$data2_max = $row1[9];
$data3_min = $row1[10];			$data3_max = $row1[11];
$data4_min = $row1[12];			$data4_max = $row1[13];
$data5_min = $row1[14];			$data5_max = $row1[15];
$data6_min = $row1[16];			$data6_max = $row1[17];
$data7_min = $row1[18];			$data7_max = $row1[19];
$data8_min = $row1[20];			$data8_max = $row1[21];
$data9_min = $row1[22];			$data9_max = $row1[23];
$data10_min = $row1[24];		$data10_max = $row1[25];					//여기까지  1분할 화면 치수 정보
$shape1_check = $row1[26];
$shape2_check = $row1[27];
$shape3_check = $row1[28];
$processNG = $row1[29];
$package = $row1[30];
$acc3 = $row1[31];
$vcComment1 = $row1[32];			//지시/전달 사항 기재
$vcRevision1 = $row1[33];			//개정번호
$vcComment2 = $row1[34];			//개정내용
$vcRevision_date1 = $row1[35];		//개정일자
$customer = $row1[36];				//고객정보

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/table2.css" rel="stylesheet" type="text/css">
    <title>검사기준</title>
</head>
<body>
<form method="post" action="..\main_viewer1(insert).php" target="_blank">
    <input type="hidden" name="item_id_num" value="1">
    <input type="hidden" name="localtime1" id="localtime1" value="<?php echo date('Y-m-d'); ?>">
    <input type="hidden" name="acc3" value="0">
<table>
    <tr>
        <th colspan="6" bgcolor="#CEF279"><span class="accent">검사기준</span></th>
    </tr>
    <tr>
        <td colspan="2" bgcolor="FAED7D" style="width:150px"><span class="strong">검사기명</span></td>
        <td colspan="4" style="width:300px"><input type="text" name="mc_code" value="<?php echo $mc_code; ?>"></td>
    </tr>
    <tr>
        <td colspan="2" bgcolor="#FAED7D"><span class="strong">고객사</span></td>
	    <td colspan="4"><input type="text" name="customer" value="<?php echo $customer; ?>" required></td>
    </tr>
    <tr>
        <td colspan="2" bgcolor="#FAED7D"><span class="strong">품 번</span></td>
	    <td colspan="4"><input type="text" name="item_num" value="<?php echo $item_num; ?>" required></td>
    </tr>
    <tr>
        <td colspan="2" bgcolor="#FAED7D"><span class="strong">품 명</span></td>
		<td colspan="4"><input type="text" name="item_name" value="<?php echo $item_name; ?>" required></td>
    </tr>
    <tr>
        <td colspan="6" style="height:5px"></td>
    </tr>
    <tr>
        <td colspan="6" bgcolor="#BCE067"><span class="strong">치수정보</span></td>
    </tr>
    
    <tr>
        <td colspan="2" bgcolor="#FFFFA1"><span class="strong">SPC 1</span></td>
        <td colspan="4"><input type="text" size="3" name="data1_min" value="<?php echo $data1_min; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm ~ 
                        <input type="text" size="3" name="data1_max" value="<?php echo $data1_max; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm</td>
    </tr>
    <tr>
        <td colspan="2" bgcolor="#FFFFA1"><span class="strong">SPC 2</span></td>
        <td colspan="4"><input type="text" size="3" name="data2_min" value="<?php echo $data2_min; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm ~
                        <input type="text" size="3" name="data2_max" value="<?php echo $data2_max; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm</td>
    </tr>
    </tr>
	<tr>
		<td colspan="2" bgcolor="#FFFFA1"><span class="strong">SPC 3</span></td>
		<td colspan="4"><input type="text" size="3" name="data3_min" value="<?php echo $data3_min; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm ~ 
                        <input type="text" size="3" name="data3_max" value="<?php echo $data3_max; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm</td>		<!--검사 기준치 minSpec3 ~ maxSpec3 단위= mm -->
		
	</tr>
	<tr>
		<td colspan="2" bgcolor="#FFFFA1"><span class="strong">SPC 4</span></td>
		<td colspan="4"><input type="text" size="3" name="data4_min" value="<?php echo $data4_min; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm ~
                        <input type="text" size="3" name="data4_max" value="<?php echo $data4_max; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm</td>		<!--검사 기준치 minSpec4 ~ maxSpec4 단위= mm -->
	</tr>
	<tr>
		<td colspan="2" bgcolor="#FFFFA1"><span class="strong">SPC 5</span></td>
		<td colspan="4"><input type="text" size="3" name="data5_min" value="<?php echo $data5_min; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm ~ 
                        <input type="text" size="3" name="data5_max" value="<?php echo $data5_max; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm</td>		<!--검사 기준치 minSpec5 ~ maxSpec5 단위= mm -->
	</tr>
	<tr>
		<td colspan="2" bgcolor="#FFFFA1"><span class="strong">SPC 6</span></td>
		<td colspan="4"><input type="text" size="3" name="data6_min" value="<?php echo $data6_min; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm ~ 
                        <input type="text" size="3" name="data6_max" value="<?php echo $data6_max; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm</td>		<!--검사 기준치 minSpec6 ~ maxSpec6 단위= mm -->
	</tr>
	<tr>
		<td colspan="2" bgcolor="#FFFFA1"><span class="strong">SPC 7</span></td>
		<td colspan="4"><input type="text" size="3" name="data7_min" value="<?php echo $data7_min; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm ~ 
                        <input type="text" size="3" name="data7_max" value="<?php echo $data7_max; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm</td>		<!--검사 기준치 minSpec7 ~ maxSpec7 단위= mm -->
	</tr>
    <tr>
		<td colspan="2" bgcolor="#FFFFA1"><span class="strong">SPC 8</span></td>
		<td colspan="4"><input type="text" size="3" name="data8_min" value="<?php echo $data8_min; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm ~ 
                        <input type="text" size="3" name="data8_max" value="<?php echo $data8_max; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm</td>		<!--검사 기준치 minSpec8 ~ maxSpec8 단위= mm -->
	</tr>
    <tr>
		<td colspan="2" bgcolor="#FFFFA1"><span class="strong">SPC 9</span></td>
		<td colspan="4"><input type="text" size="3" name="data9_min" value="<?php echo $data9_min; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm ~ 
                        <input type="text" size="3" name="data9_max" value="<?php echo $data9_max; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm</td>		<!--검사 기준치 minSpec9 ~ maxSpec9 단위= mm -->
	</tr>
    <tr>
		<td colspan="2" bgcolor="#FFFFA1"><span class="strong">SPC 10</span></td>
		<td colspan="4"><input type="text" size="3" name="data10_min" value="<?php echo $data10_min; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm ~ 
                        <input type="text" size="3" name="data10_max" value="<?php echo $data10_max; ?>" oninvalid="this.setCustomValidity('해당 치수가 없을 시 0이라도 입력 하여주세요!')" oninput="setCustomValidity('')" required> mm</td>		<!--검사 기준치 minSpec10 ~ maxSpec10 단위= mm -->
	</tr>
    <tr>
        <td colspan="6" style="height:5px"></td>
    </tr>
    <tr>
        <td colspan="6" bgcolor="#BCE067"><span class="strong">기타 정보</span></td>
    </tr>
    <tr>
        <td colspan="2" bgcolor="#FFFFA1"><span class="strong">부적합품 처리</span></td>
        <td colspan="4"><input type="text" size="30" name="acc1" value="<?php echo $processNG; ?>" placeholder="부적합품 처리 규정 기재"></td>
    </tr>
    <tr>
        <td colspan="2" bgcolor="#FFFFA1"><span class="strong">포장 사양</span></td>
        <td colspan="4"><input type="text" size="30" name="acc2" value="<?php echo $package; ?>" placeholder="포장 사양 기재"></td>
    </tr>
    <tr>
        <th colspan="2" bgcolor="#FFFFA1"><span class="strong">지시 / 전달사항</th>
        <td colspan="4" class="input_header_td"><textarea id="memo" cols="28" rows="8" name="vcComment1" placeholder="지시/전달 사항이 있다면 여기에..."><?php echo $row[14]; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="6" style="height:5px"></td>
    </tr>
    <tr>
        <td colspan="2" bgcolor="#BCE067"><span class="strong">개정번호</span></td>
        <td colspan="2" bgcolor="#BCE067"><span class="strong">개정내용</span></td>
	    <td colspan="2" bgcolor="#BCE067"><span class="strong">개정일자</span></td>
    </tr>
    <tr>
        <td colspan="2"><input type="text" size="4" name="vcRevision1" value="<?php echo $vcRevision1+1; ?>"></td>
        <td colspan="2"><input type="text" size="20" name="vcComment2" placeholder="간단한 개정내용 15자 내외" oninvalid="this.setCustomValidity('간단한 내용을 입력하여 주세요!')" oninput="setCustomValidity('')" required></td>	
        <td colspan="2"><input type="date" name="vcRevision_date1" oninvalid="this.setCustomValidity('일자는 필수 입력 사항입니다!!')" oninput="setCustomValidity('')" required></td>
    </tr>

    </table>
    <div style="width: 880px; height: 150px; position:relative;">
        <input type="submit" align="left" value="저장하기"><input type="button" value="닫기" onclick="window.close()">
    </div>
    </form>
</body>
</html>
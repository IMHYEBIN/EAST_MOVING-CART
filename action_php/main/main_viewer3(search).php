<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");

$sql1 = "select * from main_viewer where item_id_num = 3 order by id desc limit 3"; 																							// 문구 보기
$res1 = mysqli_query($conn, $sql1);

$row1 = mysqli_fetch_array($res1);

$item_id_num = $row1[1];
$item_num = $row1[2];
$item_name = $row1[3];					//검사 호기
$mc_code = $row1[4];					//회사 코드명
$localtime1 = $row1[5];					//저장한 일자 정보 기록
$data1_min = $row1[6];
$data1_max = $row1[7];
$data2_min = $row1[8];
$data2_max = $row1[9];
$data3_min = $row1[10];
$data3_max = $row1[11];
$data4_min = $row1[12];
$data4_max = $row1[13];
$data5_min = $row1[14];
$data5_max = $row1[15];
$data6_min = $row1[16];
$data6_max = $row1[17];
$data7_min = $row1[18];
$data7_max = $row1[19];
$data8_min = $row1[20];
$data8_max = $row1[21];
$data9_min = $row1[22];
$data9_max = $row1[23];
$data10_min = $row1[24];
$data10_max = $row1[25];
//여기까지  1분할 화면 치수 정보 
$shape1_check = $row1[26];
$shape2_check = $row1[27];
$shape3_check = $row1[28];
$processNG = $row1[29];
$package = $row1[30];
$acc1 = $row1[31];
$vcComment1 = $row1[32];			//지시/전달 사항 기재
$vcRevision1 = $row1[33];			//개정번호
$vcComment2 = $row1[34];			//개정내용
$vcRevision_date1 = $row1[35];		//개정일자
$customer = $row1[36];				//고객정보

$row1 = mysqli_fetch_array($res1);

$vcRevision1_1 = $row1[33];			//개정번호
$vcComment2_1 = $row1[34];			//개정내용
$vcRevision_date1_1 = $row1[35];	//개정일자  횡한부분 빈칸 채워넣기

$row1 = mysqli_fetch_array($res1);

$vcRevision1_2 = $row1[33];			//개정번호
$vcComment2_2 = $row1[34];			//개정내용
$vcRevision_date1_2 = $row1[35];	//개정일자  횡한부분 빈칸 채워넣기


//여기까지 치수 정보data

$sql2 = "select * from count1 order by id desc limit 1";
$res2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($res2);

$okcount = $row2[8];

$ngcount = $row2[9];

$sumcount = $okcount + $ngcount;
//메인 카운트

$sql3 = "select * from result1 order by id desc";
$res3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_array($res3);

$cycleTime = $row3[22];  	    //cycleTime

$result001 = 0;					//미성형 검사 1항목
$result002 = 0;					//미성형 검사 2항목
$result003 = $row3[9];			//치수검사 1항목
$result004 = $row3[10];			//치수검사 2항목
$result005 = $row3[11];			//치수검사 3항목
$result006 = $row3[12];			//치수검사 4항목
$result007 = $row3[13];			//치수검사 5항목
$result008 = $row3[14];			//치수검사 6항목
$result009 = $row3[15];			//치수검사 7항목
$result010 = $row3[16];			//치수검사 8항목
//검사 결과값

$sql4 = "select * from controll1 order by id asc limit 1";
$res4 = mysqli_query($conn, $sql4);
$row4 = mysqli_fetch_array($res4);

$photo = $row4[4];											// 사진 경로 고정 값

?>

<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<title>main checker</title>
	<link href="/css/분할 화면 스타일3.css" rel="stylesheet" type="text/css">
</head>

<body>
	<section>
		<div style="float:left; padding-left: 340px; width: 1200px; height: 50px; position:relative;">
			<h3><span class="accent">생산 수량:</span> <?php echo number_format($sumcount, 0); ?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<span class="greentext">양품 수량:</span> <?php echo number_format($okcount, 0); ?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<span class="redtext">불량수량:</span> <?php echo number_format($ngcount, 0); ?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<span class="accenttext">Cycle Time:</span> <?php echo number_format($cycleTime, 0); ?>&emsp;&emsp;&emsp;&emsp;&emsp;
				<input type="button" value="검사기준 입력하기" onclick="window.open('/action_php/main/insert_inspection3.php')">
			</h3>
		</div>
		<div style="float:right; padding-right:610px;">
			<select id="item_id_num" onchange="location.href=this.value">
				<!-- 각 개별 이동 명령 value 말고는 다른거 사용이 안됨 -->
				<option value="/action_php/main/main_viewer0(search).php">선택</option> <!-- 각 개별 이동 -->
				<option value="/action_php/main/main_viewer0(search).php">0) LCA</option>
				<option value="/action_php/main/main_viewer1(search).php">1) UCA</option>
				<option value="/action_php/main/main_viewer2(search).php">2) RADIUS</option>
				<option value="/action_php/main/main_viewer3(search).php">3) item 4</option>
			</select>
		</div>
		<!-- 1번째 분활 화면 시작 -->
		<section style="float:left;">
			<table width="1910px">
				<thead>
					<tr>
						<td colspan="10" rowspan="17">
							<img src="http://localhost:8080/img/<?php echo $photo; ?>" width="820px" height="450px">
						</td>
						<!--검사 화면1-->
						<th colspan="6" bgcolor="#C4DEFF"><span class="accent">검사기준</span></th>
					</tr>
					<tr>
						<td colspan="2" bgcolor="#EBF7FF"><span class="strong">검사기명</span></td>
						<td colspan="4"><?php echo $mc_code; ?></td>
						<!--검사기명 call or fix-->
					</tr>
					<tr>
						<td colspan="2" bgcolor="#EBF7FF"><span class="strong">고객사</span></td>
						<td colspan="4"><?php echo $customer; ?></td>
						<!--고객사명 call or fix-->
					</tr>
					<tr>
						<td colspan="2" bgcolor="#EBF7FF"><span class="strong">품 번</span></td>
						<td colspan="4"><?php echo $item_num; ?></td>
						<!--품번 call or fix-->
					</tr>
					<tr>
						<td colspan="2" bgcolor="#EBF7FF"><span class="strong">품 명</span></td>
						<td colspan="4"><?php echo $item_name; ?></td>
						<!--품명 call or fix-->
					</tr>
					<tr>
						<td colspan="6" bgcolor="#C4DEFF"><span class="strong">검사정보</span></td>
					</tr>
					<tr>
						<td colspan="2" bgcolor="#EBF7FF" style="width:70px;"><span class="strong">검사항목</span></td>
						<td colspan="2" bgcolor="#EBF7FF" style="width:140px;"><span class="strong">치수정보</span></td>
						<td colspan="2" bgcolor="#EBF7FF" style="width:140px;"><span class="strong">검사값</span></td>
					</tr>
					<tr>
						<td colspan="2" bgcolor="#EAEAEA"><span class="strong">외관검사 1</span></td>
						<td colspan="2" bgcolor="#EAEAEA"><?php if ($shape1_check == 0) {
																echo "무검사";
															} else {
																echo "유검사";
															} ?>
						</td>
						<!--검사 기준치-->
						<td colspan="2" bgcolor="#EAEAEA"><?php echo $result001; ?></td>
					</tr>
					<tr>
						<td colspan="2" bgcolor="#EAEAEA"><span class="strong">외관검사 2</span></td>
						<td colspan="2" bgcolor="#EAEAEA"><?php if ($shape2_check == 0) {
																echo "무검사";
															} else {
																echo "유검사";
															} ?>
						</td>
						<!--검사 기준치-->
						<td colspan="2" bgcolor="#EAEAEA"><?php echo $result002; ?></td>
					</tr>
					<tr>
						<td colspan="2" bgcolor="#EFF7FF"><span class="strong">DIM①(평균)</span></td>
						<td colspan="2">
							<?php echo $data1_min; ?> mm ~ <?php echo $data1_max; ?> mm</td>
						<!--검사 기준치 minSpec1 ~ maxSpec1 단위= mm -->
						<td colspan="2"><?php echo $result003; ?></td>
					</tr>
					<tr>
						<td colspan="2" bgcolor="#EFF7FF"><span class="strong">DIM②(최소)</span></td>
						<td colspan="2">
							<?php echo $data2_min; ?> mm ~ <?php echo $data2_max; ?> mm</td>
						<!--검사 기준치 minSpec2 ~ maxSpec3 단위= mm -->
						<td colspan="2"><?php echo $result004; ?></td>
					</tr>
					<tr>
						<td colspan="2" bgcolor="#EFF7FF"><span class="strong">DIM③(최대)</span></td>
						<td colspan="2">
							<?php echo $data3_min; ?> mm ~ <?php echo $data3_max; ?> mm</td>
						<!--검사 기준치 minSpec3 ~ maxSpec3 단위= mm -->
						<td colspan="2"><?php echo $result005; ?></td>
					</tr>
					<tr>
						<td colspan="2" bgcolor="#EFF7FF"><span class="strong">DIM④(편차)</span></td>
						<td colspan="2">
							<?php echo $data4_min; ?> mm ~ <?php echo $data4_max; ?> mm</td>
						<!--검사 기준치 minSpec4 ~ maxSpec4 단위= mm -->
						<td colspan="2"><?php echo $result006; ?></td>
					</tr>
					<tr>
						<td colspan="2" bgcolor="#FAE0D4"><span class="strong">DIM⑤(평균)</span></td>
						<td colspan="2">
							<?php echo $data5_min; ?> mm ~ <?php echo $data5_max; ?> mm</td>
						<!--검사 기준치 minSpec5 ~ maxSpec5 단위= mm -->
						<td colspan="2"><?php echo $result007; ?></td>
					</tr>
					<tr>
						<td colspan="2" bgcolor="#FAE0D4"><span class="strong">DIM⑥(최소)</span></td>
						<td colspan="2">
							<?php echo $data6_min; ?> mm ~ <?php echo $data6_max; ?> mm</td>
						<!--검사 기준치 minSpec6 ~ maxSpec6 단위= mm -->
						<td colspan="2"><?php echo $result008; ?></td>
					</tr>
					<tr>
						<td colspan="2" bgcolor="#FAE0D4"><span class="strong">DIM⑦(최대)</span></td>
						<td colspan="2">
							<?php echo $data7_min; ?> mm ~ <?php echo $data7_max; ?> mm</td>
						<!--검사 기준치 minSpec7 ~ maxSpec7 단위= mm -->
						<td colspan="2"><?php echo $result009; ?></td>
					</tr>
					<tr>
						<td colspan="2" bgcolor="#FAE0D4"><span class="strong">DIM⑧(편차)</span></td>
						<td colspan="2">
							<?php echo $data8_min; ?> mm ~ <?php echo $data8_max; ?> mm</td>
						<!--검사 기준치 minSpec8 ~ maxSpec8 단위= mm -->
						<td colspan="2"><?php echo $result010; ?></td>
					</tr>
					<tr>
						<th colspan="3" bgcolor="#FFC6C6"><span class="strong">부적합품 처리</th>
						<th colspan="3" bgcolor="#C4DEFF"><span class="strong">포장사양</th>
						<th colspan="4" bgcolor="#C4DEFF"><span class="strong">지시 / 전달사항</th>
						<th colspan="6" bgcolor="#C4DEFF"><span class="strong">개정 정보</th>
					</tr>
					<tr>
						<td colspan="3" rowspan="4"><?php echo $processNG; ?></td>
						<td colspan="3" rowspan="4"><?php echo $package; ?></td>
						<td colspan="4" rowspan="4"><?php echo $vcComment1; ?></textarea></td>
						<td colspan="2" bgcolor="#EBF7FF"><span class="strong">개정번호</span></td>
						<td colspan="2" bgcolor="#EBF7FF"><span class="strong">개정내용</span></td>
						<td colspan="2" bgcolor="#EBF7FF"><span class="strong">개정일자</span></td>
					</tr>
					<tr>
						<td colspan="2" style="height: 10px;"><?php echo $vcRevision1; ?></td>
						<!--newest revision update no. 최근 리비전 순번 호출-->
						<td colspan="2"><?php echo $vcComment2; ?></td>
						<!--newest revision update memo.최근 리비전 내용 호출-->
						<td colspan="2"><?php echo $vcRevision_date1; ?></td>
						<!--newest revision update date"yyyy mm dd"-->
					</tr>
					<tr>
						<td colspan="2" style="height: 10px;"><?php echo $vcRevision1_1; ?></td>
						<!--newest revision update no. 최근 리비전 순번 호출-->
						<td colspan="2"><?php echo $vcComment2_1; ?></td>
						<!--newest revision update memo.최근 리비전 내용 호출-->
						<td colspan="2"><?php echo $vcRevision_date1_1; ?></td>
						<!--newest revision update date"yyyy mm dd"-->
					</tr>
					<tr>
						<td colspan="2" style="height: 10px;"><?php echo $vcRevision1_2; ?></td>
						<!--newest revision update no. 최근 리비전 순번 호출-->
						<td colspan="2"><?php echo $vcComment2_2; ?></td>
						<!--newest revision update memo.최근 리비전 내용 호출-->
						<td colspan="2"><?php echo $vcRevision_date1_2; ?></td>
						<!--newest revision update date"yyyy mm dd"-->
					</tr>
				</thead>
			</table>
		</section>
		<!-- 2번째 분활 화면시작 -->

		<!-- <article> 
    <h4>3st checker </h4>
    <p>3st checker view part</p>
  </article>
  <article> 
    <h4>4st checker</h4> 
    <p>4st checker view part</p>
	</article> -->
		<!--화면 4분할에서 2분할로 주석 처리-->

		<!-- <footer>                             <추후 사용할것을 예상하여 주석 처리함>
		<p>Mirae company</p>
	</footer> -->

	</section>
	</div>
</body>

</html>
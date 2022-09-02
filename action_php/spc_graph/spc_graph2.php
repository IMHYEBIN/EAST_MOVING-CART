<?php 

$conn = new mysqli("localhost", "server", "00000000", "dataset");

$machine = $_COOKIE["machine_no"];
$item_no = $_COOKIE["item_no"];
$date_call = $_COOKIE["date_call"];
$time_call = $_COOKIE["time_call"];



// 아이템 구분확인 & 아이템별 검사 치수 정보 불러오기

$times1 = date("H:i", strtotime($time_call."-1 hours"));  // 시 hours 분 minutes 외 다른건 관리 안함 기준값이 모호해짐 feat.김범수

$sql0 = "select * from main_viewer where item_id_num = '".$item_no."' order by id desc";
$res0 = mysqli_query($conn, $sql0); 

$row0 = mysqli_fetch_array($res0);

$item_id_num = $row0[1];
$item_num = $row0[2];
$item_name = $row0[3];					//검사 호기
$mc_code = $row0[4];				    //회사 코드명
$localtime1 = $row0[5];			  	//저장한 일자 정보 기록
$data1_min = $row0[6];			$data1_max = $row0[7];            $data1 = ($data1_min+$data1_max)/2;
$data2_min = $row0[8];			$data2_max = $row0[9];            $data2 = ($data2_min+$data2_max)/2;
$data3_min = $row0[10];			$data3_max = $row0[11];           $data3 = ($data3_min+$data3_max)/2;
$data4_min = $row0[12];			$data4_max = $row0[13];           $data4 = ($data4_min+$data4_max)/2;
$data5_min = $row0[14];			$data5_max = $row0[15];           $data5 = ($data5_min+$data5_max)/2;
$data6_min = $row0[16];			$data6_max = $row0[17];           $data6 = ($data6_min+$data6_max)/2;
$data7_min = $row0[18];			$data7_max = $row0[19];           $data7 = ($data7_min+$data7_max)/2;					//여기까지  1분할 화면 치수 정보 
$shape1_check = $row0[20];
$shape2_check = $row0[21];
$shape3_check = $row0[22];
$processNG = $row0[23];
$package = $row0[24];
$acc1 = $row0[25];
$vcComment1 = $row0[26];	    		//지시/전달 사항 기재
$vcRevision1 = $row0[27];   			//개정번호
$vcComment2 = $row0[28];		    	//개정내용
$vcRevision_date1 = $row0[29];		//개정일자
$customer = $row0[30];	    			//고객정보

//검사 수량 count
$sql = "select * from result1 where date = '".$date_call."' and time <= '".$time_call."' and time >='".$times1."' order by id desc";
$res = mysqli_query($conn, $sql);

//y data 값 산출
$sql1 = "select * from result1 where date = '".$date_call."' and time <= '".$time_call."' and time >='".$times1."' order by id desc";
$res1 = mysqli_query($conn, $sql1);

//y에 찍히는 data값 sum
$sql2 = "select * from result1 where date = '".$date_call."' and time <= '".$time_call."' and time >='".$times1."' order by id desc";
$res2 = mysqli_query($conn, $sql2);

//분산 값을 구하기 위해 다시 돌림
$sql3 = "select * from result1 where date = '".$date_call."' and time <= '".$time_call."' and time >='".$times1."' order by id desc";
$res3 = mysqli_query($conn, $sql3);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/data_log_graph.css" rel="stylesheet" type="text/css">
    <script src="/js/graph_v3.5.1.js"></script>
  <title>graph 페이지</title>
  <style>
    .chartBox {
      width: 500px;
      height: 200px;
    }
  </style>
</head>
<body>
<!-- 아이템 구분 -->
<table>
  <tr align="center">
  <th bgcolor="#cce5ff" width="80px" height="20px">품 목</th>
    <td width="100px">
<p><?php
  if ($item_no == 0) {
    $select_item = "아이템1";
  }
  elseif ($item_no == 1) {
    $select_item = "아이템2";
  }
  elseif ($item_no == 2) {
    $select_item = "아이템3";
  }
  elseif ($item_no == 3) {
    $select_item = "아이템4";
  }
  elseif ($item_no == 4) {
    $select_item = "아이템5";
  }
  elseif ($item_no == 5) {
    $select_item = "아이템6";
  }
  else {
    "아이템을 선택해주세요";
  }
echo $select_item; ?></p>
</td>
<!-- 항목 변경시 수정 요망 -->
  <th bgcolor="#cce5ff" width="80px" height="20px">DIM ③</th>
  <td><?php
  // 항목 변경시 수정 요망
  echo $data3_min.'mm ~ '.$data3_max.' mm';
  ?></td>
</tr>
</table>
<!-- 그래프 시작 -->

<!-- 항목 변경시 row[]안에 수정 요망 -->
<article>
<div class="chartbox">
<canvas id="myChart1"></canvas>
</div>
<script>
  // setup block
  const data = {
        labels: [<?php for($countQ=1;$row = mysqli_fetch_array($res);$countQ++){echo "'".number_format($countQ,0)."',";} ?>],
        datasets: [{
            label: '# spc data',
            data: [<?php for(;$row1 = mysqli_fetch_array($res1);) {$result1 = $row1[11]; echo "'".number_format($result1,2)."',";} ?>],  // 아이템 or 항목 변경시 수정 요망
            fill: false,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            tension : 0,
            borderWidth: 2
        }],
    };


// UCL,LCL 구하는 공식
// 항목 변경시 각 row[]내에 값들 변경 해야됨
<?php 
// avr = sum/n  <== *평균
for($countN=0;$row2 = mysqli_fetch_array($res2);$countN++){$sum += $row2[11];} $avr = $sum / $countN;

// v(분산) = pow(x-avr),2
for($t=0; $row3 = mysqli_fetch_array($res3);$t += pow(($row3[11]-$avr),2)){}

// stdEv =  루트 v <== 표준 편차
$stdEv = sqrt($t/$countN);

// UCL = avr + (표준편차*3)
$UCL = $avr + ($stdEv*3);

// LCL = avr - (표준편차*3)
$LCL = $avr - ($stdEv*3);

?>


// horizontalLine block
  const horizontalLine = {
    id: 'horizontalLine', 
    beforeDraw(chart, args, options) {
      const { ctx, chartArea: { top, right, bottom, left, width, height }, scales :
        {x, y} } = chart;
      ctx.save();

// 1 draw a line //상한치      //USL / *보조라인 색상에 따라 변경가능
      ctx.fillStyle = options.lineColor_main;
      ctx.fillRect(left, y.getPixelForValue(<?php echo $data3_max; ?>), width, 2);
// 2 draw a line //센터치     //CENTER / *여기서 직접 지정도 가능
      ctx.fillStyle = options.lineColor_main;
      ctx.fillRect(left, y.getPixelForValue(<?php echo $data3; ?>), width, 0.8);
// 3 draw a line //하한치     //LSL / *보조라인 색상에 따라 변경가능
      ctx.fillStyle = options.lineColor_main;
      ctx.fillRect(left, y.getPixelForValue(<?php echo $data3_min; ?>), width, 2);
      // x0 = 수평선 시작점 / 0으로 하면 캔버스 왼쪽 밖으로 벗어남
      // y0 = 수직선 시작점 y.getPixelForValue() 이걸로 하면 값에 맞춰짐
      // x1 = 수평선 마지막점 /width 외 다른걸로 하면 맞추기 힘듬!!
      // y1 = 수직선 마지막점 / 두께 조절이라고 보면 됨 커지면 박스값으로 바뀜
      // 위 4줄의 주석은 나머지 4항목 모두다 적용...적기 귀찮음!!

//UCL / *보조라인 색상에 따라 변경가능
      ctx.fillStyle = 'skyblue';
      ctx.fillRect(left, y.getPixelForValue(<?php echo $UCL; ?>), width, 2);
//LCL / *보조라인 색상에 따라 변경가능
      ctx.fillStyle = options.lineColor_sub;
      ctx.fillRect(left, y.getPixelForValue(<?php echo $LCL; ?>), width, 2);
// 2 draw the line at the exact position
// console.log(y.getPixelForValue(13.7))

      ctx.restore();
    }
  }

// config block
  const config = {
    type: 'line',           //line 은 선형 그래프 bar는 막대형 그래프로 변경 가능/ 막대형일때 하위 컬러에서 개별적으로 추가 변경 가능
    data,
      options: {
          scales: {
            y: {
              max : <?php $max3=$data3_max+0.1; echo $max3; ?>,   //y 축 반응형으로 최대값 변경 가능 / 현재는 설정치(공차 최대값)에서 +0.5 #항목 변경시 $data1_ <== 변경해줘야함
              min : <?php $min3=$data3_min-0.1; echo $min3; ?>,   //y 축 반응형으로 최소값 변경 가능 / 현재는 설정치(공차 최소값)에서 -0.5 #항목 변경시 $data1_ <== 변경해줘야함
              
              ticks: {
              stepSize : 0.1,
              beginAtZero: false           // true = 0값에서 시작 가능 /false =  0 값에서 시작 하지 말라는 뜻 0에서 시작하면 라인 맞추기 졸라 귀찮음 손 대지 말것!!
              }
          }
      },
      plugins : {
        horizontalLine :{
          lineColor_main : 'green',        // 메인 라인 색상 변경 현재는 '녹색'   색상변경은 각 라인에서 개별적으로 변경 가능함
          lineColor_sub : 'skyblue'        // 보조 라인 색상 변경 현재는 '하늘색' 색상변경은 각 라인에서 개별적으로 변경 가능함
        }
      }
    },
    plugins : [horizontalLine]
  };
//render / init block
const myChart1 = new Chart(
  document.getElementById('myChart1'),
  config
);
</script>

<!-- <?php echo 
          // 시작시간 이 따로 계산이 되면 위에 몇줄은 그냥 쌉 삭제 가능
          " 시작시간: ".$times1.
          " 기준시간: ".$time_call.
          " 평균: ".number_format($avr,3).
          " 분산: ".number_format($t,3).
          " 표준편차: ".number_format($stdEv,3).
          " UCL: ".number_format($UCL,3).
          " LCL: ".number_format($LCL,3).
          " 설정 : 기준시간 -30 분";
?> -->

</article>
</body>
</html>
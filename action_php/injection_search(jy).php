<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");

$sql = "select * from work_std where id = ".$_POST["correctMatch"];
$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="chrome">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>성형 조건표 조회</title>
  <link href="/css/성형 조건표 스타일2.css" rel="stylesheet" type="text/css">
  </head>
<body>
  <section>
	  <form method="post" action="/action_php/injection_setting_update.php" target="_blank">
    <article>
      <table>
        <thead>
          <tr>
            <th colspan="58"><h2>작업 표준서 조회</h2><input type="hidden" name="localtime2" id="localtime2" value="<?php echo date('Y-m-d'); ?>"><input type="hidden" name="correctMatch" value="<?php echo $row[0]; ?>"></th>
          </tr>
          </thead>
          <tr>
          <th colspan="4" bgcolor="#B2CCFF">차종</th>
            <th colspan="14" bgcolor="#B2CCFF">품번</th>
            <th colspan="14" bgcolor="#B2CCFF">품명</th>
            <th colspan="6" bgcolor="#B2CCFF">설비명</th>
            <th colspan="6" bgcolor="#B2CCFF">원재료명</th>
            <th colspan="6" bgcolor="#B2CCFF">GRADE</th>
            <th colspan="6" bgcolor="#B2CCFF">색상</th>
          </tr>
          <tr>
            <td colspan="4"><input type="text" size="4" name="carType1" value="<?php echo $row[2]; ?>" required></td>           <!-- carType = 차종 -->
            <td colspan="14"><input type="text" size="10" name="item_index_no" placeholder="동일번호 기재!" maxlength="1" value="<?php echo $row[3]; ?>"><input type="text" size="10" name="itemNo1" value="<?php echo $row[4]; ?>" required></td>           <!-- itemNo1 = 품번 call-->
            <td colspan="14"><input type="text" size="30" name="itemName1" value="<?php echo $row[5]; ?>" required></td>        <!-- itemName1 = 품명 call -->
            <td colspan="6"><input type="text" size="13" name="machineName1" value="<?php echo $row[6]; ?>" required></td>      <!-- machineName1 = 기기명 -->
            <td colspan="6"><input type="text" size="16" name="materialName1" value="<?php echo $row[7]; ?>" required></td>     <!-- materialName1 = 원재료명 -->
            <td colspan="6"><input type="text" size="16" name="materialGrade1" value="<?php echo $row[8]; ?>" required></td>    <!-- materialGrade1 = 원재료 Grade -->
            <td colspan="6"><input type="text" size="8" name="materialColor1" value="<?php echo $row[9]; ?>" required></td>     <!-- materialColor1 = 원재료 Color -->
          </tr>
          <tr>
            <!-- <th colspan="17" rowspan="21"><img src="/img/goodimg.jpg"></th>                              첨부된 이미지(양품 사진 불러오기) -->
            <th colspan="4" rowspan="22" bgcolor="#B2CCFF">성형<br>필수<br>조건<br>기재</th>
            <th colspan="12" rowspan="2" bgcolor="#B2CCFF">항 목</th>
            <th colspan="30" bgcolor="#B2CCFF">관리기준</th>
            <th colspan="14" bgcolor="#B2CCFF">관리담당</th>
          </tr>
          <tr>
            <th colspan="15" bgcolor="#D6F0FF">하절기</th>
            <th colspan="15" bgcolor="#D6F0FF">동절기</th>
            <th colspan="5" bgcolor="#D6F0FF">입력담당</th>
            <th colspan="5" bgcolor="#D6F0FF">확인담당</th>
          </tr>
          <tr>
            <th colspan="5" rowspan="4" bgcolor="#D6F0FF">온 도</th>
            <th colspan="7" rowspan="2" bgcolor="#D6F0FF">실린더<br>±10(℃)</th>
            <th colspan="3" bgcolor="#C4DEFF">노즐</th>
            <th colspan="3" bgcolor="#C4DEFF">H1</th>
            <th colspan="3" bgcolor="#C4DEFF">H2</th>
            <th colspan="3" bgcolor="#C4DEFF">H3</th>
            <th colspan="3" bgcolor="#C4DEFF">H4</th>
            <th colspan="3" bgcolor="#C4DEFF">노즐</th>
            <th colspan="3" bgcolor="#C4DEFF">H1</th>
            <th colspan="3" bgcolor="#C4DEFF">H2</th>
            <th colspan="3" bgcolor="#C4DEFF">H3</th>
            <th colspan="3" bgcolor="#C4DEFF">H4</th>
            <td colspan="5" rowspan="20"><span class="strong">생산</span></td>
            <td colspan="5" rowspan="20"><span class="strong">품질</span></td>
          </tr>
          <tr>
            <td colspan="3"><input type="text" size="2" name="nozzle1" value="<?php echo $row[10]; ?>"></td>             <!-- Nozzle1 = 하절기 노즐 관리 -->
            <td colspan="3"><input type="text" size="2" name="sHeater1" value="<?php echo $row[11]; ?>"></td>       <!-- summerHeater1 = 하절기 1번 히터온도 관리 -->
            <td colspan="3"><input type="text" size="2" name="sHeater2" value="<?php echo $row[12]; ?>"></td>       <!-- summerHeater2 = 하절기 2번 히터온도 관리 -->
            <td colspan="3"><input type="text" size="2" name="sHeater3" value="<?php echo $row[13]; ?>"></td>       <!-- summerHeater3 = 하절기 3번 히터온도 관리 -->
            <td colspan="3"><input type="text" size="2" name="sHeater4" value="<?php echo $row[14]; ?>"></td>       <!-- summerHeater4 = 하절기 4번 히터온도 관리 -->
            <td colspan="3"><input type="text" size="2" name="nozzle2" value="<?php echo $row[15]; ?>"></td>             <!-- Nozzle2 = 동절기 노즐 관리 -->
            <td colspan="3"><input type="text" size="2" name="wHeater1" value="<?php echo $row[16]; ?>"></td>       <!-- winterHeater1 = 동절기 1번 히터온도 관리-->
            <td colspan="3"><input type="text" size="2" name="wHeater2" value="<?php echo $row[17]; ?>"></td>       <!-- winterHeater2 = 동절기 2번 히터온도 관리-->
            <td colspan="3"><input type="text" size="2" name="wHeater3" value="<?php echo $row[18]; ?>"></td>       <!-- winterHeater3 = 동절기 3번 히터온도 관리-->
            <td colspan="3"><input type="text" size="2" name="wHeater4" value="<?php echo $row[19]; ?>"></td>       <!-- winterHeater4 = 동절기 4번 히터온도 관리-->
          </tr>
          <tr>
            <th colspan="5" rowspan="2" bgcolor="#C4DEFF">금형<br>(℃)</td>
            <th colspan="2" bgcolor="#C4DEFF">가동축</th>
            <td colspan="15"><input type="text" name="sMoldTemper1" value="<?php echo $row[20]; ?>"></td>          <!-- 하절기 이동축 금형 온도 관리 -->
            <td colspan="15"><input type="text" name="wMoldTemper1" value="<?php echo $row[21]; ?>"></td>           <!-- 동절기 이동축 금형 온도 관리 -->
          </tr>
          <tr>
            <th colspan="2" bgcolor="#C4DEFF">고정축</th>
            <td colspan="15"><input type="text" name="sMoldTemper2" value="<?php echo $row[22]; ?>"></td>          <!-- 하절기 고정축 금형 온도 관리 -->
            <td colspan="15"><input type="text" name="wMoldTemper2" value="<?php echo $row[23]; ?>"></td>           <!-- 동절기 고정축 금형 온도 관리-->
          </tr>
          <tr>
            <th colspan="12" bgcolor="#B2CCFF">구 분</th>
            <th colspan="3" bgcolor="#B2CCFF">1차</th>
            <th colspan="3" bgcolor="#B2CCFF">2차</th>
            <th colspan="3" bgcolor="#B2CCFF">3차</th>
            <th colspan="3" bgcolor="#B2CCFF">4차</th>
            <th colspan="3" bgcolor="#B2CCFF">5차</th>
            <th colspan="3" bgcolor="#B2CCFF">1차</th>
            <th colspan="3" bgcolor="#B2CCFF">2차</th>
            <th colspan="3" bgcolor="#B2CCFF">3차</th>
            <th colspan="3" bgcolor="#B2CCFF">4차</th>
            <th colspan="3" bgcolor="#B2CCFF">5차</th>
          </tr>
          <tr>
            <th colspan="12" bgcolor="#D6F0FF">사출압력(Kgf/㎤) ±5</th>
            <td colspan="3"><input type="text" size="2" name="sIPressure1" value="<?php echo $row[24]; ?>"></td>    <!--하절기 사출압력1 -->
            <td colspan="3"><input type="text" size="2" name="sIPressure2" value="<?php echo $row[25]; ?>"></td>    <!--하절기 사출압력2 -->
            <td colspan="3"><input type="text" size="2" name="sIPressure3" value="<?php echo $row[26]; ?>"></td>    <!--하절기 사출압력3 -->
            <td colspan="3"><input type="text" size="2" name="sIPressure4" value="<?php echo $row[27]; ?>"></td>    <!--하절기 사출압력4 -->
            <td colspan="3"><input type="text" size="2" name="sIPressure5" value="<?php echo $row[28]; ?>"></td>    <!--하절기 사출압력5 -->
            <td colspan="3"><input type="text" size="2" name="wIPressure1" value="<?php echo $row[29]; ?>"></td>     <!--동절기 사출압력1 -->
            <td colspan="3"><input type="text" size="2" name="wIPressure2" value="<?php echo $row[30]; ?>"></td>     <!--동절기 사출압력2 -->
            <td colspan="3"><input type="text" size="2" name="wIPressure3" value="<?php echo $row[31]; ?>"></td>     <!--동절기 사출압력3 -->
            <td colspan="3"><input type="text" size="2" name="wIPressure4" value="<?php echo $row[32]; ?>"></td>     <!--동절기 사출압력4 -->
            <td colspan="3"><input type="text" size="2" name="wIPressure5" value="<?php echo $row[33]; ?>"></td>     <!--동절기 사출압력5 -->
          </tr>
          <tr>
            <th colspan="12" bgcolor="#D6F0FF">사출속도(%) ±5</th>
            <td colspan="3"><input type="text" size="2" name="sISpeed1" value="<?php echo $row[34]; ?>"></td>        <!--하절기 사출속도1 -->
            <td colspan="3"><input type="text" size="2" name="sISpeed2" value="<?php echo $row[35]; ?>"></td>        <!--하절기 사출속도2 -->
            <td colspan="3"><input type="text" size="2" name="sISpeed3" value="<?php echo $row[36]; ?>"></td>        <!--하절기 사출속도3 -->
            <td colspan="3"><input type="text" size="2" name="sISpeed4" value="<?php echo $row[37]; ?>"></td>        <!--하절기 사출속도4 -->
            <td colspan="3"><input type="text" size="2" name="sISpeed5" value="<?php echo $row[38]; ?>"></td>        <!--하절기 사출속도5 -->
            <td colspan="3"><input type="text" size="2" name="wISpeed1" value="<?php echo $row[39]; ?>"></td>        <!--동절기 사출속도1 -->
            <td colspan="3"><input type="text" size="2" name="wISpeed2" value="<?php echo $row[40]; ?>"></td>        <!--동절기 사출속도2 -->
            <td colspan="3"><input type="text" size="2" name="wISpeed3" value="<?php echo $row[41]; ?>"></td>        <!--동절기 사출속도3 -->
            <td colspan="3"><input type="text" size="2" name="wISpeed4" value="<?php echo $row[42]; ?>"></td>        <!--동절기 사출속도4 -->
            <td colspan="3"><input type="text" size="2" name="wISpeed5" value="<?php echo $row[43]; ?>"></td>        <!--동절기 사출속도5 -->
          </tr>
          <tr>
            <th colspan="12" bgcolor="#D6F0FF">사출위치(mm) ±5</th>
            <td colspan="3"><input type="text" size="2" name="sIPosition1" value="<?php echo $row[44]; ?>"></td>       <!--하절기 사출위치-->
            <td colspan="3"><input type="text" size="2" name="sIPosition2" value="<?php echo $row[45]; ?>"></td>       <!--하절기 사출위치-->
            <td colspan="3"><input type="text" size="2" name="sIPosition3" value="<?php echo $row[46]; ?>"></td>       <!--하절기 사출위치-->
            <td colspan="3"><input type="text" size="2" name="sIPosition4" value="<?php echo $row[47]; ?>"></td>       <!--하절기 사출위치-->
            <td colspan="3"><input type="text" size="2" name="sIPosition5" value="<?php echo $row[48]; ?>"></td>       <!--하절기 사출위치-->
            <td colspan="3"><input type="text" size="2" name="wIPosition1" value="<?php echo $row[49]; ?>"></td>       <!--동절기 사출위치-->
            <td colspan="3"><input type="text" size="2" name="wIPosition2" value="<?php echo $row[50]; ?>"></td>       <!--동절기 사출위치-->
            <td colspan="3"><input type="text" size="2" name="wIPosition3" value="<?php echo $row[51]; ?>"></td>       <!--동절기 사출위치-->
            <td colspan="3"><input type="text" size="2" name="wIPosition4" value="<?php echo $row[52]; ?>"></td>       <!--동절기 사출위치-->
            <td colspan="3"><input type="text" size="2" name="wIPosition5" value="<?php echo $row[53]; ?>"></td>       <!--동절기 사출위치-->
          </tr>
          <tr>
            <th colspan="12" bgcolor="#D6F0FF">보압(Kgf/㎤) ±5</th>
            <td colspan="3"><input type="text" size="2" name="sGuidePressure1" value="<?php echo $row[54]; ?>"></td>  <!--하절기 보압위치-->
            <td colspan="3"><input type="text" size="2" name="sGuidePressure2" value="<?php echo $row[55]; ?>"></td>  <!--하절기 보압위치-->
            <td colspan="3"><input type="text" size="2" name="sGuidePressure3" value="<?php echo $row[56]; ?>"></td>  <!--하절기 보압위치-->
            <td colspan="3"><input type="text" size="2" name="sGuidePressure4" value="<?php echo $row[57]; ?>"></td>  <!--하절기 보압위치-->
            <td colspan="3"><input type="text" size="2" name="sGuidePressure5" value="<?php echo $row[58]; ?>"></td>  <!--하절기 보압위치-->
            <td colspan="3"><input type="text" size="2" name="wGuidePressure1" value="<?php echo $row[59]; ?>"></td>  <!--동절기 보압위치-->
            <td colspan="3"><input type="text" size="2" name="wGuidePressure2" value="<?php echo $row[60]; ?>"></td>  <!--동절기 보압위치-->
            <td colspan="3"><input type="text" size="2" name="wGuidePressure3" value="<?php echo $row[61]; ?>"></td>  <!--동절기 보압위치-->
            <td colspan="3"><input type="text" size="2" name="wGuidePressure4" value="<?php echo $row[62]; ?>"></td>  <!--동절기 보압위치-->
            <td colspan="3"><input type="text" size="2" name="wGuidePressure5" value="<?php echo $row[63]; ?>"></td>  <!--동절기 보압위치-->
          </tr>
          <tr>
            <th colspan="12" bgcolor="#D6F0FF">보압속도(%) ±5</th>
            <td colspan="3"><input type="text" size="2" name="sGuideSpeed1" value="<?php echo $row[64]; ?>"></td>     <!--하절기 보압속도-->
            <td colspan="3"><input type="text" size="2" name="sGuideSpeed2" value="<?php echo $row[65]; ?>"></td>     <!--하절기 보압속도-->
            <td colspan="3"><input type="text" size="2" name="sGuideSpeed3" value="<?php echo $row[66]; ?>"></td>     <!--하절기 보압속도-->
            <td colspan="3"><input type="text" size="2" name="sGuideSpeed4" value="<?php echo $row[67]; ?>"></td>     <!--하절기 보압속도-->
            <td colspan="3"><input type="text" size="2" name="sGuideSpeed5" value="<?php echo $row[68]; ?>"></td>     <!--하절기 보압속도-->
            <td colspan="3"><input type="text" size="2" name="wGuideSpeed1" value="<?php echo $row[69]; ?>"></td>     <!--동절기 보압속도-->
            <td colspan="3"><input type="text" size="2" name="wGuideSpeed2" value="<?php echo $row[70]; ?>"></td>     <!--동절기 보압속도-->
            <td colspan="3"><input type="text" size="2" name="wGuideSpeed3" value="<?php echo $row[71]; ?>"></td>     <!--동절기 보압속도-->
            <td colspan="3"><input type="text" size="2" name="wGuideSpeed4" value="<?php echo $row[72]; ?>"></td>     <!--동절기 보압속도-->
            <td colspan="3"><input type="text" size="2" name="wGuideSpeed5" value="<?php echo $row[73]; ?>"></td>     <!--동절기 보압속도-->
          </tr>
          <tr>
            <th colspan="12" bgcolor="#D6F0FF">건조 시간 / 건조 온도</th>
            <td colspan="15"><input type="text" size="5" name="dryTime2" value="<?php echo $row[74]; ?>">Hr</td>     <!--건조시간(원재료 건조기 별도 사용시)-->
            <td colspan="15"><input type="text" size="5" name="dryTemp2" value="<?php echo $row[75]; ?>">℃</td>      <!--건조온도(원재료 건조기 별도 사용시)-->
          </tr>
          <tr>
            <th colspan="12" bgcolor="#D6F0FF">계량위치(mm)±5</th>
            <td colspan="30"><input type="text" size="5" name="meterage1" value="<?php echo $row[76]; ?>">mm</td>         <!--계량 위치-->
          </tr>
          <tr>
            <th colspan="12" bgcolor="#D6F0FF">쿠션량(mm)±5</th>
            <td colspan="30"><input type="text" size="5" name="cushion1" value="<?php echo $row[77]; ?>">mm</td>          <!--쿠션량 -->
          </tr>
          <tr>
            <th colspan="12" bgcolor="#D6F0FF">사출시간(sec)±5</th>
            <td colspan="30"><input type="text" size="5" name="injectionTime1" value="<?php echo $row[78]; ?>">sec</td>   <!--사출시간-->
          </tr>
          <tr>
            <th colspan="12" bgcolor="#D6F0FF">보압시간(sec)±5</th>
            <td colspan="30"><input type="text" size="5" name="guideTime1" value="<?php echo $row[79]; ?>">sec</td>       <!--보압시간-->
          </tr>
          <tr>
            <th colspan="7" rowspan="2" bgcolor="#D6F0FF">원재료 건조<br>(호퍼)</td>
            <th colspan="5" bgcolor="#D6F0FF" >온도 (℃) ±10</th>
            <td colspan="30"><input type="text" size="5" name="dryTemp1" value="<?php echo $row[80]; ?>">℃</td>            <!--건조 온도(호퍼기)-->
            </tr>
          <tr>
            <th colspan="5" bgcolor="#D6F0FF">시간 (Hr) ±10%</th>
            <td colspan="30"><input type="text" size="5" name="dryTime1" value="<?php echo $row[81]; ?>">Hr</td>           <!--건조 시간(시간)-->
          </tr>
          <tr>
            <th colspan="12" bgcolor="#D6F0FF">금형 예열 온도(℃)</th>
            <td colspan="30"><input type="text" size="5" name="moldPreHeat1" value="<?php echo $row[82]; ?>">℃</td>        <!--금형 예열 온도-->
          </tr>
          <tr>
            <th colspan="12" bgcolor="#D6F0FF">금형 예열 시간(Hr)</th>
            <td colspan="30"><input type="text" size="5" name="moldPreHeat2" value="<?php echo $row[83]; ?>">Hr</td>       <!--금형 예열 시간-->
          </tr>
          <div>
          <tr>
            <!-- <th colspan="17"><form method="post" action="upload.php" target="_blank" enctype="multipart/form-data"> -->
            <!-- <input type="file" name="goodimg" id="imageFileOpenInout" accept="imame/*" size="10"><input type="submit" id="imageFileOpenInout" value="저장하기"></form></th>   양품 사진 첨부하기 -->
            <th colspan="12" bgcolor="#D6F0FF">초기조건 허용불량(Shot)</th>
            <td colspan="30"><input type="text" size="5" name="preShot1" value="<?php echo $row[84]; ?>">shot</td>             <!--허용불량 폐기 기준-->
          </tr>
          </div>
			 <tr>
			 <th colspan="60"><h2><input type="submit" value="수정하기" style="width: 120px; height: 60px; font-size: 20px;" target="_blank"></form><input type="button" value="닫기" style="width: 120px; height: 60px; font-size: 20px;" onclick="window.close()"></h2></th>
			 </tr>
      </table>
    </article>
  </section>
</body>
</html>

<?php mysqli_close($conn); ?> 		<!--종료 -->
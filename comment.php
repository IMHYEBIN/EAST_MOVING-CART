<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>comment.php</title>
	<link rel="stylesheet" href="/css/comment.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="main">
		<!-- ============================================================================================== -->
		<div id="container" class="imgbox">
			<img id="img1" class="imgitem" src="/img/photo-3.jpg" alt="1">
			<img id="img2" class="imgitem" src="/img/photo-2.jpg" alt="2">
		</div>
		<!-- ============================================================================================== -->

		<?php
		$currentPage = 1;
		if (isset($_GET["currentPage"])) {
			$currentPage = $_GET["currentPage"];
		}

		//mysqli_connect()함수로 커넥션 객체 생성
		$conn = mysqli_connect("localhost", "server", "00000000", "dataset");
		// //커넥션 객체 생성 확인
		// if ($conn) {
		// 	echo "[DB 연결] 성공<br>";
		// } else {
		// 	echo "[DB 연결] 실패";
		// }

		//페이징 작업을 위한 테이블 내 전체 행 갯수 조회 쿼리
		$sqlCount = "SELECT count(*) FROM ar1";
		$resultCount = mysqli_query($conn, $sqlCount);
		if ($rowCount = mysqli_fetch_array($resultCount)) {
			$totalRowNum = $rowCount["count(*)"] * 10;   //php는 지역 변수를 밖에서 사용 가능. ===================== ar0 에서 ar9 까지 있으므로 * 10 함
		}
		// //행 갯수 조회 쿼리가 실행 됐는지 여부
		// if ($resultCount) {
		// 	echo "[행 조회] 성공 ---- 전체 행 개수 : " . $totalRowNum . "<br>";
		// } else {
		// 	echo "[행 조회] 결과 없음: " . mysqli_error($conn);
		// }

		$rowPerPage = 10;   //페이지당 보여줄 게시물 행의 수
		$begin = ($currentPage - 1) * $rowPerPage;
		//comment 테이블을 조회해서 필드 값을 내림차순으로 정렬하여 모두 가져 오는 쿼리
		//입력된 begin값과 rowPerPage 값에 따라 가져오는 행의 시작과 갯수가 달라지는 쿼리
		$sql = "SELECT * FROM ar1 where id = " . $currentPage . " order by id";
		$result = mysqli_query($conn, $sql);
		$sql01 = "SELECT * FROM ar2 where id = " . $currentPage . " order by id";
		$result01 = mysqli_query($conn, $sql01);
		// //쿼리 조회 결과가 있는지 확인
		// if ($result) {
		// 	echo "[테이블 조회] 성공";
		// } else {
		// 	echo "[테이블 조회] 없음: " . mysqli_error($conn);
		// }
		?>

		<!-- ============================================================================================== -->

		<div class="tablebox">
			<table class="table table-hover">
				<tr>
					<th class="table-secondary idth">번호</th>
					<th class="table-secondary commentth">코멘트</th>
					<th class="table-secondary datath">데이터</th>
					<th class="table-secondary setth">관리</th>
				</tr>
				<?php
				//반복문을 이용하여 result 변수에 담긴 값을 row변수에 계속 담아서 row변수의 값을 테이블에 출력한다.
				for (; $row = mysqli_fetch_array($result);) {
					$row01 = mysqli_fetch_array($result01);
					for ($countA = 1; $countA < 11; $countA++) {
						echo "
				<tr>
				<form action = '/action_php/comment_update.php' method='POST' target = '_blank'>
					<td>" . $countA . "</td>
					<td><input class='inputbox' type='text' name='comment" . $countA . "' value='" . $row01[$countA] . "'>
					</td>
					<td><input class='inputbox' type='text' name='data" . $countA . "' value='" . $row[$countA] . "'>
					</td>
					<td>
					<input type = 'hidden' name = 'comment_value' value= " . $row[0] . ">
					<input class='btn btn-secondary' type='submit' value='수정'></td>
					</form>
				</tr>
			";
					}
				}
				?>
			</table>
		</div>

		<!-- ============================================================================================== -->

		<form action='/action_php/comment_call3.php' method='POST' target='_blank'>
			<div class="statusbox">
				<p class="btn alert-primary text-dark">설정1</p>
				<input type='hidden' name='reload' value="3">
				<input class='btn btn-secondary' type='submit' value='새로고침' style="margin-top: -17px;">
			</div>
		</form>

		<!-- ============================================================================================== -->

		<div class='pagenumbox'>
			<p>
				<?php
				$sqlCount = "SELECT count(*) FROM ar1";
				$resultCount = mysqli_query($conn, $sqlCount);
				if ($rowCount = mysqli_fetch_array($resultCount)) {
					$totalRowNum = $rowCount["count(*)"] * 10;   //php는 지역 변수를 밖에서 사용 가능. ===================== ar0 에서 ar9 까지 있으므로 * 10 함
				}
				//페이지넘버가  1에서 총 페이지개수일때까지 반복
				for ($countPAGE = 1; $countPAGE <= $rowCount["count(*)"]; $countPAGE++) {
					//받아온 페이지넘버와 현재 페이지 값이 같으면 색깔을 다르게 표시
					if ($countPAGE == $currentPage) {
						echo "
						<a class='pagenum' style='color:rgb(235, 57, 57); font-size:25px;' href='/comment.php?currentPage=" . $countPAGE . "'>" . $countPAGE . "</a>
						";
					} else {
						echo "
						<a class='pagenum' href='/comment.php?currentPage=" . $countPAGE . "'>" . $countPAGE . "</a>
						";
					}
				}
				?>
			</p>
		</div>

		<!-- ============================================================================================== -->

		<?php
		//currentPage 변수가 1보다 클때만 이전 버튼이 활성화 되도록 함
		if ($currentPage > 1) {
			//이전 버튼이 클릭될때 GET방식으로 currentPage변수 값에 1을 뺀 값이 넘어가도록 함
			echo "<a id ='before' class='btn btn-secondary before' href ='/comment.php?currentPage=" . ($currentPage - 1) . "'> ◀ </a>";
		}

		$lastPage = ($totalRowNum - 1) / $rowPerPage;

		if (($totalRowNum - 1) % $rowPerPage != 0) {
			$lastPage += 1;
		}
		//lastPage변수가 currentPage 변수보다 클때만 다음 버튼이 활성화 되도록 함
		if ($currentPage < $lastPage) {
			//다음 버튼이 클릭될때 GET방식으로 currentPage변수 값에 1을 더한 값이 넘어가도록 함
			echo "<a id ='after' class='btn btn-secondary after' href='/comment.php?currentPage=" . ($currentPage + 1) . "'> ▶ </a>";
		}
		mysqli_close($conn);
		?>
	</div>
</body>

</html>
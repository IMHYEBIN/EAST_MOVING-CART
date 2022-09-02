<?php

$conn = new mysqli("localhost", "server", "00000000", "dataset");

setcookie('machine_no', $_POST["machine_no"], time() + 3, '/');
setcookie('date_call', $_POST["date_call"], time() + 3, '/');
setcookie('time_call', $_POST["time_call"], time() + 3, '/');
setcookie('item_no', $_POST["item_sel"], time() + 3, '/');

# 3시간 처리 예) 350<- 3시간 50분 //1번 사용해서 나머지 그래프쪽에 사용하기 위해 쿠키 처리해 버림 쿠키 3초 유지
setcookie('timestamp', 300, time() + 300, '/');

//setcookie(' ', $_POST[" "], time() + 300, '/');            추가적인 사용을 위해서 주석 처리


mysqli_close($conn); // 종료
?>
 <!-- 자식창 닫고 부모창 새로고침 -->
<script type="text/javascript">

		opener.document.location.reload();

		self.close();

</script>
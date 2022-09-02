<?php session_start() ?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>INRUT</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/css/data_add.css">

</head>

<body>
    <div class="wrapper">
        <h1 class="title">신규 제품 등록</h1>
        <!-- board_add_action.php로 넘기는 폼 -->

        <form class="form-horizontal" action="/action_php/action_data_add.php" method="post">
            <div class="contents">
                <table class="table2">
                    <tr>
                        <th class="th" colspan="2">제품명</th>
                        <td><input type="text" name='item_name' placeholder="제품명을 입력해주세요." required></td>
                    </tr>
                </table>

                <div class="bottombox">
                    <!-- 글 입력 버튼 -->
                    <button class="bottom_btn" name="submit" type="submit" value="등록">등록</button>
                    <!-- 입력 내용 초기화 버튼 -->
                    <button class="bottom_btn" type="button" onclick="back()">취소</button>
                </div>
            </div>
        </form>

        <script type="text/javascript">
            // //id가 XX인 객체에 변화가 생기면 checkXX 함수를 변화된 객체의 값을 매개로 호출
            // $("#password").change(function() {
            //     checkPassword($('#password').val());
            // });
            // $("#Title").change(function() {
            //     checkTitle($('#Title').val());
            // });
            // $("#content").change(function() {
            //     checkTitle($('#content').val());
            // });
            // $("#name").change(function() {
            //     checkName($('#name').val());
            // });
            // //입력된 변수의 길이를 참조하여 조건문을 통해 최소 입력 길이 유효성 검사를 하는 함수
            // function checkPassword(password) {
            //     if (password.length < 4) {
            //         alert("비밀번호는 4자 이상 입력하여야 합니다.");
            //         $('#password').val('').focus();
            //         return false;
            //     } else {
            //         return true;
            //     }
            // }

            // function checkTitle(Title) {
            //     if (Title.length < 2) {
            //         alert('제목은 2자 이상 입력해야 합니다.');
            //         $('#Title').val('').focus();

            //         return false;
            //     } else {
            //         return true;
            //     }
            // }

            // function checkContent(content) {
            //     if (content.length < 2) {
            //         alert('내용은 2자리 이상 입력해야 합니다.');
            //         $('#content').val('').focus();
            //         return false;
            //     } else {
            //         return true;
            //     }
            // }

            // function checkName(name) {
            //     if (name.length < 2) {
            //         alert('작성자명은 2자리 이상 입력해야 합니다.');
            //         $('#name').val('').focus();
            //         return false;
            //     } else {
            //         return true;
            //     }
            // }

            function reset() {
                parent.location.href = "/index.html";
            }

            function back() {
                history.back()
            }
        </script>
        <script type="text/javascript" src="/bootstrap/js/bootstrap.js"></script>
    </div>
</body>

</html>
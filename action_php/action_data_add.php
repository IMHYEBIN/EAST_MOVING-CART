<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INRUT</title>
</head>

<body>
    <?php
    $conn = new mysqli("localhost", "server", "00000000", "dataset");

    $item_name = $_POST['item_name'];

    $sql = "insert into item (
        item_name
        )
    values (
    '" . $item_name . "'
    )";

    $res = mysqli_query($conn, $sql);

    ?>
    <script>
        if (<?= $res ?>) {
            alert("등록완료");
            opener.location.reload();
            self.close();
        } else {
            alert("등록실패")
            history.back();
        }
    </script>

</body>

</html>
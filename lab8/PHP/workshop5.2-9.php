<?php include "connect.php";?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
        $stmt->bindParam(1, $_GET["username"]);
        $stmt->execute();
        $row = $stmt->fetch();
    ?>
    <div style="display:flex">
        <div>
            <img src='member_photo/<?=$row["username"]?>.jpg' width='200'>
        </div>
        <div style="padding: 15px">
            <h2><?=$row["name"]?></h2>
            เบอร์โทรศัพท์ : <?=$row["mobile"]?><br>
            อีเมล : <?=$row["email"]?><br>
            ที่อยู่ : <?=$row["address"]?><br>
            <a href="./workshop7.1-9.php">กลับไปหน้าหลัก</a>
        </div>
    </div>
    </body>
</html>
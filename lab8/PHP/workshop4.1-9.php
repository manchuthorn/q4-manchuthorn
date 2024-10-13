<?php include "connect.php";?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <form method="get">
        <input type="text" name="keyword" placeholder="ค้นหาสมาชิก">
        <input type="submit" value="ค้นหา">
    </form>
    <div style="display:flex; flex-wrap: wrap;">
    <?php
        // ตรวจสอบว่ามีการกรอกคำค้นหาหรือไม่
        $value = isset($_GET["keyword"]) ? '%'.$_GET["keyword"].'%' : '%%';
        
        // เตรียมคำสั่ง SQL สำหรับการค้นหา
        $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
        $stmt->bindParam(1, $value);
        $stmt->execute();
    ?>

    <?php while ($row = $stmt->fetch()): ?>
        <div style="padding: 15px; text-align: center">
            <img src='member_photo/<?=htmlspecialchars($row["username"])?>.jpg'><br>
            ชื่อสมาชิก: <?=htmlspecialchars($row["name"])?><br>
            ที่อยู่: <?=htmlspecialchars($row["address"])?><br>
            อีเมล: <?=htmlspecialchars($row["email"])?><br>
        </div>
    <?php endwhile; ?>
    </div>
    </body>
</html>

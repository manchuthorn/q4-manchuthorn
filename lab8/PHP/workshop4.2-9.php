<?php include "connect.php";?>

<html>
    <head>
        <meta charset="utf-8">
        <title>ค้นหาข้อมูลสมาชิก</title>
    </head>
    <body>
    <!-- ฟอร์มค้นหาข้อมูล -->
    <form method="get">
        <label for="keyword">ค้นหาสมาชิก:</label>
        <input type="text" id="keyword" name="keyword" placeholder="กรอกชื่อสมาชิก">
        <input type="submit" value="ค้นหา">
    </form>

    <div style="display: flex; flex-wrap: wrap;">
    <?php
        // ตรวจสอบว่ามีการส่งคำค้นหามาหรือไม่
        if (isset($_GET["keyword"]) && !empty($_GET["keyword"])) {
            $keyword = '%' . $_GET["keyword"] . '%';  // เตรียมค่าคำค้นหาในรูปแบบ LIKE

            // เตรียมคำสั่ง SQL เพื่อค้นหาข้อมูลสมาชิก
            $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
            $stmt->bindParam(1, $keyword);
            $stmt->execute();

            // แสดงผลลัพธ์ที่ค้นพบ
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) {
                    echo "<div style='padding: 15px; text-align: center;'>";
                    echo "<img src='member_photo/" . htmlspecialchars($row["username"]) . ".jpg' alt='Member Photo'><br>";
                    echo "ชื่อสมาชิก: " . htmlspecialchars($row["name"]) . "<br>";
                    echo "ที่อยู่: " . htmlspecialchars($row["address"]) . "<br>";
                    echo "อีเมล: " . htmlspecialchars($row["email"]) . "<br>";
                    echo "</div>";
                }
            } else {
                echo "ไม่พบข้อมูลสมาชิกที่ค้นหา";
            }
        } else {
            echo "กรุณากรอกคำค้นหา";
        }
    ?>
    </div>
    </body>
</html>

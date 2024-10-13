<?php include "connect.php"; ?> 

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>รายละเอียดสินค้า</title>
    <link href="mcss.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php
    // Fetch product details using the provided pid
    $stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
    $stmt->bindParam(1, $_GET["pid"], PDO::PARAM_INT); // รับ pid จาก URL และเชื่อมต่อกับฐานข้อมูล
    $stmt->execute();
    $row = $stmt->fetch(); // ดึงข้อมูลสินค้า
    ?>

    <header>
        <h1>รายละเอียดสินค้า</h1>
    </header>

    <main style="display: flex; justify-content: center; align-items: center; margin-top: 50px;">
        <div style="display: flex; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
            <div>
                <?php
                // กำหนดเส้นทางของรูปภาพสินค้า
                $photoproduct_path = isset($row["pimage"]) ? $row["pimage"] : "product_photo/" . $row["pid"] . ".jpg";
                if (!file_exists($photoproduct_path)) {
                    $photoproduct_path = "default_photo.jpg"; // ใช้รูปภาพเริ่มต้นหากไม่พบรูปภาพที่กำหนด
                }
                ?>
                <img src='<?= $photoproduct_path ?>' width='200' alt="Product Photo"> <!-- แสดงรูปภาพสินค้า -->
            </div>
            <div style="padding: 15px;">
                <h2><?= $row["pname"] ?></h2> <!-- แสดงชื่อสินค้า -->
                <p><strong>รายละเอียด :</strong> <?= $row["pdetail"] ?></p> <!-- แสดงรายละเอียดสินค้า -->
                <p><strong>ราคา :</strong> <?= $row["price"] ?> บาท</p> <!-- แสดงราคาสินค้า -->
                <a href="./user-home.php" style="color: blue;">กลับไปหน้าหลัก</a> <!-- ลิงก์กลับไปหน้าหลัก -->
            </div>
        </div>
    </main>

    
</body>
</html>

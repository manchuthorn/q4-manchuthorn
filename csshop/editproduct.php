<?php include "connect.php"; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>แก้ไขข้อมูลสินค้า</title>
    <link href="mcss.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php
    // ตรวจสอบว่ามีการส่งค่า pid เพื่อดึงข้อมูลสินค้ามาหรือไม่
    if (isset($_GET["pid"])) {
        $stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
        $stmt->bindParam(1, $_GET["pid"]);
        $stmt->execute();
        $row = $stmt->fetch();
    } else {
        echo "ไม่พบข้อมูลสินค้า";
        exit();
    }
    ?>

    <header>
        <h1>แก้ไขข้อมูลสินค้า</h1>
    </header>
    
    <main style="display: flex; justify-content: center; align-items: center; margin-top: 50px;">
        <div style="padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
            <form action="updateproduct.php" method="post" enctype="multipart/form-data">
                <!-- ส่งค่า pid เก่า เพื่อใช้อ้างอิงในการแก้ไขข้อมูล -->
                <input type="hidden" name="old_pid" value="<?= $row["pid"] ?>">
                
                <label for="pid">Product ID:</label>
                <input type="text" id="pid" name="pid" value="<?= $row["pid"] ?>" required><br><br>

                <label for="pname">ชื่อสินค้า:</label>
                <input type="text" id="pname" name="pname" value="<?= $row["pname"] ?>" required><br><br>

                <label for="price">ราคา:</label>
                <input type="number" id="price" name="price" value="<?= $row["price"] ?>" required><br><br>

                <label for="pdetail">รายละเอียดสินค้า:</label><br>
                <textarea id="pdetail" name="pdetail" rows="3" cols="40"><?= $row["pdetail"] ?></textarea><br><br>

                <label for="pimage">รูปสินค้าใหม่:</label>
                <input type="file" id="pimage" name="pimage" accept="image/jpg,image/jpeg,image/png"><br><br>

                <input type="submit" value="บันทึกการแก้ไข">
            </form>
        </div>
    </main>

    
</body>
</html>

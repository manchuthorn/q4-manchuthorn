<?php include "connect.php"; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>แก้ไขข้อมูลสมาชิก</title>
    <link href="mcss.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php
    if (isset($_GET["username"])) {
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
        $stmt->bindParam(1, $_GET["username"]);
        $stmt->execute();
        $row = $stmt->fetch();
    } else {
        echo "ไม่พบข้อมูลสมาชิก";
        exit();
    }
    ?>

    <header>
        <h1>แก้ไขข้อมูลสมาชิก</h1>
    </header>
    
    <main style="display: flex; justify-content: center; align-items: center; margin-top: 50px;">
        <div style="padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
            <form action="updatemember.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="old_username" value="<?= $row["username"] ?>">
                
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?= $row["username"] ?>" required><br><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?= $row["password"] ?>" required><br><br>

                <label for="name">ชื่อ:</label>
                <input type="text" id="name" name="name" value="<?= $row["name"] ?>" required><br><br>

                <label for="address">ที่อยู่:</label><br>
                <textarea id="address" name="address" rows="3" cols="40"><?= $row["address"] ?></textarea><br><br>

                <label for="mobile">เบอร์โทรศัพท์:</label>
                <input type="tel" id="mobile" name="mobile" value="<?= $row["mobile"] ?>" required><br><br>

                <label for="email">อีเมล:</label>
                <input type="email" id="email" name="email" value="<?= $row["email"] ?>" required><br><br>

                <label for="photo">รูปโปรไฟล์ใหม่:</label>
                <input type="file" id="photo" name="photo" accept="image/jpg,image/jpeg,image/png"><br><br>

                <input type="submit" value="บันทึกการแก้ไข">
            </form>
        </div>
    </main>

    
</body>
</html>

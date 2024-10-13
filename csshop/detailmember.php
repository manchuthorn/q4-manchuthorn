<?php include "connect.php"; ?> 

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>รายละเอียดสมาชิก</title>
    <link href="mcss.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bindParam(1, $_GET["username"]);
    $stmt->execute();
    $row = $stmt->fetch();
    ?>

    <header>
    <script>
            function confirmDelete(username) { // ฟังก์ชนจะถูกเรียกถ้าผู้ใช ั คลิกที่ ้ link ลบ
                var ans = confirm("ต้องการลบข้อมูลสมาชิก " + username); // แสดงกล่องถามผู้ใช ้
                if (ans == true) // ถ้าผู้ใชกด ้ OK จะเข ้าเงื่อนไขนี้
                    document.location = "deletemember.php?username=" + username; // สงรหัสส ่ นค ้าไปให ้ไฟล์ ิ delete.php
            }
        </script>
        <h1>รายละเอียดสมาชิก</h1>
    </header>
    <link href="mcss.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-color: #f4f4f4; /* Light background color for the entire page */
            font-family: Arial, sans-serif;
        }

        header, footer {
            text-align: center;
            padding: 20px;
            background-color: #408040;
            color: white;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .member-details {
            display: flex;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #ffffff; /* White background for better visibility */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Add a shadow to make it stand out */
        }

        .member-details img {
            border-radius: 50%;
            margin-right: 20px;
        }

        .member-details div {
            padding: 15px;
        }

        .member-details h2 {
            margin-top: 0;
        }

        .member-details a {
            color: blue;
            text-decoration: none;
            font-weight: bold;
        }

        footer {
            margin-top: 50px;
        }

        footer a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
    <main style="display: flex; justify-content: center; align-items: center; margin-top: 50px;">
    <div style="display: flex; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
    <div>
        <?php
        // กำหนดพาธของรูปภาพ
        $photo_path = isset($row["photo"]) ? $row["photo"] : "member_photo/" . $row["username"] . ".jpg"; // สมมติว่ามีการตั้งนามสกุลเป็น .jpg
        // ตรวจสอบว่ารูปภาพมีอยู่จริงหรือไม่
        if (!file_exists($photo_path)) {
            $photo_path = "default_photo.jpg"; // ใช้รูปภาพเริ่มต้นหากไม่พบ
        }
        ?>
        <img src='<?= $photo_path ?>' width='100' style="border-radius: 50%;" alt="Member Photo">
    </div>
    <div style="padding: 15px;">
        <h2><?= $row["name"] ?></h2>
        <p><strong>เบอร์โทรศัพท์ :</strong> <?= $row["mobile"] ?></p>
        <p><strong>อีเมล :</strong> <?= $row["email"] ?></p>
        <p><strong>ที่อยู่ :</strong> <?= $row["address"] ?></p>
        <a href="editmember.php?username=<?=$row["username"]?>" style="color: blue;">แก้ไขข้อมูล</a>
        <a href='#' onclick='confirmDelete("<?=$row["username"]?> ")' style="color: blue;">ลบ</a><br>
        <a href="./photomember.php" style="color: blue;">กลับไปหน้าหลัก</a>
    </div>
</div>

    </main>

    <footer>
        <a href="#">Sitemap</a>
        <a href="#">Contact</a>
        <a href="#">Privacy</a>
    </footer>
</body>
</html>

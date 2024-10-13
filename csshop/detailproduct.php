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
    $stmt->bindParam(1, $_GET["pid"], PDO::PARAM_INT); // Correct the query parameter
    $stmt->execute();
    $row = $stmt->fetch();
    ?>

<header>
    <script>
            function confirmDelete(pname) { // ฟังก์ชนจะถูกเรียกถ้าผู้ใช ั คลิกที่ ้ link ลบ
                var ans = confirm("ต้องการลบข้อมูลสมาชิก " + pname); // แสดงกล่องถามผู้ใช ้
                if (ans == true) // ถ้าผู้ใชกด ้ OK จะเข ้าเงื่อนไขนี้
                    document.location = "deleteproduct.php?pname=" + pname; // สงรหัสส ่ นค ้าไปให ้ไฟล์ ิ delete.php
            }
        </script>
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

    <header>
        <h1>รายละเอียดสินค้า</h1>
    </header>

    <main style="display: flex; justify-content: center; align-items: center; margin-top: 50px;">
        <div style="display: flex; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
            <div>
                <?php
                // Define the product image path
                $photoproduct_path = isset($row["pimage"]) ? $row["pimage"] : "product_photo/" . $row["pid"] . ".jpg"; // Use default if not found
                if (!file_exists($photoproduct_path)) {
                    $photoproduct_path = "default_photo.jpg"; // ใช้รูปภาพเริ่มต้นหากไม่พบ
                }
                ?>
                <img src='<?= $photoproduct_path ?>' width='100' alt="Product Photo">

            </div>
            <div style="padding: 15px;">
                <h2><?= $row["pname"] ?></h2>
                <p><strong>รายละเอียด :</strong> <?= $row["pdetail"] ?></p>
                <p><strong>ราคา :</strong> <?= $row["price"] ?> บาท</p>
                <a href="editproduct.php?pid=<?=$row["pid"]?>" style="color: blue;">แก้ไขข้อมูล</a>
                <a href='#' onclick='confirmDelete("<?=$row["pid"]?>")' style="color: blue;">ลบ</a><br>
                <a href="./photoproduct.php" style="color: blue;">กลับไปหน้าหลัก</a>
            </div>
        </div>
    </main>

    <footer>
        <a href="#">Sitemap</a>
        <a href="#">Contact</a>
        <a href="#">Privacy</a>
    </footer>

    <script>
        function confirmDelete(pid) {
            var ans = confirm("ต้องการลบข้อมูลสินค้า " + pid + "?");
            if (ans) {
                document.location = "deleteproduct.php?pid=" + pid;
            }
        }
    </script>
</body>
</html>

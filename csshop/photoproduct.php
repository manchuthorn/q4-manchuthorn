<?php include "connect.php"; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="mcss.css" rel="stylesheet" type="text/css" /> <!-- ไฟล์ CSS สไตล์หลัก -->
</head>

<body>

    <header>
        <div class="logo">
            <img src="cslogo.jpg" width="200" alt="Site Logo"> <!-- โลโก้ของร้าน -->
        </div>
        <div class="search">
            <form>
                <input type="search" placeholder="Search the site..."> <!-- ช่องค้นหา -->
                <button>Search</button> <!-- ปุ่มค้นหา -->
            </form>
        </div>
    </header>

    <main>
        <article>
            <h1>สินค้า</h1>
            <div class="product-list" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
                <?php
                // ดึงข้อมูลสินค้าทั้งหมดจากฐานข้อมูล
                $stmt = $pdo->prepare("SELECT * FROM product ORDER BY pid ASC");
                $stmt->execute();
                
                // วนลูปแสดงข้อมูลสินค้า
                while ($row = $stmt->fetch()) : ?>
                    <div class="product-item" style="padding: 15px; text-align: center; margin: 10px; border: 1px solid #ccc; border-radius: 8px; width: 150px;">
                        <a href="detailproduct.php?pid=<?= $row['pid'] ?>">
                        <img src='<?php
                            // ตรวจสอบว่ามีรูปภาพสินค้าหรือไม่
                            if (isset($row["pimage"])) echo $row["pimage"];
                            else echo "product_photo/" . $row["pid"];
                        ?>' width='100'  alt="Product Photo"><br>

                        <!-- แสดงชื่อและราคาสินค้า -->
                        <p><?= $row["pname"] ?><br>
                         <?= $row["price"] ?> บาท</p>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </article>
        
        <!-- เมนูนำทาง -->
        <nav id="menu">
            <h2>Navigation</h2>
            <ul class="menu">
            <li class="dead"><a>Home</a></li>
                <li><a href="./mpage.php">Home</a></li>
                <li><a href="./photoproduct.php">All Products</a></li>
                <li><a href="./tableconnect.php">Table of All Products</a></li>
                <li><a href="./formproduct.html">Insert Product</a></li>
            </ul>
        </nav>

        <!-- เมนูสำหรับสมาชิก -->
        <aside>
            <h2>Member</h2>
            <ul class="menu">
                <li><a href="./formmember.html">InsertMember</a></li>
                <li><a href="./photomember.php">All Member</a></li>
            </ul>
        </aside>
    </main>

    <footer>
        <a href="#">Sitemap</a>
        <a href="#">Contact</a>
        <a href="#">Privacy</a>
    </footer>

</body>

</html>

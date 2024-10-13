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
            <h1>รายชื่อสมาชิก</h1>
            <div class="member-list" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
                <?php
                $stmt = $pdo->prepare("SELECT * FROM member ORDER BY username ASC");
                $stmt->execute();
                while ($row = $stmt->fetch()) : ?>
                    <div class="member-item" style="padding: 15px; text-align: center; margin: 10px; border: 1px solid #ccc; border-radius: 8px; width: 150px;">
                        <a href="detailmember.php?username=<?= $row['username'] ?>">
                        <img src='<?php
                            if (isset($row["photo"])) echo $row["photo"];
                            else echo "member_photo/" . $row["username"];
                        ?>' width='100' style="border-radius: 50%;" alt="Member Photo">
                        <br>
                        </a>
                        <p><?= $row["name"] ?></p> <!-- แสดงชื่อสมาชิก -->
                    </div>
                <?php endwhile; ?>
            </div>
        </article>
        <nav id="menu">
            <h2>Navigation</h2>
            <ul class="menu">
                <li class="dead"><a>Home</a></li>
                <li><a href="./photoproduct.php">All Products</a></li>
                <li><a href="./tableconnect.php">Table of All Products</a></li>
                <li><a href="./formproduct.html">InsertProduct</a></li>
                
            </ul>
        </nav>
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

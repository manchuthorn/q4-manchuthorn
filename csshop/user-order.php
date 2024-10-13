<?php include "connect.php"; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="mcss.css" rel="stylesheet" type="text/css" />
    <script src="mpage.js"></script>
</head>

<body>
    <!-- Header Section -->
    <header>
        <div class="logo">
            <img src="cslogo.jpg" width="200" alt="Site Logo">
        </div>
        <div class="search">
            <form>
                <input type="search" placeholder="Search the site...">
                <button type="submit">Submit</button>
            </form>
        </div>
    </header>

    <!-- Mobile Navigation Bar -->
    <div class="mobile_bar">
        <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
        <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
    </div>

    <!-- Main Content Section -->
    <main>
        <!-- Article for Displaying Orders -->
        <article>
                <body>
            <div class="head-banner">
                <img src=""/>
                <h1><?=$_SESSION["fullname"]?></h1>
            </div>
            <br>
            <h1>รายการคำสั่งซื้อ</h1><br>
            <table>
                <tr>
                    <th>รหัสคำสั่งซื้อ</th>
                    <th>วันที่สั่งซื้อ</th>
                    <th>สถานะ</th>
                </tr>
                <?php
                $stmt = $pdo->prepare("SELECT ord_id, ord_date, `status` FROM orders WHERE username = ?");
                $stmt->bindParam(1, $_GET["username"]);
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row["ord_id"] . "</td>";
                    echo "<td>" . $row["ord_date"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table><br>
            <a href='mpage.php' style="justify-content: right">ย้อนกลับ</a>
        </body>
        </article>

        <!-- Navigation Menu -->
        <nav id="menu">
            <h2>Product</h2>
            <ul class="menu">
                <li class="dead"><a>Home</a></li>
                <li><a href="./mpage.php">Home</a></li>
                <li><a href="./photoproduct.php">All Products</a></li>
                <li><a href="./tableconnect.php">Table of All Products</a></li>
                <li><a href="./formproduct.html">Insert Product</a></li>
            </ul>
        </nav>

        <!-- Sidebar Menu -->
        <aside>
            <h2>Member</h2>
            <ul class="menu">
                <li><a href="./formmember.html">Insert Member</a></li>
                <li><a href="./photomember.php">All Member</a></li>
            </ul>
        </aside>
    </main>

    <!-- Footer Section -->
    <footer>
        <a href="#">Sitemap</a>
        <a href="#">Contact</a>
        <a href="#">Privacy</a>
    </footer>
</body>

</html>


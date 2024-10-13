<?php
session_start();

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบแล้วและเป็น Member หรือไม่
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'Customer') {
    // ถ้าไม่ใช่สมาชิก ให้กลับไปที่หน้าเข้าสู่ระบบ
    header("Location: mpage.html");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="mcss.css" rel="stylesheet" type="text/css" />
    <style>
        .logout {
            color: royalblue;
        }
        ul.member {
            padding: 0 1em;
            margin: 0;
        }
        ul.member li {
            padding: 5px 10px;
            border-bottom: solid 1px #ccddcc;
            font-size: small;
            list-style: none;
        }
        ul.member li:hover {
            background-color: #ccffcc;
        }
        ul.member li a {
            display: block;
            color: #404040;
        }
        ul.member li a:hover {
            text-decoration: underline;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .product-item {
            padding: 15px;
            text-align: center;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 150px;
        }
    </style>
    <script src="mpage.js"></script>
</head>

<body>

    <header>
        <div class="logo">
            <img src="cslogo.jpg" width="200" alt="Site Logo">
        </div>
        <div class="search">
            <form>
                <input type="search" placeholder="Search the site...">
                <button>Search</button>
            </form>
        </div>
    </header>

    <div class="mobile_bar">
        <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
        <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
    </div>

    <main>
        <article>
            <h1>สวัสดี <?= htmlspecialchars($_SESSION["username"]) ?> Welcome to CSSHOP</h1>

            <?php include "connect.php"; ?>

            <?php
            // Initialize the cart if not set
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
            ?>
            <a href="cart.php?action=">สินค้าในตะกร้า (<?= sizeof($_SESSION['cart']) ?>)</a>

            <div class="product-list">
                <?php
                // Fetch all products from the database
                $stmt = $pdo->prepare("SELECT * FROM product ORDER BY pid ASC");
                $stmt->execute();
                
                // Loop through products and display them
                while ($row = $stmt->fetch()) : ?>
                    <div class="product-item">
                        <a href="./detail.php?pid=<?= $row["pid"] ?>">
                        <img src='<?php
                            // ตรวจสอบว่ามีรูปภาพสินค้าหรือไม่
                            if (isset($row["pimage"])) echo $row["pimage"];
                            else echo "product_photo/" . $row["pid"];
                        ?>' width='100'  alt="Product Photo"><br>
                            <p><?= htmlspecialchars($row["pname"]) ?><br><?= htmlspecialchars($row["price"]) ?> บาท</p>
                        </a>
                        <form method="post" action="cart.php?action=add&pid=<?= $row["pid"] ?>&pname=<?= urlencode($row["pname"]) ?>&price=<?= $row["price"] ?>">
                            <input type="number" name="qty" value="1" min="1" max="9">
                            <input type="submit" value="ซื้อ">
                        </form>
                    </div>
                <?php endwhile; ?>
            </div>
        </article>

        <nav id="menu">
            <h2>Menu</h2>
            <ul class="menu">
                <li class="dead"><a>Home</a></li>
                <li><a href="./user-home.php">All Products</a></li>
                <li><a href="./cart.php">Cart</a></li>
                <li><a href="#">Order</a></li>
            </ul>
        </nav>

        <aside>
            <h2>Member</h2>
            <ul class="member">
                <li><a href="./logout.php">Logout</a></li>
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

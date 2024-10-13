<?php

session_start();

// เพิ่มสินค้า
if ($_GET["action"]=="add") {

	$pid = $_GET['pid'];

	$cart_item = array(
 		'pid' => $pid,
		'pname' => $_GET['pname'],
		'price' => $_GET['price'],
		'qty' => $_POST['qty']
	);

	// ถ้ายังไม่มีสินค้าใดๆในรถเข็น
	if(empty($_SESSION['cart']))
    	$_SESSION['cart'] = array();
 
	// ถ้ามีสินค้านั้นอยู่แล้วให้บวกเพิ่ม
	if(array_key_exists($pid, $_SESSION['cart']))
		$_SESSION['cart'][$pid]['qty'] += $_POST['qty'];
 
	// หากยังไม่เคยเลือกสินค้นนั้นจะ
	else
	    $_SESSION['cart'][$pid] = $cart_item;

// ปรับปรุงจำนวนสินค้า
} else if ($_GET["action"]=="update") {
	$pid = $_GET["pid"];     
	$qty = $_GET["qty"];
	$_SESSION['cart'][$pid]['qty'] = $qty;

// ลบสินค้า
} else if ($_GET["action"]=="delete") {
	
	$pid = $_GET['pid'];
	unset($_SESSION['cart'][$pid]);
}
?>


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
        .logout{
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
        }

        ul.member li a {
            color: #404040;
        }

        ul.member li a:hover {
            text-decoration: underline;
        }
    </style>
    <script src="mpage.js"></script>
	<script>
	// ใช้สำหรับปรับปรุงจำนวนสินค้า
	function update(pid) {
		var qty = document.getElementById(pid).value;
		// ส่งรหัสสินค้า และจำนวนไปปรับปรุงใน session
		document.location = "cart.php?action=update&pid=" + pid + "&qty=" + qty; 
	}
</script>
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
            <h1>สินค้าในตะกร้าของ <?= $_SESSION["username"] ?> </h1>
            <?php include "connect.php" ?>
<?php session_start(); ?>
<html>
<body>
<form>
<table border="1">
<?php 
	$sum = 0;
	foreach ($_SESSION["cart"] as $item) {
		$sum += $item["price"] * $item["qty"];
?>
	<tr>
		<td><?=$item["pname"]?></td>
		<td><?=$item["price"]?></td>
		<td>			
			<input type="number" id="<?=$item["pid"]?>" value="<?=$item["qty"]?>" min="1" max="9">
			<a href="#" onclick="update(<?=$item["pid"]?>)">แก้ไข</a>
			<a href="?action=delete&pid=<?=$item["pid"]?>">ลบ</a>
		</td>
	</tr>
<?php } ?>
<tr><td colspan="3" align="right">รวม <?=$sum?> บาท</td></tr>
</table>
</form>

<a href="user-home.php">< เลือกสินค้าต่อ</a>
</body>
</html>
</article>
<nav id="menu">
    <h2>Menu</h2>
    <ul class="menu">
        <li class="dead"><a>Home</a></li>
        <li><a href="./user-home.php">All Products</a></li>
        <li><a href="./cart.php">Cart</a></li>
        <li><a href="#">Order</a></li>
        <!-- <li><a href="./tableconnect.php">Table of All Products</a></li> -->
        <!-- <li><a href="./formproduct.html">InsertProduct</a></li> -->
        <!-- <li><a href="./formmember.html">InsertMember</a></li> -->
        <!-- <li><a href="#">Page 07</a></li> -->
    </ul>
</nav>
<aside>
    <h2>Member</h2>
    <ul class="member">
        <li><a href="./logout.php">Logout</a></li>
        <!-- <li><a href="./linkmember.php">View All Members</a></li> -->
    </ul>
</aside>
</main>

</body>

</html>
<html>
<head>

</head>

</html>
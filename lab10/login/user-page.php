<?php 
    include "connect.php";
    session_start(); 
?>

<html>
    <head>
    <style>
        * {
            margin: 0px;
        }
        .head-banner {
            background-color: blue;
            color: white;
            padding: 20px;
            height: 60px;
        }
        th, td {
            border-style: solid;
            border-color: #96D4D4;
            border-collapse: collapse;
        }
    </style>
    </head>
    <body>
        <div class="head-banner">
            <img src=""/>
            <h1><?=$_SESSION["fullname"]?></h1>
        </div>
        <br>
        <h1>รายการคำสั่งซื้อ</h1><br>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Product Name</th>
                <th>Product Detail</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        <?php
            $stmt = $pdo->prepare("SELECT orders.ord_id, orders.ord_date, orders.status, item.pid, product.pname, product.pdetail, item.quantity, product.price
            FROM orders
            INNER JOIN item ON orders.ord_id = item.ord_id
            INNER JOIN product ON item.pid = product.pid
            WHERE orders.username = ?;");
            $stmt->bindParam(1, $_SESSION["username"]);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>".$row['ord_id']."</td>";
                echo "<td>".$row['ord_date']."</td>";
                echo "<td>".$row['pname']."</td>";
                echo "<td>".$row['pdetail']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['quantity']."</td>";
                $totalPrice = $row['price'] * $row['quantity'];
                echo "<td>".$totalPrice."</td>";
                echo "</tr>";
            }
        ?>
        </table><br>
        <a href='logout.php' style="justify-content: right">ออกจากระบบ</a>
</body>
</html>
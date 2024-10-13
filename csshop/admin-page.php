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
            <th>ชื่อผู้ใช้</th>
            <th>จำนวนคำสั่งซื้อ</th>
        </tr>
        <?php
        $stmt = $pdo->prepare("SELECT username, COUNT(*) AS total_orders
        FROM orders
        GROUP BY username;");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>"."<a href="."user-order.php?username=".$row["username"].">".$row["total_orders"]."</a>"."</td>";
            echo "</tr>";
        }
        ?>
        </table><br>
        <a href='logout.php' style="justify-content: right">ออกจากระบบ</a>
    </body>
</html>
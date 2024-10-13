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
    <a href='admin-page.php' style="justify-content: right">ย้อนกลับ</a>
</body>
</html>

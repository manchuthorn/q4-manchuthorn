<?php include "connect.php" ?>
<html>
<head>
    <meta charset="utf-8">
    <style>
        tabel,th,td{
            border:1px solid black;
        }
    </style>
</head>
    <body>
        <table>
            <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>รายละเอียด</th>
                <th>ราคา</th>
            </tr>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM product");
                $stmt->execute();
                while ($row = $stmt->fetch()) :
                ?>
                <tr>
                    <td> <?=$row["pid"]?> </td>
                    <td> <?=$row["pname"]?> </td>
                    <td> <?=$row["pdetail"]?> </td>
                    <td> <?=$row["price"]?> บาท </td>
                </tr>
            <?php endwhile?>

        </table>
    </body>
</html>
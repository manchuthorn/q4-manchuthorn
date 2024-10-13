<?php include "connect.php";?>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username =?");
        $stmt->bindParam(1,$_GET["username"]);
        $stmt->execute();
        $row = $stmt->fetch();
    ?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <form action="workshop9.3-9.php" method="post">
        Username : 
        <input type="text" name="username" value="<?=$row["username"]?>"><br>
        Password : 
        <input type="password" name="password" value="<?=$row["password"]?>"><br>
        ชื่อ - สกุล : 
        <input type="text" name="name" value="<?=$row["name"]?>"><br>
        ที่อยู่ : 
        <textarea name="address" rows="2"><?=$row["address"]?></textarea><br>
        เบอร์โทรศัพท์ : 
        <input type="text" name="mobile" value="<?=$row["mobile"]?>"><br>
        E-mail : 
        <input type="text" name="email" value="<?=$row["email"]?>"><br>
        <input type="submit" value="อัพเดตข้อมูล"><br>
    </form>
    </body>
</html>
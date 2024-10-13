<?php include "connect.php";?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <div style="display:flex">
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
    ?>
    <?php while ($row = $stmt->fetch()): ?>
        <div style="padding: 15px; text-align: center">
            <a href="workshop5.2.php?username=<?=$row["username"]?>">
                <img src='member_photo/<?=$row["username"]?>.jpg'>
            </a><br>   
            <?=$row["name"]?><br>
        </div>
    <?php endwhile; ?>
    </div>
    <hr>
    <form action="workshop7.2-9.php" method="post">
        Username : 
        <input type="text" name="username"><br>
        Password : 
        <input type="password" name="password"><br>
        ชื่อ - สกุล : 
        <input type="text" name="name"><br>
        ที่อยู่ : 
        <textarea name="address" row="2"></textarea><br>
        เบอร์โทรศัพท์ : 
        <input type="text" name="mobile"><br>
        E-mail : 
        <input type="text" name="email"><br>
        <input type="submit" value="เพิ่มสมาชิก"><br>
    </form>
    </body>
</html>
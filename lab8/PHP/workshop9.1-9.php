<?php include "connect.php";?>

<html>
    <head>
        <meta charset="utf-8">
        <script>
            function confirmDelete(username) {
                var ans = confirm("ต้องการลบผู้ใช้ "+username+" ใช่หรือไม่");
                if (ans==true)
                    document.location = "workshop6.2-9.php?username="+username;
            }
        </script>
    </head>
    <body>
    <div style="display:flex">
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
    ?>
    <?php while ($row = $stmt->fetch()): ?>
        <div style="padding: 15px; text-align: center">
            <a href="workshop5.2-9.php?username=<?=$row["username"]?>">
                <img src='member_photo/<?=$row["username"]?>.jpg'>
            </a><br>   
            <?=$row["name"]?><br>
            <a href="workshop9.2-9.php?username=<?=$row["username"]?>">แก้ไข</a>
            <a href='#' onclick='confirmDelete("<?=$row["username"]?>")'>ลบ</a>
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
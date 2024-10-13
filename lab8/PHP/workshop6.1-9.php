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
            <a href="workshop5.1-9.php">
                <img src='member_photo/<?=$row["username"]?>.jpg'>
            </a><br>   
            <?=$row["name"]?><br>
            <a href='#' onclick='confirmDelete("<?=$row["username"]?>")'>ลบ</a>
        </div>
    <?php endwhile; ?>
    </div>
    <hr>
</html>
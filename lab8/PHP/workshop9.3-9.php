<?php include "connect.php" ?>

<?php
    $stmt = $pdo->prepare("UPDATE member SET username=?, password=?, name=?, address=?, mobile=?, email=? WHERE username=?");

    $stmt->bindParam(1, $_POST["username"]);
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->bindParam(3, $_POST["name"]);
    $stmt->bindParam(4, $_POST["address"]);
    $stmt->bindParam(5, $_POST["mobile"]);
    $stmt->bindParam(6, $_POST["email"]);
    $stmt->bindParam(7, $_POST["username"]);
    
    if ($stmt->execute())
        echo "แก้ไขรายละเอียด " . $_POST["username"] . " แล้ว";
    
?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <a href="./workshop9.1-9.php">กลับไปหน้าหลัก</a>
    </body>
</html>

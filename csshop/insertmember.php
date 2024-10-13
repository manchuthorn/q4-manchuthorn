<?php include "connect.php" ?>

<?php

$photo = $_FILES['photo'];
        $photo_path = 'member_photo/' . basename($photo['name']); // Specify your upload directory
        
//$member_img = $member_dir . basename($filem_id . "_" . $_FILES["photo"]["name"]);
if (move_uploaded_file($photo['tmp_name'], $photo_path)) {
    // Insert the product data along with the image path into the database
    $stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ? , ?, ?, ?, ?)");
    $stmt->bindParam(1, $_POST["username"]);
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->bindParam(3, $_POST["name"]);
    $stmt->bindParam(4, $_POST["address"]);
    $stmt->bindParam(5, $_POST["mobile"]);
    $stmt->bindParam(6, $_POST["email"]);
    $stmt->bindParam(7, $photo_path);
    $stmt->execute();
    $username = $_POST["username"];
    // Redirect to the product page or show success message
    //echo "File uploaded and product saved successfully!";
    header("location:detailmember.php?username=".$username);
} else {
    echo "Failed to upload the image!";
}


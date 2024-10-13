<?php
include "connect.php";

$product_img = $_FILES['photoproduct'];
    $photoproduct_path = 'product_photo/'. basename($photo['name']);


// Move the uploaded file to the target directory
if (move_uploaded_file($product_img["pimage"]["tmp_name"], $photoproduct_path)) {
    // Insert the product data along with the image path into the database
    $stmt = $pdo->prepare("INSERT INTO product (pid, pname, pdetail, price, pimage) VALUES (?, ?, ?, ?, ?)");

    $pid = (int)$_POST["pid"];
    $stmt->bindParam(1, $pid, PDO::PARAM_INT);
    
    $stmt->bindParam(2, $_POST["pname"]);
    $stmt->bindParam(3, $_POST["pdetail"]);

    $price = (int)$_POST["price"];
    $stmt->bindParam(4, $price);

    $stmt->bindParam(5, $product_img); // Save the full image path in the database
    $stmt->execute();
    $username = $_POST["username"];

    // Redirect to the product page or show success message
    header("location:detailproduct.php?username=".$pid);
} else {
    echo "Failed to upload the image!";
}


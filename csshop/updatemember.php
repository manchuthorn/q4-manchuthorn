<?php
include "connect.php"; // Connect to your database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $old_username = $_POST['old_username'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    // Handle file upload for photo
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $photo = $_FILES['photo'];
        $photo_path = 'member_photo/' . basename($photo['name']); // Specify your upload directory
        move_uploaded_file($photo['tmp_name'], $photo_path);
    } else {
        // Use old photo path or handle accordingly
        $photo_path = ""; // Update this logic as necessary
    }

    // Prepare SQL statement to update the member
    $stmt = $pdo->prepare("UPDATE member SET username = ?, password = ?, name = ?, address = ?, mobile = ?, email = ?, photo = ? WHERE username = ?");
    $stmt->execute([$username, $password, $name, $address, $mobile, $email, $photo_path, $old_username]);

    header("Location: detailmember.php?username=" 
    . $username);
    exit();
}
?>

<?php
// Include the database connection
include "connect.php";

// Handle form submission to add a new member
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare an SQL statement to insert a new member
    $stmt = $pdo->prepare("INSERT INTO member (username, password, name, address, mobile, email) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Bind parameters from the form
    $stmt->bindParam(1, $_POST["username"]);
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->bindParam(3, $_POST["name"]);
    $stmt->bindParam(4, $_POST["address"]);
    $stmt->bindParam(5, $_POST["mobile"]);
    $stmt->bindParam(6, $_POST["email"]);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "<script>alert('เพิ่มสมาชิกสำเร็จ');</script>";
    } else {
        echo "<script>alert('การเพิ่มสมาชิกล้มเหลว');</script>";
    }
}
?>
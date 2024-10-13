<?php
  include "connect.php";
  
  session_start();

  $stmt = $pdo->prepare("SELECT * FROM members WHERE username = ? AND password = ?");
  $stmt->bindParam(1, $_POST["username"]);
  $stmt->bindParam(2, $_POST["password"]);
  $stmt->execute();
  $row = $stmt->fetch();

  // หาก username และ password ตรงกัน จะมีข้อมูลในตัวแปร $row
  if (!empty($row)) { 
    // นำข้อมูลผู้ใช้จากฐานข้อมูลเขียนลง session 2 ค่า
    $_SESSION["fullname"] = $row["name"];   
    $_SESSION["username"] = $row["username"];
    if ($row["role"] == "admin"){
      $_SESSION["role"] = "admin";
      header("location: admin-page.php");
    }
    else{
      $_SESSION["role"] = "user";
      header("location: user-page.php");
    } 
  } 
  else {
    echo "ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง";
    echo "<a href='login-form.php'>เข้าสู่ระบบอีกครัง</a>"; 
  }
?>

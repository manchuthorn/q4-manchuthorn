<?php include "connect.php";?>

<?php
if (isset($_GET["username"])) {
    $username = $_GET["username"];
    $stmt = $pdo->prepare("DELETE FROM member WHERE username = ?");
    $stmt->bindParam(1, $username);
    
    if ($stmt->execute()) {
        header("location: workshop6.1-9.php");
    } else {
        echo "เกิดข้อผิดพลาดในการลบผู้ใช้";
    }
} else {
    echo "ไม่ได้ระบุชื่อผู้ใช้ที่ต้องการลบ";
}
?>

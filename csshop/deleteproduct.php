<?php include "connect.php" ?>
<?php
// เตรียมค าสง


$stmt = $pdo->prepare("DELETE FROM product WHERE pname=?");
$stmt->bindParam(1, $_GET["pname"]); // ก าหนดค่าลงในต าแหน่ง ?
if ($stmt->execute()) // เริ่มลบข้อมูล
    header("location: photoproduct.php"); // กลับไปแสดงผลหน้าข้อมูล

?>
<?php
include "connect.php"; // เชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับข้อมูลจากฟอร์ม
    $old_pid = $_POST['old_pid'];
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $pdetail = $_POST['pdetail'];

    // ตรวจสอบว่ามีการอัปโหลดรูปสินค้าใหม่หรือไม่
    if (isset($_FILES['pimage']) && $_FILES['pimage']['error'] == UPLOAD_ERR_OK) {
        $pimage = $_FILES['pimage'];
        $pimage_path = 'product_photo/' . basename($pimage['name']); // กำหนดเส้นทางการอัปโหลดรูปภาพ
        move_uploaded_file($pimage['tmp_name'], $pimage_path);
    } else {
        // ถ้าไม่มีการอัปโหลดรูปใหม่ ให้ใช้รูปเก่า (ปรับให้ตรงกับโครงสร้างฐานข้อมูลของคุณ)
        $pimage_path = ""; // ตรวจสอบจากฐานข้อมูลแล้วนำค่าที่เก็บไว้มาใช้
    }

    // อัปเดตข้อมูลสินค้าในฐานข้อมูล
    $stmt = $pdo->prepare("UPDATE product SET pid = ?, pname = ?, price = ?, pdetail = ?, pimage = ? WHERE pid = ?");
    $stmt->execute([$pid, $pname, $price, $pdetail, $pimage_path, $old_pid]);

    
}
// หลังจากอัปเดตเสร็จสิ้น ให้เปลี่ยนเส้นทางไปยังหน้ารายละเอียดสินค้านั้น
header("Location: detailproduct.php?pid=" . $pid);
exit(); // หยุดการทำงานของสคริปต์เพื่อป้องกันการรันคำสั่งต่อไป
?>

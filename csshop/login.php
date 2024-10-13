<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="mcss.css" rel="stylesheet" type="text/css" />
    <style>
        /* CSS เพื่อจัดกลางหน้าจอ */
        body {
            display: flex;
            flex-direction: column;
            align-items: center; /* จัดกลางแนวนอน */
            justify-content: center; /* จัดกลางแนวตั้ง */
            height: 100vh; /* ความสูงของหน้าจอเต็ม */
            margin: 0; /* ลบ margin ของ body */
            font-family: Arial, sans-serif;
            background-color: #efffef; /* สีพื้นหลัง */
        }

        header {
            display: flex; /* ใช้ flexbox ใน header */
            flex-direction: column; /* เรียงในแนวตั้ง */
            align-items: center; /* จัดกลางแนวนอน */
        }

        h1 {
            background: transparent; /* ลบพื้นหลัง */
            margin: 0; /* ลบ margin ของ h1 */
            padding: 10px; /* ช่องว่างรอบๆ เนื้อหา */
        }

        form {
            background: white; /* สีพื้นหลังของแบบฟอร์ม */
            padding: 50px; /* ช่องว่างรอบๆ เนื้อหา */
            border-radius: 8px; /* มุมโค้ง */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* เงา */
            text-align: center; /* จัดข้อความกลาง */
        }

        input[type="text"], input[type="password"] {
            width: 100%; /* ความกว้างเต็ม */
            padding: 10px; /* ช่องว่างภายใน */
            margin: 10px 0; /* ช่องว่างด้านบนและด้านล่าง */
            border: 1px solid #ccc; /* เส้นขอบ */
            border-radius: 4px; /* มุมโค้ง */
        }

        input[type="submit"] {
            background-color: #408040; /* สีพื้นหลังของปุ่ม */
            color: white; /* สีข้อความ */
            border: none; /* ไม่ให้มีเส้นขอบ */
            padding: 10px; /* ช่องว่างภายใน */
            border-radius: 4px; /* มุมโค้ง */
            cursor: pointer; /* แสดง cursor เป็นมือ */
        }

        input[type="submit"]:hover {
            background-color: #306030; /* เปลี่ยนสีเมื่อ hover */
        }

        p {
            color: red; /* สีข้อความสำหรับ error */
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">
            <img src="cslogo.jpg" width="200" alt="Site Logo">
        </div>
        <h1>Login</h1>
    </header>

    <main>
        <form action="check-login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
    </main>

</body>

</html>

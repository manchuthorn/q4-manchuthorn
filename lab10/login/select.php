<html>
    <body>
        <?php
            if (empty($_COOKIE["lang"])) {
                setcookie("lang", $_GET["language"], time() + 3600 * 24);
            }
            if (isset($_COOKIE["lang"])) {
                setcookie("lang", $_GET["language"], time() + 3600 * 24);
            }
        ?>
        <a href="main.php"> กลับไปหน้าหลัก </a>
    </body>
</html>
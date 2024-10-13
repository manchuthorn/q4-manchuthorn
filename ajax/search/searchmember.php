<?php
include "connect.php";

$keyword = $_GET["keyword"];

$stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE :keyword");
$stmt->execute(['keyword' => '%' . $keyword . '%']);
$row = $stmt->fetch();

if ($row) {
?>
    <div>
    <?php if ($row["photo"] && file_exists('./member_photo/' . $row["photo"])): ?>
        <img src='./member_photo/<?= $row["photo"] ?>' width='200' alt='Member Photo'>
    <?php else: ?>
        <img src='./member_photo/default.jpg' width='200' alt='Default Photo'>
    <?php endif; ?>
    </div>

    <div style="padding: 15px">
        <h2><?= htmlspecialchars($row["name"]) ?></h2>
        Address: <?= htmlspecialchars($row["address"]) ?><br>
        Tel.: <?= htmlspecialchars($row["mobile"]) ?><br>
        Email: <?= htmlspecialchars($row["email"]) ?><br>
    </div>
<?php
} else {
    echo "<p>No member found with that name.</p>";
}
?>

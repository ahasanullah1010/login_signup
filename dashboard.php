<?php
include 'auth.php'; // Protect the page with authentication middleware

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Welcome, <?= htmlspecialchars($user['full_name']) ?></h2>
    <p>Email: <?= htmlspecialchars($user['email']) ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>

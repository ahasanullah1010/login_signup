
<?php
// middleware for authentication and authorization
session_start();

// Set session timeout in seconds
$timeout_duration = 600; // 10 minutes

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: index.php?session_expired=true");
    exit;
}

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$_SESSION['last_activity'] = time(); // Update timestamp
?>

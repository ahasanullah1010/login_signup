<?php

include 'config.php';

$message = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $fullname = $_POST["full_name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $address = $_POST["address"];
    $birthdate = $_POST["birthdate"];

    $query = "INSERT INTO users(full_name, email, password, address, birthdate) VALUES (?,?,?,?,?)";

    $statement = $conn->prepare($query);
    $statement->bind_param("sssss", $fullname, $email, $password, $address, $birthdate);
    
    if ($statement->execute()) {
        $message = "<div class='success'>Signup successful! <a href='index.php'>Login now</a></div>";
    } else {
        $message = "<div class='error'>Signup failed: " . $statement->error . "</div>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="">
        <h2>Signup</h2>
        <?= $message ?>
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="birthdate" placeholder="Date of Birth (dd/mm/yyyy)" required>
        <button type="submit">Signup</button>
        <p>Already have an account? <a href="index.php">Login here</a></p>
    </form>
</body>
</html>
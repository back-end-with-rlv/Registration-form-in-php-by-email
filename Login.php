<?php 
// login.php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $conn = require __DIR__ . "/../databases/db.php";

    $email = $conn->real_escape_string($_POST['email']); 

    $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $email);

    $result = $conn->query($sql);

    if ($result) {
        $user = $result->fetch_assoc();
        if($user) {
            // User found, verify password
            if(password_verify($_POST['password'], $user['password_hash'])) {
				session_start();
				session_regenerate_id();
				$_SESSION['user_id'] 	= $user['id'];
				header("Location:index.php");
				exit;
            } else {
                // Password does not match
                die("Incorrect password");
            }
        } else {
            // User not found
            die("User not found");
        }
    } else {
        // Error executing query
        echo "Error executing query: " . $conn->error;
    }

    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
</head>
<body>
    <h1>Login Page</h1>
	<form method="post">
	   <label for="name">Email</label>
	   <input type="email" name="email" placeholder="Enter your email">
	   <label for="password" >Password </label>
	   <input type="text" name="password" placeholder="Enter your password">
	   <input type="submit" value="Login">
	</form>
	<a href="forget_password.php">Forget Password</a>
	</body>
	</html>

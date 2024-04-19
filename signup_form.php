<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'user');
    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['con_password'];

    // Validate form fields
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        die("All fields are required");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    if (strlen($password) < 8) {
        die("Password must be at least 8 characters");
    }

    if (!preg_match("/[a-zA-Z]/", $password)) {
        die("Password must contain at least one letter");
    }

    if (!preg_match("/[0-9]/", $password)) {
        die("Password must contain at least one number");
    }

    if ($password !== $confirm_password) {
        die("Passwords do not match");
    }

    // Check if email already exists in the database
    $sql_check_email = "SELECT * FROM user WHERE email = '$email'";
    $result_check_email = mysqli_query($conn, $sql_check_email);
    if (mysqli_num_rows($result_check_email) > 0) {
        die("Email already exists");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql_insert_user = "INSERT INTO user (name, email, password_hash) VALUES ('$name', '$email', '$hashed_password')";
    if (mysqli_query($conn, $sql_insert_user)) {
        header("Location: login.php");
        exit;
    } else {
        die("Error: " . mysqli_error($conn));
    }

    // Close database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
</head>
<body>
    <h1>Sign Up Form</h1>
    <form action="signup_form.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter Your name...">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Enter Your email...">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Your password...">
        </div>
        <div>
            <label for="con_password">Confirm Password</label>
            <input type="password" name="con_password" id="con_password" placeholder="Confirm Your password...">
        </div>
        <div>
            <input type="submit" name="submit" value="Sign Up">
        </div>
    </form>
</body>
</html>

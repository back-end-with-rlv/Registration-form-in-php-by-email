<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['email'])) {
    $email = $_POST['email'];
     
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry_date = date("Y-m-d H:i:s", time() + 60 * 30);
 
    $conn = require __DIR__ . "/../databases/db.php";
    $sql = "UPDATE user SET rest_token_hash = ?, rest_token_expires_at = ? WHERE email = ? ";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sss", $token_hash, $expiry_date, $email);
    $stmt->execute();

    if ($conn->affected_rows) { 
	require 'mailer.php';

        //$mail = new PHPMailer(true);
        $mail->setFrom("ratanlalverma1996@gmail.com", "My Application");
        $mail->addAddress($email);
        $mail->Subject = "Password Reset";
        $mail->Body = <<<END
            Click <a href="http://localhost/Mail/reset_password.php?token=$token">Here</a> to reset your password.
        END;

        try {
            $mail->send();
            echo "Email sent. Please check your inbox.";
        } catch(Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Failed to update user information.";
    }
} else {
    echo "Email not submitted!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
</head>
<body>
    <h1>Forget Password</h1>
    
    <form method="post" enctype="multipart/form-data">
        <label for="email">Email Send </label>
        <input type="email" name="email" placeholder="Enter email for forget password" id="name">
        <input type="submit" name="submit" value="Send Email">
    </form>
</body>
</html>

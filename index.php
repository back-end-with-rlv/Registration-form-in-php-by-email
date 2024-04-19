<?php 

session_start();
if(isset($_SESSION['user_id'])){
	$conn = require __DIR__ . "/../databases/db.php";
	
	$sql = "SELECT * FROM user 
	        WHERE id = {$_SESSION['user_id']}";
			
	$result = $conn->query($sql);
    $user = $result->fetch_assoc();	
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
</head>
<body>
    <h1>Home</h1>
    <?php if(isset($user)): ?>
        <p>Hello <?php echo htmlspecialchars($user['name']); ?></p>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a> or <a href="signup_form.php">Sign Up</a>
    <?php endif; ?>
</body>
</html>
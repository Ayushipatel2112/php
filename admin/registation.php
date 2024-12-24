<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" href="include/style.css">
</head>
<body>
	<form action="registation.php" method="post">
		<h2>Registration Form</h2>
		<label for="username">Username:</label>
		<input type="text" id="username" name="username"><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email"><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br><br>
		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password"><br><br>
		<input type="submit" value="Register">
	</form>
</body>
</html>

<?php
// Configuration
include('include/config.php');

// Register user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];

	if ($password == $confirm_password) {
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		$query = "INSERT INTO register (username, email, password) VALUES ('$username', '$email', '$password_hash')";
		$result = $conn->query($query);

		if ($result) {
			echo "Registration successful!";
		} else {
			echo "Error: " . $query . "<br>" . $conn->error;
		}
	} else {
		echo "Passwords do not match.";
	}
}

$conn->close();
?>
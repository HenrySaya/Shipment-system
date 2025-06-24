<?php
session_start();
include "functions.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	$role = test_input($_POST['role']);


	if (empty($username)) {
		header("Location: loginform.php?error=User Name is Required");
	} else if (empty($password)) {
		header("Location: loginform.php?error=Password is Required");
	} else {
		// Use prepared statement to fetch user by username
		$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows === 1) {
			$row = $result->fetch_assoc();
			if (password_verify($password, $row['password']) && $row['role'] === $role) {
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['role'] = $row['role'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['login'] = true;
				header("Location: role.php");
			} else {
				header("Location: loginform.php?error=Incorrect User name or password");
			}
		} else {
			header("Location: loginform.php?error=Incorrect User name or password");
		}
		$stmt->close();
	}
} else {
	header("Location: loginform.php");
}

<?php
	require '../Database.php';
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];
	$db = new Database('localhost','root','');
	$login = $db->login($username,$password);
	foreach ($login as $x) {
		if ($username == $x['username'] && $password == $x['password']) {
			$_SESSION['username'] = $username;
			header("location:dashboard.php");
		}
		else{
			//header("location:index.php");
			var_dump($login);
		}
	}
?>
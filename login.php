<?php
	session_start();
	require_once "DbConnection.php";
	require_once "UsersRepository.php";
	require_once "User.php";
	
	if((!isset($_POST['login']))||(!isset($_POST['pass']))){
		header('Location:index.php');
		exit();
	} else {
		$insertedLogin = $_POST['login'];
		$insertedPassword = $_POST['pass'];	
	}

	$dbConnection = new DbConnection;
	$connection = $dbConnection->getConnect();

	$user = new User($insertedLogin, $insertedPassword);
	if($user->isExists($connection)){
		$_SESSION['loggedIn'] = true; 
		$_SESSION['user'] = $user->getLogin();
		unset($_SESSION['wrongLogInfo']);
		header('Location:account.php');
	} else {
		$_SESSION['wrongLogInfo']= '<span style="color:red"> Błędny login lub hasło!</span>';
		$connection->close();
		header('Location:index.php');
	}
	$connection->close();
?>
<?php
	session_start();
	require_once "DbConnection.php";
	require_once "UsersRepository.php";
	require_once "User.php";
	
	$newUser = new User($_POST['login'], $_POST['password']);
	
	if((!isset($_POST['login']))||(!isset($_POST['password']))||(!isset($_POST['email']))){
		header('Location:registration.php');
		exit();
	} elseif($newUser->loginIsBusy($newUser->getLogin())){
		$_SESSION['wrongRegInfo']= '<span style="color:red"> Ten login jest już zajęty! </span>';
		header('Location:registration.php');
		exit();
	} elseif($_POST['password']!=$_POST['confirm_password']){
		$_SESSION['wrongRegInfo']= '<span style="color:red"> Wprowadzone hasła nie są identyczne!</span>';
		header('Location:registration.php');
		exit();
	} elseif($_POST['email']!=$_POST['confirm_email']){
		$_SESSION['wrongRegInfo']= '<span style="color:red"> Wprowadzone nazwy e-mail nie są identyczne!</span>';
		header('Location:registration.php');
		exit();
	} else {
		$newUserLogin = $_POST['login'];
		$newUserPassword = $_POST['password'];
		$newUserMail = $_POST['email'];
	}
?>
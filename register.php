<?php
	session_start();
	require_once "DbConnection.php";
	require_once "UsersRepository.php";
	require_once "User.php";
	
	$newUserLogin = $_POST['login'];
	$newUserPassword = $_POST['password'];
	$newUserMail = $_POST['email'];
	$newUser = new User($newUserLogin, $newUserPassword, $newUserMail);
	$userRepository = $newUser->getUserRepository();
	
	if((!isset($_POST['login']))||(!isset($_POST['password']))||(!isset($_POST['email']))){
		header('Location:registration.php');
		exit();
	} elseif($userRepository->loginIsBusy($newUser->getLogin())){
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
		$userRepository->addUser($newUser);
		$_SESSION['justRegisteredInfo']='<span style="color:blue"> Rejestracja przebiegła pomyślnie.</span><br /><br />';
		header('Location:index.php');
	}
?>

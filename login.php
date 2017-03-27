<?php
	session_start();
	require_once "dbconnect.php";

	class User{
		private $login;
		private $password;
		
		function __construct($login,$password){
			$this->login = $login;
			$this->password = $password;
		}
		function getLogin(){
			return $this->login;
		}
		function isExists($conn){
			$query = "SELECT * FROM users WHERE login='$this->login' AND password ='$this->password'";
			if($result=$conn->query($query)){
				$howMuchUsersInDB = $result->num_rows;
				if($howMuchUsersInDB>0){
					$result->free_result();
					$conn->close();
					return true;
				}else{
					return false;
				}
			}
		}
	}
	$connection = new Connection;
	$conn = $connection->getConnect();

	if(isset($_POST['log'])){
		$insertedLogin = $_POST['login'];
		$insertedPassword = $_POST['pass'];
	}
	$user = new User($insertedLogin, $insertedPassword);
	if($user->isExists($conn)){
		$_SESSION['user'] = $user->getLogin();
		unset($_SESSION['wrongLogInfo']);
		header('Location:account.php');
	} else {
		$_SESSION['wrongLogInfo']= '<span style="color:red"> Błędny login lub hasło!</span>';
		$conn->close();
		header('Location:index.php');
	}
?>
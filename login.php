<?php
	session_start();
	require_once "DbConnection.php";
	
	if((!isset($_POST['login']))||(!isset($_POST['pass']))){
		header('Location:index.php');
		exit();
	} else {
		$insertedLogin = $_POST['login'];
		$insertedPassword = $_POST['pass'];	
	}

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
		function isExists($conn){ //return true if user login and password exists in database (return false if not)
			
			$stmt = $conn->prepare("SELECT * FROM users WHERE login = ? AND password = ?");
			$stmt->bind_param('ss', $this->login, $this->password);
			$stmt->execute();
			
			$result = $stmt->get_result();
			$howMuchUsersInDB = $result->num_rows;
			if($howMuchUsersInDB>0){
				$result->free_result();
				return true;
			}else{
				return false;
			}
			
		}
	}
	$connection = new DbConnection;
	$conn = $connection->getConnect();

	$user = new User($insertedLogin, $insertedPassword);
	if($user->isExists($conn)){
		$_SESSION['loggedIn'] = true; 
		$_SESSION['user'] = $user->getLogin();
		unset($_SESSION['wrongLogInfo']);
		header('Location:account.php');
	} else {
		$_SESSION['wrongLogInfo']= '<span style="color:red"> Błędny login lub hasło!</span>';
		$conn->close();
		header('Location:index.php');
	}
	$conn->close();
?>
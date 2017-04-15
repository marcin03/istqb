<?php
require_once "DbConnection.php";

class UsersRepository {
	function loginIsBusy($login){
		$dbConnection = new DbConnection;
		$connection = $dbConnection->getConnect();
		$stmt = $connection->prepare("SELECT count(*) as count FROM users WHERE login = ?");
		$stmt->bind_param('s', $login);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_assoc();
		$howMuchUsersInDB = $result["count"];
		//$result->free_result();
		$connection->close();
		if($howMuchUsersInDB>0){
			return true;
		}else{
			return false;
		}	
	}
	
	function isExists($login, $password){ //return true if user login and password exists in database (return false if not)
		$dbConnection = new DbConnection;
		$connection = $dbConnection->getConnect();
		$stmt = $connection->prepare("SELECT count(*) as count FROM users WHERE login = ? AND password = ?");
		$hashedPassword = hash("sha512",$password);
		$stmt->bind_param('ss', $login, $hashedPassword);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_assoc();
		$howMuchUsersInDB = $result["count"];
		$connection->close();
		if($howMuchUsersInDB>0){
			//$result->free_result();
			return true;
		}else{
			return false;
		}	
	}
	
	function addUser($user){
		$login = $user->getLogin();
		$password = hash("sha512",$user->getPassword());
		$email = $user->getEmail();
		$dbConnection = new DbConnection;
		$connection = $dbConnection->getConnect();
		$stmt = $connection->prepare("INSERT INTO users (login, password, email) VALUES (?, ?, ?)");
		$stmt->bind_param('sss', $login, $password, $email);
		$stmt->execute();
	}
}
?>

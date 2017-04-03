<?php
require_once "DbConnection.php";

abstract class UsersRepository {
	function loginIsBusy($login){
		$dbConnection = new DbConnection;
		$connection = $dbConnection->getConnect();
		$stmt = $connection->prepare("SELECT login FROM users WHERE login = ?");
		$stmt->bind_param('s', $login);
		$stmt->execute();
		$result = $stmt->get_result();
		$howMuchUsersInDB = $result->num_rows;
		$result->free_result();
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
		$stmt = $connection->prepare("SELECT * FROM users WHERE login = ? AND password = ?");
		$stmt->bind_param('ss', $login, $password);
		$stmt->execute();
		$result = $stmt->get_result();
		$howMuchUsersInDB = $result->num_rows;
		$connection->close();
		if($howMuchUsersInDB>0){
			$result->free_result();
			return true;
		}else{
			return false;
		}	
	}
}
?>

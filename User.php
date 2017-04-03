<?php
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
	function isExists(){ //return true if user login and password exists in database (return false if not)
		$usersRepo = new UsersRepository;
		$exists = $usersRepo->isExists($this->login, $this->password);
		return $exists;
	}
}
?>

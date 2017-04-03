<?php
class User extends UsersRepository{
	private $login;
	private $password;
	private $email;
	
	function __construct($login, $password, $email=NULL){
		$this->login = $login;
		$this->password = $password;
		$this->email = $email;
	}
	function getLogin(){
		return $this->login;
	}
}
?>

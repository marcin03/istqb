<?php
require_once "UsersRepository.php";
class User{
	private $login;
	private $password;
	private $email;
	private $userRepository;
	
	function __construct($login, $password, $email=NULL){
		$this->login = $login;
		$this->password = $password;
		$this->email = $email;
		$this->userRepository = new UsersRepository;		
	}
	function getLogin(){
		return $this->login;
	}
	function getUserRepository(){
		return $this->userRepository;
	}
}
?>

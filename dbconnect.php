<?php 
	class Connection{ 
		private $mysql_host = 'localhost'; 
		private $mysql_user = 'root'; 
		private $mysql_pass = ''; 
		private $mysql_db = 'istqb'; 
		public function getConnect(){
			$conn = new mysqli($this->mysql_host, $this->mysql_user, $this->mysql_pass, $this->mysql_db);
			if ($conn->connect_error) { 
				die("Connection failed: " . $conn->connect_error);
			}
			return $conn;
		}
	}
?>
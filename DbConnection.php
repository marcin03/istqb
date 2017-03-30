<?php 
	class DbConnection{ 
		private $mysql_host = 'localhost'; 
		private $mysql_user = 'root'; 
		private $mysql_pass = ''; 
		private $mysql_db = 'istqb'; 
		public function getConnect(){
			$connection = new mysqli($this->mysql_host, $this->mysql_user, $this->mysql_pass, $this->mysql_db);
			if ($connection->connect_error) { 
				die("Connection failed: " . $connection->connect_error);
			}
			return $connection;
		}
	}
?>
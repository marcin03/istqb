<?php
	session_start();
	if (!isset($_SESSION['loggedIn'])){
		header('Location:index.php');
		exit();
	}
?>
<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<meta charset="utf-8" />
	</head/>
	<body>
	<?php
		echo "<p> Witaj ".$_SESSION['user'];
	?>
		<a href="logout.php"> Wyloguj </a><br />
		<a href="getquestion.php">Losuj jedno pytanie</a>
		
	</body>
</html>
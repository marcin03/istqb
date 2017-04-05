<!DOCTYPE HTML>
<html lang="pl">
<?php
	session_start();
		if(isset($_SESSION['wrongRegInfo'])){
			unset($_SESSION['wrongRegInfo']);
	}
	if((isset($_SESSION['loggedIn']))&&($_SESSION['loggedIn']==true)){
		header('Location:account.php');
		exit();
	}
	if(isset($_SESSION['justRegisteredInfo'])){
		echo $_SESSION['justRegisteredInfo'];
		unset($_SESSION['justRegisteredInfo']);
	}
?>

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css">
	</head/>
	<body>
		Zaloguj się, aby móc rozwiązywać testy<br /><br />
		<form action="login.php" method="post">
			Login:<br /><input type="text" name="login" /> <br />
			Hasło:<br /><input type="password" name="pass" /><br /><br />
			<input class="button" type="submit" name="log" value="Zaloguj" />
		</form>
		<br />
	<?php
		if(isset($_SESSION['wrongLogInfo'])){
			echo $_SESSION['wrongLogInfo'];
		}
	?>
	<br />
	<p>Nie masz konta? <a href='registration.php'> Zarejestruj się teraz </a></p>
	</body>
</html>
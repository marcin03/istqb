<?php
	session_start();
	if((isset($_SESSION['loggedIn']))&&($_SESSION['loggedIn']==true)){
		header('Location:account.php');
		exit();
	}
	if(isset($_SESSION['wrongLogInfo'])){
			session_unset();
	}	
?>
<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css">
	</head/>
	<body>
		Rejestracja <br /><br />
		<form action="register.php" method="post">
			Login:<br /><input type="text" name="login" /> <br /><br />
			Hasło:<br /><input type="password" name="password" /><br />
			Potwierdź hasło:<br /><input type="password" name="confirm_password" /><br /><br />
			E-mail:<br /><input type="text" name="email" /> <br />
			Potwierdź e-mail: <br /><input type="text" name="confirm_email" /> <br /><br />
			<input class="button" type="submit" name="log" value="Zarejestruj" />
		</form>
	<?php
		if(isset($_SESSION['wrongRegInfo'])){
			echo $_SESSION['wrongRegInfo'];
		}
	?>
		<br /><br />
		<p>Masz już konto? <a href='index.php'> Zaloguj się </a></p>
	</body>
</html>
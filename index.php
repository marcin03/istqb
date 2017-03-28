<?php
	session_start();
	if((isset($_SESSION['loggedIn']))&&($_SESSION['loggedIn']==true)){
		header('Location:account.php');
		exit();
	}
?>
<!DOCTYPE HTML>
<html lang="pl">
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
	<?php
		if(isset($_SESSION['wrongLogInfo'])){
			echo $_SESSION['wrongLogInfo'];
		}
	?>
	</body>
</html>
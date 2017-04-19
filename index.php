<?php session_start();?>
<!DOCTYPE HTML>
<html lang="pl">
<?php
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

	<?php include("header.html")?>
	<body>
	<div class="container">
		<h1>Zaloguj się, aby móc rozwiązywać testy do egzaminu ISTQB</h1>
		<div style="width: 50%;">
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label>Login</label><input type="text" name="login" class="form-control"/>
                </div>
				<div class="form-group">
				    <label>Hasło</label><input type="password" name="pass"  class="form-control"/>
				</div>
				<div class="form-group">
				    <input class="btn btn-primary" type="submit" name="log" value="Zaloguj" />
				</div>
			</form>
		</div>
	
	<?php
		if(isset($_SESSION['wrongLogInfo'])){
			echo $_SESSION['wrongLogInfo'];
		}
	?>
	<p>Nie masz konta? <a href='registration.php'> Zarejestruj się teraz </a></p>
	</div>
	</body>
</html>
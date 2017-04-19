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
<?php include("header.html")?>
<body>
    <div class="container">
		<h1>Rejestracja </h1>
        <div style="width: 50%;">
            <form action="register.php" method="post" data-toggle="validator">
                <div class="form-group">
                    <label>Login:</label><input type="text" name="login" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Hasło:</label><input type="password" name="password" class="form-control"/>
                    <label>Potwierdź hasło:</label><input type="password" name="confirm_password" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label">E-mail:</label>
                    <input type="email" class="form-control" name="email" id="inputEmail" data-error="Nieprawidłowy adres email" required/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="log" value="Zarejestruj" />
                </div>
            </form>
        </div>
	<?php
		if(isset($_SESSION['wrongRegInfo'])){
			echo $_SESSION['wrongRegInfo'];
		}
	?>
		<br /><br />
		<p>Masz już konto? <a href='index.php'> Zaloguj się </a></p>
    </div>
</body>
</html>
<?php
	session_start();
	if (!isset($_SESSION['loggedIn'])){
		header('Location:index.php');
		exit();
	}
?>
<!DOCTYPE HTML>
<html lang="pl">
<?php include("header.html")?>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="">ISTQB-Q</a>
            </div>
            <ul class="nav navbar-nav">
                <li>
                    <a href="getquestion.php">Losuj jedno pytanie</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="">
                        <?php echo "Zalogowany jako ".$_SESSION['user']; ?>
                    </a>
                </li>
                <li>
                    <a href="logout.php"> Wyloguj</a>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>
<?php
	session_start();
?>
<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<meta charset="utf-8" />
	</head/>
	<body>
	<?php
		echo "<p> Witaj ".$_SESSION['user']."<br />";
	?>
		<a href="getquestion.php">Losuj jedno pytanie</a>
	</body>
</html>
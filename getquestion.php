<?php
	session_start();
	if (!isset($_SESSION['loggedIn'])){
		header('Location:index.php');
		exit();
	}

	require_once "DbConnection.php";
	require_once "Question.php";
	require_once "QuestionRepository.php";
	
	if (!isset($_SESSION['goodAnswers'])){
	$_SESSION['goodAnswers'] = 0;
	$_SESSION['wrongAnswers'] = 0;
	}
	
	$connection = new DbConnection;
	$conn = $connection->getConnect();
	$questionId = rand(2,50);

?>
<html>
<head>
<meta charset="UTF-8">
<title> Getting questions </title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body> 
<?php
	echo "Zalogowany jako <a href='account.php'> ".$_SESSION["user"]."</a> | <a href='logout.php'>Wyloguj</a><br /><br />";
	$questionRepo = new QuestionRepository;
	$question1 = $questionRepo->findOne($questionId);
	$question1->displayQuestion();
	$conn->close();
?>
	<br />
	<form name="choseAnswer" action="getquestion.php" method="post" onsubmit="return if_correct_answer()">
		<input type="radio" id = "a" name="answer" value="a" /><?php echo $question1->getAnsA();?><br />
		<input type="radio" id = "b" name="answer" value="b" /><?php echo $question1->getAnsB();?><br />
		<input type="radio" id = "c" name="answer" value="c" /><?php echo $question1->getAnsC();?><br />
		<input type="radio" id = "d" name="answer" value="d" /><?php echo $question1->getAnsD();?><br /><br />
		<input type="submit" id="check" value="Sprawdź">
	</form>
	<br />

	<form method="get" action="getquestion.php">
		<input id = "new_question" type="submit" value="Nowe pytanie">
	</form>

<script>
	document.getElementById("new_question").style.color = "black";
	document.getElementById("check").style.color = "black";
function if_correct_answer() {
	var your_answer = document.querySelector('input[name="answer"]:checked').value;
	var good_answer = '<?php echo $question1->getGoodAns(); ?>';
	if (your_answer==good_answer){
		document.getElementById("check").style.color = "green";
	}
	else{
		document.getElementById("check").style.color = "red";
		alert("Poprawna odpowiedź to " + good_answer);
	}
	return false;
}
</script>
</body>
</html>
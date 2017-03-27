<?php
	require_once "dbconnect.php";
	require_once "Question.php";
	
	$connection = new Connection;
	$conn = $connection->getConnect();
	$id_question = rand(2,50);

?>
<html>
<head>
<meta charset="UTF-8">
<title> Getting questions </title>
<style>

html *
{
   font-size: 1em ;
   color: #FFFFFF ;
   font-family: Arial ;
}
.check{
	font-size: 1em ;
	color: #FF0000 ;
	font-family: Arial ;
}
</style>
</head>
<body bgcolor="#111111"> 
<?php
	$question1 = new Question($id_question, $conn);
	$question1->displayQuestion();
	$conn->close();
?>
	<br />
	<input type="radio" id = "a" name="answer" value="a" /><?php echo $question1->getAnsA();?><br />
	<input type="radio" id = "b" name="answer" value="b" /><?php echo $question1->getAnsB();?><br />
	<input type="radio" id = "c" name="answer" value="c" /><?php echo $question1->getAnsC();?><br />
	<input type="radio" id = "d" name="answer" value="d" /><?php echo $question1->getAnsD();?><br />
	<button id = "check" onclick="if_correct_answer()">Sprawdź</button>

	<form method="POST" action="getquestion.php">
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
}
</script>
</body>
</html>
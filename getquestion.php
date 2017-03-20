<?php
    $mysql_host = 'localhost'; 
    $mysql_user = 'root'; 
    $mysql_pass = ''; 
    $mysql_db = 'istqb'; 
		
	$conn = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
	if ($conn->connect_error) { 
		die("Connection failed: " . $conn->connect_error);
	} 
	$id_question = rand(2,50);
	$contentQuery = "SELECT content, picture, ans_a, ans_b, ans_c, ans_d from `questions` WHERE id_question = $id_question";
	$result = $conn->query($contentQuery);

	if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
        echo "Zadanie $id_question <br><br>" . $row["content"].   
		"<br><br>A. " . $row["ans_a"]. "<br>B. " . $row["ans_b"]. "<br>C. " . $row["ans_c"]. "<br>D. " . $row["ans_d"]."<br>";
    }
} else {
    echo "0 results";
}
	$good_ans = $conn->query("SELECT good_ans FROM `questions` WHERE id_question=$id_question");
	$good_row = $good_ans->fetch_assoc();

		$variable = $good_row["good_ans"];
		
	$conn->close();
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
	
	<input type="radio" id = "a" name="answer" value="a" />A<br>
	<input type="radio" id = "b" name="answer" value="b" />B<br>
	<input type="radio" id = "c" name="answer" value="c" />C<br>
	<input type="radio" id = "d" name="answer" value="d" />D<br>
	<button id = "check" onclick="if_correct_answer()">Sprawdź</button>

	
	<form method="POST" action="getquestion.php">
		<input id = "new_question" type="submit" value="Nowe pytanie">
	</form>
<script>
	document.getElementById("new_question").style.color = "black";
	document.getElementById("check").style.color = "black";
function if_correct_answer() {
	var your_answer = document.querySelector('input[name="answer"]:checked').value;
	var good_answer = <?php echo json_encode($variable); ?>;
	if (your_answer==good_answer){
		document.getElementById("check").style.color = "green";
	}
	else{
		document.getElementById("check").style.color = "red";
		alert("Poprawna odpowiedź to " + good_answer);
	}
}
	

	//if (document.getElementById('a').checked) {
	//rate_value = document.getElementById('r1').value;
	
</script>
	
</body>
</html>
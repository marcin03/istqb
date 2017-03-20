<?php
    $mysql_host = 'localhost'; 
    $mysql_user = 'root'; 
    $mysql_pass = ''; 
    $mysql_db = 'istqb'; 
		
	$conn = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
	if ($conn->connect_error) { 
		die("Connection failed: " . $conn->connect_error);
	} 

	$id_question = $_POST['id_question']; 
	$content = $_POST['content'];
	$picture = $_POST['picture'];
	$ans_a = $_POST['ans_a'];
	$ans_b = $_POST['ans_b'];
	$ans_c = $_POST['ans_c'];
	$ans_d = $_POST['ans_d'];
	$good_ans = $_POST['good_ans'];
	$sql = "INSERT INTO `questions` VALUES($id_question,'$content','$picture','$ans_a','$ans_b','$ans_c','$ans_d','$good_ans')";
	
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>
<html>
<head>
<meta charset="UTF-8">
<title> Adding records </title></head>
<body> 
	<form method="POST" action="insertquestion.php">
		Podaj numer pytania: <input type="text" size="30" name="id_question"><br>
		Podaj treść pytania: <textarea rows="8" cols="90"  name="content"></textarea><br>
		Dodaj zdjęcie:	</td><td><INPUT type="file" name="picture"><br>
		Podaj odpowiedź A: <input type="text" size="95" name="ans_a"><br>
		Podaj odpowiedź B: <input type="text" size="95" name="ans_b"><br>
		Podaj odpowiedź C: <input type="text" size="95" name="ans_c"><br>
		Podaj odpowiedź D: <input type="text" size="95" name="ans_d"><br>
		Podaj dobrą odpowiedź: <input type="text" size="40" name="good_ans"><br>
		<input type="submit" value="wyślij!">
	</form>
</body>
</html>
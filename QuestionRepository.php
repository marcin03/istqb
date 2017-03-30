<?php
require_once "Question.php";
require_once "DbConnection.php";

class QuestionRepository {
	function findOne($questionId){
		$contentQuery = "SELECT * from `questions` WHERE id_question = '$questionId'";
		$dbConnection = new DbConnection;
		$connection = $dbConnection->getConnect();
		$result = $connection->query($contentQuery);
		$row = $result->fetch_assoc();
		$content = $row["content"];
		$picture = $row["picture"];
		$answerA = $row["ans_a"];
		$answerB = $row["ans_b"];
		$answerC= $row["ans_c"];
		$answerD = $row["ans_d"];
		$goodAnswer = $row["good_ans"];
		
		$question= new Question($questionId, $content, $picture, $answerA, $answerB, $answerC, $answerD, $goodAnswer);
		return $question;
	}
}
?>

<?php
class Question {
	private $questionId;
	private $content;
	private $picture;
	private $answerA;
	private $answerB;
	private $answerC;
	private $answerD;
	private $goodAnswer;
	
	function __construct($questionId, $connection) {
		$contentQuery = "SELECT * from `questions` WHERE id_question = '$questionId'";
		$result = $connection->query($contentQuery);
		$row = $result->fetch_assoc();
		$this->questionId = "$questionId";
		$this->content = $row["content"];
		$this->picture = $row["picture"];
		$this->answerA = $row["ans_a"];
		$this->answerB = $row["ans_b"];
		$this->answerC= $row["ans_c"];
		$this->answerD = $row["ans_d"];
		$this->goodAnswer = $row["good_ans"];
	}
	function displayQuestion(){ //displays picture (if exists) id question and content
		echo "To zadanie ma w bazie numer $this->questionId <br />";
		if($this->picture){
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $this->picture ).'"/>';
		}
		echo "<br /> $this->content <br />";
	}
	function getAnsA(){
		return $this->answerA;
	}
	function getAnsB(){
		return $this->answerB;
	}
	function getAnsC(){
		return $this->answerC;
	}
	function getAnsD(){
		return $this->answerD;
	}
	function getGoodAns(){
		return $this->goodAnswer;
	}
}
?>

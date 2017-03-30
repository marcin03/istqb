<?php
class Question {
	private $questionId;
	private $content;
	private $answerA;
	private $answerB;
	private $answerC;
	private $answerD;
	private $goodAnswer;
	
	function __construct($questionId, $connection) {
		$contentQuery = "SELECT * from `questions` WHERE id_question = '$questionId'";
		$result = $conn->query($contentQuery);
		$row = $result->fetch_assoc();
		$this->questionId = "$questionId";
		$this->content = $row["content"];
		$this->answerA = $row["ans_a"];
		$this->answerB = $row["ans_b"];
		$this->answerC= $row["ans_c"];
		$this->answerD = $row["ans_d"];
		$this->goodAnswer = $row["good_ans"];
	}
	function displayQuestion(){
		echo "To zadanie ma w bazie numer $this->id_question <br /><br /> $this->content <br />";
	}
	function getAnsA(){
		return $this->ans_a;
	}
	function getAnsB(){
		return $this->ans_b;
	}
	function getAnsC(){
		return $this->ans_c;
	}
	function getAnsD(){
		return $this->ans_d;
	}
	function getGoodAns(){
		return $this->good_ans;
	}
}
?>

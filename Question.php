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
	
	function __construct($questionId, $content, $picture, $answerA, $answerB, $answerC, $answerD, $goodAnswer) {
		$this->questionId = $questionId;
		$this->content = $content;
		$this->picture = $picture;
		$this->answerA = $answerA;
		$this->answerB = $answerB;
		$this->answerC= $answerC;
		$this->answerD = $answerD;
		$this->goodAnswer = $goodAnswer;
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

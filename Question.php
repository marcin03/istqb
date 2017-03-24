<?php
class Question {
	private $id_question;
	private $content;
	private $ans_a;
	private $ans_b;
	private $ans_c;
	private $ans_d;
	private $good_ans;
	
	function __construct($id_question, $conn) {
		$contentQuery = "SELECT * from `questions` WHERE id_question = $id_question";
		$result = $conn->query($contentQuery);
		$row = $result->fetch_assoc();
		$this->id_question = "$id_question";
		$this->content = $row["content"];
		$this->ans_a = $row["ans_a"];
		$this->ans_b = $row["ans_b"];
		$this->ans_c = $row["ans_c"];
		$this->ans_d = $row["ans_d"];
		$this->good_ans = $row["good_ans"];
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
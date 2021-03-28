<?php 

session_start();

include 'database_connection.php';

//if exam submitted
if(isset($_POST['btn_submitingexam'])){

	$qno = $_POST['numberofquestions'];

	$counter = 1;
	$grade = 0;

	while($counter <= $qno){

		$givenanswer = $_POST['studentanswerto'.$counter];
		$correctanswer = $_POST['correctanswerof'.$counter];
		$point = $_POST['pointof'.$counter];

		if($givenanswer == $correctanswer){
			$grade += $point;
		}

		$counter++;

	}

	$examid = $_POST['examidtosave'];

	header("Location:student_page.php?gradegiven=yes&grade=".$grade);
	exit;

}



?>
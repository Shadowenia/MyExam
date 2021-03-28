<?php  

session_start();

date_default_timezone_set('Europe/Istanbul');

include 'database_connection.php';



//registiration process starts here
if (isset($_POST['btn_signup'])) {
	
	$register = $database->prepare("INSERT into users set
		users_username=:users_username,
		users_password=:users_password,
		users_usertype=:users_usertype"
	);

	$control = $register->execute(array(
		'users_username' => $_POST['username_signup'],
		'users_password' => $_POST['password_signup'],
		'users_usertype' => $_POST['gridRadios']
	));

	if ($control) { //if registered
		header("Location:index.php?registered=yes");
		exit;
	}
	else { //if couldn't register
	header("Location:index.php?registered=no");
	exit;
}

}
//registiration process ends here



//sign in process starts here
if(isset($_POST['btn_signin'])) {

	//hold username and password to search
	$tempusername = $_POST['username_signin'];
	$temppassword = $_POST['password_signin'];

	//search for username in database
	$select = $database->prepare("SELECT * from users where users_username=:username");
	$select->bindValue(':username', $tempusername);
	$select->execute();


	if($holduser = $select->fetch(PDO::FETCH_ASSOC)) {  //if username exist

		if($temppassword == $holduser['users_password']){  //if password is correct

			//creating cookies if "remember me" selected
			if(isset($_POST['rememberme_signin'])) {
				setcookie("username_cookie", $_POST['username_signin'], strtotime("+1 day"));
				setcookie("password_cookie", $_POST['password_signin'], strtotime("+1 day"));
			}
		    else { //deleting cookies if not selected
		    	setcookie("username_cookie", $_POST['username_signin'], strtotime("-1 day"));
		    	setcookie("password_cookie", $_POST['password_signin'], strtotime("-1 day"));
		    }

			//opening sessions
		    $_SESSION['id'] = $holduser['users_id'];
		    $_SESSION['username'] = $holduser['users_username'];
		    $_SESSION['usertype'] = $holduser['users_usertype'];

			//checking usertype and directing to related page
		    if($holduser['users_usertype'] == "instructor")
		    {
		    	header("Location:instructor_page.php");
		    	exit;
		    }
		    else{
		    	header("Location:student_page.php");
		    	exit;
		    }

		}
		else{ // if password is incorrect
			header("Location:index.php?signedin=nopass");
			exit;
		}
	}
	else{ //if username does not exist in database

		header("Location:index.php?signedin=nouser");
		exit;

	}
}
//sign in process ends here



// Exam Creation starts here
if(isset($_POST['btn_createexam'])){

	$examname = $_POST['nameofexamcreated'];
	$questionnumber = $_POST['noofquestions'];
	$examcreatorid = $_SESSION['id'];

	$create = $database->prepare("INSERT into exams set
		exams_name=:exams_name,
		exams_idofinstructor=:exams_idofinstructor,
		exams_noofquestions=:exams_noofquestions"
	);

	$controliscreated = $create->execute(array(
		'exams_name' => $examname,
		'exams_idofinstructor' => $examcreatorid,
		'exams_noofquestions' => $questionnumber
	));

	if($controliscreated){
		header("Location:question_add.php?examname=$examname");
		exit;
	}
	else{
		header("Location:instructor_page.php?created=no");
		exit;
	}	

}
// Exam Creation ends here



// Question Add Process Starts Here
if(isset($_POST['btn_savequestion'])){

	$savequestion = $database->prepare("INSERT into questions set
		questions_idofexam=:questions_idofexam,
		questions_content=:questions_content,
		questions_optiona=:questions_optiona,
		questions_optionb=:questions_optionb,
		questions_optionc=:questions_optionc,
		questions_optiond=:questions_optiond,
		questions_correctnaswer	=:questions_correctnaswer,
		questions_point=:questions_point"
	);

	$control = $savequestion->execute(array(
		'questions_idofexam' => $_POST['examid'],
		'questions_content' => $_POST['content'],
		'questions_optiona' => $_POST['optiona'],
		'questions_optionb' => $_POST['optionb'],
		'questions_optionc' => $_POST['optionc'],
		'questions_optiond' => $_POST['optiond'],
		'questions_correctnaswer' => $_POST['correctanswer'],
		'questions_point' => $_POST['point']
	));

if($control){ //if saved

	$maxquestionno = $_POST['questionno'];
	$countquestions = 0;

	$select = $database->prepare("SELECT * from questions where questions_idofexam=:idofexam");
	$select->bindValue(':idofexam', $_POST['examid']);
	$select->execute();

	while ($holdquestion = $select->fetch(PDO::FETCH_ASSOC)){
		$countquestions++;
	}

	if($countquestions < $maxquestionno){
		$examnametosend =$_POST['examname'];
		header("Location:question_add.php?examname=$examnametosend");
		exit;
	}
	else{
		header("Location:instructor_page.php?examcreated=yes");
		exit;
	}

}

}
// Question Add Process Starts Here



// Log out process stars here
if(isset($_POST['btn_logout'])){

	session_destroy();
	header("Location:index.php?logout=yes");
	exit;

}
// Log out process ends here



?>
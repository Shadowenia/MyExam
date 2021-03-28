<?php 

session_start();

include 'database_connection.php';

// hold created exam name
$tempexamname = $_GET['examname'];

//Search created exam to get its id, so that questions will be related with this id
$select = $database->prepare("SELECT * from exams where exams_name=:examname");
$select->bindValue(':examname', $tempexamname);
$select->execute();

if($holdexam = $select->fetch(PDO::FETCH_ASSOC)) {

	$idofexam = $holdexam['exams_id'];
	$questionno = $holdexam['exams_noofquestions'];

}

?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<title>Create Question</title>
</head>



<body>

	<br>

	<!-- Questin add form starts here -->
	<form action="process.php" method="POST">

		<h3 align="center">Create a question to add into the exam</h3>

		<br><hr><br>
		<!-- content -->
		<div class="container" align="center">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">Question :</span>
				</div>
				<textarea name="content" class="form-control" aria-label="With textarea"></textarea>
			</div>

			<br><hr><br>
			<!-- Option A -->
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">Option A :</span>
				</div>
				<textarea name="optiona" class="form-control" aria-label="With textarea"></textarea>
			</div>

			<br><hr><br>
			<!-- Option B -->
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">Option B :</span>
				</div>
				<textarea name="optionb" class="form-control" aria-label="With textarea"></textarea>
			</div>

			<br><hr><br>
			<!-- Option C -->
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">Option C :</span>
				</div>
				<textarea name="optionc" class="form-control" aria-label="With textarea"></textarea>
			</div>

			<br><hr><br>
			<!-- Option D -->
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">Option D :</span>
				</div>
				<textarea name="optiond" class="form-control" aria-label="With textarea"></textarea>
			</div>

			<br><hr><br>
			<!-- Correct Answer -->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text" for="inputGroupSelect01">Correct Option</label>
				</div>
				<select name="correctanswer" class="custom-select" id="inputGroupSelect01">
					<option value="A" selected>A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
				</select>
			</div>

			<br><hr><br>
			<!-- Point -->
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Point of Question</span>
				</div>
				<input type="number" name="point" class="form-control" placeholder="Enter point of question as numeric value" aria-label="Username" aria-describedby="basic-addon1">
			</div>

			<!-- Exam id will be send as hidden -->		
			<input type="text" name="examid" hidden="ok" value="<?php echo $idofexam ?>">

			<!-- Question number will be send as hidden -->		
			<input type="number" name="questionno" hidden="ok" value="<?php echo $questionno ?>">

			<!-- Question name will be send as hidden -->		
			<input type="text" name="examname" hidden="ok" value="<?php echo $tempexamname ?>">

			<br><hr><br>
			<!-- Button for saving question -->
			<button type="submit" name="btn_savequestion" class="btn btn-success">Save Question</button>

		</div> <!-- end of container -->
		<br><br>

	</form>
	<!-- Questin add form ends here -->



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
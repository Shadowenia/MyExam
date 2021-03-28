<?php 

session_start();

include 'database_connection.php';

?>

<!doctype html>
<html lang="en">

<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<title>Exam Page</title>

</head>



<body>

	<?php //getting exam from database

	$takingexamid = $_GET['idofexamtotake'];

	$getexamname = $database->prepare("SELECT * from exams where exams_id=:examid");
	$getexamname->execute(array(
		'examid' => $takingexamid
	));

	$holdexam = $getexamname->fetch(PDO::FETCH_ASSOC);

	?>
	

	<!-- Printing Exam Name First -->
	<br>
	<h3 align="center"><?php echo $holdexam['exams_name'] ?></h3>
	<br><hr><br>

	<div class="container" align="center">


		<?php //getting questions

		$collect = $database->prepare("SELECT * from questions where questions_idofexam=:id");
		$collect->bindValue(':id', $_GET['idofexamtotake']);
		$collect->execute();

		$qno = 0;

		?>

		<form action="calculate_grade.php" method="POST">

			<?php

			while ($questionholder = $collect->fetch(PDO::FETCH_ASSOC)) { //printing questions

				$qno++;

				?>

				<!-- Question content -->
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Question <?php echo $qno ?>:</span>
					</div>
					<textarea name="content<?php echo $qno ?>" class="form-control" aria-label="With textarea" readonly="" placeholder="<?php echo $questionholder['questions_content'] ?>"></textarea>
				</div>
				<br>
				<!-- Option A -->
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">A</span>
					</div>
					<textarea name="optiona<?php echo $qno ?>" class="form-control" aria-label="With textarea" readonly="" placeholder="<?php echo $questionholder['questions_optiona'] ?>"></textarea>
				</div>
				<!-- Option B -->
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">B</span>
					</div>
					<textarea name="optionb<?php echo $qno ?>" class="form-control" aria-label="With textarea" readonly="" placeholder="<?php echo $questionholder['questions_optionb'] ?>"></textarea>
				</div>
				<!-- Option C -->
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">C</span>
					</div>
					<textarea name="optionc<?php echo $qno ?>" class="form-control" aria-label="With textarea" readonly="" placeholder="<?php echo $questionholder['questions_optionc'] ?>"></textarea>
				</div>
				<!-- Option D -->
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">D</span>
					</div>
					<textarea name="optiond<?php echo $qno ?>" class="form-control" aria-label="With textarea" readonly="" placeholder="<?php echo $questionholder['questions_optiond'] ?>"></textarea>
				</div>
				<br>
				<!-- Student Answer -->
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text" for="inputGroupSelect01">Choose Answer</label>
					</div>
					<select name="studentanswerto<?php echo $qno ?>" class="custom-select" id="inputGroupSelect01">
						<option value="A" selected>A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>
					</select>
				</div>
				<!-- Hidden Corect Answer -->
				<input type="text" name="correctanswerof<?php echo $qno ?>" hidden="ok" value="<?php echo $questionholder['questions_correctnaswer'] ?>">
				<!-- Hidden Point of Question -->
				<input type="number" name="pointof<?php echo $qno ?>" hidden="ok" value="<?php echo $questionholder['questions_point'] ?>">
				
				<br><hr><br>

			<?php } ?>
			<!-- End Of Questions -->

			<!-- Hidden Question Number -->
			<input type="number" name="numberofquestions" hidden="ok" value="<?php echo $holdexam['exams_noofquestions'] ?>">
			<!-- Hidden Exam ID -->
			<input type="number" name="examidtosave" hidden="ok" value="<?php echo $_GET['idofexamtotake'] ?>">


			<!-- Button for submiting exam -->
			<button type="submit" name="btn_submitingexam" class="btn btn-success">Submit Exam</button>
			<br><br>

		</form>




	</div>














	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>
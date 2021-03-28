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

	<title>Student Page</title>

</head>

<body>
	


	<br>

	<!-- Button for Log Out -->
	<form action="process.php" method="POST">
		<button type="submit" class="btn btn-danger" name="btn_logout">Log out</button>
	</form>

	<br><hr>



	<!-- Notifications Starts Here -->
	<?php if($_GET['gradegiven'] == "yes") { ?>
		<div class="alert alert-success">
			Your grade is : <?php echo $_GET['grade'] ?>
		</div>
	<?php } ?>
	<!-- Notifications Ends Here -->

	<br>

	<!-- Listing Exam Informations -->
	<h4 align="center">List Of Exams</h4>

	<div class="container" align="center">

		<table style="width: 70%" border="2">

			<tr>
				<th>Exam ID</th>
				<th>Exam Name</th>
				<th>Questions</th>
				<th>Actions</th>
			</tr>

			<?php 

			$listexams = $database->prepare("SELECT * from exams");
			$listexams->execute();

			while($examsholder = $listexams->fetch(PDO::FETCH_ASSOC)) { ?>

				<tr>
					<td><?php echo $examsholder['exams_id'] ?></td>
					<td><?php echo $examsholder['exams_name'] ?></td>
					<td><?php echo $examsholder['exams_noofquestions'] ?></td>
					<td align="center">
						<a href="examination.php?idofexamtotake=<?php echo $examsholder['exams_id'] ?>"><button type="button" class="btn btn-primary">Take Exam</button></a>
					</td>
				</tr>

			<?php } ?>

		</table>

	</div>












	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>
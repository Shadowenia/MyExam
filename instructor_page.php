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

	<title>Instructor Panel</title>
</head>

<body>



	<br>

	<!-- Buttons Area -->
	<div class="btn-group" role="group" aria-label="Basic example">

		<!-- Button for exam creation, button triggers modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			Create a new exam
		</button>

		<!-- Modal for button above -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Enter exam name</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<form action="process.php" method="POST">
							<input type="text" name="nameofexamcreated" placeholder="Enter the exam name/title" autocomplete="off">
							<input type="num" name="noofquestions" placeholder="Enter number of questions/title" autocomplete="off">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" name="btn_createexam">Create</button>
						</form>

					</div>
				</div>
			</div>
		</div>
		<!-- end of modal -->



		<!-- Exit Button for log out process -->
		<form action="process.php" method="POST">
			<button type="submit" class="btn btn-danger" name="btn_logout">Log out</button>
		</form>

	</div>
	<!-- End Of Buttons Area -->
	


	<br><hr><br>



	<!-- Notifications and Warning Starts Here -->

	<!-- Notify if exam deleted -->
	<?php if($_GET['examdeleted'] == "yes") { ?>
		<div class="alert alert-success">
			Exam has been deleted successfuly.
		</div>
	<?php } ?>

	<!-- Warning if exam not deleted -->
	<?php if($_GET['examdeleted'] == "no") { ?>
		<div class="alert alert-danger">
			Something went wrong while deleting the exam!
		</div>
	<?php } ?>

	<!-- Warning if exam creation failed -->
	<?php if($_GET['created'] == "no") { ?>
		<div class="alert alert-danger">
			Exam creation failed!
		</div>
	<?php } ?>

	<!-- Notification if exam is created -->
	<?php if($_GET['examcreated']=="yes") { ?>
		<div class="alert alert-success">
			Exam is successfuly created !
		</div>
	<?php } ?>

	<!-- Notifications and Warning Starts Here -->



	<!-- Listing exams of instructor here -->
	<h4 align="center">Exams created by you</h4>

	<div class="container" align="center">
		
		<table style="width: 70%" border="2">

			<tr>
				<th>Exam ID</th>
				<th>Exam Name</th>
				<th>Questions</th>
				<!-- <th>Actions</th> -->
			</tr>

		<?php //getting exams from database

		$select = $database->prepare("SELECT * from exams where exams_idofinstructor=:id");
		$select->bindValue(':id', $_SESSION['id']);
		$select->execute();

		while ($holdexam = $select->fetch(PDO::FETCH_ASSOC)) {
			?>

			<tr>
				<td><?php echo $holdexam['exams_id'] ?></td>
				<td><?php echo $holdexam['exams_name'] ?></td>
				<td><?php echo $holdexam['exams_noofquestions'] ?></td>
				<!-- <td align="center">
					<a href="delete_exam.php?examtodeleteid=<?php echo $holdexam['exams_id'] ?>"><button type="button" class="btn btn-danger">Delete</button></a>
				</td> -->
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
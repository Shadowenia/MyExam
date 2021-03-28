<?php 

date_default_timezone_set('Europe/Istanbul');

try {

	// Connection to database
	$database = new PDO("mysql:host=localhost;port=3306;dbname=myexam_onlineexamination;charset=utf8",'myexam_root','Shadow3497');

} catch(PDOException $e) {
	echo "Database connection has failed : ".$e->getMessage();
	
}

?>
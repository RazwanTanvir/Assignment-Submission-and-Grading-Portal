<?php
if(!empty($_POST["savemark"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}

	if(!isset($error_message)) {
		require_once("dbcontroller.php");
		$db_handle = new DBController();
		$query = "INSERT INTO assignment_mark (student_id, assignment_sl,mark) VALUES
		('" . $_POST["s_id"] . "', '" . $_POST["assignment_sl"] . "', '" . $_POST["mark"] . "')";
		$result = $db_handle->insertQuery($query);
		if(!empty($result)) {
			$error_message = "";
			$success_message = "Mark Added";
            header("Location: http://localhost/AssignmentEvaluation/submittedassignments.php");
			unset($_POST);
		} else {
			$error_message = "There is a problem. Try again!";	
		}
	}
}

?>
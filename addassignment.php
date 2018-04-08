<?php
include('instructornavbar.php')
?>
<?php
if(!empty($_POST["register-user"])) {
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
		$query = "INSERT INTO offered_assignment (course_sl, assignment_title, submission_date,password) VALUES
		('" .$_POST["CourseSerial"] . "', '" . $_POST["assignmentTitle"] . "', '" . $_POST["submission_date"] . "','" .$_POST["password"] . "' )";
		$result = $db_handle->insertQuery($query);
		if(!empty($result)) {
			$error_message = "";
			$success_message = "Assignment Added!";	
			unset($_POST);
		} else {
			$error_message = "An Error Occurred";	
		}
	}
}
?>
<html>
<head>
<title>Add Assignment</title>
<style>
body{
	width:100%;
	font-family:calibri;
    background-color:#EF8354;
}
.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 4px;
}
.success-message {
	padding: 7px 10px;
	background: #cae0c4;
	border: #c3d0b5 1px solid;
	color: #027506;
	border-radius: 4px;
}
.demo-table {
	background: #464647;
	width: 50%;
	border-spacing: initial;
	margin: 2px 0px;
	word-break: break-word;
	table-layout: auto;
	line-height: 1.8em;
	color: #333;
	border-radius: 10px;
	padding: 20px 40px;
    margin-left: 25%;
    color: white;
}
.demo-table td {
	padding: 15px 0px;
}
.demoInputBox {
	padding: 10px 30px;
	border: #a9a9a9 1px solid;
	border-radius: 4px;
}
.btnRegister {
	padding: 10px 30px;
	background-color: #3367b2;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 10px;
}
</style>
</head>
<body>
<center><h3>Add New Assignment</h3></center>
<form name="frmRegistration" method="post" action="">
<table border="0" width="500" align="center" class="demo-table">
<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<tr>
<td>Course Serial</td>
<td><input type="text" class="demoInputBox" name="CourseSerial" value="<?php if(isset($_POST['CourseCode'])) echo $_POST['CourseCode']; ?>"></td>
</tr>
        
    
<tr>
<td>Assignment Title</td>
<td><input type="text" class="demoInputBox" name="assignmentTitle" value=""></td>
</tr>
<tr>
<td>Submission Date</td>
<td><input type="date" class="demoInputBox" name="submission_date" value="<?php if(isset($_POST['credit'])) echo $_POST['submission_date']; ?>"></td>
</tr>
<tr>
<td>Set Password</td>
<td><input type="password" class="demoInputBox" name="password" value="<?php if(isset($_POST['credit'])) echo $_POST['password']; ?>"></td>
</tr>
<tr>
<td colspan=2>
<input type="submit" name="register-user" value="Add" class="btnRegister"></td>
<td colspan=2>
    <h5 class="btnRegister"><a href="http://localhost/AssignmentEvaluation/instructordashboard.php" style="color:white; text-decoration:none">Home</a></h5>
</td> 
</tr>
    <tr>
</tr>
</table>
</form>
</body></html>
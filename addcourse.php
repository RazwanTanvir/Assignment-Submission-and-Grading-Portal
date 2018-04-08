<?php
include('adminnavbar.php');
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
		$query = "INSERT INTO course (course_code, course_title, credit) VALUES
		('" .$_POST["CourseCode"] . "', '" . $_POST["CourseTitle"] . "', '" . $_POST["credit"] . "' )";
		$result = $db_handle->insertQuery($query);
		if(!empty($result)) {
			$error_message = "";
			$success_message = "Course Added!";	
			unset($_POST);
		} else {
			$error_message = "An Error Occurred";	
		}
	}
}
?>
<html>
<head>
<title>Add Course</title>
<style>
body{
	width:100%;
	font-family:calibri;
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
	background: grey;
	width: 50%;
	border-spacing: initial;
	margin: 2px 0px;
	
	table-layout: auto;
	line-height: 1.8em;
	color: white;
	border-radius: 4px;
	padding: 20px 40px;
    margin-left: 350px;
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
	margin-left: 300px;
}
    body{
        background:  #EF8354;
    }
</style>
</head>
<body>
<center><h3>Add New Course</h3></center>
<form name="frmRegistration" method="post" action="">
<table border="0" width="500" align="center" class="demo-table">
<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<tr>
<td>Course Code</td>
<td><input type="text" class="demoInputBox" name="CourseCode" value="<?php if(isset($_POST['CourseCode'])) echo $_POST['CourseCode']; ?>"></td>
</tr>
<tr>
<td>Course Title</td>
<td><input type="text" class="demoInputBox" name="CourseTitle" value=""></td>
</tr>
<tr>
<td>Credit</td>
<td><input type="number" class="demoInputBox" name="credit" value="<?php if(isset($_POST['credit'])) echo $_POST['userEmail']; ?>"></td>
</tr>

<tr>
<td colspan=2>
<input type="submit" name="register-user" value="Add" class="btnRegister"></td>
</tr>
</table>
</form>
</body></html>
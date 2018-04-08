<?php
include('studentnavbar.php')
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AssignmentDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/*
$sql = "select course_code,course_title, name, section from (instructor inner join assignedcourse on assignedcourse.instructor_id = instructor.id) natural join course;";
$course = $conn->query($sql);

if ($course->num_rows > 0) {
    // output data of each row
    echo "All Courses";
    echo "<table><tr><th>Course Code</th><th>Title</th><th>Instructor Name</th><th>Section</th></tr>";
     while($row = $course->fetch_assoc()) {
        echo "<tr><td>".$row["course_code"]."</td><td>".$row["course_title"]."</td> <td>".$row["name"]."</td><td>".$row["section"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

*/
//enroll a student in a course


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
        //$sql="select id from instructor";
        //$ids = $db_handle->insertQuery($sql);
        $course_code = $_POST["CourseCode"];
        $section= $_POST["section"];
        $semester= $_POST["semester"];
        
        
       //

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AssignmentDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
session_start();
//getting the name of the instructor 
$sql="select serial_no from assignedcourse WHERE course_code='$course_code' and section='$section' and semester='$semester'";
$result = $conn->query($sql);
$check = 0;
if ($result->num_rows > 0) {
    // output data of each row
    $check = 1;
    while($row = $result->fetch_assoc()) {
        $serial_no=$row["serial_no"];//."</td><td>".$row["email"]."</td></tr>";
        //echo $name;
        //echo serial_no;
    }
    echo "</table>";
} else {
    echo "An Error Occured!";
}

        
        
        

        
        //
        
        
        
        if($check==1){
            $query = "INSERT INTO enrolled (student_id, serial_no) VALUES
		('" .$_POST["student_id"] . "', '$serial_no')";
		$result = $db_handle->insertQuery($query);
		if(!empty($result)) {
			$error_message = "";
			$success_message = "Enrolment Request Sent!";	
			unset($_POST);
		} else {
			$error_message = "An Error Occurred";	
		}
	}
            
        }
		
}
$conn->close();
?>



<html>
<head>
<title>Enrollment Form</title>
    <style>
body{
	width:100%;
	font-family:calibri;
    background: #EF8354;
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
	word-break: break-word;
	table-layout: auto;
	line-height: 1.8em;
	color: #333;
	border-radius: 4px;
	padding: 20px 40px;
    margin-left: 400px;
    color:white;
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
    <h3 ><a href="allcourses.php">All courses</a> </h3>
    <center><h3>Enroll to a course</h3></center>
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
    <td>Section</td>
    <td><input type="number" class="demoInputBox" name="section" value=""></td>
    </tr>
    <tr>
    <td>Semester</td>
    <td><input type="text" class="demoInputBox" name="semester" value="<?php if(isset($_POST['credit'])) echo $_POST['semester']; ?>"></td>
    </tr>
    <tr>
    </tr>
        <tr>
    <td>Student ID</td>
    <td><input type="text" class="demoInputBox" name="student_id" value=""></td>
    </tr>

    <tr>
    <td colspan=2>
    <input type="submit" name="register-user" value="Enroll" class="btnRegister" style="margin-left:290px"></td>
    </tr>
    </table>
    </form>
</body>
</html>

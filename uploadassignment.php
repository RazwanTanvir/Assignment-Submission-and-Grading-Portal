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



if(!empty($_POST["register-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
    session_start();
    $student_id = $_SESSION['student_id'];
    $_SESSION['sl'] = $_POST["assignmentSerial"];
	
	if(!isset($error_message)) {
		require_once("dbcontroller.php");
		$db_handle = new DBController();
        
        
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
        
        
        $assignment_sl = $_POST["assignmentSerial"];
        
        $password = $_POST["password"];
        
        //get the password for the assignment
       
                $sl_no = $_SESSION['sl'];
              $sql = "select password  from offered_assignment where assignment_sl = '$sl_no'";
                    $course = $conn->query($sql);
            if ($course->num_rows > 0) {
                // output data of each row
                 while($row = $course->fetch_assoc()) {
                    $pass = $row["password"];
                      //echo"Password: ". $pass;
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        
        
        
        
        $date = date('Y-m-d H:i:s');
 //'$assignment_sl','$student_id',
        //assignment_sl,student_id,
 move_uploaded_file($file_loc,$folder.$file);
 $query="INSERT INTO submitted (assignment_sl,student_id,file,file_type,size,submission_date) VALUES('$assignment_sl','$student_id','$file','$file_type','$file_size','$date')";
        
        if($pass==$password){ 
           $result = $db_handle->insertQuery($query);
		if(!empty($result)) {
			$error_message = "";
			$success_message = "File Uploaded!";	
			unset($_POST);
		} else {
			$error_message = "An Error Occurred";	
		} 
        }else{
            echo" Wrong password. Try again!<br>";
        }
        
        
		
	}
}
?>
<html>
<head>
<title>Upload Assignment</title>
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
    color: white;
	table-layout: auto;
	line-height: 1.8em;
	border-radius: 4px;
	padding: 20px 40px;
    margin-left: 400px;
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
    body{
        background: #EF8354;
    }
</style>
</head>
<body>
    
    <?php
   
 
?>
    
    
<center><h3>Upload Assignment</h3></center>
<form name="frmRegistration" method="post" action="" enctype="multipart/form-data">
<table border="0" width="500" align="center" class="demo-table">
<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<tr>
<td>Assignment Serial</td>
<td><input type="text" class="demoInputBox" name="assignmentSerial" value=""></td>
</tr>
<tr>
<td>Choose File</td>
<td><input type="file" name="file"  required /></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" class="demoInputBox" name="password" value=""></td>
    </tr>

<tr>
<td colspan=2>
<input type="submit" name="register-user" value="Submit" class="btnRegister"></td>
</tr>
</table>
</form>
</body></html>



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
session_start();
//getting the name of the instructor 
$email = $_SESSION['email'];
//echo $email;
$sql = "SELECT assignment_sl,student_id, mark INTO OUTFILE 'F:\mydata.csv' 
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY ','
LINES TERMINATED BY '\n'
FROM assignment_mark
where assignment_sl in (select assignment_sl from offered_assignment where course_sl in(select serial_no from assignedcourse where instructor_id = (select id from instructor where email = '$email')))
 order by assignment_sl ";
$result = $conn->query($sql);
echo "Gradesheet Downloaded @ F:\mydata.csv";
$conn->close();
?>
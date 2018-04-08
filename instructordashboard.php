
<?php
include('instructornavbar.php')
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
session_start();
//getting the name of the instructor 
$email = $_SESSION['email'];
$i_id = $_SESSION['instructor_id'];
$sql = "SELECT name FROM instructor where email= '$email'";
$result = $conn->query($sql);

if ($result->num_rows ==1) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name=$row["name"];//."</td><td>".$row["email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

//getting the courses of logged in instructor
//function showCourses($email, $conn){

$sql = "select course.course_code, assignment_title,submission_date from course natural join 
        offered_assignment";
$sql = "select assignment_sl, assignment_title,submission_date,course_code from offered_assignment inner join assignedcourse on course_sl = assignedcourse.serial_no where offered_assignment.assignment_sl in (select assignment_sl from offered_assignment where course_sl in (select serial_no from assignedcourse where instructor_id = '$i_id'))";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo "<center><b>Your Assignments</b>";
    echo "<table id='tables'><tr><th>Course Code</th><th>Assignment Title</th><th>Submission Date</th></tr>";
     while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["course_code"]."</td><td>".$row["assignment_title"]."</td> <td>".$row["submission_date"]."</td></tr>";
    }
    echo "</table></center>";
} else {
    echo "<center>You offered no assignments yet</center>";
}
$conn->close();
?>


<html>
<head>
<title>Welcome</title>
    <style>
        table , th, td{
            border: 1px solid black;
            text-align: center;
        }
        th{
            background: grey;
        }
        a{
            text-decoration: none;
        }
    </style>
    
    <style>
        table , th, td{
            border: 1px solid black;
            text-align: center;
        }
        th{
            background: grey;
        }
        a{
            text-decoration: none;
        }
        
         #tables {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 50%;
}

#tables td, #tables th {
    border: 1px solid #ddd;
    padding: 8px;
}

#tables tr:nth-child(even){background-color: #f2f2f2;}
    #tables tr:nth-child(odd){background-color: #d8d7d6;}

#tables tr:hover {background-color: #ddd;}

#tables th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #000000;
    color: white;
}
    </style>
</head>

<body style="background-color:#EF8354">
    <!--
<h4><a href="submittedassignments.php">Submitted Assignments</a></h4>
<h4><a href="http://localhost/AssignmentEvaluation/addassignment.php">Add Assignment!</a></h4>
   
<h5><a href="http://localhost/AssignmentEvaluation/logout.php">Sign Out</a></h5>
-->
</body>
</html>

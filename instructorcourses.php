
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
$sql = "SELECT course_code,section,semester,serial_no FROM assignedcourse where 
        instructor_id = (select id from instructor where email ='$email')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<center><b>Your Courses</b>";
    echo "<table id='tables'><tr><th>Serial No</th><th>Course Code</th><th>Section</th><th>Semester</th></tr>";
     while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["serial_no"]."</td><td>".$row["course_code"]."</td><td>".$row["section"]."</td> <td>".$row["semester"]."</td></tr>";
    }
    echo "</table></center>";
} else {
    echo "<center>You are not yet assigned to any course!</center> ";
}

$sql = "select course.course_code, assignment_title,submission_date from course natural join 
        offered_assignment";

$conn->close();
?>
<html>
<head>
    <style>
        body{
            background: #EF8354;
        }
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
</html>

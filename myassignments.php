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

//getting std serial
//session_start();
//$myemail = $_SESSION["student_email"];



//getting my assignments in the enrolled courses
session_start();
$student_id = $_SESSION['student_id'];
//echo "Hello". $student_id;
$sql = "select assignment_sl,course_sl,assignment_title,submission_date from offered_assignment inner join enrolled on course_sl = serial_no where student_id = '$student_id' order by submission_date ;";
$course = $conn->query($sql);

if ($course->num_rows > 0) {
    // output data of each row
    echo "Your Assignments";
    echo "<table id='tables'><tr><th>Assignment Serial</th><th>Course Serial</th><th>Title</th><th>Submission Date</th></tr>";
     while($row = $course->fetch_assoc()) {
        echo "<tr><td>".$row["assignment_sl"]."</td><td>".$row["course_sl"]."</td> <td>".$row["assignment_title"]."</td><td>".$row["submission_date"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "You have no assignments now!";
}

    //session_start();
    
?>

<html>
    <head>
    <link rel="stylesheet" href="styles.css">
        <style>
        
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
    <body style="background:#EF8354">
    </body>
    
</html>


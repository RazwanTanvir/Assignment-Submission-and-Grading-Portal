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






$sql = "select course_code,course_title, name,section,semester from (instructor inner join assignedcourse on assignedcourse.instructor_id = instructor.id) natural join course order by course_code, section;";
$course = $conn->query($sql);

if ($course->num_rows > 0) {
    // output data of each row
    echo "<center>";
    echo "<p><b>All Courses</b></p>";
    echo "<table id='tables'><tr><th>Course Code</th><th>Title</th><th>Instructor Name</th><th>Section</th><th>Semester</th></tr>";
     while($row = $course->fetch_assoc()) {
        echo "<tr><td>".$row["course_code"]."</td><td>".$row["course_title"]."</td> <td>".$row["name"]."</td><td>".$row["section"]."</td><td>".$row["semester"]."</td></tr>";
    }
    echo "</table>";
    echo "</center>";
} else {
    echo "0 results";
}

    //session_start();
    
?>

<html>
    <head>
        <title>All Courses</title>
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
    <body style="background:#EF8354">
    
    </body>
</html>
 
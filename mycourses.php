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

    //echo "Hello".$myemail;
session_start();
$myemail = $_SESSION["student_email"];
 $sql="SELECT serial_no,student_id FROM student WHERE email='$myemail'";
    $result = $conn->query($sql);
        if ($result->num_rows >= 1) {
             //echo output data of each row
            while($row = $result->fetch_assoc()) {
                $serial_no = $row["serial_no"];
                $s_id = $row["student_id"];
                //session_start();
                $_SESSION['sl_no'] = $serial_no;
                $_SESSION['student_id'] = $s_id;
            }
            //echo "</table>";
        } else {
            echo "0 results";
        }
$sl_no = $_SESSION['sl_no'];
$s_id = $_SESSION['student_id'] ;
//echo "Serial: ".$_SESSION['sl_no'];
//echo "S_ID: ".$_SESSION['student_id'];

// Enrolled courses

$sql = " SELECT assignedcourse.course_code, assignedcourse.section
        FROM enrolled left join assignedcourse using(serial_no) where  activate= 1 and student_id = '$s_id' ";
$course = $conn->query($sql);


if ($course->num_rows > 0) {
    // output data of each row
    echo "<center>Enrolled Courses";
    
    echo "<table id='tables'><tr><th>Course Code</th><th>Section</th></tr>";
     while($row = $course->fetch_assoc()) {
        echo "<tr><td>".$row["course_code"]."</td> <td>".$row["section"]."</td></tr>";
    }
    echo "</table></center>";
} else {
    echo "You are not enrolled to any course!";
}
?>
<style>
    body{
        background: #EF8354;
    }
         #tables {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 50%;
}

#tables td, #tables th {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}
  
#tables tr:nth-child(even){background-color: #f2f2f2;}
    #tables tr:nth-child(odd){background-color: #d8d7d6;}

#tables tr:hover {background-color: #ddd;}

#tables th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #000000;
    color: white;
}
            
        </style>
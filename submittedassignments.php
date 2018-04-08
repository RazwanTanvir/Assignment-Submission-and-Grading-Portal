<?php
include('instructornavbar.php')
?>
<?php
    //echo $_GET["mark"];
if (!empty($_POST))
{
    // handle post data
    $mark = $_POST["mark"];
    //echo "Hello".$mark;
    session_start();
    //echo $_SESSION["st_id"];
}
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
//where assignment_sl in (selecet assignment_sl from offered_assignment where course_sl in (select serial_no from assigned_course where instructor_id='$ins_id')) 
session_start();
$ins_id = $_SESSION['instructor_id'];
$sql = "SELECT submission_sl,assignment_sl,student_id,file,submission_date FROM submitted where assignment_sl in(select assignment_sl from offered_assignment where course_sl in(select course_sl from assignedcourse where instructor_id='$ins_id')) order by assignment_sl desc";


$sql = "SELECT submission_sl,assignment_sl,student_id,file,submission_date FROM submitted where assignment_sl in(select assignment_sl from offered_assignment where course_sl in (select serial_no from assignedcourse where instructor_id = '$ins_id')) order by assignment_sl desc";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo"Submitted Assignments"."<br>";
    echo "<table id='tables'><tr><th>Submission SL</th><th>Assignment SL</th><th>Student ID</th><th>Submission Date</th><th>File</th></tr>";
    // output data of each row
    $markInput = '<input type="number" name="mark" value="" style="width:80px; height:30px">';
    
    $AddMark = '<input type="submit" value=" Submit " class="button"/><br />';
    
    while($row = $result->fetch_assoc()) {
        $location = "uploads/".$row['file'];
        $_SESSION["st_id"] = $row["student_id"];
        //echo $location."<br>";
        echo "<tr><td>".$row["submission_sl"]."</td><td>".$row["assignment_sl"]."</td>
        <td>".$row["student_id"]."</td><td>".$row["submission_date"]."</td>
        
        <td><a href=".$location.">Download File</a></td>
        
        
        </tr>";
    } 
    echo "</table>";
} else {
    echo "<center><h2>No assignment submitted!</h2></center>";
}

$conn->close();
/* mark add form and button
<td><form method="."post"."action="."".">$markInput</td>
        <td>$AddMark</form> </td>
*/
//<th>File</th>
//<td>".$row["file"]."</td> 
?>

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

<style>
    #wrapper {
    font-family:verdana;
    margin: 30px auto ;
    padding: 30px;
    background: #4D6879; /* You can change the main color of thew form here. */
    font-size: 14px;
    width:100%;
    max-width:500px;
    box-sizing: border-box;
    float:inherit;
}
input {
    width: 50%;
    padding: 12px 15px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}


</style>
<html>
<body style="background-color:#EF8354">
    <div id = "wrapper">
        <center><h3>Add Mark</h3>
        <form action="markadded.php" method="post">
            <label>Student ID<br></label><input type="text" name="s_id" class="box"/><br /><br />
            <label>Assignment SL<br></label><input type="number" name="assignment_sl" class="box" /><br/><br />
            <label>Mark<br></label><input type="number" name="mark" class="box" /><br/><br />
            <input type="submit" name="savemark" value=" Submit " style="width:30%"/><br />
            
        </form>
            </center>
        <a href="gradesheet.php" style="color:white">Download Grade Sheet</a>
    </div>
    </body>
</html>
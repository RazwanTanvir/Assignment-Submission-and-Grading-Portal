
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

$sql = " select * from enrolled where activate=0";
$course = $conn->query($sql);
 $AddMark = '<input type="submit" value=" Activate " class="button"/><br />';

if ($course->num_rows > 0) {
    $flag = 1;
    // output data of each row
    echo"<center>";
    echo "<b>Enrolment Status</b>";
    
    echo "<table id= 'tables'><tr><th>Student ID</th><th>Course Serial</th><th>Activate</th></tr>";
     while($row = $course->fetch_assoc()) {
        echo "<tr><td>".$row["student_id"]."</td> <td>".$row["serial_no"]."</td><td>".$row["activate"]."</td></tr> ";
    }
    echo "</table>";
    echo"</center>";
} else {
    echo "No Enrolment activation pending!";
    $flag = 0;
}
?>
<style>
    body {
        
    background: #EF8354;
    }
    table{
        text-align: center;
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
    .activateForm{
        height: 20%;
        width: 20%;
        padding: 20px;
        margin-top: 20px;
        background: white;
    }
    .button{
        background: #5aad5c;
        border: none;
    }
    
    </style>


<html>
<body>
    <?php 
    if($flag==1){
        echo '<div class="activateForm">
        <form action="setactive.php" method="post">
            <label>Student ID :</label><input type="text" name="student_id" class="box"/><br /><br />
            <label>Course Serial  :</label><input type="number" name="course_sl" class="box" /><br/><br />
            <input type="submit" value="Activate" class="button"/><br />
    
        
        </form>
    </div>';
        
    }
    ?>
</body>
</html>

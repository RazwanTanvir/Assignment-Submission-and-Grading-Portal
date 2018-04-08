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
//where assignment_sl in (selecet assignment_sl from offered_assignment where course_sl in (select serial_no from assigned_course where instructor_id='$ins_id')) 
session_start();
$ins_id = $_SESSION['instructor_id'];
$sql = "SELECT * FROM submitted where assignment_sl in(select assignment_sl from offered_assignment where course_sl in(select course_sl from assignedcourse where instructor_id='$ins_id')) order by assignment_sl desc";
echo $ins_id;
$product_array = $conn->query($sql);
$product_array = $product_array->fetch_assoc();
if (!empty($product_array)) { 
foreach($product_array as $key=>$value){
?>
<div >
	<form method="post" action="">
	<div><strong><?php echo $product_array["student_id"]; ?></strong></div>
	<div ><?php echo "$".$product_array["submission_date"]; ?></div>
	<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Submit" /></div>
	</form>
</div>
<?php }}

$conn->close();

//<th>File</th>
//<td>".$row["file"]."</td> 
?>
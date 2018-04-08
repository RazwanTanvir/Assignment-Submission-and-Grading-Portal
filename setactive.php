<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "assignmentdb";

    // Create connection

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $id = $_POST['student_id'];
    $sl = $_POST['course_sl'];
    //echo $id;

    $sql = "UPDATE enrolled SET activate=1 WHERE student_id='$id' and serial_no = '$sl'";

    if ($conn->query($sql) === TRUE) {
        echo $id." is enrolled!";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>
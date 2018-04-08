<?php
include('adminnavbar.php');
?>

<html>
<head>
<title>Welcome</title>
    <style>
        h4   {
            color: aqua;
            font-style: oblique;
        }
        a{
            text-decoration: none;
        }
    </style>
    
    
</head>

<body style="background:#EF8354"> 
<center><h1>Welcome Admin!</h1>
    <?php
include('activatestudents.php');
?>
</center>
    <!--
<h4><a href="http://localhost/AssignmentEvaluation/assigncourse.php">Assign Instructor</a></h4>
<h4><a href="http://localhost/AssignmentEvaluation/addcourse.php">Add Course</a></h4>
<h4><a href="adminlist.php">See Admins</a> </h4>
<h4><a href="activatestudents.php">Enrolment Status</a></h4>
<h5><a href="http://localhost/AssignmentEvaluation/logout.php">Sign Out</a></h5>
-->
</body>
</html>

<?php

include("config.php");
//session_start();


if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from form 

    $myemail=$_POST['email']; 
    $mypassword=md5($_POST['password']); 
    session_start();
    $_SESSION['student_email'] = $myemail;

    require_once("dbcontroller.php");
    $db_handle = new DBController();
    $sql="SELECT serial_no,student_id FROM student WHERE email='$myemail' and password='$mypassword'";
    $result = $db_handle->insertQuery($sql);
        while($row = mysqli_fetch_array($result))
    {
            if($row[0]>=1){
                $error_message = "";
                $success_message = "You have logged in successfully!";	
                //echo $row["admin_sl"];
                session_start();
                $_SESSION['sl_no'] = $serial_no;
                $_SESSION['student_id'] = $s_id;
                unset($_POST);
                header("Location: http://localhost/AssignmentEvaluation/studenthome.php");
            } 
            else {
                $error_message = "Problem in login. Try Again!";
                //echo $row['admin_sl'];
                echo "Wrong Password or Email!";
            }

    }

        //getting student id
        //session_start();
    /*
         $sql="SELECT serial_no,student_id FROM student WHERE email='$myemail'";
        $result = $conn->query($sql);
        if ($result->num_rows = 1) {
             //echo output data of each row
            while($row = $result->fetch_assoc()) {
                $serial_no = $row["serial_no"];
                $s_id = $row["student_id"];
                session_start();
                $_SESSION['sl_no'] = $serial_no;
                $_SESSION['student_id'] = $s_id;
            }
            //echo "</table>";
        } else {
            echo "0 results";
        }
        */

}
   



		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Page</title>

<style type="text/css">
body
{
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
    background: #EF8354;
    margin-top: 100px;
    

}
label
{
font-weight:bold;
    padding: 20px;

width:100px;
font-size:14px;

}
.box
{
border:#666666 solid 1px;
    border-radius: 10px;
    
    align-items: center;
    width:290px;
    height:30px;


}
    .button{
        padding:10px;
        border-radius: 10px;
        margin-left:220px;
    
    }
    .button:hover{
        color:black;
        background: #ccffff;
    }
</style>
</head>
<body bgcolor="#FFFFFF">



<div align="center" >
<div style="width:500px; border: solid 1px #333333; height:400px; background:grey; border-radius:5px" align="left">
<div style="background-color:#333333; color:#FFFFFF; padding:10px; "><b>Login</b></div>


<div style="margin:100px">

<form action="" method="post">
<label>Email  :</label><input type="text" name="email" class="box"/><br /><br />
<label>Password  :</label><input type="password" name="password" class="box" /><br/><br />
<input type="submit" value=" Submit " class="button"/><br />
<a href="http://localhost/AssignmentEvaluation/studentregister.php" style="font-size:12px; margin-left:206px; padding:10px;">New here?</a>

</form>
<div style="font-size:11px; color:#cc0000; margin-top:20px"></div>
</div>
</div>
</div>

</body>
</html>

<?php

//include("config.php");
//session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from form 

$myemail=$_POST['email']; 
$mypassword=md5($_POST['password']); 


require_once("dbcontroller.php");
$db_handle = new DBController();
$sql="SELECT admin_sl FROM admin WHERE email='$myemail' and 
password= '$mypassword'";
$result = $db_handle->insertQuery($sql);
//$result = $db_handle->insertQuery("select password from admin");
//$row = mysqli_fetch_array($result);
    //echo $mypassword;
    //echo "<br>";
    while($row = mysqli_fetch_array($result))
{
        if($row[0]==1){
            $error_message = "";
			$success_message = "You have registered successfully!";	
            //echo $row["admin_sl"];
			unset($_POST);
            header("Location: http://localhost/AssignmentEvaluation/adminwelcome.php");
        } 
        else {
			$error_message = "Problem in registration. Try Again!";
            //echo $row['admin_sl'];
            echo "dead";
		}
        
}
		/*if(!empty($row)) {
			$error_message = "";
			$success_message = "You have registered successfully!";	
            echo $row["admin_sl"];
			unset($_POST);
		} else {
			$error_message = "Problem in registration. Try Again!";
            echo $row['admin_sl'];
            echo "dead";
		}*/


// If result matched $myusername and $mypassword, table row must be 1 row

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

<center><b><p style="color:white; font-size:32px">Assignment Evaluator</p></b></center>

<div align="center" >
    
<div style="width:500px; border: solid 1px #333333; height:400px; border-radius:5px; background:grey " align="left">
<div style="background-color:#333333; color:#FFFFFF; padding:20px; "><b>Login</b></div>


<div style="margin:100px">
<form action="" method="post">
<label>Email  :</label><input type="text" name="email" class="box"/><br /><br />
<label>Password  :</label><input type="password" name="password" class="box" /><br/><br />
<input type="submit" value=" Submit " class="button"/><br />
    
    
    <!-- login is disabled for admin
<a href="http://localhost/AssignmentEvaluation/adminregister.php" style="font-size:12px; margin-left:220px; padding:10px;"> Admin?</a>
-->
    
    
</form>
<div style="font-size:11px; color:#cc0000; margin-top:20px"></div>
</div>
</div>
</div>

</body>
</html>

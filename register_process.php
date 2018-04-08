<?php
    if($_POST){
        $username = $_POST['name'];
        $email = $_POST['email'] ;
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        echo "Hello ";
        echo "<b>";
        echo $_POST['username'];
        echo"!</b>";
        echo "<br>";
        echo "Your account has been created!\"" ;
        echo "See your mail- ".$_POST['email'];
        include ('dbconnect.php');
        $sql = "INSERT INTO user (username,email,phone,password,name) values('$email','$email',$phone,'$password','$username')";
        $runQuery = mysqli_query($connection,$sql);
        header("location:index.php");
    
    }
else{
    header("location:register.php");
}
echo"<br><a href=\"logout.php\">Log out</a>" ;
?>
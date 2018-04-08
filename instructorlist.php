<?php
    include('adminnavbar.php');
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

$sql = "SELECT id,name,email FROM instructor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo"<center><h3>Admins</h3>"."<br>";
    echo "<table id='tables'><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td></tr>";
    }
    echo "</table></center>";
} else {
    echo "No Instructor!";
}
$conn->close();
?>
<style>
    table{
        text-align: center;
    }
    body {
        background: #EF8354
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
    text-align: center;
    background-color: #000000;
    color: white;
}
    </style>
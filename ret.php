<?php function redirect_to($lk){
		header("Location: " . $lk);
		exit();
}
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in']!="yes"){
	redirect_to("http://localhost/bc.php");
}else { echo "loggedin";}
?>
<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "717645";
$dbname = "library";
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno())
{
	die("Database connection failed : " . mysqli_connect_error());
}
?>
<?php
$username = trim($_POST['username']);
$password = trim($_POST['password']);
if(!isset($_POST['username']) || $username=== "" & !isset($_POST['password']) || $password === ""){
	
	$link = "http://localhost/return.php?log=2";
	redirect_to($link);
	exit;
}

$query  = "INSERT INTO librarian VALUES(";
	$query .= "  '{$username}', '{$password}'";
	$query .= ")";
$result = mysqli_query($conn,$query);
if(!$result)
{
	die("database operation failed.");
}
mysql_free_result($result);
redirect_to("http://localhost/return.php?log=1");
?>
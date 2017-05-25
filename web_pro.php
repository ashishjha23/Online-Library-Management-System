<?php function redirect_to($lk){
		header("Location: " . $lk);
		exit();
}
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in']!="yes"){
	redirect_to("http://localhost/bc.php");
}else { echo "loggedin";}
?>
<html>
<title>
db_work 
</title>
<body>
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

$title=trim($_POST['title']);
$author=trim($_POST['author']);
$category=trim($_POST['cat']);
$i_url=trim($_POST['url']);
$description = trim($_POST['message']);
?>
<?php if( !isset($_POST['title']) || $title=== "" & !isset($_POST['author']) || $author===""  
				& !isset($_POST['cat']) || $category=== ""  & !isset($_POST['url']) || $i_url=== "")
{
	$link = "http://localhost/web_project.php?log=1";
	redirect_to($link);
	exit;
}
?>
<?php
	$issue_status = "yes";
	$query  = "INSERT INTO book_det (";
	$query .= "  title, author, category, image_url, description, issue_status";
	$query .= ") VALUES (";
	$query .= "  '{$title}', '{$author}', '{$category}', '{$i_url}', '{$description}', '{$issue_status}'";
	$query .= ")";
	
	$result = mysqli_query($conn,$query);
	if(!$result){
		die("Database query failed.");
	}
	if($result)
	{
		redirect_to("http://localhost/web_project.php?log=2");
	}
 mysqli_free_result($result);
?>
<?php mysqli_close($conn); ?>
</body>
</html>
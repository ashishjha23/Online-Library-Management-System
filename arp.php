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
Student form 
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
$bid = trim($_POST['book-id']);
$rno = trim($_POST['rno']);
var_dump($bid);
var_dump($rno);
 if( !isset($_POST['book-id']) || $bid==="" & !isset($_POST['rno']) || $rno==="")
{
	$link = "http://localhost/areturn.php?log=1";
	redirect_to($link);
	exit;
}
?>
<?php
$query= "SELECT book_id,roll_no from sif";
		$r=mysqli_query($conn,$query);
		if(!$r)
		{
			die("Database query to check bid failed");
		}
		while($row=mysqli_fetch_row($r))	
		{
			print_r($row);
			if($row[0]==$bid && $row[1]==$rno)
			{
				$query1="update book_det set issue_status='yes' where book_id='{$bid}'";
				$result1=mysqli_query($conn,$query1);
				if(!$result1)
				{
					die("Database failed 102");
				}
				$query1="delete from sif where book_id='{$bid}' and roll_no='{$rno}'";
				$result1=mysqli_query($conn,$query1);
				if(!$result1)
				{
					die("datebase error 104");
				}
				redirect_to("http://localhost/areturn.php?log=2");
			}
			else
			{
				//redirect_to("http://localhost/areturn.php?log=3");
			}
		}
?> 
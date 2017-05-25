<?php function redirect_to($lk){
		header("Location: " . $lk);
		exit();
}
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
$rno = trim($_POST['rno']);
$mno = trim((int)$_POST['mno']);
$bid = trim((int)$_POST['bid']); ?>
<pre>
<?php var_dump($_POST); 
if($_POST['rno']===""){echo "this is shit";}
?>

<?php if($rno==="" || $mno==="" || $bid==="")
{
	$link = "http://localhost/student input/stuip.php?log=1";
	redirect_to($link);
	exit;
}
?>


<?php 
function curdate(){
			return date('Y-m-d') ;
		 }
 $flag=0;
 $query4= "SELECT book_id,issue_status from book_det";
		$r=mysqli_query($conn,$query4);
		if(!$r)
		{
			die("Database query to check bid failed");
		}
		while($row=mysqli_fetch_row($r))
		{
			if($bid==$row[0])
			{
				$flag=1;
				echo "book exist";
				if($row[1]=="no")
				{
					redirect_to("http://localhost/student input/stuip.php?log=5");
				}
				break;
			}
		}
		if($flag==0)
		{
			//redirect_to("http://localhost/student input/stuip.php?log=4");
		}
		
		mysqli_free_result($r);

	?>
	<?php 
  $current_date = trim(date("Y-m-d"));
  
	  ?> 
	<?php
	$today=trim((string)date("Y-m-d"));
	print_r($current_date);
	$query1  = "INSERT INTO sif(book_id, roll_no, mbl_no, issue_date) VALUES(";
	$query1 .= "  '{$bid}', '{$rno}', '{$mno}', '{$current_date}'";
	$query1 .= ")";
	
	$result = mysqli_query($conn,$query1);
	if(!$result){
		die("Database query failed.1");
	}
	
	?>
	
	  <?php
		 
		 $query="select issue_status from book_det where book_id={$bid}";
		$result = mysqli_query($conn,$query);
		if(!$result){
			die("Databse query failed.2");
		}
		$row=mysqli_fetch_row($result);
		if($row[0]=="yes")
		{
			$query2= "update book_det set issue_status = 'no' where book_id={$bid}";
			$result=mysqli_query($conn,$query2);
			if(!$result)
			{
				die("Database query failed.3");
			}
			redirect_to("http://localhost/student input/stuip.php?log=2");
			mysqli_free_result($result2);
		}
		mysqli_free_result($result);
		//redirect_to("http://localhost/student input/stuip.php?log=3");
?>
<?php mysqli_close($conn); ?>
</body>
</html>

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
<meta charset="UTF-8">
<title>
Returning page by librarian.</title>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<form action="arp.php" method="post" class="cf">
<input type="text" name="book-id" pattern="^\d{1,3}$" value="" id="input-name" placeholder="book-id number">
<input type="text" name="rno" pattern="^(CS|EC|EE|ME|cs|ec|ee|me)\d{2}(b|B|m|M)\d{4}$" value="" id="input-subject" placeholder="roll-number">
<input type="submit" name="submit" id="input-submit" value="submit">
<?php $log=0;
	if(isset($_GET['log']))
	{
		
		if($_GET['log']==1)
		{
			echo "fill all credentials";
		}
		else{
			if($_GET['log']==2)
			{
				echo "Returned Successfully";
			}
			else{
				if($_GET['log']==3){
					echo "book not found";
				}
			}
		}
	}
	?>

</form>
</body>
</html>
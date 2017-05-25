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
<head>
<title>
Add new administrators
</title>
<link rel="stylesheet" href="css/style.css">

</head>
<body>

<form action="ret.php" method="post" class="cf">
<div>
<input type="text" name="username"  pattern="^[a-z0-9_-]{3,15}$" id="input-name" value="" placeholder="user-id">
<input type="password" name="password" pattern="^.{6,}$" value="" id="input-name" placeholder="password">


</div>
<input type="submit" name="submit" id="input-submit" value="submit">
</form>
<a href="http://localhost/main/homedemojs.php?log=10"> Click here to go to homepage </a>
<?php 
if(isset($_GET['log'])){
if($_GET['log']==1)
{
	echo "Succesfully added";
}
else{
	if($_GET['log']==2)
	{
		echo "Form Credentials Missing";
	}
}
}
?>
</body>
</html>
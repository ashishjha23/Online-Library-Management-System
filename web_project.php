<?php function redirect_to($lk){
		header("Location: " . $lk);
		exit();
}
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in']!="yes"){
	redirect_to("http://localhost/bc.php");
}else
?>
<?php 
	if(isset($_GET['log']))
	{
		if($_GET['log']==1)
		{
			$eror = "Form Empty . Please fill all the credentials.";
	    }
		else{
		if($_GET['log']==2)
		{
			$eror = "Last data saved successfully";
		}
		else{
			$eror = " ";
	}
		}
	}
	else{
		$eror= " ";
		
	}
?>
	
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>INPUT</title>
  


  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <h1>Library Database</h1>
<form action="web_pro.php" method="post" class="cf">
  <div class="half left cf">
     
    <input type="text" id="input-name" name="title" pattern="[a-zA-Z0-9][A-Za-z0-9 '. , - \s]*" value="" placeholder="Title">
    <input type="text" id="input-subject" name="author" pattern="[a-zA-Z][A-Za-z .  \s]*" value="" placeholder="Author">
    
    <input type="text" id="input-subject" name="cat" value="" placeholder="Category">
    <input type="text" id="input-subject" name="url" pattern= "^([a-z\-_0-9\/\/:\.]*\.(jpg|jpeg|png|gif))$" value="" placeholder="Image url">
  </div>
  <div class="half right cf">
    <textarea name="message" type="text" id="input-message" placeholder="Description"></textarea>
  </div>  
  <input type="submit" name="submit" value="submit" id="input-submit">
</form>
<br />
<br />
<?php echo $eror;
		
	 $_GET['log']=0;
		?>  
  
</body>

</html>

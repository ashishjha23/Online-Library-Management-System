<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Student Issue Form</title>
  
   <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <h1>Student Issue Form</h1>
<form action="stu.php" method="post" class="cf">
  <div class="half left cf">
    <input type="text" id="input-name" name="rno" pattern="^(CS|EC|EE|ME|cs|ec|ee|me)\d{2}(b|B|m|M)\d{4}$" value="" placeholder="Roll Number">
    <input type="text" id="input-number" name="mno" pattern="^(\+\d{1,3}[- ]?)?\d{10}$" value="" placeholder="Mobile Number">
    <input type="text" id="input-subject" name="bid" pattern="^\d{1,3}$" value="" placeholder="Book ID">
	
  </div>
  
  <input type="submit" name="submit" value="submit" id="input-submit">
</form>
Date automatically taken;
<?php $log=0;
	if(isset($_GET['log']))
	{
		
		if($_GET['log']==1)
		{
			
			$eror = "Form Empty . Please fill all the credentials.";
		}
		else {
		if($_GET['log']==2)
		{
			$eror = "Book Issued. Remember to return before 15 days . After 15 days each day pay fine of Rs. 20 per day";
			
		}
		else {
		if($_GET['log']==3)
		{
			$eror = "Book already issued by someone else";
			
		}
		else{
			if($_GET['log']==4)
			{
				$eror = "Book doesn't exist";
			
			}
			else{
				if($_GET['log']==5)
				{
					$eror = "Book already issued by someone else. Please wait till reader returns";
				}
				else{
					$eror= "";
				}
				}
	}
	}
	}
	}
	else{
		$eror= " ";
	}
	
?>  
<?php 
		echo $eror;
	 $_GET['log']=0;
		?> 
</body>
</html>

<?php
   ob_start();
   session_start();
   function redirect_to($lk){
		header("Location: " . $lk);
   }
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
$msg= "";
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<html lang = "en">
   
   <head>
      <title>Login</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ADABAB;
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }
         
         h2{
            text-align: center;
            color: #017572;
         }
      </style>
      
   </head>
	
   <body>
      
      <h2>Enter Username and Password</h2> 
      <div class = "container form-signin">
    <?php   
		 $flag=0;
		 $query= "SELECT * from librarian";
		$r=mysqli_query($conn,$query);
		if(!$r)
		{
			die("Database query to check bid failed");
		}
		
		while($row=mysqli_fetch_row($r))
		{
			
			 if ($_POST['username'] == $row[0] && 
                  $_POST['password'] == $row[1])
				  {
					    $_SESSION['valid'] = true;
						$_SESSION['logged_in']="yes";
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = $row[0];
					  $flag=1;
					  $msg ="Login successful";
					  echo $_SESSION['logged_in'];
					  redirect_to("http://localhost/bc.php"); exit();
				  }
				  
		}
		if($flag==0)
		{
			$msg = "Wrong username or password";
		}
		mysqli_free_result($r);
		 ?>
         
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" pattern="^[A-Za-z0-9_-]{3,15}$" placeholder = "username " 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" pattern="^.{6,}$" placeholder = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
			
         Click here to clean <a href = "logout.php" tite = "Logout">Session.
         
      </div> 
      <?php mysqli_close($conn); ?>
   </body>
</html>
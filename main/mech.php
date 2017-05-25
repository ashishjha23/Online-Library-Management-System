<?php $log=0;

	
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title>Library</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="css/images/favicon.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
	
	<script type="text/javascript" src="js/functions.js"></script>
</head>
<body>
	<!-- Header -->
	<div id="header" class="shell">
		<div id="logo1"><font size="4"></font></a></div>
		<img src="logo2.jpg"
		alt="Nitpy Logo"
		style="width:340px;height:158px;">
		<!-- Navigation -->
		
		<!-- End Navigation -->
		<div class="cl">&nbsp;</div>
		<!-- Login-details -->
		<div id="login-details">
			<p>Welcome, <a href="../login/login" id="user"><?php if(isset($_GET['log']))
	{
		
		if($_GET['log']==10)
		{
			$eror = "Logged in";
			echo $eror;?>
		<a href="/login/logout" >Log Out</a></br>
		<a href="/areturn" >Return Book</a></br>
		<a href="/return" >Add User</a></br>
		<a href="/web_project" >Add New Book</a></br>
		
			<?php
			
			
			}
	}
		else
		{
			echo "Guest";
		}
	?></br><a href="/student input/stuip" ><font size="4"><br />Book Issue</font></a>
	
		</div>
		<!-- End Login-details -->
	</div>
	<!-- End Header -->
	<!-- Slider -->
	<div id="slider">
		<div class="shell">
			<ul>

									<?php $query="select * from book_det order by book_id desc";
						$result=mysqli_query($conn,$query);
						$i=0;
						while($row= mysqli_fetch_assoc($result)) { 
							if($i<4){
							?>
				<li>
					<div class="image">
						<img src="<?php echo $row['image_url'];?>" alt="" />
					</div>

					<div class="details">
						<h2>New Books</h2>
						<p class="title"><?php echo $row['title'];?></p>
						<p class="title">BOOK ID:<?php echo $row['book_id'];?> </p>
						<p class="description"><?php echo $row['description'];?></p>
					</div>
				</li>
						<?php }
						$i+=1; }
							mysqli_free_result($result); ?>
			</ul>
				
			<div class="nav">
				<a href="#">1</a>
				<a href="#">2</a>
				<a href="#">3</a>
				<a href="#">4</a>
			</div>
		</div>
	</div>
	<!-- End Slider -->
	<!-- Main -->
	<div id="main" class="shell">
		<!-- Sidebar -->
		<div id="sidebar">
			<ul class="categories">
				<li>
					<h4>Categories</h4>
					<ul>
						<li><a href="cse1.php">Computer Science</a></li>
						<li><a href="ece.php">Electronics and Communication</a></li>
						<li><a href="eee.php">Electrical and Electronics</a></li>
						<li><a href="#">Mechanical</a></li>
						<li><a href="exam.php">Entrance Exams</a></li>
						<li><a href="mag.php">Magazines</a></li>
						<li><a href="nove.php">Novels</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
		<!-- End Sidebar -->
		<!-- Content -->
		<div id="content">
			<!-- Products -->
			
		
			<div style="float:right" class="products">
				<h3>Featured Products</h3>
				<ul>
					
<?php 
								$query="select * from book_det where category='mech'";
$result=mysqli_query($conn,$query);
$i=1;
while($row= mysqli_fetch_assoc($result)){

		?>
                         
                                                <div style="border:thin"  class="product">
							
								<span  class="holder">
								
									<img src="<?php echo $row['image_url'];?>" alt="" />
									
									<span class="book-name"><?php echo $row['title'];?></span>
									<span class="book-name"><font size="2">Book-id: <?php echo " ".$row['book_id']; ?></span>
									<span class="author"><?php echo $row['author'];?></span>
									<span class="description"><?php echo $row['description'];?></span>
									
							<?php 
							if($i%4==0 & $i!=0){?>
								<br /><br /><br /><br /><br /><br /><?php ;} 
$i+=1;   ?>
						</span>
							
							
							
						</div>
						 <?php    
						}
						mysqli_free_result($result);
						?>
				<?php 
				$query="select count(book_id) from book_det";
$result=mysqli_query($conn,$query);
$row= mysqli_fetch_row($result);
$n=$row[0];
 ?>
                                      
				</ul>
			</div>
			<!-- End Best-sellers -->
		</div>
		<!-- End Content -->
		<div class="cl">&nbsp;</div>
	</div>
	<!-- End Main -->
	<!-- Footer -->
	<div id="footer" class="shell">
		<div class="top">
			<div class="cnt">
				<div class="col about">
					<h4>About BestSellers</h4>
					
				</div>
				
				
	<?php mysqli_free_result($result);
			mysqli_close($conn);
			?>
</body>
</html>
<?php function redirect_to($lk){
		header("Location: " . $lk);
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
								$query="select * from book_det where category='cse'";
$result=mysqli_query($conn,$query);
if(!$result)
{
	die("data base failed 101");
}
while($row= mysqli_fetch_assoc($result)){

		?>
                                            
                                                <div style="border:thin"  class="product">
							<a href="#" class="info">
								<span  class="holder">
								
									<img src="<?php echo $row['image_url'];?>" alt="" />
									<span class="book-name"><?php echo $row['title'];?></span>
									<span class="author"><?php echo $row['author'];?></span>
									<span class="description"><?php echo $row['description'];?></span>
								</span>
							</a>
							
						</div>
						<?php }
						mysqli_free_result($result);
						?>
				<?php 
				$query="select count(book_id) from book_det";
$result=mysqli_query($conn,$query);
$row= mysqli_fetch_row($result);
$n=$row[0];
 ?>

<?php 
 
	include 'dashboard.php';

	if (isset($_SESSION['userid'])) 
	{
		$id = $_SESSION['userid']['id'];
		$rec = "select * from login where id=".$id;
		$res = mysqli_query($con,$rec);
		$data = mysqli_fetch_assoc($res);
	}

	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$image = $_FILES['image']['name'];
		$path = 'image/'.$image;
		move_uploaded_file($_FILES['image']['tmp_name'], $path);

		$sql = "update login set name='$name',email='$email',image='$image' where id=".$_SESSION['userid']['id'];

		mysqli_query($con,$sql);
	}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>

 	<style type="text/css">
 		
 	</style>

 </head>
 <body>
 	<form method="post" enctype="multipart/form-data" class="form">
	<table class="table" >
		<div class="tablein">
			<tr>
				<td><input type="text" name="name" placeholder="Name" class="text"  value="<?php echo @$data['name'] ?>"></td>			
			</tr>
			<tr>
				<td><input type="text" name="email" placeholder="Email" class="text" value="<?php echo @$data['email'] ?>"></td>
			</tr>
			<tr>
				<td><input type="file" name="image" class="text" value="<?php echo @$data['photo'] ?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" class="subbtn"></td>			
			</tr>
		</div>
		<td>	
			<a href="index.php" class="loginbtn">Login user</a>
		</td>
	</table>	
</form>
 </body>
 </html>

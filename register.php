<?php 

	$con = mysqli_connect("localhost","root","","contact");

	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$image = $_FILES['image']['name'];

		$path = 'image/'.$image;
		move_uploaded_file($_FILES['image']['tmp_name'], $path);

		$sql = "insert into `login`(`name`,`email`,`password`,`image`)values('$name','$email','$password','$image')";
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
		*{
		  margin: 0;
		  padding: 0;
		  box-sizing: border-box;
		  user-select: none;
		}
		body
		{
			background-image:url(backimg.jpg);
  			height: 100%;
  			background-size: cover;
		}
		body:after{
		  position: absolute;
		  content: '';
		  top: 0;
		  left: 0;
		  height: 100%;
		  width: 100%;
		  background: rgba(0,0,0,0.6);
		}
		.table
		{
			position: absolute;
  			top: 50%;
  			left: 50%;
  			z-index: 999;
  			text-align: center;
  			padding: 60px 32px;
  			width: 370px;
  			transform: translate(-50%,-50%);
  			background: rgba(255,255,255,0.04);
  			box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);
		}
		.table .text{
			margin: 10px 0px;
			position: relative;
			height: 35px;
			width: 100%;
			background: rgba(255,255,255,0.94);
			text-align: center;
		}

		.subbtn{
			padding: 7px 25px;
			background-color: rgba(145, 275, 125, 0.6);
			color: white;
			border: 2px solid lightgray;
			cursor: pointer;
		}
		.subbtn:hover{
			background: rgba(245, 245, 245, 0.5);
		}
		.loginbtn {
			color: white;
		}
		
	</style>
</head>
<body>

<form method="post" enctype="multipart/form-data" class="form">
	<table class="table" >
		<div class="tablein">
			<tr>
				<td><input type="text" name="name" placeholder="Name" class="text"></td>			
			</tr>
			<tr>
				<td><input type="text" name="email" placeholder="Email" class="text"></td>
			</tr>
			<tr>
				<td><input type="text" name="password" placeholder="Password" class="text"></td>
			</tr>
			<tr>
				<td><input type="file" name="image" class="text"></td>
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

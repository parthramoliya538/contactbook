<?php 


	session_start();
	$con=  mysqli_connect("localhost","root","","contact");

	if(isset($_SESSION['userid'])) 
	{
		header("location:dashboard.php");		
	}

	if(isset($_POST['submit'])) 
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "select * from `login` where `email`='$email' and `password`='$password'";
		$res = mysqli_query($con,$sql);
		$cnt = mysqli_num_rows($res);
		if($cnt==1) {
			$data = mysqli_fetch_assoc($res);
			$_SESSION['userid'] = $data;			
			header("location:dashboard.php");
 		}
 		else
 		{
 			$msg ="email and password are wrong ! ";
 		}
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
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
			color: white;
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
		.msg
		{
			padding-top: 100px;
			text-align: center; 
			color: lightgoldenrodyellow;
			z-index: 3;
		}
	</style>
</head>
<body>
	<h1 class="msg"><?php echo @$msg; ?></h1>
	<form method="post">
		<table class="table" >
			<div class="tablein">
				<tr>
					<td><input type="text" name="email" placeholder="Email" class="text"></td>
				</tr>
				<tr>
					<td><input type="text" name="password" placeholder="Password" class="text"></td>
				</tr>
				<tr>
					<td><input value="Login" type="submit" name="submit" class="subbtn"></td>			
				</tr>
			</div>
			<td>
				<a href="register.php" class="loginbtn">Register for user</a>
			</td>
		</table>
	</form>


</body>
</html>
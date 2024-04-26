<?php 

	
	include 'dashboard.php';
	
	$con = mysqli_connect("localhost","root","","contact");
	
	// echo '<pre>';
	// print_r($_SESSION['userid']['id']);


	if (isset($_POST['submit'])) 
	{
		$userid = $_SESSION['userid'];
		$u_id=implode(',', $userid);
		$name = $_POST['name'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];
		$image = $_FILES['image']['name'];
		$path = 'image/'.$image;
		move_uploaded_file($_FILES['image']['tmp_name'], $path);

		$sql = "insert into addcon(user_id,name,contact,address,image)values('$u_id','$name','$contact','$address','$image')";

		mysqli_query($con,$sql);
		
	}

		$con_data = "select * from addcon where user_id =".$_SESSION['userid']['id'];
		$data=mysqli_query($con,$con_data);
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
/*		  box-sizing: border-box;*/
/*		  user-select: none;*/
		}
		/*body
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
		}*/
		.table
		{
			position: absolute;
  			top: 55%;
  			left: 50%;
  			transform: translate(-50%,-50%);
  			z-index: 999;
  			text-align: center;
  			padding: 60px 32px;
  			width: 370px;
  			background: rgba(133, 126, 123,0.5);
  			box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);
		}
		.table .text{
			margin: 10px 0px;
			position: relative;
			height: 32px;
			width: 100%;
			background: rgba(202, 192, 240,0.5);
			text-align: center;
			border: 2px solid black;
		}
		.subbtn{
			padding: 7px 25px;
			background-color: rgba(38, 23, 94, 0.6);
			color: white;
			border: 2px solid ;
			cursor: pointer;
			margin-top: 15px;
		}
		.subbtn:hover{
			color: black;
			background: rgba(245, 245, 245, 0.5);
		}
	</style>

 </head>


 <body> 	
 	<form method="post" enctype="multipart/form-data">
 		<table class="table">
 			<div class="tablein">
 				<tr>
 					<td>Name :-</td>
 					<td><input type="text" name="name" class="text"></td>
 				</tr>
 				<tr>
 					<td>Contect :-</td>
 					<td><input type="number" name="contact"  class="text"></td>
 				</tr>
 				<tr>
 					<td>Address:-</td>
 					<td><input type="textarea" name="address"  class="text"></td>
 				</tr>
 				<tr>
 					<td>Image:-</td>
 					<td><input type="file" name="image"  class="text"></td>
 				</tr>
 				<tr>
 					<td colspan="2"><input type="submit" name="submit" value="Add Contact" class="subbtn"></td>
 				</tr>
 			</div>
 		</table>
 	</form>

 </body>
 </html>


<?php 

	session_start();
	$con = mysqli_connect("localhost","root","","contact");

	if(!isset($_SESSION['userid'])) 
	{
		header("location:index.php");
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>

 	<style type="text/css">
 		h2 , h4 {
 			margin: 0px;
 			padding: 0px;
 		}
 		.header {
 			background-color: rgba(0, 0, 0, 0.5);
 			padding: 10px 35px ;
 			border-radius: 20px 20px 0 0;
 			border: 2px solid black;
 		}
 		.header .topnev {
 			display: flex;
 		}
 		.header .topnev .logo {
 			width: 100px;
 			height: 100px;
 			border-radius: 50%;
 			padding-left: 30%;
 		}
 		.header .topnev .logo img {
 			width: 100%;
 			height: 100%;
 			border-radius: 50%;
 			border: 2px solid white;
 		}
 		.header .topnev .detail {
 			margin-left: 25px;
 		}
 		.header .topnev .detail .page{
			margin-top: 25px;
		}
 		.header .topnev .detail .page .link {
			border: 2px solid #ABB2B9;
 			padding: 5px 10px;
 			font-weight: 700;
 			text-decoration: none;
 			font-size: 18px;
 			color: #17202A;
 			border-radius: 5px;
 			transition: 0.3s;
 		}
 		.header .topnev .detail .page .link:hover {
 			background-color: #F4F6F6;
 		}
 	</style>

 </head>
 <body>
 	
 	<div class="header">
 		<div class="topnev">
 			<div class="logo">
 				<img src="image/<?php echo $_SESSION['userid']['image'] ?>">
 			</div>
 			<div class="detail">
 				<h2><?php echo $_SESSION['userid']['id'] ?> = <?php echo $_SESSION['userid']['name'] ?></h2>
 				<h4><?php echo $_SESSION['userid']['email'] ?></h4>
 				<div class="page">
 					<a href="add_contect.php" class="link">Add contact</a>
 					<a href="view_contect.php" class="link">view contect</a>
 					<a href="regs_cheng.php" class="link">register cheng</a>
 					<a href="logout.php" class="link">logout</a>
 				</div>
 			</div>
 		</div> 		
 	</div>

 </body>
 </html>

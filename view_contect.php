<?php  

 include 'dashboard.php';

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
		.table{
			margin: auto;
			margin-top: 50px;
		}
	</style>

</head>
<body>

	<table border="2" class="table">
		<tr>
			<th>Id</th>
			<th>User_Id</th>
			<th>Name</th>
			<th>Contact</th>
			<th>Address</th>
			<th>Image</th>
		</tr>

		<?php while ($info = mysqli_fetch_assoc($data)) { ?>
				<tr>
					<td><?php echo $info['id']; ?></td>
					<td><?php echo $info['user_id']; ?></td>
					<td><?php echo $info['name']; ?></td>
					<td><?php echo $info['contact']; ?></td>
					<td><?php echo $info['address']; ?></td>
					<td><img src="image/<?php echo $info['image']; ?>" width="70px" height="70px"></td>
				</tr>
		<?php } ?>
	</table>


</body>
</html>
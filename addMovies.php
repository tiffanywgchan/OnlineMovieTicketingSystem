<html>
	<head>
		<link href="stylessignup.css" rel="stylesheet" type="text/css">
		<meta charset="utf-8">
	</head>
	<h1>Add a Movie</h1>
	<form action="" method="post" name="userinfo">
		<div><input type="text" name="title" placeholder="Title"></div>
		<div><input id="runtime" type="text" name="runtime" placeholder="Runtime"></div>
		<div><input id="rating" type="text" name="rating" placeholder="Rating"></div>
		<div><input id="synopsis" type="text" name="synopsis" placeholder="Synopsis"></div>
		<div><input id="director" type="text" name="director" placeholder="Director"></div>
		<div><input id="company" type="text" name="company" placeholder="Company"></div>
		<div><input id="supplier" type="text" name="supplier" placeholder="Supplier"></div>
		<div><input id="startDate" type="text" name="startDate" placeholder="Start Date"></div>
		<div><input id="endDate" type="text" name="endDate" placeholder="End Date"></div>
		<div><input id="sales" type="text" name="sales" placeholder="Sales"></div>
		<button type="submit" name="SubmitButton" class="button"><span>Add</span></button>
	</form>
	<?php
		if(isset($_POST['SubmitButton'])){
			session_start();
				
				$conn = mysqli_connect('localhost', 'root', '', 'omstdb');
				$title = $_POST['title'];
				$runtime = $_POST['runtime'];
				$rating = $_POST['rating'];
				$synopsis = $_POST['synopsis'];
				$director = $_POST['director'];
				$company = $_POST['company'];
				$supplier = $_POST['supplier'];
				$startDate = $_POST['startDate'];
				$endDate = $_POST['endDate'];
				$sales = $_POST['sales'];
				$query2 = "INSERT INTO movie Values ('$title', '$runtime', '$rating', '$synopsis', '$director', '$company', '$supplier', '$startDate', '$endDate', '$sales')";
				if (mysqli_query($conn, $query2)) {
					header("Location: homeAdmin.php");
					exit();
				}else{
					echo "ERROR: Could not able to execute $query2. " . mysqli_error($conn);
				}
				
		}
	?>
</html>
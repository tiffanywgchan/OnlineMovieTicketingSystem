<html>

	<head>
		<link href="stylessignup.css" rel="stylesheet" type="text/css">
		<meta charset="utf-8">
		<title>OTMS - Remove Members</title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	</head>
	
	<h1>Remove a User</h1>
	
	<form action="" method="post" name="userinfo">
		<div><input type="text" name="accountNum" placeholder="Account Number"></div>
		<button type="submit" name="SubmitButton" class="button"><span>Remove User</span></button>
	</form>
	
	<?php
		if(isset($_POST['SubmitButton'])){
			session_start();
				
				$conn = mysqli_connect('localhost', 'root', '', 'omstdb');
				$accountNum = $_POST['accountNum'];
				$query2 = "DELETE FROM users WHERE accountNum = '$accountNum'";
				if (mysqli_query($conn, $query2)) {
					header("Location: homeAdmin.php");
					exit();
				}else{
					echo "ERROR: Could not able to execute $query2. " . mysqli_error($conn);
				}
				
		}
	?>
	
</html>
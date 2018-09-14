<html>
	<head>
		<link href="stylessignup.css" rel="stylesheet" type="text/css">
		<meta charset="utf-8">
	</head>
	<h1>Create an Account</h1>
	<form action="" method="post" name="userinfo">
		<div><input type="text" name="email" placeholder="Email Address"></div>
		<div><input id="pw" type="password" name="password" placeholder="Password"></div>
		<div><input id="phone" type="text" name="phone" placeholder="Phone Number"></div>
		<div><input id="streetnum" type="text" name="streetnum" placeholder="Street Number"></div>
		<div><input id="streetname" type="text" name="streetname" placeholder="Street Name"></div>
		<div><input id="city" type="text" name="city" placeholder="City"></div>
		<div><input id="postal" type="text" name="postal" placeholder="Postal Code"></div>
		<div><input id="creditnum" type="text" name="creditnum" placeholder="Credit Card Number"></div>
		<div><input id="creditexp" type="text" name="creditexp" placeholder="Expiry (MMDD)"></div>
		<button type="submit" name="SubmitButton" class="button"><span>Sign Up</span></button>
	</form>
	<?php
		if(isset($_POST['SubmitButton'])){
			session_start();
				
				$conn = mysqli_connect('localhost', 'root', '', 'omstdb');
				$email = $_POST['email'];
				$password = $_POST['password'];
				$streetNumber = $_POST['streetnum'];
				$streetName = $_POST['streetname'];
				$phoneNum = $_POST['phone'];
				$city = $_POST['city'];
				$postalCode = $_POST['postal'];
				$creditNum = $_POST['creditnum'];
				$expiryDate = $_POST['creditexp'];
				$query1 = "SELECT accountNum FROM users ORDER BY accountNum DESC LIMIT 1";
				$result = mysqli_query($conn, $query1) or die(mysqli_error($conn));
				$result = mysqli_fetch_assoc($result);
				$accountNum = ++$result['accountNum'];
				$query2 = "INSERT INTO users Values ('$accountNum', '$password', '$streetNumber', '$streetName', '$city', '$postalCode', '$phoneNum', '$email', '$creditNum', '$expiryDate', '0')";
				if (mysqli_query($conn, $query2)) {
					header("Location: index.php");
					exit();
				}else{
					echo "ERROR: Could not able to execute $query2. " . mysqli_error($conn);
				}
				
		}
	?>
</html>
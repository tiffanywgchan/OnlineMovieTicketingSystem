<html>
	<body>
		<?php
		session_start();

			$conn = mysqli_connect('localhost', 'root', '', 'omstdb');
			$email = $_POST['email'];
			$password = $_POST['password'];
			echo $password;
			echo $email;
			$query="SELECT * FROM `Users` WHERE email='$email' AND password='$password'";
			$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
			$count=mysqli_num_rows($result);

			if($count == 1){
				$_SESSION['email'] = $email;
			} else {
				$fmsg="Invalid Login Credentials";
			}

			if(isset($_SESSION['email'])) {
				$email=$_SESSION['email'];
				echo "you're in" . $email; 
			}
		?>
	</body>
</html>

<html>
	<head>
		<link href="stylesEditProfile.css" rel="stylesheet" type="text/css">
		<meta charset="utf-8">
	</head>
  <body>
  	<h1>Edit Complex</h1>
    <h3>Enter only the information you want to modify:</h3>
  	<form action="" method="post" name="userinfo">
  		<div><input type="text" name="name" placeholder="Name of Complex to Edit"></div>
  		<div><input id="numTheatres" type="text" name="numTheatres" placeholder="Number of Theatres"></div>
  		<div><input id="phoneNum" type="text" name="phoneNum" placeholder="Phone Number"></div>
  		<div><input id="streetnum" type="text" name="streetnum" placeholder="Street Number"></div>
  		<div><input id="streetname" type="text" name="streetname" placeholder="Street Name"></div>
  		<div><input id="city" type="text" name="city" placeholder="City"></div>
  		<div><input id="postal" type="text" name="postal" placeholder="Postal Code"></div>
  		<button type="submit" name="SubmitButton" class="button"><span>Submit</span></button>
  	</form>

  	<?php
  		if(isset($_POST['SubmitButton'])){
  			session_start();
  				$conn = mysqli_connect('localhost', 'root', '', 'omstdb');

  				$name = $_POST['name'];
  				$newNumTheatres = $_POST['numTheatres'];
				$newPhoneNum = $_POST['phoneNum'];
  				$newStreetNumber = $_POST['streetnum'];
  				$newStreetName = $_POST['streetname'];
  				$newCity = $_POST['city'];
  				$newPostalCode = $_POST['postal'];

          if($newNumTheatres != NULL) {
            $query2 = "UPDATE complex SET numTheatres ='$newNumTheatres' where name = '$name'";
            $updateSeats = mysqli_query($conn, $query2) or die(mysqli_error($conn));
          }

          if($newStreetNumber != NULL) {
            $query3 = "UPDATE complex SET streetNumber='$newStreetNumber' where name = '$name'";
            $updateStreetNum = mysqli_query($conn, $query3) or die(mysqli_error($conn));
          }

          if($newStreetName != NULL) {
            $query3 = "UPDATE complex SET streetName ='$newStreetName' where name = '$name'";
            $updateStreetName = mysqli_query($conn, $query3) or die(mysqli_error($conn));
          }

          if($newPhoneNum != NULL) {
            $query4 = "UPDATE complex SET phoneNum ='$newPhoneNum' where name = '$name'";
            $updateScreenSize = mysqli_query($conn, $query4) or die(mysqli_error($conn));
          }

          if($newCity != NULL) {
            $query5 = "UPDATE complex SET city='$newCity' where name = '$name'";
            $updateCity = mysqli_query($conn, $query5) or die(mysqli_error($conn));
          }

          if($newPostalCode != NULL) {
            $query6 = "UPDATE complex SET postalCode ='$newPostalCode' where name = '$name'";
            $updatePostal = mysqli_query($conn, $query6) or die(mysqli_error($conn));
          }

  		}
  	?>
  </body>
</html>
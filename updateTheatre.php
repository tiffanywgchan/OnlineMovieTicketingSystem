<html>
	<head>
		<link href="stylesEditProfile.css" rel="stylesheet" type="text/css">
		<meta charset="utf-8">
	</head>
  <body>
  	<h1>Edit Theatres</h1>
    <h3>Enter only the information you want to modify:</h3>
  	<form action="" method="post" name="userinfo">
  		<div><input type="text" name="num" placeholder="Number of Theatre to Edit"></div>
  		<div><input id="seats" type="text" name="seats" placeholder="Seats"></div>
  		<div><input id="screenSize" type="text" name="screenSize" placeholder="Screen Size"></div>
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

  				$num = $_POST['num'];
  				$newSeats = $_POST['seats'];
  				$newStreetNumber = $_POST['streetnum'];
  				$newStreetName = $_POST['streetname'];
  				$newScreenSize = $_POST['screenSize'];
  				$newCity = $_POST['city'];
  				$newPostalCode = $_POST['postal'];

          if($newSeats != NULL) {
            $query2 = "UPDATE theatre SET seats ='$newSeats' where num = '$num'";
            $updateSeats = mysqli_query($conn, $query2) or die(mysqli_error($conn));
          }

          if($newStreetNumber != NULL) {
            $query3 = "UPDATE theatre SET streetNumber='$newStreetNumber' where num = '$num'";
            $updateStreetNum = mysqli_query($conn, $query3) or die(mysqli_error($conn));
          }

          if($newStreetName != NULL) {
            $query3 = "UPDATE theatre SET streetName ='$newStreetName' where num = '$num'";
            $updateStreetName = mysqli_query($conn, $query3) or die(mysqli_error($conn));
          }

          if($newScreenSize != NULL) {
            $query4 = "UPDATE theatre SET screenSize ='$newScreenSize' where num = '$num'";
            $updateScreenSize = mysqli_query($conn, $query4) or die(mysqli_error($conn));
          }

          if($newCity != NULL) {
            $query5 = "UPDATE theatre SET city='$newCity' where num = '$num'";
            $updateCity = mysqli_query($conn, $query5) or die(mysqli_error($conn));
          }

          if($newPostalCode != NULL) {
            $query6 = "UPDATE theatre SET postalCode ='$newPostalCode' where num = '$num'";
            $updatePostal = mysqli_query($conn, $query6) or die(mysqli_error($conn));
          }

  		}
  	?>
  </body>
</html>
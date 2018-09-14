<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OTMS - Home for Admins</title>

	<!-- favicon -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  </head>

  <body>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <?php
		session_start();
    ?>

    <div class="container-fluid">
      <div class="row">
          <h1>Welcome Admin</h1>
          <img src="img/omtslogo.png"  id="logo">
      </div>
    </div>

    <h3>What would you like to do today?</h3>

    <!-- Button Navigation -->
    <div class="container">
      <form action="" method="post" name="menu">
        <div class="row">
			<div class="col">
				<button type="submit" class="btn-change" name="browse">Browse Movies</button>
			</div>
			<div class="col">
				<button type="submit" class="btn-change" name="purchase">Purchase Movie Tickets</button>
			</div>
			<div class="col">
				<button type="submit" class="btn-change" name="view">View Purchases</button>
			</div>
			<div class="col">
				<button type="submit" class="btn-change" name="cancel">Cancel Purchases</button>
			</div>

			<div class="col">
			  <button type="submit" class="btn-change" name="previousRentals">Browse Previous Rentals</button>
			</div>
			<div class="col">
			  <button type="submit" class="btn-change" name="review">Write a Review</button>
			</div>
			<div class="col">
			  <button type="submit" class="btn-change" name="editProfile">Edit Profile</button>
			</div>
			<div class="col">
			  <button type="submit" class="btn-change" name="listMembers">List Members</button>
			</div>
			<div class="col">
			  <button type="submit" class="btn-change" name="removeMembers">Remove Members</button>
			</div>
			<div class="col">
			  <button type="submit" class="btn-change" name="updateTheatre">Update Theatre Info</button>
			</div>
			<div class="col">
			  <button type="submit" class="btn-change" name="updateComplex">Update Complex Info</button>
			</div>
			<div class="col">
			  <button type="submit" class="btn-change" name="addMovies">Add Movies</button>
			</div>
			<div class="col">
			  <button type="submit" class="btn-change" name="updatePlaceTime">Update Where and When Movies Play</button>
			</div>
			<div class="col">
			  <button type="submit" class="btn-change" name="showRental">Show Rental History of a User</button>
			</div>
			<div class="col">
			  <button type="submit" class="btn-change" name="popularMovie">Show Most Popular Movie</button>
			</div>
			<div class="col">
			  <button type="submit" class="btn-change" name="popularComplex">Show Most Popular Complex</button>
			</div>
        </div>
    </form>
  </div>

  <?php
    
    if (isset($_POST['browse'])){
      header("Location: browseMovieUsers.php");
    }
	
	if (isset($_POST['listMembers'])){
      header("Location: listMembers.php");
    }
	
	if (isset($_POST['addMovies'])){
      header("Location: addMovies.php");
    }
	
	if (isset($_POST['removeMembers'])){
      header("Location: removeMembers.php");
    }

	if (isset($_POST['popularMovie'])){
      header("Location: popularMovie.php");
    }
	
	if (isset($_POST['popularComplex'])){
      header("Location: popularComplex.php");
    }
	
	if (isset($_POST['updateTheatre'])){
      header("Location: updateTheatre.php");
    }
	
	if (isset($_POST['updateComplex'])){
      header("Location: updateComplex.php");
    }
	
	if (isset($_POST['showRental'])){
      header("Location: showRental.php");
    }
  ?>

    <style>
      body {
        font-family: 'Helvetica';
        color: white;
        background-color: #000639;
      }

      h1 {
        margin-top: 30px;
        margin-left: 50px;
        text-align: left;
      }

      #logo {
        width:20%;
        position: absolute;
        overflow: hidden;
        float:right;
        right:0;
        clear:both;
        margin-top: 30px;
        margin-right: 20px;
        width: 150px;
        height: 75px;

      }

      h3 {
        margin-top: 40px;
        margin-left: 90px;
        font-size: 20px;
      }

      #browse {
        color: white;
      }

      button {
        background-color: #DAA520;
        color: white;

        margin-right: 10px;
        margin-bottom: 30px;
        font-size: 25px;
      }

      .btn-change{
        height: 240px;
        width: 240px;
        background-color: #DAA520;
        margin-top: 20px;
        margin-right: 10px;
        margin-bottom: 30px;
        box-shadow: 0 0 1px #ccc;
        -webkit-transition: all 0.5s ease-in-out;
        border: 5px;
        color: #fff;
     }
     .btn-change:hover{
       -webkit-transform: scale(1.1);
       background: #C7C9CC;
     }

    </style>
  </body>

</html>

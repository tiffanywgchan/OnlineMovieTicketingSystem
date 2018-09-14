<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OTMS - Most Popular Movie</title>

	<!-- favicon -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  </head>

  <body>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 

    <div class="container-fluid">
      <div class="row">
          <h1>Most Popular Movie</h1>
          <img src="img/omtslogo.png"  id="logo">
      </div>
    </div>

    <?php
      $conn = new mysqli("localhost","root","","omstdb");
      if ($conn->connect_error) {
        die("Connection failed:".$conn->connect_error);
      }

      $result = $conn->query("SELECT MAX(sales) as maxSales FROM `movie`");
	  $rows = $result->fetch_assoc();
	  $sales = $rows['maxSales'];
      $title = $conn->query("SELECT title from movie where sales = $sales");
	  $rows = $title->fetch_assoc();
	  $title = $rows['title'];

      if ($result->num_rows > 0) {
         echo "<div class='container' id='listing'>
                  <div class='row'>
                      <h2>" ." ". $title . "</h2>
                    </div>"
                  . "<div class='row'><p>"
					  . "<b>Sales: </b>" .$sales . "<br>"	
                    . "<br><br></p></div></div>";
        
      } else {
          echo "0 results";
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

      #runtime {
        padding-left: 40px;
        float: right;
      }

      #listing {
        margin-top: 30px;
      }
	  
    </style>
  </body>

</html>

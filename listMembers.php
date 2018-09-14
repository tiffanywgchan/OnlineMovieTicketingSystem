<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OTMS - List Members</title>

	<!-- favicon -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  </head>

  <body>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <button onclick="topFunction()" id="backTop" title="Go To Top">Top</button>
    <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("backTop").style.display = "block";
        } else {
            document.getElementById("backTop").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
    </script>

    <div class="container-fluid">
      <div class="row">
          <h1>List Members</h1>
          <img src="img/omtslogo.png"  id="logo">
      </div>
    </div>

    <?php
      $conn = new mysqli("localhost","root","","omstdb");
      if ($conn->connect_error) {
        die("Connection failed:".$conn->connect_error);
      }

      $result = $conn->query("SELECT * FROM `users`");
      

      if ($result->num_rows > 0) {
        while ($rows = $result->fetch_assoc()) {
          echo "<div class='container' id='listing'>
                  <div class='row'>
                      <h2>" ." ". $rows['accountNum'] . "</h2>
                    </div>"
                  . "<div class='row'><p>"
					  . "<b>Email: </b>" .$rows['email'] . "<br>"	
                      . "<b>Password: </b>" . $rows['password'] . "<br>"
                      . "<b>Address: </b>" . $rows['streetNumber'] . " " . $rows['streetName'] . " " . $rows['city']. " " . $rows['postalCode'] . "<br>" . "<b>Phone: </b>" . $rows['phoneNum'] . "<br>" . "<b>Credit Card: </b>" . $rows['creditNum']. " " . $rows['expiryDate'] 
                    . "<br><br></p></div></div>";
        }
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

      #backTop {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99; /*ensures it does not overlap*/
        border: none;
        outline: none;
        background-color: #DAA520;
        color: white;
        cursor: pointer; /*Adds a mouse pointer on hover*/
        padding: 15px;
        border-radius: 8px; /*adds rounded corners*/
      }

      #backTop:hover {
        background-color: #C7C9CC;
      }

    </style>
  </body>

</html>

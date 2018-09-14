<html>
	<head>
		<link href="stylessignup.css" rel="stylesheet" type="text/css">
		<meta charset="utf-8">
	</head>
	<h1>Show Rental History</h1>
	<form action="" method="post" name="userinfo">
		<div><input type="text" name="accountNum" placeholder="Account Number"></div>
		<button type="submit" name="SubmitButton" class="button"><span>Check History</span></button>
	</form>
	
	<?php
		if(isset($_POST['SubmitButton'])){
			session_start();
				
				$conn = mysqli_connect('localhost', 'root', '', 'omstdb');
				$accountNum = $_POST['accountNum'];
				$query1 = "SELECT * FROM  numTickets WHERE accountNum = '$accountNum'";
				$result = mysqli_query($conn, $query1) or die(mysqli_error($conn));
				if ($result->num_rows > 0) {
					while ($rows = $result->fetch_assoc()) {
						echo "<div class='container' id='listing'>
							  <div class='row'>
								
								</div>"
							  . "<div class='row'><p>"
								  . "<b>Order ID: </b>" . $rows['orderID'] . "<br>"
								  . "<b>Number of Tickets: </b>" . $rows['numTickets'] . "<br>"
								. "<br><br></p></div></div>";
					}
				} else {
					echo "0 results";
				}
				
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
</html>
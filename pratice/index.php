<!DOCTYPE html>
<html>
	<head>
		<title>Bootstrap Example</title>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  	<style>
			* {
			  box-sizing: border-box;
			}

			#myInput {
			  background-image: url('css/searchicon.png');
			  background-position: 10px 10px;
			  background-repeat: no-repeat;
			  width: 100%;
			  font-size: 16px;
			  padding: 12px 20px 12px 40px;
			  border: 1px solid #ddd;
			  margin-bottom: 12px;
			}

			#myTable {
			  border-collapse: collapse;
			  width: 100%;
			  border: 1px solid #ddd;
			  font-size: 18px;
			}

			#myTable th, #myTable td {
			  text-align: left;
			  padding: 12px;
			}

			#myTable tr {
			  border-bottom: 1px solid #ddd;
			}

			#myTable tr.header, #myTable tr:hover {
			  background-color: #f1f1f1;
			}
			.header {
			  overflow: hidden;
			  background-color: #f1f1f1;
			  padding: 20px 10px;
			  margin-bottom: 50px;
			}
			body {font-family: Arial, Helvetica, sans-serif;}

			/* Full-width input fields */
			input[type=text], input[type=password] {
			  width: 85%;
			  padding: 12px 20px;
			  margin: 8px 0;
			  display: inline-block;
			  border: 1px solid #ccc;
			  box-sizing: border-box;
			}

			/* Set a style for all buttons */
			button {
			  background-color: #4CAF50;
			  color: white;
			  padding: 14px 20px;
			  margin: 8px 0;
			  border: none;
			  cursor: pointer;
			  width: 91%;
			}

			button:hover {
			  opacity: 0.8;
			}

			/* Extra styles for the cancel button */
			.cancelbtn {
			  width: auto;
			  padding: 10px 18px;
			  background-color: #f44336;
			}

			/* Center the image and position the close button */
			.imgcontainer {
			  text-align: center;
			  margin: 24px 0 12px 0;
			  position: relative;
			}

			img.avatar {
			  width: 40%;
			  border-radius: 50%;
			}

			.container {
			  padding: 16px;
			}

			span.psw {
			  float: right;
			  padding-top: 16px;
			}

			/* The Modal (background) */
			.modal {
			  display: none; /* Hidden by default */
			  position: fixed; /* Stay in place */
			  z-index: 1; /* Sit on top */
			  left: 0;
			  top: 0;
			  width: 100%; /* Full width */
			  height: 100%; /* Full height */
			  overflow: auto; /* Enable scroll if needed */
			  background-color: rgb(0,0,0); /* Fallback color */
			  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
			  padding-top: 60px;
			}

			/* Modal Content/Box */
			.modal-content {
			  background-color: #fefefe;
			  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
			  border: 1px solid #888;
			  width: 80%; /* Could be more or less, depending on screen size */
			}

			/* The Close Button (x) */
			.close {
			  position: absolute;
			  right: 25px;
			  top: 0;
			  color: #000;
			  font-size: 35px;
			  font-weight: bold;
			}

			.close:hover,
			.close:focus {
			  color: red;
			  cursor: pointer;
			}

			/* Add Zoom Animation */
			.animate {
			  -webkit-animation: animatezoom 0.6s;
			  animation: animatezoom 0.6s
			}

			@-webkit-keyframes animatezoom {
			  from {-webkit-transform: scale(0)} 
			  to {-webkit-transform: scale(1)}
			}
			  
			@keyframes animatezoom {
			  from {transform: scale(0)} 
			  to {transform: scale(1)}
			}

			/* Change styles for span and cancel button on extra small screens */
			@media screen and (max-width: 300px) {
			  span.psw {
			     display: block;
			     float: none;
			  }
			  .cancelbtn {
			     width: 100%;
			  }
			}
		</style>
	</head>
	<body>
		<div class="header">
			<h1 align="center">User Details</h1>				
			<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
		</div>
		<div class='container'>
			<form>
				<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for City/Sub City..." title="Type in a name" autocomplete="off">
			</form>
			<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "pratice";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error)
			{
			    die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT * FROM user_details";
			$result = $conn->query($sql);

			if ($result->num_rows > 0)
			{
			    // output data of each row
			    echo "<table id='myTable' class='table table-bordered'><tr class='header'><th>Sr.No.</th><th>City</th><th>Sub City</th><th>Shop Name</th><th>Map Location</th><th>Description</th><th>Contact</th></tr>";
			    $i=1;
			    while ($row = $result->fetch_assoc())
			    {
			        echo "<tr><td>" . $i . "</td><td>" . $row["city"] . "</td><td>" . $row["sub_city"] . "</td><td>" . $row["shop_name"] . "</td><td><a href='map.php?lat=".$row['lat']."&lng=".$row['lng']."&city=".$row['city']."&sub_city=".$row['sub_city']."&shop_name=".$row['shop_name']."&description=".$row['description']."&contact_number=".$row['contact_number']."'>Location</a></td><td>" . $row["description"] . "</td><td>" . $row["contact_number"] . "</td></tr>";
			        $i++;
			    }
			    echo "</table>";
			}
			else
			{
			    echo "0 results";
			}

			$conn->close();
			?>
		</div>
		<div id="id01" class="modal">
		  <div class="modal-content animate">
		    <div class="imgcontainer">
		      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
		      <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
		      <br><br>
		    </div>

		    <div class="container">
		      <label for="uname"><b>Username</b></label>
		      <input id ="uname" type="text" placeholder="Enter Username" name="uname" required>
		      <br>
		      <label for="psw"><b>Password</b></label>
		      <input id="psw" type="password" placeholder="Enter Password" name="psw" required>
		        
		      <button id="submit" type="submit">Login</button><br>
		      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		      <!-- <label>
		        <input type="checkbox" checked="checked" name="remember"> Remember me
		      </label> -->
		    </div>

		    <!-- <div style="width:580px" class="container" style="background-color:#f1f1f1">
		      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		      <span class="psw">Forgot <a href="#">password?</a></span>
		    </div> -->
		  </div>
		</div>
		<script>
		function myFunction() {
		  var input, filter, table, tr, td1, td2, i, txtValue1, txtValue2;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
		    td1 = tr[i].getElementsByTagName("td")[1];
		    td2 = tr[i].getElementsByTagName("td")[2];
		    if (td1||td2) {
		      txtValue1 = td1.textContent || td1.innerText;
		      txtValue2 = td2.textContent || td2.innerText;
		      if (txtValue1.toUpperCase().indexOf(filter) > -1 ||txtValue2.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
		    }       
		  }
		}
		// Get the modal
		var modal = document.getElementById('id01');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}

		$('#submit').click(function() {
			if($('#uname').val() != "admin" || $('#psw').val() != "admin"){
				alert("User is not valid");
			}
			else{
				window.location.href = "http://localhost:8000/pratice/admin_page.php";
			}
		});
		</script>
	</body>
</html>
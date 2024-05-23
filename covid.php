
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<nav>
 <div class="nav-wrapper">
      <a href="#" class="brand-logo right">Covid Database - Justin Carr</a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
	  <li><a href="searchVax.php">SearchVax</a></li>
      <li><a href="covid.php">OHIP</a></li>
      <li><a href="workerLookup.php">SearchWorker</a></li>
	  <li><a href="searchPatient.php">SearchPatient</a></li>
      </ul>
    </div>
  </nav>
    <head>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	
        <meta charset="utf-8">
        <title>Covid Database</title>
    </head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Welcome please enter your OHIP number</h1>
<h2></h2>
<form action="#" method="post">
<input type="text" name="ohipN">
<br>
<p><input type = "submit" name = "submit"></p>
</form>


<?php

$host = "localhost";
$dbname = "cisc332";
$username = "root";
$password = "";

$con = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()){
    die("Connection error: ". mysqli_connect);
}

if(isset($_POST['submit'])){
	$ohip = $_POST['ohipN'];
	
	$check_ohip = mysqli_query($con, "SELECT OHIP from patient WHERE OHIP = '$ohip'");
	
if ($check_ohip->num_rows > 0){
	header('Location: vaccineUpload.php', TRUE, 301);
}else {
	header('Location: patientReg.php', TRUE, 301);
	}
	
	$_SESSION["session"] = $_POST['ohipN'];
}

// <script type="text/javascript" src="js/materialize.min.js"></script>

// </body>
// </html> 



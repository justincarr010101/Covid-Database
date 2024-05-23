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
        <meta charset="utf-8">
        <title>Covid Database</title>
    </head>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<body>
<?php
include 'connectdb.php';
?>
<h1>OHIP not recognized please insert patient information</h1>
<h2></h2>

<form action="#" method="post">
<p>First Name:</p>
<input type="text" name="FirstName">
<br>
<p>Last Name:</p>
<input type="text" name="LastName">
<br>
<p>Date of Birth:</p>
<input type="date" name="DateOfBirth">
<br>
<p><input type = "submit" name = "submit"></p>
</form>


<?php
session_start();
$ohip = $_SESSION["session"];

$host = "localhost";
$dbname = "cisc332";
$username = "root";
$password = "";

$con = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()){
    die("Connection error: ". mysqli_connect);
}

if(isset($_POST['submit'])){
	$FName =  $_POST['FirstName'];
	$LName = $_POST['LastName'];
	$dob = $_POST['DateOfBirth'];
	
	$stmt = mysqli_prepare($con, "INSERT INTO patient(OHIP, firstName, lastName, dob) values (?,?,?,?);");
	
mysqli_stmt_bind_param($stmt, "ssss",
			$ohip,
			$FName,
			$LName,
			$dob);

mysqli_stmt_execute($stmt);

header("Location: vaccineUpload.php", TRUE, 301);


}
?>
 <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html> 

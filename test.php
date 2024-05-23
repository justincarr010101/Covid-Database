<!DOCTYPE html>
<html>
    <head>
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
session_start();

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
	
$_SESSION["session1"] = $_POST['ohipN'];
	
if ($check_ohip->num_rows > 0){
	header('Location: vaccineUpload.php', TRUE, 301);
}else {
	header('Location: patientReg.php', TRUE, 301);
	}
}

?>

</body>
</html> 



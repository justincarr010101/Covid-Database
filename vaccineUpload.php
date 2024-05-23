<!DOCTYPE html>
<?php
include 'connectdb.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Covid Database</title>
    </head>
<body>
<h1>OHIP recognized please insert vaccination information</h1>
<h2></h2>



<form action="#" method="post">

<p>Lot Number:</p>
<input type="text" name="lot">
<br>
<p>Select Clinic:</p>
<p><select name="clinicN"></p>
                <?php 

                session_start();
				
                $host = "localhost";
                $dbname = "cisc332";
                $username = "root";
                $password = "";
				session_start();
				$ohip = $_SESSION['session1'];
                $con = mysqli_connect($host, $username, $password, $dbname);
				
                $sql = "SELECT name FROM vaxclinic";
                $all_clinics = mysqli_query($con, $sql);

                    while ($clinics = mysqli_fetch_array(
                            $all_clinics, MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $clinics["name"];
                        // The value we usually set is the primary key
                    ?>">
                        <?php echo $clinics["name"];
                            // To show the category name to the user
                        ?>
                    </option>
                <?php 
                    endwhile; 
                    // While loop must be terminated
                ?>
            </select>
<p>Date of Vaccination:</p>
<input type="date" name="date">
<br>
<p><input type = "submit" name = "submit"></p>
</form>

<?php
$ohip = $_SESSION['session'];

$host = "localhost";
$dbname = "cisc332";
$username = "root";
$password = "";

$con = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()){
    die("Connection error: ". mysqli_connect);
}

if(isset($_POST['submit'])){
	$Clinic =  $_POST['clinicN'];
	$LotN = $_POST['lot'];
	$dov = $_POST['date'];
	
	$stmt = mysqli_prepare($con, "INSERT INTO vaccination(patientOHIP, vaxClinic, vaccineLot, date) values (?,?,?,?);");
	
mysqli_stmt_bind_param($stmt, "ssss",
			$ohip,
			$Clinic,
			$LotN,
			$dov);

mysqli_stmt_execute($stmt);

header("Location: vaccineOut.php", TRUE, 301);
}
?>

</body>
</html> 

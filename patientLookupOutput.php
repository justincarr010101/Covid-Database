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
</head>
<body>

    <h1>All Vaccinations For Patient Selected</h1>
	<br>
<?php

if(isset($_POST['submit'])) {
		header("Location:  Covid.php", TRUE, 301);
		}

?>


<?php

session_start();
		 $patient = $_SESSION["patientLookup"];

        $host = "localhost";
        $dbname = "cisc332";
        $username = "root";
        $password = "";

        $con = mysqli_connect($host, $username, $password, $dbname);
        $mysqli = new mysqli($host, $username, $password, $dbname);

        if (mysqli_connect_errno()){
            die("Connection error: ". mysqli_connect);

        }

            $query = "SELECT patientOHIP, vaccineLot, date, 
            patient.firstName, patient.lastName, 
            vaccine.producedBy FROM vaccination 
            INNER JOIN vaccine ON 
            vaccination.vaccineLot = vaccine.lot 
            INNER JOIN patient ON vaccination.patientOHIP = patient.OHIP WHERE patient.OHIP = '$patient';";

            $result = $mysqli->query($query);

            echo "<table>";

            /* fetch values */
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr><th>" . "Patients Name: ". htmlspecialchars($row['firstName']) . "&nbsp" . htmlspecialchars($row['lastName']). "<p></p>" . "Patient OHIP: " . "&nbsp" .  htmlspecialchars($row['patientOHIP']) ."<p></p>" . "Type of Vaccine Recieved: " ."&nbsp". htmlspecialchars($row['producedBy']) . "<p></p>" . "Date the vaccine was received: " ."&nbsp".  htmlspecialchars($row['date']);  //$row['index'] the index here is a field name
            }
			




?>


 <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
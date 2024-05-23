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
<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<body>
    <h1>Clinic Workers At Selected Site</h1>
    
<?php

session_start();
        $work = $_SESSION['healthcareSearch'];
        $host = "localhost";
        $dbname = "cisc332";
        $username = "root";
        $password = "";
        $con = mysqli_connect($host, $username, $password, $dbname);
        $mysqli = new mysqli($host, $username, $password, $dbname);
		
            $query = "SELECT drworksat.clinicName, doctor.firstName, doctor.lastName, doctor.ID, drcredentials.Cred
            FROM drworksat INNER JOIN doctor ON drworksat.ID = doctor.ID
            INNER JOIN drcredentials ON drworksat.ID = drcredentials.ID WHERE drworksat.clinicName = '$work'
            UNION
            SELECT nurseworksat.clinicName, nurse.firstName, nurse.lastName, nurse.ID, nursecredentials.Cred
            FROM nurseworksat INNER JOIN nurse ON nurseworksat.ID = nurse.ID
            INNER JOIN nursecredentials ON nurseworksat.ID = nursecredentials.ID WHERE nurseworksat.clinicName = '$work'";
            
            $result = $mysqli->query($query);
            echo "<table>";
			
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr><th>"  . "Name of Worker: " . "&nbsp" . htmlspecialchars($row['firstName']) . "&nbsp" . htmlspecialchars($row['lastName']) . "&nbsp" . "&nbsp" . "&nbsp". "Doctor (DR) or Nurse (NS): " . htmlspecialchars($row['Cred']) . "\n"; 
            }
           
?>
 <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
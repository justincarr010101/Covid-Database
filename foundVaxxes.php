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
    
    <h1>Your Desired Vaacine can be found at this Clinic</h1>
    
<?php

session_start();
        $host = "localhost";
        $dbname = "cisc332";
        $username = "root";
        $password = "";
		$vaccine = $_SESSION['vaccine'];
        $con = mysqli_connect($host, $username, $password, $dbname);
        $mysqli = new mysqli($host, $username, $password, $dbname);

        if (mysqli_connect_errno()){
            die("Connection error: ". mysqli_connect);

        }
            
            $query = "SELECT clinic, vaccine.producedBy, vaccine.doses 
            FROM shipsto INNER JOIN vaccine 
            ON shipsto.lotNumber = vaccine.lot WHERE vaccine.producedBy = '$vaccine';";
            
            $result = $mysqli->query($query);

            echo "<table>";

            /* fetch values */
            while($row = $result->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr><th>" . "Clinic Name:" .  "&nbsp" . htmlspecialchars($row['clinic']) . "<p></p>". "Vaccination type:" .  "&nbsp" . htmlspecialchars($row['producedBy']) . "<p></p>". "There are".  "&nbsp" . htmlspecialchars($row['doses']) . "&nbsp" . "doses left";           
            }
           
?>


 <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
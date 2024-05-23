<?php
  session_start();
  $host = "localhost";
  $dbname = "cisc332";
  $username = "root";
  $password = "";
  $con = mysqli_connect($host, $username, $password, $dbname);

    $sql = "SELECT DISTINCT drworksat.clinicName FROM drworksat UNION SELECT DISTINCT nurseworksat.clinicName FROM nurseworksat;";

    $Clinics = mysqli_query($con, $sql);
    if(isset($_POST['submit']))
    {
        header('Location: workerOutput.php');
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">    
</head>
<body>
    <h1>Select Desired Clinic to See Their HealthCare Workers</h1>
    <form method="POST">
        <label>Clinic Names:</label>
        <select name="ClinicWork">
            <?php 
                while ($clins = mysqli_fetch_array($Clinics, MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $clins["clinicName"];
                ?>">
                    <?php echo $clins["clinicName"];
                    ?>
                </option>
            <?php 
                $_SESSION["healthcareSearch"] = $_POST['ClinicWork'];
                endwhile; 
            ?>
        </select>
        <br>
        <input type="submit" value="submit" name="submit">
    </form>
    <br>
</body>
</html>
<?php
session_start();
?>
<?php

  $host = "localhost";
  $dbname = "cisc332";
  $username = "root";
  $password = "";
  
  $con = mysqli_connect($host, $username, $password, $dbname);
  
  if (mysqli_connect_errno()){
      die("Connection error: ". mysqli_connect);
  }

    $sql = "SELECT * FROM patient";
    $all_patients = mysqli_query($con, $sql);
   

    if(isset($_POST['submit']))
    {
        header('Location: patientLookupOutput.php', TRUE, 301);
    }
?>
   
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">    
</head>
<body>
    <h1>Please Select the Name of the Patient</h1>
    <form method="POST">
        <label>Name of Patient:</label>
        <select name="Patient">
            <?php 
                while ($patient = mysqli_fetch_array($all_patients, MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $patient["OHIP"];
                ?>">
                    <?php echo $patient["firstName"];
                    ?>
                </option>
            <?php 
                $_SESSION["patientLookup"] = $_POST['Patient'];
                endwhile; 
                
            ?>
        </select>
        <br>
        <input type="submit" value="submit" name="submit">
    </form>
    <br>

</body>
</html>
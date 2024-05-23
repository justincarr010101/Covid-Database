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

    $sql = "SELECT producedBy FROM vaccine";
    $all_ships = mysqli_query($con, $sql);

    if(isset($_POST['submit']))
    {
        header('Location: foundVaxxes.php');
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
    <h1>Vaccine Finder Form</h1>
    <form method="POST">
        <label>Type of Vaccine:</label>
        <select name="producedBy">
            <?php 
                while ($ships = mysqli_fetch_array($all_ships, MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $ships["producedBy"];
                ?>">
                    <?php echo $ships["producedBy"];
                    ?>
                </option>
            <?php 
				$_SESSION["vaccine"] = $_POST['producedBy'];
                endwhile; 
                
            ?>
        </select>
        <br>
        <input type="submit" value="submit" name="submit">
    </form>
    <br>
</body>
</html>




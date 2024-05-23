<?php
try {
    $connection = new PDO('mysql:host=localhost;dbname=cisc332', "root", "");
} catch (PDOException $e) {
    print "Error!: ". $e->getMessage(). "<br/>";
    die();
}
?>
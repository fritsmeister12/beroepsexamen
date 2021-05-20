<?php
// Hiermee wordt er een connectie naar de database gemaakt.
require '../config/config.php';

// De id ophalen uit de url
$id = $_GET['id'];

// SQL query voorbereiden voordat hij gebruikt wordt
$sql = "DELETE FROM tijdsloten WHERE tijdsloten.id = $id";

// Proberen de sql in de database toe te voegen
if (mysqli_query($con, $sql)) {

    // Hier wordt je terug gestuurd naar het beginscherm als het gelukt is
    header('Location: ../view/admin-dashboard.php');
    exit;
} else {
    // Als iets niet goed gaat krijg je een error melding
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

// Sluit connectiie
mysqli_close($con);
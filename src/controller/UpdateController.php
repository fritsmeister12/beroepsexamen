<?php
// Hiermee wordt er een connectie naar de database gemaakt.
require '../config/config.php';

// Escape user inputs voor veilighied tegen sql injection
$datum = mysqli_real_escape_string($con, $_POST['datum']);
$van = mysqli_real_escape_string($con, $_POST['van']);
$tot = mysqli_real_escape_string($con, $_POST['tot']);
$id = mysqli_real_escape_string($con, $_POST['id']);


// SQL query voorbereiden voordat hij gebruikt wordt
$sql = "UPDATE tijdsloten SET datum = '$datum', van = '$van', tot = '$tot' WHERE tijdsloten.id = $id";

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
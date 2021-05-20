<?php
// Hiermee wordt er een connectie naar de database gemaakt.
require '../config/config.php';

// De id van de gebruiker die ingelogd is via een session
$gebruiker = $_GET['id'];

// SQL query voorbereiden voordat hij gebruikt wordt
$sql = "DELETE FROM tijdslot_gebruikers WHERE id_gebruiker = '$gebruiker'";

// Hier proberen wij een connectie te maken met de database en kijken of we wat vinden
if (mysqli_query($con, $sql)) {

    // Hier wordt je terug gestuurd naar het beginscherm als het gelukt is
    header('Location: ../view/welcome.php');
    exit;
} else {
    // Als iets niet goed gaat krijg je een error melding
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

?>
<?php
// Hiermee wordt er een connectie naar de database gemaakt.
require '../config/config.php';



// Escape user inputs voor veilighied tegen sql injection
$naam = mysqli_real_escape_string($con, $_POST['naam']);
$adres = mysqli_real_escape_string($con, $_POST['adres']);
$plaats = mysqli_real_escape_string($con, $_POST['plaats']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$telefoonnummer = mysqli_real_escape_string($con, $_POST['telefoonnummer']);
$wachtwoord = mysqli_real_escape_string($con, $_POST['wachtwoord']);
$lid = mysqli_real_escape_string($con, $_POST['lid']);

if ($lid == 'on') {
    $lid = 'ja';
} else {
    $lid = 'nee';
}

// Hier wordt het ingevoerde wachtwoord beveiligd via de hash
$wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);


// Proberen de sql in de database toe te voegen
$sql = "INSERT INTO gebruikers (id, naam, adres, plaats, email, telefoonnummer, wachtwoord, lid, level) VALUES (NULL, '$naam', '$adres', '$plaats', '$email', '$telefoonnummer', '$wachtwoord', '$lid', '0')";
if (mysqli_query($con, $sql)) {

    // Hier wordt je terug gestuurd naar het beginscherm als het gelukt is
    header('Location: ../view/login.php');
    exit;
} else {
    // Als iets niet goed gaat krijg je een error melding
    echo "Helaas er is wat mis gegaan!
    <a href='../../index.php'>Klik hier om terug te gaan!</a>";
}

// Sluit connectiie
mysqli_close($con);
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

$wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);


// Proberen de sql in de database toe te voegen
$sql = "INSERT INTO gebruikers (id, naam, adres, plaats, email, telefoonnummer, wachtwoord, level) VALUES (NULL, '$naam', '$adres', '$plaats', '$email', '$telefoonnummer', '$wachtwoord', '0')";
if (mysqli_query($con, $sql)) {
    // $to      = $email;
    // $subject = 'Verificatie';
    // $message = "<a href='oefenexamen.matthewgroenendijk.com/src/Controller/VerifyController.php?vkey=".$vkey."'>Verifieer hier!</a>";
    // $headers = 'From: verify@glr.nl' . "\r\n" .
    //     'Reply-To: verify@glr.nl' . "\r\n" .
    //     'X-Mailer: PHP/' . phpversion();

    // mail($to, $subject, $message, $headers);

    header('Location: ../view/login.php');
    exit;
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

// Close connection
mysqli_close($con);
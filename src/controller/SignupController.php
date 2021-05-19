<?php
require '../config/config.php';

$gebruiker = $_SESSION['id'];
$tijdslot = $_GET['id'];
$email = $_SESSION['name'];

$site = '83238.ict-lab.nl/beroepsexamen';

$sql = "INSERT INTO `tijdslot_gebruikers` (`id_tijdslot`, `id_gebruiker`) VALUES ('$tijdslot', '$gebruiker');";
if (mysqli_query($con, $sql)) {

    $num = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);

    $to      = $_SESSION['name'];
    $subject = 'Bevestiging van aanmelding!';
    // Message
    $message = '
    <html>
    <head>
    <title>Uw bevestiging!</title>
    </head>
    <body>
    <h1>Hierbij is uw inschrijving bevestigd!</h1>
    <p>'. $num .' is uw bevestigingsnummer.</p><br><br>
    <a href="'. $site .'/src/controller/SignoutController.php?id='. $gebruiker .'">Klik hier om uit te schrijven.</a>
    </body>
    </html>
    ';
    $headers = 'From: klapschaats@glr.nl' . "\r\n" .
        'Reply-To: no-klapschaats@glr.nl' . "\r\n" .
        'Content-type: text/html; charset=iso-8859-1'. 
        'MIME-Version: 1.0' .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    header('Location: ../view/welcome.php');
    exit;
} else {
    echo "Je hebt je al aangemeld! Meld je af via de link in je mail.<br><a href='../view/dashboard.php'>Klik hier om terug te gaan!</a>";
}

?>

<?php
// Hiermee wordt er een connectie naar de database gemaakt.
require '../config/config.php';

// Tijdsloten Data uit database halen om het te gaan gebruiken
$stmt = $con->prepare('SELECT offline FROM tijdsloten WHERE id = ?');
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();
$stmt->bind_result($offline);
$stmt->fetch();
$stmt->close();

// Als de tijdslot op offline staat wordt de gebruiker terug gestuurd naar de normale dashboard
if($offline == 'ja'){
    header('Location: ../view/dashboard.php');
    exit;
} 

// De id van de gebruiker die ingelogd is via een session
$gebruiker = $_SESSION['id'];

// De id van de tijdslot die is meegegeven via de url
$tijdslot = $_GET['id'];

// Het email adres van de ingelogde gebruiker via een aangemaakte session
$email = $_SESSION['name'];

// Een standaard link voor de mailer 
$site = '83238.ict-lab.nl/beroepsexamen';

// SQL query om alle rows te bekijken
$sql2 = "SELECT * FROM tijdslot_gebruikers WHERE id_tijdslot = $tijdslot;";
$result = $con->query($sql2);

// Checken of er minder dan 100 mensen aangemeld hebben
if ($result->num_rows < 99) {
    
    // SQL query voorbereiden voordat hij gebruikt wordt
    $sql = "INSERT INTO `tijdslot_gebruikers` (`id_tijdslot`, `id_gebruiker`) VALUES ('$tijdslot', '$gebruiker');";

    // Hier proberen wij een connectie te maken met de database en kijken of we wat vinden
    if (mysqli_query($con, $sql)) {

        // Hier wordt een random getal aangemaakt als bevestigings code
        $num = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);

        // Waar de mail naartoe moet
        $to      = $_SESSION['name'];

        // Onderwerp van de mail
        $subject = 'Bevestiging van aanmelding!';

        // Bericht voor de mail
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

        // Informatie wat mee moet gestuurd worden in de mail zoals van wie het gestuurd wordt
        $headers = 'From: klapschaats@glr.nl' . "\r\n" .
            'Reply-To: no-klapschaats@glr.nl' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1'. 
            'MIME-Version: 1.0' .
            'X-Mailer: PHP/' . phpversion();

        // Hier versturen we de mail
        mail($to, $subject, $message, $headers);

        // Hier wordt je terug gestuurd naar het beginscherm als het gelukt is
        header('Location: ../view/welcome.php');
        exit;
    } else {
        // Als de gebruiker zich al aangemeld heeft krijg hij dit bericht te zien
        echo "Je hebt je al aangemeld! Meld je af via de link in je mail.<br><a href='../view/dashboard.php'>Klik hier om terug te gaan!</a>";
    }
} else {
    // Teveel mensen hebben zich aangemeld
    echo 'Helaas zit dit tijdslot vol. Kies een andere.<br>
    <a href="../view/dashboard.php">Klik hier om terug te gaan!</a>';
}

?>

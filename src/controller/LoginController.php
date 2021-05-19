<?php
require '../config/config.php';

// Kijken of de data die is ingevoerd in de database bestaat door de issset()
if (!isset($_POST['email'], $_POST['wachtwoord'])) {
    // Kan de data niet ophalen
    exit('Vul de email en wachtwoord in!');
}

// De SQL voorbereiden, om SQL injection tegen te gaan
if ($stmt = $con->prepare('SELECT id, wachtwoord FROM gebruikers WHERE email = ?')) {
    // Paramenters binden aan elkaar
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    // Gegevens opslaan om te kijken of de data bestaat
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account bestaat en nu wordt het bevestigd
        if (password_verify($_POST['wachtwoord'], $password)) {
            // Door een sessie aan te maken weet de gebruiker dat hij ingelogd is
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['email'];
            $_SESSION['id'] = $id;
            header('Location: ../view/welcome.php');
        } else {
            // Niet juiste wachtwoord
            echo 'Incorrecte email en/of wachtwoord!';
        }
    } else {
        // Niet juiste email
        echo 'Incorrecte email en/of wachtwoord!';
    }

    $stmt->close();
}
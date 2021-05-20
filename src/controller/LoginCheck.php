<?php
require '../config/config.php';

// Data uit database halen om het te gaan gebruiken
$stmt = $con->prepare('SELECT naam, level FROM gebruikers WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($naam, $level);
$stmt->fetch();
$stmt->close();

// Als de gebruiker niet ingelogd is wordt hij doorverwezen naar de login pagina
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
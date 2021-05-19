<?php
require '../config/config.php';

$gebruiker = $_GET['id'];

$sql = "DELETE FROM tijdslot_gebruikers WHERE id_gebruiker = '$gebruiker'";
if (mysqli_query($con, $sql)) {
    header('Location: ../view/welcome.php');
    exit;
} else {
    // echo "Er is iets mis gegaan!";
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

?>
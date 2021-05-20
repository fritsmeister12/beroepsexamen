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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>De Klapschaats ⛸!</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Externe Links -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg">
    <div class="grid min-h-screen place-items-center">
        <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 shadow-md">
        
            <h1 class="text-xl font-semibold"><span style="color: #FAA0A0">De Klapschaats</span> ⛸</h1>
            
            <!-- Buttons -->
            <p>Het is gelukt! Je hebt je aangemeld voor een tijdslot bij <span class="font-bold mt-4" style="color: #FAA0A0">De Klapschaats</span> ⛸. U krijgt van ons een mail met daarin een bevestigingscode. Wij wensen uw veel schaatsplezier!</p>
            <div class="flex gap-4">
                <a href="../controller/LogoutController.php" class="w-full py-3 mt-4 font-medium tracking-widest text-white uppercase bg-pastel-blue shadow-lg text-center focus:outline-none hover:bg-gray-900 hover:shadow-none">
                    Uitloggen
                </a>
        </div>
    </div>
</body>

</html>
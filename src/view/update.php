<?php 
// Hiermee wordt er een connectie naar de database gemaakt.
require '../config/config.php';

// Data uit database halen om het te gaan gebruiken
$stmt = $con->prepare('SELECT level FROM gebruikers WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($level);
$stmt->fetch();
$stmt->close();

// Tijdsloten Data uit database halen om het te gaan gebruiken
$stmt = $con->prepare('SELECT datum, van, tot, offline FROM tijdsloten WHERE id = ?');
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();
$stmt->bind_result($datum, $van, $tot, $offline);
$stmt->fetch();
$stmt->close();

// Als de gebruiker niet ingelogd is wordt hij doorverwezen naar de login pagina
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// De id uit de url halen
$id = $_GET['id'];

// Als de gebruiker geen admin rechten heeft wordt hij terug gestuurd naar de normale dashboard
if($level != 1){
    header('Location: dashboard.php');
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

    <!-- Aanmaak formulier -->
    <form action="../controller/UpdateController.php" method="post">

        <input type="hidden" name="id" value="<?= $id  ?>">

        <div class="grid min-h-screen place-items-center">
            <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 shadow-md">
                <h1 class="text-xl font-semibold"><span style="color: #FAA0A0">De Klapschaats</span> ⛸, <span class="font-normal">pas hier tijdslot <?= $id ?> aan!</span></h1>
                <form class="mt-8" action="src/Controller/RegisterController.php" method="post">
                    <span class="w-full">
                        <label for="datum" class="block text-xs mt-4 font-semibold text-gray-600 uppercase">Datum</label>
                        <input id="datum" type="date" name="datum" value="<?= $datum ?>" placeholder="26-03-2002" autocomplete="datum" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                    </span>
                    <div class="flex justify-between mt-2 gap-3">
                        <span class="w-1/2">
                            <label for="van" class="block mt-4 text-xs font-semibold text-gray-600 uppercase">Van</label>
                            <input id="van" type="time" name="van" value="<?= $van ?>" placeholder="14:30" autocomplete="van" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                        </span>
                        <span class="w-1/2">
                            <label for="tot" class="block mt-4 text-xs font-semibold text-gray-600 uppercase">Tot</label>
                            <input id="tot" type="time" name="tot" value="<?= $tot ?>" placeholder="16:00" min="09:00" max="21:00" autocomplete="tot" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                        </span>
                    </div>

                    <!-- Offline checkbox -->
                    <label for="offline" class="block mt-4 text-xs font-semibold text-gray-600 uppercase">Inschrijfmoment gesloten?</label>
                    <input type="checkbox" name="offline" id="offline" <?php if($offline == 'ja'){ echo 'checked'; } ?>>

                    <button type="submit" class="w-full py-3 mt-4 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                        Aanpassen
                    </button>
                    <a href="admin-dashboard.php" class="flex justify-between inline-block mt-4 text-xs text-gray-500 cursor-pointer hover:text-black">Ga terug</a>
                </form>
            </div>
        </div>
</body>
</html>
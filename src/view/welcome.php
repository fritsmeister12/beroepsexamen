<?php 
// De login check bestand aanroepen
require '../controller/LoginCheck.php';
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
        
            <h1 class="text-xl font-semibold">Welkom <span style="color: #a7c7e7"><?= $naam ?></span> bij <span style="color: #FAA0A0">De Klapschaats</span> ⛸!</h1>
            
            <!-- Buttons -->
            <div class="flex gap-4">
                <a href="dashboard.php" class="w-1/2 py-3 mt-6 font-medium tracking-widest text-white text-center uppercase shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none bg-pastel-blue">
                    Tijdsloten
                </a>
                <a href="../controller/LogoutController.php" class="w-1/2 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg text-center focus:outline-none hover:bg-gray-900 hover:shadow-none">
                    Uitloggen
                </a>
            </div>
        </div>
    </div>
</body>

</html>
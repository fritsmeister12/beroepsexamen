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

    <!-- Registreer formulier -->
    <form action="../controller/RegisterController.php" method="post">
        <div class="grid min-h-screen place-items-center">
            <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 shadow-md">
                <h1 class="text-xl font-semibold"><span style="color: #FAA0A0">De Klapschaats</span> ⛸, <span class="font-normal">vul hier jou gegevens in om verder te gaan!</span></h1>
                <form class="mt-8" action="src/Controller/RegisterController.php" method="post">
                    <span class="w-full">
                    <label for="naam" class="block text-xs font-semibold text-gray-600 uppercase">Naam</label>
                    <input id="naam" type="text" name="naam" placeholder="Pietje Puk" autocomplete="naam" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                    </span>
                    <div class="flex justify-between mt-2 gap-3">
                        <span class="w-1/2">
                            <label for="adres" class="block text-xs font-semibold text-gray-600 uppercase">Adres</label>
                            <input id="adres" type="text" name="adres" placeholder="Heer Bokelweg 255" autocomplete="adres" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                        </span>
                        <span class="w-1/2">
                        <label for="plaats" class="block text-xs font-semibold text-gray-600 uppercase">Plaats</label>
                        <input id="plaats" type="text" name="plaats" placeholder="Rotterdam" autocomplete="postcode" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                        </span>
                    </div>
                    <div class="flex justify-between mt-2 gap-3">
                        <span class="w-1/2">
                            <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">E-mail</label>
                            <input id="email" type="email" name="email" placeholder="83238@glr.nl" autocomplete="email" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                        </span>
                        <span class="w-1/2">
                            <label for="telefoonnummer" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Telefoonnummer</label>
                            <input id="telefoonnummer" type="tel" name="telefoonnummer" placeholder="06123456789" pattern="[0-9]{10}" autocomplete="telefoonnummer" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                        </span>
                    </div>
                    
                    <label for="wachtwoord" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Wachtwoord</label>
                    <input id="wachtwoord" type="password" name="wachtwoord" placeholder="********" autocomplete="wachtwoord" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />

                    <label for="lid" class="block mt-4 text-xs font-semibold text-gray-600 uppercase">Schaatslid?</label>
                    <input id="lid" type="checkbox" name="lid"  autocomplete="lid" checked/>

                    <button type="submit" class="w-full py-3 mt-4 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                        Aanmelden
                    </button>
                    <a href="login.php" class="flex justify-between inline-block mt-4 text-xs text-gray-500 cursor-pointer hover:text-black">Al geregistreerd?</a>
                </form>
            </div>
        </div>
</body>
</html>
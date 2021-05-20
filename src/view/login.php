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
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body class="bg">

    <!-- Registreer formulier -->
    <form action="../controller/LoginController.php" method="post">
        <div class="grid min-h-screen place-items-center">
            <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 shadow-md">
                <h1 class="text-xl font-semibold"><span style="color: #FAA0A0">De Klapschaats</span> ⛸, <span class="font-normal">vul hier jou gegevens in om verder te gaan!</span></h1>
                <form class="mt-8" action="src/Controller/RegisterController.php" method="post">
                    <span class="w-full">
                        <label for="email" class="block text-xs mt-4 font-semibold text-gray-600 uppercase">Naam</label>
                        <input id="email" type="email" name="email" placeholder="83238@glr.nl" autocomplete="email" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                    </span>
                    <span class="w-full">
                        <label for="wachtwoord" class="block mt-4 text-xs font-semibold text-gray-600 uppercase">Wachtwoord</label>
                        <input id="wachtwoord" type="password" name="wachtwoord" placeholder="*********" autocomplete="wachtwoord" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                    </span>
                    <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                        Log in
                    </button>
                    <a href="register.php" class="flex justify-between inline-block mt-4 text-xs text-gray-500 cursor-pointer hover:text-black">Nog geen account?</a>
                </form>
            </div>
        </div>
</body>
</html>
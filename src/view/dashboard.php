<?php 
require '../config/config.php';

// Data uit database halen om het te gaan gebruiken
$stmt = $con->prepare('SELECT level FROM gebruikers WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($level);
$stmt->fetch();
$stmt->close();

// Als de gebruiker niet ingelogd is wordt hij doorverwezen naar de login pagina
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Als de gebruiker  admin rechten heeft wordt hij gestuurd naar de admin dashboard
if($level != 0){
    header('Location: admin-dashboard.php');
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
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body class="bg">
    <div class="grid min-h-screen place-items-center">
        <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 shadow-md">
        
            <h1 class="text-xl font-semibold">Welkom bij <span style="color: #FAA0A0">De Klapschaats</span> ⛸!</h1>
            
            <!-- Overzicht tabel -->
            <table class="leading-normal w-full mt-4">
                        <thead>
                            <tr>
                                <th class="px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-bold text-black uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-bold text-black uppercase tracking-wider">
                                    Datum
                                </th>
                                <th class="px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-bold text-black uppercase tracking-wider">
                                    Vanaf (tijd)
                                </th>
                                <th class="px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-bold text-black uppercase tracking-wider">
                                    Tot (tijd)
                                </th>
                                <th class="px-3 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-bold text-black uppercase tracking-wider">
                                    Aanmelden
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                // Via een sql de data ophalen uit de database
                                $sql = 'SELECT * FROM tijdsloten';
                                $result = $con->query($sql);
                                
                                if ($result->num_rows > 0) {

                                    // Data uitlezen voor elke rij
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";

                                        echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'><p class='text-gray-900 whitespace-no-wrap'>". $row["id"] ."</p></td>";

                                        echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'><p class='text-gray-900 whitespace-no-wrap'>". $row["datum"] ."</p></td>";

                                        echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'><p class='text-gray-900 whitespace-no-wrap'>". $row["van"] ."</p></td>";

                                        echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'><p class='text-gray-900 whitespace-no-wrap'>". $row["tot"] ."</p></td>";

                                        echo "<td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'><p class='whitespace-no-wrap font-bold' style='color: #a7c7e7'><a href='../controller/SignupController.php?id=". $row["id"] ."'>Klik hier!</a></p></td>";

                                        echo "</tr>";
                                    }
                                } else {
                                    // Geen resultaten
                                    echo "0 results";
                                }
                                
                                // Connectie sluiten
                                $con->close();
                            ?>
                        </tbody>
                    </table>
                <a href="welcome.php" class="flex justify-between inline-block mt-4 text-xs text-gray-500 cursor-pointer hover:text-black">Ga terug</a>
        </div>
    </div>
</body>

</html>
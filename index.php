<?php

require ('Backend/retourconnexion.php');
// Récupérer la localisation actuelle de la machine
// $ip = $_SERVER['REMOTE_ADDR'];
// $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
// $city = $details->city;

// Utiliser la localisation actuelle dans l'URL de l'API
// $url = "http://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&lang=fr&units=metric&appid=a36c9e4276447a17cbc6e08ddddc585c";
$url = "http://api.openweathermap.org/data/2.5/weather?q=TOKYO&lang=fr&units=metric&appid=a36c9e4276447a17cbc6e08ddddc585c";


    // On get les resultat
    $raw = file_get_contents($url);
    // Décode la chaine JSON
    $json = json_decode($raw);

    // Nom de la ville
    $name = $json->name;
    
    // Météo
    $weather = $json->weather[0]->main;
    $desc = $json->weather[0]->description;

    // Températures
    $temp = $json->main->temp;
    $feel_like = $json->main->feels_like;

    // Vent
    $speed = $json->wind->speed;
    $deg = $json->wind->deg;

    // Heures de lever et de coucher du soleil
$sunrise = $json->sys->sunrise;
$sunset = $json->sys->sunset;

// Heure actuelle
$current_time = time(); 

$timezone_offset = $json->timezone;
$timezone_name = timezone_name_from_abbr("", $timezone_offset, 0);
date_default_timezone_set($timezone_name);


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="meteostyle.css">

    <title>Acceuil</title>
</head>
<body>
<div class="container text-center py-5">
<h1>Météo du <strong><span id="heure"><?php echo date('d/m/Y H:i', $current_time)?></span></strong> à <strong><span id="nomVille"><?php echo $name; ?></span></strong></h1>
                <div class="row justify-content-center align-items-center">
                    <?php 
                    if ($current_time > $sunrise && $current_time < $sunset) {
                        switch($weather)
                        {
                            case "Clear":
                                ?>
                                   <div class="icon sunny">
                                        <div class="sun">
                                            <div class="rays"></div>
                                        </div>
                                    </div>       
                                <?php
                                break;
    
                                case 'Drizzle':
                                ?>
                                <div class="icon sun-shower">
                                    <div class="cloud"></div>
                                        <div class="sun">
                                            <div class="rays"></div>
                                    </div>
                                        <div class="rain"></div>
                                </div>
                    
                                <?php 
                                break;
    
                                case 'Rain':
                                ?>
                                <div class="icon rainy">
                                    <div class="cloud"></div>
                                    <div class="rain"></div>
                                </div>
                                <style>
                                    body{
                                        background: url(Images/Pluie.gif) no-repeat;
                                        background-size: cover;
                                    }
                                </style> 
                                <?php 
                                break;
    
                                case 'Clouds':
                                ?>
                                <div class="icon cloudy">
                                    <div class="cloud"></div>
                                    <div class="cloud"></div>
                                </div>
                                <style>
                                    body{
                                        background: url(Images/partiellement\ nuageux.gif) no-repeat;
                                        background-size: cover;
                                    }
                                </style>    
                                <?php 
                                break;
    
                                case 'Thunderstorm':
                                ?>
                                <div class="icon thunder-storm">
                                    <div class="cloud"></div>
                                        <div class="lightning">
                                            <div class="bolt"></div>
                                            <div class="bolt"></div>
                                    </div>
                                </div>
                                <?php 
                                break;
    
                                case 'Snow':
                                ?>
                                <div class="icon flurries">
                                    <div class="cloud"></div>
                                        <div class="snow">
                                            <div class="flake"></div>
                                            <div class="flake"></div>
                                    </div>
                                </div>
    
                                <?php 
                                break;
                        }
                    }else{
                        switch($weather)
                        {
                            case "Clear":
                                ?>
                                   <div class="icon sunny">
                                        <div class="sun">
                                            <div class="rays"></div>
                                        </div>
                                    </div>       
                                <?php
                                break;
    
                                case 'Drizzle':
                                ?>
                                <div class="icon sun-shower">
                                    <div class="cloud"></div>
                                        <div class="sun">
                                            <div class="rays"></div>
                                    </div>
                                        <div class="rain"></div>
                                </div>
                    
                                <?php 
                                break;
    
                                case 'Rain':
                                ?>
                                <div class="icon rainy">
                                    <div class="cloud"></div>
                                    <div class="rain"></div>
                                </div>
                                <style>
                                    body{
                                        background: url(Images/Pluienuit.gif) no-repeat;
                                        background-size: cover;
                                    }
                                </style> 
                                <?php 
                                break;
    
                                case 'Clouds':
                                ?>
                                <div class="icon cloudy">
                                    <div class="cloud"></div>
                                    <div class="cloud"></div>
                                </div>
                                <style>
                                    body{
                                        background: url(Images/partiellementnuageuxnuit.gif) no-repeat;
                                        background-size: cover;
                                    }
                                </style>    
                                <?php 
                                break;
    
                                case 'Thunderstorm':
                                ?>
                                <div class="icon thunder-storm">
                                    <div class="cloud"></div>
                                        <div class="lightning">
                                            <div class="bolt"></div>
                                            <div class="bolt"></div>
                                    </div>
                                </div>
                                <?php 
                                break;
    
                                case 'Snow':
                                ?>
                                <div class="icon flurries">
                                    <div class="cloud"></div>
                                        <div class="snow">
                                            <div class="flake"></div>
                                            <div class="flake"></div>
                                    </div>
                                </div>
    
                                <?php 
                                break;
                    }
                }
                        ?>

                        <div class="meteo_desc text-left">
                            <h2>
                                <span id="temperature"><?php echo $temp; ?></span> °C / Ressenti <?php echo $feel_like; ?> °C <br />
                                Vitesse du vent : <?php echo $speed; ?> Km/h<br /> 
                                <?php echo ucfirst($desc); ?>
                        </h2>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <h2>BY PELPAV</h2>
                <a href="Backend/deconnexion.php" type="submit" class="deco">Se déconnecter</a>
            </footer>

            <!-- <script>
    setInterval(function(){
        // Effectuer une requête AJAX pour obtenir les nouvelles données météo
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'Backend/nouvellesDonneesMeteo.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                // Mettre à jour les éléments HTML avec les nouvelles données
                document.getElementById('nomVille').innerText = data.name;
                document.getElementById('temperature').innerText = data.main.temp;
                document.getElementById('heure').innerText = data.main.temp;
            }
        };
        xhr.send();
    }, 60000); // Mettre à jour toutes les 60 secondes (60000 millisecondes)
</script> -->
</body>
</html>
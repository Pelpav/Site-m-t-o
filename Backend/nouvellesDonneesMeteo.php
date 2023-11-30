<?php
// Récupérer les nouvelles données météo depuis l'API OpenWeatherMap
$url = "http://api.openweathermap.org/data/2.5/weather?q=TOKYO&lang=fr&units=metric&appid=a36c9e4276447a17cbc6e08ddddc585c";
$raw = file_get_contents($url);
$data = json_decode($raw);

// Retourner les données au format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
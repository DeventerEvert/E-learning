<?php
// Ontvang de POST-data vanuit de frontend
$data = json_decode(file_get_contents('php://input'));

// Voer hier je eigen verificatielogica uit
$wordToVerify = $data->word;
$valid = false; // Hier zou je de echte verificatielogica moeten implementeren

// Simuleer een verificatie (bijvoorbeeld, controleer tegen een lijst met geldige woorden)
$validWords = $json_EnglishDecode;
if (in_array($wordToVerify, $validWords)) {
    $valid = true;
}

// Stel de JSON-respons samen
$response = ['valid' => $valid];

// Geef de JSON-respons terug naar de frontend
header('Content-Type: application/json');
echo json_encode($response);
?>

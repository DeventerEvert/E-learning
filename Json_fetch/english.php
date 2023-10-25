<?php
// Ontvang de gegevens vanuit het client-side JavaScript
$data = json_decode(file_get_contents('php://input'), true);

// Nederlandse woorden
$dutchWords = ["Appel", "Banaan", "Kers", "Peer"]; // Nederlandse woorden
$englishWords = ["apple", "banana", "cherry", "pear"]; // Engelse 

// Haal het Nederlandse woord en het ingevoerde Engelse woord op uit de ontvangen gegevens
$dutchWord = $data['dutchWord'];
$englishInput = strtolower($data['englishWord']);

// Controleer of het ingevoerde Engelse woord overeenkomt met het verwachte Engelse woord
$correct = false;

if (isset($dutchWords) && isset($englishWords)) {
    $index = array_search($dutchWord, $dutchWords);
    if ($index !== false && isset($englishWords[$index]) && $englishWords[$index] === $englishInput) {
        $correct = true;
    }
}

// Stuur een JSON-reactie terug naar de client om aan te geven of het Engelse woord correct is
$response = ['correct' => $correct];
header('Content-Type: application/json');
echo json_encode($response);
?>

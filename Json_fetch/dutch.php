<?php
// Simuleer een lijst met Nederlandse woorden (je kunt deze gegevens vervangen door een echte databasequery of externe bron)
$dutchWords = [
    "Appel",
    "Banaan",
    "Kers",
    "Peer"
];

// Geef de Nederlandse woorden terug als JSON
echo json_encode($dutchWords);
?>

<?php
if (!defined('USER')) define('USER', 'root');
if (!defined('PASSWORD')) define('PASSWORD', '');
try {
    $verbinding = new PDO("mysql:host=localhost;dbname=e_learning", USER, PASSWORD);
    $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    echo $e->getMessage();
    echo "Kon geen verbinding maken.";
}
?>
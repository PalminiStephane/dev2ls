<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Débogage OK<br>";

try {
    require_once __DIR__ . '/../vendor/autoload.php';
    echo "Autoload chargé<br>";
} catch (Exception $e) {
    echo "Erreur d'autoload : " . $e->getMessage();
}

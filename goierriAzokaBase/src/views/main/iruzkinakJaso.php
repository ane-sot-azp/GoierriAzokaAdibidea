<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: text/html; charset=UTF-8');

$xmlFile = 'iruzkinak.xml';

if (!file_exists($xmlFile)) {
    $xml = new SimpleXMLElement('<iruzkinak></iruzkinak>');
    $xml->asXML($xmlFile);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['iruzkina']) && !empty(trim($_POST['iruzkina']))) {
        $iruzkina = trim($_POST['iruzkina']);

        if (!$xml = simplexml_load_file($xmlFile)) {
            die("Errorea: XML fitxategia ezin izan da irakurri.");
        }

        $nuevoIruzkina = $xml->addChild('iruzkina', htmlspecialchars($iruzkina));

        $xml->asXML($xmlFile);
    } else {
        die("Ezin da iruzkin hutsik bidali.");
    }
}

$xml = simplexml_load_file($xmlFile);
foreach ($xml->iruzkina as $iruzkina) {
    echo "<p>" . htmlspecialchars($iruzkina) . "</p>";
}
?>
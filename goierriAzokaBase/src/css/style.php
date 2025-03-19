<?php

header("Content-Type: text/css");

$config = simplexml_load_file(__DIR__ . '/../../conf.xml');
$mainColor = $config->mainColor;
$footerColor = $config->footerColor;
?>
:root {
    --mainColor: <?= $mainColor; ?>;
    --footerColor: <?= $footerColor; ?>;
}
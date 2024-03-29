<?php

require_once 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader("views");

$twig = new Environment($loader);

$inputJson = file_get_contents('spdx_2.json');

$data = json_decode($inputJson, true);

$outputJson = $twig->render('template.twig', ['data' => $data]);

$outputJson = '{"@graph": [' . $outputJson . ']}';

file_put_contents('output.json', $outputJson);

echo "Output JSON file generated successfully.\n";

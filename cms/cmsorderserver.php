<?php

require __DIR__ . '/vendor/autoload.php';


$mongoClient = (new MongoDB\Client);


$db = $mongoClient->ecommerce;


$result = $db->Orders->find();

$products = array();

foreach ($result as $x => $document) {
    array_push($products, $document);
}

echo json_encode($products);

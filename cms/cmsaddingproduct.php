<?php

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_STRING);
$screensize = filter_input(INPUT_POST, 'screensize', FILTER_SANITIZE_STRING);
$modelno = filter_input(INPUT_POST, 'modelno', FILTER_SANITIZE_STRING);
$storage = filter_input(INPUT_POST, 'storage', FILTER_SANITIZE_STRING);
$cpu = filter_input(INPUT_POST, 'cpu', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$ram = filter_input(INPUT_POST, 'ram', FILTER_SANITIZE_STRING);
$os = filter_input(INPUT_POST, 'os', FILTER_SANITIZE_STRING);
$stock = filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);


    //met database la
require __DIR__ . '/vendor/autoload.php';

    
    $mongoClient = (new MongoDB\Client);

   
    $db = $mongoClient->ecommerce;

    
    $collection = $db->Products;

   
    $dataArray = [
        "Name" => $name,
        "Category" => $category,
        "Price" => $price,
        "Description" => $description,
        "Ram" => $ram,
        "os" => $os,
        "stock" => $stock,
        "brand" => $brand,
        "modelno" => $modelno,
        "screensize" => $screensize,
        "cpu" => $cpu,
        "storage" => $storage
];



    $insertResult = $collection->insertOne($dataArray);

    
    echo 'Product ' . $name . ' Sucessfully added!';

    echo 'Product registration Failed!';


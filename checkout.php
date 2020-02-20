<?php

session_start();

$sessionCart=json_decode($_POST['cartSession']);
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

$username=$_SESSION['loggedInUsername'];

$collection = $db->Orders;

//Find all of the customers that match  this criteria

$totalcost=(int)$_POST['total'];

$itemStr=$_POST['items'];

$items = (int)$itemStr;


    $dataArray = [
            "username" => $username,
            "sessionId" => session_id(),
            "date" => date("Y-m-d"),
            "time" =>date("h:i"),
            "cost"=>$totalcost,
            "products"=>$sessionCart,
            "items"=>$items
    ];

    $insertResult = $collection->insertOne($dataArray);

$deleteCriteria = [
    "username" => $username,
];

$deleteRes = $db->Carts->deleteOne($deleteCriteria);

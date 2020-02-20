<?php

session_start();

$sessionCart=json_decode($_POST['cartSession']);
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//getting signed in username
$username=$_SESSION['loggedInUsername'];

$collection = $db->Orders;

//Find all of the customers that match  this criteria

// get total from post and parse as int
$totalcost=(int)$_POST['total'];


$itemStr=$_POST['items'];

$items = (int)$itemStr;

//array to store
    $dataArray = [
            "username" => $username,
            "date" => date("Y-m-d"),
            "time" =>date("h:i"),
            "cost"=>$totalcost,
            "products"=>$sessionCart,
            "items"=>$items
    ];


//inserting the array
    $insertResult = $collection->insertOne($dataArray);


$deleteCriteria = [
    "username" => $username,
];

// deleting the cart collection for the user
$deleteRes = $db->Carts->deleteOne($deleteCriteria);

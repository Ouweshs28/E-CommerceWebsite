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

$findCriteria = [
    "username" => $username,
];

$collection = $db->Carts;

//Find all of the customers that match  this criteria
$cart=$collection->countDocuments($findCriteria);

$totalcost=$_POST['total'];

$itemStr=$_POST['items'];

$items = (int)$itemStr;



if($cart==0){
    $dataArray = [
        "username" => $username,
        "sessionId"=> session_id(),
        "date" => date("Y-m-d"),
        "time" =>date("h:i"),
        "cost"=> 0,
        "items"=>0
    ];

//Add the new customer to the database
    $insertResult = $collection->insertOne($dataArray);
}
else{
    $updateCriteria = [
        '$set' => [
            "sessionId" => session_id(),
            "date" => date("Y-m-d"),
            "time" =>date("h:i"),
            "cost"=>$totalcost,
            "products"=>$sessionCart,
            "items"=>$items
        ]
    ];

    $updateRes = $db->Carts->updateOne($findCriteria, $updateCriteria);

}

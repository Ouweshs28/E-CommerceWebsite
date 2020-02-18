<?php

session_start();
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

if($cart==0){
    $dataArray = [
        "username" => $username,
        "sessionId"=> session_id(),
        "date" => date("Y-m-d"),
        "time" =>date("h:i"),
        "cost"=> 0,
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
        ]
    ];

    $updateRes = $db->Carts->updateOne($findCriteria, $updateCriteria);

}
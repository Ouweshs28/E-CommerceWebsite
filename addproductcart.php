<?php
//Get data from post request
$productID= filter_input(INPUT_POST, '_id', FILTER_SANITIZE_STRING);

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Search product by id and checks if stock is > 0
$findCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($productID),//replace when done
    'stock' => ['$gt' => 0 ]
];

// select product collection
$collectionProduct = $db->Products;

//Perform search
$resultProduct=$collectionProduct->find($findCriteria);

//count number of results
$prouctinstock=$collectionProduct->countDocuments($findCriteria);

//if there is stock
if($prouctinstock==1) {
    foreach ($resultProduct as $document) {
        $pid = $document["_id"];
        $pname = $document["name"];
        $price = $document["price"];
        $stock = $document["stock"];
    }

//Remove one from stock
    $updateCriteria = [
        '$set' => ["stock" => $stock - 1,
        ]
    ];

//Update all of the customers that match  this criteria
    $updateRes = $db->Products->updateOne($findCriteria, $updateCriteria);
    $collectionProduct = $db->Products;
    $result=$collectionProduct->find($findCriteria);
    //sending as JSON
    $prodArry=json_encode(iterator_to_array($result));
    echo $prodArry;

}else{
    echo "out stock";
}


//Update all of the customers that match  this criteria


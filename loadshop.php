<?php
//Include libraries

$search= filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

$collection = $db->Products;

if ($search=="") {

    $rangeQuery = ['stock' => ['$gt' => 0]];

    $result = $collection->find($rangeQuery);

    echo json_encode(iterator_to_array($result));
}else{

    $findCriteria=[
        '$text'=>['$search'=>$search]
    ];

    $result = $collection->find($findCriteria);

    echo json_encode(iterator_to_array($result));

}
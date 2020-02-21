<?php
session_start();


$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

// met database la ek so autoload
require __DIR__ . '/vendor/autoload.php';


$mongoClient = (new MongoDB\Client);
$db = $mongoClient->ecommerce;



$findCriteria = [
    "username" => $email,
    "password" => $password
];


$collection = $db->Staffs;

$count = $collection->count($findCriteria);
$cursor = $db->Staffs->find($findCriteria);


if ($count == 0) {
    echo 'Incorrect usermail or password.';
    return;
} else if ($count > 1) {
    echo 'Database error: Multiple staffs have same email address.';
    return;
}



$_SESSION['loggedInUserEmail'] = $email;


echo 'ok';
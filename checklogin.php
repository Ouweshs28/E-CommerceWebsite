<?php
//Start session management
session_start();

if( array_key_exists("loggedInUsername", $_SESSION) ){
    echo "ok";
}
else{
    echo 'not logged in';
}

<?php

//die(phpinfo());
require '../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {

//    $client = new MongoDB\Client(
//        'mongodb+srv://user:password@localhost:27017/test?retryWrites=true&w=majority'
//    );
    $client = new MongoDB\Client(); // connects to localhost:27017
    //https://www.php.net/manual/en/mongo.tutorial.connecting.php

    $db = $client->selectDatabase('bookRegistry');
    $collection = $db->selectCollection('authors');

    $authors = $collection->find();

    foreach($authors as $author) {
        print_r($author);
    }

    //die(print_r($authors));

} catch (MongoConnectionException $e) {
    die(print_r($e->getMessage()));
}



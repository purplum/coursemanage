<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-12
 * Time: 08:38
 */
$url = 'data.json'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$characters = json_decode($data); // decode the JSON feed

echo $characters[0]->name . "\n";

foreach ($characters as $character) {
    echo $character->name . "\n";
}
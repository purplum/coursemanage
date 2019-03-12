<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-12
 * Time: 08:40
 */

$url = 'wizards.json';
$data = file_get_contents($url);
$wizards = json_decode($data, true);

foreach ($wizards as $wizard) {
    echo $wizard['name'] . '\'s wand is ' .
        $wizard['wand'][0]['wood'] . ', ' .
        $wizard['wand'][0]['length'] . ', with a ' .
        $wizard['wand'][0]['core'] . ' core. <br>' ;
}
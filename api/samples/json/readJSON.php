<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-03-12
 * Time: 08:39
 */

$data = '{
	"name": "Aragorn",
	"race": "Human"
}';

$character = json_decode($data);
echo $character->name;
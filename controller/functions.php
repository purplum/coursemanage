<?php
/**
 * Created by PhpStorm.
 * User: i306445
 * Date: 2019-02-20
 * Time: 08:35
 */

include_once("controller/globals.php");








function displayHeader() {
    echo '<span style="font-family: 微软雅黑;font-size: 22px;font-weight:bold;">'.WEBTITLE.'</span>';
}

function displayFooter() {
    echo '<p><small>&copy; All Rights Reserved. <a href="'.HOMEURL.'" target="_blank" title="YF course">'.HOMENAME.'</a></small></p>';
}

function displayTitle($title) {
    echo '<title>'.$title.' '.WEBTITLE.'</title>';
}

?>
<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 16/11/2018
 * Time: 8:34
 */
require_once(Preferencia.php);

Preferencia::init();
echo Preferencia::$timezone ."<br>";
echo Preferencia::$language."<br>";
echo Preferencia::$music."<br>";
echo Preferencia::$color."<br>";
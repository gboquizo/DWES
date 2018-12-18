<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 16/11/2018
 * Time: 8:53
 */
require_once(Contador.php);
$c1 = new Contador();
$c1->contar();
$c1->contar();
echo "Contador 1: " . $c1 . "<br/>";

$c2 = new Contador();
$c2->contar();
$c2->contar();
$c2->contar();
echo "Contador 2: " . $c2 . "<br/>";

echo "Contador de instancias: " . Contador:: "<br/>";


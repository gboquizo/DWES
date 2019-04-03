<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: router.php
 * @Date: 10/11/18
 * @Description: Fragmenta la uri para el embellecimiento de las urls.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
function getCurrentUri()
{
    $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
    $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
    if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
    $uri = '/' . trim($uri, '/');
    return $uri;
}

$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
$base_url = getCurrentUri();
$routes = [];
$routes = explode('/', $base_url);
?>
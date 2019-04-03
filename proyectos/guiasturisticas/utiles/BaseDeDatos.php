<?php
/**
 * Created by PhpStorm.
 * User: marco
 * Date: 25/02/2019
 * Time: 20:03
 */
class BaseDeDatos{
    function conectar_base_datos(){
        return new PDO('mysql:host=localhost;dbname=2daw1819_bosagu', '2daw1819_bosagu', 'usuario');
    }
}
?>
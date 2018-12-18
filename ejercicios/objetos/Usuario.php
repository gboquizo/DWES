<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 16/11/2018
 * Time: 8:36
 */

class Usuario
{
    private $_nombre;
    private $_usuario;
    private $_password;

    private static $longMinimaPassword = 6;

    public function __construct($_nombre)
    {
        $this->_nombre = $_nombre;
    }

    public static function restriccion() {
        return 'Longitud mínima de clave ' . self::$longMinimaPassword;
    }

    private static function ValidatePassword($_password)
    {
        $lvalido = false;
        if(strlen($_password) >=self::$longMinimaPassword) {$lvalido = true}
        return $lvalido;
    }

    public function setPassword($_usuario,$_password) {
        $lvalido = false;
        if(self::ValidatePassword($_password)){
            $this->usuario = $_usuario;
            $this->password = $_password;
            $lvalido = true;
        }
        return $lvalido;

    }
}
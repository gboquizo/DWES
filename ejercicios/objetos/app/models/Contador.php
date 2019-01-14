<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 16/11/2018
 * Time: 8:49
 */

namespace App\Models;
class Contador
{
    private static $_contadorInstancias;
    private $_contador;

    public function __construct($_contador = 0)
    {
        $this->contador = $_contador;
        self::$_contadorInstancias++;
    }

    public static function contarInstancias()
    {
        return self::$_contadorInstancias;
    }

    public static function reiniciar()
    {
        return self::$_contador = 0;
    }

    public function contar()
    {
        $this->contador++;
        return $this;
    }

    public function __toString()
    {
        return (string)$this->contador;
    }

    public function mostrar($contador)
    {
        echo "<br>";
        echo "Mostrando contador: " . $contador;
        echo "<br>";
        echo "namespace - clase: " . Contador::class;
    }
}
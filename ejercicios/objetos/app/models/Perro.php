<?php
namespace App\Models;
class Perro
{
    private $_color;
    private $_nombre;
    private $_habilidad; //0 a 100
    private $_sociabilidad;

    public function __construct($_nombre, $_color)
    {
        $this->_nombre = $_nombre;
        $this->_color = $_color;
        $this->_habilidad = 0;
        $this->_sociabilidad = 5;

    }

    public function entrenar()
    {
        if ($this->_habilidad <= 100)
            $this->_habilidad++;
    }

    public function darPata()
    {
        $this->_habilidad += 1;
        $retorno = "<br>Laika: Guau?!";
        echo "<br><br>Guillermo: Dame la pata";
        if ($this->_habilidad > 5) {
            $retorno = "<br>Mascota: Levanta la pata y mueve la cola<br>";
        }
        echo $retorno;
    }
}
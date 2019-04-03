<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: Series.php
 * @Date: 06/03/19
 * @Description: Clase encargada de la gestión de Series.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
require_once('clases/BD.php');
require_once('config/config.php');

class Series
{
    private $_conexion = null;

    public function __construct()
    {
        $this->_conexion = new BD();
        BD::singleton(HOST, DATABASE, USER, PASSWORD);
    }

    public function getSeries()

    {
        return $this->_conexion->query('SELECT * FROM ex_series;',
            array()
        )->fetchAll();
    }

    public function obtenerIds()
    {
        return $this->_conexion->query('SELECT id FROM ex_series',
            array()
        )->fetchAll();
    }

    public function getSeriesBuscadas($valorBusqueda)
    {
        return $this->_conexion->query('SELECT * FROM ex_series where lower(ex_series.titulo LIKE  \'%\'  :valorBusqueda  \'%\');',
            array(":valorBusqueda" => strtolower($valorBusqueda)))->fetchAll();
    }

    public function getSerie($titulo)
    {
        return $this->_conexion->query('SELECT titulo FROM ex_series WHERE titulo = :titulo;',
            array(":titulo" => $titulo)
        )->fetch()["titulo"];
    }


    public function getSeriesRecomendadas()
    {
        return $this->_conexion->query('SELECT ex_series.titulo, count(ex_series_user.id) as recomendaciones FROM `ex_series_user`, ex_series 
WHERE ex_series_user.idSerie=ex_series.id GROUP BY ex_series_user.idSerie HAVING COUNT(ex_series_user.idSerie) >= 3;',
            array()
        )->fetchAll();
    }
}
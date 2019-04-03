<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 12/03/2019
 * Time: 12:08
 */

require_once('clases/BD.php');
require_once('config/config.php');

class Encuesta
{
    private $_conexion = null;

    public function __construct()
    {
        $this->_conexion = new BD();
        BD::singleton(HOST, DATABASE, USER, PASSWORD);
    }

    public function getEncuestasActivas($date){
        return $this->_conexion->query('SELECT * FROM `ex_encuestas` WHERE fechaHoraInicio <= :date and fechaHoraFinal > :date',
            array(":date"=>$date)
        )->fetchAll();

    }
    public function getPreguntas(){
        return $this->_conexion->query('SELECT * FROM ex_encuestas_preguntas',
            array()
        )->fetchAll();
    }
    public function crearEncuesta($idPregunta,$valor){
        {
            $result = $this->_conexion->query('INSERT INTO ex_encuestas_respuestas(id,idEncuestaPregunta,Valor) VALUES(null,:idEncuestaPregunta,:Valor);',
                array(
                    ":idEncuestaPregunta"=>$idPregunta,
                    ":Valor"=>$valor
                )
            );
            return $result->errorCode() == '00000';//comprobar que no se haya producido ningun error
        }
    }
    public function getPuntuacionMedia($idEncuestaPregunta)
    {
        return $result = $this->_conexion->query('SELECT ROUND(AVG(Valor),2) FROM ex_encuestas_respuestas WHERE idEncuestaPregunta = :idEncuestaPregunta',
            array(':idEncuestaPregunta' => $idEncuestaPregunta)
        )->fetch()["ROUND(AVG(Valor),2)"];
    }

    public function resetearEncuesta($date)
    {

        $result = $this->_conexion->query(
            'UPDATE ex_encuestas SET fechaHoraInicio = :date , fechaHoraFinal = \'2040-03-28 15:21:54\'
            WHERE fechaHoraInicio <= :date and fechaHoraFinal >= :date or fechaHoraInicio = fechaHoraFinal',
            array(
             ":date"=>$date
              ));

        return $result->errorCode() == '00000';//comprobar que no se haya producido ningun error
    }

    public function cerrarEncuesta($date)
    {

        $result = $this->_conexion->query(
            'UPDATE ex_encuestas SET fechaHoraInicio = :date , fechaHoraFinal = :date
            WHERE fechaHoraInicio <= :date and fechaHoraFinal >= :date',
            array(
                ":date"=>$date
            ));

        return $result->errorCode() == '00000';//comprobar que no se haya producido ningun error
    }
}
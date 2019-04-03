<?php
/**
 * Created by PhpStorm.
 * User: marco
 * Date: 09/03/2019
 * Time: 12:55
 */

require_once('clases/BD.php');
require_once('clases/PuntoInteres.php');
require_once('clases/GuiaTuristica.php');
require_once('config/config.php');

class Recorrido
{
    private $_conexion = null;

    public function __construct()
    {
        $this->_conexion = new BD();
        BD::singleton(HOST, DATABASE, USER, PASSWORD);
    }
    public function crearRecorrido($titulo,$idGuiaTuristica,$puntosInteres){
        $puntoInteresClase= new PuntoInteres();
        $guiaTuristica = new GuiaTuristica();
        $result = $this->_conexion->query('INSERT INTO proy_recorridos(id,titulo,id_guiaTuristica) 
              VALUES(null,:titulo,:id_guiaTuristica);',
            array(
                ':titulo'=>$titulo,
                ':id_guiaTuristica'=>$idGuiaTuristica
            )
        );


        foreach($puntosInteres as $puntoInteres){
            $idPuntoInteres=$puntoInteresClase->getId($puntoInteres);
            $idRecorrido = $this->getId($titulo);
            $result2=$this->_conexion->query('INSERT INTO proy_rel_recorridos_puntosinteres(id_Recorrido,id_PuntoInteres) 
              VALUES(:idRecorrido,:idPuntoInteres);',
                array(
                    ':idPuntoInteres'=>$idPuntoInteres,
                    ':idRecorrido'=>$idRecorrido
                )
            );
            $guiaTuristica->relacionarGuiaPtoInteres($idGuiaTuristica,$idPuntoInteres);
        }
        return $result->errorCode();
    }
    public function getId($titulo){
            return $this->_conexion->query('SELECT id FROM proy_recorridos WHERE titulo = :titulo LIMIT 1',
                array(
                    ":titulo" => $titulo
                )
            )->fetch()['id'] ;
    }

    public function getRecorridos($idGuia){
        return $this->_conexion->query('SELECT * FROM proy_recorridos WHERE id_guiaTuristica = :idGuia',
            array(
                ":idGuia" => $idGuia
            )
        )->fetchAll();
    }
    public function getPuntosInteres($idRecorrido){
        return $this->_conexion->query('SELECT * FROM `proy_puntos_interes` WHERE id IN (SELECT `id_PuntoInteres` FROM `proy_rel_recorridos_puntosinteres` WHERE `id_Recorrido` = :id)',
            array(
                ":id" => $idRecorrido
            )
        )->fetchAll();
    }
}
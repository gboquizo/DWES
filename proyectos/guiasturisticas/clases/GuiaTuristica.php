<?php
/**
 * Created by PhpStorm.
 * User: marco
 * Date: 09/03/2019
 * Time: 12:54
 */

require_once('clases/BD.php');
require_once('config/config.php');

class GuiaTuristica
{
    private $_conexion = null;

    public function __construct()
    {
        $this->_conexion = new BD();
        BD::singleton(HOST, DATABASE, USER, PASSWORD);
    }
    public function crearGuiaTuristica($titulo,$descripcion,$fechaCreacion,$idUsuario){

        $result = $this->_conexion->query('INSERT INTO proy_guias(id,fechaDeCreacion,id_usuario,Titulo,descripcion) 
              VALUES(null,:fecha,:id,:title,:des);',
            array(
                ':title'=>$titulo,
                ':des'=>$descripcion,
                ':fecha'=>$fechaCreacion,
                ':id'=>$idUsuario
            )
        );
        return $result->errorCode() == '00000';//comprobar que no se haya producido ningun error
    }

    public function getId($titulo){
        return $this->_conexion->query('SELECT id FROM proy_guias WHERE titulo = :titulo LIMIT 1',
            array(
                ":titulo" => $titulo
            )
        )->fetch()['id'] ;
    }

    public function relacionarGuiaPtoInteres($idGuia,$idPuntoInteres){
        if(!$this->comprobarSiExisteRelacion($idGuia,$idPuntoInteres)){
            $result=$this->_conexion->query('INSERT INTO proy_rel_guias_puntosinteres(id_Guias,id_PuntosInteres) 
              VALUES(:idGuia,:idPuntoInteres);',
                array(
                    ':idPuntoInteres'=>$idPuntoInteres,
                    ':idGuia'=>$idGuia
                )
            );
            return $result->errorCode() == '00000';
        };

    }
    public function comprobarSiExisteRelacion($idGuia,$idPuntoInteres){
        $result=$this->_conexion->query('SELECT id_Guias FROM proy_rel_guias_puntosinteres WHERE id_PuntosInteres=:id AND id_Guias=:idGuia',
            array(
                ':id'=>$idPuntoInteres,
                ':idGuia'=>$idGuia
            )
        )->fetchAll();

        if($result==[]){
            return false;
        };
        return true;
    }
    public function getGuia($id){
        return $this->_conexion->query('SELECT * FROM proy_guias WHERE id = :id LIMIT 1',
            array(
                ":id" => $id
            )
        )->fetchAll();
    }
    public function getGuias(){
        return $this->_conexion->query('SELECT * FROM proy_guias',[]
        )->fetchAll();
    }
    public function getPuntosInteres($idGuia){
        return $this->_conexion->query('SELECT * FROM `proy_puntos_interes` WHERE id IN (SELECT `id_PuntosInteres` FROM `proy_rel_guias_puntosinteres` WHERE `id_Guias` = :id)',
            array(
                ":id" => $idGuia
            )
        )->fetchAll();
    }
    public function getRecorridos($idGuia){
        return $this->_conexion->query('SELECT * FROM `proy_puntos_interes` WHERE id IN (SELECT `id_PuntosInteres` FROM `proy_rel_guias_puntosinteres` WHERE `id_Guias` = :id)',
            array(
                ":id" => $idGuia
            )
        )->fetchAll();
    }
    public function getGuiasBuscados($valorBusqueda)
    {
        return $this->_conexion->query('SELECT * FROM proy_guias where lower(guias.Titulo LIKE  \'%\'  :valorBusqueda  \'%\');',
            array(":valorBusqueda" => strtolower($valorBusqueda)))->fetchAll();
    }
    public function obtenerNumeroDeGuiasTuristicas()
    {
        return $this->_conexion->query('SELECT FOUND_ROWS() as total', []
        )->fetch()['total'];
    }
    public function getUnosCuantosPuntosInteres($inicio, $postPorPagina)
    {
        return $this->_conexion->query('SELECT SQL_CALC_FOUND_ROWS * FROM proy_guias LIMIT '.$inicio.','.$postPorPagina,
            []
        )->fetchAll();
    }
}
<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: Usuarios.php
 * Date: 11/12/18
 * @Description: Clase encargada de la gestión de usuarios.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

require_once('clases/BD.php');
require_once('config/config.php');

class Usuarios
{
    private $_conexion = null;

    public function __construct()
    {
        $this->_conexion = new BD();
        BD::singleton(HOST, DATABASE, USER, PASSWORD);
    }

    public function autenticar($nombre, $passwd)
    {
        $result = $this->_conexion->query('SELECT * FROM ex_usuarios WHERE nombre = :nombre AND passwd = :passwd',
            array(
                ":nombre" => $nombre,
                ":passwd" => $passwd,
                )
        );

        return isset($result->fetch()['nombre']);
    }


    public function getIdUsuario($nombre)
    {
        return $this->_conexion->query('SELECT id FROM ex_usuarios WHERE nombre = :nombre;',
            array(":nombre" => $nombre)
        )->fetch()['id'];
    }

    public function getUsuario($nombre)
    {
        return $this->_conexion->query('SELECT nombre FROM ex_usuarios WHERE nombre = :nombre;',
            array(":nombre" => $nombre)
        )->fetch()["nombre"];
    }

    public function getUsuariosPerfil($id)
    {
        return $this->_conexion->query('SELECT perfil FROM ex_usuarios where id = :id;',
            array(":id" => $id)
        )->fetch()["perfil"];
    }

    public function getClientes(){
        return $this->_conexion->query('SELECT * FROM ex_usuarios WHERE perfil=:perfil',
            array("perfil"=>"rol1")
        )->fetchAll();
    }
}
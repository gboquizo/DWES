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

    public function autenticar($nombre, $psw)
    {
        $result = $this->_conexion->query('SELECT * FROM blognoticias_usuarios WHERE nombre = :nombre AND psw = :psw',
            array(
                ":nombre" => $nombre,
                ":psw" => $psw,
                )
        );

        return isset($result->fetch()['nombre']);
    }

    public function crearUsuario($nombre, $email, $psw)
    {
        $result = $this->_conexion->query('INSERT INTO blognoticias_usuarios(nombre,email,psw,perfil,estado) VALUES(:nombre,:email,:psw,:perfil,:estado);',
            array(
                ":nombre" => $nombre,
                ":email" => $email,
                ":psw" => $psw,
                ":perfil" => "Lector",
                ":estado" => "Activo",
            )
        );

        return $result->errorCode() == '00000';//comprobar que no se haya producido ningun error
    }

    public function getIdUsuario($nombre)
    {
        return $this->_conexion->query('SELECT id FROM blognoticias_usuarios WHERE nombre = :nombre;',
            array(":nombre" => $nombre)
        )->fetch()['id'];
    }

    public function getUsuario($nombre)
    {
        return $this->_conexion->query('SELECT nombre FROM blognoticias_usuarios WHERE nombre = :nombre;',
            array(":nombre" => $nombre)
        )->fetch()["nombre"];
    }

    public function getUsuariosPerfil($id)
    {
        return $this->_conexion->query('SELECT perfil FROM blognoticias_usuarios where id = :id;',
            array(":id" => $id)
        )->fetch()["perfil"];
    }

    public function getUsuariosEstado($id)
    {
        return $this->_conexion->query('SELECT estado FROM blognoticias_usuarios where id = :id;',
            array(":id" => $id)
        )->fetch()["estado"];
    }

    public function getAlumnos()
    {
        return $this->_conexion->query('SELECT * FROM blognoticias_usuarios',
            array()
        )->fetchAll();
    }

    public function getUsuariosNoValidados()
    {
        return $this->_conexion->query('SELECT * FROM blognoticias_usuarios WHERE estado not like "Activo" and  not (perfil =:Administrador)',
            array(":Administrador" => "Administrador")
        )->fetchAll();
    }
    public function getUsuariosValidados()
    {
        return $this->_conexion->query('SELECT * FROM blognoticias_usuarios WHERE estado like "Activo" and  not (perfil =:Administrador);',
            array(":Administrador" => "Administrador")
        )->fetchAll();
    }

    public function validarUsuario($id)
    {
        $result = $this->_conexion->query('UPDATE blognoticias_usuarios SET estado = "Activo"  WHERE id = :id;',
            array(":id" => $id));

        return $result->errorCode() == '00000';//comprobar que no se haya producido ningun error
    }

    public function desactivarUsuarios($id)
    {
        $result = $this->_conexion->query('UPDATE blognoticias_usuarios SET estado = "Pendiente"  WHERE id = :id;',
            array(":id" => $id));

        return $result->errorCode() == '00000';//comprobar que no se haya producido ningun error
    }

    public function validarTodos()
    {
        $result = $this->_conexion->query('UPDATE blognoticias_usuarios SET estado = "Activo" WHERE estado not like "Activo";',
            array());

        return $result->errorCode() == '00000';//comprobar que no se haya producido ningun error
    }

    public function desvalidarTodos()
    {
        $result = $this->_conexion->query('UPDATE blognoticias_usuarios SET estado = "Pendiente" WHERE estado = "Activo" and  not (perfil =:Administrador);',
            array(":Administrador" => "Administrador"));

        return $result->errorCode() == '00000';//comprobar que no se haya producido ningun error
    }

}
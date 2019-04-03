<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: Blogs.php
 * @Date: 06/03/19
 * @Description: Clase encargada de la gestión de Blogs.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
require_once('clases/BD.php');
require_once('config/config.php');

class Blogs
{
    private $_conexion = null;

    public function __construct()
    {
        $this->_conexion = new BD();
        BD::singleton(HOST, DATABASE, USER, PASSWORD);
    }

    public function getBlogsActivos()

    {
        return $this->_conexion->query('SELECT * FROM blognoticias_blog;',
            array()
        )->fetchAll();
    }

    public function obtenerIds(){
        return $this->_conexion->query('SELECT id FROM blognoticias_blog',
            array()
        )->fetchAll();
    }

    public function getBlogsBuscados($valorBusqueda)
    {
        return $this->_conexion->query('SELECT * FROM blognoticias_blog where lower(blognoticias_blog.title LIKE  \'%\'  :valorBusqueda  \'%\');',
            array(":valorBusqueda" => strtolower($valorBusqueda)))->fetchAll();
    }

    public function getBlog($titulo)
    {
        return $this->_conexion->query('SELECT title FROM blognoticias_blog WHERE title = :title;',
            array(":title" => $titulo)
        )->fetch()["title"];
    }

    public function insertarBlog($title,$blog,$image, $tags, $idAutor, $activo)
    {
        $date = getDate();
        $date = $date["year"]."-".$date["mon"]."-".$date["mday"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
        $result = $this->_conexion->query('INSERT INTO blognoticias_blog(title,blog,image,tags,created, updated, idAutor, activo) VALUES(:title,:blog,:image,:tags,:created,:updated, :idAutor, :activo );',

            array(":title" => $title,
                ":blog" => $blog,
                ":image" => $image,
                ":tags" => $tags,
                ":created" => $date,
                ":updated" => $date,
                ":idAutor" => $idAutor,
                ":activo" => $activo
            )

        );
        return $result->errorCode() == '00000';//comprobar que no se haya producido ningun error
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 08/03/2019
 * Time: 10:46
 */

class Valoracion
{
    private $_conexion = null;

    public function __construct()
    {
        $this->_conexion = new BD();
        BD::singleton(HOST, DATABASE, USER, PASSWORD);
    }

    public function valorarBlog($ip, $idBlog, $valoracion)
    {
        if (!$this->checkSiVotado($idBlog, $ip)) {
            $result = $this->_conexion->query('INSERT INTO blognoticias_valoracion(ip,idBlog,val) 
                VALUES(:ip,:idBlog,:valoracion);',
                array(
                    ":ip" => $ip,
                    ":idBlog" => $idBlog,
                    ":valoracion" => $valoracion
                )
            );

            return $result->errorCode() == '00000';//comprobar que no se haya producido ningun error
        }
        return false;
    }

    public function checkSiVotado($idBlog, $ip)
    {
        $result = $this->_conexion->query('SELECT ip FROM blognoticias_valoracion where idBlog = :idBlog',
            array(
                ":idBlog" => $idBlog
            )
        )->fetch();
        return $result['ip'] == $ip;


    }

    public function getMejoresBlog()
    {
        $result = $this->_conexion->query('SELECT * FROM blognoticias_blog WHERE id IN (SELECT idBlog FROM blognoticias_valoracion GROUP BY idBlog HAVING AVG(val) = 5);',
            array()
        )->fetchAll();
        return $result;
    }

    public function getPuntuacionMedia($idBlog)
    {
        return $result = $this->_conexion->query('SELECT ROUND(AVG(val),2) FROM blognoticias_valoracion WHERE idBlog = :idBlog',
            array(':idBlog' => $idBlog)
        )->fetchAll();
    }
}
<?php
/**
 * @User: Miguel Ángel Gavilán Merino
 * @File: Usuario.php
 * @Date: 24/11/17
 * @Description:
 */

class Usuario
{
    private $_id;
    private $_nombre;
    private $_password;

    /**
     * @param mixed $nombre
     */
    private function setNombre($nombre)
    {
        $this->_nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->_nombre;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $password
     */
    private function setPassword($password)
    {
        $this->_password = $password;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    private function setId($id)
    {
        $this->_id = $id;
    }
}
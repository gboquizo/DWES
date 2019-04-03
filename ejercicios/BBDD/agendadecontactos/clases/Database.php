<?php


class Database
{

    private $_dbh;

    private $_stmt;

    private $_queryCounter = 0;


    public function __construct($user, $pass, $dbname)
    {

        $dsn = 'mysql:host=localhost;dbname=' . $dbname;


        $options = array(

            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'


        );

        try {

            $this->_dbh = new PDO($dsn, $user, $pass, $options);

        } catch (PDOException $e) {

            echo $e->getMessage();

            exit();

        }

    }


    public function query($query)
    {

        $this->_stmt = $this->_dbh->prepare($query);

    }


    public function bind($pos, $value, $type = null)
    {

        if (is_null($type)) {

            switch (true) {

                case is_int($value):

                    $type = PDO::PARAM_INT;

                    break;

                case is_bool($value):

                    $type = PDO::PARAM_BOOL;

                    break;

                case is_null($value):

                    $type = PDO::PARAM_NULL;

                    break;

                default:

                    $type = PDO::PARAM_STR;

            }

        }

        $this->_stmt->bindValue($pos, $value, $type);

    }


    public function execute()
    {

        return $this->_stmt->execute();

    }


    public function obtenerTabla()
    {

        $this->execute();

        return $this->_stmt->fetchAll(PDO::FETCH_NUM);

    }


    public function obtenerTablaAsociativa()
    {

        $this->execute();

        return $this->_stmt->fetchAll(PDO::FETCH_ASSOC);

    }


    public function obtenerFila()
    {

        $this->execute();

        return $this->_stmt->fetch(PDO::FETCH_ASSOC);

    }


    public function ultimaIdInsertada()
    {

        return $this->_dbh->lastInsertId();

    }


    public function numeroFilas()
    {

        $this->execute();

        return $this->_stmt->rowCount();

    }


}


?>
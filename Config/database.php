<?php

class db
{
    private static $host = "localhost";
    private static $userName = "root";
    private static $password = "";
    private static $database = "";
    private static $instance = null;
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli(
            self::$host,
            self::$userName,
            self::$password,
            self::$database
        );
        if ($this->connection->connect_errno) {
            die("Sikertelen adatbázis kapcsolódási kisérlet");
        }

    }

    public static function get()
    {
        if (is_null(self::$instance)) {
            self::$instance = new db;
        }
        return self::$instance;
    }

    public function query($queryString)
    {
        $result = $this->connection->query($queryString);
        if (!$result) $this->error($queryString);
        else return $result;
    }

    public function getNumRow($valtozoString)
    {
        return $this->getResultNumRow($this->query($valtozoString));
    }

    public function getResultNumRow($result)
    {
        return mysqli_num_rows($result);
    }

    private function error($string)
    {
        die('SQL ERROR :' . $this->connection->error . '<br> az alabbi query soran :' . $string);
    }

    public function getAssoc($queryString)
    {

        $result = $this->query($queryString);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;

        }
        return $rows;
    }


}


?>
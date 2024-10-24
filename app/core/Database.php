<?php

class Database {
    private $dbname = Constant::DBNAME,
            $dbhost = Constant::DBHOST,
            $dbuser = Constant::DBUSER,
            $dbpass = Constant::DBPASS;
    private $db, $stmt;

    public function __construct() {
        try {
            $dh = "mysql:host={$this->dbhost};dbname={$this->dbname};charset=utf8";
            $options = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ];
            $this->db = new PDO($dh, $this->dbuser, $this->dbpass, $options);
        } catch(PDOException $e) {
            echo "Koneksi gagal: ".$e->getMessage();
        }
    }

    public function query($query) {
        $this->stmt = $this->db->prepare($query);
    }

    public function bind($bind, $value, $type = null) {
        switch(true) {
            case is_null($value):
                $type = PDO::PARAM_NULL;
            break;
            case is_int($value):
                $type = PDO::PARAM_INT;
            break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }  
        $this->stmt->bindValue($bind, $value, $type);
    }

    public function execute() {
        $this->stmt->execute();
    }

    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() {
        return $this->stmt->rowCount();
    }
}
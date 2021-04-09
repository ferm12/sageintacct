<?php

class SqlDB {
    protected $_mysql;
    protected $_query;

    public function __construct( $host ="127.0.0.1" , $db, $user, $pass){

        $charset = 'utf8mb4';

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        try {

             $this->_mysql = new PDO($dsn, $user, $pass, $options);
             
             $sql_query ="CREATE TABLE IF NOT EXISTS persons(id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, name TEXT DEFAULT NULL)";

             $this->_mysql->exec($sql_query); 

        } catch (\PDOException $e) {

             throw new \PDOException($e->getMessage(), (int)$e->getCode());

        }
    }

    /**
     *@ $query contains a user-provided select query.
     */
    public function query($query){

        return $this->_mysql->query($query);

    }

    public function mysql(){

        return $this->_mysql;
    }
}

?>

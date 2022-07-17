<?php

Class Connector
{
    private $host ="mysql";
    private $database = "codoacodo";
    private $user = "admin";
    private $password = "admin";

    public $connection;
   
    public function __construct()
    {
        try
        {
            $this->connection = new PDO("mysql:host=$this->host; dbname=$this->database", $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            die("Falla de Conexión: ".$e);
        }
    }

    public function exec($sql)
    {
        $this->connection->exec($sql);

        return $this->connection->lastInsertId();
    }

    public function query($sql)
    { 
        $sentence = $this->connection->prepare($sql);
        $sentence->execute();

        return $sentence->fetchAll();
    }


}



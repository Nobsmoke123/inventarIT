<?php

class DatabaseConnection
{

    private $connection = null;
    private $username = null;
    private $password = null;
    private $dbname = null;
    private $dns = null;

    public function __construct($username = "root", $password = "qwertyuiop!@#$%^&*()", $dbname = "invertar")
    {
        $this->dbname = $dbname;
        $this->password = $password;
        $this->username = $username;
        $this->dns = "mysql:host=localhost;dbname=" . $this->dbname;
    }

    public function connection()
    {
        try {
            $this->connection = new PDO($this->dns, $this->username, $this->password);
            // echo "Connection Successful ";
            return $this->connection;
        } catch (PDOException $exception) {
            echo "<strong> NOTICE !!! : </strong> Connection Unsuccessful <br/><br/>" . $exception;
            return $this->connection;
        }
    }
}

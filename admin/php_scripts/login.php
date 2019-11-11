<?php

class AdminLogin{

    private $pdo = null;

    public function __construct(PDO $connection)
    {
        $this->pdo = $connection;
    }

    public function LogIn($username,$password){
        $query = "SELECT * FROM `users` WHERE username=?";
        $pds = $this->pdo->prepare($query);
        $pds->execute([$username]);

        // Get the username and the password from the database
        $row = $pds->fetch(PDO::FETCH_ASSOC);
        
        if(!empty($row)){
            if(password_verify($password,$row["password"])){ 
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}

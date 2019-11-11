<?php

class Utility{
    public function cleanInput(String $input):String {
        return (String)htmlspecialchars(strip_tags(trim($input)));
    }

    public function password_hash(string $password): string
    {
        $options = [
            "cost" => 11,
            "salt" => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        $hashed_password = password_hash($password,PASSWORD_BCRYPT,$options);
        return $hashed_password;
    }

    public function getDeadLine(){
        
    }
}
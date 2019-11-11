<?php


class FlashMessages{
    private $message;
    private $name;

    public function setMessage(String $name,String $message){
        if(isset($_SESSION["$name"])){
            $_SESSION["message"] = $message ;
        }else{
            $_SESSION["$name"] = $message;
        }
    }

    public function flash(String $name){
        if(isset($_SESSION["$name"])){
            return $_SESSION["$name"];
        }
    }

    public function checkFlash(String $name){
        if(isset($_SESSION["$name"])){
            return true;
        }else{
            return false;
        }
    }

    public function clearFlash(String $name){
        unset($_SESSION["$name"]);
    }
}
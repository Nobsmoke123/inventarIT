<?php

require_once("./admin/php_scripts/connection.php");
require_once("./admin/php_scripts/utility.php");
require_once("./admin/php_scripts/queries.php");
$dbcon          =   new DatabaseConnection;
$connection     =   $dbcon->connection();
$queries = new Queries($connection);
$utility = new Utility;

if($_POST["submit"]){
    $name = $utility->cleanInput($_POST["name"]);
    $email = $utility->cleanInput($_POST["email"]);
    $subject = $utility->cleanInput($_POST["subject"]);
    $message = $utility->cleanInput($_POST["message"]);
    $data_sent = Date("Y-m-d");

    // echo $name."<br/>";
    // echo $email."<br/>";
    // echo $subject."<br/>";
    // echo $message."<br/>";


    $status     =   $queries->addEnquiry($name,$email,$subject,$message,$data_sent);

    echo $status;

}


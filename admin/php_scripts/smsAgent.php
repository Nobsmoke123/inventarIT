<?php

class SmsAgent
{
    private $user;
    private $password;
    private $pdo;
    private $queries;

    public function __construct(PDO $connection, Queries $queries)
    {
        $this->user         =   urlencode("xxxxxxxxxxxxxxx");
        $this->password     =   urlencode("+++++++++++++++");
        $this->queries      =   $queries;
        $this->pdo          =   $connection;
    }

    public function sendSms(String $sender,String $message,String $receiver_id,String $receiver){
        $curl_instance = curl_init();
        $url = "http://portal.bulksmsnigeria.net/api/?username=".$this->user."&password=".$this->password."&message=".urlencode($message)."&sender=".$sender."&mobiles=".$receiver;

        curl_setopt($curl_instance,CURLOPT_URL,$url);
        curl_setopt($curl_instance,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl_instance,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_instance,CURLOPT_HEADER,0);
        $result = curl_exec($curl_instance);
        curl_close($curl_instance);
        $result = json_decode($result);
        $status = $result->status;

        // Store the sms in the database 
        $this->storeSMS($receiver_id,$message,$status);
        
        return $result;
    }


    private function storeSMS($receiver_id,$message,$status){
        $date_sent = Date("Y-m-d");
        $this->queries->saveSMS($receiver_id,$message,$status,$date_sent);
    }

    public function getBalance(){
        $curl_instance = curl_init();
        $url = "http://portal.bulksmsnigeria.net/api/?username=".urlencode("donaldchimezieakobundu@yahoo.com")."&password=".urlencode("blackhat007!!!")."&action=balance";
        // $url = "http://portal.bulksmsnigeria.net/api/?username=".$this->user."&password=".$this->password."&message=".urlencode($message)."&sender=".$sender."&mobiles=".$receiver;

        curl_setopt($curl_instance,CURLOPT_URL,$url);
        curl_setopt($curl_instance,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl_instance,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_instance,CURLOPT_HEADER,0);
        $result = curl_exec($curl_instance);
        curl_close($curl_instance);

        $result = json_decode($result);
        
        // $status = $result->status;

        return $result;
    }

}

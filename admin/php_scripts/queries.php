<?php

class Queries 
{

    private $pdo;

    /**
     * Class Constructor
     *
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->pdo = $connection;
    }

    /**
     * Undocumented function
     *
     * @param String $username
     * @return Object
     */
    public function getAdminProfile(String $username)
    {
        $query  =   "SELECT * FROM users WHERE username=?";
        $pds    =   $this->pdo->prepare($query);
        $pds->execute([$username]);
        $row    = $pds->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function updateAdminProfile(String $username,String $first_name,String $last_name,String $email)
    {
        $query  =   "UPDATE users SET first_name=?,last_name=?,email=? WHERE username=?";
        $pds    =   $this->pdo->prepare($query);
        $pds->execute([$first_name,$last_name,$email,$username]);
    }

    /**
     * Undocumented function
     *
     * @param String $first_name
     * @param String $last_name
     * @param String $email
     * @return Object
     */
    public function checkIfCustomerExists(String $first_name,String $last_name,String $email)
    {
        $query  =   "SELECT * FROM customers WHERE first_name=? AND last_name=? AND email=?";
        $pds    =   $this->pdo->prepare($query);
        $pds->execute([$first_name,$last_name,$email]);
        $row = $pds->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function AddCustomers(String $first_name,String $last_name,String $email,String $phone,String $jobs_count,String $date_joined,String $date_modified)
    {
        $query  =   "INSERT INTO customers (first_name,last_name,email,phone,jobs_count,date_joined,date_modified) VALUES(?,?,?,?,?,?,?)";
        $pds    =   $this->pdo->prepare($query);
        $pds->execute([$first_name,$last_name,$email,$phone,$jobs_count,$date_joined,$date_modified]);
    }

    public function updateCustomerJobCount(String $id,String $jobs_count)
    {
        $query  =   "UPDATE customers SET jobs_count=? WHERE id=?";
        $pds    =   $this->pdo->prepare($query);
        $pds->execute([$jobs_count,$id]);
    }

    public function AddJobs(String $customer_id,String $job_title,String $job_description,String $dropin_date,String $pickup_date)
    {
        $status = "in progress";
        $query = "INSERT INTO jobs(customer_id,job_title,job_description,status,dropin_date,pickup_date) VALUES(?,?,?,?,?,?)";
        $pds = $this->pdo->prepare($query);
        $pds->execute([$customer_id,$job_title,$job_description,$status,$dropin_date,$pickup_date]);
    }

    public function getAllCustomers()
    {
        $query  =   "SELECT * FROM customers";
        $pds    =   $this->pdo->prepare($query);
        $pds->execute();
        $row    =   $pds->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function getAllJobs()
    {
        $query = "SELECT first_name,last_name,jobs.id,job_title,job_description,status,dropin_date,pickup_date FROM jobs LEFT JOIN customers on jobs.customer_id = customers.id";
        $pds = $this->pdo->prepare($query);
        $pds->execute();
        $row = $pds->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }


    public function updateCustomer(String $id,String $email,String $phone)
    {
        $query = "UPDATE customers SET email=?,phone=? WHERE id=?";
        $pds = $this->pdo->prepare($query);
        $pds->execute([$email,$phone,$id]);
    }

    public function updateJobs(String $id,String $pickup_date,string $status)
    {
        $query = "UPDATE jobs SET pickup_date=?,status=? WHERE id=?";
        $pds = $this->pdo->prepare($query);
        $pds->execute([$pickup_date,$status,$id]);
    }

    public function getJobDetails(String $id)
    {
        $query = "SELECT first_name,last_name,job_title,job_description,status,dropin_date,pickup_date,customer_id FROM jobs LEFT JOIN customers on jobs.customer_id=customers.id WHERE jobs.id=?";
        $pds = $this->pdo->prepare($query);
        $pds->execute([$id]);

        $row = $pds->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function getCustomerDetails(String $id)
    {
        $query = "SELECT * FROM customers WHERE id=?";
        $pds = $this->pdo->prepare($query);
        $pds->execute([$id]);

        $row = $pds->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function getAllSMS(){
        $query = "SELECT first_name,last_name,sms.id,message,status,date_sent FROM sms LEFT JOIN customers on sms.customer_id=customers.id";
        $pds = $this->pdo->prepare($query);
        $pds->execute();

        $row = $pds->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    public function saveSMS(String $customer_id,String $message, String $status,String $date_sent){
        $query = "INSERT INTO sms(customer_id,message,status,date_sent) VALUES(?,?,?,?)";
        $pds = $this->pdo->prepare($query);
        $pds->execute([$customer_id,$message,$status,$date_sent]);

    }

    public function getTableCount(string $tablename){
        $query = "SELECT count(*) FROM {$tablename}";
        $pds = $this->pdo->prepare($query);
        $pds->execute([]);

        $result = $pds->fetchColumn();

        return $result;
    }

    public function updateAdminPassword(string $new_password, $id=1){
        $query = "UPDATE users SET password=? WHERE id=?";
        $pds = $this->pdo->prepare($query);
        $pds->execute([$new_password,$id]);
    }

    public function getAllPendingJobs(){
       $status = "in progress";
       $query = "SELECT first_name,last_name,jobs.id,job_title,job_description,status,dropin_date,pickup_date FROM jobs LEFT JOIN customers on jobs.customer_id = customers.id WHERE status=? ORDER BY pickup_date ASC LIMIT 5";
        $pds = $this->pdo->prepare($query);
        $pds->execute([$status]);
        $row = $pds->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function addEnquiry(string $name,string $email,string $subject,string $message,string $date_sent){
        $query = "INSERT INTO Enquiries (name,email,subject,message,date_sent) VALUES(?,?,?,?,?)";
        $pds = $this->pdo->prepare($query);
        $pds->execute([$name,$email,$subject,$message,$date_sent]);

        if($pds->rowCount() > 0){
            return "Successful";
        }else{
            return "Unsuccessful";
        }
    }
}
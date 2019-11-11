<?php
session_start();

// if(!(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] ==  true)){
//     header("Location: login.php");
// }

// Check the request details

#AutoLoad the Classes 

require_once('./php_scripts/connection.php');
require_once('./php_scripts/login.php');
require_once('./php_scripts/utility.php');
require_once('./php_scripts/queries.php');
require_once('./php_scripts/smsAgent.php');
require_once('./php_scripts/flashMessage.php');


$dbcon = new DatabaseConnection;
$utility = new Utility;
$connection = $dbcon->connection();

$login = new AdminLogin($connection);
$queries = new Queries($connection);
$smsAgent = new SmsAgent($connection,$queries);

$flashMessage = new FlashMessages;

if(isset($_POST["submit"])){
    $type = $_POST["type"];
    switch($type){
        case 0:
            // Admin Login
            $username   = $utility->cleanInput($_POST["username"]);
            $password   = $utility->cleanInput($_POST["password"]);
            $authenticated = $login->LogIn($username,$password);
            if($authenticated){
                session_start();
                $_SESSION["loggedIn"]   = true;
                $_SESSION["username"]   = $username;

                header("Location: dashboard.php");
            }else{
                $flashMessage->setMessage("LoginError","Invalid Username or Password");
                header("Location: login.php");
            }
            break;
        
        case 1:
            // Register A New CLient
            $first_name     =   $utility->cleanInput($_POST["first_name"]);
            $last_name      =   $utility->cleanInput($_POST["last_name"]);
            $email          =   $utility->cleanInput($_POST["email"]);
            $phone          =   $utility->cleanInput($_POST["phone"]);
            $job_title      =   $utility->cleanInput($_POST["job_title"]);
            $job_desc       =   $utility->cleanInput($_POST["job_description"]);
            $dropin_date    =   $utility->cleanInput($_POST["dropin_date"]);
            $pickup_date    =   $utility->cleanInput($_POST["pickup_date"]);

            $results = $queries->checkIfCustomerExists($first_name,$last_name,$email);
            if(empty($results)){
                // Means the customer doesn't exist in the database
                // Add the customer to the database
                $jobs_count = 1;
                $queries->AddCustomers($first_name,$last_name,$email,$phone,$jobs_count,$dropin_date,$dropin_date);
                $new_customer = $queries->checkIfCustomerExists($first_name,$last_name,$email);
                $queries->AddJobs($new_customer["id"],$job_title,$job_desc,$dropin_date,$pickup_date);

                $flashMessage->setMessage("Success","Customer Added Successfully");
                header("Location: allClients.php");
            }else{
                // Means the customer exists in the database 
                // Update the jobs count and then add the jobs
                $jobs_count = 1 + $results["jobs_count"];
                $queries->updateCustomerJobCount($results["id"],$jobs_count);
                $queries->AddJobs($results["id"],$job_title,$job_desc,$dropin_date,$pickup_date);

                $flashMessage->setMessage("Success","Customer Added Successfully");
                header("Location: allClients.php");
            }

            header("Location: allClients.php");
            break;

        case 2:
            // Add a new Jobs
            $customer_id        =       $utility->cleanInput($_POST["customer_id"]);
            $job_title          =       $utility->cleanInput($_POST["job_title"]);
            $job_description    =       $utility->cleanInput($_POST["job_description"]);
            $dropin_date        =       $utility->cleanInput($_POST["dropin_date"]);
            $pickup_date        =       $utility->cleanInput($_POST["pickup_date"]);

            $queries->AddJobs($customer_id,$job_title,$job_description,$dropin_date,$pickup_date);
            
            $flashMessage->setMessage("Success","Job Added Successfully");
            
            header("Location: allJobs.php");

            break;

        case 3:
            // Send text messages
            $customer_id        =   $utility->cleanInput($_POST["customer_id"]);
            $message            =   $utility->cleanInput($_POST["message"]);
            $customer_details   =   $queries->getCustomerDetails($customer_id);
            $customer_phone = $customer_details["phone"];
            $customer_id    = $customer_details["id"];
            $sender = "InventarHub";
            $result = $smsAgent->sendSms($sender,$message,$customer_id,$customer_phone);

            $result = json_decode($result);
            if(strcmp($result->status,"OK")){
                $flashMessage->setMessage("Success","Message sent Successfully");
                header("Location: sms.php");
            }else{
                $flashMessage->setMessage("Success","Network Error please try again later.");
                header("Location: sms.php");
            }
            break;
        
        case 4:
            // Update Profle
            $first_name     =   $utility->cleanInput($_POST["first_name"]);
            $last_name      =   $utility->cleanInput($_POST["last_name"]);
            $email          =   $utility->cleanInput($_POST["email"]);
            $username       =   $utility->cleanInput($_POST["username"]);

            $queries->updateAdminProfile($username,$first_name,$last_name,$email); 
            $flashMessage->setMessage("Success","Profile Updated Successfully");
            header("Location: profile.php");
            break;

        case 5:
            // Update the Jobs pickup_date
            $pickup_date    =   $utility->cleanInput($_POST["pickup_date"]);
            $status         =   $utility->cleanInput($_POST["status"]);
            $job_id         =   $utility->cleanInput($_POST["job_id"]);

            $queries->updateJobs($job_id,$pickup_date,$status);

            /* If job has been completed automatically send the user a message */
            if($status =="completed"){
                // echo "The job was completed";
                $customer_id        =   $utility->cleanInput($_POST["customer_id"]);
                $customer_details   =   $queries->getCustomerDetails($customer_id);
                $customer_phone = $customer_details["phone"];
                // $customer_id    = $customer_details["id"];
                $first_name     = $customer_details["first_name"];
                $sender = "InventarHub";
                $message = "Dear {$first_name}, your gadget repair has been completed. Please kindly drop by to pick up your gadget at our store closest to you!";
                $result = $smsAgent->sendSms($sender,$message,$customer_id,$customer_phone);
            }

            $flashMessage->setMessage("Success","Job Record Updated Successfully");
            header("Location: allJobs.php");
            break;
        case 6:
            // post request using ajax for the job details
            $job_id = $utility->cleanInput($_POST["id"]);
            $result = $queries->getJobDetails($job_id);
            print_r(json_encode($result));
            break;
        
        case 7:
            // Update the Customers details
            $customer_id    =   $utility->cleanInput($_POST["customer_id"]);
            $email          =   $utility->cleanInput($_POST["email"]);
            $phone          =   $utility->cleanInput($_POST["phone"]);

            $queries->updateCustomer($customer_id,$email,$phone);
            $flashMessage->setMessage("Success","Customer Record Updated Successfully");
            header("Location: allClients.php");
            break;

        case 8:
            // post request using ajax for the customers details
            $customer_id    =   $utility->cleanInput($_POST["id"]);
            $result         =   $queries->getCustomerDetails($customer_id);
            print_r(json_encode($result));
            break;
        case 9:
            // update admin password
            $new_password = $_POST["new_password"];
            $new_password = $utility->password_hash($new_password);
            $queries->updateAdminPassword($new_password);

            $flashMessage->setMessage("Success","Pasword Changed Successfully!");
            header("Location: password_reset.php");
            break;
    }
}
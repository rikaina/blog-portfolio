<?php
    require_once 'database.php';
    
    class User extends Database
    {
        private $conn;

        public function __construct()
        {
            //establish db connection
            $this->conn = $this->connect();
        }

        public function register($first_name,$last_name,$postalcode,$address,$email,$phone_number,$user_name,$password)
        {
            $hashed_password = password_hash($password,PASSWORD_DEFAULT); 
            //encrypts your password
            
            // $sql = "INSERT INTO users(user_name,password) VALUES('{$user_name}','{$hashed_password}')"; //insert sql statement to insert the username and the encrypted password to table accounts
            // $result = $this->conn->query($sql);
            //runs the sql statement; returns TRUE if successful, otherwise, returns FALSE. 

            // if( $result ) //checks if the $sql runs successfully
            // {
                //if the $result is TRUE, we will get the user_id and insert the rest of the data in table users
                
                // $user_id = $this->conn->insert_id; //gets the user_id

                $sql = "INSERT INTO users(first_name,last_name,postalcode,address,email,phone_number, user_name, password) VALUES('$first_name','$last_name','$postalcode','$address','$email','$phone_number', '{$user_name}','{$hashed_password}')";
                $result = $this->conn->query($sql);
                
                // $sql = "INSERT INTO users(first_name,last_name,postalcode,address,email,phone_number,user_id) VALUES('$first_name','$last_name','$postalcode','$address','$email',$phone_number,$user_id)";
                // $result = $this->conn->query($sql);
                //runs the sql statement; returns TRUE if successful, otherwise, returns FALSE.
                
                if($result) //checks if the $sql runs successfully
                {
                    //if $result is TRUE, display success message and redirect to login page.

                    $_SESSION["success"] = 1; //1 means the operation is successful, 0 means otherwise
                    $_SESSION["message"] = "Registration successful."; //the success message to be displayed.
    
                    header("Location: ../views/login.php");
                }
                else
                {
                    // if the $result id FALSE, we will set the error message to be displayed using the $_session and then redirect back to the register.php
                    
                    $_SESSION["failed"] = 0; //1 means the operation is successful, 0 means otherwise
                    $_SESSION["message"] = "An error occured. Failed to register. Kindly try again."; //the error message to be displayed.
    
                    header("Location: ../views/registration.php");
                } 
            // }
            // else
            // {
            //     // if the $result id FALSE, we will set the error message to be displayed using the $_session and then redirect back to the register.php
                
            //     $_SESSION["failed"] = 0; //1 means the operation is successful, 0 means otherwise
            //     $_SESSION["message"] = "An error occured. Failed to register. Kindly try again."; //the error message to be displayed.

            //     header("Location: ../views/registration.php");
            // }
            

        }

        public function login($user_name, $password)
        {
            $sql = "SELECT * FROM users WHERE user_name = '{$user_name}'";

            $result = $this->conn->query($sql);

            if( $result && $result->num_rows>0)
            {
                $user = $result->fetch_assoc(); //getting the result as an associative array
                
                //check if password is correct
                if( password_verify($password,$user["password"])) 
                {
                    //save certain data to session
                    $_SESSION["user_id"] = $users["user_id"];
                    $_SESSION["first_name"] = $users["first_name"];
                    $_SESSION["last_name"] = $users["last_name"];
                    $_SESSION["postalcode"] = $users["postalcode"];
                    $_SESSION["address"] = $users["address"];
                    $_SESSION["email"] = $users["email"];
                    $_SESSION["phone_number"] = $users["phone_number"];
                    $_SESSION["user_name"] = $users["user_name"];
                    $_SESSION["password"] = $users["password"];
                    $_SESSION["status"] = $users["status"];


                    // if( $user["status"] == "C") //if the status is C, meaning client, reflected the status to mypage.php
                    // {
                    //     contents1("Location: ../views/mypage.php");
                    // }
                    // else
                    // {
                    //     //if role is not C, it means, most probably, D - delivery person
                    //     header("Location: ../views/mypage.php");
                    // }

                }
                else
                {
                    // if password is incorrect,display and error message
                
                    $_SESSION["success"] = 0; //1 means the operation is successful, 0 means otherwise
                    $_SESSION["message"] = "Incorrect password."; //the error message to be displayed.
    
                    header("Location: ../views/registration.php");                
                }
            }
            else
            {
                // if the $result is FALSE AND there are no results returned fromt he sql statement, we will set the error message to be displayed using the $_session and then redirect back to the index.php (login page)
                
                $_SESSION["success"] = 0; //1 means the operation is successful, 0 means otherwise
                $_SESSION["message"] = "Incorrect username."; //the error message to be displayed.

                header("Location: ../views/registration.php");                
            }
        }

        public function getUser($user_id)
        {
            // $sql = "SELECT users.user_id,first_name,last_name,postalcode,address,email,phone_number,user_name,password,status, user_id,first_name,last_name,postalcode,address,email,contact_number FROM accounts INNER JOIN users ON accounts.account_id=users.account_id WHERE users.user_id = $user_id";
            $sql = "SELECT * FROM users WHERE user_id = '{$user_name}'";
            $result = $this->conn->query($sql);

            if( $result && $result->num_rows>0)
            {
                return $result->fetch_assoc();
            }
            else
            {
                return FALSE;
            }
        }
    }
?>
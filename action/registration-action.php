<?php
    include '../class/user.php';

    if( isset($_POST["btn_register"]) )
    {
        //INPUT
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $postalcode = $_POST["postalcode"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $phone_number = $_POST["phone_number"];
        $user_name = $_POST["user_name"];
        $password = $_POST["password"];

        //Instantiate
        $user = new User();

        //method call
        $user->register($first_name,$last_name,$postalcode,$address,$email,$phone_number,$user_name,$password);
    }
?>
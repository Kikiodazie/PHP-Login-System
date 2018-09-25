<?php
//Force the user to login or redirect
    function ForceLogin(){
        if (isset($_SESSION['user_id'])) {
            //The user is allowed here
            # code...
        }else {
        # code...
            //The user is not allowed here.
            Header("Location: /php_login_course/login.php");
            exit;
       }
    }

    function ForceDashboard(){
        if (isset($_SESSION['user_id'])) {
            //The user is allowed here but redirect anyway
            # code...
            Header("Location: /php_login_course/dashboard.php");
            exit;

        }else {
        # code...
            //The user is not allowed here.
           
       }
    }
?>
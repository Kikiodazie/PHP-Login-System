<?php

// If there is no constant defined called __CONFIG__, do not load this file 
if(!defined('__CONFIG__')) {
	exit('You do not have a config file');
}


class page {
//Force the user to login or redirect
    static function ForceLogin(){
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

    static function ForceDashboard(){
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


}
?>
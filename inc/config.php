<?php 
//if there is no constant defined called    __CONFIG__, do not load this page
    if (!defined('__CONFIG__')) {
        exit("You do not have a config file");
        # code...
        //or config is below
    }

    //Sessions are always turned on.
        if (!isset($_SESSION)) {
            session_start();
            # code...
        }
    //Allow errors
    error_reporting(-1);
    ini_set('display_errors','on');

    //include the DB.php file
    include_once "classes/DB.php";
    include_once "classes/filter.php";

        $con = DB::getconnection();
?>
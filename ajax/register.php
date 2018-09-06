<?php 
    //Allow __CONFIG__
    define('__CONFIG__',true);

    //require the config

    require_once "/wamp64/www/php_login_course/inc/config.php";
//always return json format

        if($_SERVER['REQUEST_METHOD'] = 'POST') {
              // Always return JSON format
              header('Content-Type: application/json'); 

              $return=[];
               //Make sure the user does not exit

                //Make sure the user CAN be ADDED and is ADDED

                //Return the proper information back to javascript to redirect us

              $return ['redirect']= '/php_login_course/dashboard.php ';
              $return ['name'] = 'KIKI ODAZIE';
               

              echo json_encode($return, JSON_PRETTY_PRINT); exit;
            }else {
                # code...
                //Die. Kill script, redirect the user. do something else
                exit("test");
            }
               
             
               
            
                

            
       
?>
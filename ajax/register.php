<?php 
    //Allow __CONFIG__
    define('__CONFIG__',true);

    //require the config

    require_once "/wamp64/www/php_login_course/inc/config.php";
//always return json format

        if($_SERVER['REQUEST_METHOD'] = 'POST') {
              // Always return JSON format
             // header('Content-Type: application/json'); 

                $return=[];

                $email= Filter::String( $_POST['email'] );

               //Make sure the user does not exit
                $findUser = $con ->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
                $findUser->bindParam(':email', $email, PDO::PARAM_STR);
                $findUser->execute();

                if($findUser -> rowCount()==1){
                    //User exists
                    //we can also check to see if they are able to log in
                    $return['error']="you already have an account";
                    $return['is_logged_in']= false;
                }else{                  
                      //User does not exist. add them now.

                    $password= password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $addUser = $con->prepare("INSERT INTO users(email, password) VALUES(LOWER(:email), :password) ");
                    $addUser->bindParam(':email', $email, PDO::PARAM_STR);
                    $addUser->bindParam(':password', $password, PDO::PARAM_STR);
                    $addUser->execute();

                    $user_id = $con->lastInsertId();

                    $_SESSION['user_id'] = (int)$user_id;
                    
                    $return['redirect']= "/php_login_course/dashboard.php?message=Welcome";
                    $return['is_logged_in']= true;

                }
                //Make sure the user CAN be ADDED and is ADDED

                //Return the proper information back to javascript to redirect us

            
              $return ['name'] = 'KIKI ODAZIE';
               

              echo json_encode($return, JSON_PRETTY_PRINT); exit;
            }else {
                # code...
                //Die. Kill script, redirect the user. do something else
                exit("INVALID URL");
            }
?>
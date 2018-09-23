<?php 
    //Allow __CONFIG__
    define('__CONFIG__',true);
    require_once "inc/config.php";
//require the config

    echo $_SESSION['user_id'] . " is your user_id";
    exit;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">

    <title>Page Title</title>

    <base href="/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
  </head>

    <body>
        <div class="uk-section uk-container">
  		    
  	    </div>

        <?php require_once "inc/footer.php";?>

    </body>
</html>











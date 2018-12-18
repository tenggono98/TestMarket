<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home Manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
    </head>
    <body>

        <Section class="Header">

        <?php
        
        define("HEADER","../content/header.php",false);

        require_once(HEADER);
        
        ?>



        
        </Section>

        
        
    </body>





    <?php

    session_start();



    if($user = $_SESSION['name']){
        if(!$type = $_SESSION['type'] == "TP001" ){
            header('location:../user/home.php');
        }
    }
    else  
        header('location:../index.php');


    ?>
</html>
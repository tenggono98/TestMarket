<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home Manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../MainStyle.css">
        <script src="main.js"></script>
    </head>
    <body>

        <Section class="Header">

        <?php
        
        define("HEADER","../content/header.php",false);

        require_once(HEADER);
        
        ?>
        </Section>
        
        <section Class="ContentHome_M">
        
            <div Class="Content">

                <div  Class="container"  >


                <a href=""></a>


                
                
                
                </div>


            

            </div>
        
        
        
        </section>

        
        
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
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
            session_start();

            define("HEADER_admin","../content/header_admin.php",false);
            define("HEADER_user","../content/header_user.php",false);

            $headerin = $_SESSION['type'];
            if($headerin == "TP001"){

            require_once(HEADER_admin);

            
            }else if($headerin == "TP002"){

            require_once(HEADER_user);
            
            }
        ?>
    </Section>
        
        <section Class="ContentHome_M">
        
        <div Class="container">

        <?php

        include "../function/condb.php";

        $inwo = $_GET['lel'];
        $invec = $_GET['lel2'];

        $sql1 = " SELECT * FROM  work_order WHERE WOID = '$inwo' ";
        $res1 = mysqli_query($con,$sql1);
        $row1 = mysqli_fetch_assoc($res1);

        $sql2 = "SELECT * FROM Vehicle WHERE VihicleID = '$invec' "
        
        ?>

        

        <h1 Class="pt-3">Work Order ID : <b><?=$row1['WOID']?></b></h1>

        <hr>

        <h5>Vehicle ID : <b><?=$invec?></b></h5>



        

        
        
        </div>
           
            
        </section>       
        
    </body>

    <?php
        error_reporting(E_ALL ^ E_NOTICE);  
        error_reporting(E_ERROR | E_PARSE);
        
        if($user = $_SESSION['name']){
           
        }
        else  
            header('location:../index.php');
    ?>
</html>
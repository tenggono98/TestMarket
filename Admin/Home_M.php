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
        
            define("HEADER","../content/header_admin.php",false);

            require_once(HEADER);
            
        ?>
        </Section>
 
       <!--php atas gunanya buat jadi template -->
        
        <section Class="ContentHome_M">
            <div  Class="container"  >
                <center><h1>Profile</h1></center>

                <?php
                error_reporting(E_ALL ^ E_NOTICE);
                error_reporting(E_ERROR | E_PARSE);
                session_start();
                include "../Function/condb.php";
                $id = $_SESSION['id'];

                $sql = "SELECT * FROM STAFF where StaffID = '$id'";
                $res= mysqli_query($con,$sql);
                $row = mysqli_fetch_assoc($res);
                ?>

                <div class="text-center">
                    <img src="../img/davatar.png" class="img-thumbnail" Style="width:240px">
                    <h1><?= $row['StaffName']; ?></h1>
                </div>
                <hr>
                <div Class="text-left">
                    <?php
                        $rankin =  $row['STypeID'];
                        $rank_r = str_replace("TP001",Manager,$rankin);
                    ?>

                    <h3>Detail Profile</h3>
                    <h5>Rank     : <?= $rank_r?> </h5>
                    <h5>ID      : <?= $row['StaffID']; ?></h5>
                    <h5>Number  : <?= $row['StaffPNumber']; ?></h5>
                    <h5>Email   : <?= $row['StaffEmail']; ?></h5>
                    <h5>DOB     : <?= $row['StaffDOB']; ?></h5>
                </div>          
            </div> 
        </section>       
        
    </body>

    <?php
        error_reporting(E_ALL ^ E_NOTICE);  
        error_reporting(E_ERROR | E_PARSE);
        session_start();
        if($user = $_SESSION['name']){
            if(!$type = $_SESSION['type'] == "TP001" ){
                header('location:../Admin/Home_M.php');
            }
        }
        else  
            header('location:../index.php');
    ?>
</html>
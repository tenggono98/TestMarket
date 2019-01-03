<!doctype html>
<html lang="en">

  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 , shrink-to-fit=yes">

    <link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../mainstyle.css">

    <title>About</title>
  </head>

  <body>

    <section Class="Header">
    
      <?php

      define("HEADER", "../content/header_user.php", false);

      if (!file_exists(HEADER)) {
        throw new Exception("file not Found. Path: " . header);
      } else {
        require_once(HEADER);
      }

      ?>


    
    </section>

    <section Class="ContentHome_M">
        
      <div  Class="container" >


      <div  Class="container bg-light text-center pb-5   "  >
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
            <img src="../img/staff_pic/<?= $row['img'];?>" class=" rounded-circle shadow p-3 mb-5 bg-white rounded " height="150">
            <h1><?= $row['StaffName']; ?></h1>
      </div>
                
        <div Class="text-left border-3">
          <?php
              $rankin =  $row['STypeID'];
              $rank_r = str_replace("TP001",Manager,$rankin);
          ?>
          <h3 Class="pl-3 pt-2">Detail Profile</h3>
          
          
          <div class="container ml-3">
          <hr width="70%" align="left" >
          <h5>Rank     : <?= $rank_r?> </h5>
          <h5>ID      : <?= $row['StaffID']; ?></h5>
          <h5>Number  : <?= $row['StaffPNumber']; ?></h5>
          <h5>Email   : <?= $row['StaffEmail']; ?></h5>
          <h5>DOB     : <?= $row['StaffDOB']; ?></h5>
          </div>

      </div>     
      
      
      </div>
    </section>

   

  </body>

  <?php
    error_reporting(E_ALL ^ E_NOTICE);  
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    if($user = $_SESSION['name']){
       if($type = $_SESSION['type'] == "TP001"){
         header('location:../admin/home_M.php');
       }
    }
    else  
        header('location:../index.php');
    ?>

</html>



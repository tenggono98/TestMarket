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


        <center><h1>Profile</h1></center>

        <?php
          error_reporting(E_ALL ^ E_NOTICE);
          error_reporting(E_ERROR | E_PARSE);
          include "../Function/condb.php";
          session_start();
          $id = $_SESSION['id'];

          $sql = "SELECT * FROM STAFF where StaffID = '$id' ";
          $res= mysqli_query($con,$sql);
          $row = mysqli_fetch_assoc($res);
        ?>

        <div class="text-center">
            <img src="../img/staff_pic/<?= $row['img'];?>" Class="rounded" Style="width:240px; clip-path: circle(40% at 50% 50%);">
            <h1><?= $row['StaffName']; ?></h1>
        </div>
        <hr>
        <div Class="text-left">
          <?php
            $rankin =  $row['STypeID'];
            $rank_r = str_replace("TP002",Staff,$rankin);
          ?>

          <h3>Detail Profile</h3>
          <h5>Rank     : <?= $rank_r ?></h5>
          <h5>ID      : <?= $row['StaffID']; ?></h5>
          <h5>Number  : <?= $row['StaffPNumber']; ?></h5>
          <h5>Email   : <?= $row['StaffEmail']; ?></h5>
          <h5>DOB     : <?= $row['StaffDOB']; ?></h5>
        </div>

      </div>


    </section>

    <section class="footer">
      <div class="container pt-3">
        <div Class="footer">
          <div class="jumbotron jumbotron-fluid">
            <div class="container text-left">
              <p>Create By .Alfonso Tenggono</p>
            </div>
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
       
    }
    else  
        header('location:../index.php');
    ?>

</html>



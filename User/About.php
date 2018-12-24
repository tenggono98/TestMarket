<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="../mainstyle.css">

    <title>About</title>
  </head>
  <body>

    <div class="header">
    
    <?php
    session_start();
    define("HEADER_admin","../content/header_admin.php",false);
    define("HEADER_user","../content/header_user.php",false);
    $headerin = $_SESSION['type'];
    if($headerin == "TP001"){
   
    require_once(HEADER_admin);
    echo "admin";
    }else if($headerin == "TP002"){

        require_once(HEADER_user);
        echo "user";
    }
    ?>

    </div>
 
    <div class="content_index">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center">
                <img src="../img/davatar.png" class="rounded-circle" width="200" >

                <h1 class="display-4">Alfonso Tenggono</h1>
                <p class="lead">Mahasiswa Sistem Informasi Binus University</p>
            </div>
        </div>
  </div>
  

    <div class="container">
      <div class="row">
        <div class="col text-center">
            <h1>About</h1>
        </div>
      </div>

      <div class="row text-left">
          <div class="col">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Natus perspiciatis maxime molestias in temporibus enim nihil 
                sint neque ab, magni dolorum tempora, ad omnis a harum at, voluptates ex iusto!</p>
          </div>
          <div class="col">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                Rerum eveniet repellendus ab commodi, asperiores quidem. Consectetur
                 repellendus atque beatae aliquid magni error corrupti recusandae aliquam odio. 
                 Ipsa hic beatae nobis.</p>
          </div>

      </div>
    </div>
  
  

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
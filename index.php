<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="mainstyle.css">

    <title>About</title>
  </head>
  <body>
    

  <div class="Header">
  
    <?php

    define("HEADER", "content/header.php", false);

    if (!file_exists(HEADER)) {
        throw new Exception("file not Found. Path: " . header);
    } else {
        require_once(HEADER);
    }

    ?>
  
  
  </div>
  
  
  
  
<div class="content_index">


</div>
  
  
  <div Class="footer">

  <div class="jumbotron jumbotron-fluid">
        <div class="container text-left">
            <p class="lead">By .Alfonso Tenggono</p>
        </div>
    </div>
  </div>
  
  
  
  </div>
    



  




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
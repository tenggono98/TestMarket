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


    <div class="Header">

    

      <?php

      define("HEADER", "../content/header.php", false);

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
          <p>Create By .Alfonso Tenggono</p>
        </div>
      </div>
    </div>

    </div>

  </body>

</html>


php
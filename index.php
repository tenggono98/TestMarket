<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="mainstyle.css">
    <?php session_start(); ?>

 

  </head>
  
  <body>

    <section class="LoginPage">
      <table Class="LoginBorder" cellpadding="50px">
        <tr>
          <td>
            <div id="LoginContent">
              <form method="POST" action="">
                <div class="form-group">
                  <h1 class="LabelLogin">Email address</h1>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <h1 class="LabelLogin">Password</h1>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" name="btn" class="btn btn-primary">Login</button>
              </form>
            </div>
          </td>
        </tr>
    </table>
    
    </section>

  <?php

  if (isset($_POST['btn'])) {

    include "Function/condb.php";

    $inemail = $_POST['email'];
    $inpass = $_POST['pass'];


    $sql = "SELECT * FROM STAFF WHERE STAFFEMAIL = '$inemail' AND STAFFPASSWORD = '$inpass' ";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);

    $email = $row['StaffEmail'];
    $pass = $row['StaffPassword'];
    $name = $row['StaffName'];
    $type = $row['STypeID'];
    $id = $row['StaffID'];

    if ($inemail == "" && $inpass == "") {
      echo '<script language="javascript">';
      echo 'alert("Email dan Password Harus di Isi !")';
      echo '</script>';

    } else {

      if ($inemail == $email && $inpass == $pass) {
       
        
        if ($type == "TP001") {
          $_SESSION['name'] = $name;
          $_SESSION['type'] = $type;
          $_SESSION['id'] = $id;
          header('location:Admin/home_M.php');
        } else if ($type == "TP002") {
          $_SESSION['name'] = $name;
          $_SESSION['type'] = $type;
          $_SESSION['id'] = $id;
          header('location:User/home.php');
        }


      } else{
        echo '<script language="javascript">';
        echo 'alert("Email Atau Password Salah")';
        echo '</script>';
      }


    }

  }

  ?>
      
  </body>
 
</html>



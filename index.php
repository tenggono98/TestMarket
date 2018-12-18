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
          <td >
            <div  id="LoginContent">
              <form method="POST" action="">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" name="btn" class="btn btn-primary">Submit</button>
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

    if ($inemail == "" && $inpass == "") {
      echo "Email Dan Password Harus di Isi !!";
    } else {

      if ($inemail == $email && $inpass == $pass) {
        $_SESSION['name'] = $name;
        if ($type == "TP001") {
          header('location:Admin/home_M.php');
        } else if ($type == "TP002") {
          header('location:User/home.php');
        }


      } else
        echo "Email Atau Password Salah";
    }

  }

  ?>

    






      
  </body>
</html>


@meedi
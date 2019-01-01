


<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Customer</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../mainstyle.css">
    
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

        <section Class="Contentitem_M">


                <div  Class="container"  >
                <h1>Register Vehicle Customer</h1>
                
                <hr>
                <?php
                include "../function/condb.php";
                include "../function/autogen_allid.php";
                $selectedin = $_GET['lel'];
                $autovecid = autogen_vehicleid();   
                

                $sql1 = "SELECT * FROM customer WHERE CustomerID = '$selectedin' ";
                $res = mysqli_query($con,$sql1);
                $row = mysqli_fetch_assoc($res);

                ?>

                <br><h2>Selected Customer : <?= $selectedin ?></h2>
            <form action="" method="POST">
                <br>
                <label >Customer ID </label><br>
                <input type="text" name="cusid" value="<?= $row['CustomerID'];?>" readonly ><br>
                <br>
                <label >Customer Name</label><br>
                <input type="text" name="cusname" value="<?= $row['CustomerName'];?>" readonly ><br>
                <br>
                <label >Vehicle ID </label><br>
                <input type="text" name="vecid" value="<?= $autovecid?>" readonly ><br>
                <label>Type Vehicle</label><br>
                <Select name="type">
                    <option value="VT001">Car</option>
                    <option value="VT002">Motorcycle</option>
                </Select><br>
                <br>
                <input type="submit" name="btn" value="Submit">
            </form>
        </div>



        </section>
        <?php
        
        if(isset($_POST['btn'])){
            

            include "../function/condb.php";

            $cusid = $_POST['cusid'];
            $cusname = $_POST['cusname'];
            $vecid = $_POST['vecid'];
            $vectype = $_POST['type'];

            $sql = "INSERT INTO vehicle(VehicleID,CustomerID,VtypeID) VALUES ('$vecid','$cusid','$vectype') ";
            $res = mysqli_query($con,$sql);

            if($res){
                echo "<script>
                alert('Data Vehicle Sudah di simpan');
                </script>";
                echo "<meta http-equiv = 'refresh' content='0 url=../user/Customer.php' >";
            }
            else{
                echo "<script>
                alert('Data Vehicle Tidak bisa di simpan');
                </script>";
               echo mysqli_error($con);
            }
            
        
        }
        
        ?>
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
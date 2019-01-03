


<!DOCTYPE html>
<html>
<head>
    <title>Tambah Customer</title>
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

                <h1>Register Customer</h1>

                <hr>

                <h5>Data Customer</h5>

                <?php
                
                include "../function/autogen_allid.php";
                $autocusid = autogen_cusid();      
                ?>
            <form action="" method="POST">
                <label >ID Customer </label><br>
                <input type="text" name="id" value="<?= $autocusid ?>" readonly><br>
                <br>
                <label >Customer Name </label><br>
                <input type="text" name="name" required><br>
                <br>
                <label >Customer Phone Number</label><br>
                <input type="number" name="pnum" required><br>
                <br>
                <label >Customer Email </label><br>
                <input type="email" name="email" required><br>
                <br>
                <input type="submit" name="btn" value="Submit">
            </form>
        </div>



        </section>
        <?php
        
        if(isset($_POST['btn'])){

            include "../function/condb.php";
            $cusid = $_POST['id'];
            $cusname = $_POST['name'];
            $cuspnum = $_POST['pnum'];
            $cusemail = $_POST['email'];
            $createdate = date("Y/m/d");
            $sql = "INSERT INTO customer(CustomerID,CustomerName,CustomerPNumber,CustomerEmail,DateCreate) VALUES ('$cusid','$cusname','$cuspnum','$cusemail','$createdate') ";
            $res = mysqli_query($con,$sql);

            if($res){
                echo "<script>
                alert('Data Customer Sudah di simpan');
                </script>";
                echo "<meta http-equiv = 'refresh' content='0 url=../user/Customer.php' >";
            }
            else{
                echo "<script>
                alert('Data Customer Tidak bisa di simpan');
                </script>";
            
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
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Item</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="../js/bootbox.min.js"></script>
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
    echo "admin";
    }else if($headerin == "TP002"){

        require_once(HEADER_user);
        echo "user";
    }
    ?>

    </Section>

    <Section Class="ContentEdit_staff">



        
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(E_ERROR | E_PARSE);
        session_start();
        $inID= $_GET[lel];
        
        include "../Function/condb.php";

        

        $sql = "Select * FROM Work_order where WOID= '$inID' ";
        $res = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($res);
        
        ?>
    
        
        <div class="container">

            <h1>Edit Work Order</h1>
            <form  method="POST" >
                    <Label >Work Order ID</Label><br>
                    <input type="text" name="id" value="<?= $row['WOID'];?>" readonly><br>
    
                    <Label>Vehicle ID</Label><br>
                    <input type="text" name="idv" value="<?= $row['VehicleID'];?>"readonly><br>
                    
                    <Label>Date</Label><br>
                    <input type="text" name="date" value="<?= $row['WODateTime'];?>" readonly><br>

                    <Label>Order Desc</Label><br>
                    <textarea name="desc" id="" cols="30" rows="4"><?= $row['OrderDescription'];?></textarea><br>

                    <br>
                    <input type="submit" value="Submit" data-toggle="modal" data-target="#exampleModal" name="sub" >
                    <input type="submit" value="Back" name="back" >
                </form>
        </div>

    </Section>


    

    <?php
    
        if(isset($_POST['sub'])){
            $id = $_POST['id'];
            $idv = $_POST['idv'];
            $desc = $_POST['desc'];
          

            $sql = "UPDATE work_order SET OrderDescription='$desc' where  WOID='$id' ";
            $res = mysqli_query($con, $sql);


         
            if ($res) {
                
                echo '<script language="javascript">';
                echo 'alert("Data Berhasil di Update !")';
                echo '</script>';
                echo "<meta http-equiv = 'refresh' content='0 url=../user/wo.php' >";
            } else{
                echo '<script language="javascript">';
                echo 'alert("Data Tidak bisa di Edit !")';
                echo '</script>';
            }
        }

        if(isset($_POST['back'])){
            Header("location:../user/wo.php");
        }

    ?>

    </body>
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(E_ERROR | E_PARSE);
       
        if ($username = $_SESSION['name']) {
        
        } else
            header("location:../index.php");
        ?> 
</html>
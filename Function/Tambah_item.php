<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Item</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../mainstyle.css">
</head>
    <body>

    <Section class="Header">

    <?php

    define("HEADER","../content/header_admin.php",false);

    require_once(HEADER);

    ?>

    </Section>

    <Section Class="ContentEdit">



        
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(E_ERROR | E_PARSE);
        $inID= $_GET[lel];
        
        include "../Function/condb.php";

        

        $sql = "Select ItemID,ItemName,ItemStock,ItemPrice,ItemDescription FROM item where ItemID = '$inID' ";
        $res = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($res);
        
        ?>

        
        <div class="container">

        <h1>Tambah Item</h1>

        <form action="" method="POST">
            <Label>Item ID</Label><br>
            <input type="text" name="id"><br>
            
            <Label>Name</Label><br>
            <input type="text" name="name" ><br>
            
            <Label>Stock</Label><br>
            <input type="text" name="stock" ><br>
            
            <Label>Price</Label><br>
            <input type="text" name="price" ><br>
            
            <Label>Desc</Label><br>
            <textarea name ="desc"cols=50 rows=5></textarea><br> 
            <br>
            <input type="submit" value="Submit" data-toggle="modal" data-target="#exampleModal" name="sub" >
            <input type="submit" value="Back" name="back" >
        </form>
        </div>

    </Section>

    <?php
        if(isset($_POST['sub'])){

            include "../Function/condb.php";
           
            $id = $_POST['id'];
            $name = $_POST['name'];
            $stock = $_POST['stock'];
            $price = $_POST['price'];
            $desc = $_POST['desc'];


            $sql = "INSERT INTO ITEM(ItemID,ItemName,ItemStock,ItemPrice,ItemDescription) VALUES ('$id','$name','$stock','$price','$desc')  ";
            $res = mysqli_query($con, $sql);

            if ($res) {
                if(isset($_POST['sub'])){
            
                echo '<script language="javascript">';
                echo 'alert("Data sudah di simpan")';
                echo '</script>';

                
               echo "<meta http-equiv = 'refresh' content='1 url=../Admin/Item_M.php' >";
                }
            } else
                echo '<script language="javascript">';
                echo 'alert("Data Tidak bisa di simpan Mohon untuk Cek lagi datanya !")';
                echo '</script>';


        }

        if(isset($_POST['back'])){
            Header("location:../Admin/Item_M.php");
        }

    ?>

    
    <?php
    error_reporting(E_ALL ^ E_NOTICE);

    session_start();

    if ($username = $_SESSION['name']) {
        
    } else
        header("location:../index.php");


    ?>


    </body>
</html>
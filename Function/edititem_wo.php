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
        $INitem = $_GET['lel'];
        $INwoid = $_GET['lel2'];
        
        include "../Function/condb.php";

        

        $sql = "Select sales_detail.WOID as WOID , 
        sales_detail.ItemID as ItemID , 
        sales_detail.Quantity as Quantity , 
        item.ItemStock as stock 
        FROM sales_detail join item on sales_detail.ItemID = item.ItemID where sales_detail.ItemID= '$INitem' AND WOID = '$INwoid' ";
        
        $res = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($res);
        
        ?>
    
        
        <div class="container">

            <h1>Edit Item Work Order</h1>
            <form  method="POST" >
                    <Label> Work Order ID </Label><br>
                    <input type="text" name="idwo" value="<?= $row['WOID'];?>" readonly><br>
    
                    <Label>Item ID</Label><br>
                    <input type="text" name="iditem" value="<?= $row['ItemID'];?>"readonly><br>
                    
                    <Label>Qty</Label><br>
                    <input type="text" name="qty" pattern="^(\d{1}|\d{4})$" value="<?= $row['Quantity'];?>" > /Qty Total : <?= $row['stock'];?>  <br>


                    <br>
                    <input type="submit" value="Submit" data-toggle="modal" data-target="#exampleModal" name="sub" >
                    <input type="submit" value="Back" name="back" >
                </form>
        </div>

    </Section>


    

    <?php
    
        if(isset($_POST['sub'])){
            $idwo = $_POST['idwo'];
            $iditem = $_POST['iditem'];
            $qty = $_POST['qty'];

           
            
            $awalqty = $row['Quantity'];
            $stock = $row['stock'];
            
            
            //calkulasi return or take
            //take
            if($qty >=  $awalqty){
                $totalqty = ($qty-$awalqty);                           
                $totalkembali = ( $stock - $totalqty );

            //Return
            }else if($qty   <=  $awalqty){
                //Kalau input value 0
                if( $totalqty = 0){
                    $totalkembali = ($totalqty + $stock);
                
                }else{
                    $totalqty = ($awalqty - $qty);
                    $totalkembali = ($totalqty + $stock);
                }
                
            }
          

            $sql1 = "UPDATE sales_detail SET Quantity='$qty' where  WOID='$idwo' AND itemID = '$iditem' ";
            $sql2 = "UPDATE item SET ItemStock = '$totalkembali' Where itemID = '$iditem' ";
            $res = mysqli_query($con, $sql1);
            $res = mysqli_query($con, $sql2);


         
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





<?php
//debug
//  echo "inqty <br>". var_dump($qty);
//  echo "awalqty<br>".var_dump($awalqty);
//  echo "stockdb<br>". var_dump( $stock);
//  echo "hasil kurang in - awal<br>". var_dump( $totalqty);
 
//  echo "hasil db-/+ stock<br>". var_dump($totalkembali);

?>
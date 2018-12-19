<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Item</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
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

        <h1>Edit Item</h1>

        <Label>Item ID</Label><br>
        <input type="text" name="id" value="<?=$row['ItemID'];?>" disabled><br>
        
        <Label>Name</Label><br>
        <input type="text" name="name" value="<?=$row['ItemName'];?>"><br>
        
        <Label>Stock</Label><br>
        <input type="text" name="stock" value="<?=$row['ItemStock'];?>"><br>
        
        <Label>Price</Label><br>
        <input type="text" name="price" value="<?=$row['ItemPrice'];?>"><br>
        
        <Label>Desc</Label><br>
        <textarea cols=50 rows=5> <?=$row['ItemDescription'];?></textarea><br> 
        <br>
        <input type="submit" value="Submit" name="sub" >
        <input type="submit" value="Back" name="back" >



        </div>

    </Section>




    </body>
</html>
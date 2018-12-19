<!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

<section Class="Contentitem_M">


        <div  Class="container"  >


        <h1>Item List</h1>

        <hr>

        <div style=" padding-bottom:1%;">
            <button ><a href="../Admin/Tambah_item.php">Tambah Item</a></button><br>
        </div>
        

       
        
    
        <table class="table">
            <thead>
                <th>No</th>
                <th>ID</th>
                <th>Name</th>
                <th>desc</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Control</th>

            </thead>
            <?php

        include "../Function/condb.php";

        $sql = "Select * from item";
        $res = mysqli_query($con,$sql);
        $no=0;

        While($row= mysqli_fetch_assoc($res)){
                $no++
                ?>

            <tbody>
                <tr>
                    <td><?= $no?></td>
                    <td><?= $row['ItemID'];?></td>
                    <td><?= $row['ItemName'];?></td>
                    <td><?= $row['ItemDescription'];?></td>
                    <td><?= $row['ItemStock'];?></td>
                    <td><?= $row['ItemPrice'];?></td>
                    <td>
                    <button><a href="../Function/Edit_item.php?lel=<?=$row['ItemID']; ?>">Edit</a></button>
                    <button><a href="../Function/Del_item.php?lel=<?=$row['ItemID']; ?>">Delete</a></button>
                    

                    </td>

                </tr>

        <?php

        }

        ?>

            </tbody>
        </table>


        
        
        
    </div>


    

   



</section>

    
</body>
</html>
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
<script>

 window.onbeforeunload = confirmExit;
 function confirmExit()
  {
    return "lel";
  }
 

</script>

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

    <Section Class="ContentEdit">
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(E_ERROR | E_PARSE);
        include "../Function/condb.php";
        include "../Function/autogen_allid.php";

        $autoiditem = autogen_itemid();
        

        $inpID= $_GET[lel];
        
        
        
       
        $sql = "Select * FROM vendor";
        $res = mysqli_query($con,$sql);
        
        
        ?>
        
        <div class="container">
            <h1>Tambah Item</h1>
            <button><a href="../function/Tambah_vendor.php">Tambah Vendor</a></button>
                <form  method="POST" data-toggle="validator" role="form">
                <?php
                    echo "<lable>Select Vendor ID</lable><br>";
                    echo "<select name='vendorid'>";
                    while($row = mysqli_fetch_array($res)){
                        echo '<option value="'.$row['VendorID'].'">'.$row['VendorID'].'</option>';
                        
                    }
                    echo "</select><br>";


                    ?>
                    <br>
                    <Label>Purchase ID</Label><br>
                    <input type="text" name="idp" value="<?= $inpID?>"  readonly><br>


                    <Label>Item ID</Label><br>
                    <input type="text" name="iditem" value="<?= $autoiditem ?>" readonly><br>
                    
                    <Label>Name</Label><br>
                    <input type="text" name="name" required><br>
                    
                    <Label>Stock</Label><br>
                    <input type="text" name="stock" required><br>
                    
                    <Label>Price</Label><br>
                    <input type="text" name="price" required><br>
                    
                    <Label>Purchase Date</Label><br>
                    <input type="date" name="pdate"required><br> 
                    <br>

                    <Label>Desc</Label><br>
                    <textarea name ="desc"cols=50 rows=5 required></textarea><br> 
                    <br>
                    
                    <input type="submit" value="Submit" name="submit" >

                </form>


                


        </div>
    </Section>

    <?php
        
        if(isset($_POST['submit'])){
            include "../Function/condb.php";
           
            $iditem = $_POST['iditem'];
            $vendorid = $_POST['vendorid'];
            $idp = $_POST['idp'];
            $name = $_POST['name'];
            $stock = $_POST['stock'];
            $price = $_POST['price'];
            $desc = $_POST['desc'];
            $dateP = $_POST['pdate'];



            
            $sql1 = "INSERT INTO ITEM(ItemID,ItemName,ItemStock,ItemPrice,ItemDescription) VALUES ('$iditem','$name','$stock','$price','$desc') ";
            $sql2 = "INSERT INTO purchase_header(PurchaseID,VendorID,PurchaseDateTime) VALUES ('$idp','$vendorid','$dateP')";
            $sql3 = "INSERT INTO purchase_detail(PurchaseID,ItemID,Quantitiy) VALUES ('$idp','$iditem','$stock') ";
            $res1 = mysqli_query($con, $sql1);
            $res1 = mysqli_query($con, $sql2);
            $res1 = mysqli_query($con, $sql3);
            
            if($res1) {
                echo "<script>
                alert('Data Sudah di simpan !');
                </script>";
                echo" <meta http-equiv = 'refresh' content='0 url=../Function/Tambah_item.php?lel=$inpID' >";
  
            }else
                return false;
        
        
        }
          
    ?>

    </body>
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(E_ERROR | E_PARSE);
        session_start();
        if ($username = $_SESSION['name']) {
            
        } else
            header("location:../index.php");
        ?>
</html>
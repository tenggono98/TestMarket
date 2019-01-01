<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Vendor</title>
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
        
        
        include "../Function/condb.php";
        $inID= $_GET[lel];
        

        $sql = "Select * FROM vendor where VendorID= '$inID' ";
        $res = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($res);
        
        ?>
    
        
        <div class="container">

            <h1>Edit Vendor</h1>
            <form  method="POST" >
                    <Label >Vendor ID</Label><br>
                    <input type="text" name="id" value="<?= $row['VendorID'];?>" readonly><br>
    
                    <Label>Vendor Name</Label><br>
                    <input type="text" name="venname" value="<?= $row['VendorName'];?>"><br>
                    
                    <Label>Vendor PIC Name</Label><br>
                    <input type="text" name="picname" value="<?= $row['VendorPICName'];?>" ><br>

                    <Label>Vendor PIC Number</Label><br>
                    <input name="number" id="picnum" value="<?= $row['VendorPICPNumber'];?>"><br>

                    <Label>Vendor PIC Email</Label><br>
                    <input type="email" name="picemail" value="<?= $row['VendorPICEmail'];?>" ><br>

                    <br>
                    <input type="submit" value="Submit" data-toggle="modal" data-target="#exampleModal" name="sub" >
                    <input type="submit" value="Back" name="back" >
                </form>
        </div>

    </Section>


    

    <?php
    
        if(isset($_POST['sub'])){
            $id = $_POST['id'];
            $venname = $_POST['venname'];
            $picname = $_POST['picname'];
            $picnum = $_POST['picnum']; 
            $picemail = $_POST['picemail'];
          

            $sql = "UPDATE vendor SET VendorName='$venname', VendorPICName = '$picname' , VendorPICPNumber = '$picnum' , VendorPICEmail = '$picemail'  where  VendorID='$id' ";
            $res = mysqli_query($con, $sql);


         
            if ($res) {
                
                echo '<script language="javascript">';
                echo 'alert("Data Vendor Berhasil di Update !")';
                echo '</script>';
                echo "<meta http-equiv = 'refresh' content='0 url=../function/Tambah_vendor.php' >";
            } else{
                echo '<script language="javascript">';
                echo 'alert("Data Vendor Tidak bisa di Edit !")';
                echo '</script>';
                echo mysqli_error($con);
            }
        }

        if(isset($_POST['back'])){
            Header("location:../function/Tambah_vendor.php");
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
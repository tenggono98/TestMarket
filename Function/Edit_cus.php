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

    <Section Class="ContentEdit">



        
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(E_ERROR | E_PARSE);
        $inID= $_GET[lel];
        
        include "../Function/condb.php";

        

        $sql = "Select * FROM Customer where CustomerID = '$inID' ";
        $res = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($res);
        
        ?>

        
        <div class="container">

            <h1>Edit Item</h1>
                <form action="" method="POST">
                    <Label>Customer ID</Label><br>
                    <input type="text" name="id" value="<?=$row['CustomerID'];?>" readonly><br>
                    
                    <Label>Customer Name</Label><br>
                    <input type="text" name="name" value="<?=$row['CustomerName'];?>"><br>
                    
                    <Label>Customer Phone Number </Label><br>
                    <input type="number" name="num" value="<?=$row['CustomerPNumber'];?>"><br>
                    
                    <Label>Email</Label><br>
                    <input type="email" name="email" value="<?=$row['CustomerEmail'];?>"><br>
                    

                    <br>
                    <input type="submit" value="Submit" name="sub" >
                    <input type="submit" value="Back" name="back" >
                </form>
        </div>

    </Section>


    

    <?php
    
        if(isset($_POST['sub'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $num = $_POST['num'];
            $email = $_POST['Email'];
            

            $sql = "UPDATE customer SET CustomerName='$name',CustomerPNumber = '$num',CustomerEmail= '$email' where  ItemID='$id' ";
            $res = mysqli_query($con, $sql);

            if ($res) {
                
                echo '<script language="javascript">';
                echo 'alert("Data Berhasil di Update !")';
                echo '</script>';
                echo "<meta http-equiv = 'refresh' content='0 url=../user/Customer.php' >";
            } else{
                echo '<script language="javascript">';
                echo 'alert("Data Tidak bisa di Edit !")';
                echo '</script>';
            }
        }

        if(isset($_POST['back'])){
            Header("location:../user/Customer.php");
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
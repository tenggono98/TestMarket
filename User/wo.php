


<!DOCTYPE html>
<html>
<head>
    <title>Work Order</title>
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
    echo "admin";
    }else if($headerin == "TP002"){

        require_once(HEADER_user);
        echo "user";
    }


    ?>
    </Section>

    <section Class="Contentitem_M">


            <div  Class="container"  >

            <h1>Work Order</h1>

            <hr>

            <?php
            include "../function/condb.php";
            $sql = "SELECT CustomerID FROM customer  ";
            $res = mysqli_query($con,$sql);
            
           
           ?>

            <h5>Select Customer Code</h5>
            
            <label >ID Customer </label><br>
     

            <form action="" method="POST">
            <?php 
            include "../function/autogen_allid.php"; 
            $autogenidvec = autogen_vehicleid();
            $autogenidwo = autogen_woid();
            $datenow =  date("Y/m/d");
            $idstaff= $_SESSION['id'];
            
            echo "<select name='cusid'>";
            while($row = mysqli_fetch_array($res)){
                echo '<option value="'.$row['CustomerID'].'">'.$row['CustomerID'].'</option>';
                
            }
            echo "</select>";
    
            
            ?>
            <br>
                <label>WO ID</label><br>
                <input type="text" name="idwo" value="<?=$autogenidwo?>"  readonly><br>
                <br>
                <label>Vehicle ID</label><br>
                <input type="text" name="id" value="<?=$autogenidvec?>"  readonly><br>
                <br>
                <label>Type Vehicle</label><br>
                <Select name="type">
                    <option value="VT001">Car</option>
                    <option value="VT002">Motorcycle</option>
                </Select><br>
                <br>
                <label>Vehicle Note</label><br>
                <textarea name="note" placeholder="Vehicle Notes"></textarea><br>
                <br>
                <label>Order Desc</label><br>
                <textarea name="desc" placeholder="Desc Of Order"></textarea><br>
                <input type="hidden" name="date" value="<?= $datenow ?>">
                <input type="submit" name="btn" value="Submit">
            </form> 
    </div>
    </section>

        <?php
        if(isset($_POST['btn'])){

        include "../function/condb.php";
        $woid = $_POST['idwo'];
        $vecid = $_POST['id'];
        $cusid = $_POST['cusid'];
        $vectype = $_POST['type'];
        $vecnote = $_POST['note'];
        $descorder = $_POST['desc'];
        $datenow = $_POST['date'];

        $sqlvehicle = "INSERT INTO vehicle(VehicleID,CustomerID,VTypeID,Notes) VALUES('$vecid','$cusid','$vectype','$vecnote')";
        $sqldetail = "INSERT INTO wo_detail(StaffID,WOID) VALUES ('$idstaff','$woid')";
        $sqlwo = "INSERT INTO work_order(WOID,VehicleID,WODateTime,OrderDescription) VALUES('$woid','$vecid','$datenow','$descorder')";
        $res1 = mysqli_query($con,$sqlvehicle);
        $res2  = mysqli_query($con,$sqldetail);
        $res3= mysqli_query($con,$sqlwo);
        
            if($res1){               
                if($res2){
                    if($res3){
                        echo "
                    <script>
                        alert('Wo dan Vehicle Data Berhasil di Simpan');
                    </script>
                ";
                    }
                }
            }
            else{
                echo "
                <script>
                    alert('Wo dan Vehicle Data gaggal di Simpan');
                </script>
                ";
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
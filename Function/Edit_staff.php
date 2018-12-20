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

    define("HEADER","../content/header_admin.php",false);

    require_once(HEADER);

    ?>

    </Section>

    <Section Class="ContentEdit_staff">



        
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(E_ERROR | E_PARSE);
        $inID= $_GET[lel];
        
        include "../Function/condb.php";

        

        $sql = "Select * FROM staff where StaffID = '$inID' ";
        $res = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($res);
        
        ?>

        
        <div class="container">

            <h1>Edit Staff</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                    <Label >Staff ID</Label><br>
                    <input type="text" name="id" value="<?= $row['StaffID'];?>" readonly><br>
                    
                    <?php
                        error_reporting(E_ALL ^ E_NOTICE);  
                        error_reporting(E_ERROR | E_PARSE);
                        $rankin =  $row['STypeID'];
                        if($rankin == "TP001"){
                        $rank_r = str_replace("TP001",Manager,$rankin);
                        }
                        else if($rankin == "TP002")
                        $rank_r = str_replace("TP002",Staff,$rankin);
                    ?>


                    <Label >Staff Type</Label><br>
                    <Select name="type" value="<?= $rank_r;?>">
                        <option value="TP001">Manager</option>
                        <option value="TP002">Staff</option>
                    </Select><br>
                    
                    <Label>Staff Name</Label><br>
                    <input type="text" name="name" value="<?= $row['StaffName'];?>"><br>
                    
                    <Label>Staff Phone Number</Label><br>
                    <input type="text" name="num" value="<?= $row['StaffPNumber'];?>"><br>

                    <Label>Staff Email</Label><br>
                    <input type="email" name="email" value="<?= $row['StaffEmail'];?>"><br>

                    <Label>Staff Password</Label><br>
                    <input type="password" name="pass"value="<?= $row['StaffPassword'];?>" ><br>

                    
                    <Label>DOB</Label><br>
                    <input type="date" name="date" value="<?= $row['StaffDOB'];?>"><br>

                    <Label>Salary</Label><br>
                    Rp. <input type="number" name="gaji" value="<?= $row['StaffSalary'];?>"><br>
    
                    <br>
                    <input type="submit" value="Submit" data-toggle="modal" data-target="#exampleModal" name="sub" >
                    <input type="submit" value="Back" name="back" >
                </form>
        </div>

    </Section>


    

    <?php
    
        if(isset($_POST['sub'])){
            $id = $_POST['id'];
            $type = $_POST['type'];
            $name = $_POST['name'];
            $numer = $_POST['num'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $date = $_POST['date'];
            $salary = $_POST['gaji'];

            $sql = "UPDATE staff SET STypeID='$type',StaffName='$name',StaffPNumber = '$numer',StaffEmail= '$email',
            StaffPassword = '$pass', StaffDOB = '$date', StaffSalary= '$salary' where  StaffID='$id' ";
            $res = mysqli_query($con, $sql);


            //staff(StaffId,STypeID,StaffName,StaffPNumber,StaffEmail,StaffPassword,StaffDOB,StaffSalary
            if ($res) {
                
                echo '<script language="javascript">';
                echo 'alert("Data Berhasil di Update !")';
                echo '</script>';
                echo "<meta http-equiv = 'refresh' content='0 url=../Admin/Staff_M.php' >";
            } else{
                echo '<script language="javascript">';
                echo 'alert("Data Tidak bisa di Edit !")';
                echo '</script>';
            }
        }

        if(isset($_POST['back'])){
            Header("location:../Admin/staff_M.php");
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
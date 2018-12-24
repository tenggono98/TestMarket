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
    <?php
    include "../Function/autogen_allid.php";
    $autoidstaff = autogen_staffid();
    ?>
    <Section Class="ContentTambah_Staff">
       
        <div class="container">
            <h1>Tambah Staff</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <Label >Staff ID</Label><br>
                    <input type="text" name="id" value="<?=$autoidstaff?>" readonly><br>
                    
                    <Label >Staff Type</Label><br>
                    <Select name="type">
                        <option value="TP001">Manager</option>
                        <option value="TP002">Staff</option>
                    </Select><br>
                    
                    <Label>Staff Name</Label><br>
                    <input type="text" name="name" ><br>
                    
                    <Label>Staff Phone Number</Label><br>
                    <input type="text" name="num" ><br>

                    <Label>Staff Email</Label><br>
                    <input type="email" name="email" ><br>

                    <Label>Staff Password</Label><br>
                    <input type="password" name="pass" ><br>

                    
                    <Label>DOB</Label><br>
                    <input type="date" name="date" ><br>

                    <Label>Salary</Label><br>
                    Rp. <input type="number" name="gaji" ><br>

                    <Label>Picture</Label><br>
                    <input type="file" name="pic" ><br>
    
                    <br>
                    <input type="submit" value="Submit" data-toggle="modal" data-target="#exampleModal" name="sub" >
                   
                </form>
        </div>
    </Section>

    <?php
        if(isset($_POST['sub'])){

           

            include "../Function/condb.php";
           
            $id = $_POST['id'];
            $type = $_POST['type'];
            $name = $_POST['name'];
            $numer = $_POST['num'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $date = $_POST['date'];
            $salary = $_POST['gaji'];

           

            $pic = upload();

            // if(!$pic){
            //     return false;
            // }


            $sql = "INSERT INTO staff(StaffId,STypeID,StaffName,StaffPNumber,StaffEmail,StaffPassword,StaffDOB,StaffSalary,img) 
            VALUES ('$id','$type','$name','$numer','$email','$pass','$date','$salary','$pic')  ";
            $res = mysqli_query($con, $sql);

            if ($res) {
                if(isset($_POST['sub'])){
                echo '  <script language="javascript">;
                            alert("Data sudah di simpan");
                        </script>';
                echo "<meta http-equiv = 'refresh' content='0 url=../Admin/staff_M.php' >";
                }
            } else
                echo '<script language="javascript">';
                echo 'alert("Data Tidak bisa di simpan Mohon untuk Cek lagi datanya !")';
                echo '</script>';
        }

       

        function upload(){
            $namefile = $_FILES['pic']['name'];
            $sizefile = $_FILES['pic']['size'];
            $error = $_FILES['pic']['error'];
            $tempName = $_FILES['pic']['tmp_name'];


            if($error === 4){
                echo "<script>
                        alert('Select Picture !');
                    </script>";
                return false;
            }
            //Masih Belum bisa (Validasi tipefile)
            // $validformatpic = ['jpg','png','jpeg'];
            // $formatpic = explode('.','$namefile');
            // $formatpic = strtolower(end($formatpic));
            
            // if(!in_array($formatpic,$validformatpic)){
            //     echo "  <script>
            //              alert('Not a Picture');
            //             </script>";
                        

            // }

            if($sizefile > 2000000){
                echo "  <script>
                alert(' Picture Size to Big max:20MB');
               </script>";
            }

            move_uploaded_file($tempName,'../img/staff_pic/'.$namefile);

            return $namefile;
        }

    ?>

    

 <?php
        error_reporting(E_ALL ^ E_NOTICE);  
        error_reporting(E_ERROR | E_PARSE);
        session_start();
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
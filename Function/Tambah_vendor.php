<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tambah Vendor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
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

    <Section Class="ContentEdit">
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(E_ERROR | E_PARSE);
        $inID= $_GET[lel];
        
        include "../Function/condb.php";
        include "../Function/autogen_allid.php";

       
        $autoidvendor = autogen_vendorid();

        ?>
        <br>
        <table class="table table-hover table-bordered results" >
            <div class="form-group pull-right">
                <input type="text" class="search form-control" placeholder="What you looking for?">
            </div>
            <br>
                <thead>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>PIC Name</th>
                    <th>PIC Number</th>
                    <th>Email</th>
                    <th>Control</th>

                </thead>
            
            <?php

            include "../Function/condb.php";

            $sql = "Select * from vendor";
            $res = mysqli_query($con,$sql);
            $no=0;

            While($row= mysqli_fetch_assoc($res)){
                    $no++
            ?>
                <tbody>
                    <tr>
                        <td><?= $no?></td>
                        <td><?= $row['VendorID'];?></td>
                        <td><?= $row['VendorName'];?></td>
                        <td><?= $row['VendorPICName'];?></td>
                        <td><?= $row['VendorPICPNumber'];?></td>
                        <td><?= $row['VendorPICEmail'];?></td>
                        <td>
                        <button><a href="../Function/Edit_item.php?lel=<?=$row['VendorID']; ?>">Edit</a></button>
                        <button><a href="../Function/Del_item.php?lel=<?=$row['VendorID']; ?>">Delete</a></button>
                        </td>
                    </tr>
            <?php
            }
            ?>
                </tbody>
            </table>

        
        <div class="container">
            <h1>Tambah Vendor</h1>
                <form action="" method="POST">
                    <Label>Vendor ID</Label><br>
                    <input type="text" name="id" value="<?= $autoidvendor ?>" readonly><br>
                    
                    <Label>Vendor Name</Label><br>
                    <input type="text" name="name" ><br>

                    <Label>Vendor PIC Name</Label><br>
                    <input type="text" name="namePIC" ><br>
                    
                    <Label>Vendor Phone Number</Label><br>
                    <input type="number" name="num" ><br>
                    
                    <Label>Vendor Email</Label><br>
                    <input type="email" name="email" ><br>
                    
                    <br>
                    
                    <input type="submit" value="Submit" data-toggle="modal" data-target="#exampleModal" name="sub" >
        
                </form>
        </div>
    </Section>

    <?php
        if(isset($_POST['sub'])){

            include "../Function/condb.php";
           
            $id = $_POST['id'];
            $name = $_POST['name'];
            $namePIC = $_POST['namePIC'];
            $number = $_POST['num'];
            $email = $_POST['email'];


            $sql = "INSERT INTO Vendor(VendorID,VebdorName,VendorPICName,VendorPICPNumber,VendorPICEmail) VALUES ('$id','$name','$namePIC','$number','$email')  ";
            $res = mysqli_query($con, $sql);

            if ($res) {
                if(isset($_POST['sub'])){
            
                echo '<script language="javascript">';
                echo 'alert("Data Vendor sudah di simpan")';
                echo '</script>';
                echo "<meta http-equiv = 'refresh' content='0 url=../Function/Tambah_Item.php' >";
                }
            } else
                echo '<script language="javascript">';
                echo 'alert("Data Tidak bisa di simpan Mohon untuk Cek lagi datanya !")';
                echo '</script>';
        }

      
    ?>

<script>
            $(document).ready(function() {
            $(".search").keyup(function () {
                var searchTerm = $(".search").val();
                var listItem = $('.results tbody').children('tr');
                var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
                
            $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });
                
            $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
                $(this).attr('visible','false');
            });

            $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
                $(this).attr('visible','true');
            });

            var jobCount = $('.results tbody tr[visible="true"]').length;
                $('.counter').text(jobCount + ' item');

            if(jobCount == '0') {$('.no-result').show();}
                else {$('.no-result').hide();}
                    });
            });
        </script>

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
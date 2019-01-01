


<!DOCTYPE html>
<html>
<head>
    <title>Customer</title>
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

            <h1>Customer List</h1>

            <hr>

            <div Class="btn_top" style=" padding-bottom:1%;">
                <button ><a href="../Function/Tambah_cus.php">Tambah Customer</a></button>
            </div>

          
            <table class="table table-hover table-bordered results" >
            <div class="form-group pull-right">
                <input type="text" class="search form-control" placeholder="What you looking for?">
            </div>
            <br>
                <thead>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Member Since</th>
                    <th>Control</th>

                </thead>
            
            <?php

            include "../Function/condb.php";

            $sql = "Select * from customer";
            $res = mysqli_query($con,$sql);
            $no=0;

            While($row= mysqli_fetch_assoc($res)){
                    $no++
            ?>
                <tbody>
                    <tr>
                        <td><?= $no?></td>
                        <td><?= $row['CustomerID'];?></td>
                        <td><?= $row['CustomerName'];?></td>
                        <td><?= $row['CustomerPNumber'];?></td>
                        <td><?= $row['CustomerEmail'];?></td>
                        <td><?= $row['DateCreate'];?></td>
                        <td>  
                        <button><a href="../function/Edit_cus.php?lel=<?=$row['CustomerID'];?>">Edit</a></button>
                        <button><a href="../function/Del_cus.php?lel=<?=$row['CustomerID'];?>">Delete</a></button>
                        <button><a href="../Function/Tambah_vehiclecus.php?lel=<?=$row['CustomerID'];?>">Add Vehicle </a></button>
                        </td>
                    </tr>
            <?php
            }
            ?>
                </tbody>
            </table>

         </form>
    </div>



    </section>

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
       
        
        if($user = $_SESSION['name']){
            if(!$type = $_SESSION['type'] == "TP001" ){
                header('location:../Admin/Home_M.php');
            }
        }
        else  
            header('location:../index.php');


    ?>
</html>
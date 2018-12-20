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

    <section Class="ContentStaff_M">


            <div  Class="container"  >

            <h1>Staff List</h1>

            <hr>

            <div Class="btn_top" style=" padding-bottom:1%;">
                <button ><a href="../Function/Tambah_staff.php">Tambah Staff</a></button><br>
            </div>

            <table class="table table-hover table-bordered results" >
            <div class="form-group pull-right">
                <input type="text" class="search form-control" placeholder="What you looking for?">
            </div>
            <br>
                <thead>
                    <th>Pic</th>
                    <th>ID</th>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>PhoneNumber</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Salary</th>
                    <th>Control</th>

                </thead>
            
            <?php

            include "../Function/condb.php";

            $sql = "Select * from staff";
            $res = mysqli_query($con,$sql);
            $no=0;

            While($row= mysqli_fetch_assoc($res)){
                    $no++
            ?>
                <tbody>

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
                    <tr>
                        <td><img src="../img/staff_pic/<?= $row['img'];?>" alt="" width="100px"></td>
                        <td><?= $row['StaffID'];?></td>
                        <td><?= $rank_r?></td>
                        <td><?= $row['StaffName'];?></td>
                        <td><?= $row['StaffPNumber'];?></td>
                        <td><?= $row['StaffEmail'];?></td>
                        <td><?= $row['StaffDOB'];?></td>
                        <td>Rp.<?= $row['StaffSalary'];?></td>
                        <td>
                        <button><a href="../Function/Edit_staff.php?lel=<?=$row['StaffID']; ?>">Edit</a></button>
                        <button><a href="../Function/Del_staff.php?lel=<?=$row['StaffID']; ?>">Delete</a></button>
                        </td>
                    </tr>
            <?php
            }
            ?>
                </tbody>
            </table>
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
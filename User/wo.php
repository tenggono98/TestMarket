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


            <h1>Work Order List</h1>

            <hr>
            
            <div Class="btn_top" style="padding-bottom:1%;">
                <button ><a href="../Function/Tambah_wo.php">Tambah Work Order</a></button><br>
            </div>
            
            <table class="table table-hover table-bordered results text-center" >
                <div class="form-group pull-right">
                    <input type="text" class="search form-control" placeholder="What you looking for?">
                </div>
                <thead>
                    <th>No</th>
                    <th>Work Order ID</th>
                    <th>VehicleID</th>
                    <th>Word Order Date</th>
                    <th>Order Desc</th>
                    <th>Status</th>
                    <th>Control</th>
                </thead>
                <?php

                include "../Function/condb.php";

                $sql = "Select * from Work_order Order by WOID desc";
                $res = mysqli_query($con,$sql);
                $no=0;

                While($row= mysqli_fetch_assoc($res)){
                        $no++
                ?>
                <tbody>
                    <tr>
                        <td><?= $no?></td>
                        <td><?= $row['WOID'];?></td>
                        <td><?= $row['VehicleID'];?></td>
                        <td><?= $row['WODateTime'];?></td>
                        <td><?= $row['OrderDescription'];?></td>
                        <?php
                        
                        if($row['stat'] == "OnProgress"){
                            echo "<style> 
                            p { color:red;}
                            </style>";
                        }if($row['stat'] == "Done"){
                            echo "<style> 
                            p { color:green;}
                            </style>";
                        }
                        ?>
                        <td><p><?=$row['stat'];?></p></td>
                        <td>
                        <button><a href="../Function/Edit_wo.php?lel=<?=$row['WOID']; ?>">Edit</a></button>
                        <button><a href="../Function/Del_wo.php?lel=<?=$row['WOID']; ?>">Delete</a></button>
                        <button><a href="../Function/additem_wo.php?lel=<?=$row['WOID']; ?>">Add Item</a></button>
                        <button><a href="../Function/Cekout_wo.php?lel=<?=$row['WOID']; ?>">CheckOut</a></button>
                        </td>

                    </tr>

                <?php
                }
                ?>
                </tbody>
            </table> 
        </p>

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
       
    }
    else  
        header('location:../index.php');
    ?>
</html>
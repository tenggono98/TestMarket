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

    <section Class="Contentitem_M">


            <div  Class="container"  >

            <h1>Work Order</h1>

            <hr>

            <h5>Select Customer Code</h5>

            <?php
            
            include "../function/autogen_allid.php";
            $autocusid = autogen_cusid();      
            ?>
            <label >ID Customer </label><br>
            <input type="text" value="<?= $autocusid ?>" readonly><br>
            <br>
            <label >Customer Name </label><br>
            <input type="text" name="name" ><br>
            <br>
            <label >Customer Phone Number</label><br>
            <input type="number" name="name" ><br>
            <br>
            <label >Customer Email </label><br>
            <input type="email" name="name" ><br>

            <label>Type Vehicle</label><br>
            <Select name="type"><br>
                <option value="VT001">Car</option>
                <option value="VT002">Motorcycle</option>
            </Select>

            


            
            
           

            <table class="table table-hover table-bordered results" >
            <div class="form-group pull-right">
                <input type="text" class="search form-control" placeholder="What you looking for?">
            </div>
            <br>
                <thead>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>desc</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Control</th>

                </thead>
            
            <?php

            include "../Function/condb.php";

            $sql = "Select * from item";
            $res = mysqli_query($con,$sql);
            $no=0;

            While($row= mysqli_fetch_assoc($res)){
                    $no++
            ?>
                <tbody>
                    <tr>
                        <td><?= $no?></td>
                        <td><?= $row['ItemID'];?></td>
                        <td><?= $row['ItemName'];?></td>
                        <td><?= $row['ItemDescription'];?></td>
                        <td><?= $row['ItemStock'];?></td>
                        <td>Rp.<?= $row['ItemPrice'];?></td>
                        <td>
                        <button><a href="../Function/Edit_item.php?lel=<?=$row['ItemID']; ?>">Edit</a></button>
                        <button><a href="../Function/Del_item.php?lel=<?=$row['ItemID']; ?>">Delete</a></button>
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
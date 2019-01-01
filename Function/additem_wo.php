<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Item Work Order</title>
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
    
    }else if($headerin == "TP002"){

        require_once(HEADER_user);
        
    }


    ?>

    </Section>

    <Section Class="Contentitem_M">
        <div class="container px-5 py-5">
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(E_ERROR | E_PARSE);
        $inID= $_GET[lel];
        
        include "../Function/condb.php";

        ?>
        <h1>List Item</h1>
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
                    <th>desc</th>
                    <th>Stock</th>
                    <th>Price</th>

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
                        <td>Rp.<?= number_format($row['ItemPrice'], 2);?></td>
                        
                    </tr>
            <?php
            }
            ?>
                </tbody>
            </table>

        <h1>List Item On WO</h1>
        
        <table class="table table-hover table-bordered results" >
          
            <br>
                <thead>
                    <th>No</th>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>Total Price</th>
                    <th>Control</th>

                </thead>
            
            <?php

            include "../Function/condb.php";
            $WOIDIN= $_GET[lel];
            $sql = "Select item.ItemID , item.ItemName,sales_detail.Quantity ,item.ItemPrice from sales_detail JOIN item on sales_detail.ItemID = item.ItemID WHERE sales_detail.WOID = '$WOIDIN'";
            $res = mysqli_query($con,$sql);
            $no=0;
            

            While($rowtable1= mysqli_fetch_assoc($res)){
                    $no++;
                    $totalqty = $rowtable1['Quantity']; 
                    $priceitem = $rowtable1['ItemPrice'] ;
                    $totalprice = ($totalqty * $priceitem);
            ?>
                <tbody>
                    <tr>
                        <td><?= $no?></td>

                        <td><?= $rowtable1['ItemID'];?></td>
                        <td><?= $rowtable1['ItemName'];?></td>
                        <td><?= $rowtable1['Quantity'];?></td>
                        <td>Rp.<?= number_format($totalprice, 2);?></td>
                        <td>
                        <button><a href="../Function/Edititem_wo.php?lel=<?=$rowtable1['ItemID'];?>&lel2=<?=$WOIDIN?>">Edit</a></button>
                        <button><a href="../Function/delitem_wo.php?lel=<?=$rowtable1['ItemID'];?>&lel2=<?=$WOIDIN?>">Delete</a></button>
                        </td>
                    </tr>
                   
            <?php
            }
            ?>
            <?php
            $sqltotal = "Select SUM(item.ItemPrice*sales_detail.Quantity) as Total_pay from sales_detail JOIN item on sales_detail.ItemID = item.ItemID WHERE sales_detail.WOID = '$WOIDIN'";
            $res_total = mysqli_query($con,$sqltotal);
            $rowtotal = mysqli_fetch_assoc($res_total);
            ?>
                 <tr>
                    <td colspan="5" class="text-center">Total Item Payment </td>
                    <td>Rp.<?=number_format($rowtotal['Total_pay'],2); ?></td>
                   </tr>
                </tbody>
            </table>

        
        <div class="container">
            <h1>Add Item to Work Order</h1>
                <form action="" method="POST">

                    <?php
                    $inWO = $_GET[lel];
                    ?>
                    <Label>WO ID</Label><br>
                    <input type="text" name="idwo" value="<?=$inWO?>" readonly><br>
                    
                    <Label>Item ID</Label><br>
                    <?php
                     $sql = "Select * from item";
                     $res = mysqli_query($con,$sql);
                      echo "<select name='itemid'>";
                      while($row = mysqli_fetch_array($res)){
                          echo '<option value="'.$row['ItemID'].'">'.$row['ItemID'].'</option>';
                          
                      }
                      echo "</select><br>";
                    
                    ?>

                    <Label>Qty</Label><br>
                    <input type="number" name="qty" ><br>
                    
                   
                    <br>
                    
                    <input type="submit" value="Submit" data-toggle="modal" data-target="#exampleModal" name="sub" >
        
                </form>
        </div>
    </div>
    </Section>

    <?php
        $woid = $_POST['idwo'];
        $itemid = $_POST['itemid'];
        
        $sql1 = "SELECT * from item WHERE ItemID = '$itemid'";
        $res1 = mysqli_query($con,$sql1);
        $row1 = mysqli_fetch_assoc($res1);

        
        
        $qty = $_POST['qty'];
        $instock = $row1['ItemStock'];
        $takestok = ($instock - $qty);

         if(isset($_POST['sub'])){
           

            if($qty >= $instock ){
                echo '<script language="javascript">';
                echo 'alert("Stock Tidak Cukup")';
                echo '</script>';
                return false;
            }else if($qty <= $instock ){

            include "../Function/condb.php";
           

            $sql2 = "INSERT INTO sales_detail(WOID,ItemID,Quantity) VALUES ('$woid','$itemid','$qty')  ";
            $res = mysqli_query($con, $sql2);
            

            if ($res) {
                $sql3 = "UPDATE item SET ItemStock='$takestok' WHERE ITEMID = '$itemid'";
                $res1 = mysqli_query($con, $sql3);
                if($res1){
                echo '<script language="javascript">';
                echo 'alert("Data Item sudah di simpan")';
                echo '</script>';
                echo "<meta http-equiv = 'refresh' content='0 url=../user/wo.php' >";
                }
            } else
                echo '<script language="javascript">';
                echo 'alert("Data Tidak bisa di simpan Mohon untuk Cek lagi datanya !")';
                echo '</script>';
        }
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
        // error_reporting(E_ALL ^ E_NOTICE);
        // error_reporting(E_ERROR | E_PARSE);
        // session_start();
        // if ($username = $_SESSION['name']) {
            
        // } else
        //     header("location:../index.php");
        ?>
</html>
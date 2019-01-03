<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home Manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../MainStyle.css"> 
        <script src="main.js"></script>
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
        
        <section Class="ContentHome_M">
        
        <div Class="container">

        <?php

        include "../function/condb.php";

        $inwo = $_GET['lel'];
        $invec = $_GET['lel2'];

        $sql1 = "SELECT * FROM  work_order WHERE WOID = '$inwo' ";
        $res1 = mysqli_query($con,$sql1);
        $row1 = mysqli_fetch_assoc($res1);

        $sql2 = "SELECT 
        cus.CustomerName as cusname , 
        wo.WODateTime as createdate , 
        wo.OrderDescription as orderdesc ,
         wo.stat  as statuswo ,
         vc.VTypeID as vtype
         FROM work_order wo join vehicle vc on 
         wo.VehicleID = vc.VehicleID JOIN  customer  cus on 
         vc.CustomerID = cus.CustomerID   
         WHERE wo.VehicleID = '$invec' ";

        $res2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_assoc($res2);

        $sql3 = "Select SUM(item.ItemPrice*sales_detail.Quantity) as Total_pay from sales_detail JOIN item on sales_detail.ItemID = item.ItemID WHERE sales_detail.WOID = '$inwo' ";
        $res3 = mysqli_query($con,$sql3);
        $row3 = mysqli_fetch_assoc($res3);
        
        $sql4 = "Select item.ItemID , 
        item.ItemName,sales_detail.Quantity ,
        item.ItemPrice 

        
        from sales_detail 
        JOIN item on sales_detail.ItemID = item.ItemID WHERE sales_detail.WOID = '$inwo'";
        $res4 = mysqli_query($con,$sql4);
        
        
        
        
        ?>




        

        

        <h1 Class="pt-3">Work Order ID : <b><?=$row1['WOID']?></b></h1>

        <hr>

        <h5>Vehicle ID : <b><?=$invec?></b></h5>

        <table class ="table table-sm ">
        
            
            <tbody>
            <?php
                        $vtypein =  $row2['vtype'];
                         if($vtypein == "VT002"){
                            $vtype_r = str_replace("VT002",'Motor',$vtypein);
                        }else
                        $vtype_r = str_replace("VT001",'Mobil',$vtypein);
                        
            ?>

                <tr><th>Vehicle Type :  </th> <td> <?= $vtype_r ?></td></tr>
                <tr><th>Customer Name   : </th> <td><?=$row2['cusname'];?> </td></tr>
                <tr><th>Order Date :  </th> <td><?=$row2['createdate'];?> </td></tr>
                <tr><th>Order Desc :  </th> <td><?=$row2['orderdesc'];?> </td></tr>
                <tr><th>Service Type :  </th> <td>Service Ringan - Rp. <?= number_format('300000',2) ?> </td></tr>
                
                <tbody>
                <tr>
                
                <th>Item : </th>

            <tbody>
             
             <tr><th>No</th>
             <th>Item ID</th>
             <th>Item Name</th>
             <th>Item Price</th>
             <th>Qty</th>
             <th>Total Price</th>
            <?php
                $no=0;
                While($row4= mysqli_fetch_assoc($res4)){
                    
                    $no++;
                    $totalprice = ($row4['ItemPrice'] * $row4['Quantity'] )  ;
                    $totaltagihan = ($totalprice + 100000);

                    
                    
            ?>
                    <tr>
                        <td > <?= $no?></td>
                        <td> <?= $row4['ItemID'];?></td> 
                        <td> <?= $row4['ItemName'];?></td> 
                        <td>Rp.<?= number_format($row4['ItemPrice'],2) ;?></td>
                        <td> <?= $row4['Quantity'];?></td>
                        <td>Rp. <?= number_format( $totalprice,2) ?></td>              
                    </tr>    
            <?php
            }
            ?>
                
                </tr>
                </tbody>

                

                <?php 
                $totalitempay = $row3['Total_pay'] + 300000;
                if($totalitempay == null){
                    $totalitempay = 0;
                }
                ?>
                <tr><th >Total Item Price :  </th > <td >Rp.<?= number_format($totalitempay,2) ?> </td></tr>


                <tr><th >Status :  </th > <td ><?=$row2['statuswo'];?> </td></tr>
                
            
            </tbody>

        
        
        
        </table>


        <form action="" method = "POST">

        <input type="submit" Value="CheckOut" name="btn">



        </form>

        
        
        </div>
           
            
        </section>       
        
    </body>

        <?php
        
        if(isset($_POST['btn'])){

            $sql6="SELECT stat FROM work_order WHERE WOID = '$inwo' ";
            $res6 = mysqli_query($con,$sql6);
            $row6 = mysqli_fetch_assoc($res6);
            

            $statusend = "Done";
            $datedone = date("Y/m/d");
            $statnow = $row6['stat'];


            if($statnow === "OnProgress"){
                $sql5="UPDATE work_order SET stat = '$statusend' , DoneDate='$datedone ' WHERE WOID ='$inwo' ";
                $res5= mysqli_query($con,$sql5);
                if($res5){
                    echo "
                    <script>
                        alert('CekOut Berhasil');
                    </script>
                "; 
                echo "<meta http-equiv='refresh' content= '0 url=../user/wo.php' >";
                }
                else{
                    echo "
                    <script>
                        alert('CekOut Gaggal !');
                    </script>
                "; 
                }
            }else if($statnow === "Done"){
                echo    "<script>";
                echo   "     alert(' CekOut Gaggal ! Karena Status Sudah Done ')";
                echo    "</script>";
                     
                 echo   "<meta http-equiv='refresh' content= '0 url=../user/wo.php' >";
               
            }


           

           
            
            

            


        }
        
        
        
        
        ?>





    <?php
        error_reporting(E_ALL ^ E_NOTICE);  
        error_reporting(E_ERROR | E_PARSE);
        
        if($user = $_SESSION['name']){
           
        }
        else  
            header('location:../index.php');
    ?>
</html>
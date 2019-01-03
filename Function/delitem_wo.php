<?php



include "../Function/condb.php";
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
$iditemin = $_GET[lel];
$idiWOin = $_GET[lel2];

$sql1 = "SELECT ItemStock , Quantity  from item JOIN sales_detail ON item.ItemID = sales_detail.ItemID where sales_detail.ItemID = '$iditemin' ";
$res_1 = mysqli_query($con, $sql1);
$row_1 = mysqli_fetch_assoc($res_1);

$stock = $row_1['ItemStock'];
$qty_return = $row_1['Quantity'];
$total_return = ($stock + $qty_return);

$sql2 = "UPDATE item SET ItemStock = '$total_return' WHERE  ItemID = '$iditemin' ";
$sql3 = "DELETE FROM sales_detail WHERE WOID = '$idiWOin' AND ItemID ='$iditemin'  ";
$res = mysqli_query($con, $sql2);
$res = mysqli_query($con, $sql3);

if ($res) {
	echo '<script language="javascript">';
	echo 'alert("Item Work Sudah di Hapus !")';
	echo '</script>';
	echo "<meta http-equiv='refresh' content= '0 url=../user/wo.php' >";
} else {
	echo '<script language="javascript">';
	echo 'alert("Item Work Tidak Bisa di hapus !")';
  echo '</script>';
  echo "<meta http-equiv='refresh' content= '0 url=../user/wo.php' >";
	echo mysqli_error($con);
}

?>

  <?php
        error_reporting(E_ALL ^ E_NOTICE);  
        error_reporting(E_ERROR | E_PARSE);
        session_start();
        if($user = $_SESSION['name']){
           
        }
        else  
            header('location:../index.php');


    ?> 




 



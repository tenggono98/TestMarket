<?php 


include "../Function/condb.php";
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
$idin = $_GET[lel];

$sql1 = "DELETE FROM work_order WHERE WOID = '$idin' ";
$sql2 = "DELETE FROM wo_detail WHERE WOID = '$idin' ";
$res = mysqli_query($con, $sql1);
$res = mysqli_query($con, $sql2);

if ($res) {
	echo '<script language="javascript">';
	echo 'alert("WO Sudah di Hapus !")';
	echo '</script>';
	echo "<meta http-equiv='refresh' content= '0 url=../user/wo.php' >";
} else {
	echo '<script language="javascript">';
	echo 'alert("WO Tidak Bisa di hapus !")';
  echo '</script>';
  echo "<meta http-equiv='refresh' content= '0 url=../user/wo.php' >";
	echo mysqli_error();
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




 
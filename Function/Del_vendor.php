<?php 


include "../Function/condb.php";
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
$idin = $_GET[lel];

$sql = "DELETE FROM vendor WHERE VendorID = '$idin' ";

$res = mysqli_query($con, $sql);

if ($res) {
	echo '<script language="javascript">';
	echo 'alert("Vendor Sudah di Hapus !")';
	echo '</script>';
	echo "<meta http-equiv='refresh' content= '0 url=../function/Tambah_vendor.php' >";
} else {
	echo '<script language="javascript">';
	echo 'alert("Vendor Tidak Bisa di hapus !")';
	echo '</script>';
	echo mysqli_error($con);
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




 
<?php 


include "../Function/condb.php";
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
$idin = $_GET[lel];

$sql = "DELETE FROM item WHERE ItemID = '$idin' ";

$res = mysqli_query($con, $sql);

if ($res) {
	echo '<script language="javascript">';
	echo 'alert("Data Sudah di Hapus !")';
	echo '</script>';
	echo "<meta http-equiv='refresh' content= '0 url=../Admin/item_M.php' >";
} else {
	echo '<script language="javascript">';
	echo 'alert("Data Tidak Bisa di hapus !")';
	echo '</script>';
	echo mysqli_error();
}

?>

<?php
error_reporting(E_ALL ^ E_NOTICE);

session_start();

if ($username = $_SESSION['name']) {
   

} else
	header("location:../index.php");


?>




 
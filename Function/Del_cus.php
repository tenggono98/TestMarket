<?php 


include "../Function/condb.php";
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
$idin = $_GET[lel];

$sql1 = " DELETE FROM Vehicle WHERE CustomerID = '$idin' ";
$res = mysqli_query($con, $sql1);

if ($res) {
	$sql2 = " DELETE FROM customer WHERE CustomerID = '$idin' ";
	$res2 = mysqli_query($con, $sql2);
	if($res2){
	echo '<script language="javascript">';
	echo 'alert("Data Sudah di Hapus !")';
	echo '</script>';
	echo "<meta http-equiv='refresh' content= '0 url=../User/Customer.php' >";
	}
} else {
	echo '<script language="javascript">';
	echo 'alert("Data Tidak Bisa di hapus !")';
	echo '</script>';
	echo mysqli_error($con);
}

?>

<?php
error_reporting(E_ALL ^ E_NOTICE);  
error_reporting(E_ERROR | E_PARSE);
session_start();
if ($username = $_SESSION['name']) {
   

} else
	header("location:../index.php");
?>




 
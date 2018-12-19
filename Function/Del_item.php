<?php 


include "../Function/condb.php";
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
$idin = $_GET[lel];

$sql = "DELETE FROM item WHERE ItemID = '$idin' ";

$res = mysqli_query($con, $sql);

if ($res) {
	echo "<center><h1>Data Sudah di Hapus !</h1></center>";
	echo "<meta http-equiv='refresh' content= '1 url=../Admin/item_M.php' >";
} else {
	echo "Tidak Dpat Di hapus !";
	echo mysqli_error();
}

?>

<?php
error_reporting(E_ALL ^ E_NOTICE);

session_start();

if ($username = $_SESSION['user']) {
    if(!$type = $_SESSION['type'] == "TP001" ){
        header('location:../user/home.php');
    }

} else
	header("location:../index.php");


?>




 
<?php

$host = "localhost";
$user = "root";
$pass = "root";
$db = "bengkel";


$con = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_errno()) {
    echo "Koneksi gaggal : " . mysqli_connect_errno();
}








?>
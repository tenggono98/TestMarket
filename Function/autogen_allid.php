<?php

function autogen_itemid()
{
    include "../function/condb.php";

    $sql = "SELECT itemid FROM item ORDER BY itemid DESC LIMIT 1";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($res);
     
    $data = $row['itemid']; 
    $data++;
    return $data;

   
}

function autogen_staffid()
{
    include "../function/condb.php";

    $sql = "SELECT staffid FROM staff ORDER BY staffid DESC LIMIT 1";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($res);
     
    $data = $row['staffid']; 
    $data++;
    return $data;

   
}


?>
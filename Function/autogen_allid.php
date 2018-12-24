<?php

function autogen_itemid()
{
    include "../function/condb.php";

    $sql = "SELECT itemid FROM item ORDER BY itemid DESC LIMIT 1";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($res);
    
    if($data = $row['itemid'] == ""){
        $data = "IT000";
        $data++;
    }else {
        $data = $row['itemid']; 
        $data++;

    }
    
    return $data;

   
}

function autogen_staffid()
{
    include "../function/condb.php";

    $sql = "SELECT staffid FROM staff ORDER BY staffid DESC LIMIT 1";
    $res = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($res);

    if($data = $row['staffid'] == "" ){
        $data = "ST000";
        $data++;
    }else{
        $data = $row['staffid']; 
        $data++;
    }

    return $data;

   
}

function autogen_cusid(){
            include "../function/condb.php";
            $sql = "SELECT CustomerID FROM customer ORDER BY CustomerID DESC LIMIT 1 ";
            $res = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($res);
            
            if($data = $row['CustomerID'] == ""){
                $data = "CT000";
                $data++;
            }else{
                $data = $row['CustomerID']; 
                $data++;
            }

            return $data;


        }

        function autogen_vehicleid(){
            include "../function/condb.php";
            $sql = "SELECT VehicleID FROM vehicle ORDER BY VehicleID DESC LIMIT 1 ";
            $res = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($res);
            
            if($data = $row['VehicleID'] == ""){
                $data = "VH000";
                $data++;
            }else{
                $data = $row['VehicleID']; 
                $data++;
            }

            return $data;


        }

        function autogen_woid(){
            include "../function/condb.php";
            $sql = "SELECT WOID FROM work_order ORDER BY WOID DESC LIMIT 1 ";
            $res = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($res);
            
            if($data = $row['WOID'] == ""){
                $data = "WO000";
                $data++;
            }else{
                $data = $row['WOID']; 
                $data++;
            }

            return $data;


        }

        function autogen_vendorid(){
            include "../function/condb.php";
            $sql = "SELECT VendorID FROM Vendor ORDER BY VendorID DESC LIMIT 1 ";
            $res = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($res);
            
            if($data = $row['VendorID'] == ""){
                $data = "VD000";
                $data++;
            }else{
                $data = $row['VendorID']; 
                $data++;
            }

            return $data;


        }

        function autogen_pid(){
            include "../function/condb.php";
            $sql = "SELECT PurchaseID FROM purchase_header ORDER BY PurchaseID DESC LIMIT 1 ";
            $res = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($res);
            
            if($data = $row['PurchaseID'] == ""){
                $data = "PC000";
                $data++;
            }else{
                $data = $row['PurchaseID']; 
                $data++;
            }

            return $data;


        }
?>
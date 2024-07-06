<?php
$SaleNum =$_POST["SaleNum"];
$CustomerID= $_POST["CustomerID"];
$SaleDate= $_POST["SaleDate"];
$TotalPrice= $_POST["TotalPrice"];
$StatusNum= $_POST["StatusNum"];

include('testconnect.php');
//สร้างคำสั่ง sql
$sql = "INSERT INTO Sale (SaleNum,CustomerID,SaleDate,TotalPrice,StatusNum) 
VALUES ('$SaleNum','$CustomerID','$SaleDate',$TotalPrice,'$StatusNum')";
$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true)); // Handle errors if the query fails
} else {
    // Redirect to the main page after successful insert with a success message
    header('Location: sale.php?insertSuccess=1');
}



?>
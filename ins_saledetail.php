<?php
$SaleNum =$_POST["SaleNum"];
$BookID= $_POST["BookID"];
$Amount= $_POST["Amount"];



include('testconnect.php');
//สร้างคำสั่ง sql
if(isset($_POST['save'])){
$sql = "INSERT INTO SalesDetail (SaleNum,BookID,Amount) 
VALUES ('$SaleNum','$BookID',$Amount)";
$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true)); // Handle errors if the query fails
} else {
    // Redirect to the main page after successful insert with a success message
    header('Location: saledetail.php?insertSuccess=1');
}
}


?>
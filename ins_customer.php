<?php
$CustomerID =$_POST["CustomerID"];
$Firstname= $_POST["Firstname"];
$Lastname= $_POST["Lastname"];
$Address= $_POST["Address"];
$Email= $_POST["Email"];
$Tel= $_POST["Tel"];


include('testconnect.php');
//สร้างคำสั่ง sql
$sql = "INSERT INTO Customer (CustomerID,Firstname,Lastname,Address,Email,Tel) 
VALUES ('$CustomerID','$Firstname','$Lastname','$Address','$Email','$Tel')";
$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true)); // Handle errors if the query fails
} else {
    // Redirect to the main page after successful insert with a success message
    header('Location: customer.php?insertSuccess=1');
}



?>
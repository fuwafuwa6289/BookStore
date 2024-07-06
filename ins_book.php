<?php
$BookID =$_POST["BookID"];
$Bookname= $_POST["Bookname"];
$Price= $_POST["Price"];
$Instock= $_POST["Instock"];
$Writer= $_POST["Writer"];


include('testconnect.php');
//สร้างคำสั่ง sql
$sql = "INSERT INTO Book (BookID,Bookname,Price,Instock,Writer) 
VALUES ('$BookID','$Bookname',$Price,$Instock,'$Writer')";
$result = sqlsrv_query($conn, $sql);

if ($result === false) {
    die(print_r(sqlsrv_errors(), true)); // Handle errors if the query fails
} else {
    // Redirect to the main page after successful insert with a success message
    header('Location: book.php?insertSuccess=1');
}



?>
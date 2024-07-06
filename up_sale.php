<?php
    // EDITING PROCESS
    
    include ('testconnect.php');
    $SaleNum =$_POST["SaleNum"];
    $CustomerID= $_POST["CustomerID"];
    $SaleDate= $_POST["SaleDate"];
    $TotalPrice= $_POST["TotalPrice"];
    $StatusNum= $_POST["StatusNum"];
    
    if(isset($_POST['update'])){
            $sql = "UPDATE Sale SET SaleNum = '". $SaleNum ."',
            CustomerID = '".$CustomerID."',
            SaleDate = '".$SaleDate."',
            TotalPrice = ".$TotalPrice.",
            StatusNum = '".$StatusNum."'
                                      WHERE SaleNum = '". $SaleNum ."'";
          
        
            $params = array($SaleNum, $CustomerID, $SaleDate, $TotalPrice, $StatusNum);
            $result = sqlsrv_query($conn, $sql, $params);
    
            if ($result === false) {
                die(print_r(sqlsrv_errors(), true)); // Handle errors if the query fails
            } else {
                // Redirect to the main page after successful update with a success message
                header("Location: sale.php?updateSuccess=1");
            }
        }
?>
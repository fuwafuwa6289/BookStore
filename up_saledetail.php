<?php
    // EDITING PROCESS
    
    include ('testconnect.php');
    $SaleNum =$_POST["SaleNum"];
    $BookID= $_POST["BookID"];
    $Amount= $_POST["Amount"];
    
    
    if(isset($_POST['update'])){
            $sql = "UPDATE SalesDetail SET SaleNum = '". $SaleNum ."',
                                      BookID = '".$BookID."',
                                      Amount = ".$Amount."
                    
                                      WHERE BookID = '". $BookID ."'";
          
        
            $params = array($BookID, $Amount, $SaleNum);
            $result = sqlsrv_query($conn, $sql, $params);
    
            if ($result === false) {
                die(print_r(sqlsrv_errors(), true)); // Handle errors if the query fails
            } else {
                // Redirect to the main page after successful update with a success message
                header("Location:saledetail.php?updateSuccess=1");
            }
        }
?>
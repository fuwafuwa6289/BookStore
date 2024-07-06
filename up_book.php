<?php
    // EDITING PROCESS
    
    include ('testconnect.php');
    $BookID =$_POST["BookID"];
    $Bookname= $_POST["Bookname"];
    $Price= $_POST["Price"];
    $Instock= $_POST["Instock"];
    $Writer= $_POST["Writer"];
    
    if(isset($_POST['update'])){
            $sql = "UPDATE Book SET BookID = '". $BookID ."',
                                      Bookname = '".$Bookname."',
                                      Price = ".$Price.",
                                      Instock = '".$Instock."',
                                      Writer = '".$Writer."'
                                      WHERE BookID = '". $BookID ."'";
          
        
            $params = array($Bookname, $Price, $Instock, $Writer, $BookID);
            $result = sqlsrv_query($conn, $sql, $params);
    
            if ($result === false) {
                die(print_r(sqlsrv_errors(), true)); // Handle errors if the query fails
            } else {
                // Redirect to the main page after successful update with a success message
                header("Location: book.php?updateSuccess=1");
            }
        }
?>
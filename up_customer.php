<?php
    // EDITING PROCESS
    
    include ('testconnect.php');
    $CustomerID =$_POST["CustomerID"];
    $Firstname= $_POST["Firstname"];
    $Lastname= $_POST["Lastname"];
    $Address= $_POST["Address"];
    $Email= $_POST["Email"];
    $Tel= $_POST["Tel"];
    
    
    if(isset($_POST['update'])){
            $sql = "UPDATE Customer SET CustomerID = '". $CustomerID ."',
                                      Firstname = '".$Firstname."',
                                      Lastname = '".$Lastname."',
                                      Address = '".$Address."',
                                      Email = '".$Email."',
                                      Tel = '".$Tel."'
                                      WHERE CustomerID = '". $CustomerID ."'";
          
        
            $params = array($Firstname, $Lastname, $Address, $Email, $Tel,$CustomerID);
            $result = sqlsrv_query($conn, $sql, $params);
    
            if ($result === false) {
                die(print_r(sqlsrv_errors(), true)); // Handle errors if the query fails
            } else {
                // Redirect to the main page after successful update with a success message
                header("Location: Customer.php?updateSuccess=1");
            }
        }
?>
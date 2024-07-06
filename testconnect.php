<?php

//$BookID = $_POST['txtBookID'];
//$Bookname = $_POST['txtBookname'];

$servername = "DESKTOP-S05VDD0\SQLEXPRESS" ;
$connectionInfo = array("Database"=>"Bookstore", "UID"=>"sa", "PWD"=>"1234");
$conn = sqlsrv_connect($servername, $connectionInfo);

//if( $conn){
    //print "Connect DB successful <br>";
    //include 'index.html';
    //print $BookID.":".$Bookname."<br>";
//     if(isset($_POST['show'])){
       

//     $sql = "select * from Book";
//     $result = sqlsrv_query($conn,$sql);

//     if ($result === false){
//         die(print_r(sqlsrv_errors(),true));
//     }
//     else{
//         while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){
//             print $row['BookID'].":".$row['Bookname']."<br>";
//         }
//     }
// }
//     elseif(isset($_POST['insert'])){
//         //insert into Book(BookID,Bookname) values (0002,'sahara');
//         $sql = "insert into Book(BookID,Bookname) values (".$BookID.",'".$Bookname."')";
//         //print $sql;
//         $result = sqlsrv_query($conn,$sql);
//         if ($result === false){
//             die(print_r(sqlsrv_errors(),true));
//         }
//         else{
//             print "Insert data Complete<br>";
//         }

//     }
//     elseif(isset($_POST['update'])){
//         //update set Bookname = 'malaree' where ?;
//        // $sql = update Book set Bookname = ".$Bookname."where BookID = .$BookID;

        
//     }
//     elseif(isset($_POST['delete'])){
//        //$sql= "delete Book where Bookname = '".$Bookname"'"; //delete Book where?;
//     }

// }
// else{
//     print "Connect DB fail <br>" ;
// }

?>
<!--<a href = "index.html">back</a>-->
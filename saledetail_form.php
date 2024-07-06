<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaleDetailform</title>
     <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css">  
    <link rel="icon" href="image/limbo.png"> 
</head>
<body>
    <!--Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php
     
     include('slidebar.html');
?>
<div class="navbar_book">
    <ul>
        
        <div class="menublank">
        <li><a href="book_form.php">แบบกรอกข้อมูลหนังสือ</a></li>
        </div>
        <div class="menublank">
        <li><a href="customer_form.php">แบบกรอกข้อมูลลูกค้า</a></li>
        </div>
        <div class="menublank">
        <li><a href="sale_form.php">แบบกรอกการขาย</a></li>
        </div>
        <div class="mainmenu">
        <li><a href="saledetail_form.php">แบบกรอกรายละเอียดการขาย</a></li>
        </div>
      
       
    </ul>
</div>

<?php
include 'testconnect.php';
if (isset($_GET['edit'])) {
    $SaleNum = $_GET['edit'];
    $sql = "SELECT * FROM SalesDetail  WHERE SaleNum = $SaleNum"; 
    $result = sqlsrv_query($conn, $sql);

    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        echo '<div class="topic">';
        echo'<h3>แบบกรอกรายละเอียดการขาย</h3>';
        echo'</div>';
        echo'<div class="form-content">';
        echo '<form  action="up_saledetail.php" method="post">';
        echo ' <label for="SaleNum">SaleNum:</label> <br>';
        echo "<input id='SaleNum' type='text' name='SaleNum' value='".$row['SaleNum']."'> <br>";

        echo '<label for="BookID">BookID:</label><br>';
        echo '<input id="BookID" type="text" name="BookID" value="'.$row['BookID'].'"><br>';

        echo '<label for="Amount">Amount:</label><br>';
        echo '<input id="Amount" type="text" name="Amount" value="'.$row['Amount'].'"><br>';

        
        echo'<div class="btn">';
        echo' <a class="btn_back" href="saledetail.php">ย้อนกลับ</a>';
        echo '<button type="submit" name="update" id="update" >แก้ไข</button>';
        echo' </div>';
        echo '</form>';
        echo' </div>';
      
        
    }
}
    

else{


?>

<div class="topic">
    <h3>แบบกรอกรายละเอียดการขาย</h3>
</div>

<div class="form-content">
<form  action="ins_saledetail.php" method="post">
    

    <label for="SaleNum">SaleNum:</label><br>
    <input id="SaleNum" type="text" name="SaleNum"><br>

    <label for="BookID">BookID:</label> <br>
    <input id="BookID" type="text" name="BookID"> <br>


    <label for="Amount">Amount:</label><br>
    <input id="Amount" type="text" name="Amount"><br>


    
    <div class="btn">
    <a class="btn_back" href="saledetail.php">ย้อนกลับ</a>
    <button type="submit" name="save">บันทึก</button>
    </div>
    
</form>
</div>


<?php  }
    
    
    ?>
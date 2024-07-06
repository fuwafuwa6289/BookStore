<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/custom.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saleform</title>
     <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" > 
    <link rel="icon" href="image/limbo.png"> 

    <style>
        #StatusNum {
            padding: 8px;
            font-size: 16px;
            background-color: #EEE0C9;
            border-radius: 10px;
            width: 300px;
            height: 35px;
            border: none;
            
        }

        #StatusNum option {
            font-size: 16px;
           
        }
        #StatusNum option :hover{
            background: #ADC4CE;
            cursor: pointer;
           
        }
    
        input[type="date"] {
            padding: 8px;
            font-size: 16px;
            background-color: #EEE0C9;
            border-radius: 10px;
            width: 300px;
            height: 35px;
            border: none;
        }

        
        
    </style>
</head>
<body>
    <!--Boostrap-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
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
        <div class="mainmenu">
        <li><a href="sale_form.php">แบบกรอกการขาย</a></li>
        </div>
        <div class="menublank">
        <li><a href="saledetail_form.php">แบบกรอกรายละเอียดการขาย</a></li>
        </div>
        
    </ul>
</div>

<?php
include 'testconnect.php';
if (isset($_GET['edit'])) {
    $SaleNum = $_GET['edit'];
    $sql = "SELECT * FROM Sale WHERE SaleNum = $SaleNum"; 
    $result = sqlsrv_query($conn, $sql);

    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        echo '<div class="topic">';
        echo'<h3>แบบกรอกการขาย</h3>';
        echo'</div>';
        echo'<div class="form-content">';
        echo '<form  action="up_sale.php" method="post">';
        echo ' <label for="SaleNum">SaleNum:</label> <br>';
        echo "<input id='SaleNum' type='text' name='SaleNum' value='".$row['SaleNum']."'> <br>";

        echo '<label for="CustomerID">CustomerID:</label><br>';
        echo '<input id="CustomerID" type="text" name="CustomerID" value="'.$row['CustomerID'].'"><br>';

        echo '<label for="SaleDate">SaleDate:</label><br>';
        echo '<input id="SaleDate" type="date" name="SaleDate" value="'.$row['SaleDate'].'"><br>';

        echo '<label for="TotalPrice">TotalPrice:</label><br>';
        echo '<input id="TotalPrice" type="text" name="TotalPrice" value="'.$row['TotalPrice'].'"><br>';

        echo '<label for="StatusNum">StatusNum:</label><br>';
        echo '<select id="StatusNum" name="StatusNum">';
        echo '<option value="00" ' . ($row['StatusNum'] === '00' ? 'selected' : '') . '>00 : To_Pay</option>';
        echo '<option value="01" ' . ($row['StatusNum'] === '01' ? 'selected' : '') . '>01 : To_Ship</option>';
        echo '<option value="02" ' . ($row['StatusNum'] === '02' ? 'selected' : '') . '>02 : To_Receive</option>';
        echo '<option value="03" ' . ($row['StatusNum'] === '03' ? 'selected' : '') . '>03 : Completed</option>';
        echo '</select><br>';
        
        echo'<div class="btn">';
        echo' <a class="btn_back" href="sale.php">ย้อนกลับ</a>';
        echo '<button type="submit" name="update" id="update" >แก้ไข</button>';
        echo' </div>';
        echo '</form>';
        echo' </div>';
      
        
    }
}
    

else{


?>

<div class="topic">
    <h3>แบบกรอกการขาย</h3>
</div>

<div class="form-content">
<form  action="ins_sale.php" method="post">
    <label for="SaleNum">SaleNum:</label> <br>
    <input id="SaleNum" type="text" name="SaleNum"> <br>

    <label for="CustomerID">CustomerID:</label><br>
    <input id="CustomerID" type="text" name="CustomerID"><br>

    <label for="SaleDate">SaleDate:</label><br>
    <input id="SaleDate" type="date" name="SaleDate"><br>

    <label for="TotalPrice">TotalPrice:</label><br>
    <input id="TotalPrice" type="text" name="TotalPrice"><br>

    <!-- <label for="StatusNum">StatusNum:</label><br>
    <input id="StatusNum" type="text" name="StatusNum"><br> -->

    <label for="StatusNum">StatusNum:</label><br>
    <select id="StatusNum" name="StatusNum">
    <option value="00">00 : To_Pay</option>
    <option value="01">01 : To_Ship</option>
    <option value="02">02 : To_Receive</option>
    <option value="03">03 : Completed</option>
</select><br>
    
    <div class="btn">
    <a class="btn_back" href="sale.php">ย้อนกลับ</a>
    <button type="submit" name="save">บันทึก</button>
    </div>
    
</form>
</div>


<?php  }
    
    
    ?>
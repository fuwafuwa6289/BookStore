<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customerform</title>
     <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css">  
    <link rel="icon" href="image/limbo.png"> 
    <style>
        
    input[type=email],input[type=tel]{
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php
     
     include('slidebar.html');
?>
<div class="navbar_book">
    <ul>
    <div class="menublank">
        <li><a href="book_form.php">แบบกรอกข้อมูลหนังสือ</a></li>
        </div>
        <div class="mainmenu">
        <li><a href="customer_form.php">แบบกรอกข้อมูลลูกค้า</a></li>
        </div>
        <div class="menublank">
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
    $CustomerID = $_GET['edit'];
    $sql = "SELECT * FROM Customer WHERE CustomerID = $CustomerID"; 
    $result = sqlsrv_query($conn, $sql);

    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        echo '<div class="topic">';
        echo'<h3>แบบกรอกข้อมูลลูกค้า</h3>';
        echo'</div>';
        echo'<div class="form-content">';
        echo '<form  action="up_customer.php" method="post">';
        echo ' <label for="CustomerID">CustomerID:</label> <br>';
        echo "<input id='CustomerID' type='text' name='CustomerID' value='".$row['CustomerID']."'> <br>";

        echo '<label for="Firstname">Firstname:</label><br>';
        echo '<input id="Firstname" type="text" name="Firstname" value="'.$row['Firstname'].'"><br>';

        echo '<label for="Lastname">Lastname:</label><br>';
        echo '<input id="Lastname" type="text" name="Lastname" value="'.$row['Lastname'].'"><br>';

        echo '<label for="Address">Address:</label><br>';
        echo '<input id="Address" type="text" name="Address" value="'.$row['Address'].'"><br>';

        echo '<label for="Email">Email:</label><br>';
        echo '<input id="Email" type="text" name="Email" value="'.$row['Email'].'"><br>';

        echo '<label for="Tel">Tel:</label><br>';
        echo '<input id="Tel" type="text" name="Tel" value="'.$row['Tel'].'"><br>';
        
        echo'<div class="btn">';
        echo' <a class="btn_back" href="customer.php">ย้อนกลับ</a>';
        echo '<button type="submit" name="update" id="update" >แก้ไข</button>';
        echo' </div>';
        echo '</form>';
        echo' </div>';
      
        
    }
}
    

else{


?>

<div class="topic">
    <h3>แบบกรอกข้อมูลลูกค้า</h3>
</div>

<div class="form-content">
<form  action="ins_customer.php" method="post">
    <label for="CustomerID">CustomerID:</label> <br>
    <input id="CustomerID" type="text" name="CustomerID"> <br>

    <label for="Firstname">Firstname:</label><br>
    <input id="Firstname" type="text" name="Firstname"><br>

    <label for="Lastname">Lastname:</label><br>
    <input id="Lastname" type="text" name="Lastname"><br>

    <label for="Address">Address:</label><br>
    <input id="Address" type="text" name="Address"><br>

    <label for="Email">Email:</label><br>
    <input id="Email" type="email" name="Email"><br>

    <label for="Tel">Tel:</label><br>
    <input id="Tel" type="tel" name="Tel"><br>
    
    <div class="btn">
    <a class="btn_back" href="customer.php">ย้อนกลับ</a>
    <button type="submit" name="save">บันทึก</button>
    </div>
    
</form>
</div>


<?php  }
    
    
    ?>
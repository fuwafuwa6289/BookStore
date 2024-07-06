<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/custom.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookform</title>
     <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
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
        
        <div class="mainmenu">
        <li><a href="book_form.php">แบบกรอกข้อมูลหนังสือ</a></li>
        </div>
        <div class="menublank">
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
    $BookID = $_GET['edit'];
    $sql = "SELECT * FROM Book WHERE BookID = $BookID"; 
    $result = sqlsrv_query($conn, $sql);

    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        echo '<div class="topic">';
        echo'<h3>แบบกรอกข้อมูลหนังสือ</h3>';
        echo'</div>';
        echo'<div class="form-content">';
        echo '<form  action="up_book.php" method="post">';
        echo ' <label for="BookID">BookID:</label> <br>';
        echo "<input id='BookID' type='text' name='BookID' value='".$row['BookID']."'> <br>";

        echo '<label for="Bookname">Bookname:</label><br>';
        echo '<input id="Bookname" type="text" name="Bookname" value="'.$row['Bookname'].'"><br>';

        echo '<label for="Price">Price:</label><br>';
        echo '<input id="Price" type="text" name="Price" value="'.$row['Price'].'"><br>';

        echo '<label for="Instock">Instock:</label><br>';
        echo '<input id="Instock" type="text" name="Instock" value="'.$row['Instock'].'"><br>';

        echo '<label for="Writer">Writer:</label><br>';
        echo '<input id="Writer" type="text" name="Writer" value="'.$row['Writer'].'"><br>';
        
        echo'<div class="btn">';
        echo' <a class="btn_back" href="book.php">ย้อนกลับ</a>';
        echo '<button type="submit" name="update" id="update" >แก้ไข</button>';
        echo' </div>';
        echo '</form>';
        echo' </div>';
      
        
    }
}
    

else{


?>

<div class="topic">
    <h3>แบบกรอกข้อมูลหนังสือ</h3>
</div>

<div class="form-content">
<form  action="ins_book.php" method="post">
    <label for="BookID">BookID:</label> <br>
    <input id="BookID" type="text" name="BookID"> <br>

    <label for="Bookname">Bookname:</label><br>
    <input id="Bookname" type="text" name="Bookname"><br>

    <label for="Price">Price:</label><br>
    <input id="Price" type="text" name="Price"><br>

    <label for="Instock">Instock:</label><br>
    <input id="Instock" type="text" name="Instock"><br>

    <label for="Writer">Writer:</label><br>
    <input id="Writer" type="text" name="Writer"><br>
    
    <div class="btn">
    <a class="btn_back" href="book.php">ย้อนกลับ</a>
    <button type="submit" name="save">บันทึก</button>
    </div>
    
</form>
</div>


<?php  }
    
    
    ?>
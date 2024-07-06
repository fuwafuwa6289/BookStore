<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>saletable</title>
    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/custom.css">
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
                <li><a href="book.php">ตารางข้อมูลหนังสือ</a></li>
            </div>
            <div class="menublank">
                <li><a href="customer.php">ตารางข้อมูลลูกค้า</a></li>
            </div>
            <div class="mainmenu">
                <li><a href="sale.php">ตารางการขาย</a></li>
            </div>
            <div class="menublank">
                <li><a href="saledetail.php">ตารางรายละเอียดการขาย</a></li>
            </div>
            
            
        </ul>
    </div>


    <div class="topic">
        <h3>ตารางการขาย</h3>
    </div>
    
    <div class="topcontent">
    <div class="display-note">
        <p>หมายเหตุ: StatusNum มี 4 สถานะ คือ  00 : To_Pay,
                                01 : To_Ship,
                                02 : To_Receive,
                                03 : Completed
        </p>
    </div>
    <div class="center-create">
        <a href="sale_form.php" role="button">เพิ่ม</a>
    </div>
    
    </div>
    

    <table>
        <thead>
            <tr>
                <th>SaleNum</th>
                <th>CustomerID</th>
                <th>SaleDate</th>
                <th>TotalPrice</th>
                <th>StatusNum</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include('testconnect.php');
                $sql = "SELECT * FROM Sale";
                $result = sqlsrv_query($conn, $sql);

                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>'. $row['SaleNum'] . '</td>';
                    echo '<td>'. $row['CustomerID'] . '</td>';
                    echo '<td>'. $row['SaleDate'] . '</td>';
                    echo '<td>'. $row['TotalPrice'] . '</td>';
                    echo '<td>'. $row['StatusNum'] . '</td>';
                    ?>
                   <td>
                        <a href="sale_form.php?edit=<?php echo $row['SaleNum']; ?>" role="button" style="text-decoration: none; color: inherit;">
                        <button type="submit" name="edit" id="edit">แก้ไข</button> 
                            <!-- <input type="submit" value="edit" name="edit" id="edit"> -->
                        </a>
                        <a href="del_sale.php?delete=<?php echo $row['SaleNum']; ?>" role="button" style="text-decoration: none; color: inherit;" onclick ="return confirm('แน่ใจหรือไม่ว่าจะลบข้อมูล ?')">
                        <button type="submit" name="delete" >ลบ</button>
                            <!-- <input type="submit" value="delete"> -->
                        </a>
                    </td>
                    <?php
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
   

    <?php
        // Display success messages
        echo'<div class="boxing">';
        if (isset($_GET['updateSuccess']) && $_GET['updateSuccess'] == 1) {
            echo '<div class="display_edit" role="alert">';
            echo 'แก้ไขข้อมูลสำเร็จ';
            echo '</div>';
        } elseif (isset($_GET['insertSuccess']) && $_GET['insertSuccess'] == 1) {
             echo '<div class="display_ins" role="alert">';
            echo 'เพิ่มข้อมูลสำเร็จ';
            echo '</div>';
        } elseif (isset($_GET['deleteSuccess']) && $_GET['deleteSuccess'] == 1) {
            echo '<div class="display_del" role="alert">';
            echo 'ลบข้อมูลสำเร็จ';
            echo '</div>';
        }
       echo' </div>'
    ?>
    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customertable</title>
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
            <div class="mainmenu">
                <li><a href="customer.php">ตารางข้อมูลลูกค้า</a></li>
            </div>
            <div class="menublank">
                <li><a href="sale.php">ตารางการขาย</a></li>
            </div>
            <div class="menublank">
                <li><a href="saledetail.php">ตารางรายละเอียดการขาย</a></li>
            </div>
            
            
        </ul>
    </div>

    <div class="topic">
        <h3>ตารางข้อมูลลูกค้า</h3>
    </div>

    <div class="center-create">
        <a href="customer_form.php" role="button">เพิ่ม</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>CustomerID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Address</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include('testconnect.php');
                $sql = "SELECT * FROM Customer";
                $result = sqlsrv_query($conn, $sql);

                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>'. $row['CustomerID'] . '</td>';
                    echo '<td>'. $row['Firstname'] . '</td>';
                    echo '<td>'. $row['Lastname'] . '</td>';
                    echo '<td>'. $row['Address'] . '</td>';
                    echo '<td>'. $row['Email'] . '</td>';
                    echo '<td>'. $row['Tel'] . '</td>';
                    ?>
                   <td>
                        <a href="customer_form.php?edit=<?php echo $row['CustomerID']; ?>" role="button" style="text-decoration: none; color: inherit;">
                        <button type="submit" name="edit" id="edit">แก้ไข</button> 
                            <!-- <input type="submit" value="edit" name="edit" id="edit"> -->
                        </a>
                        <a href="del_customer.php?delete=<?php echo $row['CustomerID']; ?>" role="button" style="text-decoration: none; color: inherit;" onclick ="return confirm('แน่ใจหรือไม่ว่าจะลบข้อมูล ?')">
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
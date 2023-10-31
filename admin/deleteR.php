<?php
require "config.php";
require "models/db.php";
require "models/product.php"; 
require "models/manufacture.php"; 
require "models/protype.php";
require "models/sale.php";
require "models/role.php";

$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
$sale = new Sale;
$role = new role;
$role = new Role;
// if(isset($_GET['role_id'])){
//     $role->deleteRoleByIDByID($_GET['role_id']);
   
// }
if(isset($_GET['role_id'])){
    if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes'){
        $role->deleteRoleByID($_GET['role_id']);
        header('location:roles.php?status=dc');
    } else {
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận xóa quyền truy cập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 100px auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 30px;
            text-align: center;
        }

        h3 {
            margin: 0 0 20px;
            color: #333;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        button {
            background-color: #ff0000;
            color: #fff;
            border: 1px #ccc solid;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #cc0000;
        }

        .btn-no {
            margin-top: 20px;
        }

        .btn-no a {
            background-color: #333;
            color: #fff;
            text-decoration: none;
            padding: 15px 20px;
            border-radius: 5px;
        }

        .btn-no a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Bạn có chắc chắn muốn xóa quyền truy cập này?</h3>
        <table>
            <?php
            $id = $_GET['role_id'];
            $getroleById = $role->getroleById($id);
            foreach ($getroleById as $value) :
            ?>
              <tr>
                <td><strong>Tên nhà sản xuất:</strong></td>
                <td><?php echo $value['role_name'] ?></td>
              </tr>
            <?php endforeach; ?>
        </table>

        <form method="get">
            <input type="hidden" name="role_id" value="<?php echo $_GET['role_id']; ?>">
            <input type="hidden" name="confirm" value="yes">
            <button type="submit">Có</button>
        </form>
        <div class="btn-no">
            <a href="roles.php">Không</a>
        </div>
    </div>
</body>
</html>

<?php
    }
}?>
            

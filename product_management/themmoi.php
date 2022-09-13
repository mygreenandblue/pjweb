<?php
// require_once("./config/config.php");
require_once("../functions/functions.php");
require_once("../classes/dbConnection.php");

$message = "";
$error = "";

$action = getValue("action", "POST", "str", "");
if ($action == "insert") {
    // Lay POST Value
    $idPost = getValue("sp_vi", "POST", "int", 0);
    $inputQuantity = getValue("quantity", "POST", "str", "");
    $inputUnitPrice = getValue("unit_price", "POST", "str", "");
    $inputPromotionPrice = getValue("promotion_price", "POST", "str", "");
    $inputImage = getValue("image", "POST", "str", "");

    if ($idPost != "" && $inputQuantity != "" && $inputUnitPrice != "" && $inputImage != "") {
        // Insert SQL
        $dbConnection = new dbConnection();
        $conn = $dbConnection->getConnection();

        $sql = 'INSERT INTO products (id_post, product_quantity, unit_price, promotion_price, image) 
                VALUES (' . $idPost . ', ' . $inputQuantity . ', ' . $inputUnitPrice . ', ' . $inputPromotionPrice . ', "' . $inputImage . '")';

        if ($conn->query($sql) === true) {
            $message = "New record created successfully";
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        $error = "Thông tin nhập không đủ !";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm mới</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .bs-example {
            margin: 20px;
        }

    </style>
</head>

<body id="page-top" style="zoom: 1;">
<h1>Danh sách người dùng</h1>
<table class="table" id="wrapper">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá tiền</th>
            <th scope="col">Giá ưu đãi</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Sửa / Xóa</th>
        </tr>
    </thead>
    <tbody >
        <?php
        $dbConnection = new dbConnection();
        $conn = $dbConnection->getConnection();

        $sql = "SELECT id, id_post, product_quantity, unit_price, promotion_price, image FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $stt = 0;
            while ($row = $result->fetch_assoc()) {
                $stt++; ?>
                <tr>
                    <th scope="row">
                        <?= $stt ?>
                    </th>
                    <td>
                        Sản phẩm
                        <?= $row["id_post"] ?>
                    </td>
                    <td>
                        <?= $row["product_quantity"] ?>
                    </td>
                    <td>
                        <?= $row["unit_price"] ?>
                    </td>
                    <td>
                        <?= $row["promotion_price"] ?>
                    </td>
                    <td>
                        <?= $row["image"] ?>
                    </td>
                    <td>
                        <a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;
                        <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
      
    </tbody>
</table>
    <h1>Thêm mới sản phẩm</h1>
    <div class="bs-example">
        <div class="message">
            <?php
            if ($message != "") {
                echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
            }
            if ($error != "") {
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            }

            ?>
        </div>
        <div class="modal-body">
            <form id="insert-form" action="" method="POST">
                <div class="form-group">
                    <label style="font-weight: bold; color: #000">Tên Sản Phẩm Vi</label>
                    <input type="text" id="sp_vi_74" name="sp_vi" class="form-control" value="Sản Phẩm 1" onkeyup="ChangeToSlug();">
                    <input type="hidden" id="slug_74" name="slug" class="form-control" value="san-pham-1">
                </div>
                
                <div class="form-group">
                    <label style="font-weight: bold; color: #000">Số Lượng</label>
                    <input type="text" id="quantity_74" name="quantity" class="form-control" value="26">
                </div>
                
                <div class="form-group">
                    <label style="font-weight: bold; color: #000">Giá Tiền</label>
                    <input type="text" id="e_unit_price_74" name="unit_price" class="form-control" value="14500000">
                </div>
                <div class="form-group">
                    <label style="font-weight: bold; color: #000">Giá Ưu Đãi</label>
                    <input type="text" id="e_promotion_price_74" name="promotion_price" class="form-control" value="0">
                </div>
                <div class="form-group">
                    <label style="font-weight: bold; color: #000">Hình Ảnh</label>
                    <input type="file" id="e_image_74" name="image" class="form-control" multiple="" accept="image/*"><br>
                    <img src="source/image/product/1619762352.16771-laptop-acer-swift-3-sf314-57-52gb-176.jpg" alt="" width="200px">
                </div>

                <input type="hidden" name="action" value="insert" />
                <button id="btnThemMoi" type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
        <!-- Using Ajax -->
        <!-- <script type="text/javascript">
            $("#btnThemMoi").click(function() {
                // $("#frmThemMoi").submit();
                // return false;
                $.ajax({
                    type: "POST",
                    url: "ajax/ajax_themmoi.php",
                    data: $("#frmThemMoi").serialize(),
                    success: function(data) {
                        // alert(data);
                        if (data != "error") {
                            $("#tblUser tbody").append(data);
                        } else {
                            alert("Có lỗi xảy ra. Vui lòng thực hiện lại!");
                        }

                        $("#inputID").val('');
                        $("#inputEmail").val('');
                        $("#inputPassword").val('');
                    }
                });
            });
        </script> -->
    </div>
</body>

</html>
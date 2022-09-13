<?php 
// require_once("config.php");
require_once("../functions/functions.php");
require_once("../classes/dbConnection.php");

if (isset($_POST['update'])) {

    $product_id = $_POST['id'];
    $idPost = $_POST['id_post'];
    $inputQuantity = $_POST['product_quantity'];
    $inputUnitPrice = $_POST['unit_price'];
    $inputPromotionPrice = $_POST['promotion_price'];
    $inputImage = $_POST['image'];

    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();

    $sql = " UPDATE products SET id_post = ".$idPost.", product_quantity =".$inputQuantity.", unit_price =".$inputUnitPrice.", promotion_price =".$inputPromotionPrice.", image ='".$inputImage."' WHERE id = ".$product_id." "; 
    $result = $conn->query($sql); 

    if ($result == TRUE) {
        echo "Record updated successfully.";
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} 

if (isset($_GET['id'])) {

    $product_id = $_GET['id']; 

    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();

    $sql = "SELECT * FROM products WHERE id ='".$product_id."'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {

            $id_post = $row["id_post"];
            $product_quantity  = $row["product_quantity"];
            $unit_price = $row["unit_price"];
            $promotion_price = $row["promotion_price"];
            $image = $row["image"];
            $id = $row['id'];
            
        } 
        $conn->close();
    ?>
        <h2>User Update Form</h2>
        <div class="modal-body">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $product_id; ?>">

                <div class="form-group">
                    <label style="font-weight: bold; color: #000">Tên Sản Phẩm Vi</label>
                    <input type="text" id="sp_vi_74" name="id_post" class="form-control" value="Sản Phẩm 1" onkeyup="ChangeToSlug();">
                    
                </div>
                
                <div class="form-group">
                    <label style="font-weight: bold; color: #000">Số Lượng</label>
                    <input type="text" id="quantity_74" name="product_quantity" class="form-control" value="26">
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

                <input type="submit" value="Update" name="update">
            </form>
        </div>
        </body>
        </html> 
    <?php
    } else{ 
        header('Location: view.php');
    } 
}
?> 
<?php 
// require_once("config.php");
require_once("../functions/functions.php");
require_once("../classes/dbConnection.php");

if (isset($_POST['update'])) {

    $inputName = getValue("sp_vi", "POST", "int", 0);
    $inputQuantity = getValue("quantity", "POST", "str", "");
    $inputUnitPrice = getValue("unit_price", "POST", "str", "");
    $inputPromotionPrice = getValue("promotion_price", "POST", "str", "");
    $inputImage = getValue("image", "POST", "str", "");

    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();

    $sql = "UPDATE products SET id_post = '".$inputName."', product_quantity ='".$inputQuantity.", unit_price ='".$inputUnitPrice.", promotion_price ='".$inputPromotionPrice.", image ='".$inputImage."' WHERE id = '".$product_id."'"; 
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
                <label style="font-weight: bold; color: #000">Date Sale</label>
                <input type="text" id="date_sale_product_74" name="date_sale" class="form-control hasDatepicker" value="2021/04/30">
            </div>
            <div class="form-group">
                <label style="font-weight: bold; color: #000">Hours Sale</label><br>
                <input type="number" name="hour_sale" class="col-md-4" style="width: 32%" placeholder="Hours" min="0" max="23" onkeyup="if(this.value>23){this.value='23';}else if(this.value<0){this.value='00';}" value="20">
                <input type="number" name="min_sale" class="col-md-4" style="width: 35%" placeholder="Mins" min="0" max="59" onkeyup="if(this.value>59){this.value='59';}else if(this.value<0){this.value='00';}" value="29">
                <input type="number" name="sec_sale" class="col-md-4" style="width: 50%" placeholder="Secs" min="0" max="59" onkeyup="if(this.value>59){this.value='59';}else if(this.value<0){this.value='00';}" value="32">
                <div class="container"></div>
            </div>
                <div class="form-group" style="font-weight: bold; color: #000">
                <label style="font-weight: bold; color: #000">Mới &amp; Cũ</label>
                <select name="new" class="form-control">
                    <option value="1" selected="">New</option>
                    <option value="0">Not New</option>
                </select>
            </div>
            <div class="form-group">
                <label style="font-weight: bold; color: #000">Hình Ảnh</label>
                <input type="file" id="e_image_74" name="image" class="form-control" multiple="" accept="image/*"><br>
                <img src="source/image/product/1619762352.16771-laptop-acer-swift-3-sf314-57-52gb-176.jpg" alt="" width="200px">
            </div>
        </div>
        </body>
        </html> 
    <?php
    } else{ 
        header('Location: view.php');
    } 
}
?> 
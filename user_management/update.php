<?php 
// require_once("config.php");
require_once("../functions/functions.php");
require_once("../classes/dbConnection.php");

if (isset($_POST['update'])) {

    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();

    $sql = "UPDATE users SET email = '".$email."', password ='".$password."' WHERE id = '".$user_id."'"; 
    $result = $conn->query($sql); 

    if ($result == TRUE) {
        echo "Record updated successfully.";
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();

    $sql = "SELECT * FROM users WHERE id ='".$user_id."'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {

            $email = $row['email'];
            $password  = $row['password'];
            $id = $row['id'];
        } 
        $conn->close();
    ?>
        <h2>User Update Form</h2>
        <form action="" method="post">
          <fieldset>
            <legend>Personal information:</legend>

            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
            <br>
            Email:<br>
            <input type="email" name="email" value="<?php echo $email; ?>" required>
            <br>
            Password:<br>
            <input type="password" name="password" value="<?php echo $password; ?>" required>
            <br><br>

            <input type="submit" value="Update" name="update">

          </fieldset>
        </form> 
        </body>
        </html> 
    <?php
    } else{ 
        header('Location: view.php');
    } 
}
?> 
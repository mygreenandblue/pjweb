<?php 
// require_once("config.php");
require_once("../functions/functions.php");
require_once("../classes/dbConnection.php");

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();

    $sql = "DELETE FROM `users` WHERE `id`='$user_id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record deleted successfully.";
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} 
?>
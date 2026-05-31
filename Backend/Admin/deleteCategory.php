<?php
session_start();
require_once "../dbaseconnection.php";

if(isset($_GET['id'])) {
    $category_id = $_GET['id'];
    
    $deleteSql = "DELETE FROM tbl_book_category WHERE category_id = '$category_id'";
    
    if($conn->query($deleteSql) === TRUE) {
        $user_id = $_SESSION['user_id'];
        $logsql = "INSERT INTO tbl_logs (user_id, action, datetime) VALUES ('$user_id', 'Deleted category ID: $category_id', NOW())";
        $conn->query($logsql);
        header("Location: ViewCategory.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header("Location: ViewCategory.php");
}
exit();
?>
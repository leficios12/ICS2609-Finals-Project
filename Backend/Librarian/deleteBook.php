<?php
session_start();
require_once "../dbaseconnection.php";

if(isset($_GET['id'])) {
    $book_id = $_GET['id'];
    
    $deleteSql = "DELETE FROM tbl_book WHERE book_id = '$book_id'";
    
    if($conn->query($deleteSql) === TRUE) {
        $user_id = $_SESSION['user_id'];
        $logsql = "INSERT INTO tbl_logs (user_id, action, datetime) VALUES ('$user_id', 'Deleted book ID: $book_id', NOW())";
        $conn->query($logsql);
        header("Location: ViewBook.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header("Location: ViewBook.php");
}
exit();
?>
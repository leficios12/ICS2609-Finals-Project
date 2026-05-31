<?php
session_start();
require_once "../dbaseconnection.php";

if(isset($_GET['id'])) {
    $book_id = $_GET['id'];
    
    $conn->query("UPDATE tbl_borrowing_record SET status = 'Returned' WHERE book_id = '$book_id'");
    
    $deleteSql = "DELETE FROM tbl_book WHERE book_id = '$book_id'";
    $conn->query($deleteSql);
    
    header("Location: ViewBook.php");
}
exit();
?>
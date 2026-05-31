<?php
session_start();
require_once "../dbaseconnection.php";

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
    
    $deleteSql = "DELETE FROM tbl_member WHERE user_id = '$user_id'";
    
    if($conn->query($deleteSql) === TRUE) {
        $logged_user_id = $_SESSION['user_id'];
        $logsql = "INSERT INTO tbl_logs (user_id, action, datetime) VALUES ('$logged_user_id', 'Deleted member ID: $user_id', NOW())";
        $conn->query($logsql);
        header("Location: ViewMember.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header("Location: ViewMember.php");
}
exit();
?>
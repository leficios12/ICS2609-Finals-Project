<?php
require_once "../dbaseconnection.php";
include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Header.php';

$user_id = $_GET['id'];
$sql = "SELECT * FROM tbl_member WHERE user_id = '$user_id'";
$result = $conn->query($sql);
$member = $result->fetch_assoc();

if(isset($_POST['update'])) {
    $user_name = $_POST['user_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    
    $updateSql = "UPDATE tbl_member SET user_name = '$user_name', address = '$address', email = '$email', status = '$status' WHERE user_id = '$user_id'";
    
    if($conn->query($updateSql)) {
        $logged_user_id = $_SESSION['user_id'];
        $logsql = "INSERT INTO tbl_logs (user_id, action, datetime) VALUES ('$logged_user_id', 'Updated member ID: $user_id', NOW())";
        $conn->query($logsql);
        header("Location: ViewMember.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<div class="container bg-light mt-5 mb-5 p-5 rounded">
    <h2 class="text-center">Edit Member</h2>
    <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="user_name" class="form-control" value="<?php echo $member['user_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo $member['address']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $member['email']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update Member</button>
        <a href="ViewMember.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<?php include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Footer.php'; ?>
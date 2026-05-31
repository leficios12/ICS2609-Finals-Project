<?php
session_start();
require_once "../dbaseconnection.php";
include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Header.php';
include_once "../Navbar.php";

$category_id = $_GET['id'];
$sql = "SELECT * FROM tbl_book_category WHERE category_id = '$category_id'";
$result = $conn->query($sql);
$category = $result->fetch_assoc();

if(isset($_POST['update'])) {
    $category_name = $_POST['category_name'];
    $description = $_POST['description'];
    
    $updateSql = "UPDATE tbl_book_category SET category_name = '$category_name', description = '$description' WHERE category_id = '$category_id'";
    if($conn->query($updateSql)) {
        $user_id = $_SESSION['user_id'];
        $logsql = "INSERT INTO tbl_logs (user_id, action, datetime) VALUES ('$user_id', 'Updated category ID: $category_id', NOW())";
        $conn->query($logsql);
        header("Location: ViewCategory.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<div class="container bg-light mt-5 mb-5 p-5 rounded">
    <h2 class="text-center">Edit Category</h2>
    <form method="post">
        <div class="mb-3">
            <label>Category Name</label>
            <input type="text" name="category_name" class="form-control" value="<?php echo $category['category_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required><?php echo $category['description']; ?></textarea>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update Category</button>
        <a href="ViewCategory.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Footer.php'; ?>
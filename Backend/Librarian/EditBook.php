<?php
require_once "../dbaseconnection.php";
include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Header.php';

$book_id = $_GET['id'];
$sql = "SELECT * FROM tbl_book WHERE book_id = '$book_id'";
$result = $conn->query($sql);
$book = $result->fetch_assoc();

if(isset($_POST['update'])) {
    $title = $_POST['title'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $publication_date = $_POST['publication_date'];
    $availability_status = $_POST['availability_status'];
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];
    
    $updateSql = "UPDATE tbl_book SET title = '$title', isbn = '$isbn', author = '$author', genre = '$genre', publication_date = '$publication_date', availability_status = '$availability_status', category_id = '$category_id', status = '$status' WHERE book_id = '$book_id'";
    $conn->query($updateSql);
    $user_id = $_SESSION['user_id'];
    $logsql = "INSERT INTO tbl_logs (user_id, action, datetime) VALUES ('$user_id', 'Updated book ID: $book_id', NOW())";
    $conn->query($logsql);
    header("Location: ViewBook.php");
}
?>

<div class="container bg-light mt-5 mb-5 p-5 rounded">
    <h2 class="text-center">Edit Book</h2>
    <form method="post">
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $book['title']; ?>" required>
        </div>
        <div class="mb-3">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control" value="<?php echo $book['ISBN']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control" value="<?php echo $book['author']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Genre</label>
            <input type="text" name="genre" class="form-control" value="<?php echo $book['genre']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Publication Date</label>
            <input type="date" name="publication_date" class="form-control" value="<?php echo $book['publication_date']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-select" required>
                <?php
                $catResult = $conn->query("SELECT category_id, category_name FROM tbl_book_category");
                foreach($catResult as $row) {
                    $selected = ($row['category_id'] == $book['category_id']) ? 'selected' : '';
                    echo "<option value='{$row['category_id']}' $selected>{$row['category_name']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Availability Status</label>
            <select name="availability_status" class="form-select">
                <option value="Available" <?php echo ($book['availability_status'] == 'Available') ? 'selected' : ''; ?>>Available</option>
                <option value="Not Available" <?php echo ($book['availability_status'] == 'Not Available') ? 'selected' : ''; ?>>Not Available</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="Available" <?php echo ($book['status'] == 'Available') ? 'selected' : ''; ?>>Available</option>
                <option value="Borrowed" <?php echo ($book['status'] == 'Borrowed') ? 'selected' : ''; ?>>Borrowed</option>
            </select>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update Book</button>
        <a href="ViewBook.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Footer.php'; ?>
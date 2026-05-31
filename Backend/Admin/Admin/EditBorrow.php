    <?php
    session_start();
    require_once "../dbaseconnection.php";
    include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Header.php';
    include_once "../Navbar.php";

    $record_id = $_GET['id'];
    $sql = "SELECT * FROM tbl_borrowing_record WHERE record_id = '$record_id'";
    $result = $conn->query($sql);
    $record = $result->fetch_assoc();

    if(isset($_POST['update'])) {
        $return_date = $_POST['return_date'];
        $borrow_date = $_POST['borrow_date'];
        $status = $_POST['status'];
        
        $updateSql = "UPDATE tbl_borrowing_record SET 
                    return_date = '$return_date',
                    borrow_date = '$borrow_date',
                    status = '$status'
                    WHERE record_id = '$record_id'";
        
        if($conn->query($updateSql)) {
            header("Location: ViewBorrow.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>

    <div class="container bg-light mt-5 mb-5 p-5 rounded">
        <h2 class="text-center">Edit Borrowing Record</h2>
        <form method="post">
            <div class="mb-3">
                <label>Borrow Date</label>
                <input type="date" name="borrow_date" class="form-control" value="<?php echo $record['borrow_date']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Return Date</label>
                <input type="date" name="return_date" class="form-control" value="<?php echo $record['return_date']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-select">
                    <option value="borrowed">Borrowed</option>
                    <option value="Available">Available</option>
                </select>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Record</button>
            <a href="ViewBorrow.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <?php include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Footer.php'; ?>
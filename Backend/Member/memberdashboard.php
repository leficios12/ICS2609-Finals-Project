<?php
require_once "../dbaseconnection.php";
include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Header.php';
$logged_user_id = $_SESSION['user_id'];
?>  
<div class="container p-5 bg-light">
    <form action="memberdashboard.php" method="post">
        <div class="row g-3">
            <div class="col">
                <input type="search" name="SI" placeholder="Search" class="form-control">
            </div>
            <div class="col">
                <input type="submit" name="bs" value="Search" class="btn btn-primary">
            </div>
        </div>
    </form>

<?php
if(isset($_POST['bs'])) {
    $searchinput = $_POST['SI'];
    if($searchinput != NULL){
        $displaysql = "SELECT * FROM tbl_borrowing_record 
                       WHERE user_id = '$logged_user_id'
                       AND (record_id LIKE '%".$searchinput."%' 
                       OR book_id LIKE '%".$searchinput."%'
                       OR user_id LIKE '%".$searchinput."%')";
    } else {
        $displaysql = "SELECT * FROM tbl_borrowing_record WHERE user_id = '$logged_user_id'";
    }
} else { 
    $displaysql = "SELECT * FROM tbl_borrowing_record WHERE user_id = '$logged_user_id'";
}

$resultdis = $conn->query($displaysql);

if ($resultdis->num_rows > 0) {
?>
<table class="table table-danger table-striped">
    <tr>
        <th>Record Id</th>
        <th>Book Id</th>
        <th>User Id</th>
        <th>Return Date</th>
        <th>Borrow Date</th>
        <th>Status</th>
    </tr>
<?php
    foreach($resultdis as $fieldnames){
        echo "<tr>";
        echo "<td>".$fieldnames['record_id']."</td>";
        echo "<td>".$fieldnames['book_id']."</td>";
        echo "<td>".$fieldnames['user_id']."</td>";
        echo "<td>".$fieldnames['return_date']."</td>";
        echo "<td>".$fieldnames['borrow_date']."</td>";
        echo "<td>".$fieldnames['status']."</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6' class='text-center'>No borrowing records found</td></tr>";
}
?>
    </table>
</div>

<!----------- Book Borrowing Form ----------------->
<form action="memberdashboard.php" method="post">
    <div class="container bg-light mt-5 mb-5 p-5 rounded">   
        <div class="row">   
            <div class="col">
                <div class="text-center">
                    <p class="display-2">Book Borrowing Form</p>    
                </div>
                
                <input type="hidden" name="user_id" value="<?php echo $logged_user_id; ?>">
                
                <label class="form-label" for="book_id">Select a Book</label>
                <select name="book_id" class="form-select register-input mt-2" required>
                    <option disabled selected>Select a Book</option>
                    <?php
                    $bookQuery = "SELECT book_id, title FROM tbl_book WHERE availability_status = 'Available' AND status = 'Available'";
                    $resultbook = $conn->query($bookQuery);
                    foreach($resultbook as $bookdata) {
                        $bookid = $bookdata['book_id'];
                        $bookname = $bookdata['title']; 
                        echo "<option value='$bookid'>$bookname</option>";
                    }       
                    ?>
                </select>
                <br>
                
                <label class="form-label" for="borrow_date">Borrow Date</label>
                <div class="row">
                    <div class="col form-group">
                        <input required type="date" name="borrow_date" class="form-control">
                    </div>
                </div>
                
                <label class="form-label" for="return_date">Return Date</label>
                <div class="row">
                    <div class="col form-group">
                        <input required type="date" name="return_date" class="form-control">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col text-center">
                        <input type="submit" name="submit" id="" class="btn btn-primary mt-3 w-25" value="Save details">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<?php 
if(isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];
    $borrow_date = $_POST['borrow_date'];
    $return_date = $_POST['return_date'];
    
    $checkBook = "SELECT status FROM tbl_book WHERE book_id = '$book_id' AND status = 'Available'";
    $bookResult = $conn->query($checkBook);
    
    if($bookResult->num_rows > 0) {
        $insertsql = "INSERT INTO tbl_borrowing_record (user_id, book_id, borrow_date, return_date, status) 
                      VALUES ('$user_id', '$book_id', '$borrow_date', '$return_date', 'borrowed')";
        $result = $conn->query($insertsql);
        
        if($result == TRUE) {
            $updateBook = "UPDATE tbl_book SET status = 'Borrowed' WHERE book_id = '$book_id'";
            $conn->query($updateBook);
            echo "<script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Book borrowed successfully!',
                showConfirmButton: false,
                timer: 1500
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Failed to borrow book!'
            });
            </script>";
        }
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Book Not Available',
            text: 'This book is already borrowed!'
        });
        </script>";
    }
}

include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Footer.php';
?>
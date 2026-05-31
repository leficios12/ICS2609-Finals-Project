<?php
require_once "../dbaseconnection.php";
include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Header.php';
?>
<a href="admindashboard.php" class="btn btn-sm btn-primary" style="position: fixed; top: 10px; left: 10px; z-index: 9999;">Go to Dashboard</a>
<div class="container p-5 bg-light">
    <form action="ViewBorrow.php" method="post">
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
        $displaysql = "SELECT tbl_borrowing_record.*, tbl_book.status as book_status 
                       FROM tbl_borrowing_record 
                       LEFT JOIN tbl_book ON tbl_borrowing_record.book_id = tbl_book.book_id
                       WHERE tbl_borrowing_record.record_id LIKE '%".$searchinput."%' 
                       OR tbl_borrowing_record.book_id LIKE '%".$searchinput."%'
                       OR tbl_borrowing_record.user_id LIKE '%".$searchinput."%'";
    }else{
        $displaysql = "SELECT tbl_borrowing_record.*, tbl_book.status as book_status 
                       FROM tbl_borrowing_record 
                       LEFT JOIN tbl_book ON tbl_borrowing_record.book_id = tbl_book.book_id";
    }
}else { 
    $displaysql = "SELECT tbl_borrowing_record.*, tbl_book.status as book_status 
                   FROM tbl_borrowing_record 
                   LEFT JOIN tbl_book ON tbl_borrowing_record.book_id = tbl_book.book_id";
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
        <th>Status (Book)</th>
    </tr>
<?php
    foreach($resultdis as $fieldnames){
        echo "<tr>";
        echo "<td>".$fieldnames['record_id']."</td>";
        echo "<td>".$fieldnames['book_id']."</td>";
        echo "<td>".$fieldnames['user_id']."</td>";
        echo "<td>".$fieldnames['return_date']."</td>";
        echo "<td>".$fieldnames['borrow_date']."</td>";
        echo "<td>".$fieldnames['book_status']."</td>";
        echo "</tr>";
    }
} else {
    echo "no record found";
}
?>
    </table>
</div>

<!----------- Book Borrowing Form ----------------->
<form action="ViewBorrow.php" method="post">
    <div class="container bg-light mt-5 mb-5 p-5 rounded">   
        <div class="row">   
            <div class="col">
                <div class="text-center">
                    <p class="display-2">Book Borrowing Form</p>    
                </div>
                <label class="form-label" for="book_id">Select a Book</label>
                <select name="book_id" class="form-select register-input mt-2" required>
                    <option disabled selected>Select a Book</option>
                    <?php
                    $bookQuery = "SELECT book_id, title FROM tbl_book WHERE status = 'Available'";
                    $resultbook = $conn->query($bookQuery);
                    foreach ($resultbook as $bookdata) {
                        $bookid = $bookdata['book_id'];
                        $bookname = $bookdata['title']; 
                        echo "<option value='$bookid'>$bookname</option>";
                    }       
                    ?>
                </select>
                <br>
                <label class="form-label" for="user_id">Select a User (Active Members Only)</label>
                <select name="user_id" class="form-select register-input mt-2" required>
                    <option disabled selected>Select a User (Active Members Only)</option>
                    <?php
                    $userQuery = "SELECT user_id, user_name FROM tbl_member WHERE status = 'Active'";
                    $resultuser = $conn->query($userQuery);
                    foreach ($resultuser as $userdata) {
                        $userid = $userdata['user_id'];
                        $username = $userdata['user_name'];
                        echo "<option value='$userid'>$username</option>";
                    }       
                    ?>
                </select>
                <br>

                <label class="form-label" for="return_date">Return Date</label>
                <div class="row">
                    <div class="col form-group">
                        <input required type="date" name="return_date" class="form-control">
                    </div>
                </div>

                <label class="form-label" for="borrow_date">Borrow Date</label>
                <div class="row">
                    <div class="col form-group">
                        <input required type="date" name="borrow_date" class="form-control">
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
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</html>

<?php 
require_once "../dbaseconnection.php";

if(isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];
    $borrow_date = $_POST['borrow_date'];
    $return_date = $_POST['return_date'];
    
    $checkUser = "SELECT status FROM tbl_member WHERE user_id = '$user_id' AND status = 'Active'";
    $userResult = $conn->query($checkUser);
    
    if($userResult->num_rows > 0) {
        $checkBook = "SELECT status FROM tbl_book WHERE book_id = '$book_id' AND status = 'Available'";
        $bookResult = $conn->query($checkBook);
        
        if($bookResult->num_rows > 0) {
            $insertsql = "INSERT INTO tbl_borrowing_record (user_id, book_id, borrow_date, return_date, status) 
                          VALUES ('$user_id', '$book_id', '$borrow_date', '$return_date', 'Borrowed')";
            $result = $conn->query($insertsql);
            
            if($result == TRUE) {
                $updateBook = "UPDATE tbl_book SET status = 'Borrowed' WHERE book_id = '$book_id'";
                $conn->query($updateBook);
                ?>
                <script>
                Swal.fire({ 
                    position: "top-end",
                    icon: "success",
                    title: "Book borrowed successfully!",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.reload();
                });
                </script>
                <?php
            } else {
                echo $conn->error;
            }
        } else {
            ?>
            <script>
            Swal.fire({
                icon: "error",
                title: "Book Not Available",
                text: "This book is already borrowed!",
            });
            </script>
            <?php
        }
    } else {
        ?>
        <script>
        Swal.fire({
            icon: "error",
            title: "Invalid User",
            text: "User does not exist or is not active!",
        });
        </script>
        <?php
    }
}

include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Footer.php';
?>
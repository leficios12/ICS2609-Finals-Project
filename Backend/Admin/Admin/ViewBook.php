<?php
session_start();
require_once "../dbaseconnection.php";
include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Header.php';
include_once "../Navbar.php";
?>

<div class="container p-5 bg-light">
    <form action="ViewBook.php" method="post">
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
        $displaysql = "SELECT tbl_book.*, tbl_book_category.category_name 
               FROM tbl_book 
               LEFT JOIN tbl_book_category ON tbl_book.category_id = tbl_book_category.category_id
               WHERE title LIKE '%".$searchinput."%' 
               OR author LIKE '%".$searchinput."%'
               OR ISBN LIKE '%".$searchinput."%'";

    }else{
        $displaysql = "SELECT tbl_book.*, tbl_book_category.category_name 
               FROM tbl_book 
               LEFT JOIN tbl_book_category ON tbl_book.category_id = tbl_book_category.category_id";
    }
   
}else { 
    $displaysql = "SELECT tbl_book.*, tbl_book_category.category_name 
           FROM tbl_book 
           LEFT JOIN tbl_book_category ON tbl_book.category_id = tbl_book_category.category_id";
}
$resultdis = $conn->query($displaysql);

if ($resultdis->num_rows > 0    ) {
?>
<table class="table table-danger table-striped">
    <tr>
        <th>book_id</th>
        <th>title</th>
        <th>author</th>
        <th>ISBN</th>
        <th>Genre</th>
        <th>Publication Date</th>
        <th>Availability Status</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
<?php
    foreach($resultdis as  $fieldnames ){
        echo "<tr>";
        echo "<td>".$fieldnames['book_id']."</td>";
        echo "<td>".$fieldnames['title']."</td>";
        echo "<td>".$fieldnames['author']."</td>";
        echo "<td>".$fieldnames['ISBN']."</td>";
        echo "<td>".$fieldnames['genre']."</td>";
        echo "<td>".$fieldnames['publication_date']."</td>";
        echo "<td>".$fieldnames['availability_status']."</td>";
        echo "<td>".$fieldnames['category_name']."</td>";
        echo "<td>".$fieldnames['status']."</td>";
        echo "<td><img src='".$fieldnames['img_path']."' style='width: 100px; height: 100px; object-fit: cover;'></td>";
        // Updated Actions column with both Edit and Delete buttons
        echo "<td>
                <a href='EditBook.php?id=".$fieldnames['book_id']."' class='btn btn-warning btn-sm'>Edit</a>
                <button onclick='confirmDelete(".$fieldnames['book_id'].")' class='btn btn-danger btn-sm'>Delete</button>
              </td>";
        echo "</tr>";
}
} else {
    echo "no record found";
}
?>
    </table>
</div>  

<!----------- Book Registration Form ----------------->
<form action="ViewBook.php" method="post" enctype="multipart/form-data">
    <div class="container bg-light mt-5 mb-5 p-5 rounded">   
        <div class="row">   
            <div class="col">
                <div class=" text-center ">
                    <p class="display-2">Book Registration Form</p>    
                </div>
                <div class="row">
                    <div class="col text-center">
                        <div class="row">
                            <div class="col"> 
                                <img src="" id="preview" alt="preview" class="img-thumbnail text-center d-block mx-auto" style="width: 150px; height: 150px;">
                            </div>
                            <div class="col">  
                                <input type="file" name="upload_img" class="form-control mt-3" onchange="previewImage(event);">      
                            </div>
                        </div>
                    </div>
                </div>
                
                <label class="form-label" for="title">Title</label>
                <div class="row">
                    <div class="col form-group">
                        <input required type="text" name="title" placeholder="Title" class="form-control">
                    </div>
                </div>

                <label class="form-label" for="address">ISBN</label>
                <div class="row">
                    <div class="col form-group">
                        <input required type="text" name="isbn" placeholder="ISBN" class="form-control">
                    </div>
                </div>

                <label class="form-label" for="author">Author</label>
                <div class="row">
                    <div class="col">
                        <input type="text" name="author" class="form-control" value="" placeholder="Author">
                    </div>
                </div>

                <label class="form-label" for="contact_info">Genre</label>
                <div class="row">
                    <div class="col form-group">
                        <input type="text" name="contact_info" value="" placeholder="Genre" class="form-control">
                    </div>
                </div>

                <label class="form-label" for="publication_date">Publication Date</label>
                <div class="row">
                    <div class="col form-group">
                        <input type="date" name="publication_date" value="" class="form-control">
                    </div>
                </div>
                <br>
                                     
                <select name="availability_status" class="form-select register-input" required>
                    <option disabled selected>Availability/Not Available</option>
                    <?php
                    $arr = array("Available", "Not Available");
                    foreach ($arr as $availability_status) {
                        echo "<option value='$availability_status'>$availability_status</option>";
                    }
                    ?>
                </select>

                <select name="Category" class="form-select register-input mt-2" required>
                    <option disabled selected>Select Category</option>
                    <?php
                    $bookQuery = "Select category_id, category_name from tbl_book_category"; 
                    $resultbook = $conn->query($bookQuery);
                    foreach ($resultbook as $bookdata) {
                        $bookid = $bookdata['category_id'];
                        $bookname = $bookdata['category_name']; 
                        echo "<option value='$bookid'>$bookname</option>";
                    }       
                    ?>
                </select>

                <select name="status" class="form-select register-input mt-2" required>
                    <option disabled selected>Borrowed/Available</option>
                    <?php
                    $arr = array("Available", "Borrowed");
                    foreach ($arr as $status) {
                        echo "<option value='$status'>$status</option>";
                    }
                    ?>
                </select>

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
<script>
    function previewImage(event) {
        var displaying = document.getElementById("preview");
        displaying.src = URL.createObjectURL(event.target.files[0]); 
    }
    
    function confirmDelete(bookId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "deleteBook.php?id=" + bookId;
            }
        });
    }
</script>

<?php 
require_once "../dbaseconnection.php";

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $genre = $_POST['contact_info'];
    $publication_date = $_POST['publication_date'];
    $availability_status = $_POST['availability_status'];
    $category_id = $_POST['Category'];
    $status = $_POST['status']; 
    $img_path = "../images/".$_FILES['upload_img']['name'];     
    copy($_FILES['upload_img']['tmp_name'], $img_path);   
    
    $insertsql = "Insert into tbl_book(title, isbn, author, genre, publication_date, availability_status, category_id, status, img_path) 
    values('".$title."','".$isbn."','".$author."','".$genre."','".$publication_date."','".$availability_status."','".$category_id."','".$status."','".$img_path."')";    
    $result = $conn->query($insertsql);
    
    if($result == TRUE) {
        ?>
        <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500
        });
        </script>
        <?php
    } else {
        echo $conn->error;
    }
}

include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Footer.php';
?>
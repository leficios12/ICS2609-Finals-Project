<?php
session_start();
require_once "../dbaseconnection.php";
include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Header.php';
include_once "../Navbar.php";
?>

<div class="container p-5 bg-light">
    <form action="ViewCategory.php" method="post">
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
        $displaysql = "Select * from tbl_book_category 
        where category_name LIKE '%".$searchinput."%' 
        or description LIKE '%".$searchinput."%'
        ";

    }else{
        $displaysql = "Select * from tbl_book_category";
    }
   
}else { 
    $displaysql = "Select * from tbl_book_category";
}
$resultdis = $conn->query($displaysql);

if ($resultdis->num_rows > 0    ) {
?>
<table class="table table-danger table-striped">
    <tr>
        <th>Category ID</th>
        <th>Category Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
<?php
    foreach($resultdis as  $fieldnames ){
        echo "<tr>";
        echo "<td>".$fieldnames['category_id']."</td>";
        echo "<td>".$fieldnames['category_name']."</td>";
        echo "<td>".$fieldnames['description']."</td>";
        echo "<td>
                <a href='EditCategory.php?id=".$fieldnames['category_id']."' class='btn btn-warning btn-sm'>Edit</a>
                <button onclick='confirmDelete(".$fieldnames['category_id'].")' class='mt-2 btn btn-danger btn-sm'>Delete</button>
               </td>";
        echo "</tr>";
}
} else {
    echo "no record found";
}
?>
    </table>
</div>  

<!----------- Category Registration Form ----------------->
<form action="ViewCategory.php" method="post">
    <div class="container bg-light mt-5 mb-5 p-5 rounded">   
        <div class="row">   
            <div class="col">
                <div class=" text-center ">
                    <p class="display-2">Category Registration Form</p>    
                </div>
                   
                <label class="form-label" for="title">Category Name</label>
                <div class="row">
                    <div class="col form-group">
                        <input required type="text" name="category_name" placeholder="Category Name" class="form-control">
                    </div>
                </div>

                <label class="form-label" for="description">Description</label>
                <div class="row">
                    <div class="col form-group">
                        <textarea required name="description" id="description" placeholder="Description" class="form-control" rows="4"></textarea>
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
<script>
    function confirmDelete(categoryId) {
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
                window.location.href = "deleteCategory.php?id=" + categoryId;
            }
        });
    }
</script>
</html>

<?php 
require_once "../dbaseconnection.php";
if(isset($_POST['submit'])) {
    $category_name = $_POST['category_name'];
    $description = $_POST['description'];
  
    $insertsql = "Insert into tbl_book_category(category_name, description) 
    values('".$category_name."','".$description."')";    
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
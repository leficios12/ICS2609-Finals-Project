<?php
session_start();
require_once "../dbaseconnection.php";
include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Header.php';
include_once "../Navbar.php";
?>


  
<div class="container mt-5 p-5 bg-light">
    <form action="ViewMember.php" method="post">
        <div class="row g-3">
            <div class="col">
                <input type="search" name="searchinput" placeholder="Search" class="form-control">
            </div>
            <div class="col">
                <input type="submit" name="btnsearch" value="Search" class="btn btn-primary">
            </div>
        </div>
    </form>

<?php
if(isset($_POST['btnsearch'])) {
    $searchinput = $_POST['searchinput'];
    if($searchinput != NULL){
        $displaysql = "Select * from tbl_member 
        where user_name LIKE '%".$searchinput."%' 
        or address LIKE '%".$searchinput."%'
        or email LIKE '%".$searchinput."%'
        ";

    }else{
        $displaysql = "Select * from tbl_member";
    }
   
}else { 
    $displaysql = "Select * from tbl_member";
}
require_once "../dbaseconnection.php";
$resultdis = $conn->query($displaysql);

    echo "<div class=container align-items-center d-flex justify-content-center>";
    echo "<div class=row>";
    foreach ($resultdis as $index => $fielddata) {
    ?>
      <div class="col-3 "> 
        <div class="container p-3 m-3 bg-secondary">  

            <div class="row">
              <div class="col">
                <img src="../<?php echo $fielddata['img_path'] ?>" alt="" width=100 height=100> 
              </div>
            </div>
            <div class="row">
              <div class="col">
                <?php echo $fielddata['user_name'] ?>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <i class=small><?php echo $fielddata['address'] ?></i>
              </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <a href="EditMember.php?id=<?php echo $fielddata['user_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <input type="button" value="View" class="btn btn-success btn-sm">
                    <button onclick="confirmDelete(<?php echo $fielddata['user_id']; ?>)" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </div>
        </div>
      </div>
   <?php
      if(($index+1)% 4 == 0){
        echo "</div><div class=row>"; 
      }
   
    }
    echo "</div></div>"; 
?>
    </table>
</div>


<div class="container p-5 bg-light">
    <form action="ViewMember.php" method="post">
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
        $displaysql = "Select * from tbl_logs 
        where user_id LIKE '%".$searchinput."%' 
        or action LIKE '%".$searchinput."%'
        or datetime LIKE '%".$searchinput."%'
        ";

    }else{
        $displaysql = "Select * from tbl_logs";
    }
   
}else { 
    $displaysql = "Select * from tbl_logs";
}
$resultdis = $conn->query($displaysql);

if ($resultdis->num_rows > 0    ) {
?>
<table class="table table-danger table-striped">
    <tr>
        <th>log_id</th>
        <th>user_id</th>
          <th>action</th>
        <th>datetime</th>   
    </tr>
<?php
    foreach($resultdis as  $fieldnames ){
        echo "<tr>";
        echo "<td>".$fieldnames['log_id']."</td>";
        echo "<td>".$fieldnames['user_id']."</td>";
        echo "<td>".$fieldnames['action']."</td>";
        echo "<td>".$fieldnames['datetime']."</td>";
        echo "</tr>";
}
} else {
    echo "no record found";
}
?>
    </table>
</div>  

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(userId) {
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
                window.location.href = "deleteMember.php?id=" + userId;
            }
        });
    }
</script>

<?php
include_once "AdminCreate_user.php";
include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Footer.php';
?>
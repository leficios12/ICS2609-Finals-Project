<?php
require_once "../dbaseconnection.php";
include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Header.php';
?>

<a href="admindashboard.php" class="btn btn-sm btn-primary" style="position: fixed; top: 10px; left: 10px; z-index: 9999;">Go to Dashboard</a>
  
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
                        <img src="/ICS2609-Finals-Project-main/Backend/images/<?php echo basename($fielddata['img_path']); ?>" alt="" width=100 height=100> 
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<?php
include_once "AdminCreate_user.php";
include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Footer.php';
?>
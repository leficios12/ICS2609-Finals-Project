 <?php
        session_start();
        require_once "../dbaseconnection.php";
        include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Header.php';
        include_once "../Navbar.php";
        ?>


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
        $displaysql = "Select * from tbl_borrowing_record 
        where record_id LIKE '%".$searchinput."%' 
        or book_id LIKE '%".$searchinput."%'
        or user_id LIKE '%".$searchinput."%'
        ";

    }else{
        $displaysql = "Select * from tbl_borrowing_record";
    }
   
}else { 
    $displaysql = "Select * from tbl_borrowing_record";
}
$resultdis = $conn->query($displaysql);

if ($resultdis->num_rows > 0    ) {
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
    foreach($resultdis as  $fieldnames ){
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
    echo "no record found";
}
?>
    </table>
</div>  



<?php
include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Footer.php';
?>
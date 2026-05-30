<?php
include_once '../Components/Header.php';
?>  

<div class="container"></div>
    <form action="MemberLogin.php" method="post" enctype="multipart/form-data">
        <div class="container bg-light mt-5 mb-5 p-5 rounded">   
            <div class="row">   
                <div class="col">
                    <div class=" text-center ">
                        <p class="display-2">Registration Form</p>    
                    </div>
                    <div class="row">
                    <div class="col  text-center">
                        <div class="row">
                            <div class="col"> <img src="" id="preview" alt="preview" class="img-thumbnail  text-center d-block mx-auto " style="width: 150px; height: 150px;  "></div>
                            <div class="col">  <input type="file" name="upload_img" class="form-control mt-3" onchange="previewImage(event);">      
                        </div>
                        </div>
                    </div>
                </div> 
                    
                        <label class="form-label" for="user_name">Username</label>
                    <div class="row">
                        <div class="col form-group">
                        <input required type="text" name="user_name" placeholder="Username" class="form-control">
                    </div>
                    </div>

                     <label class="form-label" for="address">Address</label>
                    <div class="row">
                        <div class="col form-group">
                        <input required type="text" name="address" placeholder="Address" class="form-control">
                    </div>
                    </div>

                     <label class="form-label" for="email">Email</label>
                    <div class="row">
                        <div class="col">
                            <input type="email" name="email"  class="form-control" value="" placeholder="youremail@gmail.com">
                        </div>
                    </div>
                    <label class="form-label" for="contact_info">Phone number</label>
                    <div class="row">
                        <div class="col form-group">
                            <input type="number" name="contact_info"  value="" placeholder="09XXXXXXXXX" class="form-control">
                        </div>
                    </div>
                    


                    <label  class="form-label" for="password">Password</label>
                    <div class="row">
                        <div class="col form-group">
                        <input required type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    </div>

                    <div class="row">
                        <div class="col text-center">
                            <input type="submit" name="submit" id="" class="btn btn-primary mt-3 w-25" value="Save details">
                        </div>
                    </div>
                    <a class="btn btn-primary mt-5 mx-3" href="../Log/LogIn.php" role="button">Login</a>    

                </div>
            </div>
        </div>
    </form>
</body>
<?php
include_once '../Components/Footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!--Function for image preview ---------------------------------->
<script>
    function previewImage(event) {
      var displaying = document.getElementById("preview");
      displaying.src = URL.createObjectURL(event.target.files[0]); 
    }
</script>
  <!--Function for image preview ------------------------------------>
</html>
<?php 
require_once "../Log/Acc_verification.php";
require_once "../Log/dbaseconnection.php";

if(isset($_POST['submit'])) {
    $username = $_POST['user_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact_info = $_POST['contact_info'];
    $password = md5($_POST['password']);
    
    print_r($_FILES['upload_img']['name']); 
    $img_path = "images/".$_FILES['upload_img']['name'];     
    copy($_FILES['upload_img']['tmp_name'], $img_path);   
    $otp = rand(100000, 999999);
    
    $insertsql = "Insert into tbl_member(user_name,address,email,contact_info, password, roles, img_path, status, otp) 
    values('".$username."','".$address."','".$email."','".$contact_info."','".$password."', 'Member', '".$img_path."', 'Pending', '".$otp."')";    
    $result = $conn->query($insertsql);
    
    if($result == TRUE) {
        send_verification($username, $email, $otp);
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
?>
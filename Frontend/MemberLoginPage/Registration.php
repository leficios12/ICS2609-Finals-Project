<?php
include_once '../Components/Header.php';
?>  
<link rel="stylesheet" href="Registration.css">
    <div class="row">
        <div class="col-md-6 left-col d-none d-md-block">
        </div>
        <div class="col mt-5 me-5 p-5 text-center">
            <div class="row mt-2">
                <div class="display-4"><b>Account Creation</b></div>
            </div>
            <form action="" enctype="multipart/form-data">
                <div class="row justify-content-center align-items-center mt-4 upload-row">
                    <div class="col-auto">
                        <input type="file" name="upload_img" class="upload-input" onchange="previewImage(event);">
                    </div>
                    <div class="col-auto text-center">
                        <img src="" id="preview" alt="preview" class="img-thumbnail preview-image">
                    </div>
                </div>
                
                <div class="row justify-content-center mt-5">
                    <div class="col-12 col-md-10 col-lg-8">
                        <input type="text" required class="form-control mx-auto" name="" placeholder="Enter Username">
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-12 col-md-10 col-lg-8">
                        <input type="text" required class="form-control mx-auto" name="" placeholder="Enter Email">
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-12 col-md-10 col-lg-8">
                        <input type="text" required class="form-control mx-auto" name="" placeholder="Enter Address">
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-12 col-md-10 col-lg-8">
                        <input type="text" required class="form-control mx-auto" name="" placeholder="Enter Contact Number">
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-12 col-md-10 col-lg-8">
                        <input type="text" required class="form-control mx-auto" name="" placeholder="Enter Password">
                    </div>
                </div>
                
                <div class="row justify-content-center mt-4">
                    <input type="submit" value="Create Account" class="btn w-25 btn-primary">
                </div>       
            </form>
                            
            <div class="row justify-content-center mt-4">
                <label for="" class="form-label">Already have an account?</label>
                <input type="button" name="" value="Login" class="btn w-25 btn-primary" id="loginBtn">
            </div>
        </div>
    </div>

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
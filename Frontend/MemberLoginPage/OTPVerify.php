<?php
include_once '../Components/Header.php';
?>  
<link rel="stylesheet" href="Login.css">
    <div class="row">
        <div class="col-md-6 left-col d-none d-md-block">
        </div>
        <div class="col mt-5 me-5 p-5 text-center">
            <div class="row mt-5"></div>
            <div class="row mt-5 mb-3">
                <div class="display-3"><b>OTP Verification</b></div>
            </div>
            <form action="OTPVerify.php" method="POST" >
                <div class="row justify-content-center mt-5">
                    <div class="col-12 col-md-10 col-lg-8">
                     <p class="lead">Enter the OTP sent to your email to proceed creating your account.</p>

                        <input type="text" required class="form-control mx-auto" name="otp" placeholder="Enter OTP">
                    </div>
                </div>
                
                <div class="row justify-content-center mt-5">
                    <input type="submit" name="ver" value="Submit" class="btn w-25 btn-primary">
                </div>       
            </form>

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
    session_start(); 
    require_once "../../Backend/dbaseconnection.php"; 
    if(isset($_POST['ver'])){
        $otp = $_POST['otp'];

        $otpsql = "SELECT * FROM `tbl_member` WHERE `otp`='$otp'";
        $result = $conn->query($otpsql);

        if($result->num_rows ==1){
            $update_sql = "UPDATE `tbl_member` SET `status`='Active'  WHERE `otp`='$otp'";
            $conn->query($update_sql);
            echo "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Verification Successful!',
                    text: 'Your email has been verified.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'LogIn.php';
                });
            </script>
            ";
        } else {
            echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Verification Failed!',
                    text: 'Invalid OTP. Please try again.',
                    confirmButtonText: 'OK'
                });
            </script>
            ";
        }
    }
    ?>
   
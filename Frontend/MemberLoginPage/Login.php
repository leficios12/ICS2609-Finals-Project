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
                <div class="display-3"><b>Sign in</b></div>
            </div>
            <form action="" method="POST">
       
                <div class="row justify-content-center mt-5">
                    <div class="col-12 col-md-10 col-lg-8">
                        <input type="text" required class="form-control mx-auto" name="username" placeholder="Enter Username">
                    </div>
                </div>
               
                <div class="row justify-content-center mt-4">
                    <div class="col-12 col-md-10 col-lg-8">
                        <input type="password" required class="form-control mx-auto" name="pass" placeholder="Enter Password">
                    </div>
                </div>
                 
                <div class="row justify-content-center mt-5">
                    
                    <input type="submit" name="submit" value="Login" class="btn w-25 btn-primary">
                </div>       
            </form>
                            
            <div class="row justify-content-center mt-5">
                <label for="" class="form-label">Don't have an account yet?</label>
                <a href="Registration.php" id="regisBtn" class="btn w-25 text-white">Create Account</a>
    
            </div>

            <div class="row justify-content-center mt-5">
                <label for="" class="form-label">Verify Account</label>
                <a href="OTPVerify.php" id="regisBtn" class="btn w-25 text-white">Verify Account</a>
    
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function previewImage(event) {
      var displaying = document.getElementById("preview");
      displaying.src = URL.createObjectURL(event.target.files[0]); 
    }
</script>

<?php
require_once "../../Backend/dbaseconnection.php";
if(isset($_POST['submit'])){
    $user_name = $_POST['username'];
    $password = md5($_POST['pass']);
    $loginsql = "SELECT * FROM tbl_member WHERE user_name = '".$user_name."' AND password = '".$password."' AND status = 'Active'";

    $result = $conn->query($loginsql); 
    if ($result->num_rows == 1) {
        $fieldnames = $result->fetch_assoc();
        $usertype = $fieldnames['roles'];
        $user_name = $fieldnames['user_name'];
        $user_id = $fieldnames['user_id'];

        $_SESSION['roles'] = $fieldnames['roles'];
        $_SESSION['user_name'] = $user_name;
        $_SESSION['image'] = $fieldnames['img_path'];
        $_SESSION['user_id'] = $user_id;

        $logsql = "INSERT INTO tbl_logs (user_id, action, datetime) VALUES (".$user_id.", 'Logged In', NOW())";
        $conn->query($logsql);

        if($usertype == "Admin"){
            ?>
                <script>
                window.location.href = "../../Backend/Admin/admindashboard.php";
                </script>
                <?php
        } else if($usertype == "Member"){
            ?>
                <script>
                window.location.href = "../../Backend/Member/memberdashboard.php";                
                </script>
                <?php
        } else if($usertype == "Librarian"){
            ?>
                <script>
                window.location.href = "../../Backend/Librarian/librariandashboard.php";
                </script>
            <?php
        }
        ?>
        <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Login Successful",
            showConfirmButton: false,   
            timer: 1500
        });
        </script>
        <?php
    } else {
        ?>
        <script>
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Login Failed",
            text: "Invalid username or password. Please try again.",
            showConfirmButton: false,
            timer: 1500
        });
        </script>
        <?php
    }
}
?>

<?php
include_once '../Components/Footer.php';
?>
</html>
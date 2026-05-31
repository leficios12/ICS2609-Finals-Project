<nav class="navbar navbar-expand-lg mt-5 pt-5 navbar-dark bg-dark shadow">
    <div class="container-fluid">
        
        <a class="navbar-brand fw-bold" href="#">
            Shelf Core
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
               data-bs-toggle="dropdown">
              <img src="/<?php echo $_SESSION['image']; ?>"
                    class="rounded-circle me-2"
                    width="40"
                    height="40">
                <strong><?php echo $_SESSION['user_name']; ?></strong>
            </a>
            
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="../../Frontend/Homepage/Homepage.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
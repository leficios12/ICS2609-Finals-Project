<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShelfCore - Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/ICS2609-Finals-Project-main/Frontend/Components/style.css">
</head>
<body>

<!-- Header Navigation -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid px-4">
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav align-items-center">
                <a class="nav-item nav-link active" href="../../Frontend/Homepage/Homepage.php">Home</a>
                <a class="nav-item nav-link" href="../../Frontend/InformationPage/InformationPage.php">Information</a>
                <a class="nav-item nav-link" href="../../Frontend/FAQpage/FAQ.php">FAQs</a>
                <a class="nav-item nav-link" href="../../Frontend/LibrarianPage/LibrarianPage.php">Librarian</a>
                
                <?php if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])): ?>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                           data-bs-toggle="dropdown">
                            <?php if(isset($_SESSION['image'])): ?>
                                <img src="/<?php echo $_SESSION['image']; ?>"
                                    class="rounded-circle me-2"
                                    width="40"
                                    height="40">
                            <?php endif; ?>
                            <strong><?php echo $_SESSION['user_name']; ?></strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <?php if($_SESSION['roles'] == 'Admin'): ?>
                                <li>
                                    <a class="dropdown-item" href="../../Backend/Admin/AdminDashboard.php">Dashboard</a>
                                </li>
                            <?php elseif($_SESSION['roles'] == 'Librarian'): ?>
                                <li>
                                    <a class="dropdown-item" href="../../Backend/Librarian/LibrarianDashboard.php">Dashboard</a>
                                </li>
                            <?php elseif($_SESSION['roles'] == 'Member'): ?>
                                <li>
                                    <a class="dropdown-item" href="../../Backend/Member/MemberDashboard.php">Dashboard</a>
                                </li>
                            <?php endif; ?>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="../../Backend/logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a class="nav-item nav-link member-login" href="../MemberLoginPage/Registration.php">Member Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
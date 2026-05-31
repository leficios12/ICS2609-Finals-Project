<?php
        session_start();
        require_once "../dbaseconnection.php";
        include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Header.php';
        include_once "../Navbar.php";
        ?>

 <link rel="stylesheet" href="../dashboard.css">

<nav class="navbar navbar-expand-lg mt-5 pt-5 navbar-dark bg-dark shadow">
    <div class="container-fluid">
        <a href="memberdashboard.php" class="btn btn-primary">Go to Dashboard</a>
        <a class="navbar-brand fw-bold" href="#">
            Shelf Core
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
               data-bs-toggle="dropdown">
                <img src="<?php echo $_SESSION['image']; ?>"
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
 <div class="container mt-5">   
<div class="row g-4 mb-2">

  <!-- Book Table Card -->
  <div class="col-md-4">
    <div class="table-card">
      <div class="table-card-icon">📖</div>
      <div class="table-card-title">Book Table</div>
      <div class="table-card-desc">Manage the complete catalog of books available in the library, including titles, authors, and stock.</div>
      <button class="btn-view" onclick="window.location.href='ViewBook.php'">View Table</button>
    </div>
  </div>

  <div class="col-md-4">
    <div class="table-card">
      <div class="table-card-icon">🏷️</div>
      <div class="table-card-title">Book Category Table</div>
      <div class="table-card-desc">Manage genres and categories used to classify and organize books in the system.</div>
        <button class="btn-view" onclick="window.location.href='ViewCategory.php'">View Table</button>
    </div>
  </div>

  <div class="col-md-4">
    <div class="table-card">
      <div class="table-card-icon">🔄</div>
      <div class="table-card-title">Borrowed Books Table</div>
      <div class="table-card-desc">Track all active and past book loans, due dates, and return records for members.</div>
        <button class="btn-view" onclick="window.location.href='ViewBorrow.php'">View Table</button>
    </div>
  </div>
</div>

<div class="row mt-5 g-4">

  <div class="col-md-4 offset-md-2">
    <div class="table-card">
      <div class="table-card-icon">👤</div>
      <div class="table-card-title">Member Table</div>
      <div class="table-card-desc">View and manage registered library members, their details, and membership status.</div>
        <button class="btn-view" onclick="window.location.href='ViewMember.php'">View Table</button>
    </div>
  </div>

  <div class="col-md-4">
    <div class="table-card">
      <div class="table-card-icon">📋</div>
      <div class="table-card-title">Log Table</div>
      <div class="table-card-desc">Review system activity logs including user actions, errors, and audit trails.</div>
      <button class="btn-view" onclick="window.location.href='ViewLog.php'">View Table</button>
    </div>
  </div>
</div>
 </div>



<?php
include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Footer.php';
?>
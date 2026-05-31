<?php
        require_once "../dbaseconnection.php";
        include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Header.php';

        ?>

 <link rel="stylesheet" href="../dashboard.css">

  
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<?php
include_once '../../../ICS2609-Finals-Project-main/Frontend/Components/Footer.php';
?>
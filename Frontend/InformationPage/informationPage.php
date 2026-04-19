<?php


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShelfCore - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="informationPage.css">
</head>

<body>
    <!-- Header -->
    <div class="header">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">ShelfCore</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto mx-5">
                        <a class="nav-item nav-link" href="../Homepage/Homepage.php"> Home</a>
                            <a class="nav-item nav-link active" href="informationPage.php">Information</a>
                            <a class="nav-item nav-link" href="#">Help</a>
                            <a class="nav-item nav-link" href="#">Librarian</a>
                            <a class="nav-item nav-link" href="#">Admin Login</a>
                            <a class="nav-item nav-link" href="#">Member Area</a>
                    </div>
                </div>
        </nav>
    </div>

    <div class="">

    </div>

    <div class="Upper-Section">
        <img src="../images/HomepageCover.jpg" class="img-fluid" id="Upper-Background">
    </div>

    <div class="search-section">
        <div class="container">
           <div class="row justify-content-center">
                <div class="col-md-6">
                        <form class="d-flex">
                            <div class="input-group shadow">
                                <input class="form-control form-control-lg p-3 pl-5" type="search" placeholder="Enter keyword to search collection..." aria-label="Search">
                                <button class="btn btn-success px-4" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 border border-light" id="main-section">
        <div class="row p-3">
            <p class="h1">Library Information</p>
        </div>
        <hr class="mb-3">
        <div class="container">
            <div class="row p-4">
                <p class="h2">Contact Information</p>
            </div>
            <div class="row px-5 mx-2">
                <b>Address:</b>
                <p>Lorem Ipsum Dolorit</p>
            </div>
            <div class="row px-5 mx-2">
                <b>Phone Number:</b>
                <p>Lorem Ipsum Dolorit</p>
            </div>
            <div class="row px-5 mx-2">
                <b>Email:</b>
                <p>Lorem Ipsum Dolorit</p>
            </div>
        </div>

        <div class="container">
            <div class="row p-4">
                <p class="h2">Opening Hours</p>
            </div>
            <div class="row px-5 mx-2">
                <b>Monday - Friday:</b>
                <p>Lorem Ipsum Dolorit</p>
            </div>
            <div class="row px-5 mx-2">
                <b>Saturday:</b>
                <p>Lorem Ipsum Dolorit</p>
            </div>
            <div class="row px-5 mx-2">
                <b>Sunday:</b>
                <p>--Closed--</p>
            </div>
        </div>

        <div class="container">
            <div class="row p-4">
                <p class="h2">Mission:</p>
            </div>
            <div class="row px-5 mx-2">
                <p>Lorem Ipsum Dolorit</p>
            </div>

        </div>
            
        </div>
    </div>
    
    
<div class="mt-5">
    <footer class="py-4 bg-dark text-light">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-2 ms-5 text-center">
                    <img src="../Components/images/footer-logo.png" alt="" class="w-100 rounded">
                    
                </div>
                <div class="col-md-2 ms-5">
                    <ul class="list-reset">
                        <li><a class="text-light" href="#">Information</a></li>
                        <li><a class="text-light" href="#">Services</a></li>
                        <li><a class="text-light" href="#">Librarian</a></li>
                        <li><a class="text-light" href="#">Member Area</a></li>
                    </ul>
                </div>
                <div class="col pt-8 md:pt-0">
                    <h4 class="mb-4">About Us</h4>
                    <p>
                        This free online library management system was built by students of University of Santo Thomas in order to implement a library management effeciently. On this page, readers can view the books available in the library and make an appointment to borrow online. 
                        <br>
                        <br>
                        View More:
                        <a href="">LINK NG WEBSITE</a>
                        <!--to be changed to the actual website of the project when it is done-->
                    </p>
                </div>
                <div class="input-group-append text-end">
                    <a target="_blank" title="Contribute" class="btn btn-outline-light mb-2" href="#"><i class="fab fa-github mr-2"></i>Find out more</a>
                    <br>
                    <br>
                    <a target="_blank" title="Support Us" class="btn btn-outline-success mb-2" href="#"><i class="fas fa-heart mr-2"></i>Keep ShelfCore Alive</a>
                </div>
            </div>
            <hr>
            <div class="flex font-thin text-sm">
                <p class="flex-1">© 2026 — ShelfCore -ShelfCore Library Management Online</p>
            </div>
        </div>
    </footer>
</div>


        
    

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</html>


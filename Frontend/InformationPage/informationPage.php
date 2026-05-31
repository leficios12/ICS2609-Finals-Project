<?php
include_once '../Components/Header.php';
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

<body style="background-color: #FFFDF4;">
    
    <div class="container-fluid mt-5 pt-5 w-75" id="main-section">
        <div class="row p-3">
            <p class="h1 text-center">Library Information</p>
        </div>
        <hr class="mb-3">
        <div class="container">
            <div class="row p-4">
                <p class="h2">Contact Information</p>
            </div>
            <div class="row px-5 mx-2">
                <b>Address:</b>
                <p class="ms-5">University of Santo Thomas, España Boulevard, Sampaloc, Manila, 1008 Metro Manila, Philippines.</p>
            </div>
            <div class="row px-5 mx-2">
                <b>Phone Number:</b>
                <p class="ms-5">09XXXXXXXXX</p>
            </div>
            <div class="row px-5 mx-2">
                <b>Email:</b>
                <p class="ms-5">ShelfCore@lib.com</p>
            </div>
        </div>

        <div class="container">
            <div class="row p-4">
                <p class="h2">Operating Hours</p>
            </div>

            <div class="row px-5 mx-2">
                <b>Monday - Friday:</b>
                <p class="ms-5">Opening: 8:00AM</p>
                <p class="ms-5">Lunch Break: 12:00PM - 1:00PM</p>
                <p class="ms-5">Closing: 8:00PM</p>
            </div>

            <div class="row px-5 mx-2">
                <b>Saturday:</b>
                <p class="ms-5">Opening: 8:00AM</p>
                <p class="ms-5">Lunch Break: 12:00PM - 1:00PM</p>
                <p class="ms-5">Closing: 5:00PM</p>
            </div>
        </div>

        <div class="container">
            <div class="row p-4">
                <p class="h2">Collections:</p>
            </div>
            <div class="row px-5 mx-2">
                <p class="ms-5">Our library offers a wide variety of collections, ranging from fiction books to scientific materials. We provide both printed and digital resources, including CD-ROMs, CDs, VCDs, and DVDs. 
                                The library also maintains daily serial publications such as newspapers, as well as monthly publications like magazines.</p>
            </div>
        </div>
            
        <div class="container">
            <div class="row p-4">
                <p class="h2">Membership Information:</p>
            </div>
            <div class="row px-5 mx-2">
                <p class="ms-5">To borrow materials from our library, visitors must first register as a library member. All members are expected to follow the library’s terms and conditions.</p>
            </div>
        </div>
            <hr class="mb-3">
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</html>


<?php
include_once '../Components/Footer.php';
?>


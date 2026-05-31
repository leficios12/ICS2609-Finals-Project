<?php
include_once '../Components/Header.php';
?>  

<link rel="stylesheet" href="Homepage.css">


 
<div class="Upper-Section">
    <img src="./images/HomepageCover.jpg" class="img-fluid" id="Upper-Background" alt="Library Cover">
</div>

<div class="container text-center">
    <div class="row mt-5">
        <div class="display-3" id="main-header">Shelf Core Library</div>
    </div>
    <div class="row mx-4">
        <p class="lead">"A room without books is like a body without a soul"</p>
    </div>

    <div class="row pt-5">
        <p class="lead">Select a topic you're interested in</p>
    </div>
    <div class="row">
        <div class="col">
            <input type="button" value="Programming" id="topicBtn" class="btn rounded-5 px-4 py-2 m-2">
            <input type="button" value="Literature" id="topicBtn" class="btn rounded-5 px-4 py-2 m-2">
            <input type="button" value="Math" id="topicBtn" class="btn rounded-5 px-4 py-2 m-2">
            <input type="button" value="Science" id="topicBtn" class="btn rounded-5 px-4 py-2 m-2">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="button" value="RDBMS" id="topicBtn" class="btn rounded-5 px-4 py-2 m-2">
            <input type="button" value="History" id="topicBtn" class="btn rounded-5 px-4 py-2 m-2">
        </div>
    </div>
    <div class="row m-5">
        <hr>
    </div>

    <div class="row mb-4">
        <div class="col-md-6 mx-4">
            <p class="lead">Popular books within our collections</p>
            <div class="container rounded-1 p-5" id="popularBooksContainer">
                <div class="row">
                    <div class="col">
                        <div class="card border-0 rounded-3 p-2 pb-3" id="card-outer">
                        <img src="../Components/images/thealchemist.jpg" class="card-img-top rounded-2 mb-3" alt="" id="cardImg"> 
                            <div class="px-1">
                                <h6 class="text-white fw-bold mb-1">The Alchemist</h6>
                                <p class="mb-1" id="card-text">A young shepherd travels in search of treasure and self-discovery.</p>
                                <span id="card-text">Adventure</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0 rounded-3 p-2 pb-3" id="card-outer">
                            <img src="../Components/images/1984.jpg" class="card-img-top rounded-2 mb-3" alt="" id="cardImg">
                            <div class="px-1">
                                <h6 class="text-white fw-bold mb-1">1984</h6>
                                <p class="mb-1" id="card-text">A dystopian novel depicting life under a totalitarian government.</p>
                                <span id="card-text">Dystopian Fiction</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0 rounded-3 p-2 pb-3" id="card-outer">
                            <img src="../Components/images/percyjackson.jpg" class="card-img-top rounded-2 mb-3" alt="" id="cardImg">
                            <div class="px-1">
                                <h6 class="text-white fw-bold mb-1">Percy Jackson & the Lightning Thief</h6>
                                <p class="mb-1" id="card-text">A young boy discovers he is a demigod and embarks on a quest to prevent a war between the gods.</p>
                                <span id="card-text">Fantasy</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <p class="mt-5" id="quote">“Some books are undeservedly forgotten; none are undeservedly remembered.” — W. H. Auden</p>
                </div>
            </div>
        </div>

        <div class="col p-5 mt-5">
            <div class="row mt-5">
                <div class="display-5" id="main-header">Don't have an account yet?</div>
                <p class="h3">Create one now!</p>
            </div>
            <div class="row justify-content-center mt-4 mb-5">
                <input type="button" value="Create Account" id="createAccountBtn" class="btn p-3">
            </div>
        </div>
    </div>
</div>

<div class="container-fluid p-5 text-center" id="searchContainer">
    <div class="row">
        <p class="h1 text-white" id="main-header">Search the Library</p>
        <p class="lead text-white">Search the library’s print and online resources</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-6">
            <form class="d-flex justify-content-center">
                <div class="input-group w-100 m-3">
                    <input class="form-control p-3" id="searchBox" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary px-4" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container my-5 text-center">
    <div class="row">
        <div class="h1" id="main-header">Books within our collections</div>
        <div class="">Explore the latest styles and timeless essentials.</div>
    </div>

    <div class="row p-5" id="Cards">
        <div class="col">
            <div class="card border-0 rounded-3 p-2 pb-3" id="card-outer">
                <img src="../Components/images/thesilentpatient.jpg" class="card-img-top rounded-2 mb-3" alt="" id="cardImg">
                    <h6 class="text-white fw-bold mb-1">The Silent Patient</h6>
                    <p class="mb-1" id="card-text">A psychological thriller about a woman who stops speaking after a shocking crime.</p>
                    <span id="card-text">HOROR</span>
            </div>
        </div>

        <div class="col">
            <div class="card border-0 rounded-3 p-2 pb-3" id="card-outer">
                 <img src="../Components/images/atomichabits.jpg" class="card-img-top rounded-2 mb-3" alt="" id="cardImg">
                    <h6 class="text-white fw-bold mb-1">Atomic Habits</h6>
                    <p class="mb-1" id="card-text">Practical strategies for building good habits and breaking bad ones.</p>
                    <span id="card-text">Self-Help</span>
            </div>
        </div>

        <div class="col">
            <div class="card border-0 rounded-3 p-2 pb-3" id="card-outer">
                <img src="../Components/images/cardImg.jpg" class="card-img-top rounded-2 mb-3" alt="" id="cardImg"> 
                    <h6 class="text-white fw-bold mb-1">Beyond The Ocean Door</h6>
                    <p class="mb-1" id="card-text">Beyond the Ocean Door is a coming-of-age fantasy adventure novel by Amisha Sathi. </p>
                    <span id="card-text">Fiction</span>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 rounded-3 p-2 pb-3" id="card-outer">
                <img src="../Components/images/thehobbit.jpg" class="card-img-top rounded-2 mb-3" alt="" id="cardImg"> 
                    <h6 class="text-white fw-bold mb-1">The Hobbit</h6>
                    <p class="mb-1" id="card-text">A fantasy adventure following Bilbo Baggins on an unexpected journey.</p>
                    <span id="card-text">Fiction</span>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 rounded-3 p-2 pb-3" id="card-outer">
                <img src="../Components/images/prideandprejudice.jpg" class="card-img-top rounded-2 mb-3" alt="" id="cardImg">
                    <h6 class="text-white fw-bold mb-1">Pride and Prejudice</h6>
                    <p class="mb-1" id="card-text">A romantic novel set in Georgian England, exploring themes of social class and marriage.</p>
                    <span id="card-text">Fiction</span>
            </div>
        </div>
        <div class="col">
            <div class="card border-0 rounded-3 p-2 pb-3" id="card-outer">
                <img src="../Components/images/themartian.jpg" class="card-img-top rounded-2 mb-3" alt="" id="cardImg">
                    <h6 class="text-white fw-bold mb-1">The Martian</h6>
                    <p class="mb-1" id="card-text">A science fiction novel about an astronaut stranded on Mars.</p>
                    <span id="card-text">Fiction</span>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <p class="h5">Take a look through our full collection.</p>
    </div>
    <div class="row justify-content-center mb-5">
        <input type="button" name="" value="View All" class="btn p-3 w-25 text-white fw-bold" id="viewAllBtn">
    </div>
</div>
    <br>
<div class="row my-5">
    <hr>
    <br>
</div>
<div class="container my-5 text-center">
    <div class="row mt-5">
        <p class="display-4" id="main-header">What is ShelfCore?</p>
    </div>
    <div class="row">
        <div class="col p-3 m-5">
            <p class="lead">ShelfCore is a modern library management platform that brings libraries closer to readers through an accessible and user-friendly digital experience. 
            The system enables users to easily search catalogs, discover featured books, check availability, and access important library information from a single platform. </p>
        </div>
        <div class="col">
            <img src="./images/colImg.jpg" alt="" id="colImgages">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col p-3 m-5">
            <img src="./images/colImg2.jpg" alt="" id="colImgages">
        </div>
        <div class="col p-3 m-5">
            <p class="lead">Designed with usability and efficiency in mind, ShelfCore simplifies everyday library transactions while reducing the time and effort needed to find and manage resources. Whether users are browsing collections, reserving materials, or keeping track of their library activities, ShelfCore provides a convenient and reliable solution that enhances the overall library experience for both members and administrators.</p>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<?php
include_once '../Components/Footer.php';
?>
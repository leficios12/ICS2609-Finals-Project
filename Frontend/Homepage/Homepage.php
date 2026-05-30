<?php
include_once '../Components/Header.php';
?>  

<link rel="stylesheet" href="Homepage.css">


 
<div class="Upper-Section">
    <img src="../images/HomepageCover.jpg" class="img-fluid" id="Upper-Background" alt="Library Cover">
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
                            <div class="rounded-2 mb-3" id="card-inner"></div>
                            <div class="px-1">
                                <h6 class="text-white fw-bold mb-1">Title</h6>
                                <p class="mb-1" id="card-text">Short description</p>
                                <span id="card-text">Genre</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0 rounded-3 p-2 pb-3" id="card-outer">
                            <div class="rounded-2 mb-3" id="card-inner"></div>
                            <div class="px-1">
                                <h6 class="text-white fw-bold mb-1">Title</h6>
                                <p class="mb-1" id="card-text">Short description</p>
                                <span id="card-text">Genre</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0 rounded-3 p-2 pb-3" id="card-outer">
                            <div class="rounded-2 mb-3" id="card-inner"></div>
                            <div class="px-1">
                                <h6 class="text-white fw-bold mb-1">Title</h6>
                                <p class="mb-1" id="card-text">Short description</p>
                                <span id="card-text">Genre</span>
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


<?php
include_once '../Components/Footer.php';
?>
<?php
include_once '../Components/Header.php';
?>  

<link rel="stylesheet" href="FAQ.css">
<br>
<br>
<br>
<div class="container text-center mt-5" id="upperContainer">
    <div class="row mt-5">
        <p class="display-5" id="main-header">Frequently Asked Questions</p>
        <p class="h3 fw-bold">Got questions? We have answers!</p>
    </div>
    <div class="row my-5">
        <hr>
    </div>
</div>
<div class="row p-1" id="firstContainerRow">
    <div class="col-md-4 col-12 ">
        <div class="faq-item my-4">
            <div class="faq-header" onclick="toggleFaq(this)">
                <p class="h3" id="main-header">Searching</p>
                <span class="faq-toggle"></span>
            </div>
            <div class="faq-body">
                <p>Users may search for library materials by entering keywords such as the title, author, subject, or category in the search bar. Advanced search filters may also be used to narrow down results and quickly find available resources.</p>
            </div>
        </div>
        <div class="faq-item my-4">
            <div class="faq-header" onclick="toggleFaq(this)">
                <p class="h3" id="main-header">Borrowing Guidelines</p>
                <span class="faq-toggle"></span>
            </div>
            <div class="faq-body">
                <p>Library members may borrow selected materials from the library collection. Borrowed items must be returned on or before the due date to avoid penalties or temporary suspension of borrowing privileges.</p>
                <p>General Guidelines:</p>
                <ul>
                    <li> Present a valid library account before borrowing materials.</li>
                    <li> Handle all materials responsibly.</li>
                    <li> Return borrowed items on time.</li>
                    <li> Report damaged or lost materials immediately.</li>
                </ul>
            </div>
        </div>
        <div class="faq-item my-4">
            <div class="faq-header" onclick="toggleFaq(this)">
                <p class="h3" id="main-header">Library Membership</p>
                <span class="faq-toggle"></span>
            </div>
            <div class="faq-body">
                <p>To access borrowing services and digital resources, users must first register as a library member. Membership allows access to both printed and digital collections available in the library.</p>
                <p>General Guidelines:</p>
                <ul>
                    <li>  Valid school or government ID</li>
                    <li>  Completed registration form</li>
                    <li>  Acceptance of library policies and regulations</li>
                </ul>
            </div>
        </div>
        <div class="faq-item my-4">
            <div class="faq-header" onclick="toggleFaq(this)">
                <p class="h3" id="main-header">Access to Digital Resources</p>
                <span class="faq-toggle"></span>
            </div>
            <div class="faq-body">
                <p>Users may search for library materials by entering keywords such as the title, author, subject, or category in the search bar. Advanced search filters may also be used to narrow down results and quickly find available resources.</p>
            </div>
        </div>
    </div>
    <div class="col">
        <img src="FAQcolimg.png" alt="" id="col2Img">
    </div>
  </div>
 
</div>

<script>
  function toggleFaq(header) {
    const item = header.closest('.faq-item');
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item').forEach(el => el.classList.remove('open', 'active'));
    if (!isOpen) item.classList.add('open', 'active');
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<?php
include_once '../Components/Footer.php';
?>
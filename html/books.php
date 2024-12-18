<?php 
session_start();

    $_SESSION['title']= "Books";
    include "../components/header.php";
    require "../ErrorHandle/errorHandler.php";
?>

  <div id="large-th">
    <div class="kontinier">
      <h1 style="font-size: 40px; margin-top: 100px;">Books In Stock</h1>
      <br>
      <div class="dropdown">
   
    </div>
      <div class="choose">
        <a href="#list-th"><i class="fa fa-th-list" aria-hidden="true"></i></a>
        <a href="#large-th"><i class="fa fa-th-large" aria-hidden="true"></i></a>
      </div>
      <div id="list-th">
      <?php
      include "../js/books.php";
      trigger_error("Ky është një gabim testues!!", E_USER_WARNING);
      ?>
     <script>
function addToCart(bookTitleId) {
    var formData = new FormData(document.getElementById('add-to-cart-form-' + bookTitleId)); // Get the form data

    // Send the form data using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'add_to_cart.php', true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Request was successful, handle the response here if needed
            console.log(xhr.responseText);
        } else {
            // Request failed, handle errors here
            console.error(xhr.statusText);
        }
    };
    xhr.onerror = function() {
        // Request failed, handle errors here
        console.error('Request failed');
    };
    xhr.send(formData);
}
</script>

      </div>
    </div>
  </div>

  <div id="shigjeta"></div>
  
  <script>
    document.addEventListener('click', function(event) {
      if (event.target.closest('.menu-toggle')) {
          document.querySelector('.navElements').classList.toggle('active');
          document.querySelector('.menu-toggle').classList.toggle('active');
      }
  });
  </script>
  <script>
    var z = 0;
    function myfunction(){
        var x = document.body;
        x.classList.toggle("darkMode");
       
    }
  </script>
<div style="display: flex; justify-content: center;">
  <a href="BooksApi.php">The Book you were looking for isn't here</a>
</div>
    <?php
include "../components/footer.php"
?>
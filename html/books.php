<!--DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BOOKS</title>
  <script src="../js/loadHeader.js"></script>
  <script src="../js/footer.js"></script>
  <script src="../js/loadshigjeta.js"></script>
  <link rel="stylesheet" href="../css/books.css">-->
  <?php 
  session_start();
  $_SESSION['title']="Books";
  include "../components/header.php";
  ?>
  
  < <div id="large-th">
    <div class="kontinier">
      <h1 style="color: black;font-size: 40px; margin-top: 100px;">Books In Stock</h1>
      <br>
    <form method="POST">
        <label for="sort">Sort by:</label>
        <select name="sort" id="sort">
            <option value="title">Name</option>
            <option value="price">Price</option>
        </select>
        <input type="submit" value="Sort">
    </form>
      <div class="choose">
        <a href="#list-th"><i class="fa fa-th-list" aria-hidden="true"></i></a>
        <a href="#large-th"><i class="fa fa-th-large" aria-hidden="true"></i></a>
      </div>
      <div id="list-th">
      <?php
      include "../js/bookss.php"
      ?>
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
<?php 
include "../components/footer.php"
?>
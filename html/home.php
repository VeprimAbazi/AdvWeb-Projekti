<?php include "../components/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/futeri.css">
    <title>OPENLIBRARY</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function () {
            document.querySelector('.navElements').classList.toggle('active');
            document.querySelector('.menu-toggle').classList.toggle('active');
        });
    </script>
    
    <section class="features">
        <div id="txt">
           <h1 style="font-style:oblique;" class="text-uppercase">Welcome to Our Library</h1>
        <h4 style="font-style: oblique;" class="text-uppercase">Enrich your knowledge by using our books</h4> 
        </div>
        
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <video id="video1" autoplay loop>
                        <source src="../video/video3.mp4">
                    </video>
                </div>
                <div class="col-md-6">
                    "Within the pages of a book lies a boundless universe waiting to be explored. Every chapter, every sentence is an invitation to embark on a journey of discovery, knowledge, and imagination. Books possess the remarkable ability to transport us to distant lands, introduce us to captivating characters, and teach us invaluable lessons. They are a sanctuary for the mind, offering solace, inspiration, and a window into realms unknown. Embrace the magic of reading, for in each book, a treasure trove of wisdom and wonder awaits. Open its cover, and let the adventure begin." 
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    "Books are the plane, and the train, and the road. They are the destination, and the journey. They are home."     - Anna Quindlen  <br><br><br>
                    "Reading is escape, and the opposite of escape; It's a way to make contact with reality after a day of making things up, and it's a way of making contact with someone else's imagination after a day that's all too real."  - Nora Ephron
                </div>
                <div class="col-md-6">
                    <video id="video2" autoplay loop>
                        <source src="../video/video2.mp4">
                    </video>
                </div>
            </div>
             <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <video id="video1" autoplay loop>
                        <source src="../video/video1.mp4">
                    </video>
                </div>
                <div class="col-md-6">  
                    "Reading furnishes the mind only with materials of knowledge; it is thinnking that makes what we read ours."- John Locke  <br><br><br>
                    “Reading is escape, and the opposite of escape; it's a way to make contact with reality after a day of making things up, and it's a way of making contact with someone else's imagination after a day that's all too real.” ― Nora Ephron<br><br><br>
                    "if you are going to plant for one year, plant corn and wheat. If you are going to plant forever, plant education and culture" - Sami Frash&eumlri
               </div>
            </div>
        </div>
    </section>
    


    
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
            var y = document.getElementById('txt');
            x.classList.toggle("darkMode");
            if(z == 1){
                y.style.backgroundColor = '#f4f4f4';
                z = 0;
            }else{
                y.style.backgroundColor = "#000000";
                z = 1;
        }
        }
      </script>
</body>
</html>
<?php
include "../components/footer.php"
?>
   
  
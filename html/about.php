<?php 
session_start();

    $_SESSION['title']= "About US";
    include "../components/header.php";
?>
    <link rel="stylesheet" href="../css/about.css">
    
<style>
        #myDiv {
        width: 300px; 
        color:white;
        margin: 20px;
        padding: 20px;
        background-color: rgb(176,35,34);
        }
        #btnSlide { 
        width: 60px;
        padding: 8px;
        background-color: red;
        color: #ffffff;
        border: none;
        border-radius: 15px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.2s;
        }
     </style>

    <div class="krejt">
    <div class="banner">
        <div class="content">
            
         
          
             <h5><span>Online library</span></h5>
                 <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Welcome to our online library, where the captivating world of literature meets the convenience of the digital age.
                     Established with a passion for knowledge and a commitment to fostering a love for reading, our virtual sanctuary is a haven for book enthusiasts and lifelong learners alike.
                     At the heart of our mission is the belief that access to literature should be seamless and limitless. With an extensive collection spanning diverse genres, authors, and cultures, we strive to create a literary haven that transcends boundaries and connects readers across the globe. 
                     Our user-friendly interface ensures an immersive and enjoyable experience, empowering individuals to explore the vast realms of human thought and imagination. Whether you seek classic literature, contemporary masterpieces, or niche subjects, our online library is your gateway to a world of literary wonders.
                     Join us on this digital odyssey, where words come to life, and the joy of reading knows no bounds.</p>
                 </div>
        
    </div>
    <div id="shigjeta"></div>
</div>
</script>
<div class="krejt">
<button id="btnSlide" style="background-color: rgb(176,35,34);" >Team</button>
<div id="myDiv">Worked on this project:<br>
     Veprim Abazi<br>Anton Noci
</div>
</div>
<script>
   $(document).ready(function(){
      $("#myDiv").hide();
      var randomNumber = Math.floor(Math.random() * 3) + 1;
      $("#btnSlide").click(function(){
         if (randomNumber == 1){
         $("#myDiv").slideToggle(1000, function(){               
         });}else if (randomNumber == 2){
             $("#myDiv").fadeToggle(1000, function(){              
         });}else {
             $("#myDiv").animate({width: 'toggle', height: 'toggle'}, 1000, function(){
         });}
      });
   });

    document.addEventListener('click', function(event) {
      if (event.target.closest('.menu-toggle')) {
          document.querySelector('.navElements').classList.toggle('active');
          document.querySelector('.menu-toggle').classList.toggle('active');
      }
  });
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    ctx.font = "30px Arial";
    ctx.fillStyle= '#ffffff';
    ctx.fillText("About Us",35,70);

    var z = 0;
    function myfunction(){
        var x = document.body;
        x.classList.toggle("darkMode");

    }
  </script>

<?php
include "../components/footer.php";
?>
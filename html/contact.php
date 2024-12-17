<!--DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT</title>--> 
<?php 
session_start();
    $_SESSION['title']= "Contact";
    include "../components/header.php";
?>
    <link rel="stylesheet" href="../css/Contact.css">
    <link rel="stylesheet" href="/css/snowfall.css"> 

    <div id="snowfall"></div>

    <script src="/js/app.js"></script>
  
        <div class="all">
        <div class="form-field">
            <div class="kontinier">
                <div class="kontaktet">
                <div class="content"> .
                    <h2>Contact us</h2>
                </div>
            <div class="contact-info">  
                 <div class="info-box">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="text">
                            <h3>Phone</h3>
                            <abbr title="+383 45 432 321" style="text-decoration: none;"><p>045 432 321</p></abbr>
                        </div>
                </div>
            
                
                <div class="info-box">
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                        <div class="text">
                            <h3>Email</h3>
                           <address>Openlibrary@gmail.com</address>
                        </div>
                </div>
                
                <div class="info-box">
                    <div class="icon"><i class="fab fa-facebook-f"></i></div>
                        <div class="text">
                            <h3>Facebook</h3>
                            <script>document.write("Open Library")</script>    
                        </div>
                    </div>
                <div class="info-box">
                    <div class="icon"><i class="fab fa-instagram"></i></div>
                        <div class="text">
                            <h3>Instagram</h3>
                            <p>Open Library</p>
                        </div>
                    </div>
                 </div>
                </div>
            </div>
            <div class="komenti">
                <div class="form-komenti">
                    <form action="">
                    <div class="inputbox">
                        <input type="text" placeholder="Name" required class="Data" id="name">
                    </div>
                    <div class="inputbox">
                        <input type="text" placeholder="Last Name" required class="Data" id="lastname">
                    </div>
                    <div class="inputbox">
                        <input type="email" placeholder="E-mail" required class="Data" id="email">
                    </div>
                    <div class="inputbox">
                        <textarea name="freefrom" id="komenti" cols="30" rows="3" placeholder="Enter comment here..." required></textarea>
                    </div>
                    <div class="inputbox">
                        <div class="submitreset">
                            <input type="submit" value="Submit" id="submit">
                            <input type="reset" value="Reset" id="submit">
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <table class="shcedule">
                <tr>
                    <th colspan="2">Schedule of taking your orders</th>
                </tr>
                <tr>
                   <td>Day</td>
                   <td>Time</td>
                </tr>
                <tr>
                   <td>Monday</td>
                   <td>7:00 - 17:00</td>
                </tr>
                <tr>
                   <td>Tuesday</td>
                   <td>7:00 - 17:00</td>
                </tr>
                <tr>
                   <td>Wednesday</td>
                   <td>7:00 - 17:00</td>
                </tr>
                <tr>
                   <td>Thursday</td>
                   <td>7:00 - 17:00</td>
                </tr>
                <tr>
                   <td>Friday</td>
                   <td>7:00 - 17:00</td>
                </tr>
                <tr>
                   <td>Weekend</td>
                   <td>Not available</td>
                </tr>
               </table>
            </div>
        </div>
    </div>
        <script>
            document.addEventListener('click', function(event) {
              if (event.target.closest('.menu-toggle')) {
                  document.querySelector('.navElements').classList.toggle('active');
                  document.querySelector('.menu-toggle').classList.toggle('active');
              }
          });
          </script>
<?php
include "../components/footer.php";
?>
<?php 
session_start();
$_SESSION['title'] = "Contact";
include "../components/header.php";
?>

<link rel="stylesheet" href="../css/Contact.css">
<div class="all">
    <div class="form-field">
        <div class="kontinier">
            <div class="kontaktet">
                <div class="content">
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
                <form method="POST" action="../SendMail/send.php">
                    Email: <input type="email" name="email" required><br><br><br>
                    Subject: <input type="text" name="subject" required><br><br><br>
                    Message: <input type="text" name="message" required><br><br><br>
                    <button type="submit" name="send">Send</button>
                </form>
            </div>
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
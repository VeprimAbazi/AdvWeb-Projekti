<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/futeri.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Function to format the date and time
    function formatDate(date) {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', timeZoneName: 'short' };
        return date.toLocaleDateString('en-US', options);
    }

    // Display the current date and time
    function updateDateTime() {
        const currentDateElement = document.getElementById('currentDate');
        const currentDate = new Date();
        currentDateElement.innerText = formatDate(currentDate);
    }

    // Update the date and time every second
    setInterval(updateDateTime, 1000);

    // Initial display
    updateDateTime();
});
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
 

</head>


<body class="body"> -->
    
        <div class="futeri">
            <div class="futeri1">
                    <ol class="futeri2">
                        <li>
                            <div class="social-links">
                                <a href="https://www.facebook.com/"><img src="/fotot/facebook.png" alt="instagram" class="img"></a>
                                <a href="https://www.instagram.com/"><img src="/fotot/instagram (1).png" alt="Facebook" class="img"></a>
                                <a href="https://www.google.com/gmail/about/"><img src="/fotot/email.png" alt="email" class="img"></a>
                            </div>
                        </li>
                        <li class="navigations">
                            <div class="renipar justify-content-center align-items-center">
                                <ul class="futeri2">
                                    <li><a href="/html/About.html">Info</a></li>
                                    <li><a href="/html/contact.html">Support</a></li>
                                    <li><a href="">Marketing</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="reniDyte">
                            <ul class="futeri2">
                                <li><a href="">Tearms of Use and Privacy Policy</a></li>
                            </ul>
                        </li>
                        <li class="reniItret">
                            <ul class="futeri2">
                                <li><p>Copyright</p></li>
                            </ul>
                        </li>
                    </ol>
                    <div id="currentDate"></div>
            </div>
        </div>
</body>
</html>

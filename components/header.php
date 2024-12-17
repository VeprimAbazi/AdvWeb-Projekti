<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['title']?></title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/futeri.css">
    <link rel="stylesheet" href="../css/offers.css"> 
    <link rel='stylesheet' href='../css/books.css' type='text/css' />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kristi&family=Open+Sans:wght@300&family=Praise&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
        <nav>
            <div class="menu-toggle">
                <div class="hamburger"></div>
            </div>
        <ul class="navElements">
            <li class="a1"><a href="../html/home.php">Home</a></li>
            <li class="a1"><a href="../html/books.php">Books</a></li>
            <li class="a1"><a href="../html/offers.php">Offers</a></li>
            <li class="a1"><a href="../html/contact.php">Contact Us</a></li>
            <li class="a1"><a href="../html/about.php">About</a></li>
            <li class="a1"><a href="../html/SignIn.php">Log Out</a></li>
            <li class="a2"><label class="switch">
                <input type="checkbox" onclick="myfunction()">
                <span class="slider round"></span>
              </label></li>
        </ul>
    </nav>
    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function () {
            document.querySelector('.navElements').classList.toggle('active');
            document.querySelector('.menu-toggle').classList.toggle('active');
        });
    </script>
</body>
</html>
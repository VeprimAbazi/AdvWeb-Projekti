<?php
session_start();
include './database/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashed_password = $row['password'];

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $row['id'];
                
                if (isset($_POST['remember'])) {
                    setcookie("user_id", $row['id'], time() + (86400 * 30), "/");
                }
                header("Location: ./html/home.php");
                exit();
            } else {
                echo "<script>
                alert('Incorrect Password or email')
                </script>";
            }
        } else {
            echo "<script>
                alert('Incorrect Password or email')
                </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="./css/SignIn.css">
</head>
<body>
    <div class="signin-form">
        <div class="content1">
            <h2>Welcome to Open Library!</h2>
            <p id="paragraf">Unlock a world of knowledge with a click. Explore our digital shelves filled with e-books, audiobooks, and resources. Dive into learning, discovery, and endless stories from anywhere, anytime. Join us on this journey of exploration and enlightenment.
            <br><br>
            </p><p id="paragraf">
            Happy reading!
            </p>
        </div>
    
        <form action="index.php" method="post">
            <div class="content">
                <h2>Sign In</h2>
                <div class="inputBox">
                    <input type="email" name="email" placeholder="Email" id="emailpassword" autocomplete="on" required>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="inputBox1">
                    <input type="checkbox" name="remember" id="inputBox">
                    <label for="inputBox">Remember me</label>
                </div>
                <div class="inputBox">
                    <input type="submit" value="Login" id="submit">
                </div>
                <h5>Don't have an account? &nbsp;<a href="html/SignUp.php">Sign Up here</a></h5>
            </div>  
        </form>
    </div>
</body>
</html>
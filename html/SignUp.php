<?php
session_start();
include '../database/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $birthday_month = $_POST['birthday_month'];
    $birthday_day = $_POST['birthday_day'];
    $birthday_year = $_POST['birthday_year'];

    if ($password !== $confirmPassword) {
        echo "<script>
                alert('Passwords do not match');
                document.location.href = '../html/SignUp.php'
                </script>";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        
        $tableCreateSQL = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            username VARCHAR(255) NOT NULL UNIQUE,
            gender VARCHAR(10),
            birthday DATE
        )";
        $pdo->exec($tableCreateSQL);

        
        $stmt = $pdo->prepare("INSERT INTO users (email, password, username, gender, birthday) VALUES (:email, :password, :username, :gender, :birthday)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':gender', $gender);
        $birthday = "$birthday_year-$birthday_month-$birthday_day";
        $stmt->bindParam(':birthday', $birthday);

        $stmt->execute();
        echo "User registered successfully!";
        header("Location: ../html/home.php");
        exit();
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
    <link rel="stylesheet" href="../css/SignUp.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="krejt">
        <div class="container">
            <h1>Sign Up</h1>
            <form action="signup.php" method="post" onsubmit="return validateForm()">
                <div class="form-field">
                    <label for="email"></label>
                    <input type="email" name="email" id="email" placeholder="Email" autocomplete="on" required>
                </div>
                <div class="form-field">
                    <label for="password"></label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="form-field">
                    <label for="confirmPassword"></label>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
                    <span id="passwordError" class="error"></span>
                </div>
                <div class="form-field">
                    <label for="username"></label>
                    <input type="text" name="username" id="username" placeholder="Username" autocomplete="on" required>
                    <span id="usernameError" class="error"></span>
                </div>
                <label for="gender">Gender:</label>
                <div class="radio-group">
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                   
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                   
                    <input type="radio" id="custom" name="gender" value="custom">
                    <label for="custom">Custom</label>
                </div>
                <div class="ditlindja"> 
                    <label for="birthday">Birthday:</label>
                    <div class="form-item">
                        <label for="birthday_day"></label>
                        <input type="number" id="birthday_day" name="birthday_day" min="1" max="31" placeholder="Day" required>
                        <label for="birthday_month"></label>
                        <input type="number" id="birthday_month" name="birthday_month" min="1" max="12" placeholder="Month" required>
                        <label for="birthday_year"></label>
                        <input type="number" id="birthday_year" name="birthday_year" placeholder="Year" min="1950" max="2024" required>
                        <span id="birthdayError" class="error"></span>
                    </div>
                    <div class="butoni">
                        <input type="submit" value="Sign Up" id="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php
session_start();
require '../database/dbconnection.php';

// Kontrollo nëse formulari është dërguar
if (isset($_POST['submit'])) {
    // Merr të dhënat nga formulari
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $image = $_POST['image']; // Linku i imazhit

    // Verifikoni nëse URL është valide
    if (filter_var($image, FILTER_VALIDATE_URL)) {
        // Shto librin në bazën e të dhënave
        try {
            $stmt = $pdo->prepare("INSERT INTO books (title, author, price, image) VALUES (?, ?, ?, ?)");
            $stmt->execute([$title, $author, $price, $image]);

            // Redirect në dashboard pas shtimit të librit
            header("Location: dashboard.php");
            exit();
        } catch (PDOException $e) {
            die("Gabim gjatë shtimit të librit: " . $e->getMessage());
        }
    } else {
        echo "Invalid image URL."; // Mesazh nëse URL-ja e imazhit është e pasaktë
    }
}
?>

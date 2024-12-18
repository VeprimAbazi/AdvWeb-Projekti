<?php

session_start();

require_once '../database/dbconnection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book_title'])) {
    $book_title = filter_input(INPUT_POST, 'book_title', FILTER_SANITIZE_STRING);
    $book_author = filter_input(INPUT_POST, 'book_author', FILTER_SANITIZE_STRING);
    $book_price = filter_input(INPUT_POST, 'book_price', FILTER_VALIDATE_FLOAT);

    if ($book_title && $book_author && $book_price !== false) {
        try {
        
            $stmt = $pdo->prepare('INSERT INTO shopping_cart (book_title, book_author, book_price) VALUES (:book_title, :book_author, :book_price)');
            $stmt->bindParam(':book_title', $book_title, PDO::PARAM_STR);
            $stmt->bindParam(':book_author', $book_author, PDO::PARAM_STR);
            $stmt->bindParam(':book_price', $book_price, PDO::PARAM_STR);
            $stmt->execute();

            if (isset($_SESSION['cart'][$book_title])) {
                $_SESSION['cart'][$book_title]['sasi']++;
            } else {
                $_SESSION['cart'][$book_title] = [
                    'autor' => $book_author,
                    'çmim' => $book_price,
                    'sasi' => 1
                ];
            }
        } catch (PDOException $e) {
            echo 'Gabim: ' . $e->getMessage();
        }
    } else {
        echo 'Të dhëna të pavlefshme.';
    }
}


header('Location: cart.php');
exit();



?>





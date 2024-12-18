<?php

require '../database/dbconnection.php';


function fetchBooksFromDatabase($pdo)
{
    try {
        $query = "SELECT image, author, title, price FROM books";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
        die("Error fetching books: " . $e->getMessage());
    }
}


// Function to populate DOM
function populateDom($books)
{
    $output = '';
    foreach ($books as $book) {
        $bookTitleId = htmlspecialchars($book['title']);
        $output .= "<div class='offer-card'>" .
            "<img src='" . htmlspecialchars($book['image']) . "'>" .
            "<div class='description'>" .
            "<div class='text'>" .
            "<h2>" . htmlspecialchars($book['title']) . "</h2>" .
            "<h3>" . htmlspecialchars($book['author']) . "</h3>" .
            "<span id='price'>" . htmlspecialchars($book['price']) . "</span>" .
            "</div>" .
            "<div class='button'>" .
            "<form id='add-to-cart-form-$bookTitleId' method='post'>" .
            "<input type='hidden' name='book_title' value='" . htmlspecialchars($book['title']) . "'>" .
            "<input type='hidden' name='book_author' value='" . htmlspecialchars($book['author']) . "'>" .
            "<input type='hidden' name='book_price' value='" . htmlspecialchars($book['price']) . "'>" .
            "<input type='button' value='Add to Cart' onclick='addToCart(\"$bookTitleId\")'>" .
            "</form>" .
            "</div>" .
            "</div>" .
            "</div>";
    }
    echo $output;
}


$books = fetchBooksFromDatabase($pdo);
populateDom($books);
?>

<?php


// Include database connection
require_once '../database/dbconnection.php';

// Fetch books on sale from the database
try {
    $stmt = $pdo->query("SELECT image, author, title, price, discount FROM booksonsale");
    $booksonsale = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch data as an associative array
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}

// Function to generate HTML
function populateDom($booksonsale)
{
    $output = '';
    foreach ($booksonsale as $book) {
        $bookTitleId = htmlspecialchars($book['title']);
        $output .= "<div class='offer-card'>" .
            "<img src='" . htmlspecialchars($book['image']) . "'>" .
            "<div class='description'>" .
            "<div class='text'>" .
            "<h2>" . htmlspecialchars($book['title']) . "</h2>" .
            "<h3>" . htmlspecialchars($book['author']) . "</h3>" .
            "<p id='real'>" . htmlspecialchars($book['discount']) . " " .
            "<span id='price'>" . htmlspecialchars($book['price']) . "</span></p>" .
            "</div>" .
            "<div class='button'>" .
            "<form id='add-to-cart-form-$bookTitleId' method='post'>" .
            "<input type='hidden' name='book_title' value='" . htmlspecialchars($book['title']) . "'>" .
            "<input type='hidden' name='book_author' value='" . htmlspecialchars($book['author']) . "'>" .
            "<input type='hidden' name='book_price' value='" . htmlspecialchars($book['discount']) . "'>" .
            "<input type='button' value='Add to Cart' onclick='addToCart(\"$bookTitleId\")'>" .
            "</form>" .
            "</div>" .
            "</div>" .
            "</div>";
    }
    echo $output;
}

// Check if books were fetched
if (!empty($booksonsale)) {
    populateDom($booksonsale);
} else {
    echo "<p>No books found on sale.</p>";
}
?>

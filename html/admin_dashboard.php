<?php
session_start();
require '../database/dbconnection.php';

// Kontrolli i aksesit për admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../index.php");
    exit();
}

// Tërheqja e librave
try {
    $stmt = $pdo->prepare("SELECT * FROM books");
    $stmt->execute();
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Gabim gjatë tërheqjes së librave: " . $e->getMessage());
}

// Tërheqja e ofertave
try {
    $stmt = $pdo->prepare("
        SELECT bs.id, b.title, bs.discount, bs.start_date, bs.end_date, bs.price
        FROM booksonsale bs
        JOIN books b ON bs.book_id = b.id
    ");
    $stmt->execute();
    $offers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Gabim gjatë tërheqjes së ofertave: " . $e->getMessage());
}

// Handle the form submission to add a book to offers
if (isset($_POST['add_to_offer'])) {
    $book_id = $_POST['book_id'];
    $discount = $_POST['discount'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Fetch the selected book details (including the price)
    try {
        $stmt = $pdo->prepare("SELECT * FROM books WHERE id = :book_id");
        $stmt->bindParam(':book_id', $book_id);
        $stmt->execute();
        $book = $stmt->fetch(PDO::FETCH_ASSOC);

        // Calculate the discounted price (optional)
        $original_price = $book['price'];
        $discounted_price = $original_price - ($original_price * ($discount / 100));

        // Insert the new offer into the booksonsale table
        $stmt = $pdo->prepare("INSERT INTO booksonsale (book_id, title, author, image, price, discount, start_date, end_date) 
                               VALUES (:book_id, :title, :author, :image, :price, :discount, :start_date, :end_date)");
        $stmt->bindParam(':book_id', $book_id);
        $stmt->bindParam(':title', $book['title']);
        $stmt->bindParam(':author', $book['author']);
        $stmt->bindParam(':image', $book['image']);
        $stmt->bindParam(':price', $book['price']); // Add original price
        $stmt->bindParam(':discount', $discount);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->execute();

        // Redirect or show a success message
        header("Location: admin_dashboard.php"); // Refresh the page to show updated offers
        exit();
    } catch (PDOException $e) {
        die("Error adding book to offer: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Admin Dashboard - Manage Books & Offers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .tab-buttons {
            margin-bottom: 20px;
        }
        .tab-buttons button {
            padding: 10px 20px;
            margin-right: 10px;
            cursor: pointer;
        }
        .section {
            display: none;
        }
        .section.active {
            display: block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => section.classList.remove('active'));
            document.getElementById(sectionId).classList.add('active');
            
            // Fshi formularin për shtimin e librit kur klikoni tek ofertat
            if (sectionId === 'offers-section') {
                document.getElementById('add-book-form').style.display = 'none';
            } else {
                document.getElementById('add-book-form').style.display = 'block';
            }
        }
    </script>
</head>
<body>
    <h1>Admin Dashboard - Manage Books & Offers</h1>

    <!-- Navigimi mes seksioneve -->
    <div class="tab-buttons">
        <button onclick="showSection('books-section')">Books</button>
        <button onclick="showSection('offers-section')">Offers</button>
    </div>

    <!-- Formular për shtimin e librit -->
    <div id="add-book-form">
        <h2>Add New Book</h2>
        <form action="add_book.php" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br><br>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required><br><br>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required><br><br>

            <label for="image">Image URL:</label>
            <input type="text" id="image" name="image" placeholder="Enter image URL" required><br><br>

            <button type="submit" name="submit">Add Book</button>
        </form>
    </div>

    <!-- Seksioni i librave -->
    <div id="books-section" class="section active">
        <h2>Books</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($book['id']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($book['image']); ?>" alt="Book Image" style="width: 50px; height: auto;"></td>
                        <td><?php echo htmlspecialchars($book['title']); ?></td>
                        <td><?php echo htmlspecialchars($book['author']); ?></td>
                        <td>$<?php echo htmlspecialchars($book['price']); ?></td>
                        <td>
                            <a href="edit_book.php?id=<?php echo $book['id']; ?>">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Seksioni i ofertave -->
    <div id="offers-section" class="section">
        <h2>Offers</h2>
        <table>
            <thead>
                <tr>
                    <th>Offer ID</th>
                    <th>Book Title</th>
                    <th>Discount (€)</th>
                    <th>Original Price</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($offers as $offer): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($offer['id']); ?></td>
                        <td><?php echo htmlspecialchars($offer['title']); ?></td>
                        <td><?php echo htmlspecialchars($offer['discount']); ?>€</td>
                        <td><?php echo htmlspecialchars($offer['price']); ?>€</td>
                        <td><?php echo htmlspecialchars($offer['start_date']); ?></td>
                        <td><?php echo htmlspecialchars($offer['end_date']); ?></td>
                        <td>
                            <a href="edit_offer.php?id=<?php echo $offer['id']; ?>">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Add Book to Offers Form -->
        <div class="admin-form-container">
            <h2>Add Book to Offers</h2>
            <form action="admin_dashboard.php" method="POST">
                <label for="book_id">Select Book:</label>
                <select name="book_id" id="book_id" required>
                    <option value="">Select a Book</option>
                    <?php
                    foreach ($books as $book) {
                        echo "<option value='" . $book['id'] . "'>" . htmlspecialchars($book['title']) . "</option>";
                    }
                    ?>
                </select>

                <label for="discount">Discount Price (€):</label>
                <input type="number" id="discount" name="discount" required step="0.01" min="0">

                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" required>

                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" required>

                <input type="submit" name="add_to_offer" value="Add to Offer">
            </form>
        </div>
    </div>
</body>
</html>

<?php
session_start();
require '../database/dbconnection.php';

// Kontrollo që admini është loguar
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../index.php");
    exit();
}

// Kontrollo nëse ka ardhur një ID e librit për t'u redaktuar
if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    
    // Tërheqja e të dhënave të librit nga databaza
    try {
        $stmt = $pdo->prepare("SELECT * FROM books WHERE id = :id");
        $stmt->bindParam(':id', $book_id, PDO::PARAM_INT);
        $stmt->execute();
        $book = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$book) {
            die("Libri nuk u gjet.");
        }
    } catch (PDOException $e) {
        die("Gabim gjatë tërheqjes së të dhënave të librit: " . $e->getMessage());
    }
}

// Përditësimi i librit
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    try {
        $stmt = $pdo->prepare("UPDATE books SET title = :title, author = :author, price = :price, image = :image WHERE id = :id");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':id', $book_id, PDO::PARAM_INT);
        $stmt->execute();

        // Përdorim redirect pas përditësimit për të shmangur dërgimin e formularit përsëri
        header("Location: admin_dashboard.php"); // Redirect te dashboard
        exit();
    } catch (PDOException $e) {
        die("Gabim gjatë përditësimit të librit: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>
    <form action="edit_book.php?id=<?php echo $book_id; ?>" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required><br><br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($book['author']); ?>" required><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($book['price']); ?>" step="0.01" required><br><br>

        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image" value="<?php echo htmlspecialchars($book['image']); ?>" required><br><br>

        <button type="submit" name="submit">Update Book</button>
    </form>
</body>
</html>

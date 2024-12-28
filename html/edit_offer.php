<?php
session_start();
require '../database/dbconnection.php';

// Kontrollo që admini është loguar
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: ../index.php");
    exit();
}

// Kontrollo nëse ka ardhur një ID e oferte për t'u redaktuar
if (isset($_GET['id'])) {
    $offer_id = $_GET['id'];
    
    // Tërheqja e të dhënave të ofertës nga databaza
    try {
        $stmt = $pdo->prepare("SELECT bs.id, b.title, bs.discount, bs.start_date, bs.end_date 
                               FROM booksonsale bs 
                               JOIN books b ON bs.book_id = b.id 
                               WHERE bs.id = :id");
        $stmt->bindParam(':id', $offer_id, PDO::PARAM_INT);
        $stmt->execute();
        $offer = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$offer) {
            die("Oferta nuk u gjet.");
        }
    } catch (PDOException $e) {
        die("Gabim gjatë tërheqjes së të dhënave të ofertës: " . $e->getMessage());
    }
}

// Përditësimi i ofertës
if (isset($_POST['submit'])) {
    $book_id = $_POST['book_id'];
    $discount = $_POST['discount'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    try {
        $stmt = $pdo->prepare("UPDATE booksonsale SET book_id = :book_id, discount = :discount, start_date = :start_date, end_date = :end_date WHERE id = :id");
        $stmt->bindParam(':book_id', $book_id);
        $stmt->bindParam(':discount', $discount);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->bindParam(':id', $offer_id, PDO::PARAM_INT);
        $stmt->execute();

        // Përdorim redirect pas përditësimit për të shmangur dërgimin e formularit përsëri
        header("Location: admin_dashboard.php"); // Redirect te dashboard
        exit();
    } catch (PDOException $e) {
        die("Gabim gjatë përditësimit të ofertës: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Offer</title>
</head>
<body>
    <h1>Edit Offer</h1>
    <form action="edit_offer.php?id=<?php echo $offer_id; ?>" method="POST">
        <label for="book_id">Book Title:</label>
        <select id="book_id" name="book_id" required>
            <option value="">Select Book</option>
            <?php
            // Tërheqja e librave për opsionin e listës
            try {
                $stmt = $pdo->prepare("SELECT * FROM books");
                $stmt->execute();
                $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                foreach ($books as $book) {
                    echo '<option value="' . htmlspecialchars($book['id']) . '" ' . ($book['id'] == $offer['book_id'] ? 'selected' : '') . '>';
                    echo htmlspecialchars($book['title']);
                    echo '</option>';
                }
            } catch (PDOException $e) {
                die("Gabim gjatë tërheqjes së librave: " . $e->getMessage());
            }
            ?>
        </select><br><br>

        <label for="discount">Discount (%):</label>
        <input type="number" id="discount" name="discount" value="<?php echo htmlspecialchars($offer['discount']); ?>" required><br><br>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo htmlspecialchars($offer['start_date']); ?>" required><br><br>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" value="<?php echo htmlspecialchars($offer['end_date']); ?>" required><br><br>

        <button type="submit" name="submit">Update Offer</button>
    </form>
</body>
</html>

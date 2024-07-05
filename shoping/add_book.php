
<?php
include('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target = "../images/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $stmt = $conn->prepare("INSERT INTO books (title, author, price, description, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdss", $title, $author, $price, $description, $image);

        if ($stmt->execute()) {
            header("Location: manage_books.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Failed to upload image";
    }
}
?>

<?php include('header.php'); ?>
<form method="post" action="" enctype="multipart/form-data">
    <h2>Add Book</h2>
    <label for="title">Title:</label>
    <input type="text" name="title" required>
    <label for="author">Author:</label>
    <input type="text" name="author" required>
    <label for="price">Price:</label>
    <input type="number" step="0.01" name="price" required>
    <label for="description">Description:</label>
    <textarea name="description" required></textarea>
    <label for="image">Image:</label>
    <input type="file" name="image" required>
    <button type="submit">Add Book</button>
</form>
<?php include('footer.php'); ?>

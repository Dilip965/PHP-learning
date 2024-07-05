<?php
include('config.php');
session_start();

$result = $conn->query("SELECT * FROM books");

?>

<?php include('header.php'); ?>
<h2>Book Catalog</h2>
<div class="book-catalog">
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="book-item">
            <img src="/images/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
            <h3><?php echo $row['title']; ?></h3>
            <p><?php echo $row['author']; ?></p>
            <p><?php echo $row['price']; ?></p>
            <a href="view.php?id=<?php echo $row['id']; ?>">View Details</a>
        </div>
    <?php endwhile; ?>
</div>
<?php include('footer.php'); ?>

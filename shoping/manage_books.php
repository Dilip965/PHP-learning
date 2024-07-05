<?php
include('../includes/config.php');
session_start();

$result = $conn->query("SELECT * FROM books");

?>

<?php include('../includes/header.php'); ?>
<h2>Manage Books</h2>
<a href="add_book.php">Add New Book</a>
<table>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td>
                <a href="edit_book.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete_book.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<?php include('../includes/footer.php'); ?>

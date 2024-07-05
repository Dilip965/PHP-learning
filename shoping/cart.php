<?php
include('../includes/config.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /user/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['add'])) {
    $book_id = $_GET['add'];
    $stmt = $conn->prepare("INSERT INTO cart (user_id, book_id, quantity) VALUES (?, ?, 1) ON DUPLICATE KEY UPDATE quantity = quantity + 1");
    $stmt->bind_param("ii", $user_id, $book_id);
    $stmt->execute();
    header("Location: cart.php");
}

if (isset($_GET['remove'])) {
    $cart_id = $_GET['remove'];
    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ?");
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    header("Location: cart.php");
}

$result = $conn->query("SELECT cart.id, books.title, books.price, cart.quantity FROM cart JOIN books ON cart.book_id = books.id WHERE cart.user_id = $user_id");

?>

<?php include('header.php'); ?>
<h2>Shopping Cart</h2>
<table>
    <tr>
        <th>Title</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><a href="cart.php?remove=<?php echo $row['id']; ?>">Remove</a></td>
        </tr>
    <?php endwhile; ?>
</table>
<a href="checkout.php">Checkout</a>
<?php include('footer.php'); ?>

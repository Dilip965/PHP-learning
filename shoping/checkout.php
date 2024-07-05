<?php
include('config.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /user/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = $conn->query("SELECT SUM(books.price * cart.quantity) AS total_amount FROM cart JOIN books ON cart.book_id = books.id WHERE cart.user_id = $user_id");
    $row = $result->fetch_assoc();
    $total_amount = $row['total_amount'];

    $stmt = $conn->prepare("INSERT INTO orders (user_id, total_amount) VALUES (?, ?)");
    $stmt->bind_param("id", $user_id, $total_amount);
    if ($stmt->execute()) {
        $order_id = $stmt->insert_id;
        $conn->query("INSERT INTO order_items (order_id, book_id, quantity) SELECT $order_id, book_id, quantity FROM cart WHERE user_id = $user_id");
        $conn->query("DELETE FROM cart WHERE user_id = $user_id");
        header("Location: /orders/orders.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}

?>

<?php include('header.php'); ?>
<h2>Checkout</h2>
<form method="post" action="">
    <button type="submit">Confirm Order</button>
</form>
<?php include('footer.php'); ?>

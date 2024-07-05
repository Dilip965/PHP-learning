<?php
include('config.php');
session_start();

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();

?>

<?php include('../includes/header.php'); ?>
<h2><?php echo $book['title']; ?></h2>
<img src="/images/<?php echo $book['image']; ?>" alt="<?php echo $book['title']; ?>">
<p><?php echo $book['author']; ?></p>
<p><?php echo $book['price']; ?></p>
<p><?php echo $book['description']; ?></p>
<a href="/cart/cart.php?add=<?php echo $book['id']; ?>">Add to Cart</a>
<?php include('../includes/footer.php'); ?>

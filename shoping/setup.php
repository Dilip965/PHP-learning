<?php
include('config.php');

$sql = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    book_id INT NOT NULL,
    quantity INT NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (book_id) REFERENCES books(id)
);

CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    book_id INT NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (book_id) REFERENCES books(id)
);

INSERT INTO users (username, password, email) VALUES
('john_doe', '" . password_hash('password123', PASSWORD_BCRYPT) . "', 'john@example.com'),
('jane_doe', '" . password_hash('securepassword', PASSWORD_BCRYPT) . "', 'jane@example.com');

INSERT INTO books (title, author, price, description, image) VALUES
('The Great Gatsby', 'F. Scott Fitzgerald', 10.99, 'A novel set in the Roaring Twenties.', 'great_gatsby.jpg'),
('1984', 'George Orwell', 8.99, 'A dystopian social science fiction novel and cautionary tale.', '1984.jpg'),
('To Kill a Mockingbird', 'Harper Lee', 12.99, 'A novel about the serious issues of rape and racial inequality.', 'to_kill_a_mockingbird.jpg');
";

if ($conn->multi_query($sql)) {
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
    echo "Tables created and sample data inserted successfully";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

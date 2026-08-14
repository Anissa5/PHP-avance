<?php

session_start();



if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit;
}

$pdo = new PDO (
    'mysql:host=localhost;dbname=library;charset=utf8mb4',
    'root',
    ''
);

if (!isset ($_SESSION['cart'])) {
    $_SESSION ['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {
    $bookId = $_POST['book_id'];

    if (isset($_SESSION['cart'][$bookId])) {
        $_SESSION['cart'][$bookId]++;
    } else {
        $_SESSION['cart'][$bookId] = 1;
    }
}

foreach ($_SESSION['cart'] as $bookId => $quantity) {
    $stmt = $pdo->prepare('SELECT title FROM book WHERE id = ?');
    $stmt->execute([$bookId]);

    $book = $stmt->fetch();

    echo $book['title'] . ' - Quantité : ' . $quantity . '<br>';
}
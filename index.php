<?php

session_start();

require 'connec.php';

if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit;
}



$pdo = new PDO(DSN,
USER,
PASS);

if (isset($_POST['add_to_cart'])) {
    $bookId = $_POST['book_id'];

    if (isset($_SESSION['cart'][$bookId])) {
        $_SESSION['cart'][$bookId]++;
    } else {
        $_SESSION['cart'][$bookId] = 1;
    }
}

$books = $pdo -> query('SELECT * FROM book') -> fetchAll();
foreach ($books as $book) {
    echo $book['title'];

    echo '<form method="POST">';
    echo '<input type="hidden" name="book_id" value="' . $book['id'] . '">';
    echo '<button type="submit" name="add_to_cart">Panier</button>';
    echo'</form>';
}

echo 'Bienvenue ' .  $_SESSION['username'];

?>

<a href="logout.php">Se déconnecter</a>

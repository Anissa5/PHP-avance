<?php

require_once 'connec.php';

$pdo = new PDO(DSN,
USER,
PASS);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);

    if (
        $firstname !== '' &&
        $lastname !== '' &&
        strlen($firstname) <= 45 &&
        strlen($lastname) <= 45
    ) { 
        $sql = "INSERT INTO friends (firstname, lastname)
                VALUES (:firstname, :lastname)";

        $query = $pdo->prepare($sql);

        $query->execute([
            'firstname' => $firstname,
            'lastname' => $lastname
        ]);

    }
}

$sql = "SELECT * FROM friends";
$query = $pdo->query($sql);
$friends = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mes amis</title>
</head>

<body>
    <h1>Mes amis</h1>
    <ul>
        <?php foreach ($friends as $friend): ?>
            <li>
                <?= htmlspecialchars($friend['firstname']) ?>
                <?= htmlspecialchars($friend['lastname']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <h2>Ajouter un ami</h2>
    <form method="POST">

        <label for="firstname">Firstname :</label>
        <input
            type="text"
            name="firstname"
            id="firstname"
            maxlength="45"
            required
        >
        <br><br>
        <label for="lastname">Lastname :</label>
        <input
            type="text"
            name="lastname"
            id="lastname"
            maxlength="45"
            required
        >
        <br><br>
        <button type="submit">Ajouter</button>
    </form>
</body>

</html>
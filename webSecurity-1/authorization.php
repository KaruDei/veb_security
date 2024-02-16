<?php
    require_once 'controllers/db.php';

    // $stmt = $pdo->query('SELECT * FROM users');
    // while ($row = $stmt->fetchAll())
    // {
    //     print_r($row) . "\n";
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Авторизация</h1>

    <form action="/controllers/auth.php" method="post">
        <input type="text" name="login">
        <input type="password" name="password">
        <input type="submit" value="login">
    </form>
</body>
</html>
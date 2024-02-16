<?php
    require_once "db.php";

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = $pdo->query("SELECT * FROM users WHERE login = '$login'");
    $user = $query->fetch();

    print_r($user);
    if ($user['password'] == $password) {
        $_SESSION['user'] = array (
            'login' => $user['login'],
            'password' => $user['password'],
            'role' => $user['role']
        );
    }

    header('Location: /');
?>
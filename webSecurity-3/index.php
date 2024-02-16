<?php
    require_once 'db.php';

    if ( isset( $_GET['login'] ) ) {
        /*  
            SQL-Иньекция:
            SELECT * FROM users WHERE `login`='admin' -- ' AND `password`='1'
            Запрос: login = "admin' -- "
        */
        /*
            $query = "SELECT * FROM users WHERE `login`='$_GET[login]' AND `password`='$_GET[password]'";
            echo $query."<br>";
            $a = mysqli_query($connect, $query);
            if ($a) {
                echo "<pre>";
                print_r($a = mysqli_fetch_assoc($a));
                echo "</pre>";
                
                foreach ($a as $key => $value) {
                    echo $key." = ".$value."<br>";
                }
            } else {
                echo "Ошибка!!!";
            }
        */

        /*
            Защита 1:
            Используем эти две функции:
                htmlspecialchars(); - переводит символы в HTML-сущности
                mysqli_real_escape_string(); - экранирует специальные символы в строке для использования в SQL запросе
        */
        /*
            $login = mysqli_real_escape_string( $connect, htmlspecialchars($_GET['login']) );
            $password = mysqli_real_escape_string( $connect, htmlspecialchars($_GET['password']) );
            $query = "SELECT * FROM users WHERE `login`='$login' AND `password`='$password'";
            echo $query."<br>";
            $a = mysqli_query($connect, $query);
            if ($a) {
                echo "<pre>";
                print_r($a = mysqli_fetch_assoc($a));
                echo "</pre>";

                foreach ($a as $key => $value) {
                    echo $key." = ".$value."<br>";
                }
            } else {
                echo "Ошибка!!!";
            }
        */
        
        /*
            Защита 2:
            Используем подготовленные запросы в PDO
                $pdo->prepare();
                $pdo->execute(array());
        */

        $login = $_GET['login'];
        $password = $_GET['password'];
        // echo "<pre>";
        // print_r( $pdo->query("SELECT * FROM `users`")->fetchAll() );
        // echo "</pre>";

        $user = $pdo->prepare("SELECT * FROM `users` WHERE `login` = :login AND `password` = :password");
        $user->execute(array(
            'login' => $login,
            'password' => $password
        ));
        echo "<pre>";
        print_r($user->fetch());
        echo "</pre>";
    }
    
?>

<form action="?" method="GET">
    <input type="text" name="login">
    <input type="password" name="password">
    <input type="submit" value="Войти">
</form>
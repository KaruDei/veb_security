<?php
    require_once 'controllers/db.php';

    echo "POST:\n";
    print_r($_POST);
    echo "GET:\n";
    print_r($_GET);
    echo "Requests:\n";
    print_r($_REQUEST);
    
    echo "Headers:\n";
    $headers = apache_request_headers();
    print_r($headers);
    if (isset($headers['Authorization'])) {
        $headerAuth = explode(',',$headers['Authorization']);
        $login = explode('=', $headerAuth[0])[1];
        $password = explode('=', $headerAuth[1])[1];
        echo "HeaderLogin:\n";
        print_r($login);
        echo "\nHeaderPassword:\n";
        print_r($password);
        
        echo "\nQuery:\n";
        if (!empty($login) && !empty($password)) {
            $sql = "SELECT * FROM `users` WHERE login = '$login'";
            $query = $pdo->query($sql)->fetch();
            print_r($query);
            if ($query['password'] == $password) {
                echo "Authorization Complete";
            } else {
                echo "Authorization Error";
            }
        } 
    }

?>
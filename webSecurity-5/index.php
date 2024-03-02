<?php

    // Без защиты
    // if ( isset( $_GET['p'] ) ) {
    //     echo $_GET['p'];
    // }

    // Защита
    if ( isset( $_GET['p'] ) ) {
        $text = htmlspecialchars($_GET['p']);
        echo $text;
    }

?>

<form action="" method="GET">
    <input type="text" name="p">
    <input type="submit" value="Send">
</form>
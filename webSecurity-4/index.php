<?php
    if (isset($_GET["ping"])) {
        $getPing = escapeshellarg($_GET["ping"]);
        echo '<pre>';
        echo $getPing;
        $cmd = 'ping ' . $getPing;
        passthru($cmd);
        echo '</pre>';
    }
?>
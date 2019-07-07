<?php
    include './autoload.php';
    autoload('./configs');

    session_start();
    if ($_SESSION['isAuth'] === true) {
        include HTML_DIR . '/main.php';
    } else {
        include HTML_DIR . '/login.php';
    }
    session_write_close();
?>

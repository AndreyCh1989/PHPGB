<?php
    session_start();
    $request = $_POST;

    $username = $_SESSION['username'];

    if ($request['logout'] === 'true') {
        $_SESSION['isAuth'] = false;
        print_r ($_SESSION['isAuth']);

        header('location: ./index.php');
        die;
    }

    $cartItems = $_SESSION['cartItems'];

    session_write_close();


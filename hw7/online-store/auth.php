<?php
    session_start();
    $request = $_POST;

    $username = $_SESSION['username'];

    if ($request['logout']) {
        $_SESSION['isAuth'] = false;
        print_r ($_SESSION['isAuth']);

        header('location: ./index.php');
        die;
    }

    session_write_close();


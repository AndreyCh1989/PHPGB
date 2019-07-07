<?php
    session_start();
    $_SESSION['isAuth'] = false;

    $request = $_POST;

    $username = $request['username'];
    $pass = $request['pass'];

    if ($username && $pass) {
        $auth_data = query(sprintf(GET_AUTH_INFO, $username));


        if (sizeof($auth_data) > 0) {
            $auth = $auth_data[0];

            if(password_verify($pass, $auth['password'])) {
                    $_SESSION['isAuth'] = true;
                    $_SESSION['username'] = $username;
                    header('location: ./index.php');
                    die;
            }
        }

        $status = 'Login failed. Please check entered information and try again.';
    }

    session_write_close();

<?php
    $request = $_POST;

    $username = $request['username'];
    $pass = $request['pass'];

    if (!$username || !$pass)
        echo 'Please set username or password';

    $myslqi = connect_SQL();
    $result = mysqli_query($myslqi, sprintf(GET_AUTH_INFO, $username));
    if (!$result) {
        print_r($myslqi);
    }

    $auth = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $auth[] = $row;
    }

    print_r($auth);

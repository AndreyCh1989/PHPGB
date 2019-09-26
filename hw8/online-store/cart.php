<?php

    $request = $_POST;
    session_start();

    if ($request['op'] === 'add') {
        if ($request['id'] && $request['img'] && $request['name'] && $request['price']) {
           if (!$_SESSION['cartItems'])
                $_SESSION['cartItems'] = [];

            modify($request);
        }
    } else if ($request['op'] === 'del') {
        if ($request['id']) {
            if ($_SESSION['cartItems']) {
                del($request);
            }
        }
    }

    session_write_close();

    header("Location: ./index.php");
    die();

    function modify($request) {
        foreach ($_SESSION['cartItems'] as $i => $item) {
            if ($item['name'] === $request['name']) {
                $_SESSION['cartItems'][$i]['quantity'] ++;
                return;
            }
        }

        array_push($_SESSION['cartItems'], [
            'id' => $request['id'],
            'img' => $request['img'],
            'name' => $request['name'],
            'price' => $request['price'],
            'quantity' => 1
        ]);
    }

    function del($request) {
        foreach ($_SESSION['cartItems'] as $i => $item) {
            if ($item['id'] === $request['id']) {
                if ($item['quantity'] === 1) {
                    unset($_SESSION['cartItems'][$i]);
                } else {
                    $_SESSION['cartItems'][$i]['quantity'] --;
                }
                return;
            }
        }
    }

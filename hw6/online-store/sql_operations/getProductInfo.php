<?php
    include '../autoload.php';
    autoload('../configs');

    $request = $_GET;

    if (!$request['id'])
        echo json_encode([ 'error' => 'Id is not specified']);
    else {
        $myslqi = connect_SQL();
        $result = mysqli_query($myslqi, sprintf(GET_PRODUCT, $request['id']));
        if (!$result) {
            print_r($myslqi);
        }

        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }

        echo json_encode($products);
    }


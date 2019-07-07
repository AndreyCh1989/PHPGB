<?php
    $request = $_GET;

    if (!$request['id'])
        echo json_encode([ 'error' => 'Id is not specified']);
    else {
        $products = query($sprintf(GET_PRODUCT, $request['id']));

        echo json_encode($products);
    }


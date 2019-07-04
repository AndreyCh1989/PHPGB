<?php

    function getAll() {
        $myslqi = connect_SQL();
        $result = mysqli_query($myslqi, GET_ALL);
        if (!$result) {
            print_r($myslqi);
        }

        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }

        return $products;
    }

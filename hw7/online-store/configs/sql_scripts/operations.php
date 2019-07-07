<?php
    function query($query) {
        if (!$query) {
            echo 'Query is empty!!!';
            return;
        }

        $myslqi = connect_SQL();
        $result = mysqli_query($myslqi, $query);
        if (!$result) {
            print_r ('query -> ' . $query . BR);
            print_r ('query result -> ' . $result . BR);
            print_r ('list objects -> ' . $list . BR);
            print_r ('query info -> ' . $myslqi . BR);
        }

        $list = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }

        return $list;
    }

    function script($script) {
        $myslqi = connect_SQL();
        $result = mysqli_query($myslqi, $script);
        if (!$result) {
            print_r($myslqi);
        }
    }

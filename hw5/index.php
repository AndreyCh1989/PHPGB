<?php
    include './autoload.php';
    autoload('./configs');

    include ROOT_DIR . '/html.php';

    function getAll() {
        $myslqi = connect_SQL();
        $result = mysqli_query($myslqi, GET_ALL);
        if (!$result) {
            print_r($myslqi);
        }

        $pictures = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $pictures[] = $row;
        }

        return $pictures;
    }
?>

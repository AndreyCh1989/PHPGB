<?php
    include './autoload.php';
    autoload('./configs');

    $id = $_REQUEST["id"];

    $myslqi = connect_SQL();
    $result = mysqli_query($myslqi, "update homework.pic_galery set views=views+1 where id=$id;");
    if (!$result) {
        print_r("update homework.pic_galery set views=views+1 where id=$id;");
        print_r($myslqi);
    }

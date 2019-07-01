<?php

function connect_SQL() {
    $defaultConfig = require ROOT_DIR.'configs/sql_configs/config.php';
    $config = array_merge($defaultConfig);

    $mysqli = mysqli_connect(
        $config['db_host'],
        $config['db_user'],
        $config['db_pass'],
        $config['db_name']
    );

    return $mysqli;
}

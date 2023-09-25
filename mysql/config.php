<?php

define('URL', 'http://localhost/class-php');
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'learning_php');

$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
if (!$connect) {
    echo "Fail connected";
}


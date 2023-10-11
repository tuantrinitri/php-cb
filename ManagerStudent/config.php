<?php

// Connect DB

$connect = mysqli_connect("localhost", "root", "admin@1234", "learning_php");
if (!$connect) {
    echo "FAIL";
}


<?php

    $connect = mysqli_connect('localhost', 'root', 'root', 'lk');

    if (!$connect) {
        die('Error connect to DataBase');
    }
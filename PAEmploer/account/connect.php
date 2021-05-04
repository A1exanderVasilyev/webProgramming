<?php

    $connect = mysqli_connect('localhost', 'root', 'root', 'app');

    if (!$connect) {
        die('Error connect to DataBase');
    }
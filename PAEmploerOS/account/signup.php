<?php
    //print_r($_POST);
    session_start();
    require_once 'connect.php';

    $organisation_name = $_POST['organisation_name'];
    $organisation_adress = $_POST['organisation_adress'];
    $organisation_email = $_POST['organisation_email'];
    $tin = $_POST['tin']; // tin - Идентификационный номер налогоплательщика //
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
    if (mysqli_num_rows($check_login) > 0) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Такая учетная запись уже существует",
            "fields" => ['login'],
        ];
        echo json_encode($response);
        die();
    }

    $error_fields = [];

    if($organisation_name === '') {
        $error_fields[] = 'organisation_name';
    }

    if($organisation_adress === '') {
        $error_fields[] = 'organisation_adress';
    }

    if($organisation_email === '' || !filter_var($organisation_email, FILTER_VALIDATE_EMAIL)) {
        $error_fields[] = 'organisation_email';
    }

    if($tin === '') {
        $error_fields[] = 'tin';
    }

    if($login === '') {
        $error_fields[] = 'login';
    }

    if($password === '') {
        $error_fields[] = 'password';
    }

    if($password_confirm === '') {
        $error_fields[] = 'password_confirm';
    }

    if(!$_FILES['documents']) {
        $error_fields[] = 'documents';
    }

    if (!empty($error_fields)) {

        $response = [
            "status" => false,
            "message" => "Заполните поля корректными данными",
            "type" => 1,
            "fields" => $error_fields,
        ];
        echo json_encode($response);
        die();
    }

    if ($password === $password_confirm) {

        $path = 'uploads/' . time() . $_FILES['documents']['name'];
        if (!move_uploaded_file($_FILES['documents']['tmp_name'], '../' . $path)) {
            $response = [
                "status" => false,
                "message" => "Ошибка при загрузке документа",
                "type" => 2,
            ];
            echo json_encode($response);
        }

        $password = md5($password);

        $query = "INSERT INTO `users` (`user_id`, `organisation_name`, `organisation_adress`, `organisation_email`, `tin`, `login`, `password`, `documents`)
        VALUES (NULL, '$organisation_name', '$organisation_adress', '$organisation_email', '$tin', '$login', '$password', '$path')";

        $result = mysqli_query($connect, $query) or die (mysqli_error($connect));

        $response = [
            "status" => true,
            "message" => "Регистрация прошла успешно!",
        ];
        echo json_encode($response);


    } else {
        $response = [
            "status" => false,
            "message" => "Пароли не совпадают!",
        ];
        echo json_encode($response);
    }
?>
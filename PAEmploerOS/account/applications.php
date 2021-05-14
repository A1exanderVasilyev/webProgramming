<?php
    //print_r($_POST);
    session_start();
    require_once 'connect.php';

    $systemDate = date("Y-M-D",strtotime($date)); 
    $student_id = $_POST['student_id'];
    $organisation_name = $_POST['organisation_name'];
    $organisation_email = $_POST['organisation_email'];
    $facultiy_name = $_POST['facultiy_name'];
    $group_name = $_POST['group_name'];
    $student_name = $_POST['student_name'];
    $work_description = $_POST['work_description'];

    $error_fields = [];

    if($organisation_name === '') {
        $error_fields[] = 'facultiy_name';
    }

    if($organisation_adress === '') {
        $error_fields[] = 'group_name';
    }

    if($organisation_adress === '') {
        $error_fields[] = 'student_name';
    }

    if($work_description === '') {
        $error_fields[] = 'work_description';
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

    $query = "INSERT INTO `applications` (`application_id`, `student_id`, `organisation_name`, `organisation_email`, `application_date`, `facultiy_name`, `group_name`, `student_name`, `work_description`)
    VALUES (NULL, '$student_id', '$organisation_name', '$organisation_email', NOW(), '$facultiy_name', '$group_name', '$student_name', '$work_description')";

    $result = mysqli_query($connect, $query) or die (mysqli_error($connect));

    $response = [
        "status" => true,
        "message" => "Заявка отправлена!",
    ];
    echo json_encode($response);
<?php


function selectFaculty() {
    $connect = mysqli_connect('localhost', 'root', 'root', 'lk');

    $result = mysqli_query($connect, "SELECT `facultiy_id`,`facultiy_name` FROM `faculties`");
    $faculties = array();
    while($faculty = mysqli_fetch_assoc($result)) {
        $faculties[] = $faculty;
    }
    return $faculties;
}

function selectSpecialty() {
    $connect = mysqli_connect('localhost', 'root', 'root', 'lk');

    $facultyVal = (int)$_POST['facultyVal'];
    $result = mysqli_query($connect, "SELECT `specialty_id`,`specialty_name` FROM `specialties` WHERE facultiy_id = $facultyVal");

    $return = "<option value='0'>Выберите специальность</option>";
    while($specialty = mysqli_fetch_assoc($result)) {
        $return .= "<option value = '{$specialty['specialty_id']}'>{$specialty['specialty_name']}</option>";
    }
    return $return;
}
//

function selectGroup() {
    $connect = mysqli_connect('localhost', 'root', 'root', 'lk');

    $specialtyVal = (int)$_POST['specialtyVal'];
    $result = mysqli_query($connect, "SELECT `group_id`,`group_name` FROM `groups` WHERE specialty_id = $specialtyVal");

    $return = "<option value='0'>Выберите группу</option>";
    while($group = mysqli_fetch_assoc($result)) {
        $return .= "<option value = '{$group['group_id']}'>{$group['group_name']}</option>";
    }
    return $return;
}

function getList() {
    $facultiy_id = (int)$_POST['faculty'];
    $specialty_id = (int)$_POST['specialty'];
    $group_id = (int)$_POST['group'];

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connect = mysqli_connect('localhost', 'root', 'root', 'lk');

   

    $result = mysqli_query($connect, "SELECT `student_name` FROM students WHERE 
    specialty_id = $specialty_id AND facultiy_id = $facultiy_id AND group_id = $group_id");
  
    while ($names = mysqli_fetch_assoc($result)) {
        $namesList[] = $names;
    }
  
    return $namesList;
    
    
}
<?php

session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}

require_once 'account/connect.php';
require_once 'functions.php';

if($_POST['facultyVal']) {
    $return = selectSpecialty();
    exit($return);
}

if($_POST['specialtyVal']) {
    $return = selectGroup();
    exit($return);
}

if($_POST['submit']) {
    //echo "<pre>" . print_r($_POST, true) ."</pre>";
    $list = getList();
} 

$faculties = selectFaculty();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Личный кабинет работодателя</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&family=Sarala&display=swap&family=Open+Sans&display=swap"
        rel="stylesheet">
    <link href="source/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="header__container">
                <div class="header__logo">
                    <a href="/"><img src="images/header/logo.png" class="logo"
                            alt="Личный кабинет работодателя ПГТУ"></a>
                </div>
                <div class="header__title">
                    <span class="header__title-h1">личный кабинет работодателя</span>
                    <span class="header__title-h2">ПОВОЛЖСКОГО ГОСУДАРСТВЕННОГО ТЕХНОЛОГИЧЕСКОГО УНИВЕРСИТЕТА</span>
                </div>
            </div>
        </header>

        <div class="main__block">
            <div class="main__block-menu">
                <div class="organisation-name">
                                <?= $_SESSION['user']['organisation_name'] ?>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="/">Моя страница</a></li>
                    <li class="list-group-item"><a href="/faculties.php">Факультеты</a></li>
                    <li class="list-group-item"><a href="/specialties.php">Специальности</a></li>
                    <li class="list-group-item"><a href="/ratings.php">Рейтинг студентов</a>
                    </li>
                    <li class="list-group-item"><a href="/hiring.php">Заявка для найма</a></li>
                    <li class="list-group-item"><a href="account/logout.php">Выйти</a></li>
                </ul>
                <!-- <script type="text/javascript">
                    $(document).ready(function ($) {
                        $("a[href='/']").closest("li").addClass("selected-item");

                    });
                </script> -->
            </div>

            <div class="main__block-content">
                <div class="rating-form__block">
                    <form action="" method="POST" class="rating__form" id="rating-form">
                        <div>
                            <select name="faculty" id="faculty">
                                <option value="0">Выберите факультет</option>
                                <?php foreach ($faculties as $faculty): ?>
                                    <option value = "<? echo $faculty['facultiy_id'] ?>"><? echo $faculty['facultiy_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="specialty" id="divspecialty">
                            <select name="specialty" id="specialty" disabled></select>
                        </div> 

                        <div class="group" id="divgroup">
                            <select name="group" id="group" disabled></select>
                        </div>

                        <input class="raiting__button-submit" type="submit" value="Выбрать" name="submit">
                    </form>
                </div>
                <div class="rating-table">
                    <table BORDER>
                        <tr>
                            <td>Студент</td> 
                            <td>Факультет</td> 
                            <td>Специальность</td> 
                            <td>Группа</td> 
                            <td>Рейтинг(Средний балл)</td>
                            <td>Выбор студента для заявки</td>
                        </tr>
                        <? 
                        if(is_array($list)) {
                            foreach($list as $names) {
                            ?>
                                <tr>
                                    <td><p><? echo $names['student_name'] ?></p></td>
                                    <td><p><? echo $names['facultiy_name'] ?></p></td>
                                    <td><p><? echo $names['specialty_name'] ?></td></p>
                                    <td><p><? echo $names['group_name'] ?></td></p>
                                    <td><p><? echo $names['ROUND(AVG(student_performance.mark),1)'] ?></p></td>
                                    <td><a href="hiring.php?student_id=<?= $names['student_id']?>&facultiy_name=<?= $names['facultiy_name']?>&group_name=<?= $names['group_name']?>&student_name=<?= $names['student_name']?>">Выбрать</a></form></td>
                                </tr>
                            <?php }
                        } ?>  
                    </table>
                </div>
            </div>
        </div>

        <script src="/source/js/jquery-3.5.1.min.js"></script>
        <script src="/source/js/script.js"></script>
    </div>
</body>

</html>
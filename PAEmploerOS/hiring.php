<?php

session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}

require_once 'account/connect.php';
require_once 'functions.php';

if($_POST['submit']) {
    $list = getList();
    //var_dump($list);
}

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
                <div class="content-title">Подача заявки для найма</div>
                <div class="hiring__block">
                    <form class="hiring__form" id="form"  method="POST" action="applications.php">
                        <input type="hidden" name="student_id" value="<?= $_GET['student_id']?>"> 
                        <label>Наименование организации</label>
                            <input type="text" name="organisation_name" value="<?= $_SESSION['user']['organisation_name'] ?>" readonly>
                        <label>E-mail</label>
                            <input type="email" name="organisation_email" value="<?= $_SESSION['user']['organisation_email'] ?>" readonly>
                        <label>Факульет студента</label>
                            <input type="text" name="facultiy_name" value="<?= $_GET['facultiy_name'] ?>">
                        <label>Группа студента</label>
                            <input type="text" name="group_name" value="<?= $_GET['group_name'] ?>">
                        <label>ФИО студента</label>
                            <input type="text" name="student_name" value="<?= $_GET['student_name'] ?>">
                        
                        <label>Описание предлагаемой работы</label>
                            <div class="work-description">
                                <textarea  name="work_description" placeholder="Опишите предлагаемую работу" data-required="true"></textarea>
                            </div>
                            <button type="submit" class="hiring__form-button">Отправить заявку</button>
                    </form>
                    <p class="msg hidden">Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
        </div>

        <footer class="footer">

        </footer>

    </div>

    <script src="/source/js/jquery-3.5.1.min.js"></script>
    <script src="/source/js/script.js"></script>
    <script src="/source/js/validate-form.js"></script>
</body>

</html>
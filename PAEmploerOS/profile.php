<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Личный кабинет работодателя</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&family=Sarala&display=swap&family=Open+Sans&display=swap"
        rel="stylesheet">
    <link href="source/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper profile__page">
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
                <?php 
                    if($_SESSION['user']['login'] !== 'admin') {
                ?>
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
                <?php
                    } else {
                ?>
                        <div class="organisation-name">Администратор</div>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="/faculties.php">Организации</a></li>
                            <li class="list-group-item"><a href="/specialties.php">Поступившие заявки</a></li>
                            <li class="list-group-item"><a href="/ratings.php">Рассмотренные заявки</a></li>
                            <li class="list-group-item"><a href="account/logout.php">Выйти</a></li>
                        </ul>       
                <?php
                    }
                ?>
                
                <!--<script type="text/javascript">
                    $(document).ready(function ($) {
                        $("a[href='/']").closest("li").addClass("selected-item");

                    });
                </script> -->
            </div>

            <div class="main__block-content">
                <div class="suka">awdwa</div>
            </div>
        </div>

        <footer class="footer">

        </footer>
        <script src="source/js/validate-form.js"></script>
    </div>
</body>

</html>
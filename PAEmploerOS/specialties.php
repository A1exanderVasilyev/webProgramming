<?php

session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}


function vardump($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}
    require_once 'account/connect.php';

$faculties = mysqli_query($connect, "SELECT * FROM `faculties`");
$specialties = mysqli_query($connect, "SELECT * FROM `specialties`");

while ($specialty = mysqli_fetch_assoc($specialties)) {
    $specialtyPost[] = $specialty;
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
                <div class="content-title">Специальности</div>
                <table class="specialities__table">
                    <thead>
                        <tr>
                            <td>Наименование</td>
                            <td>Описание</td>
                        </tr>
                    </thead>
                    <tbody>
                        <? while ($facultiy = mysqli_fetch_assoc($faculties)) {
                        ?>
                            <tr>
                                <td class="facultie__name" colspan="2"><?php echo $facultiy['facultiy_name'] ?></td>
                            </tr>
                            <? foreach($specialtyPost as $specialty) {
                                if ($facultiy['facultiy_id'] == $specialty['facultiy_id']) {
                            ?>
                                    <tr>
                                        <td class="specialities__title"></br><?php echo $specialty['specialty_name'] ?></td>
                                        <td><?php echo $specialty['specialty_description'] ?></td>              
                                    </tr>
                                
                        <?php
                                }
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

        <footer class="footer">

        </footer>

    </div>
</body>

</html>
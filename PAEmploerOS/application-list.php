<?php

session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
    setlocale(LC_ALL, 'ru_RU.UTF-8');

    require_once 'account/connect.php';

    $applications = mysqli_query($connect, "SELECT * FROM applications ORDER BY application_id DESC");
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
                <div class="organisation-name">Администратор</div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="/organisations.php">Организации</a></li>
                    <li class="list-group-item"><a href="/application-list.php">Заявки</a></li>
                    <li class="list-group-item"><a href="account/logout.php">Выйти</a></li>
                </ul>
            </div>

            <div class="main__block-content">
                <div class="content-title">Список заявок</div>
                
                    <? while ($application = mysqli_fetch_assoc($applications)) {
                    ?>

                    <table class="table organisation__table">
                        <thead>
                            <tr>
                                <td>Заявка от <?php echo $application['organisation_name'] ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Email организации</td>
                                <td><?php echo $application['organisation_email'] ?></td> 
                            </tr>
                            <tr>
                                <td>Факультет студента</td>
                                <td><?php echo $application['facultiy_name'] ?></td> 
                            </tr>
                            <tr>
                                <td>Группа студента</td>
                                <td><?php echo $application['group_name'] ?></td> 
                            </tr>
                            <tr>
                                <td>Имя студента</td>
                                <td><?php echo $application['student_name'] ?></td> 
                            </tr>
                            <tr>
                                <td>Опсиание предлагаемой работы(должности)</td>
                                <td><?php echo $application['work_description'] ?></td> 
                            </tr>
                            <tr>
                                <td>Дата подачи заявки</td>
                                <td><?= $application['application_date'] ?></td> 
                            </tr>
                            </table>
                            <hr bodrer="2px">
                    <?php
                    }
                    ?>
                        </tbody>
            </div>
        </div>

        <footer class="footer">

        </footer>

    </div>
</body>

</html>
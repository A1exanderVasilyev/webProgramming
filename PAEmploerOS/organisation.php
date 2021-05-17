<?php

session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}


    require_once 'account/connect.php';

    $id = $_GET['user_id'];
    $contents = mysqli_query($connect, "SELECT * FROM `users` WHERE user_id='$id'");
    
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
                <div class="content-title">Информация об организации</div>
                <table class="table organisation__table">
                    <tbody>
                    <? while ($content = mysqli_fetch_assoc($contents)) {
                    ?>
                        <tr>
                            <td>Наименование организации</td>
                            <td><?php echo $content['organisation_name'] ?></td> 
                        </tr>
                        <tr>
                            <td>Адрес организации</td>
                            <td><?php echo $content['organisation_adress'] ?></td> 
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $content['organisation_email'] ?></td> 
                        </tr>
                        <tr>
                            <td>ИНН</td>
                            <td><?php echo $content['tin'] ?></td> 
                        </tr>
                        <tr>
                            <td>Юридические документы</td>
                            <td><img src="/<?= $content['documents'] ?>"></td> 
                        </tr>
                    <?php
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
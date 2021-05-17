<?php

session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
    setlocale(LC_ALL, 'ru_RU.UTF-8');

    require_once 'account/connect.php';

    $organisations = mysqli_query($connect, "SELECT * FROM users");
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
                <div class="content-title">Список организаций</div>
                <table class="table organisation__table">
                    <thead>
                        <tr>
                            <td>Наименование</td>
                        </tr>
                    </thead>
                    <tbody>
                    <? while ($organisation = mysqli_fetch_assoc($organisations)) {
                        if (strlen($organisation['organisation_name']) > 0) { ?>
                            <tr>
                                <td class="facultie__title"><?php echo '<a href=organisation.php?user_id='.$organisation['user_id'].'>'.$organisation['organisation_name'].'</a>'?></td>        
                            </tr>
                            </hr>
                        <?
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
<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>

<!doctype html>
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
    <div class="wrapper authorization__block">
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

        <!-- Форма авторизации -->
        <div class="authorization__block">
            <form class="authorization__form">
                <label>Логин</label>
                <input type="text" name="login" placeholder="Введите свой логин">
                <label>Пароль</label>
                <input type="password" name="password" placeholder="Введите пароль">
                <button type="submit" class="login-button">Войти</button>
                <div class="registration__invite">
                    <p>
                        У вас нет аккаунта? - <a href="/register.php">зарегистрируйтесь</a>!
                    </p>
                </div>
                <p class="msg hidden">Lorem ipsum dolor sit amet.</p>

            </form>
        </div>
    </div>
            <script src="/source/js/jquery-3.5.1.min.js"></script>
            <script src="/source/js/script.js"></script>
            <script src="/source/js/validate-form.js"></script>

    </body>
</html>
<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: profile.php');
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

        <!-- Форма регистрации -->
        <div class="registration__block">
            <form class="registration__form" id="form">
                <label>Наименование организации</label>
                    <input type="text" name="organisation_name" placeholder="Введите полное наименование организации" data-required="true">
                <label>Юридический адрес</label>
                    <input type="text" name="organisation_adress" placeholder="Введите юридический адрес организации" data-required="true">
                <label>E-mail</label>
                    <input type="email" name="organisation_email" placeholder="Введите E-mail" data-required="true">
                <label>ИНН</label>
                    <input type="text" name="tin" placeholder="Введите ИНН организации" data-required="true"> <!-- tin - Идентификационный номер налогоплательщика -->
                <label>Юридические документы</label>
                    <input type="file" name="documents" data-required="true">
                <label>Логин</label>
                    <input type="text" name="login" placeholder="Введите свой логин" data-required="true">
                <label>Пароль</label>
                    <input type="password" name="password" placeholder="Введите пароль" data-required="true">
                <label>Подтверждение пароля</label>
                    <input type="password" name="password_confirm" placeholder="Подтвердите пароль" data-required="true">
                <button type="submit" class="register-button">Зарегистрироваться</button>
                <p>
                    У вас уже есть аккаунт? - <a href="/">Авторизируйтесь</a>!
                </p>

                <p class="msg hidden">Lorem ipsum dolor sit amet.</p>

            </form>
        </div>


        <script src="/source/js/jquery-3.5.1.min.js"></script>
        <script src="/source/js/script.js"></script>
        <script src="/source/js/validate-form.js"></script>
    </div>
</body>

</html>
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
            <form action="account/signup.php" class="registration__form" method="post" enctype="multipart/form-data">
                <label>Наименование организации</label>
                    <input type="text" name="full_name" placeholder="Введите полное наименование организации">
                <label>Юридический адрес</label>
                    <input type="text" name="login" placeholder="Введите юридический адрес организации">
                <label>Контактный телефон</label>
                    <input type="text" name="phone" placeholder="Введите контактный телефон">
                <label>ИНН</label>
                    <input type="text" name="tin" placeholder="Введите ИНН организации">
                <label>Юридические документы</label>
                    <input type="file" name="documents">
                <label>Логин</label>
                    <input type="text" name="login" placeholder="Введите свой логин">
                <label>Пароль</label>
                    <input type="password" name="password" placeholder="Введите пароль">
                <label>Подтверждение пароля</label>
                    <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
                <button type="submit">Войти</button>
                <p>
                    У вас уже есть аккаунт? - <a href="/">авторизируйтесь</a>!
                </p>
                <?php
                    if ($_SESSION['message']) {
                        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                    }
                    unset($_SESSION['message']);
                ?>
            </form>
        </div>

        <footer class="footer">

        </footer>

    </div>
</body>

</html>
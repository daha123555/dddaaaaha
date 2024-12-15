<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
</head>
<body>
<?php
require('db.php');

if (isset($_REQUEST['login'])) {
    $login = stripslashes($_REQUEST['login']);
    $login = mysqli_real_escape_string($con, $login);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $name = stripslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($con, $name);
    $password_p = stripslashes($_REQUEST['password_p']);
    $password_p = mysqli_real_escape_string($con, $password_p);

    if ($password == $password_p) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO `loginuser` (login, password, name) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $login, $hashed_password, $name);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo "<div>
                    <h3>Успешно создан аккаунт</h3><br/>
                    <p><a href='login.php'>Вход</a></p>
                    </div>";
            } else {
                echo "<div>
                    <h3>Ошибка</h3><br/>
                    <p><a href='registration.php'>Повторить</a></p>
                    </div>";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Ошибка подготовки запроса: " . mysqli_error($con);
        }
    } else {
        echo "<div>
                <h3>Пароли не совпадают</h3><br/>
                <p><a href='registration.php'>Повторить</a></p>
                </div>";
    }
} else {
?>
    <form class="form" action="" method="post">
        <h1>Регистрация</h1>
        <input type = "text" name="login" placeholder="Логин" required />
        <input type = "text" name="name" placeholder="Имя">
        <input type = "password" name="password" placeholder="Пароль">
        <input type = "password" name="password_p" placeholder="Проверка пароля">
        <button type="submit">Зарегистрироваться</button>
       <p class="link">Уже есть аккаунт<a href="login.php">Авторизироваться</a></p>
    </form>
<?php
    }
?>
</body>
</html>

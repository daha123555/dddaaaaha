<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('db.php');
session_start();

if (isset($_POST['login'])) {
    $login = stripslashes($_REQUEST['login']);
    $login = mysqli_real_escape_string($con, $login);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);

    $query = "SELECT * FROM `loginuser` WHERE login='$login'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['login'] = $login;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<div class='form'>
                  <h3>Неверные данные</h3><br/>
                  <p class='link'><a href='login.php'>Повторить</a></p>
                  </div>";
        }
    } else {
        echo "<div class='form'>
              <h3>Неверные данные</h3><br/>
              <p class='link'><a href='login.php'>Повторить</a></p>
              </div>";
    }
} else {
?>
    <form method="post" name="log">
        <h1>Вход</h1>
        <input type="text" name="login" placeholder="Логин" autofocus="true"/>
        <input type="password" name="password" placeholder="Пароль"/>
        <button type="submit" name="submit">Авторизоваться</button>
        <p>У вас нет аккаунта? <a href="registration.php">Создать</a></p>
    </form>
<?php
}
?>
</body>
</html>

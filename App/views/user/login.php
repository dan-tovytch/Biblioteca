<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: /');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="/user/login/save" method="POST">
        <label for="email">Email:</label> <br>
        <input type="email" name="email" id="email" required> <br><br>
        <label for="password">Password:</label> <br>
        <input type="password" name="password" id="password" required autocomplete="off"> <br><br>

        <input type="submit" value="Entrar">
    </form>
    <br>
    <a href="/user/register">Registrar-se</a>

</body>
</html>
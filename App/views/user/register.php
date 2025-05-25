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
    <title>Register</title>
</head>
<body>
    <h1>Registro</h1>
    <form action="/user/register/save" method="POST">
        <label for="name">Nome:</label> <br>
        <input type="text" name="name" id="name"> <br><br>
        <label for="lastName">Sobrenome:</label> <br>
        <input type="text" name="lastName" id="lastName"> <br><br>
        <label for="email">Email:</label> <br>
        <input type="email" name="email" id="email"> <br><br>
        <label for="password">Password:</label> <br>
        <input type="password" name="password" id="password"> <br><br>

        <input type="submit" value="Criar conta">
    </form> <br><br>
    <a href="/user/login">Já tenho uma conta</a>
</body>
</html>
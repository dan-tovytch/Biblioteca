<?php 

session_start();

if(!isset($_SESSION['user_id'])) {
    header('Location: /user/login');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }
    </style>
</head>
<body>
    <h1>Seu carrinho</h1> <br>
    <a href="/">Voltar a Home</a>
    <div class="rented">
        <h2>Livros alugados</h2>
    </div>
    <div class="reserved">
        <h2>Livros reservados</h2>
    </div>
</body>
</html>
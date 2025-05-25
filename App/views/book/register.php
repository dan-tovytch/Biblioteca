<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /user/login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Livro</title>
</head>

<body>
    <h2>Registrar Livro</h2>
    <form action="/books/register/save" method="POST" enctype="multipart/form-data">
        <label for="title">Título</label> <br>
        <input type="text" id="title" name="title" required> <br><br>
        
        <label for="author">Autor</label><br>
        <input type="text" id="author" name="author" required><br><br>
        
        <label for="description">Descrição</label><br>
        <input type="text" id="description" name="description" required><br><br>
        
        <label for="editor">Editor</label><br>
        <input type="text" id="editor" name="editor" required><br><br>
        
        <label for="publishing">Editora</label><br>
        <input type="text" id="publishing" name="publishing" required><br><br>
        
        <label for="isbn">ISBN</label><br>
        <input type="text" id="isbn" name="isbn" required><br><br>
        
        <!-- <label for="page">Número de Páginas</label><br>
        <input type="text" id="page" name="page" required><br><br> -->
        
        <label for="file">Arquivo</label><br>
        <input type="file" name="file" id="file" required><br><br>
        
        <label for="image">Imagem</label><br>
        <input type="file" name="image" id="image" required><br><br>
        
        <input type="submit" value="Registrar"><br><br>
        <a href="/">Voltar a Home</a>
    </form>
</body>
</html>

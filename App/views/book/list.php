<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
</head>
<body>
    <h1>Lista de livros</h1>
    <ul>
        <?php foreach ($books as $book): ?>
            <li>
                <?php if (!empty($book['Imagem'])): ?>
                    <img src="<?php echo $book['Imagem']; ?>" alt="Capa do Livro <?php echo $book['Titulo']; ?>" style="max-width: 100px;">
                <?php else: ?>
                    <p>Imagem não disponível</p>
                <?php endif; ?>
                <strong><?php echo $book['Titulo']; ?></strong>
                <strong><?php echo $book['Autor']; ?></strong>
                <strong><?php echo $book['Descricao']; ?></strong>
                <strong><?php echo $book['Editor']; ?></strong>
                <strong><?php echo $book['Editora']; ?></strong>
                <strong><?php echo $book['ISBN']; ?></strong>
                <!-- <strong><?php // echo $book['Num page']; ?></strong> -->
                <strong><?php echo $book['Arquivo']; ?></strong>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

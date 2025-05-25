<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            margin: 0 5px;
            background-color: #555;
            border-radius: 5px;
        }
        nav a:hover {
            background-color: #666;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 10px;
        }
        strong {
            display: block;
            margin: 5px 0;
        }
        .no-books {
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>
    <header>
        <h1>Biblioteca</h1>
        <?php 
            if (isset($_SESSION['user_id'])) {
                if (isset($_SESSION['user_id'])) {
                    $userName = isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Visitante';
                    $userLastName = isset($_SESSION['user_lastName']) ? htmlspecialchars($_SESSION['user_lastName']) : '';
                    echo "<p>User: " . $userName . " " . $userLastName . "</p>";
                }
            }

        ?>
    </header>
    <div class="container">
        <nav>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="/user/logout">Logout</a>
                <a href="/user/delete">Deletar</a>
                <a href="/books/register">Adicionar livro</a>
                <a href="/user/bag">Carrinho</a>
            <?php else: ?>
                <a href="/user/login">Login</a>
                <a href="/user/register">Register</a>
            <?php endif; ?>
        </nav>
        
        <ul>
            <?php if (isset($books) && is_array($books) && !empty($books)): ?>
                <?php foreach ($books as $book): ?>
                    <li>
                        <?php if (!empty($book['Imagem'])): ?>
                            <img src="<?php echo htmlspecialchars($book['Imagem']); ?>" alt="Capa do Livro <?php echo htmlspecialchars($book['Titulo']); ?>" style="max-width: 100px;">
                        <?php else: ?>
                            <p>Imagem não disponível</p>
                        <?php endif; ?>
                        <strong>Título: <?php echo htmlspecialchars($book['Titulo']); ?></strong>
                        <strong>Autor: <?php echo htmlspecialchars($book['Autor']); ?></strong>
                        <strong>Descrição: <?php echo htmlspecialchars($book['Descricao']); ?></strong>
                        <strong>Editor: <?php echo htmlspecialchars($book['Editor']); ?></strong>
                        <strong>Editora: <?php echo htmlspecialchars($book['Editora']); ?></strong>
                        <strong>ISBN: <?php echo htmlspecialchars($book['ISBN']); ?></strong>
                        <strong>Arquivo: <?php echo htmlspecialchars($book['Arquivo']);?></strong>
                        <input type="submit" id="alugar" name="action" value="Alugar">
                        <input type="submit" id="reservar" name="action" value="Reservar">
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-books">Nenhum livro encontrado.</p>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>

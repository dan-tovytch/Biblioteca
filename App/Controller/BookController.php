<?php 

namespace App\Controller;

use Core\Controller;
use Core\View;
use App\Models\Book;
use App\Database\Database;

class BookController extends Controller {
    protected $bookModel;
    
    /**
     * Summary of __construct
     */
    public function __construct() {
        $db = new Database();
        $this->bookModel = new Book($db->getConn());
    }

    /**
     * Summary of list
     * @return void
     */
    public function list() {
        $books = $this->bookModel->getAllBooks();
        View::render('/', ['books' => $books]);
    }

    /**
     * Summary of edit
     * @return void
     */
    public function edit($id) {
        $books = $this->bookModel->getBookById($id);
        View::render('book/edit', ['book' => $books]);
    }

    /**
     * Summary of registerForm
     * @return void
     */
    public function registerForm() {
        View::render('book/register');
    }
    
    /**
     * Summary of register
     * @return void
     */
    public function register() {
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $author = isset($_POST['author']) ? $_POST['author'] : '';
            $description = isset($_POST['description']) ? $_POST['description'] : '';
            $editor = isset($_POST['editor']) ? $_POST['editor'] : '';
            $publishing = isset($_POST['publishing']) ? $_POST['publishing'] : '';
            $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : '';
            $file = isset($_POST['file']) ? $_POST['file'] : '';
            $image = isset($_POST['image']) ? $_POST['image'] : '';;
        }

        $booksData = [
            'Titulo'      =>    $title,
            'Autor'       =>    $author,
            'Descricao'   =>    $description,
            'Editor'      =>    $editor,
            'Editora'     =>    $publishing,
            'ISBN'        =>    $isbn,
            'Arquivo'     =>    $file,
            'Imagem'      =>    $image
        ];

        $result = $this->bookModel->registerBook($booksData);

        if($result) {
            header('Location: /');
            exit();
        } else {
            echo "<p style='color: red;'>Erro ao registrar o livro!</p>";
        }
    }
}
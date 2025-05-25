<?php 

namespace App\Controller;

use Core\Controller;
use Core\View;
use App\Models\Book; 
use App\Database\Database; 

class HomeController extends Controller {
    protected $bookModel;

    public function __construct() {
        $db = new Database();
        $this->bookModel = new Book($db->getConn());
    }

    public function index() {
        // Busca todos os livros
        $books = $this->bookModel->getAllBooks();

        // Renderiza a view home e passa os livros como dados
        View::render('home', ['books' => $books]);
    }
}

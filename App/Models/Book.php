<?php 

namespace App\Models;
use Core\Model;

class Book extends Model {

    public function __construct($db) {
        parent::__construct($db);
    }


    public function getAllBooks() {
        $stmt = $this->db->query('SELECT * FROM livros');
        return $stmt->fetchAll();
    }

    public function getBookById($id) {
        $stmt = $this->db->prepare('SELECT * FROM livros WHERE Id = :Id');
        $stmt->execute(['Id' => $id]);
        return $stmt->fetch();
    }

    public function registerBook($data) {
        $stmt = $this->db->prepare("INSERT INTO livros (Titulo, Autor, Descricao, Editor, Editora, ISBN, Arquivo, Imagem) VALUES (:titulo, :autor, :descricao, :editor, :editora, :isbn, :arquivo, :imagem )");
        return $stmt->execute([
            'titulo'      =>    $data["Titulo"],
            'autor'       =>    $data["Autor"],
            'descricao'   =>    $data["Descricao"],
            'editor'      =>    $data["Editor"],
            'editora'     =>    $data["Editora"],
            'isbn'        =>    $data["ISBN"],
            'arquivo'     =>    $data["Arquivo"],
            'imagem'      =>    $data["Imagem"]
        ]);
    }
}
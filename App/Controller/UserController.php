<?php 

namespace App\Controller;

use Core\Controller;
use Core\View;
use App\Database\Database;
use PDO;

class UserController extends Controller {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function registerForm() {
        View::render('user/register');
        
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name       = htmlspecialchars($_POST['name']);
            $lastName   = htmlspecialchars($_POST['lastName']);
            $email      = htmlspecialchars($_POST['email']);
            $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                echo "Email inválido";
                return;
            }

            $stmt = $this->db->getConn()->prepare('SELECT COUNT(*) FROM usuarios WHERE email = :email');
            $stmt->execute(['email' => $email]);
            $emailCount = $stmt->fetchColumn();

            if($emailCount > 0) {
                echo "<h1>O email já está cadastrado.</h1><br><br>";
                echo "<a href='/user/register'>voltar ao registro</a>";
                exit();
            }

            $stmt = $this->db->getConn()->prepare('INSERT INTO usuarios (nome, sobrenome, email, senha) 
                                                   VALUES (:nome, :sobrenome, :email, :senha)');
    
            $result = $stmt->execute([
                'nome'      => $name,
                'sobrenome' => $lastName,
                'email'     => $email,
                'senha'     => $password
            ]);
    
            if($result) {
                header('Location: /user/login');
                exit();
            } else {
                echo "Erro ao se registrar";
            }
        } else {
            echo "Método de requisição não é POST";
        }
    }
    
    public function loginForm() {
        View::render('/user/login');
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $stmt = $this->db->getConn()->prepare('SELECT * FROM usuarios WHERE email = :email');
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if($user && password_verify($password, $user['senha'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['nome'];
                $_SESSION['user_lastName'] = $user['sobrenome'];
                header('Location: /');
                exit();
            } else {
                echo "Credenciais inválidas";
            }
        }
    }
    

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /');
        exit();
    }

    public function delete() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /user/login');
            exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];
    
            $stmt = $this->db->getConn()->prepare('DELETE FROM usuarios WHERE id = :id');
            $stmt->bindParam(":id", $userId, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                session_destroy();
                header('Location: /user/login');
                exit();
            } else {
                echo "Erro ao excluir a conta";
            }
        } else {
            View::render('user/delete');
        }
    }

    public function bag() {
        View::render('user/bag');
    }

    public function bagReserved() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action'])) {
                $action = $_POST['action'];

                if ($action === 'Alugar') {
                    echo "<script>alert('Livro alugado');</script>";
                } elseif ($action === 'Reservar') {
                    echo "<script>alert('Livro reservado');</script>";
                }
            }
        }
    }
}
<?php 

namespace App\Database;

use PDO;
use PDOException;

define('DB_HOST', '');
define('DB_NAME', 'bibliotecaphp');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

class Database {
    private $host = DB_HOST;
    private $db = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $charset = DB_CHARSET;
    private $pdo;
    private $error;

    /**
     * Summary of __construct
     */
    public function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES      => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Summary of getConn
     * @return PDO
     */
    public function getConn() {
        return $this->pdo;
    }
}

$db = new Database();
$conn = $db->getConn();

if ($conn) {
    // echo "Deu boa";
} else {
    echo " <h1>Deu ruim</h1><br>";
}
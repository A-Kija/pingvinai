<?php
namespace Front\DB;

use App\DB\DataBase;
use PDO;

class SqlReader implements DataBase {

    private $pdo, $name;

    
    public function __construct($name)
    {
        $host = '127.0.0.1';
        $db   = 'miskas';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
        
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        
        $this->pdo = new PDO($dsn, $user, $pass, $options);
        $this->name = $name;
    }


    public function create(array $userData) : void
    {
        $col = implode(',', array_flip($userData)); 
        
        $sql = "
            INSERT INTO " . $this->name . "
            (". $col .")
            VALUES(?, ?, ?)
        ";

        // die($sql);
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array_values($userData));

    }

    public function update(int $userId, array $userData) : void
    {
        $set =  array_map(fn($s) => $s . ' = ?', array_flip($userData));
        $col = implode(',', $set); 
        
        $sql = "
            UPDATE " . $this->name . "
            SET " . $col . "
            WHERE id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([...array_values($userData), $userId]);
    }

    public function delete(int $userId) : void
    {
        $sql = "
            DELETE FROM " . $this->name . "
            WHERE id = ? "
        ;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);

    }

    public function show(int $userId) : array
    {
        $sql = "
            SELECT *
            FROM ". $this->name ."
            WHERE id = ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);

        return $stmt->fetch();

    }

    public function showAll() : array
    {
        $sql = "
            SELECT *
            FROM ". $this->name ."
        ";


        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }


}
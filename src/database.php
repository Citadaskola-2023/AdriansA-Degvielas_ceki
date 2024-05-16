<?php

namespace App;

use PDO;
use PDOException;

class database
{
    public function connectdatabase(): PDO
    {
        try {
            $host = getenv('DB_HOST');
            $dbname = getenv('DB_NAME');
            $username = getenv('DB_USERNAME');
            $password = getenv('DB_PASSWORD');

            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            $this->tableCheck($pdo);

            return $pdo;
        } catch (PDOException $e) {
            error_log("Database connection error: " . $e->getMessage(), 0);
            echo "An unexpected error occurred. Please try again later.";
            die();
        }
    }

    public function login(string $username, string $password): void
    {
        $hashedPassword = password_hash('oblock', PASSWORD_DEFAULT);

        if ($username === 'SuperDuperAntonovics' && password_verify($password, $hashedPassword)) {
            header("Location: /receipt");
            exit;
        } else {
            echo "<h3> WRONG CREDENTIALS";
        }
    }

    private function tableCheck(PDO $pdo): void
    {
        $tableCheckSQL = 'SHOW TABLES LIKE "Form"';
        $tableCheckResult = $pdo->query($tableCheckSQL);

        if ($tableCheckResult->rowCount() == 0) {
            $pdo->exec("CREATE TABLE Form (
            id INT AUTO_INCREMENT PRIMARY KEY,
            licence_plate VARCHAR(20) NOT NULL,
            date_time DATETIME NOT NULL,
            petrol_station VARCHAR(100) NOT NULL,
            fuel_type VARCHAR(32) NOT NULL,
            refueled DECIMAL(10,2) NOT NULL,
            currency CHAR(3) NOT NULL,
            fuel_price DECIMAL(10,4) NOT NULL,
            odometer INT NOT NULL,
            total DECIMAL(10,2) NOT NULL
        )");
        }
    }
}

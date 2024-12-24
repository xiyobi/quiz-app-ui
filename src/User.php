<?php


use PDO;


class User
{
    public $pdo;

    public function __construct()
    {
        $db = new \App\DB();
        $this->pdo = $db->conn;
    }

    public function register(
        string $full_name,
        string $email,
        string $password
    ): mixed
    {
        $select = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $select->bindParam(":email", $email);
        $select->execute();
        if ($select->rowCount() > 0) {
            return false;
        }

        $query = "INSERT INTO users(full_name, email, password)
              VALUES (:full_name, :email, :password)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':full_name' => $full_name,
            ':email' => $email,
            ':password' => $password,
        ]);

        $id = $this->pdo->lastInsertId();
        return $this->getUserById($id);

    }

    public function login(string $email, string $password): mixed
    {
        $query = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':email' => $email,
            ':password' => $password,
        ]);
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function getUserById(int $id): mixed
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':id' => $id,
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function DeleteAccount(int $userId): mixed
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':id' => $userId,
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function linkTelegramId(int $id, int $telegramId): void
    {
        $query = "UPDATE users SET telegram_id = :telegram_id WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ":id" => $id,
            ":telegram_id" => $telegramId,
        ]);
    }


}
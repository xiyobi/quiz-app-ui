<?php

namespace App\Models;

use App\Traits\HasApiTokens;

class User extends DB{
    use HasApiTokens;
    public function create (string $fullName, string $email, string $password): bool {
        $query = "INSERT INTO users (full_name, email, password, updated_at,created_at) 
            VALUES (:full_name, :email, :password, NOW(),NOW())";
        $this->conn
            ->prepare($query)
            ->execute([
                ':full_name' => $fullName,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
            ]);
        $userId = $this->conn->lastInsertId();

        $this->createApiToken($userId);
        return true;
    }
    // abdullajon@gmail.com 123456789
    public function getUser (string $email, string $password) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn
            ->prepare($query);
        $stmt->execute([
                ':email' => $email,
            ]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user->password)) {
            $this->createApiToken($user->id);
            return true;
        }
        return false;
    }
    public function getUserById (int $id) {
        $query = "SELECT id,full_name,email,updated_at,created_at FROM users WHERE id = :id";
        $stmt = $this->conn
            ->prepare($query);
        $stmt->execute([
                ':id' => $id,
            ]);

        return $stmt->fetch();
    }
}


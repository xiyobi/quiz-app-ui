<?php

namespace App\Models;

use App\Traits\HasApiTokens;

class  User extends DB
{
    use HasApiTokens;
    public  function create(string $full_name, string $email, string $password)
    {
        $query = "INSERT INTO users (full_name, email, password,updated_at, created_at) VALUES (:full_name, :email, :password, NOW(), NOW())";
        $this->conn
            ->prepare($query)
            ->execute(
                [':full_name' => $full_name, ':email' => $email, ':password' => password_hash($password, PASSWORD_DEFAULT)]
            );

        $userId = $this->conn->lastInsertId();
        $this->createApiToken($userId);
        return true;
    }
    public function getUser(string $email, string $password)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn
            ->prepare($query);
        $stmt->execute(
            [':email' => $email]
        );
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user->password)) {
            $this->createApiToken($user->id);
            return true;
        }
        else
        {
            return false;
        }
    }
    public function destroy(): void
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn
            ->prepare($query);
        $stmt->execute(
            [':id' => $this->id]
        );
    }
    public function getUserById(int $id): mixed
    {
        $query = "SELECT id, full_name, email, updated_at, created_at FROM users WHERE id = :id";
        $stmt = $this->conn
            ->prepare($query);
        $stmt->execute(
            [':id' =>$id]
        );
        return $stmt->fetch();
    }
}
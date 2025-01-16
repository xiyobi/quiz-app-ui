<?php

namespace App\Models;

use App\Models\DB;

class Quiz extends DB
{
    public  function create(int $userId, string $title, string $description, int $timeLimit): int
    {
        $query = "INSERT INTO questions (user_id, title,updated_at, description, time_limit ,updated_at, created_at) VALUES(:userId, :title,:updated_at, :description, :timeLimit, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
                ':userId' => $userId,
                ':title' => $title,
                ':description' => $description,
                ':timeLimit' => $timeLimit,
            ]);
        return  $this->conn->lastInsertId();

    }

}
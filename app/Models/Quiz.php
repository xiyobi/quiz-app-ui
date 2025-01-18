<?php

namespace App\Models;

use App\Models\DB;

class Quiz extends DB
{
    public  function create(int $userId, string $title, string $description, int $timeLimit): int
    {
        $query = "INSERT INTO quizzes (user_id, title, description, time_limit ,updated_at, created_at) VALUES(:user_id, :title, :description, :time_limit, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
                ':user_id' => $userId,
                ':title' => $title,
                ':description' => $description,
                ':time_limit' => $timeLimit,
            ]);
        return  $this->conn->lastInsertId();

    }
    public function getByUserId(int $userId): array|bool
    {
        $query = "SELECT * FROM quizzes WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll();
    }

}
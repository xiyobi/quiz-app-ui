<?php

namespace App\Models;

use App\Models\DB;

class Quiz extends DB
{
    public  function create(int $userId, string $title, string $description, int $timeLimit): bool
    {
        $query = "INSERT INTO quizzes (user_id, title,updated_at, description, time_limit ,updated_at, created_at) 
                                                                                                        VALUES 
                                                            (:userId, :title,:updated_at, :description, :timeLimit, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
                ':userId' => $userId,
                ':title' => $title,
                ':description' => $description,
                ':timeLimit' => $timeLimit,
            ]);

    }

}
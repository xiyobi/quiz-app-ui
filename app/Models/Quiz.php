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
    public function delete(int $quizId):bool
    {
        $query = "DELETE FROM quizzes WHERE id = :quiz_id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(
            [
                ':quiz_id' => $quizId
            ]);
    }
    public function update(int $quizId, string $title, string $description, int $timeLimit):bool
    {
        $query = "UPDATE quizzes SET title = :title, description = :description, time_limit = :time_limit, updated_at = NOW() WHERE id = :quiz_id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(
            [
                ':quiz_id' => $quizId,
                ':title' => $title,
                ':description' => $description,
                ':time_limit' => $timeLimit,
            ]);
    }

}
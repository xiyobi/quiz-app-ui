<?php

namespace App\Models;

use App\Models\DB;

class Answer extends DB
{
    public function find(int $id): ?array
    {
        $query = "SELECT * FROM answers WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create(int $resultId, int $optionId): bool
    {
        $query = "INSERT INTO answers (result_id, option_id)VALUES(:resultId, :optionId)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            'resultId' => $resultId,
            'optionId' => $optionId
        ]);
//        $answerId = $this->conn->lastInsertId();
    }

    public function getCorrectAnswer(int $quizId, int $userId): ?array
    {
        $query = "SELECT count(answers.id) as correctResultCount FROM answers
            JOIN results ON answers.result_id = results.id
            JOIN options ON answers.option_id = options.id
            WHERE results.user_id = :userId and results.quiz_id = :quizId AND options.is_correct = true";

        $stmt = $this->conn->prepare($query);
        $stmt->execute(['userId' => $userId, 'quizId' => $quizId]);
        return $stmt->fetch();
    }
}
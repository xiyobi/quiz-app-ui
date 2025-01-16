<?php

namespace App\Models;

use App\Models\DB;

class Question extends DB
{
    public  function create(int $quizId, string $questionText,): int
{
    $query = "INSERT INTO questions ( quiz_id,question_text,updated_at, created_at)
                VALUES(:quiz_id,:question_text, NOW(), NOW())";
    $stmt = $this->conn->prepare($query);
    return $stmt->execute([
        ':quiz_id' => $quizId,
        ':question_text' => $questionText,
    ]);
    return $this->conn->lastInsertId();
}

}
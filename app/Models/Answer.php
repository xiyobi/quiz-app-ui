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
}
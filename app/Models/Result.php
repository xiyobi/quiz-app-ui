<?php

namespace App\Models;

use App\Models\DB;

class Result extends DB
{
    public function create(int $userId, int $quizId, int $limit)
    {

        $query = "INSERT INTO results (user_id, quiz_id, started_at, finished_at)VALUES(:userId, :quizId, NOW(), :finishedAt)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'userId' => $userId,
            'quizId' => $quizId,
            'finishedAt' => date('Y-m-d H:i:s', strtotime("+$limit minutes"))
        ]);
    }
}

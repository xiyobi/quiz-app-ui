<?php

namespace App\Models;

use App\Models\DB;
use PDO;

class Question extends DB {
    public function create (int $quizId, string $questionText): int {
        $query = "INSERT INTO questions (quiz_id,question_text, updated_at, created_at) 
            VALUES (:quizId,:question_text, NOW(),NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':quizId' => $quizId, ':question_text' => $questionText,]);
        return $this->conn->lastInsertId();
    }

    public function deleteByQuizId (int $questionId): bool {
        $query = "DELETE FROM questions WHERE quiz_id = :questionId";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':questionId' => $questionId]);
    }

    public function getWithOptions (int $quizId) {
        //
        $stmt = $this->conn->prepare("SELECT * FROM questions WHERE quiz_id = :quizId");
        $stmt->execute(['quizId' => $quizId]);
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Extract question IDs
        $questionIds = array_column($questions, 'id');
        $placeholders = rtrim(str_repeat('?,', count($questionIds)), ',');

// Fetch options
        $query = "SELECT * FROM options WHERE question_id IN ($placeholders)"; // 4,5
        $stmt = $this->conn->prepare($query);
        $stmt->execute($questionIds);
        $options = $stmt->fetchAll(PDO::FETCH_ASSOC);
        shuffle($options);

// Organize options by question_id
        $groupedOptions = [];
        foreach ($options as $option) {
            $groupedOptions[$option['question_id']][] = $option;
        }

// Add options to questions
        foreach ($questions as &$question) {
            $question['options'] = $groupedOptions[$question['id']] ?? [];
        }
        shuffle($questions);
        return $questions;
    }
    public function getQuestionCountByQuizId (int $quizId) {
        $query = "SELECT COUNT(id) as questionCount FROM questions WHERE quiz_id=:quizId";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'quizId'=>$quizId
        ]);
        return $stmt->fetch();
    }
}
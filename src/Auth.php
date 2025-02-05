<?php

namespace Src;

use App\Models\DB;
use App\Models\User;
use PDO;

Class Auth {
    public static function getToken(): array|string {
        $headers = getallheaders();
        if (!isset($headers['Authorization'])) {
            apiResponse([
                'errors'=>[
                    'message' => 'Unauthorized'
                ]
            ], 401);
        }
        if (!str_starts_with($headers['Authorization'], 'Bearer ')) {
            apiResponse([
                'errors'=>[
                    'message' => 'Authorization format is invalid, allowed format is Bearer'
                ]
            ], 400);
        }
        return str_replace('Bearer ', '', $headers['Authorization']);
    }
    public static function getUserCorrectToken () {
        $db = new DB();
        $pdo = $db->getConnection();
        $query = "SELECT * FROM user_api_tokens WHERE token=:token and expires_at >= NOW()";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':token' => self::getToken()
        ]);
        return $stmt->fetch();
    }
    public static function  check(): bool {
        if (!self::getToken()) {
            apiResponse([
                'errors'=>[
                    'message' => 'Unauthorized'
                ]
            ], 401);
        }
        return true;
    }
    public static function user () {
        $token = self::getUserCorrectToken();
        if (!$token) {
            apiResponse([
                'errors'=>['message' => 'Unauthorized']
            ], 401);
        }
        $user = new User();
        return $user->getUserById($token->user_id);
    }
}
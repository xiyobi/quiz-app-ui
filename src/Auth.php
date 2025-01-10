<?php

namespace Src;

use App\Models\DB;
use PDO;


class Auth
{
    public static function check(): bool
    {
        $headers = getallheaders();
        if (!isset($headers['Authorization'])) {
            apiResponse([
                'message' => 'Unauthorized'
            ], 401);
        }
        if(!str_starts_with($headers['Authorization'], 'Bearer ')){
            apiResponse([
                'message' => 'Authorization header must start with Bearer'
            ], 400);
        }
        $token = str_replace('Bearer ', '', $headers['Authorization']);
        $db = new DB();
        $pdo = $db->getConnection();

        $query=('SELECT * FROM user_api_tokens WHERE token = :token');
        $stmt = $pdo->prepare($query);
        $stmt->execute(
            [':token' => $token]
        );

        $apiToken = $stmt->fetch();
        if (!$apiToken) {
            apiResponse([
                'message' => 'Unauthorized'
            ], 401);
        }
        return true;
    }
}
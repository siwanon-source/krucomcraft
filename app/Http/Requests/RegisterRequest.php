<?php
declare(strict_types=1);

namespace App\Http\Requests;

final class RegisterRequest
{
    public static function from(array $input): array
    {
        return [
            'user_type' => (string)($input['user_type'] ?? 'public'),
            'name' => trim((string)($input['name'] ?? '')),
            'email' => strtolower(trim((string)($input['email'] ?? ''))),
            'password' => (string)($input['password'] ?? ''),
            'student_id' => trim((string)($input['student_id'] ?? '')),
            'classroom' => trim((string)($input['classroom'] ?? '')),
        ];
    }
}


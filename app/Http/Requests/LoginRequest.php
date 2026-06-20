<?php
declare(strict_types=1);

namespace App\Http\Requests;

final class LoginRequest
{
    public static function from(array $input): array
    {
        return [
            'email' => strtolower(trim((string)($input['email'] ?? ''))),
            'password' => (string)($input['password'] ?? ''),
        ];
    }
}


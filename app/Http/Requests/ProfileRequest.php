<?php
declare(strict_types=1);

namespace App\Http\Requests;

final class ProfileRequest
{
    public static function from(array $input): array
    {
        return [
            'name' => trim((string)($input['name'] ?? '')),
            'email' => strtolower(trim((string)($input['email'] ?? ''))),
            'phone' => trim((string)($input['phone'] ?? '')),
            'line_id' => trim((string)($input['line_id'] ?? '')),
            'school' => trim((string)($input['school'] ?? '')),
            'classroom' => trim((string)($input['classroom'] ?? '')),
            'student_id' => trim((string)($input['student_id'] ?? '')),
            'bio' => trim((string)($input['bio'] ?? '')),
            'password' => (string)($input['password'] ?? ''),
            'avatar' => $input['_files']['avatar'] ?? null,
        ];
    }
}

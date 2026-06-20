<?php
declare(strict_types=1);

namespace App\Http\Requests;

final class EnrollmentRequest
{
    public static function from(array $input): array
    {
        return [
            'course_code' => strtoupper(trim((string)($input['course_code'] ?? ''))),
        ];
    }
}


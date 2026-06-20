<?php
declare(strict_types=1);

namespace App\Http\Requests;

final class LessonProgressRequest
{
    public static function from(array $input): array
    {
        return [
            'course_code' => strtoupper(trim((string)($input['course_code'] ?? ''))),
            'lesson_code' => strtoupper(trim((string)($input['lesson_code'] ?? ''))),
        ];
    }
}


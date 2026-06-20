<?php
declare(strict_types=1);

namespace App\Http\Requests;

final class GradeRequest
{
    public static function from(array $input): array
    {
        return [
            'student' => trim((string)($input['student'] ?? '')),
            'assignment' => trim((string)($input['assignment'] ?? '')),
            'score' => (int)($input['score'] ?? 0),
            'status' => trim((string)($input['status'] ?? 'ตรวจแล้ว')),
            'note' => trim((string)($input['note'] ?? '')),
        ];
    }
}


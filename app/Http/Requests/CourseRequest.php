<?php
declare(strict_types=1);

namespace App\Http\Requests;

final class CourseRequest
{
    public static function from(array $input): array
    {
        return [
            'code' => strtoupper(trim((string)($input['code'] ?? ''))),
            'term' => trim((string)($input['term'] ?? '')),
            'name' => trim((string)($input['name'] ?? '')),
            'level' => trim((string)($input['level'] ?? '')),
            'classroom' => trim((string)($input['classroom'] ?? '')),
            'subject_group' => trim((string)($input['subject_group'] ?? 'คอมพิวเตอร์')),
            'teacher' => trim((string)($input['teacher'] ?? '')),
            'weekly_hours' => (int)($input['weekly_hours'] ?? 1),
            'credit' => trim((string)($input['credit'] ?? '')),
            'students' => (int)($input['students'] ?? 0),
            'pending' => (int)($input['pending'] ?? 0),
            'progress' => (int)($input['progress'] ?? 0),
            'status' => trim((string)($input['status'] ?? 'เปิดสอน')),
            'visibility' => trim((string)($input['visibility'] ?? 'นักเรียนในห้องเรียน')),
            'description' => trim((string)($input['description'] ?? '')),
            'objectives' => trim((string)($input['objectives'] ?? '')),
            'assessment' => trim((string)($input['assessment'] ?? '')),
            'media_policy' => trim((string)($input['media_policy'] ?? '')),
            'qr_enabled' => isset($input['qr_enabled']) ? 'on' : '',
        ];
    }
}


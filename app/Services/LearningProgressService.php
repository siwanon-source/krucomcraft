<?php
declare(strict_types=1);

namespace App\Services;

final class LearningProgressService
{
    public function completeLesson(array $input): string
    {
        return kru_mark_lesson_complete($input);
    }
}


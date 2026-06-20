<?php
declare(strict_types=1);

namespace App\Services;

final class CourseService
{
    public function create(array $input): string
    {
        return kru_create_course($input);
    }
}


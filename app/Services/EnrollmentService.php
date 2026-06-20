<?php
declare(strict_types=1);

namespace App\Services;

final class EnrollmentService
{
    public function enroll(array $input): string
    {
        return kru_enroll_course($input);
    }
}


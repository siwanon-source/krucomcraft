<?php
declare(strict_types=1);

namespace App\Services;

final class GradebookService
{
    public function saveGrade(array $input): string
    {
        return kru_save_grade($input);
    }
}


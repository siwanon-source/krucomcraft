<?php
declare(strict_types=1);

namespace App\Services;

final class ProfileService
{
    public function update(array $input): string
    {
        return kru_update_profile($input);
    }
}


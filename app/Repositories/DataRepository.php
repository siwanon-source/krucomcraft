<?php
declare(strict_types=1);

namespace App\Repositories;

final class DataRepository
{
    public function all(): array
    {
        return kru_data();
    }
}


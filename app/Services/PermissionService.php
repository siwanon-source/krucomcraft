<?php
declare(strict_types=1);

namespace App\Services;

final class PermissionService
{
    public function can(string $permission): bool
    {
        return kru_can($permission);
    }
}


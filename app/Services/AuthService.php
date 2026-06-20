<?php
declare(strict_types=1);

namespace App\Services;

final class AuthService
{
    public function login(array $input): ?array
    {
        return kru_login($input);
    }

    public function register(array $input): string
    {
        return kru_register_user($input);
    }

    public function logout(): void
    {
        kru_logout();
    }
}


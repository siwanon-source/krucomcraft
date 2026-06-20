<?php
declare(strict_types=1);

namespace App\Support;

final class Config
{
    public static function get(string $name): array
    {
        $path = dirname(__DIR__, 2) . '/config/' . $name . '.php';
        return is_file($path) ? require $path : [];
    }
}


<?php
declare(strict_types=1);

namespace App\Support;

final class ActionResult
{
    public function __construct(
        public readonly string $route,
        public readonly ?string $flash = null,
    ) {
    }
}


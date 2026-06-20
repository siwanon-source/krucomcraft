<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\DataRepository;
use App\Services\PermissionService;
use App\Support\Config;

final class PageController
{
    public function __construct(
        private readonly DataRepository $data = new DataRepository(),
        private readonly PermissionService $permissions = new PermissionService(),
    ) {
    }

    public function render(string $route, ?string $flash = null): void
    {
        if ($route === 'admin' && !$this->permissions->can('manage_courses')) {
            $flash ??= 'Please login with Teacher or Admin role';
            $route = 'login';
        }

        if ($route === 'qr-grading' && !$this->permissions->can('grade_work')) {
            $flash ??= 'Please login with Teacher or Admin role to grade work';
            $route = 'login';
        }

        if ($route === 'profile' && (kru_current_user()['role'] ?? 'guest') === 'guest') {
            $flash ??= 'Please login before editing your profile';
            $route = 'login';
        }

        $meta = Config::get('page_meta');
        render_layout($route, $meta[$route] ?? $meta['dashboard'], $this->data->all(), $flash);
    }
}

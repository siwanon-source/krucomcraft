<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use App\Support\ActionResult;

final class AuthController
{
    public function __construct(private readonly AuthService $auth = new AuthService())
    {
    }

    public function login(array $input): ActionResult
    {
        $user = $this->auth->login(LoginRequest::from($input));
        if (!$user) {
            return new ActionResult('login', 'Invalid email or password');
        }

        $route = match ($user['role'] ?? 'guest') {
            'student' => 'courses',
            'parent' => 'academy',
            'teacher', 'admin' => 'admin',
            default => 'dashboard',
        };

        return new ActionResult($route, "Logged in as {$user['role']}");
    }

    public function register(array $input): ActionResult
    {
        $flash = $this->auth->register(RegisterRequest::from($input));
        return new ActionResult(str_starts_with($flash, 'สมัครสมาชิก') ? 'dashboard' : 'register', $flash);
    }

    public function logout(): ActionResult
    {
        $this->auth->logout();
        return new ActionResult('dashboard', 'Logged out');
    }
}

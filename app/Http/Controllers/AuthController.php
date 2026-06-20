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
        return new ActionResult($user ? 'admin' : 'login', $user ? "Logged in as {$user['role']}" : 'Invalid email or password');
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

<?php
declare(strict_types=1);

namespace App\Http;

use App\Http\Controllers\PageController;
use App\Support\ActionResult;
use App\Support\Config;

final class Kernel
{
    public function handle(): void
    {
        $routes = Config::get('routes');
        $route = trim((string)($_GET['page'] ?? 'dashboard'), '/');
        $validPages = $routes['pages'] ?? [];

        if (!in_array($route, $validPages, true)) {
            http_response_code(404);
            $route = 'dashboard';
        }

        $flash = null;
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
            $input = $_POST;
            $input['_files'] = $_FILES;
            $result = $this->dispatchAction($routes['actions'] ?? [], (string)($_POST['action'] ?? ''), $input);
            $route = $result->route;
            $flash = $result->flash;
            if ($route === 'learn' && isset($_POST['course_code'])) {
                $_GET['course'] = strtoupper(trim((string)$_POST['course_code']));
            }
        }

        (new PageController())->render($route, $flash);
    }

    private function dispatchAction(array $actions, string $action, array $input): ActionResult
    {
        if (!isset($actions[$action])) {
            return new ActionResult('dashboard', 'Unknown action');
        }

        [$controllerClass, $method] = $actions[$action];
        $controller = new $controllerClass();
        return $controller->$method($input);
    }
}

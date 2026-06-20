<?php
declare(strict_types=1);

require dirname(__DIR__) . '/bootstrap/app.php';

(new App\Http\Kernel())->handle();

<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Support\ActionResult;

final class SettingsController
{
    public function currentTerm(array $input): ActionResult
    {
        return new ActionResult('courses', kru_set_current_term($input));
    }
}

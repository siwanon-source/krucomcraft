<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Services\ProfileService;
use App\Support\ActionResult;

final class ProfileController
{
    public function __construct(private readonly ProfileService $profiles = new ProfileService())
    {
    }

    public function update(array $input): ActionResult
    {
        return new ActionResult('profile', $this->profiles->update(ProfileRequest::from($input)));
    }
}


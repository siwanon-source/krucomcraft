<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Services\CourseService;
use App\Services\PermissionService;
use App\Support\ActionResult;

final class CourseController
{
    public function __construct(
        private readonly CourseService $courses = new CourseService(),
        private readonly PermissionService $permissions = new PermissionService(),
    ) {
    }

    public function store(array $input): ActionResult
    {
        if (!$this->permissions->can('manage_courses')) {
            return new ActionResult('login', 'Permission denied: manage_courses');
        }

        return new ActionResult('admin', $this->courses->create(CourseRequest::from($input)));
    }
}

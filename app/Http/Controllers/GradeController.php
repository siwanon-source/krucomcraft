<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\GradeRequest;
use App\Services\GradebookService;
use App\Services\PermissionService;
use App\Support\ActionResult;

final class GradeController
{
    public function __construct(
        private readonly GradebookService $gradebook = new GradebookService(),
        private readonly PermissionService $permissions = new PermissionService(),
    ) {
    }

    public function store(array $input): ActionResult
    {
        if (!$this->permissions->can('grade_work')) {
            return new ActionResult('login', 'Permission denied: grade_work');
        }

        return new ActionResult('qr-grading', $this->gradebook->saveGrade(GradeRequest::from($input)));
    }
}
